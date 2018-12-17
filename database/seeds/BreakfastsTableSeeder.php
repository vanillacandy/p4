<?php

use Illuminate\Database\Seeder;
use App\Breakfast;

class BreakfastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breakfasts = [
            ['Ham and Swiss Omelet'],
            ['Sausage & Crescent Roll Casserole'],
            ['Sweet Potato & Andouille Hash'],
            ['Peanut Butter Oatmeal'],
            ['Rise and Shine Parfait'],
            ['Stuffed Ham & Egg Bread'],
        ];

        $count = count($breakfasts);

        foreach ($breakfasts as $key => $breakfastData) {
            $breakfast = new Breakfast();

            $breakfast->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $breakfast->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $breakfast->name = $breakfastData[0];

            $breakfast->save();
            $count--;
        }
    }
}
