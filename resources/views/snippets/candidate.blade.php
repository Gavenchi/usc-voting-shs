<form method="post">
  {{ csrf_field() }}
  @foreach ($positions as $position)
  <div class="d-flex flex-row justify-content-center">
    <div class="p-2">
      <h3>{{ $position->name }}</h3>
    </div>
    </div>
    <div class="d-flex flex-row justify-content-center candid-selector">
      @foreach($position->candidates as $candidate)
      <section class="p-2">
        <input id="{{ snake_case($candidate->name) }}" name="{{ snake_case($position->name) }}" value="{{ $candidate->id }}" type="radio">
        <label class="candid-img" for="{{ snake_case($candidate->name) }}">
          <figure class="figure">
            <img src="http://placehold.it/250/ff0000/000000" class="figure-img img-fluid rounded" alt="Placeholder image">
            <figcaption class="figure-caption text-center">
              {{ $candidate->name }}<br>
              {{ $candidate->party->name }}
            </figcaption>
          </figure>
        </label>
      </section>
      @endforeach
    </div>
  </div>
  @endforeach
  <div class="d-flex flex-row justify-content-center">
  @component('fields/button', ['type' => 'submit'])
    Submit Vote!
  @endcomponent
  </div>
</form>