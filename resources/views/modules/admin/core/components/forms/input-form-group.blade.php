<div class="form-group {{$required ? ' required' : ''}}">
    @if(!$hidden)
        <label class="control-label" for="{{$name}}">{{$label}}</label>
    @endif
    <input name="{{$name}}"
           id="{{$name}}"
           class="form-control{{ isset($errors) && $errors->has($name) ? ' is-invalid' : '' }}"
           value="{{ isset($value) ? $value : old($name) }}" {{$required ? ' required' : ''}}
           type="{{$type}}"
           placeholder="{{$placeholder}}"
           maxlength="{{$max}}"
           {{$hidden ? 'hidden' : ''}}
           {{--           @if($type == 'date') max='2050-01-01' @endif--}}
           @if($type == 'file') @if ($name == 'docs[]') accept="image/* , application/*" @else accept="image/*"  @endif {{$multiple ? ' multiple' : ''}}  @endif>
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
