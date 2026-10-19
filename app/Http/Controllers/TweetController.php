<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'tweets' => Tweet::orderByDesc('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tweet' => 'required|string|max:500',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4|max:10240',
        ]);

        $path = '';
        $fileName = null;
        $extension = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = $extension === 'mp4' ? '/videos/' : '/pics/';

            $dir = public_path($path);
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $file->move($dir, $fileName);
        }

        Tweet::create([
            'name' => 'Demo User',
            'handle' => '@demouser',
            'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'tweet' => $request->input('tweet'),
            'file' => $fileName ? $path.$fileName : null,
            'is_video' => $extension === 'mp4',
            'comments' => random_int(5, 500),
            'retweets' => random_int(5, 500),
            'likes' => random_int(5, 500),
            'analytics' => random_int(5, 500),
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Tweet $tweet)
    {
        if ($tweet->file && file_exists(public_path($tweet->file))) {
            unlink(public_path($tweet->file));
        }

        $tweet->delete();

        return redirect()->route('dashboard');
    }
}
