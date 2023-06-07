@if(session()->has('msg'))
    <div class="alert alert-{{session()->get('alert-type')}}" role="alert">
        {{ session()->get('msg') }}
    </div>
@endif
