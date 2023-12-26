<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinhos extends Model
{
    use HasFactory;
    
    protected $fillable = ['quantidade', 'valor_un', 'valor_total', 'produtos_id'];

    protected $with = ['produtos'];

    public function produtos()
    {
        return $this->belongsTo(Produtos::class);
    }
}
