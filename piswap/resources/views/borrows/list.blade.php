<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Borrowings list')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all borrowings</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete bottow
  </span>
  <h2>Add new book to the inventory</h2>
    <button type="button" onclick="window.location.href='/borrows/create'" class="btn btn-success" >Add Borrow</button>
  <br>
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
          <th>Author</th>
          <th>Valid until</th>
          <th>To be paid</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['borrows'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->user_email }}</td>
          <td>{{ $key->date_to }}</td>
          <td>0,- &euro;</td>
          <td>

            <form class="form-horizontal"  role="form" method="POST" action="{{route('borrows.prolong', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning" >Prolong Borrowing</button>
            </form>

            <form class="form-horizontal"  method="POST" action="/borrows/delete/{{$key->id}}">
              {{method_field('DELETE')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger" >Return Book</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
