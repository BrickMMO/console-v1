@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Brain Ports'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Edit Brain Ports: '.$brain->title])

    <form method="post" action="/brains/ports/{{$brain->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @foreach ($brainPorts as $brainPort)

            @include ('layout.forms.select', [
                'name' => 'function_id['.$brainPort->id.']', 
                'label' => 'Port '.$brainPort->hubPort->title.' ('.$brainPort->hubPort->function.')', 
                'options' => $functions, 
                'type' => 'table', 
                'selected' => $brainPort->hub_function_id, 
                'blank' => true])

        @endforeach

        
        @include ('layout.forms.button', ['label' => 'Edit Brain Ports'])

    </form>

</section>

@endsection
