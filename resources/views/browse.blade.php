@extends('includes.header')
@section('body')

<div class="pt-2 container">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="filter" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
    Card Filter
  </button>
  <ul class="dropdown-menu dropdown-menu-dark p-2 " aria-labelledby="filter">
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

    <!-- Type Filter -->
    <p>Type</p>
    <li>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="artifact" autocomplete="off">
            <label class="btn btn-outline-warning" for="artifact">Artifact</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="creature" autocomplete="off">
            <label class="btn btn-outline-warning" for="creature">Creature</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="enchantment" autocomplete="off">
            <label class="btn btn-outline-warning" for="enchantment">Enchantment</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="instant" autocomplete="off">
            <label class="btn btn-outline-warning" for="instant">Instant</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="land" autocomplete="off">
            <label class="btn btn-outline-warning" for="land">Land</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="planeswalker" autocomplete="off">
            <label class="btn btn-outline-warning" for="planeswalker">Planeswalker</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="sorcery" autocomplete="off">
            <label class="btn btn-outline-warning" for="sorcery">Sorcery</label>
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>

    <!-- Rarity Filter -->
    <li>
    <p>Rarity</p>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="common" autocomplete="off">
            <label class="btn btn-outline-warning" for="common">common</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="uncommon" autocomplete="off">
            <label class="btn btn-outline-warning" for="uncommon">Uncommon</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="rare" autocomplete="off">
            <label class="btn btn-outline-warning" for="rare">Rare</label>
        </a>
        <a>
            <input onclick="//function" type="radio" class="btn-check" id="mythicRare" autocomplete="off">
            <label class="btn btn-outline-warning" for="mythicRare">Mythic Rare</label> 
        </a>         
    </li>
    <li><hr class="dropdown-divider"></li>

    <!-- Search by Name -->
    <p>Search by Name</p>
    <li>
        <form class="container-fluid">
            <input type="text" class="form-control" id="searchByName" placeholder="Search">
            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </li>

  </ul>
</div>

<div class="container py-5 d-flex justify-content-center flex-wrap" id="cardResults">


    @foreach ($allCards as $card)
        <img
            class="align-middle m-2 mtgCard"
            src="{{ $card->image_url; }}"
            alt="MTG Card" 
            height="300px"
        />    
    @endforeach

</div>

<!--pagination-->
<div class="container d-flex justify-content-center p-3" id="allCardPaginate">
    {{ $allCards->links() }}
</div>

<!-- Filter by Color -->
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

        $(".mtgCard").remove();
        $("#allCardPaginate").remove();

        axios.get('{{ route('getCardsByColor') }}' + colorString)
        .then(function(response) {
            console.log(response.data);
            response.data.forEach(function(card){
                let image = $("<img/>", {
                    src: card.image_url,
                    class: "align-middle m-2 mtgCard",
                    alt: "MTG Card", 
                    height: "300px"
                });
                image.appendTo($('#cardResults'));
            });
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