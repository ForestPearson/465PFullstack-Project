@extends('includes.header')
@section('body')

<div class="container text-light text-center">
    <h1>{{$deck->name}}</h1>
</div>

@if(count($deck->cards))
<div>
    @foreach($deck->cards as $cardRel)
    <div class="card" style="width: 18rem;">
        <img src="{{$cardRel->card->image_url}}" class="card-img-top" alt="card in deck">
    </div>
    @endforeach
</div>
@endif

@endsection