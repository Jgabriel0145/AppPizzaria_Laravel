<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaProdutos extends Model
{
    use HasFactory;

    protected $fillable = ['quantidade', 'total_venda', 'vendas_id', 'produtos_id'];

    protected $with = ['produtos', 'vendas'];

    public function produtos()
    {
        return $this->belongsTo(Produtos::class);
    }

    public function vendas()
    {
        return $this->belongsTo(Vendas::class);
    }
}
