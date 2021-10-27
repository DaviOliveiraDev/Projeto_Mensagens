<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    //use HasFactory;


    protected $table = "aviso";


    protected $fillable = [
        'aviso',
        'conteudo',
    ];

    public function user()
    {
       // return $this->belongsToMany(User::class, 'aviso_user', '1', 'aviso_id');
       return $this->belongsToMany(User::class);
    }
}
