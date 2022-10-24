@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Hub'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Hubs' => '/brains/hubs/list'], 'title' => 'Add Hub'])

    <form method="post" action="/brains/hubs/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])
        
        @include ('layout.forms.text', ['name' => 'set_num', 'label' => 'Set Number'])

        @include ('layout.forms.text', ['name' => 'part_num', 'label' => 'Part Number'])

        @include ('layout.forms.button', ['label' => 'Add Hub'])

    </form>

</section>

@endsection
