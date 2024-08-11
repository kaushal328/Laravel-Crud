<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
                    'Andhra Pradesh',
                    'Arunachal Pradesh',
                    'Assam',
                    'Bihar',
                    'Chandigarh',
                    'Chhattisgarh',
                    'Dadra and Nagar Haveli and Daman and Diu',
                    'Delhi',
                    'Goa',
                    'Gujarat',
                    'Haryana',
                    'Himachal Pradesh',
                    'Jammu and Kashmir',
                    'Jharkhand',
                    'Karnataka',
                    'Kerala',
                    'Ladakh',
                    'Lakshadweep',
                    'Madhya Pradesh',
                    'Maharashtra',
                    'Manipur',
                    'Meghalaya',
                    'Mizoram',
                    'Nagaland',
                    'Odisha',
                    'Puducherry',
                    'Punjab',
                    'Rajasthan',
                    'Sikkim',
                    'Tamil Nadu',
                    'Telangana',
                    'Tripura',
                    'Uttar Pradesh',
                    'Uttarakhand',
                    'West Bengal',
                ];

                foreach ($states as  $data) {
                    State::updateOrCreate(['state_name'=>$data]);
                }
    }
}
