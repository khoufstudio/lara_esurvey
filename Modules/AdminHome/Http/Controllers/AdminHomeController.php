<?php

namespace Modules\AdminHome\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyResult;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$surveyData = Survey::count();
    	$surveyResultData = SurveyResult::count();

    	$data = [
    		'survey_total' => $surveyData,
    		'survey_result_total' => $surveyResultData,
    	];


    	// dd(["test"]);
    	// return view('survey::index')->with('pages', $pages)->with('role', $role);

    	return view('adminhome::index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    	return view('adminhome::create');
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
    	return view('adminhome::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
    	return view('adminhome::edit');
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
  }
