<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id' => 1,
            'name' => 'IT Del Inaguration',
            'topic' => 'Campus 5.0', //Password 1234
            'category' => 'Campus Event',
            'description' => 'Acara ini merupakan acara dimana pengukuhan Mahasiswa baru IT Del 2021',
            'host' => 'Ritchan Hutapea',
            'date' => '2020-10-23',
            'event_time_start' => Carbon::now(),
            'event_time_finish' => Carbon::now()->addHour(3),
            'participants' => NULL,
            'event_link' => 'https://us04web.zoom.us/postattendee?mn=-S2q9u-w00R58Z1BT4adxXbmhhBLHFgi-ukI.3B0_mzAuknjtwNvO&id=1',
            'status' => "confirmed",
            'starting_status' => "waiting",
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('events')->insert([
            'user_id' => 1,
            'name' => 'IT Del Dies Natalies',
            'topic' => 'Campus 5.0', //Password 1234
            'category' => 'Campus Event',
            'description' => 'Acara ini merupakan acara dimana Mahasiswa akan melakukan wisuda',
            'host' => 'Ritchan Hutapea',
            'date' => '2020-10-23',
            'event_time_start' => Carbon::now(),
            'event_time_finish' => Carbon::now()->addHour(3),
            'participants' => NULL,
            'event_link' => 'https://us04web.zoom.us/postattendee?mn=-S2q9u-w00R58Z1BT4adxXbmhhBLHFgi-ukI.3B0_mzAuknjtwNvO&id=1',
            'status' => "confirmed",
            'starting_status' => "waiting",
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('events')->insert([
            'user_id' => 1,
            'name' => 'IT Del BEM Pentas Seni',
            'topic' => 'Campus 5.0', //Password 1234
            'category' => 'Campus Event',
            'description' => 'Acara ini merupakan acara dimana pengukuhan Mahasiswa baru IT Del 2021',
            'host' => 'Ritchan Hutapea',
            'date' => '2020-10-23',
            'event_time_start' => Carbon::now(),
            'event_time_finish' => Carbon::now()->addHour(3),
            'participants' => NULL,
            'event_link' => 'https://us04web.zoom.us/postattendee?mn=-S2q9u-w00R58Z1BT4adxXbmhhBLHFgi-ukI.3B0_mzAuknjtwNvO&id=1',
            'status' => "confirmed",
            'starting_status' => "waiting",
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('events')->insert([
            'user_id' => 1,
            'name' => 'IT Del Worship',
            'topic' => 'Campus 5.0', //Password 1234
            'category' => 'Campus Event',
            'description' => 'Acara ini merupakan acara dimana pengukuhan Mahasiswa baru IT Del 2021',
            'host' => 'Ritchan Hutapea',
            'date' => '2020-10-23',
            'event_time_start' => Carbon::now(),
            'event_time_finish' => Carbon::now()->addHour(3),
            'participants' => NULL,
            'event_link' => 'https://us04web.zoom.us/postattendee?mn=-S2q9u-w00R58Z1BT4adxXbmhhBLHFgi-ukI.3B0_mzAuknjtwNvO&id=1',
            'status' => "confirmed",
            'starting_status' => "waiting",
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
