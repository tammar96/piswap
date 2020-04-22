

  <h1>Edit User</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    On this page you can edit your personal details.
  </span>
  <h2>Personal Details</h2>
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
  <form id="form2val" class="form-horizontal ajax-form" role="form" method="POST" data-url="{{ route('users.update-someone', $data['user']->email) }}">
  {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$data['user']->name}}"
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[^\s][A-z\s]+$"
         data-bv-regexp-message="The name can consist of alphabetical characters and spaces only">
      </div>
      <div class="form-group col-md-4">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" value="{{$data['user']->surname}}"
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[^\s][A-z\s]+$"
         data-bv-regexp-message="The surname can consist of alphabetical characters and spaces only">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="{{$data['user']->email}}" readonly
        data-bv-emailaddress-message="The value is not a valid email address">
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
          <select id="role" class="form-control" name="role">
          @if (Auth::user()->hasRole('admin'))
            @foreach(array("user", "librarian", "admin") as $role)
              @if( $data['user']->role == $role)
              <option value="{{$role}}" selected>{{$role}}</option>
              @else
              <option value="{{$role}}">{{$role}}</option>
              @endif
            @endforeach
          @else
            <option value="user" selected>user</option>
          @endif
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8 required">
        <label class="control-label" for="address">Street</label>
        <input type="text" class="form-control" id="address" placeholder="Street Address & House number" name="street" value="{{$data['street']}}" required
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[^\s\&][A-z0-9\s\/\-]+$"
         data-bv-regexp-message="The street can consist of alphabetical characters, spaces, backslash and dash only">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4 required">
        <label class="control-label" for="city">City</label>
        <input type="text" class="form-control" id="city" placeholder="City" name="city" required="required" value="{{$data['city']}}"
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[^\s\&][A-z\s\&]+$"
         data-bv-regexp-message="The city can consist alphanumerical characters and spaces only">
      </div>
      <div class="form-group required col-md-2">
        <label class="control-label" for="zipcode">ZIP code</label>
        <input type="text" class="form-control" id="zipcode" placeholder="00000" name="zipcode" required="required" value="{{$data['zipcode']}}"
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[0-9]{5}$"
         data-bv-regexp-message="The zipcode can consist 5 digits only">
      </div>
      <div class="form-group required col-md-2">
        <label class="control-label" for="country">Country</label>
        <input type="text" class="form-control" id="country" placeholder="Czechia" name="country" required="required" value="{{ $data['country'] }}"
        data-bv-regexp="true"
         data-bv-regexp-regexp="^[^\s][A-z\s]+$"
         data-bv-regexp-message="The country can consist alphanumerical characters and spaces only">
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
