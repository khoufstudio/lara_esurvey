<?php

namespace Modules\Direktorat\Entities;

use Illuminate\Database\Eloquent\Model;

class Subdit extends Model
{
  protected $fillable = ['nama_subdit', 'status', 'id_direktorat'];

  // protected $table = 'subdit';

  public static function searchSubdit($keyword, $id)
  {
    $direktorats = Subdit::where('nama_subdit', 'LIKE', '%' . $keyword . '%')->where('id_direktorat', $id)
      ->paginate(20);
    // ->orWhere('username', 'LIKE', '%'.$keyword.'%')

    return $direktorats;
  }

  public static function getSubdit($idBagian)
  {
    $subidt = Subdit::where(['id_direktorat' => $idBagian, 'status' => '1'])
      ->paginate(20);
    // ->orWhere('username', 'LIKE', '%'.$keyword.'%')

    return $subidt;
  }
}
