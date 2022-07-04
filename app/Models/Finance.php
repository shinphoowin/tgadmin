<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    public $table = 'finance';

    protected $primaryKey = 'fid';
    public $timestamps = false;

    


    public function customusers()
    {
        return $this->belongsTo(CustomUser::class,'user_id', 'chat_from_id');
    }
    
}
