<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class FoodController extends Controller
{
    /*
     * GET /books
     */
    public function index()
    {
        return view('food.index');
    }

    /**
     * GET
     * /books/search-process
     * Process the form to search for a book
     */
    public function search(Request $request)
    {
        #we want to update the search method so it will extract variables from the session
        return view('food.search')->with([
            'name' => $request->session()->get('name', ''),
            'meal' => $request->session()->get('meal'),
            'drink' => $request->session()->get('drink'),
            'drinkCalorie' => $request->session()->get('drinkCalorie'),
            'mealCalorie' => $request->session()->get('mealCalorie'),
            'totalCalorie' => $request->session()->get('totalCalorie'),
        ]);
    }

    /**
     * GET
     * /books/search-process
     * Process the form to search for a book
     */
    public function searchProcess(Request $request) {

        # Validate request data
        $request->validate([
            'name' => 'required',
            'meal' => 'required',
            'drink' => 'required',
        ]);



        $name = $request->input('name');
        $meal = $request->input('meal');
        $drink = $request->input('drink');

        $drinksRawData = file_get_contents(database_path('/drink.json'));
        $drinks = json_decode($drinksRawData, true);

        $mealsRawData = file_get_contents(database_path('/meal.json'));
        $meals = json_decode($mealsRawData, true);


        $drinkCalorie = 0;
        foreach ($drinks as $drink_name => $calorie)
        {
            if ($drink == $drink_name)
            {
                $drinkCalorie = $calorie;
                break;
            }
        }

        $drinkCalorie = $drinkCalorie["calorie"];

        $mealCalorie = 0;
        foreach ($meals as $meal_name => $calorie)
        {
            if ($meal == $meal_name)
            {
                $mealCalorie = $calorie;
                break;
            }
        }

        $mealCalorie = $mealCalorie["calorie"];

        $totalCalorie = $mealCalorie + $drinkCalorie;

        # Redirect back to the search page w/ the variables stored in the session
        return redirect('food/search')->with([
            'name' => $name,
            'meal' => $meal,
            'drink' => $drink,
            'drinkCalorie' => $drinkCalorie,
            'mealCalorie' => $mealCalorie,
            'totalCalorie'=> $totalCalorie,
        ]);
    }

}