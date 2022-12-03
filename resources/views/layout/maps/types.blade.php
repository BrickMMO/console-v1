
<div class="w3-margin-bottom">

    <table class="w3-table" id="map-table">

        @foreach ($grid as $i => $row)

            <tr>

                @foreach ($row as $j => $col)

                    <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$col->mapType->color}}" data-type="{{$col->map_type_id}}" style="width:{{round(100/count($row),2)}}%;">

                        <input type="hidden" name="square[{{$j}}][{{$i}}]" value="{{$col->map_type_id}}">

                    </td>

                @endforeach

            </tr>

        @endforeach

    </table>    

</div>

<script>

let types = {!!$types->toJson()!!};
let grid = {!!json_encode($grid)!!};

console.log(types);
console.log(grid);

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
        // square.classList.add("w3-" + col.type.color);
        // square.dataset.type = col.type.id;
        
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
    width: {{round(100/count($grid[0]))}}%;
}


</style>