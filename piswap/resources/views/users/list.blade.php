
  <h1>List of all Users</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete users.
  </span>
  <h2>Add new User to the IS</h2>
    <a data-url="/users/create" class="btn btn-success ajax-route" >Add User</a>
  <br>
  <br>

  <h2>List of Users</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_users form-control" onkeyup="admin.filter('users', 0, 1)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_users table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Surname</th>
          <th>No. current rentals</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data['users'] as $key)
        <tr>
          <td>{{ $key->name }}</td>
          <td>{{ $key->surname }}</td>
          <td>{{ $data['borrows'][$key->email] ?? 'No rentals' }}</td>
          <td>
            <form class="form-horizontal ajax-form" role="form" method="POST" data-url="{{ route('users.destroy', $key->email) }}">
              {{method_field('DELETE')}}
              {{ csrf_field() }}
              @if (Auth::user()->hasRole('admin') || (Auth::user()->role == 'librarian' && $key->role != 'admin'))
              <a data-url="/users/{{ $key->email }}/edit" class="btn btn-warning ajax-route" >Edit User</a>
              <button type="submit" class="btn btn-danger" >Delete User</button>
              @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
