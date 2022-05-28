@extends('includes.header')
@section('body')

<div class="container row mx-auto mt-3">
    {{-- Display decks that the user has --}}
    <div id="deckList" class="text-light container col-8">
        {{-- Message if user has no decks --}}
        @if(!count($userDecks))
            <div class="alert alert-danger">
                <strong>Error!</strong> No decks found.
            </div>

        {{-- Display all of the decks that a user has available to them --}}
        @else
            @foreach($userDecks as $deck)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$deck->name}}</h5>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{-- Create a new deck --}}
    <div id="createDeck" class="text-light col-3 offset-1 container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeckModal">
            Create New Deck
        </button>
    </div>


    
</div>

{{-- Create deck modal --}}
<div class="modal fade" id="addDeckModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addCardModalLabel">Create New Deck</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="addCardModalResult">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="newDeckName" class="col-form-label">Deck Name</label>
                </div>
                <div class="col-auto">
                    <input type="name" id="newDeckName" class="form-control" aria-describedby="newDeckNameField">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


@endsection