@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Place'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Places' => '/places/list'], 'title' => 'Edit Place: '.$place->title])

    <form method="post" action="/places/edit/{{$place->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $place->title])

        @include ('layout.forms.text', ['name' => 'address', 'value' => $place->address])

        @include ('layout.forms.text', ['name' => 'x', 'value' => $place->x])

        @include ('layout.forms.text', ['name' => 'y', 'value' => $place->y])

        @include ('layout.forms.text', ['name' => 'width', 'value' => $place->width])

        @include ('layout.forms.text', ['name' => 'height', 'value' => $place->height])

        @include ('layout.forms.select', ['name' => 'building_id', 'label' => 'Building', 'options' => $buildings, 'type' => 'table', 'selected' => $place->building_id])

        @include ('layout.forms.select', ['name' => 'road_id', 'label' => 'Road', 'options' => $roads, 'type' => 'table', 'selected' => $place->road_id])

        @include ('layout.forms.button', ['label' => 'Edit Place'])

    </form>

</section>

@endsection
