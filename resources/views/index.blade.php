@extends('master')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
<img src="" alt="" m>
<header>
    
@if(Auth::check() && session('name'))
    <a>Welcome, {{ session('name') }}!<img 
    src="https://facebookninja.vn/wp-content/uploads/2023/06/anh-dai-dien-mac-dinh-zalo.jpg"
     alt="" height="50px" width="50px" ></a>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
@else
    <a href="{{ route('login.perform') }}" class="btn btn-primary btn">Login</a>
@endif

</header>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Books Data</b></div>
            <div class="col col-md-6">
                <a href="{{ route('Books.create') }}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>author</th>
                <th>Marker</th>
            </tr>
            @if(count($data) > 0)
                @foreach($data as $row)
                    <tr>
                        <td><img src="{{ asset('images/' . $row->Books_image) }}" alt="" width="75"></td>
                        <td>{{ $row->Books_name }}</td>
                        <td>{{ $row->Books_Desc }}</td>
                        <td>{{ $row->Books_Marker }}</td>

                        <td>
                            <form method="post" action="{{ route('Books.destroy', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('Books.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                <!-- <a href="{{ route('Books.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a> -->
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>
        <a href="{{ route('cart') }}" class="btn btn-primary ">View to cart</a>
    </div>
</div>

@endsection
