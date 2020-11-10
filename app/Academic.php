<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $guarded = [];

    public function biodata()
    {
        return $this->hasMany(Biodata::class);
    }

}
