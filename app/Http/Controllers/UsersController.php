<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    private function generateAddress(){

        $url = config('app.generateAddressURL');
        $client = new Client();
        $res = $client->get($url);

        return $res->getBody();

    }

    public function subscriberRegister(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'string',
            'password' => 'required|min:6'
        ]);

        $is_admin = 0;
        $is_subscriber = 1;
        $subscription_expiration = strtotime('+31 days', time());


        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone_country_code = '234';
        $user->phone = (isset($request->user_phone) ? $request->user_phone : '');
        $user->password = bcrypt($request->user_password);
        $user->is_admin = $is_admin;
        $user->is_subscriber = $is_subscriber;
        //        move this to subscribe trait
        //        $user->subscription_expiration = $subscription_expiration;



        $eth = json_decode($this->generateAddress());


        $ethAddress = $eth->address;
        $ethKey = bcrypt($eth->privateKey);

        $user->wallet_address = $ethAddress;
        $user->wallet_key = $ethKey;


        $user->save();

        $profile = new Profile();

        $profile->user_id = $user->id;
        $profile->profile_name = explode(' ', $request->user_name)[0];
        $profile->profile_avatar = rand(0, 9);
        $profile->profile_language = 'english';
        $profile->is_kid = 0;

        $profile->save();

        $user->update([
            'last_profile' => $profile->id
        ]);

        return redirect(route('subscribe'));
    }
    public function changeEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_email' => 'required|email|confirmed',
            'new_email_confirmation' => 'required|email'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail(Auth::id());

        $user->update([
            'email' => $request->new_email
        ]);

        return redirect()->back()->with('success', 'Email was changed successfully');
    }

    public function changePassword(Request $request)
    {
        $request->current_password = bcrypt($request->get('current_password'));

        $validator = Validator::make($request->all(), [
            'current_password' => 'exists:users,password',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::where('password', bcrypt($request->get('current_password')))
            ->where('user_id', Auth::id())->first();


        $user->update([
            'password' => bcrypt($request->get('new_password'))
        ]);

        return redirect()->back()->with('success', 'Password was changed successfully');

    }

    public function changePhone(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->update([
            'phone' => $request->phone
        ]);

        return redirect()->back()->with('success', 'Phone number was changed successfully');
    }

    public function saveUser(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,email',
            'user_phone' => 'string',
            'user_rank' => 'required',
            'user_password' => 'required|min:6'
        ]);

        //dd($request->user_password);
        if ($request->user_rank == 0) {
            $is_admin = 0;
            $is_subscriber = 1;
            $subscription_expiration = strtotime('+31 days', time());
        } elseif ($request->user_rank == 1) {
            $is_subscriber = 1;
            $is_admin = 1;
            $subscription_expiration = strtotime('+31 days', time());
        } else {
            $is_admin = 0;
            $is_subscriber = 0;
            $subscription_expiration = strtotime('+31 days', time());
        }

        $user = new User();
        $user->name = $request->get('user_name');
        $user->email = $request->get('user_email');
        $user->phone_country_code = '234';
        $user->phone = (isset($request->user_phone) ? $request->user_phone : '');
        $user->password = bcrypt($request->user_password);
        $user->is_admin = $is_admin;
        $user->is_subscriber = $is_subscriber;
        $user->subscription_expiration = $subscription_expiration;

        $user->save();

        $profile = new Profile();

        $profile->user_id = $user->id;
        $profile->profile_name = explode(' ', $request->user_name)[0];
        $profile->profile_avatar = rand(0, 9);
        $profile->profile_language = 'english';
        $profile->is_kid = 0;

        $profile->save();

        $user->update([
            'last_profile' => $profile->id
        ]);

        return redirect(route('_users'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'user_name' => 'sometimes|string',
            'user_email' => 'sometimes|email',
            'user_password' => 'sometimes'
        ]);

        if ($request->has('user_name'))
            $user->name = $request->get('user_name');
        if ($request->has('user_email'))
            $user->email = $request->get('user_email');
        if ($request->has('user_phone'))
            $user->phone = $request->get('user_phone');
        if ($request->has('user_password'))
            $user->password = bcrypt($request->get('user_password'));

        if ($request->has('user_rank')) {
            $rank = $request->get('user_rank');
            if ($rank === 'subscriber') {
                $user->is_admin = 0;
                $user->is_subscriber = 1;
                $user->subscription_expiration = strtotime('+31 days', time());
            } else if ($rank === 1) {
                $user->is_subscriber = 1;
                $user->is_admin = 1;
            } else {
                $user->is_subscriber = 0;
                $user->is_admin = 0;
            }
        }

        $user->update();

        return redirect(route('_edit_user', [ 'id' => $user->id ]))->with('success', 'User was updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->profile->delete();
        $user->delete();
    }

    public function createPublisher(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:7',
            'password_confirmation' => 'required|min:7'
        ]);


        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->phone = (isset($request->user_phone) ? $request->user_phone : '');
        $user->password = bcrypt($request->user_password);
        $user->is_admin = 0;
        $user->is_subscriber = 0;
        $user->is_publisher = 1;
        $user->save();

        return redirect(route('home'))->with('success', 'Reigistration completed successfully');
    }
}
