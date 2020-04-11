<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Add Book')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Add Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Add book to database.
  </span>
  <h2>
  </h2>
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" placeholder="Name Surname" value="" name="author" required>
      </div>
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" value="" name="title" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="publisher">Publisher</label>
        <input type="text" class="form-control" id="publisher" placeholder="Publisher" value="" name="publisher" required>
      </div>
      <div class="form-group col-md-2">
        <label for="date">Date</label>
        <input type="text" class="form-control" id="date" placeholder="DD-MM-YYYY" value="" name="date" required>
      </div>
      <div class="form-group col-md-2">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" id="pages" placeholder="0" value="" name="pages" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" placeholder="4" value="" name="quantity" required>
      </div>
      <div class="form-group col-md-1">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" placeholder="rack 1" name="location" value="" required>
      </div>
      <div class="form-group col-md-2">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" placeholder="rack 1" name="isbn" value="" required>
      </div>
      <div class="form-group col-md-2">
        <label for="language">Language</label>
        <select id="language" class="form-control" name="language">
          <option value="EN" selected>English</option>
          <option value="CZ">Czech</option>
          <option value="SK">Slovak</option>
          <option value="HU">Hungarian</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="bond">Bond</label>
        <select id="bond" class="form-control" name="bond">
          <option value="Hardcover" selected>Hardcover</option>
          <option value="Paperback">Paperback</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="genre">Genre</label>
        <input type="text" class="form-control" id="genre" placeholder="Sci-fi" name="genre" value="" required>
      </div>
      <div class="form-group col-md-2">
        <label for="department">Department</label>
        <input type="text" class="form-control" id="department" placeholder="dep no.1" name="department" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="5"></textarea>
      </div>
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Save</button>
  </form>
@endsection