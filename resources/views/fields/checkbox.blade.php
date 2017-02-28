<div class="form-group">
  <label class="custom-control custom-checkbox">
    <input type="checkbox" name="{{ $name }}" class="custom-control-input" {{ $checked ? 'checked' : '' }}>
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">{{ $slot }}</span>
  </label>
</div>