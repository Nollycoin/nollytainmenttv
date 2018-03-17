<?php

namespace App\Http\Controllers;

use App\Actor;
use App\ActorRelation;
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

        try {
            $imageName = md5(mt_rand()) . $actorImage->getClientOriginalName();

            $actorImage->move(public_path(Constants::getUploadDirectory() . '/actors/'),
                $imageName);

            $actor = new Actor([
                'actor_name' => $request->get('actor_name'),
                'actor_picture' => $imageName
            ]);

            $actor->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'An error occurred while adding the actor'
            ]);
        }

        return redirect()->back()->with('success', 'Actor was added successfully');
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

        try {
            if ($request->has('actor_picture')) {
                $pic = $actor->actor_picture;
                unlink(public_path(Constants::getUploadDirectory() . '/actors/' . $pic));

                $actorImage = $request->file('actor_picture');
                $imageName = md5(mt_rand()) . $actorImage->getClientOriginalName();

                $actorImage->move(public_path(Constants::getUploadDirectory() . '/actors/'),
                    $imageName);
            }

            $actor->update();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'An error occurred while updating the actor'
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Edit was successful'
        ]);
    }

    public function deleteActor($id)
    {

        $actor = Actor::findOrFail($id);

        try {
            unlink(public_path(Constants::getUploadDirectory() . '/actors/' . $actor->actor_picture));

            ActorRelation::where('actor_id', $actor->id)->delete();

            $actor->delete();
        } catch (\Exception $e) {
            return 'false';
        }

        return 'true';
    }
}
