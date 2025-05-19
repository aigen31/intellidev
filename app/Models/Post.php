<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function translations(): HasMany {
        return $this->hasMany(PostTranslation::class);
    }

    public function translation($locale = null) {
        $locale = app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    protected function casts(): array
    {
        return [
            'status' => PostStatus::class,
        ];
    }

    protected function excerpt(): Attribute {
        return Attribute::make(
            get: fn () => Str::words(Str::of($this->translation()->content)->stripTags(), 20)
        );
    }
}
