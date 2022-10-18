@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Maps'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Maps'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Title</th>
            <th>Dimensions</th>
            <th>Buildings</th>
            <th>Brains</th>
            <th>Squares</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($maps as $map): ?>
            <tr>
                <td>
                    {{$map->id}}
                </td>
                <td>
                    {{$map->title}}
                </td>
                <td>
                    {{$map->width}} x {{$map->height}}
                </td>
                <td>
                    {{$map->buildings()->count()}}
                </td>
                <td>
                    {{$map->brains()->count()}}
                </td>
                <td>
                    {{$map->squares()->count()}}
                </td>
                <td>
                    <a href="/maps/edit/{{$map->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/maps/delete/{{$map->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Map', 'href' => '/maps/add'])
    
</section>

@endsection
