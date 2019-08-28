<?php

namespace Modules\MenuFrontend\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseApiController as BaseController;

class TreeMenuFrontendController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('menufrontend::index');
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
        //
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
        return view('menufrontend::edit');
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
        //
    }

    public function frontendnav(){

             $menus = DB::table('menu_frontends')
                        ->orderBy('urutan', 'asc')
                        ->get();
          
              $i=0;
              $menulist = [];
              foreach ($menus as $menu) {
               if($this->toogle_frontend($menu->id) > 0 && $menu->parrent == 0){
                $menulist[] = array(
                    'id_menu'   => $menu->id,
										'nama_menu' => $menu->nama_menu,
										'link'			=> $menu->link,
                    'child'     => $this->formatTree_frontend($menu->id)

                );
                     
               }else{
                 if($menu->parrent === 0){
                     $menulist[] = array(
                         'id_menu'  => $menu->id,
												 'nama_menu'    => $menu->nama_menu,
												 'link'			=> $menu->link,
												 'child'		=> 0
										 );
                  }
               }
          
               $i++;
              }
              return $this->sendResponse((array)$menulist, 'Menu Retrieved successfully');
       
    }

    function toogle_frontend($id_menu){   
        $menus = DB::table('menu_frontends')
                  ->where('parrent', $id_menu)
                  ->get();
    
          return $menus->count();
    }

    function formatTree_frontend($id_parent){
      
        $menus = DB::table('menu_frontends')
                    ->where([
                              ['parrent', '=', $id_parent],
                           ])
                    ->orderBy('urutan', 'asc')
                    ->get();
        $menulist2 = [];
        foreach($menus as $item){
            if($this->toogle_frontend($item->id) > 0){
            
                $menulist2[] = array(
                    'id_menu'   => $item->id,
										'nama_menu' => $item->nama_menu,
										'link'			=> $item->link,
                    'child'     => $this->formatTree_frontend($item->id)

                );
            }else{
              
              $menulist2[] = array(
								'id_menu'  => $item->id,
								'nama_menu'    => $item->nama_menu,
								'link'			=> $item->link,
								'child'		=> 0
							);
            }
        }
      

        return $menulist2;
      }
      
    
}
