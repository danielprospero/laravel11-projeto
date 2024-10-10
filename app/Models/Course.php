<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use \OwenIt\Auditing\Auditable as AuditableTrait;

class Course extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

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
