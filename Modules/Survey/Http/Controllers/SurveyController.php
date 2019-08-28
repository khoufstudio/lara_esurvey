<?php

namespace Modules\Survey\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;

use Session;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (get_role(Auth::user()->id_user_group) != 'FALSE') {
            $pages = Survey::orderBy('created_at', 'desc')
                    ->where('user_id', Auth::user()->id)
                    ->paginate(10);
            $role = get_role(Auth::user()->id_user_group);
            return view('survey::index')->with('pages', $pages)->with('role', $role);
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
            return view('survey::create_edit')
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
        // dd($request->all());

        // validasi input
        $request->validate([
            'nama_survey' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $data = new Survey;
        $data->nama = $request->nama_survey;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();

        
        // back to index
        Session::flash('success', 'Survey telah dibuat');
        return redirect()->route('cms.survey');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('survey::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Survey::findOrFail($id);
        return view('survey::create_edit')
            ->with('data', $data)
            ->with('editpage', 'true')
            ->with('route', route('cms.survey.update', ['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validasi input
        $request->validate([
            'nama_survey' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $data = Survey::findOrFail($id);
        $data->nama = $request->nama_survey;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();

        
        // back to index
        Session::flash('success', 'Survey telah dibuat');
        return redirect()->route('cms.survey');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = Survey::findOrFail($id);
        $data->delete();

        Session::flash('success', 'Survey Berhasil di Hapus');
        return redirect()->back();
    }
}
