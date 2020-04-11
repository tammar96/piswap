<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Userlist')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>List of all Users</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Here you can add, edit and delete users.
  </span>
  <h2>Add new User to the IS</h2>
    <button type="button" onclick="window.location.href='add-user.html'" class="btn btn-success" >Add User</button>
  <br>
  <br>

  <h2>List of Users</h2>
  <div class="table-responsive">
    <div class="form-group float-lg-right col-md-3" style="margin-top:5px;">
      <input type="text" class="search_users form-control" onkeyup="myFunction('users', 0, 1)" placeholder="What you looking for?">
    </div>
    <table class="table table-striped results_users table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Registered from</th>
          <th>No. current rentals</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>0</td>
          <td>Ivan Hubka</td>
          <td>31.07.1800</td>
          <td>1</td>
          <td>
            <button type="button" onclick="window.location.href='edit-user.html'" class="btn btn-warning" >Edit user</button>
            <button type="button" onclick="window.location.href='delete-user.html'" class="btn btn-danger" >Delete user</button>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Anton Gaborsky</td>
          <td>21.04.1900</td>
          <td>0</td>
          <td>
            <button type="button" onclick="window.location.href='edit-user.html'" class="btn btn-warning" >Edit user</button>
            <button type="button" onclick="window.location.href='delete-user.html'" class="btn btn-danger" >Delete user</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
