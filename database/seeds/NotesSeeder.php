<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->delete();

        \App\Note::create(array(
            'user_id'=> "1",
            'title' => 'Note 1',
            'content' => 'Lorem ipsum stuff stuff stuff'));
        \App\Note::create(array(
            'user_id'=> "1",
            'title' => 'Note 2',
            'content' => 'Lorem ipsum 2 stuff 222 stuff'));
    }
}
