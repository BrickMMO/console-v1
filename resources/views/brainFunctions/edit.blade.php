@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Brain Function'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Functions' => '/brains/functions/list'], 'title' => 'Edit Brain Function: '.$brainFunction->title])

    <form method="post" action="/brains/functions/edit/{{$brainFunction->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $brainFunction->title])

        @include ('layout.forms.button', ['label' => 'Edit Brain Function'])

    </form>

</section>

@endsection
