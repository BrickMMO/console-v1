@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Brain'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Add Brain'])

    <form method="post" action="/brains/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Map', 'options' => $maps, 'type' => 'table'])

        @include ('layout.forms.select', ['name' => 'hub_id', 'label' => 'Hub', 'options' => $hubs, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Building'])

    </form>

</section>

@endsection
