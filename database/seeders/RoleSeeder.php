<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'permissions' => [
                    'comment.create' => '1',
                    'comment.edit' => '1',
                    'comment.delete' => '1',
                    'post.own.create' => '1',
                    'post.own.edit' => '1',
                    'post.own.delete' => '1',
                ]
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'permissions' => [
                    'comment.create' => '1',
                    'comment.edit' => '1',
                    'comment.delete' => '1',
                ]
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                $role
            );
        }
    }
}
