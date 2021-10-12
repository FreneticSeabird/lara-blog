<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(int $id, Request $request)
    {
        // Validation du formulaire avant insertion
        $request->validate([
            'nickname' => 'required|min:3',
            'content' => 'required|min:5'
        ]);
        
        // Insertion du commentaire pour le bon article
        $post = Post::findOrFail($id);
        
        $comment = new Comment();
        $comment->nickname = $request->input('nickname');
        $comment->content = $request->input('content');
        
        // Insertion du commentaire à l'aide de sa relation avec les posts
        $post->comments()->save($comment);
        
        return redirect()->route('posts.show', ['slug' => $post->slug]);
    }
}
