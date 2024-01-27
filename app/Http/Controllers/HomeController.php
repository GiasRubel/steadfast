<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $urls = Url::where('user_id', Auth::id())->get();

        return view('home', ['urls' => $urls]);

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url|max:191',
        ]);

        $url = new Url;
        $url->long_url = $request->long_url;
        $url->short_url = Str::random(8);
        $url->user_id = Auth::id();
        $url->save();

        session()->flash('success', 'URL created successfully!');

        return redirect()->back();
    }

    public function redirect($short_url)
    {
        $url = Url::where('short_url', $short_url)->firstOrFail();
        $url->increment('click_count');

        return redirect($url->long_url);
    }
}
