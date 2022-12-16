<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $guarded = [];
    public $timestamps = false;  

    public function gejala()
    {
        return $this->belongsTo('App\Models\Gejala', 'gejalaid', 'id');
    } 

    public function penyakit()
    {
        return $this->belongsTo('App\Models\Penyakit', 'penyakitid', 'id');
    }
}
