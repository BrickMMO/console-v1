@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Meme Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list'], 'title' => 'Meme Image: '.$meme->title])

    @include ('layout.elements.image', ['image' => $meme->image, 'width' => 400, 'id' => $meme->id, 'type' => 'memes'])

    <form method="post" action="/memes/image/{{$meme->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
