<?php

namespace Modules\FileCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\FileCategory\Entities\FileCategory;
use Session;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class FileCategoryController extends Controller
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
    
    public function index()
    {   
        if(get_role(Auth::user()->id_user_group) != "FALSE"){
            return view('filecategory::index')->with('file_categories', FileCategory::paginate(10));
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
        return view('filecategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori'  => 'required|max:100',
        ]);

        FileCategory::create([
            'nama_kategori'  => $request->nama_kategori
        ]);

        Session::flash('success', 'File Kategori Berhasil di Simpan');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('filecategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $filekategori = FileCategory::findOrFail($id);

        return response()->json($filekategori);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $fileKategori = FileCategory::findOrFail($id);

        $this->validate($request, [
            'nama_kategori'  => 'required|max:100'
        ]);

        $fileKategori->nama_kategori = $request->nama_kategori;
        $fileKategori->save();

        Session::flash('success', 'Blog Kategori Berhasil di Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = FileCategory::findOrFail($id);

        $category->delete();

        
        Session::flash('success', 'File Kategori Berhasil di Hapus');
        return redirect()->back();
    }
}
