<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domicilio extends Model
{
    protected $table = 'domicilios';
    protected $primaryKey = 'rfc';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ["calle", "numero", "colonia", "cp"];
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'rfc', 'rfc');
    }
}
