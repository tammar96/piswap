<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Reservations list')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all Reservations</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can check and delete reservations
  </span>
  <h2>Add new book to the inventory</h2>
    {{-- <button type="button" onclick="window.location.href='/borrows/create'" class="btn btn-success" >Add Borrow</button> --}}
  <br>
  <br>

  <h2>List of Reservations</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_summer form-control" onkeyup="myFunction('summer', 0, 2)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>User</th>
          <th>Valid until</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['data'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->user_email }}</td>
          <td>{{ $key->date_to }}</td>
          <td>

            {{-- <form class="form-horizontal"  role="form" method="POST" action="{{route('borrows.prolong', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning" >Edit Reservation</button>
            </form> --}}

            <form class="form-horizontal"  role="form" method="POST" action="{{route('borrows.returnBookForm', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger" >Delete Reservation</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
