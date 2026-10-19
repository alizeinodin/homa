<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TweetsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tweets')->delete();

        $now = Carbon::now();

        DB::table('tweets')->insert([
            [
                'name' => 'Avis Glover',
                'handle' => '@avisglover',
                'image' => 'https://randomuser.me/api/portraits/men/77.jpg',
                'tweet' => "I've never seen ANYONE play guitar as good as this!!! Many guitarists neglect the theory side of things — but do not underestimate it.",
                'file' => '/pics/PlayGuitar.png',
                'is_video' => false,
                'comments' => '94',
                'retweets' => '29',
                'likes' => '33',
                'analytics' => '89',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Andre Carpenter',
                'handle' => '@andrecarpenter',
                'image' => 'https://randomuser.me/api/portraits/men/7.jpg',
                'tweet' => "Do you wanna learn Javascript? I'm gonna make a tutorial to show you all how easy it is.",
                'file' => '/pics/Code.png',
                'is_video' => false,
                'comments' => '83',
                'retweets' => '59',
                'likes' => '62',
                'analytics' => '66',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Josephine Perry',
                'handle' => '@josephineperry',
                'image' => 'https://randomuser.me/api/portraits/women/59.jpg',
                'tweet' => 'Just shipped a small SEO tip thread. Search tools (free and paid) can help you see what actually moves the needle.',
                'file' => null,
                'is_video' => false,
                'comments' => '56',
                'retweets' => '54',
                'likes' => '78',
                'analytics' => '21',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Johnni Ward',
                'handle' => '@johnniward',
                'image' => 'https://randomuser.me/api/portraits/men/40.jpg',
                'tweet' => 'We went rock climbing this weekend. Climbing is way more fun than any gym machine — it works mind and body.',
                'file' => null,
                'is_video' => false,
                'comments' => '35',
                'retweets' => '54',
                'likes' => '88',
                'analytics' => '81',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
