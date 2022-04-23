<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Models\ShortURL;

class ShortLinkController extends Controller
{    
    /**
     * store link
     *
     * @param  mixed $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'ttl' => 'required'
        ]);

        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl($request->url)
            ->activateAt(now()->addMinutes(5))
            ->deactivateAt(Carbon::now()->addMinutes($request->ttl))
            ->secure(false)
            ->make();

            return back()->with('status', 'short link created successfuly, 
            wait for 5 minutes link to be active');
    }

    /**
     * edit
     *
     * @param  mixed $link
     * @return Illuminate\Http\View
     */
    public function edit(ShortURL $link)
    {
        return view('links.edit', compact('link'));
    }
    
    /**
     * update link
     *
     * @param  mixed $link
     * @param  mixed $request
     */
    public function update(ShortURL $link, Request $request)
    {

        $request->validate([
            'url' => 'required',
            'ttl' => 'required'
        ]);


        //Check if destination URL === request URL
        if (strcmp($link->destination_url, $request->url) !== 0) {
            $link->delete();

            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
            $shortURLObject = $builder->destinationUrl($request->url)
                ->activateAt(now()->addMinutes(5))
                ->deactivateAt(Carbon::now()->addMinutes($request->ttl))
                ->secure(false)
                ->make();

            return back()->with('status', 'short link updated successfuly');
        }

        $deactivationAt = now()->addMinutes($request->ttl);
        
        $link->update(['activated_at' => now()->addMinutes(5), 'deactivated_at' => $deactivationAt]);

        return back()->with('status', 'short link updated successfuly');
    }
    
    /**
     * deactivate link
     *
     * @param  mixed $link
     *
     */
    public function deactivate(ShortURL $link)
    {
        //TODO: Submit PR for adding deleted_at for deactivatio
        //TODO: Fix Route cache on timestamp columns
        //This is not working as expected , I have noticed an issue and I will submit the PR to original author of this package
        $link->update(['activated_at' => now()->subDay(),'deactivated_at' => now()->subDay()]);
        return back()->with('status', 'short link deactivated successfuly');
    }
    
    /**
     * destroy link
     *
     * @param  mixed $link
     *
     */
    public function destroy(ShortURL $link)
    {
        $link->delete();
        return back()->with('status', 'short link deleted successfuly');
    }
}
