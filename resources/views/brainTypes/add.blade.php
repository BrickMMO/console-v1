@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Brain Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Types' => '/brains/types/list'], 'title' => 'Add Brain Type'])

    <form method="post" action="/brains/types/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])
        
        @include ('layout.forms.text', ['name' => 'set_num', 'label' => 'Set Number'])

        @include ('layout.forms.text', ['name' => 'part_num', 'label' => 'Part Number'])

        @include ('layout.forms.button', ['label' => 'Add Brain Type'])

    </form>

</section>

@endsection
