<?php

use Illuminate\Support\Facades\DB;


function get_role($iduser, $action = null) {
  $LINK = request()->segment(2);
  // return $LINK;
  // die;
  $idmenu = DB::table('menus')->where('link', $LINK)->first();

  if(isset($idmenu->id)){
    $idmenu = $idmenu->id;

    $query = DB::table('group_menus')->select('group_menus.role')
                                    ->where('id_user_group', $iduser)
                                    ->where('id_menu', $idmenu)->first();

    if(isset($query->role)){
      $data = decode_role($query->role);
      
      if ($action == null) {
        return $data;
      } else {
        permission_role($query->role, $action);

      } 
    }else{
      return 'FALSE';
    }
  }else{
    echo '<h1 style="color:red;font-size: 50px">404</h1>Opsss, page or menu not register';
    exit();
  }
	
}

function permission_role($role, $action) {
	switch ($action) {
		case 'access':
		$find   = 'A';
    break;
		case 'insert':
		$find   = 'C';
    break;
    
    case 'read':
		$find   = 'R';
		break;

		case 'update':
		$find   = 'U';
		break;

		case 'delete':
		$find   = 'D';
		break;

		default:
		$find	 = 'ZZ';
		break;
		}
		$pos = strpos($role, $find);
		if ($pos === false) {
			echo "Oops, You dont have permissions giving action '".strtoupper($action)."' into this page. please back now!";
			exit();
		} else {
			return TRUE;
		}
}


function decode_role($string) {

	$role_return['access'] = "FALSE";
	$role_return['read'] = "FALSE";
	$role_return['update'] = "FALSE";
	$role_return['insert'] = "FALSE";
	$role_return['delete'] = "FALSE";

	$role_array = str_split($string);
	foreach ($role_array as $key => $value) {
		switch ($value) {
		    case "A":
				$role_return['access'] = "TRUE";
      break;
		    case "C":
				$role_return['insert'] = "TRUE";
      break;
        case "R":
        $role_return['read'] = "TRUE";
      break;
		    case "U":
				$role_return['update'] = "TRUE";
			break;
		    case "D":
				$role_return['delete'] = "TRUE";
			break;
		    default:
				"";
		}

	}
	return $role_return;
}




