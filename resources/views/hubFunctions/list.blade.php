@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brain Functions'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Manage Brain Functions'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($brainFunctions as $brainFunction): ?>
            <tr>
                <td>
                    {{$brainFunction->id}}
                </td>
                <td>
                    {{$brainFunction->title}}
                </td>
                <td>
                    <a href="/brains/functions/edit/{{$brainFunction->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/functions/delete/{{$brainFunction->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Brain Function', 'href' => '/brains/functions/add'])

</section>

@endsection
