
<div class="w3-margin-bottom">

<table class="w3-table" id="map-table">

    @foreach ($grid as $i => $row)

        <tr>

            @foreach ($row as $j => $col)

                <td data-x="{{$j}}" data-y="{{$i}}">

                    <input type="checkbox" name="squares[{{$col->id}}]" value="on"{{in_array($col->id, $selected) ? ' checked' : ''}}

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
        square.classList.add("w3-" + col.type.color);
        square.dataset.type = col.type.id;
        
        

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