<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
// use Model\User;
use Modules\Users\Entities\User;
use Modules\Role\Entities\Role;
use Modules\Direktorat\Entities\Direktorat;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
      $privilages = Auth::user();

      if(get_role(Auth::user()->id_user_group) != 'FALSE'){
        if(isset($request->search)) {
          $sess_search = Session::put('search_user', $request->search);
        }
        
        $sess_ = Session::get('search_user');

        if(isset($sess_)) {
          $users = User::searchUser($sess_);
        }
        else {
          $users = User::paginate(20);
          // $users = User::getUsers(Auth::user()->id_user_group);
        }

        if(Auth::user()->id_user_group == 1) {
            $roles = Role::all();
        } else {
          //'1 = Super Admin, 2 = Pimpinan, 3 = Peneliti, 4 = Responden'
          switch (Auth::user()->id_user_group) {
            case 2:
              $users = User::where('litbang_id', Auth::user()->id)->paginate(10);
              $roles = Role::where('id', '3')->get();
              break;

            case 3:
              $users = User::where('peneliti_id', Auth::user()->id)->paginate(10);
              $roles = Role::where('id', '4')->get();
              break;
            
            default:
              $users = User::getUsers(Auth::user()->id_user_group);
              $roles = Role::where('id', '<>', '1')->get();
              break;
          }
        }

        return view('users::index')
          ->with('users', $users)
          ->with('privilages', $privilages)
          ->with('roles', $roles);
      } else {
          return redirect('forbidden');
      }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      // dd($request->all());

      $this->validate($request, [
        'name'  => 'required|string|max:100',
        'email' => 'required|string|email|max:50|unique:users',
        'username' => 'required|string|unique:users',
        'password' => 'required|min:5',
        'hp'    => 'required|max:15',
        'id_user_group' => 'required|integer',
        'status'    => 'required'
      ]);

      // User::create([
      //   'name' => $request->name,
      //   'email' => $request->email,
      //   'username'   => $request->username,
      //   'password'   => Hash::make($request->password),
      //   'hp'  => $request->hp,
      //   'id_user_group'  => $request->id_user_group,
      //   'status'    => $request->status,
      // ]);

      // dd($request->id_user_group);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->password = Hash::make($request->password);
      $user->status = $request->status;
      $user->hp = $request->hp;
      $user->id_user_group = $request->id_user_group;

      // masukin litbang_id, peneliti_id, 
      if ($request->id_user_group == '3') {
        $user->litbang_id = Auth::user()->id;
      }  else {
        $user->peneliti_id = Auth::user()->id;
      }

      $user->save();

      Session::flash('success', 'User Created Succefully');
      return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

      $user = User::findOrFail($id);

      $user->name = $request->name;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->status = $request->status;
      $user->hp = $request->hp;
      $user->id_user_group = $request->id_user_group;
      $user->save();

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
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success', 'User berhasil di hapus');
        return redirect()->back();

    }



}
