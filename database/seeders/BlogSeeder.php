<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $subscribers = User::whereNot('id', $user->id)->get()->random(1);

            Blog::factory()->for($user)->hasAttached(
               factory: $subscribers,
               relationship: 'subscribers',
            )->create();
        });
    }
}
