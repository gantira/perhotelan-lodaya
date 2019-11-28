<?php

use Illuminate\Database\Seeder;

class BedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bed = (
        	[
        		'harga'=>0
        	]
        );

        App\Bed::create($bed);
    }
}
