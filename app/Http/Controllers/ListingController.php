<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function get_homepage()
    {
        return view('app', [
            'data' => collect([
                'listings' => Listing::all([
                    'id',
                    'address',
                    'title',
                    'price_per_night',
                ])->map(function ($listing) {
                    $filepath = sprintf("images/%d/Image_1_thumb.jpg", $listing->id);
                    
                    $listing->thumb = asset($filepath);

                    return $listing;
                })->toArray(),
            ]),
        ]);
    }

    public function get_listing_api(Listing $listing)
    {
        return response()->json($this->get_listing($listing));
    }

    public function get_listing_web(Listing $listing)
    {
        return view('app')->with('data', $this->get_listing($listing));
    }

    protected function get_listing(Listing $listing)
    {
        $model = $listing->toArray();

        for ($i = 1; $i <= 4; $i++) {
            $filepath             = sprintf("images/%d/Image_%d.jpg", $model['id'], $i);
            $model['image_' . $i] = asset($filepath);
        }

        return collect(['listing' => $model]);
    }
}
