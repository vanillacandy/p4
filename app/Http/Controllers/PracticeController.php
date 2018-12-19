<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use IanLChapman\PigLatinTranslator\Parser;
use App\Book;
use App\Breakfast;
use App\Utilities\Practice;
class PracticeController extends Controller
{
    /**
     *
     */
    public function practice18()
    {
        $breakfasts = Breakfast::with('ingredients')->get();

        foreach ($breakfasts as $breakfast) {
            dump($breakfast->name . ' is tagged with: ');
            foreach ($breakfast->ingredients as $ingredient) {
                dump($ingredient->name . ' ');
            }
        }
    }



    public function practice17()
    {
        $breakfast = Breakfast::where('name', '=', 'The Great Gatsby')->first();

        dump($breakfast->name . ' is tagged with: ');
        foreach ($breakfast->ingredients as $ingredient) {
            dump($ingredient->name);
        }
    }

    public function practiceDeleteBreakfast()
    {
        # First get a book to delete
        $breakfast = Breakfast::where('name', '=', 'Banana bread')->first();

        if (!$breakfast) {
            dump('Did not delete- Book not found.');
        } else {
            $breakfast->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }
    }
    public function practiceUpdateBreakfast()
    {
        # First get a book to update
        $breakfast = Breakfast::where('name', '=', 'chocolate bread')->first();

        if (!$breakfast) {
            dump("Breakfast not found, can't update.");
        } else {
            # Change some properties
            $breakfast->name = 'Banana bread';

            # Save the changes
            $breakfast->save();

            dump('Update complete; check the database to confirm the update worked.');
        }
    }
    public function practiceReadBreakfast()
    {
        #using facade instead initiated model
        $breakfasts = Breakfast::where('name', 'LIKE', '%egg%')->get();


        if ($breakfasts->isEmpty()) {
            dump('No matches found');
        } else {
            foreach ($breakfasts as $breakfast) {
                dump($breakfast->name);
            }
        }
    }

    public function practiceCreateBreakfast()
    {
        # Instantiate a new Book Model object
        $breakfast = new Breakfast();

        # Set the properties
        # Note how each property corresponds to a field in the table
        $breakfast->name = 'Chocolate bread';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $breakfast->save();

        dump('Added: '.$breakfast->name);
    }



    /**
     *
     */
    public function practice16()
    {
        # First get a book to delete
        $book = Book::where('author', '=', 'J.K. Rowling')->first();
        if (!$book) {
            dump('Did not delete- Book not found.');
        } else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }

    }
    /**
     *
     */
    public function practice15()
    {
        $books = Book::all();
        dump($books);
        dump($books->toArray());
    }
    /**
     *
     */
    public function practice14()
    {
        $results = Book::orderBy('title')->first();
        dump($results);
        $results = Book::orderBy('title')->get();
        dump($results->first());
    }
    /**
     * DELETE a single row
     */
    public function practice7()
    {
        # First get a book to delete
        $book = Book::where('author', '=', 'F. Scott Fitzgerald')->first();
        if (!$book) {
            dump('Did not delete- Book not found.');
        } else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }
    }
    /**
     * UPDATE a single row
     */
    public function practice6()
    {
        # First get a book to update
        $book = Book::where('author', '=', 'J.K. Rowling')->first();
        if (!$book) {
            dump("Book not found, can't update.");
        } else {
            # Change some properties
            $book->title = 'The Really Great Gatsby!';
            $book->published_year = '2025';
            # Save the changes
            $book->save();
            dump('Update complete; check the database to confirm the update worked.');
        }
    }
    /**
     * READ all rows
     */
    public function practice5()
    {
        $book = new Book();
        $books = $book->all();
        if ($books->isEmpty()) {
            dump('No matches found');
        } else {
            foreach ($books as $book) {
                dump($book->title);
            }
        }
    }
    /**
     * CREATE a new row
     */
    public function practice4()
    {
        # Instantiate a new Book Model object
        $book = new Book();
        # Set the properties
        # Note how each property corresponds to a field in the table
        $book->title = 'Harry Potter and the Sorcerer\'s Stone';
        $book->author = 'J.K. Rowling';
        $book->published_year = 1997;
        $book->cover_url = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_url = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';
        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $book->save();
        dump('Added: ' . $book->title);
    }
    /**
     * Demonstrating using an external package
     */
    public function practice3()
    {
        $translator = new Parser();
        $translation = $translator->translate('Hello World');
        dump($translation);
    }
    /*
     * Demonstrating getting values from configs
     */
    public function practice2()
    {
        dump(config('mail.supportEmail'));
        # Disabling this line to prevent accidentally revealing mail related credentials on the prod. server
        //dump(config('mail'));
    }
    /**
     * Demonstrating the first practice example
     */
    public function practice1()
    {
        dump('This is the first example.');
    }
    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://foobooks.loc/practice => Shows a listing of all practice routes
     * http://foobooks.loc/practice/1 => Invokes practice1
     * http://foobooks.loc/practice/5 => Invokes practice5
     * http://foobooks.loc/practice/999 => 404 not found
     */
    public function index($n = null)
    {
        $methods = [];
        # If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }
            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        } # Otherwise, load the requested method
        else {
            $method = 'practice' . $n;
            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        }
    }
}