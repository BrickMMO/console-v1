@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Brain Function'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Functions' => '/brains/functions/list'], 'title' => 'Add Brain Function'])

    <form method="post" action="/brains/functions/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])
        
        @include ('layout.forms.button', ['label' => 'Add Brain Function'])

    </form>

</section>

@endsection
