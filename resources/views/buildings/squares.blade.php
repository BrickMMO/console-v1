@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Building Grid'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Buildings' => '/buildings/list'], 'title' => 'Building Grid: '.$building->title])

    <form method="post" action="/buildings/squares/{{$building->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.maps.squares', ['grid' => $map->grid(), 'selected' => $building->squares->pluck('id')->toArray(), 'color' => 'red'])

        @include ('layout.forms.button', ['label' => 'Edit Building'])

    </form>

</section>

@endsection
