@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Hub Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Hubs' => '/brains/hubs/list'], 'title' => 'Hub Image: '.$hub->title])

    @include ('layout.elements.image', ['image' => $hub->image, 'width' => 400, 'id' => $hub->id, 'type' => 'hubs'])

    <form method="post" action="/brains/hubs/image/{{$hub->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
