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


    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsToMany(User::class, 'aviso_user', 'aviso_id', 'user_id')
                    ->withPivot(['id', 'user_id', 'dt_lido', 'aviso_id']);
    }
}
