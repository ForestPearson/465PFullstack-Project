@extends('includes.header')
@section('body')

<div class="pt-2 container">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="filter" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
    Card Filter
  </button>
  <ul class="dropdown-menu dropdown-menu-dark p-2" aria-labelledby="filter">
    <p>Mana Type</p>
    <li>
        <a>
            <input onclick="filterByColor('White')" type="checkbox" class="btn-check" id="whiteMana" autocomplete="off">
            <label class="btn btn-outline-light" for="whiteMana">White</label>
        </a>

        <a>        
            <input onclick="filterByColor('Blue')" type="checkbox" class="btn-check" id="blueMana" autocomplete="off">
            <label class="btn btn-outline-primary" for="blueMana">Blue</label>
        </a>

        <a>
            <input onclick="filterByColor('Black')" type="checkbox" class="btn-check" id="blackMana" autocomplete="off">
            <label class="btn btn-outline-secondary" for="blackMana">Black</label>
        </a>

        <a>
            <input onclick="filterByColor('Red')" type="checkbox" class="btn-check" id="redMana" autocomplete="off">
            <label class="btn btn-outline-danger" for="redMana">Red</label>
        </a>        

        <a>
            <input onclick="filterByColor('Green')" type="checkbox" class="btn-check" id="greenMana" autocomplete="off">
            <label class="btn btn-outline-success" for="greenMana">Green</label>
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>

    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>

<div class="container py-5 d-flex justify-content-center flex-wrap">


    @foreach ($allCards as $card)
        <img
            class="align-middle m-2 mtgCard"
            src="{{ $card->image_url; }}"
            alt="MTG Card" 
            height="300em"
        />    
    @endforeach

</div>

<!--pagination-->
<div class="container d-flex justify-content-center p-3">
    {{ $allCards->links() }}
</div>

<script>
    let COLORS = []

    function filterByColor(color) {
        if(COLORS.includes(color)) {
            COLORS.splice(COLORS.indexOf(color), 1);
            console.log(color + " unclicked");
        }
        else {
            COLORS.push(color);
            console.log(color + " clicked");
        }
        console.log(COLORS);

        let colorString = "?color=" + COLORS.join(',');
        axios.get('{{ route('getCardsByColor') }}' + colorString)
        .then(function(response) {
            console.log(response.data);
        });
    }


</script>

@endsection




<!--$allCards[0]->card_name
tags:

MULTI-BUTTON:
colors

TWO SEARCH BOX RANGE:
manacost

DROPDOWNS:
type
rarity

SEARCH-BY-DROPDOWN:
id
card_name
multiverseid
card_set

OTHER:
image_url
created_at
updated_at
-->