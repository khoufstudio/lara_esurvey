<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Illuminate\Support\Facades\Auth;


use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;




class MenuController extends Controller
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
            return view('menu::index')->with('menus', Menu::paginate(10))->with('parrents', Menu::all());
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
        return view('menu::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'urutan'   => 'required|integer',
            'link'      => 'required|max:50',
            'icon_menu' => 'max:100'
        ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'parrent'   => $request->parrent,
            'nama_parrent'   => $request->nama_parrent,
            'link'      => $request->link,
            'icon_menu' => $request->icon_menu,
            'urutan'    => $request->urutan,
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
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
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
        // dd($request->all());
        $menu = Menu::findOrFail($id);

        $menu->nama_menu = $request->nama_menu;
        $menu->parrent = $request->parrent;
        $menu->nama_parrent = $request->nama_parrent;
        $menu->link = $request->link;
        $menu->icon_menu = $request->icon_menu;
        $menu->urutan = $request->urutan;

        $menu->save();

        Session::flash('success', 'Menu berhasil di update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();

        Session::flash('success', 'Menu berhasil di hapus!');
        return redirect()->back();
    }

    public static function getParent($id_menu){     
        return Menu::get_parrent($id_menu);
    }

    public static function get_parrentall($id_menu){     
        return Menu::get_parrent_all($id_menu);
    }


    public function list_menu(){
        return view('menu::list_menu');
    }

   
}
