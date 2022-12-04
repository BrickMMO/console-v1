@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Road'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Roads' => '/roads/list'], 'title' => 'Add Road'])

    <form method="post" action="/roads/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Set Number', 'label' => 'Map', 'options' => $maps, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Road'])

    </form>

</section>

@endsection
