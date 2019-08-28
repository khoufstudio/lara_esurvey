<?php

namespace Modules\RunningText\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Modules\Page\Entities\Page;
use Illuminate\Support\Facades\Storage;
use Modules\RunningText\Entities\RunningText;

class RunningTextController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use ValidatesRequests;
    public function index(Request $request)
    {   
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){

            if(isset($request->search)){
                $sess_search = Session::put('search_runningtext', $request->search);
            }
            
            $sess_ = Session::get('search_runningtext');

            if(isset($sess_)){
                $runningtext= RunningText::searchRunningText($sess_);
            }
            else{
                $runningtext= RunningText::paginate(20);
            }

            $role = get_role(Auth::user()->id_user_group);
            return view('runningtext::index')->with('runningtext', $runningtext)->with('role', $role);
        
        }else{
            return redirect('forbidden');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('runningtext::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'link'  => 'required',
            'descripsi' => 'required',
        ]);


        RunningText::create([
            'title' => $request->title,
            'desc'  => $request->descripsi,
            'link'  => $request->link,
            'publish'    => $request->publish
        ]);

        Session::flash('success', 'Runningtext Berhasil di Simpan');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('runningtext::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $runningtext = RunningText::findOrFail($id);
        return response()->json($runningtext);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'link'  => 'required',
            'descripsi' => 'required',
        ]);

        $runningtext = RunningText::findOrFail($id);

        $runningtext->title = $request->title;
        $runningtext->link = $request->link;
        $runningtext->desc = $request->descripsi;
        $runningtext->publish = $request->publish;

        $runningtext->save();

        Session::flash('success', 'Runningtext Berhasil di Update');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $runningtext = RunningText::findOrFail($id);

        $runningtext->delete();
        Session::flash('success', 'Runningtext Berhasil di Hapus');
        return redirect()->back();
    }
}
