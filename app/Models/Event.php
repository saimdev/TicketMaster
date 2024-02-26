<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticketId',
        'name',
        'locale',
        'type',
        'image',
        'public_sales_start_time',
        'public_sales_end_time',
        'partner_presale_start_time',
        'partner_presale_end_time',
        'group_presale_start_time',
        'group_presale_end_time',
        'start_date',
        'time_zone',
        'status',
        'segment_id',
        'segment_name',
        'genre_id',
        'genre_name',
        'subgenre_id',
        'subgenre_name',
        'currency',
        'min_price',
        'max_price',
        'venue_id',
        'venue',
        'venue_locale',
        'venue_time_zone',
        'venue_country',
        'venue_city',
        'venue_postal_code',
    ];
}
