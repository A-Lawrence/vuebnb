<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function get_listing_api(Listing $listing)
    {
        $model = $listing->toArray();

        for($i=1; $i<=4; $i++){
            $filepath = sprintf("images/%d/Image_%d.jpg", $model['id'], $i);
            $model['image_' . $i] = asset($filepath);
        }

        return response()->json($model);
    }
}
