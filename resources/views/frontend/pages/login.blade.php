@extends('frontend.layout.app')
@section('content')

<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-8 border p-4">
              @if(session()->has('msg'))
                  <div class="alert alert-{{session()->get('type')}}" role="alert">
                      {{ session()->get('msg') }}
                  </div>
              @endif
            <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
                @csrf
              <h3>Login to your Account</h3>
              <hr>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              <button type="submit" class="btn btn-primary">Login Now</button>
            </form>
          </div>
          <div class="col-md-4 border p-4">
            <h4>Don't have an account  ?</h4>
            <p>
              <a href="{{url('signup')}}" class="btn btn-success btn-lg">Create New Account</a>
            </p>
          </div>
      </div>
    </div>
  </div>

</div>

@endsection
