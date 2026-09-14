 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    use Illuminate\Database\Eloquent\Model;

    class M_pembayaran extends Model
    {
        protected $table = 'ms_pembayaran';
        protected $guarded = [];
    }
