@extends('includes.header')
@section('body')

<div class="container text-light text-center pt-5">
    <h1>{{$deck->name}}</h1>
</div>

@if(count($deck->cards))
<div class="container mb-5 py-2 d-flex justify-content-center flex-wrap">
    @foreach($deck->cards as $cardRel)
        <img 
            src="{{$cardRel->card->image_url}}" 
            class="align-middle m-2 mtgCard" 
            alt="card in deck" 
            style="height: 300px"
            data-bs-toggle="modal"
            data-bs-target="#modifyCardModal"
            onclick="populateModal('{{$cardRel->card->image_url}}', '{{$cardRel->card->multiverseid}}')">
    @endforeach
</div>
@endif


<!-- Modal -->
<form action="{{ route('deleteCard') }}">
    <div class="modal fade" id="modifyCardModal" tabindex="-1" aria-labelledby="modifyCardModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content customModalStyle">
                <div class="modal-header border-warning">
                    <h4 class="modal-title text-center" id="modifyCardModalLabel">Modify Card</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                </div>
                <input type="hidden" name="multiverseid" id="multiverseid">
                <input type="hidden" name="deck_id" id="deck_id" value="{{$deck->id}}">
                <div class="modal-footer d-flex justify-content-center container border-warning">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    function populateModal(imageUrl, multiverseId) {
        console.log(imageUrl);
        console.log(multiverseId);
        $('#modifyCardModal .modal-body').html('<img src="' + imageUrl + '" style="height: 400px">');
        $('#multiverseid').val(multiverseId);
    }

</script>

@endsection