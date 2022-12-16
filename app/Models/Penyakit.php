<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $guarded = [];
    public $timestamps = false; 

    public function nilai()
    {
        return $this->hasOne('App\Models\Nilai', 'penyakitid', 'id');
    }
}
