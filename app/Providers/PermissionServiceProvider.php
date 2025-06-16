<?php

namespace App\Providers;

use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;

class PermissionServiceProvider extends OrchidServiceProvider
{
    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group('comment')
                ->addPermission('comment.create', 'Comment create')
                ->addPermission('comment.edit', 'Comment edit')
                ->addPermission('comment.delete', 'Comment delete'),
            ItemPermission::group('post')
                ->addPermission('own.create', 'Own post create')
                ->addPermission('own.edit', 'Own post edit')
                ->addPermission('own.delete', 'Own post delete')
                ->addPermission('post.create', 'Post create')
                ->addPermission('post.edit', 'Post edit')
                ->addPermission('post.delete', 'Post delete'),
        ];
    }
}
