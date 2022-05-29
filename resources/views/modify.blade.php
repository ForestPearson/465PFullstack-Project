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
            style="height: 300px">
    @endforeach
</div>
@endif

@endsection