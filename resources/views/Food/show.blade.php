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
    /*
     * GET /books/{title}
     */
    public function show($title)
    {
        return view('food.show')->with(['title' => $title]);
    }
    /**
     * GET
     * /books/search-process
     * Process the form to search for a book
     */
    public function search(Request $request)
    {
        return view('food.search')->with([
            'name' => $request->session()->get('name', ''),
            'meal' => $request->session()->get('meal'),
            'drink' => $request->session()->get('drink'),
            'drinkCalorie' => $request->session()->get('drinkCalorie'),
            'caseSensitive' => $request->session()->get('caseSensitive', false),
            'searchResults' => $request->session()->get('searchResults', []),
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

        $drinkCalorie = 0;
        foreach ($drinks as $name => $calorie)
        {
            if ($drink == $name)
            {
                $drinkCalorie = $calorie;
                break;
            }
        }

        $drinkCalorie = $drinkCalorie["calorie"];

        if ($name) {
            # Open the books.json data file
            # database_path() is a Laravel helper to get the path to the database folder
            # See https://laravel.com/docs/helpers for other path related helpers
            $booksRawData = file_get_contents(database_path('/meal.json'));

            # Decode the book JSON data into an array
            # Nothing fancy here; just a built in PHP method
            $books = json_decode($booksRawData, true);

            # Loop through all the book data, looking for matches
            # This code was taken from v0 of foobooks we built earlier in the semester
            foreach ($books as $title => $book) {
                # Case sensitive boolean check for a match
                if ($request->has('caseSensitive')) {
                    $match = $title == $name;
                    # Case insensitive boolean check for a match
                } else {
                    $match = strtolower($title) == strtolower($name);
                }

                # If it was a match, add it to our results
                if ($match) {
                    $searchResults[$title] = $book;
                }
            }
        }


        return redirect('/food/search')->with([
            'name' => $name,
            'meal' => $meal,
            'drink' => $drink,
            'drinkCalorie' => $drinkCalorie,
            'caseSensitive' => $request->has('caseSensitive'),
        ]);
    }

}