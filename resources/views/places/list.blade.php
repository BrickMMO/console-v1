@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Places'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Places'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($places as $place): ?>
            <tr>
                <td>
                    {{$place->id}}
                </td>
                <td>
                    @include ('layout.maps.place', ['grid' => $place->grid()])
                </td>
                <td>
                    {{$place->title}}
                    <br>
                    <small>
                        Building: {{$place->building->title}}
                        <br>
                        Start Coordinates: {{$place->x}},{{$place->y}}
                        <br>
                        Dimensions: {{$place->width}} x {{$place->height}}
                    </small>
                </td>
                <td>
                    <a href="/places/edit/{{$place->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/places/delete/{{$place->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Place', 'href' => '/places/add'])

</section>

@endsection
