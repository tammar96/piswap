<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Borrowings list')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all borrowings and reservations</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
  </span>
  <br>

  <h2>List of Borrows</h2>
  <div class="table-responsive">
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>Valid until</th>
          <th>Fine</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['borrows'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->date_to }}</td>
          <td>{{ $fine[($key->id)] }},- &euro;</td>
          <td>

            <form class="form-horizontal"  role="form" method="POST" action="{{route('borrows.userprolong', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning" >Prolong Borrowing</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <h2>List of Reservations</h2>
  <div class="table-responsive">
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>Valid until</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reservations['reservations'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->date }}</td>
          <td>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
