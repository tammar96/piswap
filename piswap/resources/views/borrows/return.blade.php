  <h1>Return Book</h1>
  <span class=".text-left" style="margin-bottom: 15px; display: block;">
    Late return on this books was identified. Please ask for payment.
  </span>
  <h2>
  </h2>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="isbn">User</label>
        <p>{{ $borrow->user_email }}</p>
      </div>
      <br>
      <div class="form-group col-md-2">
        <label for="reader">Fine</label>
        <p>{{ $fine }},- &euro;</p>
      </div>
    </div>
    <form class="form-horizontal ajax-form" role="form" method="POST" data-url="{{route('borrows.destroy', $borrow->id)}}">
              {{method_field('POST')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning" >Paid</button>
            </form>
  </form>
