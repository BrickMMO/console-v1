@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Brain Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Types' => '/brains/types/list'], 'title' => 'Edit Brain Type: '.$brainType->title])

    <form method="post" action="/brains/types/edit/{{$brainType->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $brainType->title])

        @include ('layout.forms.text', ['name' => 'set_num', 'label' => 'Set Number', 'value' => $brainType->set_num])

        @include ('layout.forms.text', ['name' => 'part_num', 'label' => 'Part Number', 'value' => $brainType->part_num])

        @include ('layout.forms.button', ['label' => 'Edit Brain Type'])

    </form>

</section>

@endsection
