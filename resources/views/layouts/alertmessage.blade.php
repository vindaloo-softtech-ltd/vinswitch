@if($response = session('response'))
<div class="alert alert-{{ $response['class'] }} alert-dismissible fade show" role="alert">
    <strong>{{ $response['msg'] }}</strong>
</div>
@endif