<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'ingredientes',
        'instrucciones',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
