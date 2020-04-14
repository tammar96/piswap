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
  <form class="form-horizontal" role="form" method="POST" action="{{ route('borrows.store') }}">
  {{ csrf_field() }}
    <div class="form-row">

      <div class="form-group col-md-2">
        <label for="isbn">ISBN</label>
        <select id="isbn" class="selectpicker form-control" name="isbn">
            @foreach($data['books'] as $book)
                <option value="{{$book->isbn}}" > {{$book->isbn}} </option>
            @endforeach
        </select>
      </div>

      <div class="form-group col-md-2">
        <label for="reader">Reader ID</label>
        <select id="reader" class="selectpicker form-control" name="reader">
            @foreach($data['users'] as $user)
                <option value="{{$user->email}}" > {{$user->email}} </option>
            @endforeach
        </select>
      </div>

    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Borrow</button>
  </form>
@endsection
