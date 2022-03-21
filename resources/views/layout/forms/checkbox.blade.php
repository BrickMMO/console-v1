
<div class="w3-margin-bottom">
    <label for="{{$name}}">{{$label ?? ucwords($name)}}:</label>    
        
    @if (($type ?? false) == 'multiple')

        <div class="w3-container w3-border w3-padding">
            @foreach($options as $option)
                <label class="w3-third">
                    <input type="checkbox" name="{{$name}}[]" value="{{$option->id}}" class="w3-check" 
                        {{(is_array(old($name, $selected ?? false)) && in_array($option->id,old($name, $selected ?? false))) ? 'checked' : ''}}>
                    {{$option->title}}
                </label>
            @endforeach
        </div>

    @else

    @endif

    @error ($name)
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
