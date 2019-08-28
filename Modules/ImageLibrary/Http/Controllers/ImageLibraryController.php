<?php

namespace Modules\ImageLibrary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ImageLibrary\Entities\ImageLibrary;

use Session;
use Image;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class ImageLibraryController extends Controller
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
			return view('imagelibrary::index')
			->with('imagelibraries', ImageLibrary::paginate(24)->where('id_user', Auth::user()->id));
		}
        
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('imagelibrary::create');
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
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:5120'
         ]);
        
        $imgdir = '/images/media/images/';
        $imgthumb = '/images/media/thumbnail/';

        if (!file_exists(public_path().$imgdir)) {
            mkdir(public_path().$imgdir, 0755, true);
        }

        if (!file_exists(public_path().$imgthumb)) {
            mkdir(public_path().$imgthumb, 0755, true);
        }
        


        $originalImage  = $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath  = public_path().$imgthumb;
        $originalPath   = public_path().$imgdir;
        $newName        = time().$originalImage->getClientOriginalName();
        $thumbnailImage->save($originalPath.$newName);
        $thumbnailImage->resize(400,400);
        $thumbnailImage->save($thumbnailPath.$newName); 

        $photo_galery = new ImageLibrary();

        $photo_galery->nama_image = $request->title;
        $photo_galery->path = $newName;
        $photo_galery->id_user = Auth::user()->id;
        $photo_galery->publish  = $request->publish;
        $photo_galery->save();
        
        Session::flash('success', 'Gambar Berhasil di Upload');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('imagelibrary::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('imagelibrary::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $image = ImageLibrary::findOrFail($id);

        $image->delete();

        Session::flash('success', 'Gambar Berhasil di Hapus');
        return redirect()->back();
    }
}
