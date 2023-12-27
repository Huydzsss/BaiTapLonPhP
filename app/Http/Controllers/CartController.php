<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($bookId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $book = Books::find($bookId);
    
            if (!$book || !$book->id) {
                return redirect()->route('cart')->with('error', 'Sách không tồn tại hoặc không có ID.');
            }
    
            
            $existingCartItem = $user->cart()->where('books_id', $book->id)->first();
    
            if ($existingCartItem) {
              
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + 1,
                ]);
            } else {
              
                $user->cart()->create([
                    'books_id' => $book->id,
                    'quantity' => 1,
                ]);
            }
    
            return redirect()->route('cart')->with('success', 'Sách đã được thêm vào giỏ hàng.');
        } else {
            return redirect()->route('auth.login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
    

    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::with('book')->where('user_id', $user->id)->get();
        return view('cart', compact('cartItems'));
    }
    public function remove($cartItem)
{
  
    $cartItem = Cart::findOrFail($cartItem);
    $cartItem->delete();
    return redirect()->route('cart')->with('success', 'Item removed from cart.');
}
public function update(Request $request, $cartItem)
{
    $cartItem = Cart::findOrFail($cartItem);

   
    $request->validate([
        'quantity' => 'required|integer|min:1', 
    ]);

    $cartItem->update([
        'quantity' => $request->input('quantity'),
    ]);

    return redirect()->route('cart')->with('success', 'Cart item updated successfully.');
}
}
