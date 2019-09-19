<?php

namespace Modules\Survey\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Survey\Entities\Survey;
use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyAnswer;
use Modules\Survey\Entities\SurveyCondition;

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
            return view('survey::create_edit2')
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
        // dd($request->pertanyaan);
        // dd($request->all());

        // validasi input
        $request->validate([
            'nama_survey' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'pertanyaan' => 'required'
        ]);

        $pertanyaan = json_decode($request->pertanyaan, true);

        $data = new Survey;
        $data->nama = $request->nama_survey;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();

				// masukan pertanyaan dan jawaban
				$urutanPertanyaan = 1;
        foreach ($pertanyaan as $pt) {
        	// masukan pertanyaan
        	$sq = new SurveyQuestion;
        	$sq->survey_id = $data["id"];
        	$sq->urutan = $urutanPertanyaan;
        	$sq->pertanyaan = $pt["name"];
        	$sq->tipe_pertanyaan = $pt["type"];
        	if ($pt["type"] == 'text') {
        		$sq->tipe_text = $pt["type_input"];
        	}
        	if ($pt["type"] != 'text') {
        		$sq->has_other = (isset($pt["has_other"])) ? $pt["has_other"] : false;
        	}
        	$sq->save();

        	// masukan jawaban	
        	if (isset($pt["choices"])) {
        		$urutan = 1;
	        	foreach ($pt["choices"] as $co) {
	        		$sa = new SurveyAnswer;
	        		$sa->question_id = $sq->id;
	        		$sa->urutan = $urutan;
	        		$sa->jawaban = $co;
	        		$sa->bobot = 0;
	        		$sa->save();

	        		$urutan++;
	        	}

	        	// masukan survey condition
	          if (isset($pt["condition"]) && is_array($pt["condition"])) {
	            $x = 0;
	            
	            foreach ($pt["condition"] as $con) {
	              $sc = new SurveyCondition;
	              foreach ($con as $cn) {
	                if ($x == 0) {
	                  $answer = (is_array($cn["a"])) ? implode(", ", $cn["a"]) : $cn["a"];
	                  $sc->question_id = $sq->id;
	                  // $sc->survey_answer_id = $sq->id;
	                  $sc->answer = $answer;
	                } else if ($x == 1) {
	                  $sc->condition = $cn["c"];
	                } else if ($x == 2) {
	                  $sc->jump = $cn["j"];
	                }
	                $x++;
	              }
	              $sc->save();
	              $x = 0;
	            }
	          }
          }

        	$urutanPertanyaan++;
        }
   
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

        // dd($data->question[0]->condition);
        return view('survey::create_edit2')
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
          $request->validate([
            'nama_survey' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'pertanyaan' => 'required'
        ]);


        $pertanyaan = json_decode($request->pertanyaan, true);

        $data = Survey::findOrFail($id);
        $data->nama = $request->nama_survey;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();

				// delete pertanyaan dan jawaban
        $idAnswer = [];
        $sqId = SurveyQuestion::where('survey_id',$id)->get();
        foreach ($sqId as $si) {
        	array_push($idAnswer,$si->id);
        }

        $sqDelete = SurveyQuestion::where('survey_id',$id)->delete();
        $saDelete = SurveyAnswer::whereIn('question_id',$idAnswer)->delete();
        $scDelete = SurveyCondition::whereIn('question_id',$idAnswer)->delete();

        // dd($pertanyaan);
				// masukan pertanyaan dan jawaban
				$urutanPertanyaan = 1;
        foreach ($pertanyaan as $pt) {
        	// masukan pertanyaan
        	$sq = new SurveyQuestion;
        	$sq->survey_id = $data["id"];
        	$sq->urutan = $urutanPertanyaan;
        	$sq->pertanyaan = $pt["name"];
        	$sq->tipe_pertanyaan = $pt["type"];
        	if ($pt["type"] == 'text') {
        		$sq->tipe_text = $pt["type_input"];
        	}
        	if ($pt["type"] != 'text') {
        		$sq->has_other = (isset($pt["has_other"])) ? $pt["has_other"] : false;
        	}
        	$sq->save();

        	// masukan jawaban	
        	if (isset($pt["choices"])) {
        		$urutan = 1;
	        	foreach ($pt["choices"] as $co) {
	        		$sa = new SurveyAnswer;
	        		$sa->question_id = $sq->id;
	        		$sa->urutan = $urutan;
	        		$sa->jawaban = $co;
	        		$sa->bobot = 0;
	        		$sa->save();
	        		$urutan++;
	        	}

	        	// dd($pt["condition"]);

	        	// masukan survey condition
		          if (isset($pt["condition"]) && is_array($pt["condition"])) {
		            $x = 0;
		            
		            foreach ($pt["condition"] as $con) {
		              $sc = new SurveyCondition;
		              foreach ($con as $cn) {
		                if ($x == 0) {
		                  $answer = (is_array($cn["a"])) ? implode(", ", $cn["a"]) : $cn["a"];
		                  $sc->question_id = $sq->id;
		                  $sc->answer = $answer;
		                } else if ($x == 1) {
		                  $sc->condition = $cn["c"];
		                } else if ($x == 2) {
		                  $sc->jump = $cn["j"];
		                }
		                $x++;
		              }
		              $sc->save();
		              $x = 0;
		            }
		          }
        	}

        	$urutanPertanyaan++;
        }
   

        
        // back to index
        Session::flash('success', 'Survey telah diupdate');
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

        // delete pertanyaan dan jawaban
        $idAnswer = [];
        $sqId = SurveyQuestion::where('survey_id',$id)->get();
        foreach ($sqId as $si) {
        	array_push($idAnswer,$si->id);
        }

        $sqDelete = SurveyQuestion::where('survey_id',$id)->delete();
        $saDelete = SurveyAnswer::whereIn('question_id',$idAnswer)->delete();
        $scDelete = SurveyCondition::whereIn('question_id',$idAnswer)->delete();

        Session::flash('success', 'Survey Berhasil di Hapus');
        return redirect()->back();
    }
}
