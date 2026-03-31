<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(
    'domicilios',
    key: 'rfc',
    incrementing: false,
    timestamps: false
)]
class Domicilio extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = ["calle", "numero", "colonia", "cp"];
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'rfc', 'rfc');
    }
}
