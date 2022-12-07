@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brains'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Brains'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/hubs/list">Manage Hubs</a> | 
            <a href="/hubs/ports/list">Manage Ports</a> | 
            <a href="/hubs/functions/list">Manage Functions</a>

        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Key</th>
            <th>Set</th>
            <th>Part</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
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
                    @if ($brain->hub->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$brain->hub->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$brain->title}}
                    <br>
                    <small>
                        Hub: {{$brain->hub->title}}
                        <br>
                        Map: {{$brain->map->title}}
                        <br>
                        IP Address: {{$brain->ip}}
                    </small>
                </td>
                <td>
                    <strong>{{$brain->key}}</strong>
                </td>
                <td>
                    {{$brain->hub->set_num}}
                </td>
                <td>
                    {{$brain->hub->part_num}}
                </td>
                <td>
                    <a href="/brains/ports/{{$brain->id}}">
                        <i class="fas fa-plug"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/settings/{{$brain->id}}">
                        <i class="fas fa-cog"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/json/{{$brain->id}}">
                        <i class="fas fa-database"></i>
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
