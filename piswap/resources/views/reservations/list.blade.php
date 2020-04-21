
  <h1>List of all Reservations</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can check and delete reservations
  </span>
  <br>
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
  <h2>List of Reservations</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_summer form-control" onkeyup="admin.filter('summer', 0, 2)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_summer table-hover">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>User</th>
          <th>Valid until</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['reservations'] as $key)
        <tr>
          <td>{{ $key->book_isbn }}</td>
          <td>{{ $key->user_email }}</td>
          <td>{{ $key->date }}</td>
          <td>
          <form class="form-horizontal ajax-form" role="form" method="POST" data-url="{{route('reservations.approve', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning" >Approve Reservation</button>
            </form>
            <form class="form-horizontal ajax-form" role="form" method="POST" data-url="{{route('reservations.destroy', $key->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger" >Delete Reservation</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
