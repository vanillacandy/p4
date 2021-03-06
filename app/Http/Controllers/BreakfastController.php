<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breakfast;
use App\Ingredient;

class BreakfastController extends Controller
{
    /*
     * GET /books
     */
    public function index()
    {
        $breakfasts = Breakfast::orderBy('name')->get();
        # Approach 1 - Query the database
        # $newBooks = Book::latest()->limit(3)->get();
        # Approach 2 - Query the collection (more efficient)
        #$newBooks = $books->sortByDesc('created_at')->take(3);
        return view('food.breakfast')->with([
            'breakfasts' => $breakfasts,
        ]);
    }

    /*
     * GET /books/{id}
     */
    public function show(Request $request, $id)
    {
        $breakfast = Breakfast::find($id);

        return view('food.show')->with([
            'breakfast' => $breakfast,

        ]);
    }

    /**
     * GET /books/create
     * Display the form to add a new book
     */
    public function create(Request $request)
    {

        $ingredients = Ingredient::getForCheckboxes();

        return view('food.create')->with([
            'ingredients' => $ingredients,
        ]);
    }
    /**
     * POST /books
     * Process the form for adding a new book
     */
    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'title' => 'required',
            'rating' => 'required|integer|between:1,5',
            'calories' => 'required|integer|between:1,3000'

        ]);

        $breakfast = new Breakfast();
        $breakfast->name = $request->input('title');
        $breakfast->rating = $request->input('rating');
        $breakfast->calories = $request->input('calories');


        $breakfast->save();

        $breakfast->ingredients()->sync($request->ingredients);

        return redirect('/food/create')->with([
            'alert' => 'Your food was added.'
        ]);
    }
    /*
    * GET /books/{id}/edit
    */
    public function edit($id)
    {
        $breakfast = Breakfast::find($id);


        $ingredients = Ingredient::getForCheckboxes();

        $ingredientsForThisRecipe = $breakfast->ingredients()->pluck('ingredients.id')->toArray();

        return view('food.edit')->with([
            'breakfast' => $breakfast,
            'ingredients' => $ingredients,
            'ingredientsForThisRecipe'=>$ingredientsForThisRecipe
        ]);
    }

    /*
    * PUT /books/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'rating' => 'required|integer|between:1,5',
            'calories' => 'required|integer|between:1,3000'
        ]);

        $breakfast = Breakfast::find($id);
        $breakfast->name = $request->input('title');
        $breakfast->ingredients()->sync($request->ingredients);

        $breakfast->save();


        return redirect('/food/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    /*
    * Asks user to confirm they actually want to delete the book
    * GET /books/{id}/delete
    */
    public function delete($id)
    {
        $breakfast = Breakfast::find($id);

        return view('food.delete')->with([
            'breakfast' => $breakfast,
        ]);
    }

    /*
    * Actually deletes the food
    * DELETE /food/{id}/delete
    */
    public function destroy($id)
    {
        $breakfast = Breakfast::find($id);

        $breakfast->ingredients()->detach();

        $breakfast->delete();

        return redirect('/')->with([
            'alert' => '“' . $breakfast->name . '” was removed.'
        ]);
    }

}


