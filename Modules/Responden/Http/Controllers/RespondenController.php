<?php

namespace Modules\Responden\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Responden\Entities\Responden;

use Session;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (get_role(Auth::user()->id_user_group) != 'FALSE') {
            $pages = Responden::orderBy('created_at', 'desc')
                    ->where('user_id', Auth::user()->id)
                    ->paginate(10);

                    // dd(Responden::all());
            $role = get_role(Auth::user()->id_user_group);
            return view('responden::index')->with('pages', $pages)->with('role', $role);
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
        if (get_role(Auth::user()->id_user_group)['insert'] != 'FALSE') {
            return view('responden::create_edit')
                ->with('route', route('cms.survey.store'));
        } else {
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
        // echo "test";

        // dd($request->all());

        // validasi input
        $validation = $request->validate([
            "name" => "required",
            "username" => "required",
            "password" => "required|confirmed",
            "status" => "required",
        ]);

        // dd($validation);

        $data = new Responden;
        $data->user_id = Auth::user()->id;
        $data->nama = $request->name;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->status = $request->status;
        $data->save();

        
        // back to index
        Session::flash('success', 'Responden telah dibuat');
        return redirect()->route('cms.responden');

        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('responden::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        // return view('responden::edit');
        $data = Responden::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $data = Responden::findOrFail($id);

      $data->nama = $request->name;
      $data->username = $request->username;
      $data->status = $request->status;
      $data->save();

      Session::flash('success', 'Responden berhasil di update!');
      return redirect()->back();
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
}
