@extends('master')

@section('content')

<div class="card">
    <div class="card-header">Edit Books</div>
    <div class="card-body">
        <form method="post" action="{{ route('Books.update', ['Book' => $book->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Books Name</label>
                <div class="col-sm-10">
                    <input type="text" name="Books_name" class="form-control" value="{{ $book->Books_name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Books Desc</label>
                <div class="col-sm-10">
                    <input type="text" name="Books_Desc" class="form-control" value="{{ $book->Books_Desc }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Books Marker</label>
                <div class="col-sm-10">
                    <select name="Books_Marker" class="form-control">
                        <option value="ebook">ebook</option>
                        <option value="Sách giấy">Sách giấy</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $book->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementsByName('Books_Marker')[0].value = "{{ $book->Books_Marker }}";
</script>

@endsection
