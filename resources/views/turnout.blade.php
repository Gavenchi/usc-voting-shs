/@extends('layouts.shs')
@section('title', 'Voter\'s Turnout')
@section('content')
<div class="container">
  @foreach($campuses as $campus)
  <p class="lead">{{ $campus->name }}</p>
  @php
    $noOfVotes = 0;

    $campusUsers = \App\User::where('campus_id', $campus->id)->get();

    foreach($campusUsers as $user) {
      if($user->votes->count() > 0) {
        $noOfVotes++;
      }
      
    }
  @endphp
  <p>{{ $noOfVotes }} of {{ $campusUsers->count() }}</p>
  <table class="table table-striped">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date/Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($campus->users as $user)
        @if($user->votes->count() > 0)
        <tr>
          <td>{{ $user->username }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->votes->first()->created_at->setTimezone('Asia/Taipei') }}</td>
        </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  @endforeach
</div>
@endsection
