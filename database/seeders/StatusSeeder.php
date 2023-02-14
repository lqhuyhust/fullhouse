<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();
        $unavailable = new Status();
        $unavailable->status_id = 0;
        $unavailable->name = 'Unavailable';
        $unavailable->save();

        $available = new Status();
        $available->status_id = 1;
        $available->name = 'Available';
        $available->save();

        $deposited = new Status();
        $deposited->status_id = 2;
        $deposited->name = 'Deposited';
        $deposited->save();
    }
}
