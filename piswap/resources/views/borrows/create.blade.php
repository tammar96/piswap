<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

<<<<<<< HEAD
@section('title', 'Borrow')
=======
@section('title', 'Return Book')
>>>>>>> master

@section('sidebar')
    @parent
@endsection

@section('content')
<<<<<<< HEAD
  <h1>Borrow Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Borrow book to reader.
=======
  <h1>Return Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Return book to reader.
>>>>>>> master
  </span>
  <h2>
  </h2>
  <form class="form-horizontal" role="form" method="POST" action="{{ route('borrows.store') }}">
  {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="isbn">ISBN</label>
<<<<<<< HEAD
        <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" value="{{ old('isbn') }}" required>
      </div>
      <div class="form-group col-md-2">
        <label for="reader">Reader ID</label>
        <input type="text" class="form-control" id="reader" placeholder="0000-0000" name="reader" value="{{ old('reader') }}" required>
      </div>
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Borrow</button>
=======
        <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" value="" required>
      </div>
      <div class="form-group col-md-2">
        <label for="reader">Reader ID</label>
        <input type="text" class="form-control" id="reader" placeholder="0000-0000" name="reader" value="" required>
      </div>
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Return</button>
>>>>>>> master
  </form>
@endsection
