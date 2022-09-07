<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reserve;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', ['reserves' => Reserve::with('book')->where('user_id', auth()->user()->id)->get()]);
    }

    public function destroy(Reserve $reserve)
    {
        //Consultamos el libro a modificar
        $book = Book::find($reserve->book_id);
        $book->reserved = false; //Le indicamos que ya se encuentra disponible
        $book->save(); //Guardamos el cambio

        //Luego eliminamos el registro
        $reserve->delete();
        return redirect()->back()->with('success', 'Your reservation has been deleted!');
    }
}
