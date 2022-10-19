@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Brain Port'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Ports' => '/brains/ports/list'], 'title' => 'Edit Brain Port: '.$brainPort->title])

    <form method="post" action="/brains/ports/edit/{{$brainPort->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $brainPort->title])

        @include ('layout.forms.select', ['name' => 'function', 'options' => $functions, 'selected' => $brainPort->function])
        
        @include ('layout.forms.select', ['name' => 'brain_type_id', 'label' => 'Type', 'options' => $types, 'type' => 'table', 'selected' => $brainPort->brain_type_id])

        @include ('layout.forms.button', ['label' => 'Edit Brain Type'])

    </form>

</section>

@endsection
