<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni'; //Declaramos otra columa como primary key
    public $incrementing = false; //Indicamos que el primary key no es incrementable
    protected $keyType = 'string'; //Declaramos el tipo de dato para el primary 

    public function regions()
    {
        return $this->belongsTo(Region::class, 'id_reg', 'id');
    }

    public function communes()
    {
        return $this->belongsTo(Commune::class, 'id_com', 'id');
    }
}
