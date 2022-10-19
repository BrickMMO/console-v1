
@if ($image)
    <div class="w3-center w3-light-grey w3-padding w3-border w3-margin-bottom">
        <img src="{{asset('storage/'.$image)}}" width="{{$width ?? 400}}">
        
        @if (isset($id))
            <div class="w3-padding">
                <small>
                    <i class="fas fa-trash-alt"></i>
                    <a href="/{{Str::replace('-', 's/', Str::kebab($type))}}/delete/{{$name ?? 'image'}}/{{$id}}">Delete Image</a>
                </small>
            </div>
        @endif

    </div>
@endif
