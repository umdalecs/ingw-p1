<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Table(
    'personas',
    key: 'rfc',
    incrementing: false,
    timestamps: false
)]
class Persona extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = ["nombre"];
    public function domicilio(): HasOne
    {
        return $this->hasOne(Domicilio::class, 'rfc', 'rfc');
    }
}
