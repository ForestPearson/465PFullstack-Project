@extends('includes.header')


@section('body')

<div class="container pt-4 bootstrap-grid text-light mb-5">
    @foreach ($allCards as $card)
    <img
        class="align-middle"
        src="{{ $card->image_url; }}"
        alt="Logo Icon" 
    />
    @endforeach
</div>

@endsection

<!--$allCards[0]->card_name-->