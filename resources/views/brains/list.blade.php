@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brains'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Brains'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/brains/types/list">Manage Brain Types</a> | 
            <a href="/brains/ports/list">Manage Brain Ports</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Set</th>
            <th>Part</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($brains as $brain): ?>
            <tr>
                <td>
                    {{$brain->id}}
                </td>
                <td>
                    @if ($brain->brainType->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$brain->brainType->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$brain->title}}
                    <br>
                    <small>
                        Type: {{$brain->brainType->title}}
                        <br>
                        Map: {{$brain->map->title}}
                    </small>
                </td>
                <td>
                    {{$brain->brainType->set_num}}
                </td>
                <td>
                    {{$brain->brainType->part_num}}
                </td>
                <td>
                    <a href="/brains/edit/{{$brain->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/delete/{{$brain->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Brain', 'href' => '/brains/add'])

</section>

@endsection
