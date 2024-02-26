<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('ticketId');
            $table->string('name');
            $table->string('locale');
            $table->string('type');
            $table->string('image');
            $table->dateTime('public_sales_start_time')->nullable();
            $table->dateTime('public_sales_end_time')->nullable();
            $table->dateTime('partner_presale_start_time')->nullable();
            $table->dateTime('partner_presale_end_time')->nullable();
            $table->dateTime('group_presale_start_time')->nullable();
            $table->dateTime('group_presale_end_time')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('time_zone');
            $table->string('status');
            $table->string('segment_id')->nullable();
            $table->string('segment_name')->nullable();
            $table->string('genre_id')->nullable();
            $table->string('genre_name')->nullable();
            $table->string('subgenre_id')->nullable();
            $table->string('subgenre_name')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('min_price', 10, 2)->nullable();
            $table->decimal('max_price', 10, 2)->nullable();
            $table->string('venue_id')->nullable();
            $table->string('venue')->nullable();
            $table->string('venue_locale')->nullable();
            $table->string('venue_time_zone')->nullable();
            $table->string('venue_country')->nullable();
            $table->string('venue_city')->nullable();
            $table->string('venue_postal_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
