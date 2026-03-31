<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Table(
    'personas',
    key: 'rfc',
    keyType: 'string',
    incrementing: false,
    timestamps: false
)]
#[Fillable('nombre')]
class Persona extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public function domicilio(): HasOne
    {
        return $this->hasOne(Domicilio::class, 'rfc', 'rfc');
    }
}
