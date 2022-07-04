<?php

namespace App\Http\Controllers;
use App\Models\Request_Finance;
use App\Models\Finance;
use App\Models\CustomUser;
use Illuminate\Http\Request;

class RequestFinanceController extends Controller
{
    public function pending(){
        $search = request('search');
        if ($search != '') {
            $pending = Request_Finance::whereHas('customusers',function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orwhere('finance_time', 'like', '%' . $search . '%');
            })->where('status','=','0')->orderBy('bfid', 'DESC')->paginate(30);
           
            $pending->appends(['search' => $search]);
        } else {
            $pending = Request_Finance::where('status','=','0')->orderBy('bfid', 'DESC')->paginate(30);
        }
        return view('request_finances.pending',['pending'=>$pending]);
    }
    
    public function finish(){
        $search = request('search');
        if ($search != '') {
            $finish = Request_Finance::whereHas('customusers',function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orwhere('finance_time', 'like', '%' . $search . '%');
            })->where('status','=','1')->orderBy('bfid', 'DESC')->paginate(30);
           
            $finish->appends(['search' => $search]);
        } else {
            $finish = Request_Finance::where('status','=','1')->orderBy('bfid', 'DESC')->paginate(30);
        }
        return view('request_finances.finish',[
            'finish'=>$finish
        ]);
    }

    public function charge($bfid){
        $request_finance = Request_Finance::findOrFail($bfid);

        $custom_users=CustomUser::where('chat_from_id' ,$request_finance->user_id)->get();
        $balance = $custom_users[0]->balance;
        $bot_amount = $request_finance->amount;

        $request_finance->status=1;
        $request_finance->save();

        $finanace = new Finance();
        $finanace->inout = 1;
        $finanace->amount = $bot_amount;
        $finanace->finance_type = 1;
        $finanace->comment = $custom_users[0]->username ."Charge money";
        $finanace->user_id=$custom_users[0]->chat_from_id;
        $finanace->save();
        
        $sum = collect([$balance, $bot_amount])->sum();
        $custom_users[0]->balance = $sum;
        $custom_users[0]->update();

       
        return back();
    }
    public function draw($bfid){
        $request_finance = Request_Finance::findOrFail($bfid);
        
        $custom_users=CustomUser::where('chat_from_id' ,$request_finance->user_id)->get();
        $user_balance = $custom_users[0]->balance;
        $bot_amount = $request_finance->amount;
        
        if($bot_amount <=$user_balance){
            $request_finance->status=1;
            $request_finance->save();

            $finanace = new Finance();
            $finanace->inout = 0;
            $finanace->amount = $bot_amount;
            $finanace->finance_type = 2;
            $finanace->comment = $custom_users[0]->username ."Draw money";
            $finanace->user_id=$custom_users[0]->chat_from_id;
            $finanace->save();
            
            $substract = $user_balance - $bot_amount;
            $custom_users[0]->balance = $substract;
            $custom_users[0]->update();
            return back();
        }else{
            $request_finance->status=0;
            $request_finance->save();
            return redirect()->route('request_finances.pending')->with('DrawAlert', '您的余额不足， 不能取现这个数额 !! 。');
        }
       
    }

    
}
