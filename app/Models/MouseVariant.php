<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouseVariant extends Model
{
    use HasFactory;

    public function mouse()
    {
        return $this->belongsTo(Mouse::class);
    }
}
