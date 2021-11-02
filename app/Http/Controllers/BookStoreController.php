<?php

namespace App\Http\Controllers;

use App\Models\BookStore;
use Illuminate\Http\Request;

class BookStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookStore::where('status','is_publish')->get();
        return response()->json($books);
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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cost' => 'required',
        ]);

        $book = new BookStore();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->cost = $request->cost;
        $book->save();
        return response()->json(['success' => 'Book Save Successfully In BookStore' ,'book'=> $book],200);
    }



     /**
     * Store a newly Gallery resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateGallery(BookStore $book)
    {
        //
        // $request->validate([
        //     'title' => 'required',
        //     'author' => 'required',
        //     'cost' => 'required',
        // ]);

        // $book = new BookStore();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->cost = $request->cost;
        // $book->save();
        // return response()->json(['success' => 'Book Save Successfully In BookStore' ,'book'=> $book],200);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function show(BookStore $book)
    {

        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function edit(BookStore $book)
    {
        return response()->json($book);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookStore $book)
    {
        //
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cost' => 'required',
        ]);
        $book = BookStore::where('id',$book->id)->first();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->cost = $request->cost;
        $book->update();
        return response()->json(['success' => 'Book Updated Successfully In BookStore']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookStore $book)
    {
        $book->delete();
        return response()->json(['success' => 'Book Deleted Successfully From Book Store']);
    }
}
