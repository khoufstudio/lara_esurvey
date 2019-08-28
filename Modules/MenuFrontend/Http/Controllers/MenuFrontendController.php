<?php

namespace Modules\MenuFrontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MenuFrontend\Entities\MenuFrontend;
use Modules\Page\Entities\Page;
use Modules\BlogCategory\Entities\BlogCategory;
use Illuminate\Support\Facades\Auth;

use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MenuFrontendController extends Controller
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
            return view('menufrontend::index')->with('frontendmenus', MenuFrontend::paginate(10))->with('parrents', MenuFrontend::all());
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
        return view('menufrontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required|max:100',
            // 'link'      => 'required|max:50',
            'urutan'    => 'required'
        ]);

        MenuFrontend::create([
            'nama_menu' => $request->nama_menu,
            'parrent'   => $request->parrent,
            'nama_parrent'   => $request->nama_parrent,
            'urutan'    => $request->urutan
        ]);

        Session::flash('success', 'Menu berhasil simpan');
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('menufrontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $menu = MenuFrontend::findOrFail($id);
        return response()->json($menu);
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
            'nama_menu' => 'required|max:100',
            'urutan'    => 'required'
        ]);
        $menu = MenuFrontend::findOrFail($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->parrent = $request->parrent;
        $menu->nama_parrent = $request->nama_parrent;
        $menu->urutan = $request->urutan;

        $menu->save();

        Session::flash('success', 'Menu berhasil di Ubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = MenuFrontend::findOrFail($id);

        $menu->delete();

        Session::flash('success', 'Menu berhasil di Hapus');
        return redirect()->back();

    }


    public function setting_link($id){
        $menu = MenuFrontend::findOrFail($id);
        return response()->json($menu);
    }


    public function topages(){
        $pages = Page::paginate(10);
        return view('menufrontend::list_pages')->with('pages', $pages);
    }

    public function to_blog_categories(){
        $blog_categories = BlogCategory::paginate(10);
        return view('menufrontend::list_blogcategories')->with('blog_categories', $blog_categories);
    }


    public function setting_link_save(Request $request, $id){
        // dd($request->all());

        $menu = MenuFrontend::findOrFail($id);
        $this->validate($request, [
            'id_kategori' => 'required',
            'link'  => 'required'
        ]);

        if($request->id_kategori == '4'){
            $link_d = substr($request->link, 0, 5);
            if($link_d == "https" || $link_d == "http:"){
                $url = $request->link;
            }else{
                $url = 'http://'.$request->link;
            }
        }else{
            $url = $request->link;
        }
       
        

        $menu->link = $url;
        $menu->kategori = $request->id_kategori;

        if($request->id_kategori == 4){
            $menu->nama_link = $request->link; 
        }else{

            $menu->nama_link = $request->name_link;
        }

        $menu->save();

        Session::flash('success', 'Menu Berhasil di Link-kan');
        return redirect()->back();

    }


    public function list_menu_frontend(){
        return view('menufrontend::list_menu');
    }
}
