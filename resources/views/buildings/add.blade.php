@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Building'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Buildings' => '/buildings/list'], 'title' => 'Add Building'])

    <form method="post" action="/buildings/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'subtitle'])

        @include ('layout.forms.text', ['name' => 'width'])

        @include ('layout.forms.text', ['name' => 'height'])

        @include ('layout.forms.text', ['name' => 'set_num'])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Set Number', 'label' => 'Map', 'options' => $maps, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Building'])

    </form>

</section>

@endsection
