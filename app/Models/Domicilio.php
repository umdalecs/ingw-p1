<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(
    'domicilios',
    key: 'rfc',
    keyType: 'string',
    incrementing: false,
    timestamps: false
)]
#[Fillable('calle', 'numero', 'colonia', 'cp')]
class Domicilio extends Model
{
    use HasFactory;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'rfc', 'rfc');
    }
}
