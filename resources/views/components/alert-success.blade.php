@if (session('message'))
<div class="alert alert-success" role="alert">
    {{$slot}}
  </div>
    
@endif