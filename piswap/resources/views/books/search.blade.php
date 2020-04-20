  <h1>Search</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can search for books, that we can provide.
  </span>
  <div class="flex-row">
    <form>
      <div class="form-row">
        <div class="form-group col-md-10">
          <input type="text" class="form-control" id="searchbar" placeholder="Oliver Twist" name="lookingfor">
        </div>
        <div class="form-group col-md-1">
          <button type="submit" name="Submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
  </div>
  <!-- <div class="table-responsive" style="display: none;"> -->
  @if(count($data) != 0)
  <div class="table-responsive">
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
            <form class="form-horizontal ajax-form" role="form" method="POST" data-url=="{{ route('books.reserve', $key->isbn) }}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="button" onclick="window.location.href='/admin/books/{{ $key->isbn }}/reserve'" class="btn btn-secondary" >Reserve Book</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
