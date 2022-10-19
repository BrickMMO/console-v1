@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brain Ports'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Manage Brain Ports'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Port</th>
            <th>Function</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($brainPorts as $brainPort): ?>
            <tr>
                <td>
                    {{$brainPort->id}}
                </td>
                <td>
                    Port: {{$brainPort->title}}
                    <small>
                        <br>
                        {{$brainPort->brainType->title}}
                    </small>
                </td>
                <td>
                    {{$brainPort->function}}
                </td>
                <td>
                    <a href="/brains/ports/edit/{{$brainPort->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/ports/delete/{{$brainPort->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Brain Ports', 'href' => '/brains/ports/add'])

</section>

@endsection
