<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Profile')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all books</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete books
  </span>
  <h2>Add new book to the inventory</h2>
    <button type="button" onclick="window.location.href='add-book.html'" class="btn btn-success" >Add Book</button>
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
          <th>Title</th>
          <th>Rack</th>
          <th>Languge</th>
          <th>Available pieces</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>a</td>
          <td>a</td>
          <td>ta</td>
          <td>rack 1</td>
          <td>a</td>
          <td>10</td>
          <td>
            <button type="button" onclick="window.location.href='edit-book.html'" class="btn btn-warning" >Edit Book</button>
            <button type="button" onclick="window.location.href='delete-book.html'" class="btn btn-danger" >Delete Book</button>
          </td>
        </tr>
        <tr>
          <td>b</td>
          <td>b</td>
          <td>db</td>
          <td>rack 0</td>
          <td>b</td>
          <td>0</td>
          <td>
            <button type="button" onclick="window.location.href='edit-book.html'" class="btn btn-warning" >Edit Book</button>
            <button type="button" onclick="window.location.href='delete-book.html'" class="btn btn-danger" >Delete Book</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection