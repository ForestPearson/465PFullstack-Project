@extends('includes.header')


@section('body')

<div class="container pt-5 d-flex justify-content-center flex-wrap">

    <style>
        .mtgCard:hover {
            transform: scale(1.5);
        }
        .mtgCard {
            transition: transform 0.2s ease;
            box-shadow: 0 4px 6px 0 rgba(22, 22, 26, 0.18);
            border-radius: 0;
            border: 0;
            margin-bottom: 1.5em;
        }
    </style>

    @foreach ($allCards as $card)
        <img
            class="align-middle m-2 mtgCard"
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

page thingy:
pagination
-->