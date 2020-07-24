<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxyinfo extends Model
{
    protected $table = 'taxy_infos';
    
    protected $fillable = [
        'plat_no',
        'model',
        'brand',
        'type',
        'area',
        'status'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
