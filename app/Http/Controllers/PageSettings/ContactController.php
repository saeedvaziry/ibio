<?php

namespace App\Http\Controllers\PageSettings;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        $contacts = config('links.contacts');
        $havingItems = [];
        $notHavingItems = [];
        foreach ($contacts as $key => $contact) {
            $link = auth()->user()->contactLinks()->where('title', $contact['value'])->first();
            if ($link) {
                $contact['link'] = new LinkResource($link);
                array_push($havingItems, $contact);
            } else {
                array_push($notHavingItems, $contact);
            }
        }
        return inertia('page-settings/contact/Index', [
            'title' => __('Page settings - Contact'),
            'menu' => 'page-settings',
            'subMenu' => 'contact',
            'contacts' => array_merge($havingItems, $notHavingItems)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validateWithBag('add', [
            'contact' => 'required'
        ]);

        $link = $request->user()->contactLinks()->where('title', $request->contact)->first();
        if ($link) {
            if ($request->url) {
                $link->update([
                    'url' => $request->url
                ]);
            } else {
                $link->delete();
            }
        } else {
            $request->validateWithBag('add', [
                'url' => 'required'
            ]);
            $request->user()->contactLinks()->create([
                'type' => 'contact',
                'title' => $request->contact,
                'url' => $request->url
            ]);
        }

        return back()->with([
            'success' => __('Link added')
        ]);
    }
}
