<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Gender;
use App\Models\Reserve;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book-list', ['genders' => Gender::all()]);
    }

    public function getBookList(Request $request)
    {
        $books = Book::with('gender'); //Creamos una instancia del modelo BOOK
        if ($request->has('genderId') && !empty($request['genderId'])) { //Validamos si existe el valor del genero o que no este vacio
            $books->where('gender_id', $request['genderId']); //Hacemos la condicion usando el id del genero
        }
        $books->where('reserved', false); //La condicion de mostrar los libros no reservados
        return response($books->get()); //Retornamos los libros
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    public function reserve(Request $request, Book $book)
    {
        //Validamos el campo days
        $request->validate(array('days' => 'required|numeric|min:0|not_in:0'));

        //Validamos si el libro ya se encuentra reservado
        if ($book->reserved) {
            return response(array('message' => "The given data was invalid", 'errors' => array('days' => ["The book is already reserved"])), 401);
        }

        //Cambiamos el estado reserved a true
        $book->reserved = true; //Indicamos que el libro lo acabamos de reservar
        $book->save(); //Guardamos el cambio en la base de datos

        //Creamos el registro de reserves
        $reserve = $request->all(); //Obtenemos los datos de los inputs
        $reserve['user_id'] = auth()->user()->id; //Almacenamos el usuario que reservo
        $reserve['book_id'] = $book->id; //Almacenamos el libro seleccionado
        $reserve['reservation_date'] = Carbon::now()->format('Y-m-d'); //Generamos la fecha de reservacion
        $reserve['reservation_date_final'] = Carbon::createFromFormat('Y-m-d', $reserve['reservation_date'])->addDays($reserve['days']);
        Reserve::create($reserve); //Guardamos en la tabla reserves

        return response(array('message' => 'Booked successfully!')); //Retornamos un mensaje indicando que el proceso se ejecuto correctamente
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
