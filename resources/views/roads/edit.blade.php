@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Map'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Maps' => '/maps/list'], 'title' => 'Edit Map: '.$map->title])

    <form method="post" action="/maps/edit/{{$map->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $map->title])

        @include ('layout.forms.text', ['name' => 'width', 'value' => $map->width])

        @include ('layout.forms.text', ['name' => 'height', 'value' => $map->height])

        @include ('layout.forms.button', ['label' => 'Edit Map'])

    </form>

</section>

@endsection
