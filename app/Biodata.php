<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $guarded = [];

    protected $table = "biodatas";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function academic()
    {
        return $this->belongsTo(Academic::class);
    }
}
