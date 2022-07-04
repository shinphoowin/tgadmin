<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomUser;
class Request_Finance extends Model
{
    use HasFactory;
    public $table = 'bot_finance';

    protected $primaryKey = 'bfid';
    public $timestamps = false;

    public function customusers(){
        return $this->belongsTo(CustomUser::class,'user_id', 'chat_from_id');

    }
}
