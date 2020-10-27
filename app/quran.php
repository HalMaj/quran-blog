<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quran extends Model
{
    //table name
    //protected $table = 'ma_qurans';

    //primary key
    //public $primarykey = 'Ay name colunm';

    //timestamp disable
    //public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['active'];
}
