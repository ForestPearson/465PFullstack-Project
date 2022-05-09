@extends('includes.header')

@section('body')

<main>
        <form class="bg-dark text-light mx-auto mt-4 p-4 rounded border" style="max-width: 30%; min-width: 20em;">
          <h1 class="text-uppercase mb-3">Sign Up</h1>
          <div class="mb-3 row">
            <label for="username1" class="form-label col-sm-6">Username:</label>
            <input type="username" class="form-control col" id="username1">
          </div>
          <div class="mb-3 row">
            <label for="email1" class="form-label col-sm-6">Email:</label>
            <input type="email" class="form-control col" id="email1">
          </div>
          <div class="mb-3 row">
            <label for="password1" class="form-label col-sm-6">Password:</label>
            <input type="password" class="form-control col" id="password1">
          </div>
          <div class="row">
            <button type="submit" class="btn btn-primary col mx-1">Submit</button>
            <button type="reset" class="btn btn-secondary col mx-1">Reset</button>
          </div>
        </form>
</main>


@endsection