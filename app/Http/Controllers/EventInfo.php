<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventInfo extends Controller
{
    public function getEvents(Request $request)
    {
        $page = $request->query('page', 0);
        $size = $request->query('size', 1);

        $response = Http::get('https://app.ticketmaster.com/discovery/v2/events.json', [
            'apikey' => 'eVm5wgNkQ7gcGbjf2QKNxlvMDGgASVAI',
            'page' => $page,
            'size' => $size
        ]);

        $eventsData = json_decode($response->body(), true);

        if ($response->successful()) {
            $events = $eventsData['_embedded']['events'];

            $links = $eventsData['_links'];

            return view('events', compact('events', 'links'));
        } else {
            return "Failed to fetch events. Error: " . $response->status();
        }
    }
// }

// public function getEvents()
//     {
//         $response = Http::get('https://app.ticketmaster.com/discovery/v2/events.json', [
//             'apikey' => 'eVm5wgNkQ7gcGbjf2QKNxlvMDGgASVAI',
//             'size' => 1
//         ]);

//         $eventsData = json_decode($response->body(), true);

//         if ($response->successful()) {
//             echo "<pre>";
//             print_r($eventsData);
//             echo "</pre>";
//         } else {
//             echo "Failed to fetch events. Error: " . $response->status();
//         }
//     }
}

