<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class M_detailtransaksi extends Model
{
    public $timestamps = false;
    protected $table = 'trs_detail';
    protected $guarded = [];
}
