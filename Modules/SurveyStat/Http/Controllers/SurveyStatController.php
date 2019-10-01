<?php

namespace Modules\SurveyStat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyAnswer;
use Modules\Survey\Entities\SurveyCondition;

use Session;

class SurveyStatController extends Controller
{
  /**
  * Display a listing of the resource.
  * @return Response
  */
  public function index()
  {
    if (get_role(Auth::user()->id_user_group) != 'FALSE') {
      $pages = Survey::orderBy('created_at', 'desc')
      ->when(Auth::user()->id != 1,function($q) {
        return $q->where('user_id', Auth::user()->id);
      })
      ->paginate(10);
      $role = get_role(Auth::user()->id_user_group);
      return view('surveystat::index_vue')->with('pages', $pages)->with('role', $role);
      // return view('surveystat::index')->with('pages', $pages)->with('role', $role);
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
    return view('surveystat::create');
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
    return view('surveystat::show');
  }
  
  /**
  * Show the form for editing the specified resource.
  * @param int $id
  * @return Response
  */
  public function edit($id)
  {
    return view('surveystat::edit');
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
