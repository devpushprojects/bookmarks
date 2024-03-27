<?php

namespace Database\Seeders;

use App\Models\Bookmark;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected const BOOKMARKS = [
        ['name' => 'Facebook', 'url' => 'https://www.facebook.com'],
        ['name' => 'Twitter', 'url' => 'https://twitter.com'],
        ['name' => 'TikTok', 'url' => 'https://www.tiktok.com']
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (self::BOOKMARKS as $bookmark) {
            Bookmark::create($bookmark);
        }
    }
}
