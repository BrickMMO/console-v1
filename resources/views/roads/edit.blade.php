@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Road'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Roads' => '/roads/list'], 'title' => 'Edit Road: '.$road->title])

    <form method="post" action="/roads/edit/{{$road->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $road->title])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Map', 'options' => $maps, 'type' => 'table', 'selected' => $road->map_id])

        @include ('layout.forms.button', ['label' => 'Edit Road'])

    </form>

</section>

@endsection
