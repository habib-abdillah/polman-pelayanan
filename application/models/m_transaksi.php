<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class M_transaksi extends Model
{
    public $timestamps = false;
    protected $table = 'ms_transaksi';
    protected $guarded = [];
}
