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

    <div class="row col-3 pt-4">
        <button  onclick="window.location='{{ route("signup") }}'" class="btn btn-primary col mx-1">Sign Up</button>
    </div>
    <div class="row col-3 pt-4">
        <button onclick="window.location='{{ route("admin") }}'" class="btn btn-primary col mx-1">Temp Admin Button</button>
    </div>



    <div class="row col-3 pt-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter"> Sign in </button>

        <!-- Modal -->
        <form action="{{ route('login') }}" method="POST" enctype="mulipart/form-data">
        {{ csrf_field() }}
            <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-dark">
                        <div class="modal-header text-dark">
                            <h5 class="modal-title" id="ModalLongTitle">Sign-in</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="email" class="form-label col-sm-6">Email:</label>
                                <input type="email" name="email" class="form-control col" id="email">
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="form-label col-sm-6">Password:</label>
                                <input type="password" name="password" class="form-control col" id="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Sign-in</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection