<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><b>Books Details</b></div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('Books.index') }}" class="btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><b>Books image</b></label>
                        <div class="col-sm-10">
                        <img src="{{ asset('images/' . $books->Books_image) }}" alt="" width="200">
                    </div>
                </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"><b>Books Name</b></label>
                    <div class="col-sm-10">
                        {{ $books->Books_name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"><b>Books Desc</b></label>
                    <div class="col-sm-10">
                        {{ $books->Books_Desc }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label"><b>Books Marker</b></label>
                    <div class="col-sm-10">
                        {{ $books->Books_Marker }}
                    </div>
                </div>
                <div class="row mb-4">
                    <form action="{{ route('cart.add', ['book' => $books->id]) }}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
