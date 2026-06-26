<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $formattedData = collect($posts->items())->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'category' => $post->category,
                'excerpt' => Str::limit(strip_tags($post->content), 100),
                'published_at' => $post->created_at,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar artikel berhasil diambil',
            'data' => $formattedData,
            'meta' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'total_data' => $posts->total(),
            ]
        ]);
    }
}
