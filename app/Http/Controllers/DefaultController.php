<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DefaultController extends Controller
{
    public function home()
    {
        $posts = Post::with('user')->latest()->paginate(5);
        
        return view('homepage', [
            'posts' => $posts    
        ]);
    }
}
