@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Building Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Buldings' => '/buildings/list'], 'title' => 'Building Image: '.$building->title])

    @include ('layout.elements.image', ['image' => $building->image, 'width' => 400, 'id' => $building->id, 'type' => 'buildings'])

    <form method="post" action="/buildings/image/{{$building->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
