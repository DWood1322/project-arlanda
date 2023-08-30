<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;

class client extends Model
{
    use HasFactory;
    protected $table = 'tb_m_client';
   
    public function project()
    {
        return $this->hasMany(project::class);
    }
}
