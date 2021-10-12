<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PostModel
{
    public function find(int $id): array
    {
        return DB::select('
            SELECT * 
            FROM posts
            INNER JOIN users ON users.id = posts.user_id
            WHERE posts.id = ?
        ', [$id]);
    }
}