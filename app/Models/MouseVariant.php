<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouseVariant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mouse()
    {
        return $this->belongsTo(Mouse::class);
    }
}
