
<div class="w3-margin-bottom">

    <table class="w3-table" id="map-table">

        @foreach ($grid as $i => $row)

            <tr>

                @foreach ($row as $j => $col)

                    @if (isset($bulding))
                        <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$building == $col->building_id ? 'red' : $col->mapType->color}}" style="width:{{round(100/count($row),2)}}%;  height: 17px;"></td>
                    @elseif (isset($road))
                        <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$road == $col->road_id ? 'dark-grey' : $col->mapType->color}}" style="width:{{round(100/count($row),2)}}%;  height: 17px;"></td>
                    @else
                        <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$col->mapType->color}}" style="width:{{round(100/count($row),2)}}%;  height: 17px;"></td>
                    @endif

                @endforeach

            </tr>

        @endforeach

    </table>    

</div>

<style>
#map-table td {
    border: 1px solid white;
}
#map-table td {
    height: 10px;
}
</style>