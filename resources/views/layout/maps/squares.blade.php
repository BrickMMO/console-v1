
<div class="w3-margin-bottom">

    <table class="w3-table" id="map-table">

        @foreach ($grid as $i => $row)

            <tr>

                @foreach ($row as $j => $col)

                    <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$col->mapType->color}}" data-type="{{$col->map_type_id}}" style="width:{{round(100/count($row),2)}}%;  height: 17px;">

                        <input type="hidden" name="squares[{{$col->id}}]" value="{{in_array($col->id, $selected) ? 'on' : 'off'}}" size="3">

                    </td>

                @endforeach

            </tr>

        @endforeach

    </table>    

</div>

<script>

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
        // square.classList.add("w3-" + col.type.color);
        // square.dataset.type = col.type.id;

        if(square.querySelector("input").value == 'on')
        {
            square.classList.add("w3-red");
        }
        
        square.addEventListener("click", function(e){

            /*
            console.log(this.dataset.x);
            console.log(this.dataset.y);
            console.log(this.dataset.type);
            */

            if(e.target.querySelector("input").value == 'on')
            {
                e.target.querySelector("input").value = 'off';
                square.classList.remove("w3-red");
            }
            else
            {
                e.target.querySelector("input").value = 'on';
                square.classList.add("w3-red");
            }
            

        });

    });

});

</script>

<style>
#map-table td {
    border: 1px solid white;
}
#map-table td {
    height: 10px;
}
</style>
