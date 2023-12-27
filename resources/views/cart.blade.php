

@extends('master')

@section('content')
    <div class="container">
        <h1>Cart books</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>
                                @if ($item->book && $item->book->quantity > 0)
                                    {{ $item->book->Books_name }}
                                @else
                                    Book Not Available
                                @endif
                            </td>
                            <td>
                            @if ($item->book && $item->book->quantity > 0)
                                    {{ $item->book->Books_Desc }}
                                @else
                                   Not find author
                                @endif
                            </td>
                            <td>
                                @if ($item->book && $item->book->quantity > 0)
                                    <img src="{{ asset('images/' . $item->book->Books_image) }}" alt="Books Image" width="50">
                                @else
                                   
                                @endif
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <div class="container">
                                    <div class="row">

                                        <form action="{{ route('cart.remove', ['cartItem' => $item->id]) }}" method="post" class="col">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                         <form action="{{ route('cart.update', ['cartItem' => $item->id]) }}" method="post" class="col">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control col-4">
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('Books.index') }}" class="btn btn-primary">Contine Read book</a>
        @endif
    </div>
@endsection
