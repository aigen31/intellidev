<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentService
{
    public static function create(array $data)
    {
        $user = Auth::user();

        if ($user->hasAccess('comment.create')) {
            Validator::make($data, [
                'content' => 'required|string|max:500',
                'post_id' => 'required|exists:posts,id',
                'parent_comment_id' => 'nullable|exists:comments,id',
            ])->validate();

            $user->comments()->create([
                'content' => $data['content'],
                'post_id' => $data['post_id'],
                'parent_comment_id' => $data['parent_comment_id'] ?? null,
            ]);
        }
    }
}
