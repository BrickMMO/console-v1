

<table>

    @foreach ($map->squares() as $row)

        <tr>

            @foreach ($row as $column)

                <td class="w3-red">

                    {{$column}}

                </td>

            @endforeach

        </tr>

    @endforeach

</table>