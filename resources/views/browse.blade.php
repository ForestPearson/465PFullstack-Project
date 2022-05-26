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

    <!--Mana Cost Filter
    <p>Mana Cost</p>
    <li>
        <form class="form-inline">
            <div class="form-group">
                <label for="minMana" class="sr-only"></label>
                <input type="text" class="form-control" id="minMana" placeholder="Min">
            </div>
            <div>
                <label for="maxMana" class="sr-only"></label>
                <input type="text" class="form-control" id="maxMana" placeholder="Max">
            </div>
            <button type="submit" class="btn-primary">Go</button>
        </form>
    </li>
    <li><hr class="dropdown-divider"></li>
-->
    <!-- Type Filter
    <li>
        <a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="typeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Type
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="typeDropdown">
                    <li><a class="dropdown-item">Artifact</a></li>
                    <li><a class="dropdown-item">Creature</a></li>
                    <li><a class="dropdown-item">Enchantment</a></li>
                    <li><a class="dropdown-item">Instant</a></li>
                    <li><a class="dropdown-item">Land</a></li>
                    <li><a class="dropdown-item">Planeswalker</a></li>
                    <li><a class="dropdown-item">Sourcery</a></li>
                </ul>
            </div>            
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
-->
    <!-- Rarity Filter
    <li>
        <a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="rarityDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Rarity
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="rarityDropdown">
                    <li><a class="dropdown-item">Common</a></li>
                    <li><a class="dropdown-item">Uncommon</a></li>
                    <li><a class="dropdown-item">Rare</a></li>
                    <li><a class="dropdown-item">Mythic Rare</a></li>
                </ul>
            </div>            
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
-->
    <!-- Search by...
    <li>
        <a>


            <form class="container-fluid">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="searchByDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Search by...
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="searchByDropdown">
                        <li><a class="dropdown-item">Card Name</a></li>
                        <li><a class="dropdown-item">Card Set</a></li>
                        <li><a class="dropdown-item">ID</a></li>
                        <li><a class="dropdown-item">Multiverse ID</a></li>
                    </ul>
                </div> 
                <div class="input-group">
                    <label for="searchBy" class="sr-only"></label>
                    <input type="text" class="form-control" id="searchBy" placeholder="Search by...">
                </div>
                <button type="submit" class="btn-primary">Go</button>
            </form>
        </a>
    </li>
-->
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