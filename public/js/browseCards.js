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

    let colorString = COLORS.join('');
    axios.get('{{ route('getCardsByColor') }}' + colorString)
    .then(function(response) {
        console.log(response.data);
    });

}