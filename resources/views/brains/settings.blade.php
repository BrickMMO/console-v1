@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Port Settings'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Edit Port Settings: '.$brain->title])

    <form method="post" action="/brains/settings/{{$brain->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @foreach ($brainPorts as $brainPort)

            @include ('layout.forms.textarea', [
                'name' => 'settings['.$brainPort->id.']', 
                'label' => 'Port '.$brainPort->hubPort->title.' ('.$brainPort->hubPort->function.($brainPort->hubFunction ? ' - '.$brainPort->hubFunction->title : '').')', 
                'value' => $brainPort->settings])

        @endforeach

        
        @include ('layout.forms.button', ['label' => 'Edit Port Settings'])

    </form>

</section>

@endsection
