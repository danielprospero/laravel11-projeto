<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'classes';

    // Indicar quais columas poder ser preenchidas
    protected $fillable = ['name', 'description', 'order_classe', 'course_id'];

    // Relacionamento N:1 muitos para um com a tabela courses
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
