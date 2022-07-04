<?php

namespace App\Http\Controllers;

use App\Models\BetRecord;
use App\Models\CustomUser;
use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class CustomUserController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search != '') {
            $custom_users = CustomUser::where(function ($query) use ($search) {
                $query->where('chat_from_id', 'like', '%' . $search . '%')
                    ->orwhere('username', 'like', '%' . $search . '%');
            })->orderby('uid','DESC')->paginate(30);
            $custom_users->appends(['search' => $search]);
        } else {
            $custom_users = CustomUser::orderby('uid','DESC')->paginate(30);
        }
        return view('custom_users.index', [
            'custom_users' => $custom_users
        ]);
    }



    public function status($id)
    {
        $user = CustomUser::findOrFail($id);
        if ($user->enable == 0) {
            $user->enable = 1;
            $user->save();
        } else {
            $user->enable = 0;
            $user->save();
        }
        return back();
    }

    public function withdraw($uid)
    {


        $custom_user = CustomUser::find($uid);

        return view('custom_users.withdraw', [
            'custom_user' => $custom_user,

        ]);
    }
    public function withdrawupdate(Request $request, $uid)
    {
     
        $custom_user = CustomUser::find($uid);
        $balance = $custom_user->balance;
        $amount = $request->input('draw');

        if ($balance >= $amount) {
            $finanace = new Finance();
            $finanace->inout = 0;
            $finanace->amount = $amount;
            $finanace->finance_type = 2;
            $finanace->comment = "$custom_user->username Draw money";
            $finanace->user_id=$custom_user->chat_from_id;
            $finanace->save();

            $substract = $balance - $amount;
            $custom_user->balance = $substract;
            $custom_user->update();
            return redirect()->route('custom_users.index');
        } else {

            return redirect()->route('custom_users.withdraw', ['custom_user' => $custom_user,])->with('DrawAlert', '您的余额不足， 不能取现这个数额 !! 。');
        }
    }

    public function charge($uid)
    {


        $custom_user = CustomUser::find($uid);

        return view('custom_users.charge', [
            'custom_user' => $custom_user,

        ]);
    }
    public function chargeupdate(Request $request, $uid)
    {
        
        $custom_user = CustomUser::find($uid);
        $amount = $request->input('charge');
        $finanace = new Finance();
        $finanace->inout = 1;
        $finanace->amount = $amount;
        $finanace->finance_type = 1;
        $finanace->comment = "$custom_user->username Charge Money";
        $finanace->user_id=$custom_user->chat_from_id;
        $finanace->save();

        $balance = $custom_user->balance;
        $sum = collect([$balance, $amount])->sum();
        $custom_user->balance = $sum;
        $custom_user->update();
        return redirect()->route('custom_users.index');
    }
}
