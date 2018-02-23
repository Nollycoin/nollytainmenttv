<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Helpers\Constants;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function saveActor(Request $request)
    {

        $this->validate($request, [
            'actor_name' => 'required|string',
            'actor_picture' => 'required|image|mimes:jpeg,png,jpg|max:10024'
        ]);


        $actorImage = $request->file('actor_picture');

        $imageName = md5(mt_rand()) . $actorImage->getClientOriginalName();

        $actorImage->move(public_path(Constants::getUploadDirectory() . '/actors/'),
            $imageName);

        $actor = new Actor([
            'actor_name' => $request->get('actor_name'),
            'actor_picture' => $imageName
        ]);

        $actor->save();

        return redirect(route('_actors'));
    }

    public function updateActor(Request $request, $id)
    {
        $this->validate($request, [
            'actor_name' => 'string',
            'actor_picture' => 'image|mimes:jpeg,png,jpg|max:10024'
        ]);
        $actor = Actor::findOrFail($id);
        if ($request->has('actor_name')) {
            $actor->actor_name = $request->get('actor_name');
        }

        if ($request->has('actor_picture')) {
            $pic = $actor->actor_picture;
            unlink(public_path(Constants::getUploadDirectory() . '/actors/' . $pic));

            $actorImage = $request->file('actor_picture');
            $imageName = md5(mt_rand()) . $actorImage->getClientOriginalName();

            $actorImage->move(public_path(Constants::getUploadDirectory() . '/actors/'),
                $imageName);
        }

        $actor->update();

        return redirect(route('_edit_actor', ['id' => $actor->id]))->with([
            'success' => 'Edit was successful'
        ]);
    }
}
