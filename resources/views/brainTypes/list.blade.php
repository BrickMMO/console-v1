@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Brain Types'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Manage Brain Types'])

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
        <?php foreach($brainTypes as $brainType): ?>
            <tr>
                <td>
                    {{$brainType->id}}
                </td>
                <td>
                    @if ($brainType->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$brainType->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$brainType->title}}
                </td>
                <td>
                    {{$brainType->set_num}}
                </td>
                <td>
                    {{$brainType->part_num}}
                </td>
                <td>
                    <a href="/brains/types/image/{{$brainType->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/brains/types/edit/{{$brainType->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/brains/types/delete/{{$brainType->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Brain Types', 'href' => '/brains/types/add'])

</section>

@endsection
