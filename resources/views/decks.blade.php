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
            Create Deck
            <i class="fa-solid fa-plus"></i>        
        </button>
    </div>


    
</div>

{{-- Create deck modal --}}
<div class="modal fade text-center" id="addDeckModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCardModalLabel">Create New Deck</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="addCardModalResult">
                <select class="form-select w-50" onchange="updateImagePreview()" aria-label="Default select example">
                    <option selected disabled="disabled">Pick Image</option>
                    <option value="Black">Black</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Green">Green</option>
                </select>

                {{-- Image preview --}}
                <div id="imagePreview" class="my-3">
                    <img class="preview" src="{{asset('image/deckBack.jpg')}}" alt="preview art">
                </div>

                <div class="row g-3 align-items-center mt-3">
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
    <div id="hiddenInputs">
        <input type="hidden" id="deckPreview" name="deckPreview" value="">
    </div>
</div>


    <script>
        function updateImagePreview() {
            let value = $('.form-select').val();
            console.log(value);
            images = {
                "Pick Image": "{{asset('image/deckBack.jpg')}}",
                "Black": "{{asset('image/BlackDeck.png')}}",
                "Red": "{{asset('image/RedDeck.png')}}",
                "Blue": "{{asset('image/BlueDeck.png')}}",
                "White": "{{asset('image/WhiteDeck.png')}}",
                "Green": "{{asset('image/GreenDeck.png')}}"
            }
            $("#imagePreview" ).html( "<img class='preview' src='" + images[value] + "' alt='Card image cap'>" );
            $("#deckPreview").val(images[value]);
        }
    </script>
@endsection