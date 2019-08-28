<?php

//helper navigasi menu  BY DODI SETIAWAN
use Illuminate\Support\Facades\DB;


function menu_nav($type_user){
  $type = request()->segment(1);
  
  $menunav = '';
   $menus = DB::table('group_menus')
          ->leftJoin('menus', 'menus.id', '=', 'group_menus.id_menu')
          ->where('id_user_group', $type_user)
          ->select('group_menus.*', 'menus.*')
          ->orderBy('menus.urutan', 'asc')
          ->get();

    $i=0;
    foreach ($menus as $menu) {
     if(toogle($menu->id_menu, $type_user) > 0 && $menu->parrent == 0){
        $menunav .= '<li class="nav-item nav-item-submenu">';
        $menunav .= '<a href="#" class="nav-link">
                        <i class="'.$menu->icon_menu.'"></i> 
                        <span>
                          '.$menu->nama_menu.'
                          
                          </span>
                     </a>';

        $menunav .=	formatTree($menu->id_menu, $type_user);
				$menunav .= "</li>";
				
				
     }else{
       if($menu->parrent === 0){
         $menunav .= '<li class="nav-item">';
         $menunav .= '<a href="/'.$type.'/'.$menu->link.'" class="nav-link">
                        <i class="nav-icon '.$menu->icon_menu.'"></i>
												<span>
                        '.$menu->nama_menu.'
                        </span>
												</a>';
				 $menunav .= "</li>";
        }
     }

     $i++;
    }
    echo $menunav;
}

function toogle($id_menu, $user_id_group){   
    $menus = DB::table('menus')
              ->leftJoin('group_menus', 'group_menus.id_menu', '=', 'menus.id')
              ->where([
                        ['id_user_group', '=', $user_id_group],
                        ['parrent', '=', $id_menu],
                     ])
              ->select('group_menus.*', 'menus.*')
              ->get();

      return $menus->count();
}

function formatTree($id_parent,$user_id_group){
  $type = request()->segment(1);

  $menus = DB::table('menus')
              ->leftJoin('group_menus', 'group_menus.id_menu', '=', 'menus.id')
              ->where([
                        ['id_user_group', '=', $user_id_group],
                        ['parrent', '=', $id_parent],
                     ])
              ->select('group_menus.*', 'menus.*')
              ->orderBy('urutan', 'asc')
              ->get();

  $menunav = '<ul class="nav nav-group-sub" data-submenu-title="Layouts">';
  foreach($menus as $item){
      if(toogle($item->id_menu, $user_id_group) > 0){
        $menunav .= '<li class="nav-item nav-item-submenu">';
        $menunav .= '<a href="#" class="nav-link">
                        <i class="nav-icon '.$item->icon_menu.'"></i>
                          <span>'.$item->nama_menu.'</span>
                     </a>';
        $menunav.= formatTree($item->id_menu,$user_id_group);
        $menunav.= "</li>";

      }else{
        $menunav .= '<li class="nav-item">';
        $menunav .= '<a href="/'.$type.'/'.$item->link.'" class="nav-link">';
        $menunav .= '<i class="'.$item->icon_menu.' nav-icon "></i><p>'.$item->nama_menu.'</p></a>';
        $menunav.= "</li>";
      }
  }

  $menunav.= "</ul>";
  return $menunav;
}





