<div class="form-group{{ $errors->has($name) ? ' has-danger' : '' }}">
  <label for="{{ $name }}" class="form-control-label">{{ $slot }}</label>
  <input id="{{ $name }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' form-control-danger' : '' }}" aria-describedby="{{ $name .'-help'}}" name="{{ $name }}" value="{{ old($name) }}"{{ $required ? ' required' : ''}}{{ $autofocus ? ' autofocus' : ''}}>
  @if ($errors->has($name))
  <div class="form-control-feedback">
    {{ $errors->first($name) }}
  </div>
  @endif
  @if(isset($help))
  <small id="{{ $name .'-help'}}" class="form-text text-muted">{{ $help }}</small>
  @endif
</div>
