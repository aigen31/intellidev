<?php

namespace App\Models;

use App\Http\Controllers\PostTranslationController;
use App\Services\ContentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    /** @use HasFactory<\Database\Factories\PostTranslationFactory> */
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->read_time = ContentService::getReadTime($model->content);
        });

        static::updating(function ($model) {
            $model->read_time = ContentService::getReadTime($model->content);
        });
    }
}
