<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $guarded = [];
    public $timestamps = false;  

    public function nilai()
    {
        return $this->hasOne('App\Models\Nilai', 'gejalaid', 'id');
    }
}
