@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Map Grid'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Maps' => '/maps/list'], 'title' => 'View Map: '.$map->title])

    <form method="post" action="/maps/types/{{$map->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.maps.types', ['grid' => $map->grid(), 'types' => $types])

        @include ('layout.forms.button', ['label' => 'Edit Map'])

    </form>

</section>

@endsection
