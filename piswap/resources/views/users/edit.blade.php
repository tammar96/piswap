<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Edit User')

@section('sidebar')
    @parent
@endsection

@section('content')
  <h1>Edit User</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    On this page you can edit your personal details.
  </span>
  <h2>Personal Details</h2>
  <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update-someone', $data['user']->email) }}">
  {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$data['user']->name}}">
      </div>
      <div class="form-group col-md-4">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" value="{{$data['user']->surname}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="{{$data['user']->email}}" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="">
      </div>
      <div class="form-group col-md-4">
        <label for="password2">Verify Password</label>
        <input type="password" class="form-control" id="password2" placeholder="Password" name="password_confirmation" value="">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
      <label for="role">Role</label>
        <select id="role" class="form-control" name="role" value="{{$data['user']->role}}">
          @if (Auth::user()->hasRole('admin'))
            @foreach(array("user", "librarian", "admin") as $role)
              @if( $data['user']->role == $role)
              <option value="{{$role}}" selected>{{$role}}</option>
              @else
              <option value="{{$role}}">{{$role}}</option>
              @endif
            @endforeach
          @elseif (Auth::user()->hasRole('librarian'))
            <option value="user" selected>user</option>
        </select>
        @elseif
        <select id="role" class="form-control" name="role">
          <option value="{{ $data['data']->role }}" selected>{{ $data['data']->role }}</option>
        </select>
        @endif
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Street Address & House number" name="street" value="{{$data['street']}}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4 required">
        <label class="control-label" for="city">City</label>
        <input type="text" class="form-control" id="city" placeholder="City" name="city" required="required" value="{{$data['city']}}">
      </div>
      <div class="form-group required col-md-2">
        <label class="control-label" for="zipcode">ZIP code</label>
        <input type="text" class="form-control" id="zipcode" placeholder="000 00" name="zipcode" required="required" value="{{$data['zipcode']}}">
      </div>
      <div class="form-group required col-md-2">
        <label class="control-label" for="country">Country</label>
        <input type="text" class="form-control" id="country" placeholder="000 00" name="country" required="required" value="{{ $data['country'] }}">
      </div>
    </div>
    All items with <span style="color: #d00;position: relative; margin-left: 4px; top: -6px;">*</span> are mandatory.
    <br>
    <br>
      {{method_field('POST')}}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger" >Save</button>
    </form>
  </form>
  </div>
@endsection
