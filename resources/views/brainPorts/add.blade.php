@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Brain Port'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Ports' => '/brains/ports/list'], 'title' => 'Add Brain Port'])

    <form method="post" action="/brains/ports/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.select', ['name' => 'function', 'options' => $functions])
        
        @include ('layout.forms.select', ['name' => 'brain_type_id', 'label' => 'Type', 'options' => $types, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Brain Port'])

    </form>

</section>

@endsection
