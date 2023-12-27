@extends('master')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">Add Books</div>
    <div class="card-body">
        <form method="post" action="{{ route('Books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Books Name</label>
                <div class="col-sm-10">
                    <input type="text" name="Books_name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Author</label>
                <div class="col-sm-10">
                    <input type="text" name="Books_Desc" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Books Marker</label>
                <div class="col-sm-10">
                    <select name="Books_Marker" class="form-control">
                        <option value="Ebook">Ebook</option>
                        <option value="Sách giấy">Sách giấy</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Books Image</label>
                <div class="col-sm-10">
                    <input type="file" name="Books_image" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection
