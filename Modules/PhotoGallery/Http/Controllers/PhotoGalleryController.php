<?php

namespace Modules\PhotoGallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Session;
use Image;
use Modules\PhotoGallery\Entities\PhotoGallery;
use Modules\PhotoGallery\Entities\AlbumPhoto;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class PhotoGalleryController extends Controller
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
        //check permisiion
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){

            if(isset($request->search)){
                $sess_search = Session::put('search_photogal', $request->search);
            }
            
            $sess_ = Session::get('search_photogal');

            if(isset($sess_)){
                $albumphoto= AlbumPhoto::searchAlbumphoto($sess_);
            }
            else{
                $albumphoto= AlbumPhoto::paginate(20);
            }


            $role = get_role(Auth::user()->id_user_group);
            return view('photogallery::index')
                    ->with('album_photos', $albumphoto)
                    ->with('role', $role);
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

        if(get_role(Auth::user()->id_user_group)['insert'] != 'FALSE'){
            
            $data = array(
                'title' => 'Tambah Album Photo',
                'btn_submit'    => 'Simpan'
            );
            return view('photogallery::create_edit')->with('route', route('album_photo.store'))->with($data);
        }else{
            return redirect('forbidden');
        }
        
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'albumphoto_name'   => 'required|max:255',
            'publish'   => 'required|max:1'
        ]);

        AlbumPhoto::create([
            'albumphoto_name'   => $request->albumphoto_name,
            'albumphoto_desc'   => $request->albumphoto_desc,
            'albumphoto_desc_eng'   => $request->albumphoto_desc_eng,
            'create_author'   => Auth::user()->name,
            'sys_user_name'   => Auth::user()->sys_user_name,
            'publish'   => $request->publish,
        ]);

        Session::flash('success', 'Album Photo Berhasil Di Tambahkan');
        return redirect()->route('album_photo.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('photogallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        if(get_role(Auth::user()->id_user_group)['update'] != 'FALSE'){
            $album = AlbumPhoto::findOrFail($id);
            $data = array(
                'title' => 'Update Album Photo',
                'btn_submit'    => 'Update'
            );
            return view('photogallery::create_edit')
                    ->with('album_photo', $album)
                    ->with('route', route('album_photo.update', ['id' => $id]))
                    ->with($data);
        }else{
            return redirect('forbidden');
        }

        
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
            'albumphoto_name'   => 'required|max:255',
            'publish'   => 'required|max:1'
        ]);

        $album = AlbumPhoto::findOrFail($id);
        
        $album->albumphoto_name = $request->albumphoto_name;
        $album->albumphoto_desc = $request->albumphoto_desc;
        $album->albumphoto_desc_eng = $request->albumphoto_desc_eng;
        $album->create_author = Auth::user()->name;
        $album->sys_user_name = Auth::user()->sys_user_name;
        $album->publish = $request->publish;

       $album->save();

        Session::flash('success', 'Album Photo Berhasil Di Update');
        return redirect()->route('album_photo.index');


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $album = AlbumPhoto::findOrFail($id);

        $album->delete();

        Session::flash('success', 'Album Photo Berhasil Di Hapus');
        return redirect()->back();
    }

    public function galery($id){
        if(get_role(Auth::user()->id_user_group)['read'] != 'FALSE'){
            $role = get_role(Auth::user()->id_user_group);
            return view('photogallery::image_galery')
                    ->with('photo_galeries', AlbumPhoto::findOrFail($id)->photogalleries)
                    ->with('role', $role)
                    ->with('route', route('album_photo.image_galleries.store', ['id' => $id]));
        }else{
            return redirect('forbidden');
        }
        
    }


    public function galery_store(Request $request, $id){
        
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);

         $imgdir = '/images/image_galleries/images/';
         $imgthumb = '/images/image_galleries/thumbnail/';

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

        $photo_galery = new PhotoGallery();
        $photo_galery->file_foto = $newName;
        $photo_galery->create_author = Auth::user()->name;
        $photo_galery->sys_user_name = Auth::user()->username;
        $photo_galery->publish  = $request->publish;
        $photo_galery->id_albumphoto  = $id;
        $photo_galery->save();
        
        Session::flash('success', 'Photo Berhasil di Upload');
        return redirect()->back();

    }

    public function galery_delete($id){
        $photo = PhotoGallery::findOrFail($id);
        $photo->delete();
        Session::flash('success', 'Photo Berhasil di Hapus');
        return redirect()->back();
    }


    public function galery_update(Request $request, $id){
        $photo = PhotoGallery::findOrFail($id);
        $photo->publish = $request->publish;
        $photo->save();

        if($request->publish == 'Y'){
            $alert = 'Photo Berhasil Di Publish';
        }else{
            $alert = 'Photo Berhasil Di Unpublish';
        }

        Session::flash('success', $alert);
        return redirect()->back();
    }
}
