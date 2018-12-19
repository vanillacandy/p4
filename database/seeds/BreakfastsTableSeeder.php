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
            ['Ham and Swiss Omelet',1,123],
            ['Sausage and Crescent Roll Casserole',2,223],
            ['Sweet Potato & Andouille Hash',3,323],
            ['Peanut Butter Oatmeal',4,423],
            ['Rise and Shine Parfait',5,234],
            ['Stuffed Ham & Egg Bread',4,434],
            ['Hot Coffee',3,10],
            ['Mocha',4,100],
            ['Latte',5,150]
        ];

        $count = count($breakfasts);

        foreach ($breakfasts as $key => $breakfastData) {
            $breakfast = new Breakfast();

            $breakfast->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $breakfast->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $breakfast->name = $breakfastData[0];
            $breakfast->rating = $breakfastData[1];
            $breakfast->calories = $breakfastData[2];

            $breakfast->save();
            $count--;
        }
    }
}
