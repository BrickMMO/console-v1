@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Buildings'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Buildings'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Set</th>
            <th>Squares</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($buildings as $building): ?>
            <tr>
                <td>
                    {{$building->id}}
                </td>
                <td>
                    @if ($building->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$building->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$building->title}}
                    <br>
                    <small>
                        @if ($building->subtitle)
                            {{$building->subtitle}}
                            <br>
                        @endif
                        Map: {{$building->map->title}}
                    </small>
                </td>
                <td>
                    {{$building->set_num}}
                </td>
                <td>
                    {{$building->squares->count()}}
                </td>
                <td>
                    <a href="/buildings/image/{{$building->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/buildings/edit/{{$building->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/buildings/delete/{{$building->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Building', 'href' => '/buildings/add'])

</section>

@endsection
