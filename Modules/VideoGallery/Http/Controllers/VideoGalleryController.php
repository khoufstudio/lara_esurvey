<?php

namespace Modules\VideoGallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Session;
use Image;
use Modules\VideoGallery\Entities\VideoGallery;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class VideoGalleryController extends Controller
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
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){
            $role = get_role(Auth::user()->id_user_group);
            return view('videogallery::index')
                    ->with('videos', VideoGallery::paginate(10))
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
        return view('videogallery::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_video' => 'required|max:100',
            'link'  => 'required|max:255'

        ]);
        
        VideoGallery::create([
            'video_name'      => $request->nama_video,
            'link'            => $request->link,
            'create_author'   => Auth::user()->name,
            'sys_user_name'   => Auth::user()->sys_user_name,
            'publish'         => $request->publish,
        ]);

        Session::flash('success', 'Data Video Berhasil Di Tambahkan');
        return redirect()->back();

        // dd($request->all());

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('videogallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $video = VideoGallery::findOrFail($id);

        return response()->json($video);
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
            'nama_video' => 'required|max:100',
            'link'  => 'required|max:255'

        ]);

        $video = VideoGallery::findOrFail($id);

        $video->video_name      = $request->nama_video;
        $video->link            = $request->link;
        $video->create_author   = Auth::user()->name;
        $video->sys_user_name   = Auth::user()->sys_user_name;
        $video->publish         = $request->publish;

        $video->save();

        Session::flash('success', 'Data Video Berhasil Di Update');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $video = VideoGallery::findOrFail($id);

        $video->delete();

        Session::flash('success', 'Data Video Berhasil Di Hapus');
        return redirect()->back();
    }
}
