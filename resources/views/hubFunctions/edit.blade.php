@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Function'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hubs/list', 'Manage Functions' => '/hubs/functions/list'], 'title' => 'Edit Function: '.$hubFunction->title])

    <form method="post" action="/hubs/functions/edit/{{$hubFunction->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $hubFunction->title])

        @include ('layout.forms.button', ['label' => 'Edit Function'])

    </form>

</section>

@endsection
