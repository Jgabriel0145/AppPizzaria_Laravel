<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = ['valor_total_venda', 'clientes_id', 'funcionarios_id'];

    protected $with = ['clientes', 'funcionarios'];

    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function funcionarios()
    {
        return $this->belongsTo(Funcionarios::class);
    }
}
