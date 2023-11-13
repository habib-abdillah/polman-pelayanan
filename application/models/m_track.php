<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class M_track extends Model
{
    protected $table = 'sys_track';
    public $timestamps = false;
}
