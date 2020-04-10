<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Profile')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Edit Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Edit book attributes.
  </span>
  <h2>
  </h2>
  @foreach($data['books'] as $key)
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" placeholder="Name Surname" value="{{ $key->author }}" name="author" required>
      </div>
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" value="{{ $key->title }}" name="title" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="publisher">Publisher</label>
        <input type="text" class="form-control" id="publisher" placeholder="Publisher" value="{{ $key->publisher }}" name="publisher" required>
      </div>
      <div class="form-group col-md-2">
        <label for="date">Date</label>
        <input type="text" class="form-control" id="date" placeholder="DD-MM-YYYY" value="{{ $key->date }}" name="date" required>
      </div>
      <div class="form-group col-md-2">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" id="pages" placeholder="0" value="{{ $key->pages }}" name="pages" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" placeholder="4" value="{{ $key->quantity }}" name="quantity" required>
      </div>
      <div class="form-group col-md-1">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" placeholder="rack 1" name="location" value="{{ $key->rack }}" required>
      </div>
      <div class="form-group col-md-2">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" placeholder="rack 1" name="isbn" value="{{ $key->isbn }}" required>
      </div>
      <div class="form-group col-md-2">
        <label for="language">Language</label>
        <select id="language" class="form-control" name="language">
          {{ $languages = ["English", "Czech", "Slovak", "Hungarian", "Finnish"]}}
          @foreach($languages as $language)
            @if( $key->language == "$language")
            <option value="$language" selected>$language</option>
            @else
            <option value="$language">$language</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="bond">Bond</label>
        <select id="bond" class="form-control" name="bond">
          {{ $languages = ["Hardcover", "Paperback", "Slovak", "Hungarian", "Finnish"]}}
          @foreach($languages as $language)
            @if( $key->language == "$language")
            <option value="$language" selected>$language</option>
            @else
            <option value="$language">$language</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="genre">Genre</label>
        <input type="text" class="form-control" id="genre" placeholder="Sci-fi" name="genre" value="{{ $key->genre }}" required>
      </div>
      <div class="form-group col-md-2">
        <label for="department">Department</label>
        <input type="text" class="form-control" id="department" placeholder="dep no.1" name="department" value="{{ $key->department }}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="5">{{ $key->description }}</textarea>
      </div>
    </div>
    <form class="form-horizontal"  method="POST" action="{{ route('books.update', $key->isbn) }}">
      {{method_field('PATCH')}}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger" >Save</button>
    </form>
  </form>
  @endforeach
@endsection
