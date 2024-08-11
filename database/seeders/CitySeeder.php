<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $cities = [
                    ['city_name' => 'Visakhapatnam', 'state_id' => 1],
                    ['city_name' => 'Vijayawada', 'state_id' => 1],
                    ['city_name' => 'Guntur', 'state_id' => 1],
                    ['city_name' => 'Tirupati', 'state_id' => 1],
                    ['city_name' => 'Kakinada', 'state_id' => 1],

                    ['city_name' => 'Itanagar', 'state_id' => 2],
                    ['city_name' => 'Tawang', 'state_id' => 2],
                    ['city_name' => 'Bomdila', 'state_id' => 2],
                    ['city_name' => 'Naharlagun', 'state_id' => 2],

                    ['city_name' => 'Guwahati', 'state_id' => 3],
                    ['city_name' => 'Dibrugarh', 'state_id' => 3],
                    ['city_name' => 'Silchar', 'state_id' => 3],
                    ['city_name' => 'Jorhat', 'state_id' => 3],
                    ['city_name' => 'Nagaon', 'state_id' => 3],

                    ['city_name' => 'Patna', 'state_id' => 4],
                    ['city_name' => 'Gaya', 'state_id' => 4],
                    ['city_name' => 'Bhagalpur', 'state_id' => 4],
                    ['city_name' => 'Muzaffarpur', 'state_id' => 4],
                    ['city_name' => 'Purnia', 'state_id' => 4],

                    ['city_name' => 'Chandigarh', 'state_id' => 5],

                    ['city_name' => 'Raipur', 'state_id' => 6],
                    ['city_name' => 'Bilaspur', 'state_id' => 6],
                    ['city_name' => 'Korba', 'state_id' => 6],
                    ['city_name' => 'Durg', 'state_id' => 6],
                    ['city_name' => 'Jagdalpur', 'state_id' => 6],

                    ['city_name' => 'Silvassa', 'state_id' => 7],
                    ['city_name' => 'Daman', 'state_id' => 7],
                    ['city_name' => 'Diu', 'state_id' => 7],

                    ['city_name' => 'Delhi', 'state_id' => 8], // Delhi

                    ['city_name' => 'Panaji', 'state_id' => 9], // Goa
                    ['city_name' => 'Margao', 'state_id' => 9],
                    ['city_name' => 'Vasco da Gama', 'state_id' => 9],
                    ['city_name' => 'Mapusa', 'state_id' => 9],

                    ['city_name' => 'Ahmedabad', 'state_id' => 10],
                    ['city_name' => 'Surat', 'state_id' => 10],
                    ['city_name' => 'Vadodara', 'state_id' => 10],
                    ['city_name' => 'Rajkot', 'state_id' => 10],
                    ['city_name' => 'Gandhinagar', 'state_id' => 10],

                    ['city_name' => 'Chandigarh', 'state_id' => 11], // Haryana
                    ['city_name' => 'Gurugram', 'state_id' => 11],
                    ['city_name' => 'Faridabad', 'state_id' => 11],
                    ['city_name' => 'Karnal', 'state_id' => 11],
                    ['city_name' => 'Ambala', 'state_id' => 11],

                    ['city_name' => 'Shimla', 'state_id' => 12], // Himachal Pradesh
                    ['city_name' => 'Manali', 'state_id' => 12],
                    ['city_name' => 'Dharamshala', 'state_id' => 12],
                    ['city_name' => 'Solan', 'state_id' => 12],
                    ['city_name' => 'Kullu', 'state_id' => 12],

                    ['city_name' => 'Srinagar', 'state_id' => 13], // Jammu and Kashmir
                    ['city_name' => 'Jammu', 'state_id' => 13],
                    ['city_name' => 'Leh', 'state_id' => 13],
                    ['city_name' => 'Kargil', 'state_id' => 13],

                    ['city_name' => 'Ranchi', 'state_id' => 14], // Jharkhand
                    ['city_name' => 'Jamshedpur', 'state_id' => 14],
                    ['city_name' => 'Dhanbad', 'state_id' => 14],
                    ['city_name' => 'Bokaro', 'state_id' => 14],
                    ['city_name' => 'Deoghar', 'state_id' => 14],

                    ['city_name' => 'Bengaluru', 'state_id' => 15], // Karnataka
                    ['city_name' => 'Mysuru', 'state_id' => 15],
                    ['city_name' => 'Hubli', 'state_id' => 15],
                    ['city_name' => 'Davanagere', 'state_id' => 15],
                    ['city_name' => 'Belagavi', 'state_id' => 15],

                    ['city_name' => 'Thiruvananthapuram', 'state_id' => 16], // Kerala
                    ['city_name' => 'Kochi', 'state_id' => 16],
                    ['city_name' => 'Kozhikode', 'state_id' => 16],
                    ['city_name' => 'Kannur', 'state_id' => 16],
                    ['city_name' => 'Alappuzha', 'state_id' => 16],

                    ['city_name' => 'Leh', 'state_id' => 17], // Ladakh
                    ['city_name' => 'Kargil', 'state_id' => 17],

                    ['city_name' => 'Kavaratti', 'state_id' => 18], // Lakshadweep

                    ['city_name' => 'Bhopal', 'state_id' => 19], // Madhya Pradesh
                    ['city_name' => 'Indore', 'state_id' => 19],
                    ['city_name' => 'Gwalior', 'state_id' => 19],
                    ['city_name' => 'Jabalpur', 'state_id' => 19],
                    ['city_name' => 'Ujjain', 'state_id' => 19],

                    ['city_name' => 'Mumbai', 'state_id' => 20], // Maharashtra
                    ['city_name' => 'Pune', 'state_id' => 20],
                    ['city_name' => 'Nagpur', 'state_id' => 20],
                    ['city_name' => 'Nashik', 'state_id' => 20],
                    ['city_name' => 'Aurangabad', 'state_id' => 20],

                    ['city_name' => 'Imphal', 'state_id' => 21], // Manipur
                    ['city_name' => 'Thoubal', 'state_id' => 21],
                    ['city_name' => 'Churachandpur', 'state_id' => 21],
                    ['city_name' => 'Ukhrul', 'state_id' => 21],

                    ['city_name' => 'Shillong', 'state_id' => 22], // Meghalaya
                    ['city_name' => 'Tura', 'state_id' => 22],
                    ['city_name' => 'Jowai', 'state_id' => 22],

                    ['city_name' => 'Aizawl', 'state_id' => 23], // Mizoram

                    ['city_name' => 'Kohima', 'state_id' => 24], // Nagaland
                    ['city_name' => 'Dimapur', 'state_id' => 24],

                    ['city_name' => 'Bhubaneswar', 'state_id' => 25], // Odisha
                    ['city_name' => 'Cuttack', 'state_id' => 25],
                    ['city_name' => 'Rourkela', 'state_id' => 25],
                    ['city_name' => 'Berhampur', 'state_id' => 25],

                    ['city_name' => 'Puducherry', 'state_id' => 26], // Puducherry

                    ['city_name' => 'Amritsar', 'state_id' => 27], // Punjab
                    ['city_name' => 'Jalandhar', 'state_id' => 27],
                    ['city_name' => 'Ludhiana', 'state_id' => 27],
                    ['city_name' => 'Patiala', 'state_id' => 27],

                    ['city_name' => 'Jaipur', 'state_id' => 28], // Rajasthan
                    ['city_name' => 'Udaipur', 'state_id' => 28],
                    ['city_name' => 'Jodhpur', 'state_id' => 28],
                    ['city_name' => 'Kota', 'state_id' => 28],
                    ['city_name' => 'Bikaner', 'state_id' => 28],

                    ['city_name' => 'Gangtok', 'state_id' => 29], // Sikkim

                    ['city_name' => 'Chennai', 'state_id' => 30], // Tamil Nadu
                    ['city_name' => 'Coimbatore', 'state_id' => 30],
                    ['city_name' => 'Madurai', 'state_id' => 30],
                    ['city_name' => 'Tiruchirappalli', 'state_id' => 30],
                    ['city_name' => 'Salem', 'state_id' => 30],

                    ['city_name' => 'Hyderabad', 'state_id' => 31], // Telangana
                    ['city_name' => 'Warangal', 'state_id' => 31],
                    ['city_name' => 'Khammam', 'state_id' => 31],
                    ['city_name' => 'Nizamabad', 'state_id' => 31],

                    ['city_name' => 'Agartala', 'state_id' => 32], // Tripura

                    ['city_name' => 'Lucknow', 'state_id' => 33], // Uttar Pradesh
                    ['city_name' => 'Kanpur', 'state_id' => 33],
                    ['city_name' => 'Agra', 'state_id' => 33],
                    ['city_name' => 'Varanasi', 'state_id' => 33],
                    ['city_name' => 'Meerut', 'state_id' => 33],

                    ['city_name' => 'Dehradun', 'state_id' => 34], // Uttarakhand
                    ['city_name' => 'Haridwar', 'state_id' => 34],
                    ['city_name' => 'Rishikesh', 'state_id' => 34],
                    ['city_name' => 'Nainital', 'state_id' => 34],

                    ['city_name' => 'Kolkata', 'state_id' => 35],
                    ['city_name' => 'Siliguri', 'state_id' => 35],
                    ['city_name' => 'Darjeeling', 'state_id' => 35],
                    ['city_name' => 'Howrah', 'state_id' => 35],
                    ['city_name' => 'Asansol', 'state_id' => 35],
                ];


                  foreach ($cities as $city) {
                          City::updateOrCreate(
                                ['city_name' => $city['city_name']],
                                ['state_id' => $city['state_id']]
                            );
                        }
    }
}
