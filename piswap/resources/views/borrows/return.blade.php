<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Return Book')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Return Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Return book from reader.
  </span>
  <h2>Information about borrowing</h2>
  @if ($errors->any())
  <div class="alert alert-danger col-md-8">
    <h4>These errors were found in the form:</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif
  <form class="form-horizontal" role="form" method="POST" action="{{ route('borrows.store') }}">
  {{ csrf_field() }}
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
    <button type="submit" name="Submit" class="btn btn-primary">Return</button>
  </form>
@endsection
