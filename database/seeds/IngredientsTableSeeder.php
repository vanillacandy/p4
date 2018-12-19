<?php

use Illuminate\Database\Seeder;
use App\Ingredient;
class IngredientsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = ['Eggs', 'Bread', 'Peanut butter', 'Cinnamon', 'Oatmeal', 'Bacon', 'Granola','Sausage','Orange juice','Ham','Cheese','Milk','Sweet potatoes ', 'Celery', 'Onion','Oats', 'Honey','Vanilla yogurt', 'Peaches', 'Blackberries', 'Crunch cereal','Tomatoes','Coffee'];

        foreach ($ingredients as $ingredientName) {
            $ingredient = new Ingredient();
            $ingredient->name = $ingredientName;
            $ingredient->save();
        }
    }
}