function tree_menu(){

  // $type = request()->segment(1);
  
  $menunav = '';
    $menus = DB::table('menu_frontends')->orderBy('urutan', 'asc')->get();
          
    $i=0;
   
    $menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
    foreach ($menus as $menu) {
     if(toogle_menu($menu->id) > 0 && $menu->parrent == 0){
        $menunav .= '<li style="">'.$menu->nama_menu.'
                        <div class="btn-group dropright" style="margin-left: 30px">
                                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                                text-decoration: underline;">Option </button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <p onclick="getEditMenu('.$menu->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                                    
                               </div>
                        </div>';
       
        $menunav .=	formatTree_menu($menu->id);
				$menunav .= "</li>";
        
				
				
     }else{
       if($menu->parrent === 0){
         $menunav .= '<li style="padding-right:0px">
                        <a href="#"><i class="icon-circle2"></i> '.$menu->nama_menu.'</a> 
                        <div class="btn-group dropright" style="margin-left: 30px">
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                          text-decoration: underline;">Option </button>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <p onclick="getEditMenu('.$menu->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                            <p onclick="deleteMenu('.$menu->id.')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
                            <form method="POST" action="'.route('cms.frontendmenus.delete', ['id' => $menu->id]).'" style="float:left;margin-right: 10px;">
                            '.csrf_field().'
                            <button type="submit" id="submitDelete'.$menu->id.'" style="display: none"></button>
                            
                            
                            </form>
                            <div class="dropdown-divider"></div>
                            <p onclick="settingLink('.$menu->id.')" class="dropdown-item"><i class="icon-link"></i> Setting Link</p>

                          </div>
                          </div>  
                      </li>';				 
        }
     }

     $i++;
    }

    $menunav .= '<ul';
    echo $menunav;

}




function toogle_menu($id_menu){   
  $menus = DB::table('menu_frontends')
            ->where('parrent', $id_menu)
            ->get();

    return $menus->count();
}


function formatTree_menu($id_menu){


  $menus = DB::table('menu_frontends')
                ->where('parrent', $id_menu)
                ->orderBy('urutan', 'asc')
                ->get();

  $menunav = '<ul>';
  foreach($menus as $item){
      if(toogle_menu($item->id) > 0){
        $menunav .= '<li  style="padding-right:0px">'.$item->nama_menu.'
        <div class="btn-group dropright" style="margin-left: 30px">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
            text-decoration: underline;">Option </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
            <p onclick="getEditMenu('.$item->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                
          </div>
    </div>
        ';
        $menunav.= formatTree_menu($item->id);
        $menunav.= "</li>";

      }else{
        $menunav .= '<li  style="padding-right:0px">'.$item->nama_menu.'  
        <div class="btn-group dropright" style="margin-left: 30px">
        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
        text-decoration: underline;">Option </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
          <p onclick="getEditMenu('.$item->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
          <p onclick="deleteMenu('.$item->id.')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
          <div class="dropdown-divider"></div>
          <form method="POST" action="'.route('cms.frontendmenus.delete', ['id' => $item->id]).'" style="float:left;margin-right: 10px;">
          '.csrf_field().'
          <button type="submit" id="submitDelete'.$item->id.'" style="display: none"></button>
          
          
          </form>
          <p onclick="settingLink('.$item->id.')" class="dropdown-item"><i class="icon-link"></i> Setting Link</p>
     
        
        </div>
        </div>  ';
      
      }
  }

  $menunav.= "</ul>";
  return $menunav;
}




function tree_menu_backend(){

  // $type = request()->segment(1);
  
  $menunav = '';
    $menus = DB::table('menus')->orderBy('urutan', 'asc')->get();
          
    $i=0;
   
    $menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
    foreach ($menus as $menu) {
     if(toogle_menu_backend($menu->id) > 0 && $menu->parrent == 0){
        $menunav .= '<li style="">'.$menu->nama_menu.'
                        <div class="btn-group dropright" style="margin-left: 30px">
                                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                                text-decoration: underline;">Option </button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <p onclick="getEditMenu('.$menu->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>

                                    <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: '.$menu->link.'" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                                    
                               </div>
                        </div>';
       
        $menunav .=	formatTree_menu_backend($menu->id);
				$menunav .= "</li>";
        
				
				
     }else{
       if($menu->parrent === 0){
         $menunav .= '<li style="padding-right:0px">
                        <a href="#"><i class="icon-circle2"></i> '.$menu->nama_menu.'</a> 
                        <div class="btn-group dropright" style="margin-left: 30px">
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                          text-decoration: underline;">Option </button>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <p onclick="getEditMenu('.$menu->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                            <p onclick="deleteMenu('.$menu->id.')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
                            <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: '.$menu->link.'" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                            <form method="POST" action="'.route('menu.delete', ['id' => $menu->id]).'" style="float:left;margin-right: 10px;">
                            '.csrf_field().'
                            <button type="submit" id="submitDelete'.$menu->id.'" style="display: none"></button>
                            
                            
                            </form>
                           
                           

                          </div>
                          </div>  
                      </li>';				 
        }
     }

     $i++;
    }

    $menunav .= '<ul';
    echo $menunav;

}




function toogle_menu_backend($id_menu){   
  $menus = DB::table('menus')
            ->where('parrent', $id_menu)
            ->get();

    return $menus->count();
}


function formatTree_menu_backend($id_menu){


  $menus = DB::table('menus')
                ->where('parrent', $id_menu)
                ->get();

  $menunav = '<ul>';
  foreach($menus as $item){
      if(toogle_menu_backend($item->id) > 0){
        $menunav .= '<li  style="padding-right:0px">'.$item->nama_menu.'
        <div class="btn-group dropright" style="margin-left: 30px">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
            text-decoration: underline;">Option </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
            <p onclick="getEditMenu('.$item->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
            <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: '.$item->link.'" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                
          </div>
    </div>
        ';
        $menunav.= formatTree_menu_backend($item->id);
        $menunav.= "</li>";

      }else{
        $menunav .= '<li  style="padding-right:0px">'.$item->nama_menu.'  
        <div class="btn-group dropright" style="margin-left: 30px">
        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
        text-decoration: underline;">Option </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
          <p onclick="getEditMenu('.$item->id.')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
          <p onclick="deleteMenu('.$item->id.')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
          <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: '.$item->link.'" data-original-title="Info"><i class="icon-info22"></i> Info </p>
          
          <form method="POST" action="'.route('menu.delete', ['id' => $item->id]).'" style="float:left;margin-right: 10px;">
          '.csrf_field().'
          <button type="submit" id="submitDelete'.$item->id.'" style="display: none"></button>
          
          
          </form>
         
     
        
        </div>
        </div>  ';
      
      }
  }

  $menunav.= "</ul>";
  return $menunav;
}



function parrent_menu($parent = 0, $spacing = '', $category_tree_array = '') {
  
  if (!is_array($category_tree_array))
      $category_tree_array = array();

 
     
      $menus = DB::table('menus')
                ->where('parrent', $parent)
                ->orderBy('urutan', 'asc')
                ->get();
  
      if ($menus->count() > 0) {
        //  $style = 
         foreach ($menus as $menu)
         {
              
               $category_tree_array[] = (object)array("id" => $menu->id,"parrent" => $menu->parrent, "nama_menu" => $spacing . $menu->nama_menu);
               $category_tree_array = parrent_menu($menu->id, '&nbsp;&nbsp;&nbsp;&nbsp;'.$spacing . '-&nbsp;', $category_tree_array);
            
         }
      } 

      return $category_tree_array;
  }








  ////List Menu Backend

  function list_menu_backend(){

    // $type = request()->segment(1);
    
    $menunav = '';
      $menus = DB::table('menus')->orderBy('urutan', 'asc')->get();
            
      $i=0;
     
      $menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
      $menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(0, \'ROOT\')"> ROOT</li>';	
      
      foreach ($menus as $menu) {
       if(toogle_listmenu_backend($menu->id) > 0 && $menu->parrent == 0){
          $menunav .= '<li style=""><span  style="cursor:pointer" onclick="getMenu('.$menu->id.', \''.$menu->nama_menu.'\')">'.$menu->nama_menu.'</span>';
                          
         
          $menunav .=	formatlist_menu_backend($menu->id);
          $menunav .= "</li>";

       }else{
         if($menu->parrent === 0){
           $menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu('.$menu->id.', \''.$menu->nama_menu.'\')">
                          <a href="#"><i class="icon-circle2"></i> '.$menu->nama_menu.'</a> 
                         
                            
                        </li>';				 
          }
       }
  
       $i++;
      }
  
      $menunav .= '<ul';
      echo $menunav;
  
  }
  
  
  
  
  function toogle_listmenu_backend($id_menu){   
    $menus = DB::table('menus')
              ->where('parrent', $id_menu)
              ->get();
  
      return $menus->count();
  }
  
  
  function formatlist_menu_backend($id_menu){
  
  
    $menus = DB::table('menus')
                  ->where('parrent', $id_menu)
                  ->get();
  
    $menunav = '<ul>';
    foreach($menus as $item){
        if(toogle_listmenu_backend($item->id) > 0){
          $menunav .= '<li style="padding-right:0px;"><span style="cursor:pointer" onclick="getMenu('.$item->id.', \''.$item->nama_menu.'\')">'.$item->nama_menu.'</span>';
      
         
          $menunav.= formatlist_menu_backend($item->id);
          $menunav.= "</li>";
  
        }else{
          $menunav .= '<li  onclick="getMenu('.$item->id.', \''.$item->nama_menu.'\')" style="padding-right:0px;cursor:pointer">'.$item->nama_menu;
        
        }
    }
  
    $menunav.= "</ul>";
    return $menunav;
  }


  
  ////list menu frontend


  function list_tree_menu(){

    // $type = request()->segment(1);
    
    $menunav = '';
      $menus = DB::table('menu_frontends')->orderBy('urutan', 'asc')->get();
            
      $i=0;
     
      $menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
      $menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(0, \'ROOT\')"> ROOT</li>';	
      
      foreach ($menus as $menu) {
       if(toogle_list_menu($menu->id) > 0 && $menu->parrent == 0){
        $menunav .= '<li style=""><span  style="cursor:pointer" onclick="getMenu('.$menu->id.', \''.$menu->nama_menu.'\')">'.$menu->nama_menu.'</span>';
         
          $menunav .=	list_formatTree_menu($menu->id);
          $menunav .= "</li>";
          
          
          
       }else{
         if($menu->parrent === 0){
          $menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu('.$menu->id.', \''.$menu->nama_menu.'\')">
          <a href="#"><i class="icon-circle2"></i> '.$menu->nama_menu.'</a> 
         
                        </li>';				 
          }
       }
  
       $i++;
      }
  
      $menunav .= '<ul';
      echo $menunav;
  
  }
  
  
  
  
  function toogle_list_menu($id_menu){   
    $menus = DB::table('menu_frontends')
              ->where('parrent', $id_menu)
              ->get();
  
      return $menus->count();
  }
  
  
  function list_formatTree_menu($id_menu){
  
  
    $menus = DB::table('menu_frontends')
                  ->where('parrent', $id_menu)
                  ->orderBy('urutan', 'asc')
                  ->get();
  
    $menunav = '<ul>';
    foreach($menus as $item){
        if(toogle_list_menu($item->id) > 0){
          $menunav .= '<li style="padding-right:0px;"><span style="cursor:pointer" onclick="getMenu('.$item->id.', \''.$item->nama_menu.'\')">'.$item->nama_menu.'</span>';
          $menunav.= list_formatTree_menu($item->id);
          $menunav.= "</li>";
  
        }else{
          $menunav .= '<li  onclick="getMenu('.$item->id.', \''.$item->nama_menu.'\')" style="padding-right:0px;cursor:pointer">'.$item->nama_menu.'</li>';
         
        
        }
    }
  
    $menunav.= "</ul>";
    return $menunav;
  }
  
  