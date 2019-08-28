<?php

namespace Modules\JenisSurat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Storage;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\JenisSurat\Entities\JenisSurat;


class JenisSuratController extends Controller
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
                $sess_search = Session::put('search_jenissurat', $request->search);
            }

            $sess_ = Session::get('search_jenissurat');

            if (isset($sess_)) {
                $jenis = JenisSurat::searchJenisSurat($sess_);
            } else {
                $jenis = JenisSurat::paginate(10);
            }

            $role = get_role(Auth::user()->id_user_group);
            return view('jenissurat::index')
                        ->with('jeniss', $jenis)    
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
        return view('jenissurat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_surat' => 'required|max:191',
            'jenis_surat' => 'required',
            'status' => 'required',
        ]);


        JenisSurat::create([
            'nama_surat' => $request->nama_surat,
            'id_jenis' => $request->jenis_surat,
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
        return view('jenissurat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $jenissurat = JenisSurat::findOrFail($id);
        return response()->json($jenissurat);
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
            'nama_surat' => 'required|max:191',
            'jenis_surat' => 'required',
            'status' => 'required',
        ]);

        $jenissurat = JenisSurat::findOrFail($id);
        $jenissurat->nama_surat = $request->nama_surat;
        $jenissurat->id_jenis = $request->jenis_surat;
        $jenissurat->status = $request->status;

        $jenissurat->save();
    

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
        $jenis = JenisSurat::findOrFail($id);

        $jenis->delete();

        Session::flash('success', 'Jenis Surat Succefully Deleted');
        return redirect()->back();
    }


    public function getSuratKeluar($id){
        $jenis = JenisSurat::getJenisSurat($id);
        echo '<option value="" selected disabled>Pilih Jenis Surat</option>';
        foreach($jenis as $js){
            echo '<option value="'.$js->id.'">'.$js->nama_surat.'</option>';
        }

    }
}
