<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'tray',
            'password' => Hash::make('tray')
        ));
    }
 
}