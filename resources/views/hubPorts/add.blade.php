@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Port'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hubs/list', 'Manage Ports' => '/hubs/ports/list'], 'title' => 'Add Port'])

    <form method="post" action="/hubs/ports/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.select', ['name' => 'function', 'options' => $functions])
        
        @include ('layout.forms.select', ['name' => 'hub_id', 'label' => 'Hub', 'options' => $hubs, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Port'])

    </form>

</section>

@endsection
