<?php

namespace Modules\BankMateri\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\JenisSurat\Entities\JenisSurat;
use Modules\Direktorat\Entities\Direktorat;
use Modules\Direktorat\Entities\Subdit;
use Modules\BankMateri\Entities\BankMateri;

class BankMateriController extends Controller
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

						

						if(isset($request->direktorat)){
							Session::put('sess_direktorat', $request->direktorat);
						}

						if(isset($request->direktorat)){
							Session::put('sess_direktorat', $request->direktorat);
						}

						if(isset($request->subdit)){
							Session::put('sess_subdit', $request->subdit);
						}

						if(isset($request->kategori_surat)){
							Session::put('sess_kategori_surat', $request->kategori_surat);
						}

						
						if(isset($request->jenis_surat)){
							Session::put('sess_jenis_surat', $request->jenis_surat);
						}

						if(isset($request->status)){
							Session::put('sess_status', $request->status);
						}

						if(isset($request->pdari)){
							Session::put('sess_periodedari', $request->pdari);
                        }
                        
						if(isset($request->psampai)){
							Session::put('sess_periodesampai', $request->psampai);
						}
					
						if(isset($request->keyword)){
							Session::put('sess_keyword', $request->keyword);
						}
						
						
						$sess_direktorat = Session::get('sess_direktorat');
						$sess_subdit = Session::get('sess_subdit');
						$sess_kategori_surat = Session::get('sess_kategori_surat');
						$sess_jenis_surat = Session::get('sess_jenis_surat');
						$sess_status = Session::get('sess_status');
						$sess_periodedari = Session::get('sess_periodedari');
						$sess_periodesampai = Session::get('sess_periodesampai');
						$sess_keyword = Session::get('sess_keyword');


						if(@$sess_direktorat || @$sess_subdit || @$sess_kategori_surat || @$sess_jenis_surat || @$sess_status || @$sess_periodedari || @$sess_periodesampai || @$sess_keyword){
							$arsips = BankMateri::searchArcips($sess_direktorat, $sess_subdit, $sess_kategori_surat, $sess_jenis_surat, $sess_status, $sess_periodedari, $sess_periodesampai, $sess_keyword);
						}
						else{
							$arsips= BankMateri::getArsips();
						}

						// dd($arsips);
						// die;
            $role = get_role(Auth::user()->id_user_group);
            return view('bankmateri::index')
                    ->with('arsips', $arsips)
                    ->with('jenis_surat', JenisSurat::getSuratMasuk())
                    ->with('direktorats', Direktorat::all())
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

        if (get_role(Auth::user()->id_user_group)['insert'] != 'FALSE') {
            return view('bankmateri::create_edit')
                ->with('route', route('bankmateri.store'))
                ->with('editpage', false)
                ->with('jenis_surat', JenisSurat::getSuratMasuk())
                ->with('direktorats', Direktorat::all());
        } else {
            return redirect('forbidden');
        }

        // return view('bankmateri::create_edit');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_surat' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'no_surat' => 'required',
            'tgl' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:10000',
            'direktorat' => 'required',
            'subdit' => 'required',
            'masa_aktif' => 'required',
            'status' => 'required',
        ]);

        $uploadfile = $request->file('file_surat');
        $path = $uploadfile->store('public/arsip_files');

        BankMateri::create([
            'kategori' => $request->kategori_surat,
            'jenis_surat' => $request->jenis_surat,
            'perihal' => $request->perihal,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl,
            'direktorat' => $request->direktorat,
            'subdit' => $request->subdit,
            'masa_aktif' => $request->masa_aktif,
            'file_doc' => $path,
            'ket' => $request->ket,
            'status' => $request->status,
        ]);


        Session::flash('success', 'Arsip Created Succefully');
        return redirect()->route('bankmateri');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('bankmateri::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $arsip = BankMateri::findOrFail($id);
            return view('bankmateri::create_edit')
                            ->with('arsip', $arsip)
                            ->with('editpage', true)
                            ->with('jenis_surat', JenisSurat::getSuratMasuk())
                            ->with('direktorats', Direktorat::all())
                            ->with('route', route('bankmateri.update', ['id' => $id]));
        return view('bankmateri::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        //
    }

    public function getSubdit($id){
        $subdit = Subdit::getSubdit($id);

        echo '<option value="" selected disabled>Pilih Subdit</option>';
        foreach($subdit as $js){
            echo '<option value="'.$js->id.'">'.$js->nama_subdit.'</option>';
        }
    }
}
