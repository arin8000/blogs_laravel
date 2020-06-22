<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Blogs by Laravel';
//        return view('pages.index', compact('title'));
        if (Auth::user()) {
            return redirect('/posts');
        }
        return view('pages.index')->with('title' , $title);
    }

    public function about()
    {
        $title = 'About US';
        return view('pages.about')->with('title' , $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design' , 'Programming' , 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
