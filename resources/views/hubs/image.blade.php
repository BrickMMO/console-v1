@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Brain Type Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Brains' => '/brains/list', 'Manage Brain Types' => '/brains/types/list'], 'title' => 'Brain Type Image: '.$brainType->title])

    @include ('layout.elements.image', ['image' => $brainType->image, 'width' => 400, 'id' => $brainType->id, 'type' => 'brainTypes'])

    <form method="post" action="/brains/types/image/{{$brainType->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
