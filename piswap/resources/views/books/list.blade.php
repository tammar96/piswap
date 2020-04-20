  <h1>List of all books</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete books
  </span>
  <h2>Add new book to the inventory</h2>
    <button type="button" onclick="window.location.href='{{ route('books.create') }}'" class="btn btn-success" >Add Book</button>
  <br>
  <br>

  <h2>List of books</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_summer form-control" onkeyup="admin.filter('summer', 0, 2)" placeholder="What you looking for?">
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
        @foreach($data['books'] as $key)
        <tr>
          <td>{{ $key->isbn }}</td>
          <td>{{ $key->author }}</td>
          <td>{{ $key->title }}</td>
          <td>{{ $key->rack }}</td>
          <td>{{ $key->language }}</td>
          <td>{{ $key->quantity}}</td>
          <td>
            <form class="form-horizontal ajax-form" role="form" method="POST" data-url="{{ route('books.destroy', $key->isbn) }}">
              {{method_field('DELETE')}}
              {{ csrf_field() }}
              <button type="button" onclick="window.location.href='admin/books/{{ $key->isbn }}/edit'" class="btn btn-warning" >Edit Book</button>
              <button type="submit" class="btn btn-danger" >Delete Book</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
