<?php

namespace App\Http\Controllers;

use App\Models\NewEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEventNotification;


class AddEvent extends Controller
{
    
    public function saveEvents()
    {

        try {
            // Auth::attempt(['email' => 'temporary@example.com', 'password' => 'password']);
            for ($page = 0; $page <= 99; $page++) {
                $response = Http::get('https://app.ticketmaster.com/discovery/v2/events.json', [
                    'apikey' => 'eVm5wgNkQ7gcGbjf2QKNxlvMDGgASVAI',
                    'size' => 10,
                    'page' => $page
                ]);

                $eventsData = json_decode($response->body(), true);

                foreach ($eventsData['_embedded']['events'] as $event) {
                    $existingEvent = Event::where('ticketId', $event['id'])->first();
                    if (!$existingEvent){
                        try {
                            Event::create([
                                'ticketId' => $event['id'] ?? 'N.A',
                                'name' => $event['name'] ?? 'N.A',
                                'locale' => $event['locale'] ?? 'N.A',
                                'type' => $event['type'] ?? 'N.A',
                                'image' => $event['images'][2]['url'] ?? 'N.A',
                                'public_sales_start_time' => isset($event['sales']['public']['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['public']['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'public_sales_end_time' => isset($event['sales']['public']['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['public']['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'partner_presale_start_time' => isset($event['sales']['presales'][0]['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][0]['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'partner_presale_end_time' => isset($event['sales']['presales'][0]['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][0]['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'group_presale_start_time' => isset($event['sales']['presales'][1]['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][1]['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'group_presale_end_time' => isset($event['sales']['presales'][1]['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][1]['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'start_date' => isset($event['dates']['start']['dateTime']) ? \Carbon\Carbon::parse($event['dates']['start']['dateTime'])->format('Y-m-d H:i:s') : null,
                                'time_zone' => $event['dates']['timezone'] ?? 'N.A',
                                'status' => $event['dates']['status']['code'] ?? 'N.A',
                                'segment_id' => $event['classifications'][0]['segment']['id'] ?? 'N.A',
                                'segment_name' => $event['classifications'][0]['segment']['name'] ?? 'N.A',
                                'genre_id' => $event['classifications'][0]['genre']['id'] ?? 'N.A',
                                'genre_name' => $event['classifications'][0]['genre']['name'] ?? 'N.A',
                                'subgenre_id' => $event['classifications'][0]['subGenre']['id'] ?? 'N.A',
                                'subgenre_name' => $event['classifications'][0]['subGenre']['name'] ?? 'N.A',
                                'currency' => isset($event['priceRanges'][0]['currency']) ? $event['priceRanges'][0]['currency'] : 'N.A',
                                'min_price' => isset($event['priceRanges'][0]['min']) ? (float) $event['priceRanges'][0]['min'] : null,
                                'max_price' => isset($event['priceRanges'][0]['max']) ? (float) $event['priceRanges'][0]['max'] : null,
                                'venue_id' => $event['_embedded']['venues'][0]['id'] ?? 'N.A',
                                'venue' => $event['_embedded']['venues'][0]['name'] ?? 'N.A',
                                'venue_locale' => $event['_embedded']['venues'][0]['locale'] ?? 'N.A',
                                'venue_time_zone' => $event['_embedded']['venues'][0]['timezone'] ?? 'N.A',
                                'venue_country' => $event['_embedded']['venues'][0]['country']['name'] ?? 'N.A',
                                'venue_city' => $event['_embedded']['venues'][0]['city']['name'] ?? 'N.A',
                                'venue_postal_code' => $event['_embedded']['venues'][0]['postalCode'] ?? 'N.A',
                            ]);
                            $mailData = [
                                'title' => 'New Event Added - '.$event['name'],
                                'body' => '
                                    A new event has been added!<br><br>
                            
                                    <strong>Event ID:</strong> '.$event['id'].'<br>
                                    <strong>Event Name:</strong> '.$event['name'].'<br>
                                    <strong>Event Type:</strong> '.$event['type'].'<br>
                                    <strong>Start Date:</strong> '.(isset($event['dates']['start']['dateTime']) ? \Carbon\Carbon::parse($event['dates']['start']['dateTime'])->format('Y-m-d H:i:s') : null).'<br>
                                    <strong>Payment Currency:</strong> '.(isset($event['priceRanges'][0]['currency']) ? $event['priceRanges'][0]['currency'] : 'N.A').'<br>
                                    <strong>Min Price:</strong> '.(isset($event['priceRanges'][0]['min']) ? (float) $event['priceRanges'][0]['min'] : null).'<br>
                                    <strong>Max Price:</strong> '.(isset($event['priceRanges'][0]['max']) ? (float) $event['priceRanges'][0]['max'] : null).'<br>
                                    <strong>Venue:</strong> '.$event['_embedded']['venues'][0]['name'].' in '.$event['_embedded']['venues'][0]['country']['name'].'<br><br>
                            
                                    <img src="'.$event['images'][2]['url'].'" alt="Event Image" style="width:300px; height:100px;"><br><br>
                                '
                            ];                            
                            
                            Mail::to('sabbas482649@gmail.com')->send(new NewEventNotification($mailData));

                            NewEvent::create([
                                'ticketId' => $event['id'] ?? 'N.A',
                                'name' => $event['name'] ?? 'N.A',
                                'locale' => $event['locale'] ?? 'N.A',
                                'type' => $event['type'] ?? 'N.A',
                                'image' => $event['images'][2]['url'] ?? 'N.A',
                                'public_sales_start_time' => isset($event['sales']['public']['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['public']['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'public_sales_end_time' => isset($event['sales']['public']['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['public']['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'partner_presale_start_time' => isset($event['sales']['presales'][0]['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][0]['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'partner_presale_end_time' => isset($event['sales']['presales'][0]['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][0]['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'group_presale_start_time' => isset($event['sales']['presales'][1]['startDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][1]['startDateTime'])->format('Y-m-d H:i:s') : null,
                                'group_presale_end_time' => isset($event['sales']['presales'][1]['endDateTime']) ? \Carbon\Carbon::parse($event['sales']['presales'][1]['endDateTime'])->format('Y-m-d H:i:s') : null,
                                'start_date' => isset($event['dates']['start']['dateTime']) ? \Carbon\Carbon::parse($event['dates']['start']['dateTime'])->format('Y-m-d H:i:s') : null,
                                'time_zone' => $event['dates']['timezone'] ?? 'N.A',
                                'status' => $event['dates']['status']['code'] ?? 'N.A',
                                'segment_id' => $event['classifications'][0]['segment']['id'] ?? 'N.A',
                                'segment_name' => $event['classifications'][0]['segment']['name'] ?? 'N.A',
                                'genre_id' => $event['classifications'][0]['genre']['id'] ?? 'N.A',
                                'genre_name' => $event['classifications'][0]['genre']['name'] ?? 'N.A',
                                'subgenre_id' => $event['classifications'][0]['subGenre']['id'] ?? 'N.A',
                                'subgenre_name' => $event['classifications'][0]['subGenre']['name'] ?? 'N.A',
                                'currency' => $event['priceRanges'][0]['currency'] ?? 'N.A',
                                'min_price' => isset($event['priceRanges'][0]['min']) ? (float) $event['priceRanges'][0]['min'] : null,
                                'max_price' => isset($event['priceRanges'][0]['max']) ? (float) $event['priceRanges'][0]['max'] : null,
                                'venue_id' => $event['_embedded']['venues'][0]['id'] ?? 'N.A',
                                'venue' => $event['_embedded']['venues'][0]['name'] ?? 'N.A',
                                'venue_locale' => $event['_embedded']['venues'][0]['locale'] ?? 'N.A',
                                'venue_time_zone' => $event['_embedded']['venues'][0]['timezone'] ?? 'N.A',
                                'venue_country' => $event['_embedded']['venues'][0]['country']['name'] ?? 'N.A',
                                'venue_city' => $event['_embedded']['venues'][0]['city']['name'] ?? 'N.A',
                                'venue_postal_code' => $event['_embedded']['venues'][0]['postalCode'] ?? 'N.A',
                            ]);
                        } catch (\Exception $e) {
                            echo $e;
                        }
                    }
                }
            }
            echo "Successfully updated";
        } catch (\Exception $e) {
            echo $e;
        }
    }

}
