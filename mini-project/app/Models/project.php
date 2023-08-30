<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;

class project extends Model
{
    use HasFactory;
    protected $table = 'tb_m_project';
    protected $dates =['project_start','project_end'];
    protected $guarded = [];
    public $timestamps = false; 

    public function client()
    {
        return $this->belongsTo(client::class);
    }
}
