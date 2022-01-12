<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mouse_variants()
    {
        return $this->hasMany(MouseVariant::class);
    }
}
