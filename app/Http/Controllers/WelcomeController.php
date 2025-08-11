<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get latest project
        $project = Project::latest()->first();
        // Transform YouTube link to embed link if project exists
        if ($project) {
            // Extract video ID from YouTube URL
            $videoId = $this->getYoutubeVideoId($project->yt_link);
            $project->yt_embed_link = "https://www.youtube.com/embed/" . $videoId;
        }

        // Get latest main news
        $news = News::where('is_main', true)->latest()->first();

        // Get LKM events
        $lkmEvents = Event::where('category', 'lkm')
            ->whereDate('end_date', '>=', now())
            ->orderBy('start_date')
            ->take(5)
            ->get();

        // Get external events
        $externalEvents = Event::where('category', 'external')
            ->whereDate('end_date', '>=', now())
            ->orderBy('start_date')
            ->take(5)
            ->get();

        return view('welcome', compact('project', 'news', 'lkmEvents', 'externalEvents'));
    }

    /**
     * Extract YouTube video ID from URL
     */
    private function getYoutubeVideoId($url)
    {
        $videoId = "";

        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $videoId = $match[1];
        }

        return $videoId;
    }
}