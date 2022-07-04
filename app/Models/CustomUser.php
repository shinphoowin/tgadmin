<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request_Finance;
use App\Models\Finance;
use App\Models\BetRecord;
class CustomUser extends Model
{
    use HasFactory;
    public $table = 'users';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    public function finance(){
        return $this->hasMany(Finance::class,'fid');
    }
    public function requestfinance(){
        return $this->hasMany(Request_Finance::class,'bfid');
    }

    public function betrecord(){
        return $this->hasMany(BetRecord::class,'betid');
    }
    
}
