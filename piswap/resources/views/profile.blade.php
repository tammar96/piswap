<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.test')

@section('title', 'Profile')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Profil</h1>
        <span class=".text-left" style="margin-bottom: 15px; display: block;">
          On this page you can edit your personal details.
        </span>
        <h2>Personal Details</h2>
        <form>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $data['user']->name }}">
            </div>
            <div class="form-group col-md-4">
              <label for="surname">Surname</label>
              <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-7 required">
              <label class="control-label" for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required name="email" value="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Verify Password</label>
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="heslo_potvrd">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-7 required">
              <label class="control-label" for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="Street Address & House number" name="address" value="" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 required">
              <label class="control-label" for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity" placeholder="City" name="city" required="required" value="">
            </div>
            <div class="form-group required col-md-3">
              <label class="control-label" for="inputZip">ZIP code</label>
              <input type="text" class="form-control" id="inputZip" placeholder="000 00" name="zipcode" required="required" value="">
            </div>
          </div>
          All items with <span style="color: #d00;position: relative; margin-left: 4px; top: -6px;">*</span> are mandatory.
          <br>
          <br>
          <button type="submit" name="Submit" class="btn btn-primary">Save</button>
        </form>
@endsection