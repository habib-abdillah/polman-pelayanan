<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class M_role extends Model
{
    protected $table = 'ms_role';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(M_users::class);
    }
}
