<?php

namespace App\Exports;

use Modules\Survey\Entities\SurveyQuestion;
use Modules\Survey\Entities\SurveyResult;
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

    $arr = [];

    foreach ($data as $dt) {
    	$arrContainer = [];

    	$arrContainer['no_responden'] = $dt->id;

			$jawaban = json_decode($dt->jawaban);

    	$urutan = [];

    	foreach ($jawaban as $jb) {
    		array_push($urutan, $jb->urutan);
    	}
    	
    	for ($i = 0; $i < $jumlahSoal; $i++) { 
    		$key = array_search($i, $urutan);
    		if ($key !== false) {
    			$jwb = (is_array($jawaban[$key]->jawaban)) ? implode(", ", $jawaban[$key]->jawaban) : $jawaban[$key]->jawaban;
    			
    			$arrContainer['soal'.($i+1)] = strval($jwb);
    		} else {
    			$arrContainer['soal'.($i+1)] = '-';
    		}	
    	}
   
    	array_push($arr, $arrContainer);
			
		}
  	
  	// return SurveyResult::all();
  	// return response()->json($arr);
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
