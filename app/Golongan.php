<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    //
    protected $table='golongans';
    protected $fillable=array('kode_golongan','nama_golongan','besaran_uang');
    protected $visible=array('kode_golongan','nama_golongan','besaran_uang');


    public function KategoriLembur(){
    	return $this->hasMany('App\KategoriLembur','golongan_id');
    }

    public function Tunjangan(){
    	return $this->hasMany('App\Tunjangan','golongan_id');
    }

    public function Pegawai(){
        return $this->hasMany('App\Pegawai','golongan_id');
    }
}
