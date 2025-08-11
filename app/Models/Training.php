<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Training extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function photoUrl(): Attribute
    {
        return new Attribute(
            get: fn() => ($this->photo && Storage::exists($this->photo)) ? url("/storage/$this->photo") : url("/assets/images/training-default.png"),
        );
    }

}
