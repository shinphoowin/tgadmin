<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomUser;
class BetRecord extends Model
{
    use HasFactory;
    public $table = 'bet_records';

    protected $primaryKey = 'betid';
    public $timestamps = false;

    public function customusers()
    {
        return $this->belongsTo(CustomUser::class,'user_id', 'chat_from_id');
    }
}
