@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Hub'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Hubs' => '/brains/hubs/list'], 'title' => 'Edit Hub: '.$hub->title])

    <form method="post" action="/brains/hubs/edit/{{$hub->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $hub->title])

        @include ('layout.forms.text', ['name' => 'set_num', 'label' => 'Set Number', 'value' => $hub->set_num])

        @include ('layout.forms.text', ['name' => 'part_num', 'label' => 'Part Number', 'value' => $hub->part_num])

        @include ('layout.forms.button', ['label' => 'Edit Hub'])

    </form>

</section>

@endsection
