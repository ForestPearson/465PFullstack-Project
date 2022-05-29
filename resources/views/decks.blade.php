@extends('includes.header')
@section('body')

<div>
    {{-- Create a new deck --}}
    <div id="createDeck" class="container d-flex flex-row-reverse py-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeckModal">
            Create Deck
            <i class="fa-solid fa-plus"></i>        
        </button>
    </div>
    
    {{-- Display decks that the user has --}}
    <div id="deckList" class="container d-flex justify-content-md-start justify-content-center flex-wrap">
        {{-- Message if user has no decks --}}
        @if(!count($userDecks))
            <div class="alert alert-danger">
                <strong>Error!</strong> No decks found.
            </div>

        {{-- Display all of the decks that a user has available to them --}}
        @else
            @foreach($userDecks as $deck)
                <form action="{{ route('modify') }}" class="p-2">
                    <div class="card" style="width: 250px; background-color: rgb(78, 78, 78);">
                        <img 
                            class="card-img-top pt-2 deckPreview"
                            @if($deck->preview) 
                                src="{{asset($deck->preview)}}"
                            @else
                                src="{{asset('image/deckBack.jpg')}}"
                            @endif
                            alt="Card image cap">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <h5 class="card-title text-light text-center">{{$deck->name}}</h5>
                                <input type="hidden" name="deck_id" value="{{$deck->id}}">
                                <button type="submit" class="btn btn-warning col-5">View Deck</button>     
                            </div>
                            <a href="{{ route('deleteDeck', ['deck_id'=> $deck->id]) }}" class="btn btn-danger position-absolute top-0 end-0 p-2 m-1"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
    </div>
</div>

{{-- Create deck modal --}}
<div class="modal fade text-center" id="addDeckModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addDeckModalLabel" aria-hidden="true">
    <form action="{{ route('createDeck') }}" >
        @csrf
        <div class="modal-dialog modal-dialog-slideout">
            <div class="modal-content customModalStyle">
                <div class="modal-header border-warning">
                    <h5 class="modal-title" id="addDeckModalLabel">Create New Deck</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="addCardModalResult">
                    <select class="form-select w-50" onchange="updateImagePreview()" aria-label="Default select example">
                        <option selected disabled="disabled" value="None">Pick Image</option>
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
                            <input type="deck_name" id="deck_name" name="deck_name" class="form-control" aria-describedby="newDeckNameField">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-warning">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </div>
        </div>
        <div id="hiddenInputs">
            <input type="hidden" id="deck_art" name="deck_art" value="">
        </div>
    </form>
</div>

<script>
    function updateImagePreview() {
        let value = $('.form-select').val();
        console.log(value);
        images = {
            "None": "{{asset('image/deckBack.jpg')}}",
            "Black": "{{asset('image/BlackDeck.png')}}",
            "Red": "{{asset('image/RedDeck.png')}}",
            "Blue": "{{asset('image/BlueDeck.png')}}",
            "White": "{{asset('image/WhiteDeck.png')}}",
            "Green": "{{asset('image/GreenDeck.png')}}"
        }
        $("#imagePreview" ).html( "<img class='preview' src='" + images[value] + "' alt='Card image cap'>" );
        $("#deck_art").val(images[value]);
    }
</script>
@endsection