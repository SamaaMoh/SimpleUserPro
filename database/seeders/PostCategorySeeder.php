<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::factory()
            ->count(5)
            ->create();
    }
}
