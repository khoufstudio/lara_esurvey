<?php

namespace Modules\BlogCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\BlogCategory\Entities\BlogCategory;
use Session;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
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
        return view('blogcategory::index')->with('categories', BlogCategory::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blogcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|max:100'
        ]);

        BlogCategory::create([
            'nama'  => $request->nama
        ]);

        Session::flash('success', 'Blog Kategori Berhasil di Simpan');
        return redirect()->back();


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blogcategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $blogKategori = BlogCategory::findOrFail($id);
        return response()->json($blogKategori);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $blogKategori = BlogCategory::findOrFail($id);

        $this->validate($request, [
            'nama'  => 'required|max:100'
        ]);

        $blogKategori->nama = $request->nama;
        $blogKategori->save();

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
        $blogKategori = BlogCategory::findOrFail($id);

        $blogKategori->delete();
        Session::flash('success', 'Blog Kategori Berhasil di Hapus');
        return redirect()->back();
    }
}
