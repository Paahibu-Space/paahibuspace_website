@if (session()->has('error'))
  <div class="alert alert-{{ session('error')['type'] }}">  // Use type for styling
    {{ session('error')['msg'] }}
  </div>
@endif