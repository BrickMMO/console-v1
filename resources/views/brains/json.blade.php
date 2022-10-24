@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Ports'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brain' => '/brains/list'], 'title' => 'Edit Port JSON: '.$brain->title])

    <form method="post" action="/brains/json/{{$brain->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @foreach ($brainPorts as $brainPort)

            @include ('layout.forms.textarea', [
                'name' => 'json['.$brainPort->id.']', 
                'label' => 'Port '.$brainPort->hubPort->title.' ('.$brainPort->hubPort->function.($brainPort->hubFunction ? ' - '.$brainPort->hubFunction->title : '').')', 
                'value' => $brainPort->json])

        @endforeach

        
        @include ('layout.forms.button', ['label' => 'Edit Port JSON'])

    </form>

</section>

@endsection
