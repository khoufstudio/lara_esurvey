<?php

namespace App\Exports;

use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyResult;
use Modules\Survey\Entities\SurveyAnswer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\MttRegistration;

class SurveyExport implements FromCollection, WithHeadings
{
	protected $id;

	function __construct($id)
	{
		$this->id = $id;
	}

  /**
  * @return \Illuminate\Support\Collection
  */
  public function collection()
  {
  	// $id = 1;
    $data = SurveyResult::where('survey_id', $this->id)->get();
    $jumlahSoal = SurveyQuestion::where('survey_id', $this->id)->max('urutan');
    $soal = SurveyQuestion::where('survey_id', $this->id)->get();

    $arr = [];

    foreach ($data as $dt) {
    	$arrContainer = [];

    	$arrContainer['no_responden'] = $dt->id;
    	
			$jawaban = json_decode($dt->jawaban);

    	$urutan = [];

    	foreach ($jawaban as $jb) {
    		array_push($urutan, $jb->urutan);
    	}

    	// $jwbArray = [];
    	for ($i = 0; $i < $jumlahSoal; $i++) { 
    		$key = array_search($i, $urutan);
    		if ($key !== false) {
					$jaba = SurveyAnswer::where('question_id', $soal[$i]->id)->get();

          $allJawabanSoal = [];
          $jwbArray = [];

					foreach ($jaba as $jb) {
						array_push($allJawabanSoal, $jb->jawaban);
					}
    			
    			if (is_string($jawaban[$key]->jawaban)) {
    				$jwb = (is_array($jawaban[$key]->jawaban)) ? implode(", ", $jawaban[$key]->jawaban) : $jawaban[$key]->jawaban;
    				$arrContainer['soal'.($i+1)] = $jwb;
    			} else {
    				if (is_array($jawaban[$key]->jawaban) && !empty($jawaban[$key]->jawaban)) {
    					foreach ($jawaban[$key]->jawaban as $jwban) {
    						$valJawaban = $allJawabanSoal[$jwban];
    						array_push($jwbArray, $valJawaban);
    					}
    					$jwb = (is_array($jawaban[$key]->jawaban)) ? implode(", ", $jwbArray) : $allJawabanSoal[$jawaban[$key]->jawaban];
    					$arrContainer['soal'.($i+1)] = $jwb;
    				} else {
    					if (is_array($jawaban[$key]->jawaban) && empty($jawaban[$key]->jawaban)) {
    						$jwb = "-";
    					} else {
  							$jwb = ((!is_null($jawaban[$key]->jawaban))) ? $allJawabanSoal[$jawaban[$key]->jawaban] : "-";
    					}

    					$arrContainer['soal'.($i+1)] = $jwb;
    				}
    			}
    		} else {
    			$arrContainer['soal'.($i+1)] = '-';
    		}
    	}        	

    	array_push($arr, $arrContainer);
    }
  	
  	return collect($arr);
	}

  public function headings(): array
  {
  	$id = 1;
		$jumlahSoal = SurveyQuestion::where('survey_id', $this->id)->max('urutan');
		$soal = SurveyQuestion::where('survey_id', $this->id)->get();
  	$arrHeading = [
      'Nomer Responden',
    ];

    // Soal berdasarkan nomer
    // for ($i=0; $i < $jumlahSoal; $i++) { 
    // 	array_push($arrHeading, 'soal' . ($i+1));
    // }
    // 
    // 
    
    // soal berdasarkan text soal
    foreach ($soal as $sl) {
    	array_push($arrHeading, $sl->pertanyaan);
    }

    return $arrHeading;
  }
}
