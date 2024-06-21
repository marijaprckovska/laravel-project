<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->float('longitude');
            $table->float('latitude');
            $table->string('weather_main');
            $table->string('weather_description');
            $table->float('temperature');
            $table->float('feels_like');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('visibility')->nullable();
            $table->float('wind_speed')->nullable();
            $table->integer('wind_deg')->nullable();
            $table->integer('cloudiness')->nullable();
            $table->timestamp('sunrise')->nullable();
            $table->timestamp('sunset')->nullable();
            $table->string('city_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
}
