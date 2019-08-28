<?php

namespace Modules\FileLibrary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


use Session;
use Image;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Modules\FileLibrary\Entities\FileLibrary;
use Illuminate\Support\Facades\Storage;

class FileLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use ValidatesRequests;
    public function index()
    {
        return view('filelibrary::index')->with('filelibrary', FileLibrary::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('filelibrary::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required|max:100',
            'filename' => 'file|required|mimes:pdf|'
         ]);
         

         $uploadfile = $request->file('filename');
         $path = $uploadfile->store('public/files');
         
         FileLibrary::create([
            'nama_file' => $request->title,
            'id_user'   =>  Auth::user()->id,
            'path'      =>  $path,
         ]);

        Session::flash('success', 'File Berhasil di upload');
        return redirect()->back();

         
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('filelibrary::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('filelibrary::edit');
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
        $file = FileLibrary::findOrFail($id);

        $file->delete();
        Storage::delete($file->path);

        Session::flash('success', 'File Berhasil di Hapus');
        return redirect()->back();

    }
}
