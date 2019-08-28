<?php

namespace Modules\JenisSurat\Entities;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $fillable = ['id_jenis', 'nama_surat', 'status'];


    public static function searchJenisSurat($keyword){
		$jenis_surat = JenisSurat::where('nama_surat', 'LIKE', '%'.$keyword.'%')
                                ->paginate(20);
										// ->orWhere('username', 'LIKE', '%'.$keyword.'%')

		return $jenis_surat;
	}

	public static function getSuratMasuk(){
		$surats = JenisSurat::where(['id_jenis' => '1', 'status' => '1'])->get();
		return $surats;
	}

	public static function getJenisSurat($id){
		$surats = JenisSurat::where(['id_jenis' => $id, 'status' => '1'])->get();
		return $surats;
	}

}
