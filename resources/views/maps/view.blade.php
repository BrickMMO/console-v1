@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'View Map'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Maps' => '/maps/list'], 'title' => 'View Map: '.$map->title])

    @include ('layout.elements.map', ['map' => $map])

</section>

@endsection
