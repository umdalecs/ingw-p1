<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'rfc';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ["calle", "numero", "colonia", "cp"];
    public function persona(): HasOne
    {
        return $this->hasOne(Domicilio::class, 'rfc', 'rfc');
    }
}
