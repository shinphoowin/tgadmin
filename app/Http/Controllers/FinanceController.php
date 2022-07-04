<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use App\Models\BetRecord;
class FinanceController extends Controller
{
    public function index(){
        $search = request('search');
        if ($search != '') {
            $finances = Finance::whereHas('customusers',function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%');
            })->orderBy('fid', 'DESC')->paginate(30);
            $finances->appends(['search' => $search]);
        } else {
            $finances = Finance::orderBy('fid', 'DESC')->paginate(30);
        }
        return view('finances.index',[
            'finances'=>$finances,
           
        ]);
    }
   
}
