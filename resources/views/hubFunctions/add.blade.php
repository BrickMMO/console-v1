@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Function'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Hubs' => '/hub/list', 'Manage Functions' => '/hubs/functions/list'], 'title' => 'Add Function'])

    <form method="post" action="/hubs/functions/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])
        
        @include ('layout.forms.button', ['label' => 'Add Function'])

    </form>

</section>

@endsection
