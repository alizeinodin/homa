<?php

namespace Tests\Feature;

use App\Models\Tweet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class TweetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    private function makeTweet(array $attributes = []): Tweet
    {
        return Tweet::create(array_merge([
            'name' => 'Demo User',
            'handle' => '@demouser',
            'image' => 'https://example.com/avatar.jpg',
            'tweet' => 'Hello Homa',
            'file' => null,
            'is_video' => false,
            'comments' => 1,
            'retweets' => 2,
            'likes' => 3,
            'analytics' => 4,
        ], $attributes));
    }

    public function test_feed_lists_tweets_newest_first(): void
    {
        $older = $this->makeTweet(['tweet' => 'older']);
        $newer = $this->makeTweet(['tweet' => 'newer']);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Welcome')
                ->has('tweets', 2)
                ->where('tweets.0.id', $newer->id)
                ->where('tweets.1.id', $older->id));
    }

    public function test_user_can_post_a_text_tweet(): void
    {
        $this->post(route('tweets.store'), ['tweet' => 'My first tweet'])
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('tweets', [
            'tweet' => 'My first tweet',
            'handle' => '@demouser',
            'is_video' => false,
        ]);
    }

    public function test_tweet_text_is_required(): void
    {
        $this->post(route('tweets.store'), ['tweet' => ''])
            ->assertSessionHasErrors('tweet');

        $this->assertDatabaseCount('tweets', 0);
    }

    public function test_tweet_text_cannot_exceed_500_characters(): void
    {
        $this->post(route('tweets.store'), ['tweet' => str_repeat('a', 501)])
            ->assertSessionHasErrors('tweet');
    }

    public function test_user_can_delete_a_tweet(): void
    {
        $tweet = $this->makeTweet();

        $this->delete(route('tweets.destroy', $tweet))
            ->assertRedirect(route('dashboard'));

        $this->assertModelMissing($tweet);
    }
}
