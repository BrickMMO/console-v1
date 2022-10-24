@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Port'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hubs/list', 'Manage Ports' => '/hubs/ports/list'], 'title' => 'Edit Port: '.$hubPort->title])

    <form method="post" action="/hubs/ports/edit/{{$hubPort->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $hubPort->title])

        @include ('layout.forms.select', ['name' => 'function', 'options' => $functions, 'selected' => $hubPort->function])
        
        @include ('layout.forms.select', ['name' => 'hub_id', 'label' => 'Type', 'options' => $hubs, 'type' => 'table', 'selected' => $hubPort->hub_id])

        @include ('layout.forms.button', ['label' => 'Edit Brain Type'])

    </form>

</section>

@endsection
