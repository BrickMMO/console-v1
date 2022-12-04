@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Place'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Places' => '/places/list'], 'title' => 'Add Place'])

    <form method="post" action="/buildings/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'address'])

        @include ('layout.forms.text', ['name' => 'x'])

        @include ('layout.forms.text', ['name' => 'y'])

        @include ('layout.forms.text', ['name' => 'width'])

        @include ('layout.forms.text', ['name' => 'height'])

        @include ('layout.forms.select', ['name' => 'building_id', 'label' => 'Building', 'options' => $buildings, 'type' => 'table'])

        @include ('layout.forms.select', ['name' => 'road_id', 'label' => 'Road', 'options' => $roads, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Place'])

    </form>

</section>

@endsection
