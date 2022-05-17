@extends('includes.header')

@section('body')


<div class="container pt-4 bootstrap-grid text-light mb-5">
    <div class="row row1">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <h1>Hello {{ $firstName }} {{ $lastName }}</h1>
        </div>
    </div>
    <form class="bg-dark text-light mx-auto mt-4 p-4 rounded border" style="max-width: 60%; min-width: 20em;">
        <h1 class="mb-3">Edit Your Information</h1>
        <div class="mb-3 row">
            <label for="name1" class="form-label col-sm-6">First name:</label>
            <input type="name" class="form-control col" id="name1" value={{ $firstName }}>
        </div>
        <div class="mb-3 row">
            <label for="name2" class="form-label col-sm-6">Last name:</label>
            <input type="name" class="form-control col" id="name2">
        </div>
            <div class="mb-3 row">
            <label for="email1" class="form-label col-sm-6">Email:</label>
            <input type="email" class="form-control col" id="email1">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col mx-1">Submit</button>
            <button type="reset" class="btn btn-secondary col mx-1">Reset</button>
        </div>
    </form>
</div>


@endsection