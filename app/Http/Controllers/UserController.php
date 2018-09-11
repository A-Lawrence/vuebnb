<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function toggle_saved(Request $request)
    {
        $inCollection = $request->user()->saved->contains($request->get('id'));

        $savedCollection = $request->user()->saved;

        $before = $savedCollection;

        if ($inCollection) {
            $savedCollection->forget(
                $savedCollection->search($request->get('id'))
            );
        } else {
            $savedCollection->push($request->get('id'));
        }

        $request->user()->update([
            'saved' => $savedCollection->values(),
        ]);

        return response()->json();
    }
}
