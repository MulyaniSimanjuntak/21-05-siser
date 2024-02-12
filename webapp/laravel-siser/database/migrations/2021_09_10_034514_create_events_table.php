<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('topic')->nullable();
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->string('host')->nullable();
            $table->date('date')->nullable();
            $table->time('event_time_start')->nullable();
            $table->time('event_time_finish')->nullable();
            $table->string('participants')->nullable();
            $table->string('event_link')->nullable();
            $table->string('status')->nullable();
            $table->string('starting_status')->nullable();
            $table->string('description_reject')->nullable();
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
        Schema::dropIfExists('events');
    }
}
