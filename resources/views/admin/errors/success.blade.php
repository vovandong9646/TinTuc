@if(session('thanhcong'))
  <div class="alert alert-success">
    <ul>
      <li>{{Session('thanhcong')}}</li>
    </ul>
  </div>
@endif
