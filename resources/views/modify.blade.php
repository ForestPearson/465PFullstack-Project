@extends('includes.header')
@section('body')

<div class="container text-light text-center">
    <h1>{{$deck->name}}</h1>
</div>

@if(count($deck->cards))
<div class="container mb-5 py-5 d-flex justify-content-center flex-wrap">
    @foreach($deck->cards as $cardRel)
        <img 
            src="{{$cardRel->card->image_url}}" 
            class="align-middle m-2 mtgCard" 
            alt="card in deck" 
            style="height: 300px"
            data-bs-toggle="modal" 
            data-bs-target="#modifyCardModal"
            onclick="populateModal('{{$cardRel->card->image_url}}')">
    @endforeach
</div>
@endif


<!-- Modal -->
<div class="modal fade" id="modifyCardModal" tabindex="-1" aria-labelledby="modifyCardModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyCardModalLabel">Modify Card</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
    function populateModal(imageUrl) {
        $('#modifyCardModal .modal-body').html('<img src="' + imageUrl + '" style="height: 300px">');
    }

</script>

@endsection