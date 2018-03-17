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

    public function generateCode(Request $request){

        $this->validate($request, [
            'code_action' => 'required',
            'code_amount' => 'required'
        ]);

        $code_value = substr(strtoupper(md5(rand())),0,3).'-'
            .substr(strtoupper(md5(rand())),0,3).'-'
            .substr(strtoupper(md5(rand())),0,3);

        switch ($request->get('code_amount')) {
            case '1_day':
                $time = strtotime('+1 day',time());
                $time_plain = '1 day';
                break;
            case '1_week':
                $time = strtotime('+1 week',time());
                $time_plain = '1 week';
                break;
            case '1_month':
                $time = strtotime('+31 days',time());
                $time_plain = '1 month';
                break;
            default:
                $time = 0;
                $time_plain = '1 day';
                break;
        }

        $code = new Code();
        $code->code = $code_value;
        $code->amount = $time;
        $code->amount_plain = $time_plain;
        $code->action = $request->get('code_action');

        $code->save();

        return redirect(route('_codes'))->with('success', 'Code was generated successfully');
    }

    public function deleteCode($id)
    {
        $code = Code::findOrFail($id);
        try {
            $code->delete();
        } catch (\Exception $e) {
            return 'false';
        }
        return 'true';
    }
}
