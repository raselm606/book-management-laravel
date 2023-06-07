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
            <form action="{{route('signup')}}" method="post" enctype="multipart/form-data">
                @csrf
              <h3>Create New Account</h3>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname')}}"  placeholder="Enter full name">
                        @error('fullname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                  </div>
                </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" class="form-control" id="phone" name="phone"   value="{{old('phone')}}"  placeholder="Ex: 01600011122">
                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="username">
                          @error('username')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="address">Address</label>
                          <textarea class="form-control" id="address" name="address" id="" cols="3" rows="1">{{old('address')}}</textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
                      @error('email')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      @error('password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                      @error('cpassword')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                </div>
              </div>

              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agree" name="agree">
                <label class="form-check-label" for="agree">I agree terms & conditions</label>
                  @error('agree')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Register Now</button>
            </form>
          </div>
          <div class="col-md-4 border p-4">
            <h4>Already have an account  ?</h4>
            <p>
              <a href="{{url('login')}}" class="btn btn-primary btn-lg">Login Now</a>
            </p>
          </div>
      </div>
    </div>
  </div>

</div>
@endsection
