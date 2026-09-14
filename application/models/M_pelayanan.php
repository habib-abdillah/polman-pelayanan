<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class M_pelayanan extends Model
{
    protected $table = 'ms_pelayanan';
    protected $guarded = [];

    public function users() {
        return $this->belongsTo('M_users');
    }
}
