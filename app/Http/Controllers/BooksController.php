<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $data = Books::all();

        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    $request->validate([
        'Books_name'   => 'required',
        'Books_image'  => 'image|mimes:jpg,png,jpeg,gif,svg|max:18021|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        'quantity'     => 'required|integer|min:0',
    ]);

    $file_name = time() . '.' . request()->Books_image->getClientOriginalExtension();

    request()->Books_image->move(public_path('images'), $file_name);

    $book = new Books;
    $book->Books_name = $request->Books_name;
    $book->Books_Desc = $request->Books_Desc;
    $book->Books_Marker = $request->Books_Marker;
    $book->Books_image = $file_name;
    $book->quantity = $request->quantity;
    $book->save();

    return redirect()->route('Books.index')->with('success', 'Book added successfully.');
}

    public function show($id)
    {
        $books = Books::find($id);

        if (!$books) {
            return redirect()->route('Books.index')->with('error', 'Book not found.');
        }

        return view('show', compact('books'));
    }

    public function edit($id)
    {
        $book = Books::find($id);

        if (!$book) {
            return redirect()->route('Books.index')->with('error', 'Book not found.');
        }

        return view('edit', compact('book'));
    }

    public function update(Request $request, Books $book)
    {
        $validatedData = $request->validate([
            'Books_name'   => 'required|string|max:255',
            'Books_Desc'   => 'required|string',
            'Books_Marker' => 'required|in:ebook,Sách giấy',
            'quantity'     => 'required|integer|min:0',
        ]);

        $book->update($validatedData);

        return redirect()->route('Books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $book = Books::findOrFail($id);
            $book->delete();
            
            return redirect()->route('Books.index')->with('success', 'Book deleted successfully.');
        }
        catch (\Exception $e) {
            return redirect()->route('Books.index')->with('error', 'Error deleting the book.');
        }
    }
   
}
 