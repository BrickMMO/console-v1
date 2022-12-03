@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Building'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Buildings' => '/buildings/list'], 'title' => 'Edit Building: '.$building->title])

    <form method="post" action="/buildings/edit/{{$building->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $building->title])

        @include ('layout.forms.text', ['name' => 'subtitle', 'value' => $building->subtitle])

        @include ('layout.forms.text', ['name' => 'width', 'value' => $building->width])

        @include ('layout.forms.text', ['name' => 'height', 'value' => $building->height])

        @include ('layout.forms.text', ['name' => 'color', 'value' => $building->color])

        @include ('layout.forms.text', ['name' => 'set_num', 'label' => 'Set Number', 'value' => $building->set_num])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Map', 'options' => $maps, 'type' => 'table', 'selected' => $building->map_id])

        @include ('layout.forms.button', ['label' => 'Edit Building'])

    </form>

</section>

@endsection
