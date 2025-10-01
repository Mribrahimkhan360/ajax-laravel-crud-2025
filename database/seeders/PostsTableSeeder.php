<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 300; $i++) {
            DB::table('posts')->insert([
                'title' => 'Post Title ' . $i,
                'body' => 'This is the body content for post number ' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
