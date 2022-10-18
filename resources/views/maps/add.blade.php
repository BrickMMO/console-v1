@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Map'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Maps' => '/maps/list'], 'title' => 'Add Map'])

    <form method="post" action="/maps/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'width'])

        @include ('layout.forms.text', ['name' => 'height'])

        @include ('layout.forms.button', ['label' => 'Add Map'])

    </form>

</section>

@endsection
