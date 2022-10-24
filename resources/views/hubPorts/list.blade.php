@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Ports'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hubs/list'], 'title' => 'Manage Ports'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Port</th>
            <th>Function</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($hubPorts as $hubPort): ?>
            <tr>
                <td>
                    {{$hubPort->id}}
                </td>
                <td>
                    Port: {{$hubPort->title}}
                    <small>
                        <br>
                        {{$hubPort->hub->title}}
                    </small>
                </td>
                <td>
                    {{$hubPort->function}}
                </td>
                <td>
                    <a href="/hubs/ports/edit/{{$hubPort->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/hubs/ports/delete/{{$hubPort->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Ports', 'href' => '/hubs/ports/add'])

</section>

@endsection
