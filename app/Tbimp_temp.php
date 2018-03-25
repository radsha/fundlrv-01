<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbimp_temp extends Model
{
    protected $table = 'tbimp_temp';
    protected $primaryKey = 'lineid';
    public $timestamps = false;
}
