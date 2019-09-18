<?php

namespace Modules\Survey\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyCondition;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
    	$data = Survey::where('status', 0)->get();

    	return response()->json([
    		'success' => true,
    		'data' => $data
    	]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    	return view('survey::create');
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
    	$data = Survey::find($id);
    	// $data = Survey::with('question')->find($id);
    	$qa = SurveyQuestion::with('answer')
    				->with('condition')
    				->where('survey_id', $id)
    				->get();

      return response()->json([
          'success' => true,
          'data' => $data,
          'question_answer' => $qa
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
    	return view('survey::edit');
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
