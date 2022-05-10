@extends('includes.header')

@section('body')


<div class="container pt-4 bootstrap-grid text-light mb-5">
    <div class="row row1">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <h1>ADMIN</h1>
        </div>
    </div>

    <div class="row col-3">
        <button onclick="window.location='{{ route("sync") }}'" class="btn btn-primary col mx-1">Sync Database</button>
    </div>
</div>


@endsection