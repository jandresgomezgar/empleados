<?php

use Illuminate\Database\Seeder;

class UserTablerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class)->create([
    	'name' => 'Test',
        'email' => 'test@test.com',
        'email_verified_at' => now(),
        'job_title' => 'test',
        'location' => 'test',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),

    	]);

    	factory(App\User::class, 10000)->create();
    }
}
