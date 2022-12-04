
<div class="w3-margin-bottom">

    <table class="w3-table" id="map-table">

        @foreach ($grid as $i => $row)

            <tr>

                @foreach ($row as $j => $col)

                    <td data-x="{{$j}}" data-y="{{$i}}" class="w3-{{$col}}" style="width:{{round(100/count($row),2)}}%; height: 17px;"></td>

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