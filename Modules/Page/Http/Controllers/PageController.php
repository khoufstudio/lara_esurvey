<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Modules\Page\Entities\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
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
        // dd(get_role(Auth::user()->id_user_group));
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){

            if(isset($request->search)){
                $sess_search = Session::put('search_page', $request->search);
            }
            
            $sess_ = Session::get('search_page');

            if(isset($sess_)){
                $pages= Page::searchPage($sess_);
            }
            else{
                $pages= Page::paginate(20);
            }

            $role = get_role(Auth::user()->id_user_group);
            return view('page::index')->with('pages', $pages)->with('role', $role);
        
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
            return view('page::create_edit')->with('route', route('cms.page.store'));

                   
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
            'title' => 'required|max:200',
            'content'   => 'required',
            'content_eng'   => 'required',
            'publish'   => 'required',
        ]);
        
        if($request->hasFile('image')){ 
            $image = $request->image;
            
            $new_name_image = time().$image->getClientOriginalName();
            $image->move('images/posts/', $new_name_image);
            $path_image ='images/posts/'.$new_name_image;
        }else{
            $path_image = '';
        }
        Page::create([
            'pages_name' => $request->title,
            'file_foto' => $path_image,
            'pages_desc'   => $request->content,
            'pages_desc_eng'   => $request->content_eng,
            'publish'   => $request->publish,
            'create_author' => Auth::user()->name
        ]);

        Session::flash('success', 'Page Created Succefully');
        return redirect()->route('cms.pages');

      
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('page::create_edit')
                ->with('page', $page)
                ->with('route', route('cms.page.update', ['id' => $id]));
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
            'title' => 'required|max:200',
            'content'   => 'required',
            'content_eng'   => 'required',
            'publish'   => 'required',
        ]);
            
        
        $page = Page::findOrFail($id);
        if($request->hasFile('image')){
            // Storage::delete($page->file_foto);

            $image = $request->image;
            $new_name_image = time().$image->getClientOriginalName();
            $image->move('images/posts/', $new_name_image);

            $page->file_foto = 'images/posts/'.$new_name_image;
        }

        $page->pages_name = $request->title;
        $page->pages_desc = $request->content;
        $page->pages_desc_eng = $request->content_eng;
        $page->publish = $request->publish;
        $page->create_author =Auth::user()->name;

        $page->save();

        Session::flash('success', 'Page Berhasil di Update');
        return redirect()->route('cms.pages');


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        Session::flash('success', 'Page Berhasil di Hapus');
        return redirect()->back();
    }
}
