@extends('includes.header')


@section('body')

<div class="container pt-4 bootstrap-grid text-light mb-5">
    @foreach ($allCards as $card)
        <img
            class="align-middle m-2 mtgCard hover"
            src="{{ $card->image_url; }}"
            alt="Logo Icon" 
            height="300em"
        />
    @endforeach
</div>

@endsection

<!--$allCards[0]->card_name
tags:

id
card_name
manacost
colors
type
rarity
card_set
multiverseid
image_url
created_at
updated_at
-->