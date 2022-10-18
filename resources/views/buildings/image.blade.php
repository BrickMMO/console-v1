@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Social Asset Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Social Assets' => '/socials/list'], 'title' => 'Social Asset Image: '.$social->title])

    @include ('layout.elements.image', ['image' => $social->image, 'width' => 400, 'id' => $social->id, 'type' => 'socials'])

    <form method="post" action="/socials/image/{{$social->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
