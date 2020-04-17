<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Borrowings list')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all borrowings</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here is your borrowed books
  </span>
  <br>

  <h2>List of Borrows</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_summer form-control" onkeyup="myFunction('summer', 0, 2)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>Valid until</th>
          <th>Fine</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['borrows'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->date_to }}</td>
          <td>{{ $fine[($key->id)] }},- &euro;</td>
          <td>

            <form class="form-horizontal"  role="form" method="POST" action="{{route('borrows.prolong', $key->id)}}">
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
@endsection
