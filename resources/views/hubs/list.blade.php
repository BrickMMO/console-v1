@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Hubs'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Hubs'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/hubs/ports/list">Manage Ports</a> | 
            <a href="/hubs/functions/list">Manage Functions</a>

        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Set Num</th>
            <th>Part Num</th>    
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($hubs as $hub): ?>
            <tr>
                <td>
                    {{$hub->id}}
                </td>
                <td>
                    @if ($hub->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$hub->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$hub->title}}
                </td>
                <td>
                    {{$hub->set_num}}
                </td>
                <td>
                    {{$hub->part_num}}
                </td>
                <td>
                    <a href="/brains/hubs/image/{{$hub->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/brains/hubs/edit/{{$hub->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/hubs/delete/{{$hub->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Hub', 'href' => '/brains/hubs/add'])

</section>

@endsection
