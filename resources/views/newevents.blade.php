<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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
        <div class="d-flex flex-row my-2">
            <h1>New Events</h1>
                @php
                    $totalMinPrice = 0; 
                @endphp
                @foreach ($events as $event)
                    @php
                        $totalMinPrice += $event->min_price; 
                    @endphp
                @endforeach
                {{-- <a href="/stripe/{{$totalMinPrice}}" class="btn btn-success p-2 mx-2" style="border-radius: 5px; text-decoration:none; align-self:center;">Buy All Tickets</a> --}}
                <button type="button" class="btn btn-danger mx-2" data-toggle="modal" data-target="#selectAccountModal">
                    Buy All Tickets
                </button>
                <div class="modal fade" id="selectAccountModal" tabindex="-1" role="dialog" aria-labelledby="selectAccountModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="selectAccountModalLabel">Select Account</h4>
                                <button type="button" class="close btn br-1" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="selectAccountForm">
                                    <div class="form-group">
                                        <label for="accountSelect">Choose Account:</label>
                                        <select class="form-control" id="accountSelect">
                                            @foreach($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="applyButton">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    
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
<script>
    document.getElementById('applyButton').addEventListener('click', function() {
        var accountId = document.getElementById('accountSelect').value;
        fetch('/submit-credentials', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ accountId: accountId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script>
</html>
