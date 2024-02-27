<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\NewEvent;
use App\Models\Event;

class EventInfo extends Controller
{
    // public function getEvents(Request $request)
    // {
    //     $page = $request->query('page', 0);
    //     $size = $request->query('size', 10);

    //     $response = Http::get('https://app.ticketmaster.com/discovery/v2/events.json', [
    //         'apikey' => 'eVm5wgNkQ7gcGbjf2QKNxlvMDGgASVAI',
    //         'page' => $page,
    //         'size' => $size
    //     ]);

    //     $eventsData = json_decode($response->body(), true);

    //     if ($response->successful()) {
    //         $events = $eventsData['_embedded']['events'];

    //         $links = $eventsData['_links'];

    //         return view('events', compact('events', 'links'));
    //     } else {
    //         return "Failed to fetch events. Error: " . $response->status();
    //     }
    // }

    public function getEvents(Request $request)
    {
        $events = Event::paginate(10);

        if ($events) {
            return view('events', compact('events'));
        } else {
            echo "Failed to fetch new events.";
        }
    }
    public function getNewEvents()
    {
        $events = NewEvent::paginate(10);

        $accounts = Account::all();

        if ($events) {
            return view('newevents', compact('events', 'accounts'));
        } else {
            echo "Failed to fetch new events.";
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

