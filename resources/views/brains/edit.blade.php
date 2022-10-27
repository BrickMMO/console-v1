@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Brain'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list'], 'title' => 'Edit Brain: '.$brain->title])

    <form method="post" action="/brains/edit/{{$brain->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $brain->title])

        @include ('layout.forms.text', ['name' => 'ip', 'label' => 'IP Address', 'value' => $brain->ip])

        @include ('layout.forms.select', ['name' => 'map_id', 'label' => 'Map', 'options' => $maps, 'type' => 'table', 'selected' => $brain->map_id])

        @include ('layout.forms.select', ['name' => 'hub_id', 'label' => 'Hub', 'options' => $hubs, 'type' => 'table', 'selected' => $brain->hub_id])

        @include ('layout.forms.button', ['label' => 'Edit Brain'])

    </form>

</section>

@endsection
