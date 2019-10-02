<?php

namespace Modules\SurveyStat\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyAnswer;
use Modules\Survey\Entities\SurveyCondition;
use Modules\Survey\Entities\SurveyResult;

class SurveyStatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('surveystat::index');
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
      $data = SurveyQuestion::where('survey_id', $id)
                ->with('answer')
                ->get();

      $surveyResult = SurveyResult::where('survey_id', $id)->with('survey_link')
      									->where('jawaban', '<>', '[]')->get();

      $jawaban = [];
      foreach ($surveyResult as $sr) {
      	array_push($jawaban, json_decode($sr->jawaban));
      }

      // dd($jawaban);

      $pertanyaan = [];
      $urutan = [];
      $jumlah = [];
      // dd($data);
      $ans = [];
      foreach ($data as $dt) {
      	$ans = $dt->answer;

      	if ($dt->tipe_pertanyaan == "checkbox" || $dt->tipe_pertanyaan == "radiogroup") {
      	// if ($dt->tipe_pertanyaan == "checkbox") {
	      	foreach ($jawaban as $jwb) {
	      		foreach ($jwb as $jb) {
	      			if ($jb->urutan == $dt->urutan-1) {
	      			// if ($jb["urutan"] == $dt->urutan-1) {
	      			if (is_array($jb->jawaban)) {
	      				foreach ($jb->jawaban as $jbx) {
	      					array_push($jumlah, $jbx);
	      				}
	      				// array_push($jumlah, implode(",", $jb->jawaban));
	      			} else {
	      				array_push($jumlah, $jb->jawaban);
	      			}
	      			}
	      		}
	      	}

	      	$jumlah = array_count_values($jumlah);

	      	$hasil = [];
	      	foreach ($jumlah as $key => $jmlh) {
	      		array_push($hasil, ['jawaban' => $ans[$key]->jawaban, 'jumlah' => $jmlh]);
	      		// array_push($hasil, ["test".$key => $jmlh]);
	      	}
	      	$test["jumlah"] = $hasil;

      	}

      	$test["pertanyaan"] = $dt->pertanyaan;
      	$test["tipe_pertanyaan"] = $dt->tipe_pertanyaan;
      	$test["urutan"] = $dt->urutan-1;

      	array_push($pertanyaan, $test);
      	$test = [];
      	$jumlah = []; 
      }



      return response()->json([
        'response' => true,
        // 'jawaban' => $jawaban,
        // 'result' => $surveyResult,
        'data' => $pertanyaan,
        // 'data' => $data
      ]);
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
