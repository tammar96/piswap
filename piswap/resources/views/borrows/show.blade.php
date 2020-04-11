<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Borrowings')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all books</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete books
  </span>
  <h2>Add new book to the inventory</h2>
    <button type="button" onclick="window.location.href='/books/create'" class="btn btn-success" >Add Book</button>
  <br>
  <br>

  <h2>List of books</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_summer form-control" onkeyup="myFunction('summer', 0, 2)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>Author</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['borrow'] as $key)
        <tr>
          <td>{{ $key->date }}</td>
          <td>{{ $key->user_id }}</td>
          <td>
            <form class="form-horizontal"  method="POST" action="{{ route('borrows.destroy', $key->id) }}">
              {{method_field('DELETE')}}
              {{ csrf_field() }}
              <button type="button" onclick="window.location.href='/borrow/{{ $key->id }}/edit'" class="btn btn-warning" >Prolong Borrow</button>
              <button type="submit" class="btn btn-danger" >Return Book</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
