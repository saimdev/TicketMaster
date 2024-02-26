<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .table-wrapper {
            overflow-x: auto;
            overflow-y: auto;
            max-height: 75vh; 
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        th {
            white-space: nowrap;
            text-align: center; 
            vertical-align: middle; 
            border-right: 1px solid lightgray !important;
        }

        td {
            border-right: 1px solid lightgray !important;
            text-align: center; 
            vertical-align: middle; 
        }
    </style>
    <title>TicketMaster</title>
</head>
<body>
    <x-header/> 
    <div class="mt-1">
    <h1>All Events</h1>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th>id</th>
                    <th>Name</th>
                    <th>Locale</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Public Sales Start Time</th>
                    <th>Public Sales End Time</th>
                    <th>Partner PreSale - Start Time</th>
                    <th>Partner PreSale - End Time</th>
                    <th>Group PreSale - Start Time</th>
                    <th>Group PreSale - End Time</th>
                    <th>Start Date</th>
                    <th>TimeZone</th>
                    <th>Status</th>
                    <th>Segment Id</th>
                    <th>Segment Name</th>
                    <th>Genre Id</th>
                    <th>Genre Name</th>
                    <th>SubGenre Id</th>
                    <th>SubGenre Name</th>
                    <th>Currency</th>
                    <th>Min Price</th>
                    <th>Max Price</th>
                    <th>Venue Id</th>
                    <th>Venue</th>
                    <th>Venue Locale</th>
                    <th>Venue TimeZone</th>
                    <th>Venue Country</th>
                    <th>Venue City</th>
                    <th>Venue PostalCode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event['id'] }}</td>
                        <td><a href="{{ $event['url'] }}">{{ $event['name'] }}</a></td>
                        <td>{{ $event['locale'] }}</td>
                        <td>{{ $event['type'] }}</td>
                        <td><img src="{{ $event['images'][2]['url'] }}" alt="" style="width: 150px; height: 50px"></td>
                        @if (isset($event['sales']['public']['startDateTime']))
                            <td>{{ \Carbon\Carbon::parse($event['sales']['public']['startDateTime'])->format('Y-m-d H:i:s') }}</td>
                        @else
                            <td>N/A</td>
                        @endif
                        
                        @if (isset($event['sales']['public']['endDateTime']))
                            <td>{{ \Carbon\Carbon::parse($event['sales']['public']['endDateTime'])->format('Y-m-d H:i:s') }}</td>
                        @else
                            <td>N/A</td>
                        @endif
                        @if (isset($event['sales']['presales'][0]))
                            <td>{{ \Carbon\Carbon::parse($event['sales']['presales'][0]['startDateTime'])->format('Y-m-d H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event['sales']['presales'][0]['endDateTime'])->format('Y-m-d H:i:s') }}</td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif

                        @if (isset($event['sales']['presales'][1]))
                            <td>{{ \Carbon\Carbon::parse($event['sales']['presales'][1]['startDateTime'])->format('Y-m-d H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event['sales']['presales'][1]['endDateTime'])->format('Y-m-d H:i:s') }}</td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif
                        <td>{{ \Carbon\Carbon::parse($event['dates']['start']['dateTime'])->format('Y-m-d H:i:s') }}</td>
                        @if (isset($event['dates']['timezone']))
                            <td>{{ $event['dates']['timezone'] }}</td>
                        @else 
                            <td>N.A</td>
                        @endif
                        <td>{{ $event['dates']['status']['code'] }}</td>
                        @if (isset($event['classifications'][0]))
                            @if (isset($event['classifications'][0]['segment']))
                                <td>{{ $event['classifications'][0]['segment']['id'] }}</td>
                                <td>{{ $event['classifications'][0]['segment']['name'] }}</td>
                            @else
                                <td>N.A</td>
                                <td>N.A</td>
                            @endif
                            @if (isset($event['classifications'][0]['genre']))
                                <td>{{ $event['classifications'][0]['genre']['id'] }}</td>
                                <td>{{ $event['classifications'][0]['genre']['name'] }}</td>
                            @else
                                <td>N.A</td>
                                <td>N.A</td>
                            @endif
                            @if (isset($event['classifications'][0]['subGenre']))
                                <td>{{ $event['classifications'][0]['subGenre']['id'] }}</td>
                                <td>{{ $event['classifications'][0]['subGenre']['name'] }}</td>
                            @else
                                <td>N.A</td>
                                <td>N.A</td>
                            @endif
                        @else 
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                        @endif
                        @if (isset($event['priceRanges'][0]))
                            <td>{{ $event['priceRanges'][0]['currency'] }}</td>
                            <td>{{ $event['priceRanges'][0]['min'] }}</td>
                            <td>{{ $event['priceRanges'][0]['max'] }}</td>
                        @else
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                        @endif
                        @if (isset($event['_embedded']))
                            @if (isset($event['_embedded']['venues'][0]))
                                <td>{{ $event['_embedded']['venues'][0]['id'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['name'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['locale'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['timezone'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['country']['name'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['city']['name'] }}</td>
                                <td>{{ $event['_embedded']['venues'][0]['postalCode'] }}</td>
                            @else
                                <td>N.A</td>
                                <td>N.A</td>
                                <td>N.A</td>
                                <td>N.A</td>
                                <td>N.A</td>
                                <td>N.A</td>
                                <td>N.A</td>
                            @endif
                        @else
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                            <td>N.A</td>
                        @endif
                        <td><a href="/buy" class="btn-success p-2" style="border-radius: 5px; text-decoration:none">Buy</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $links['first']['href'] }}">First</a></li>
            <li class="page-item"><a class="page-link" href="{{ $links['self']['href'] }}">Self</a></li>
            <li class="page-item"><a class="page-link" href="{{ $links['next']['href'] }}">Next</a></li>
            <li class="page-item"><a class="page-link" href="{{ $links['last']['href'] }}">Last</a></li>
        </ul>
    </nav>
</div>

</body>
</html>
