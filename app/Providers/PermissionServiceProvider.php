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
                ->addPermission('create', 'Comment create')
                ->addPermission('edit', 'Comment edit')
                ->addPermission('delete', 'Comment delete'),
            ItemPermission::group('post')
                ->addPermission('own.create', 'Own post create')
                ->addPermission('own.edit', 'Own post edit')
                ->addPermission('own.delete', 'Own post delete')
                ->addPermission('create', 'Post create')
                ->addPermission('edit', 'Post edit')
                ->addPermission('delete', 'Post delete'),
        ];
    }
}
