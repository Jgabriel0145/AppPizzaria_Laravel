<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'preco', 'fornecedores_id'];

    protected $with = ['fornecedores'];

    public function fornecedores()
    {
        return $this->belongsTo(Fornecedores::class);
    }
}
