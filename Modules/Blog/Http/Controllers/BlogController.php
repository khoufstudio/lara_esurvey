<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Modules\Blog\Entities\Blog;
use Modules\BlogCategory\Entities\BlogCategory;
use Illuminate\Support\Facades\Storage;



class BlogController extends Controller
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
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){
            if(isset($request->search)){
                $sess_search = Session::put('search_blog', $request->search);
            }
            
            $sess_ = Session::get('search_blog');

            if(isset($sess_)){
                $blogs= Blog::searchBlog($sess_);
            }
            else{
                $blogs= Blog::paginate(20);
            }


            $role = get_role(Auth::user()->id_user_group);
            return view('blog::index')
                        ->with('blogs', $blogs)
                        ->with('categories', BlogCategory::all())
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
        // if(get_role(Auth::user()->id_user_group)['insert'] != 'FALSE'){
            return view('blog::create_edit')
                ->with('categories', BlogCategory::all())
                ->with('route', route('cms.blog.store'));
        // }else{
        //     return redirect('forbidden');   
        // }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'category'  => 'required',
            'content'   => 'required|max:5000',
            // 'content_eng'   => 'required|max:5000',
            'publish'   => 'required|max:2',
        ]);
            
        if($request->hasFile('image')){ 
            $image = $request->image;
            $newName_image = time().$image->getClientOriginalName();
    
            $image->move('images/blog_post/', $newName_image);
            $path = 'images/blog_post/'.$newName_image;
        }else{
            $path = '';
        }
       

        $blog = Blog::create([
            'blog_name' => $request->title,
            'category' => $request->category,
            'blog_desc' => $request->content,
            'blog_desc_eng' => $request->content_eng,
            'publish' => $request->publish,
            'file_foto' => $path,
            'create_author' => Auth::user()->name,
            'post_slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Post Created Succefully');
        return redirect()->route('cms.blog.post');

      
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        // if(get_role(Auth::user()->id_user_group)['update'] != 'FALSE'){
            $blog = Blog::findOrFail($id);
            return view('blog::create_edit')
                            ->with('blog', $blog)
                            ->with('categories', BlogCategory::all())
                            ->with('route', route('cms.blog.update', ['id' => $id]));
        // }else{
        //     return view('forbidden');
        // }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'category'  => 'required',
            'content'   => 'required|max:5000',
            // 'content_eng'   => 'required|max:5000',
            'publish'   => 'required|max:2',
        ]);


        if($request->hasFile('image')){
            if(file_exists($blog->file_foto)){
                unlink($blog->file_foto);
            }
    
            $image = $request->image;
            $newName_image = time().$image->getClientOriginalName();
            
            $image->move('images/blog_post/', $newName_image);

            $blog->file_foto = 'images/blog_post/'.$newName_image;

        }

        $blog->blog_name = $request->title;
        $blog->category = $request->category;
        $blog->blog_desc = $request->content;

        $blog->blog_desc_eng = $request->content_eng;
        $blog->publish = $request->publish;
        $blog->create_author = Auth::user()->name;
        $blog->post_slug = str_slug($request->title);

        $blog->save();

        Session::flash('success', 'Post Berhasil Di Update');
        return redirect()->route('cms.blog.post');

        // dd($request->all());
       
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if(file_exists($blog->file_foto)){
            unlink($blog->file_foto);
        }

        $blog->delete();

        Session::flash('success', 'Post Berhasil Di Hapus');
        return redirect()->route('cms.blog.post');

    }
}
