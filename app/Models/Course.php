<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'courses';

    // Indicar quais columas poder ser preenchidas
    protected $fillable = ['name', 'price'];

    // Relacionamento 1:N um para muitos com a tabela classes
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

}
