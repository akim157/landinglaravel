<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('services')->insert([
            [
                'name'  =>  'Android',
                'icon'  =>  'fa-android',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
            ],
            [
                'name'  =>  'Apple IOS',
                'icon'  =>  'fa-apple',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
            ],
            [
                'name'  =>  'Design',
                'icon'  =>  'fa-dropbox',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
            ],
            [
                'name'  =>  'Concept',
                'icon'  =>  'fa-html5',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
            ],
            [
                'name'  =>  'User Research',
                'icon'  =>  'fa-slack',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
            ],
            [
                'name'  =>  'User Experience',
                'icon'  =>  'fa-users',
                'text'  =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
            ]
        ]);
    }
}
