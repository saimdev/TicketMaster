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
    <h1>New Events</h1>
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
                        <td>{{ $event->ticketId }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->locale }}</td>
                        <td>{{ $event->type }}</td>
                        <td><img src="{{ $event->image }}" alt="" style="width: 150px; height: 50px"></td>
                        <td>{{ $event->public_sales_start_time }}</td>
                        <td>{{ $event->public_sales_end_time }}</td>
                        <td>{{ $event->partner_presale_start_time }}</td>
                        <td>{{ $event->partner_presale_end_time }}</td>
                        <td>{{ $event->group_presale_start_time }}</td>
                        <td>{{ $event->group_presale_end_time }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->time_zone }}</td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->segment_id }}</td>
                        <td>{{ $event->segment_name }}</td>
                        <td>{{ $event->genre_id }}</td>
                        <td>{{ $event->genre_name }}</td>
                        <td>{{ $event->subgenre_id }}</td>
                        <td>{{ $event->subgenre_name }}</td>
                        <td>{{ $event->currency }}</td>
                        <td>{{ $event->min_price }}</td>
                        <td>{{ $event->max_price }}</td>
                        <td>{{ $event->venue_id }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>{{ $event->venue_locale }}</td>
                        <td>{{ $event->venue_time_zone }}</td>
                        <td>{{ $event->venue_country }}</td>
                        <td>{{ $event->venue_city }}</td>
                        <td>{{ $event->venue_postal_code }}</td>
                        <td>
                            <a href="/buy" class="btn btn-success p-2" style="border-radius: 5px; text-decoration:none">Buy</a>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {!! $events->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
</div>

</body>
</html>
