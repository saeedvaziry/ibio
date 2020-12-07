<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureRequestController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeLinkType(Request $request)
    {
        $request->validateWithBag('requestLinkType', [
            'description' => 'required|max:1000'
        ]);

        $request->user()->featureRequests()->create([
            'description' => $request->description
        ]);

        return back()->with([
            'success' => __("Thank you, We're on it 🚀")
        ]);
    }
}
