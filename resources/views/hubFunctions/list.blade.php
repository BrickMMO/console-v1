@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Functions'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hubs/list'], 'title' => 'Manage Functions'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($hubFunctions as $hubFunction): ?>
            <tr>
                <td>
                    {{$hubFunction->id}}
                </td>
                <td>
                    {{$hubFunction->title}}
                </td>
                <td>
                    <a href="/hubs/functions/edit/{{$hubFunction->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/hubs/functions/delete/{{$hubFunction->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Function', 'href' => '/hubs/functions/add'])

</section>

@endsection
