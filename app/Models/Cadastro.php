<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'codigo',
        'descricao',
        'marca',
        'modelo',
        'colaborador',
        'valor',
        'estado',
        'setor',
        'categoria',
        'observacoes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    } 
}
