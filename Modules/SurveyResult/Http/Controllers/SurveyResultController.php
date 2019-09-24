<?php

namespace Modules\SurveyResult\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyResult;
use App\Exports\SurveyExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class SurveyResultController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
    	if (get_role(Auth::user()->id_user_group) != 'FALSE') {
          $pages = Survey::orderBy('created_at', 'desc')
                  // ->where('user_id', Auth::user()->id)
                  ->paginate(10);
          $role = get_role(Auth::user()->id_user_group);
          return view('surveyresult::index')
      						->with('pages', $pages)
      						->with('role', $role);
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
        return view('surveyresult::create');
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
        return view('surveyresult::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = SurveyResult::where('survey_id', $id)->get();
        $jumlahSoal = SurveyQuestion::where('survey_id', $id)->max('urutan');

        // dd($jumlahSoal);

        $arr = [];

        foreach ($data as $dt) {
        	// echo "nama soal: " . $dt->survey_link->nama. "<br>";
        	echo "nomer responden: " . $dt->id. "<br>";

        	$arrContainer = [];

        	$arrContainer['no_responden'] = $dt->id;

        	// array_push($arr, ['no_responden' => $dt->id]);
        	// echo "jawaban: " . $dt->jawaban. "<br>";
        	// echo "====<br>";
        	// echo "<pre>";
        	// dd($dt->jawaban);
        	// 
        	
					$jawaban = json_decode($dt->jawaban);
        	// dd($jawaban);
        	// dd($jawaban[3]);

        	$urutan = [];

        	foreach ($jawaban as $jb) {
        		array_push($urutan, $jb->urutan);
        	}

        	// dd($urutan);
        	
        	for ($i = 0; $i < $jumlahSoal; $i++) { 
        		$key = array_search($i, $urutan);
        		if ($key !== false) {
        		// if (in_array($i, $urutan)) {
        		// if ($jawaban[$i]->urutan == $i) {
        		// if (true) {
        		// $urutan
        			$jwb = (is_array($jawaban[$key]->jawaban)) ? implode(", ", $jawaban[$key]->jawaban) : $jawaban[$key]->jawaban;
        			// $jwb = (is_array($jawaban[$i]->jawaban)) ? implode(", ", $jawaban[$i]->jawaban) : $jawaban[$i]->jawaban;
        			$arrContainer['soal'.($i+1)] = $jwb;
        			// $arrContainer['soal'.($i+1)] = 'true';
        		} else {

        			$arrContainer['soal'.($i+1)] = '-';
        		}
        		
        	}
        	
        	
        	// foreach ($jawaban as $jb) {
        	// 	$jwb = (is_array($jb->jawaban)) ? implode(", ", $jb->jawaban) : $jb->jawaban;
        		// array_push($arr, ['soal'.$jb->urutan => $jwb]);
        		// $arrContainer['soal'.($jb->urutan+1)] = $jwb;
        		// echo "soal: " . $jb->urutan . " - " . "jawaban: " . $jwb . "<br>";
        	// }

        	array_push($arr, $arrContainer);
        	// dd(json_decode($dt->jawaban));
        	// echo "<br>";
        }

        dd($arr);

        // return response()->json($arr);
        // return response()->json($data);
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

    public function download($id)
    {
    	// echo $id;
    	return Excel::download(new SurveyExport($id), 'survey.xlsx');
    }
}
