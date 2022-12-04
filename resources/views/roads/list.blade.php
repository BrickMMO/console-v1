@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Roads'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Roads'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($roads as $road): ?>
            <tr>
                <td>
                    {{$road->id}}
                </td>
                <td>
                    @include ('layout.maps.static', ['grid' => $road->grid(), 'road' => $road->id])
                </td>
                <td>
                    {{$road->title}}
                </td>
                <td>
                    <a href="/roads/maps/{{$road->id}}">
                        <i class="fas fa-map"></i>
                    </a>
                </td>
                <td>
                    <a href="/roads/edit/{{$road->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/roads/delete/{{$road->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Road', 'href' => '/roads/add'])
    
</section>

@endsection
