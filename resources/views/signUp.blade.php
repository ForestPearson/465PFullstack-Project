@extends('includes.header')

@section('body')

<main>
  <form class="bg-dark text-light mx-auto mt-4 p-4 rounded border" 
  action="{{ route('register') }}" 
  method="POST" 
  enctype="mulipart/form-data" 
  style="max-width: 30%; min-width: 20em;">
  {{ csrf_field() }} 
    <h1 class="text-uppercase mb-3">Sign Up</h1>
    <div class="mb-3 row">
      <label for="name1" class="form-label col-sm-6">First name:</label>
      <input type="name" name="fName" class="form-control col" id="name1">
    </div>
    <div class="mb-3 row">
      <label for="name2" class="form-label col-sm-6">Last name:</label>
      <input type="name" name="lName" class="form-control col" id="name2">
    </div>
    <div class="mb-3 row">
      <label for="email1" class="form-label col-sm-6">Email:</label>
      <input type="email" name="email" class="form-control col" id="email1">
    </div>
    <div class="mb-3 row">
      <label for="password1" class="form-label col-sm-6">Password:</label>
      <input type="password" name="password" class="form-control col" id="password1">
    </div>
    <div class="row">
      <button type="submit" class="btn btn-primary col mx-1">Submit</button>
      <button type="reset" class="btn btn-secondary col mx-1">Reset</button>
    </div>
  </form>
</main>


@endsection