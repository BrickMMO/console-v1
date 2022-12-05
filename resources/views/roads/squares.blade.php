@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Road Grid'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Roads' => '/roads/list'], 'title' => 'Road Grid: '.$road->title])

    <form method="post" action="/roads/squares/{{$road->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.maps.squares', ['grid' => $map->grid(), 'selected' => $road->squares->pluck('id')->toArray(), 'color' => 'dark-grey'])

        @include ('layout.forms.button', ['label' => 'Edit Road'])

    </form>

</section>

@endsection
