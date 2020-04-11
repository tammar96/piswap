<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Borrow')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Borrow Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Borrow book to reader.
  </span>
  <h2>
  </h2>
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" value="" required>
      </div>
      <div class="form-group col-md-2">
        <label for="reader">Reader ID</label>
        <input type="text" class="form-control" id="reader" placeholder="0000-0000" name="reader" value="" required>
      </div>
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Borrow</button>
  </form>
@endsection
