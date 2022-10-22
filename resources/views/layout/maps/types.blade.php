
<div class="w3-margin-bottom">

    <table class="w3-table" id="map-table">

        @for ($i = 0; $i < $map->height; $i++)

            <tr>

                @for ($j = 0; $j < $map->width; $j++)

                    <td data-x="{{$j}}" data-y="{{$i}}">

                        <input type="hidden" name="square[{{$j}}][{{$i}}]">

                    </td>

                @endfor

            </tr>

        @endfor

    </table>    

</div>

<script>

let types = {!!$types->toJson()!!};
let grid = {!!json_encode($grid)!!};

grid.forEach(function(row, i){

    /*
    console.log(row);
    console.log(i);
    console.log('-------------------');
    */

    row.forEach(function(col, j){

        /*
        console.log(col);
        console.log(j);
        console.log('-------------------');
        */
        
        let square = document.querySelector("tr:nth-child(" + (i+1) + ") td:nth-child(" + (j+1) + ")");
        square.classList.add("w3-" + col.type.color);
        square.dataset.type = col.type.id;

        let input = document.querySelector("tr:nth-child(" + (i+1) + ") td:nth-child(" + (j+1) + ") input");
        input.value = col.type.id;
        
        square.addEventListener("click", function(e){

            /*
            console.log(this.dataset.x);
            console.log(this.dataset.y);
            console.log(this.dataset.type);
            */

            let currentType = this.getAttribute('data-type');

            types.forEach(function(type, index){

                if(type.id == currentType)
                {
                    let nextIndex = (index + 1) % types.length;
                    e.target.dataset.type = types[nextIndex].id;
                    e.target.querySelector("input").value = types[nextIndex].id;
                    square.classList.remove("w3-" + types[index].color);
                    square.classList.add("w3-" + types[nextIndex].color);

                    /*
                    console.log("The current index is " + index + " next color is: " + nextIndex);
                    */
                }

            });

            

        });

    });

});

</script>

<style>

#map-table td {
    border: 1px solid white;
}
#map-table td {
    height: 50px;
    width: {{100/$map->width}}%;
}


</style>