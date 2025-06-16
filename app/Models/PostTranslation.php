<?php

namespace App\Models;

use App\Services\ReadTimeService;
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
            $model->read_time = ReadTimeService::calculate($model->content);
        });

        static::updating(function ($model) {
            $model->read_time = ReadTimeService::calculate($model->content);
        });
    }
}
