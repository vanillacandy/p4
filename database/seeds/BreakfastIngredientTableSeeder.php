<?php

use Illuminate\Database\Seeder;
use App\Breakfast;
use App\Ingredient;

class BreakfastIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $breakfasts =[
            'Stuffed Ham & Egg Bread' => ['Tomatoes', 'Eggs', 'Ham', 'Cheese', 'Bread'],
            'Rise and Shine Parfait' => ['Vanilla yogurt', 'Peaches', 'Blackberries', 'Crunch cereal'],
            'Peanut Butter Oatmeal' => ['Oats', 'Peanut butter', 'Honey', 'Cinnamon'],
            'Sweet Potato & Andouille Hash' => ['Sausage', 'Sweet potatoes ', 'Celery', 'Onion'],
            'Ham and Swiss Omelet' => ['Ham', 'Eggs', 'Cheese'],
            'Sausage and Crescent Roll Casserole' => ['Sausage', 'Eggs', 'Milk', 'Cheese'],
            'Hot Coffee'=>['Coffee'],
            'Mocha'=>['Coffee'],
            'Latte'=>['Coffee','Milk']

        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($breakfasts as $name => $ingredients) {

            # First get the book
            $breakfast = Breakfast::where('name', 'like', $name)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($ingredients as $ingredientName) {
                $ingredient = Ingredient::where('name', 'LIKE', $ingredientName)->first();

                # Connect this ingredient to this breakfast
                $breakfast->ingredients()->save($ingredient);
            }
        }
    }
}
