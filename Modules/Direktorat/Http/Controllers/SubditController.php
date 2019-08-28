<?php

namespace Modules\Direktorat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Storage;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Direktorat\Entities\Subdit;

class SubditController extends Controller
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
    public function index(Request $request, $id)
    {
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
            return view('direktorat::index')
                        ->with('subdits', $subdit)    
                        ->with('role', $role)
                        ->with('id_direktorat', $id);








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
            'nama_subdit' => 'required|max:191',
            'id_direktorat' => 'required',
            'status' => 'required',
        ]);


        Subdit::create([
            'nama_subdit' => $request->nama_subdit,
            'id_direktorat' => $request->id_direktorat,
            'status' => $request->status,
        ]);


        Session::flash('success', 'Subdit Created Succefully');
        return redirect()->back();
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
        $subdit = Subdit::findOrFail($id);
        return response()->json($subdit);
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
            'nama_subdit' => 'required|max:191',
            'id_direktorat' => 'required',
            'status' => 'required',
        ]);

				$subdit = Subdit::findOrFail($id);

				$subdit->nama_subdit = $request->nama_subdit;
        $subdit->status = $request->status;
        $subdit->id_direktorat = $request->id_direktorat;

        $subdit->save();

        Session::flash('success', 'Subdit Succefully Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
			$direktorat = Subdit::findOrFail($id);

			$direktorat->delete();

			Session::flash('success', 'Subdit Succefully Deleted');
			return redirect()->back();
    }
}
