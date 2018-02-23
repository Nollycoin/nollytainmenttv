<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Helpers\Constants;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function saveActor(Request $request){

        $this->validate($request, [
           'actor_name'  => 'required|string',
            'actor_picture' => 'required|image|mimes:jpeg,png,jpg|max:10024'
        ]);


        $actorImage = $request->file('actor_picture');

        $imageName = md5(mt_rand()).$actorImage->getClientOriginalName();

        $actorImage->move(public_path(Constants::getUploadDirectory().'/actors/'),
            $imageName);

        $actor = new Actor([
            'actor_name' => $request->get('actor_name'),
            'actor_picture' => $imageName
        ]);

        $actor->save();

        return redirect(route('_actors'));
    }
}
