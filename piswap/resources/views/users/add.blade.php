<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Add User')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Add User</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    On this page you can edit your personal details.
  </span>
  <h2>Personal Details</h2>
  <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
  {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
      </div>
      <div class="form-group col-md-4">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      <div class="form-group col-md-4">
        <label for="password-confirm">Verify Password</label>
        <input type="password" class="form-control" id="password-confirm" placeholder="Password" name="password_confirmation">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">

      </div>
      <label for="role">Role</label>
        <select id="role" class="form-control" name="role">
          @if (Auth::user()->hasRole('admin'))
            @foreach(array("user", "librarian", "admin") as $role)
              <option value="{{$role}}">{{$role}}</option>
            @endforeach
          @elseif (Auth::user()->hasRole('librarian'))
            <option value="user" selected>user</option>
          @endif
        </select>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Street Address & House number" name="street" value="" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4 required">
        <label class="control-label" for="city">City</label>
        <input type="text" class="form-control" id="city" placeholder="City" name="city" required="required" value="">
      </div>
      <div class="form-group required col-md-2">
        <label class="control-label" for="zipcode">ZIP code</label>
        <input type="text" class="form-control" id="zipcode" placeholder="000 00" name="zipcode" required="required" value="">
      </div>
    </div>
    All items with <span style="color: #d00;position: relative; margin-left: 4px; top: -6px;">*</span> are mandatory.
    <br>
    <br>
    <button type="submit" name="Submit" class="btn btn-primary">Save</button>
  </form>
  </div>
@endsection
