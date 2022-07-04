<?php

namespace App\Http\Controllers;

use App\Models\BetRecord;
use Illuminate\Http\Request;

class BetRecordController extends Controller
{
    public function index(){
        // $betrecords=BetRecord::all();
        $search = request('search');
        if ($search != '') {
            $betrecords = BetRecord::whereHas('customusers',function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orwhere('bet_time', 'like', '%' . $search . '%');
            })->orderBy('betid', 'DESC')->paginate(30);
            $betrecords->appends(['search' => $search]);
        } else {
            $betrecords = BetRecord::orderBy('betid', 'DESC')->paginate(30);
        }
        
        return view('betrecords.index',[
            'betrecords'=>$betrecords
        ]);
    }
}
