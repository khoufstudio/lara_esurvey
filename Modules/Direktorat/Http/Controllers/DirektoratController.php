<?php

namespace Modules\Direktorat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Storage;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Direktorat\Entities\Direktorat;
use Modules\Direktorat\Entities\Subdit;

class DirektoratController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (get_role(Auth::user()->id_user_group) != 'FALSE') {

            if (isset($request->search)) {
                $sess_search = Session::put('search_direktorat', $request->search);
            }

            $sess_ = Session::get('search_direktorat');

            if (isset($sess_)) {
                $direktorat = Direktorat::searchDirektorat($sess_);
            } else {
                $direktorat = Direktorat::paginate(10);
            }

            $role = get_role(Auth::user()->id_user_group);
            return view('direktorat::index')
                        ->with('direktorats', $direktorat)    
                        ->with('role', $role);
        } else {
            return redirect('forbidden');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('direktorat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_direktorat' => 'required|max:191',
            'status' => 'required',
        ]);


        Direktorat::create([
            'nama_direktorat' => $request->nama_direktorat,
            'status' => $request->status,
        ]);


        Session::flash('success', 'Subdit Created Succefully');
        return redirect()->back();

        // dd($request)->all();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('direktorat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $direktorat = Direktorat::findOrFail($id);
        return response()->json($direktorat);
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
            'nama_direktorat' => 'required|max:191',
            'status' => 'required',
        ]);

        $direktorat = Direktorat::findOrFail($id);

        $direktorat->nama_direktorat = $request->nama_direktorat;
        $direktorat->status = $request->status;

        $direktorat->save();

        Session::flash('success', 'Direktorat Succefully Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $direktorat = Direktorat::findOrFail($id);

        $direktorat->delete();

        Session::flash('success', 'Direktorat Succefully Deleted');
        return redirect()->back();
    }



    //Subdit

    public function subdit_index(Request $request, $id){
        if (get_role(Auth::user()->id_user_group)['insert'] != 'FALSE') {

            if (isset($request->search)) {
                $sess_search = Session::put('search_subdit', $request->search);
            }

            $sess_ = Session::get('search_subdit');

            if (isset($sess_)) {
                $subdit = Subdit::searchSubdit($sess_, $id);
            } else {
                $subdit = Subdit::where('id_direktorat', $id)->paginate(10);
                // $subdit = Subdit::paginate(10);
            }

            // $id_directorat = $id;
            $role = get_role(Auth::user()->id_user_group);
            return view('direktorat::subdit_index')
                        ->with('subdits', $subdit)    
                        ->with('role', $role)
                        ->with('id_direktorat', $id);








        } else {
            return redirect('forbidden');
        }
    }

   
}
