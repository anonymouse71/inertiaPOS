<?php

use App\Models\Person;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'testing' || env('APP_ENV') == 'local') {
            $person = factory(Person::class)->create([
                'name'    => 'Example Customer 1',
                'phone'   => '1234567890',
                'email'   => 'examplecustomer1@mail.com',
                'address' => '1 Example Street, Surabaya, Indonesia',
            ]);
            $person->customer()->create([
                'company_name' => 'Example Company 1',
                'courier'      => 'Example Courier 1',
            ]);
        }
    }
}
