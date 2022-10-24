
<div class="w3-margin-bottom">

<table class="w3-table" id="map-table">

    @foreach ($grid as $i => $row)

        <tr>

            @foreach ($row as $j => $col)

                <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{(isset($building) and $building == $col->building_id) ? 'red' : $col->mapType->color}}"></td>

            @endforeach

        </tr>

    @endforeach

</table>    

</div>

<style>

#map-table td {
}
#map-table td {
    width: {{round(100/count($grid[0]))}}%;
}


</style>