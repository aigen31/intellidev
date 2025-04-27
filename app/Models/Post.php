<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'status' => PostStatus::class,
        ];
    }

    protected function excerpt(): Attribute {
        return Attribute::make(
            get: fn () => Str::words($this->content, 20)
        );
    }
}
