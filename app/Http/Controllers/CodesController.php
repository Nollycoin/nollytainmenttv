<?php

namespace App\Http\Controllers;

use App\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodesController extends Controller
{
    public function redeemCode(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|exists:codes,code'
        ]);

        $code = Code::where('code', $request->get('code'))->first();
        if ($code != null){
            if($code->action == 'add_subscription'){
                Auth::user()->update([
                    'is_subscriber' => 1,
                    'subscription_expiration' => $code->amount
                ]);
            }elseif($code->action == 'add_subscription_time'){
                Auth::user()->update([
                    'subscription_expiration' => $code->amount
                ]);
            }

            return redirect()->back()->with('success', 'Code redeemed successfully');
        }else{
            return redirect()->back()->withErrors([
                'code' => 'invalid code'
            ]);
        }
    }
}
