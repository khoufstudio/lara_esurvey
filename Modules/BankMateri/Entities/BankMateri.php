<?php

namespace Modules\BankMateri\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankMateri extends Model
{
    protected $fillable = ['kategori', 'jenis_surat', 'perihal', 'no_surat', 'tgl_surat', 'file_doc', 'direktorat', 'subdit', 'masa_aktif', 'status', 'ket'];
    protected $table = 'arsips';

		public static function getArsips(){
			$arsips = DB::table('arsips')
										->leftJoin('direktorats', 'direktorats.id', '=', 'arsips.direktorat')
										->leftJoin('subdits', 'subdits.id', '=', 'arsips.subdit')
										->leftJoin('jenis_surats', 'jenis_surats.id', '=', 'arsips.jenis_surat')
										->select('arsips.*', 'direktorats.nama_direktorat', 'subdits.nama_subdit', 'jenis_surats.nama_surat')
										->paginate(10);

			return $arsips;
		}

    public static function searchArcips($direktorat = null, $subdit = null, $kategori = null, $jenis_surat = null, $status = null, $periode_dari = null, $periode_sampai = null, $keyword)
    { 
      
        $sql = "SELECT a.*, 
                       b.id, 
											 b.nama_direktorat, 
											 c.nama_subdit,
											 d.nama_surat
											 FROM 
											 arsips a, 
											 direktorats b, 
											 subdits c,
											 jenis_surats d
											 WHERE 
											 b.id=a.direktorat AND 
											 c.id=a.subdit AND
											 d.id=a.jenis_surat  ";
            
        $arr_param = [];

        if(isset($direktorat)){
            $sql .= " AND a.direktorat= :direktorat ";
            $arr_param = array_merge($arr_param, ['direktorat' => $direktorat]);
        }

        if(isset($subdit)){
            $sql .= " AND a.subdit= :subdit ";
            $arr_param = array_merge($arr_param, ['subdit' => $subdit]);
         
        }

        if(isset($kategori)){
            $sql .= " AND a.kategori= :kategori ";
           
            $arr_param = array_merge($arr_param, ['kategori' => $kategori]);
        }
        if(isset($jenis_surat)){
            $sql .= " AND a.jenis_surat= :jenis_surat ";
            $arr_param = array_merge($arr_param, ['jenis_surat' => $jenis_surat]);
        
        }

        if(isset($status)){
            $sql .= " AND a.status= :status ";
          
            $arr_param = array_merge($arr_param, ['status' => $status]);
        }

        if(isset($periode_dari) && isset($periode_sampai)){
            $sql .= " AND a.tgl_surat BETWEEN :pdari AND :psampai ";
            $tdari = date('Y-m-d', strtotime($periode_dari));
            $tsampai = date('Y-m-d', strtotime($periode_sampai));
           
            $arr_param = array_merge($arr_param, ['pdari' => $tdari, 'psampai' => $tsampai]);
        }

        if(isset($keyword)){
            $sql .= " AND (a.perihal LIKE :perihal OR a.no_surat LIKE :no_surat) ";
            $arr_param = array_merge($arr_param, ['no_surat' => '%'.$keyword.'%', 'perihal' => '%'.$keyword.'%']);
        }

        
        return DB::select($sql , $arr_param);
        // return $arr_param;


        //             $results = DB::select( DB::raw("SELECT * FROM arsips WHERE perihal LIKE  '%:perihal%'"), array(
        //                 'perihal' => $keyword,
        //               ));
                    

        // return $results;
    }
}
