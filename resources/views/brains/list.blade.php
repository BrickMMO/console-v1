@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brains'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Brains'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Set</th>
            <th>Part</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($brains as $brain): ?>
            <tr>
                <td>
                    {{$brain->id}}
                </td>
                <td>
                    @if ($brain->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$brain->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$brain->title}}
                    <br>
                    <small>
                        @if ($brain->subtitle)
                            {{$brain->subtitle}}
                            <br>
                        @endif
                        Map: {{$brain->map->title}}
                    </small>
                </td>
                <td>
                    {{$brain->set_num}}
                </td>
                <td>
                    {{$brain->squares->count()}}
                </td>
                <td>
                    <a href="/brains/image/{{$brain->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
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
