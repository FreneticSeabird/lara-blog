<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
// use App\Models\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(string $slug)
    {
        // Récupération de l'article
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // Récupération des commentaires de l'article
        $comments = $post->comments;
        
        // Récupération des catégories de l'article
        $categories = $post->categories;
        
        // $model = new PostModel();
        // $results = $model->find($id);
        
        // if (empty($results)) {
        //     abort(404);
        // }
        
        // $post = $results[0];
        
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories
        ]);
    }
    
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        
        return view('posts.create', [
            'categories' => $categories    
        ]);
    }
    
    public function store(Request $request)
    {
        // Création de l'article
        $post = new Post();
        
        // On récupère les valeurs du formulaire
        // et on les donne aux différents champs de l'article
        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->content = $request->input('content');
        $post->user_id = 1;
        
        // Enregistrement de l'article
        $post->save();
        
        // Redirection vers la route qui s'appelle home (l'accueil)
        return redirect()->route('home');
    }
}
