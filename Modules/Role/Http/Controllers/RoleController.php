<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Role;
use Modules\Menu\Entities\Menu;
use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Role\Entities\GroupMenu;

class RoleController extends Controller
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
        // echo get_role(Auth::user()->id_user_group)[''];
        if(get_role(Auth::user()->id_user_group) != "FALSE"){
            if(isset($request->search)){
                $sess_search = Session::put('search_role', $request->search);
            }

            $sess_ = Session::get('search_role');

            if(isset($sess_)){
                $roles= Role::searchRole($sess_);
            }
            else{
                $roles= Role::paginate(20);
            }
            
            
            return view('role::index')->with('roles', $roles);
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
        return view('role::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_user_group'   => 'required|max:100',
        ]);

        Role::create([
            'nama_user_group'   => $request->nama_user_group
        ]);

        Session::flash('success', 'Post Created Succefully');
        return redirect()->back();

        // dd($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
         $role = Role::findOrFail($id);
         return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);


        $role->nama_user_group = $request->nama_user_group;
        $role->save();

        Session::flash('success', 'User berhasil di update!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        Session::flash('success', 'User Group Berhasil Dihapus');
        return redirect()->back();

    }


    public function groupmenu($id){
        if(get_role(Auth::user()->id_user_group)['read'] != "FALSE"){
            $grupmenus = Role::getGrupmenu($id);
            return view('role::grupmenu')
                    ->with('menus', parrent_menu())
                    ->with('grupmenus', $grupmenus);
                    
        }else{
            return redirect('forbidden');
        }
    }

    public function update_groupmenu(Request $request, $id)
    {
        // $role = Role::find($id);

   
        $data = Role::updateGrupMenu($request->cek, $request->id_menu, $id, $request->action);


        $response = array(
            'status' => 'success',
            'data'  => $data,
            'id'    => $id,
            'iduser'    => $request->id_menu
        );

        return response()->json($response); 

        // $role->nama_user_group = $request->nama_user_group;
        // $role->save();

        // Session::flash('success', 'User berhasil di update!');
        // return redirect()->back();
    }
}
