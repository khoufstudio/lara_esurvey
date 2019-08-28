<?php

namespace Modules\Berita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Berita\Entities\Berita;
use Modules\Berita\Entities\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;


class BeritaController extends Controller
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
            return view('berita::index')->with('beritas', Berita::paginate(3))->with('role', $role);
        
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

            return view('berita::create_edit')->with('route', route('berita.store'));
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
            'title' => 'required',
            'image' => 'required|image',
            'description'   => 'required',
        ]);

        $image = $request->image;
        $new_name_image = time().$image->getClientOriginalName();
        $image->move('images/posts/', $new_name_image);

        $post = Berita::create([
            'title' => $request->title,
            'image' => 'images/posts/'.$new_name_image,
            'description'   => $request->description,
        ]);

        Session::flash('success', 'Post Created Succefully');
        return redirect()->route('berita.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('berita::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if(get_role(Auth::user()->id_user_group)['update'] != 'FALSE'){
            $berita = Berita::findOrFail($id);
            return view('berita::create_edit')->with('berita', $berita)->with('route', route('berita.update', ['id' => $berita->id]));
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
            'title' => 'required',
            // 'image'   => 'required',
            'description'   => 'required',
            
        ]);

        $berita = Berita::findOrFail($id);

        if($request->hasFile('image')){
            $image = $request->image;

            $new_image = time().$image->getClientOriginalName();

            $image->move('images/posts/', $new_image);

            $berita->image = 'images/posts/'.$new_image;
            
        }


        $berita->title = $request->title;
        $berita->description = $request->description;
        $berita->save();

        Session::flash('success', 'Post Succesfully updated!');

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        Session::flash('success', 'Berita Berhasil di Hapus!');
        return redirect()->back();
    }

    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'id_berita' => $id,
            'comment'   => $request->comment,
        ]);

        Session::flash('success', 'Komentar berhasil di tambahkan');
        return redirect()->back();
    }
}
