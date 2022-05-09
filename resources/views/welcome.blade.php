@extends('includes.header')


@section('body')

<div class="container pt-4 bootstrap-grid text-light mb-5">
    <div class="row row1">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <h1>Welcome to MTG Deck Builder</h1>
            <p>
            MTG Deck Builder is the all in one Magic the Gathering deck building website.
            Where you can view, build, and stratigize for your next game. With our custom deck builder
            you can fully create and customize potential decks. You can also view our database of 
            cards to find just the right one to finish your deck. If you sign up, you can save your
            decks to your profile and come back to them at anytime!
            </p>
        </div>
    </div>

    <div class="row">
        <button type="submit" class="btn btn-primary col mx-1">Sign Up</button>
    </div>
</div>

@endsection