@extends('includes.header')


@section('body')

<div class="container d-flex bootstrap-grid text-light mb-2 mt-4 text-center  mx-auto">
    <div class="row row1 mx-auto">
        <div class="col-lg-9 col-md-12 col-sm-12 mx-auto">
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
</div>

<div class="container d-flex mx-auto text-light">
    <marquee class="marquee" behavior="alternate" direction="left" scrollamount="2">
        <img class="backdrop" src= {{asset('image/backdrop.jpg')}} alt="moving background">
    </marquee>  
</div>

<div class="container d-flex text-light text-center w-50 mt-3">
    <p>
    IMPORTANT DISCLAIMER: The images used on this website remain copyright of their respective owners
    and are not owned by the MTG Deck Builder team. The images are used for strictly educational purposes only.
    </p>
</div>
@endsection