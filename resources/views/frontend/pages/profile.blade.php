@extends('frontend.layout.app')
@section('content')
<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-8 p-1">
              @if(session()->has('msg'))
                  <div class="alert alert-{{session()->get('type')}}" role="alert">
                      {{ session()->get('msg') }}
                  </div>
              @endif
            <div class="profile-tab border p-2">
              <h3 class="float-left">{{Auth::user()->name}}</h3>
              <div class="float-right">
                <a href="#profileEditModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
              </div>
              <div class="clearfix"></div>
                <p>{{Auth::user()->phone}}</p>
                <p>{{Auth::user()->email}}</p>
                <p>{{Auth::user()->address}}</p>
              <hr>
              <div>
                <strong>About: </strong>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  <br>
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>


              <!-- Profile Edit Modal -->
              <div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                       <form>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputPassword1">About</label>
                                <textarea class="form-control" rows="5"></textarea>
                              </div>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Information</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-4 p-1">
            <div class="profile-sidebar border">
              <div class="widget">
                <h5 class="mb-2 border-bottom pb-3">
                  <i class="fa fa-user default-user"></i>
                </h5>

                <div class="list-group mt-3">
                  <a href="{{url('profile')}}" class="list-group-item list-group-item-action">
                    Profile
                  </a>
                  <a href="{{url('admin')}}" class="list-group-item list-group-item-action">
                    Dashboard
                  </a>
                  <a href="{{route('order.book')}}" class="list-group-item list-group-item-action">
                    My Ordered Books
                  </a>
                  <a href="{{url('upload')}}" class="list-group-item list-group-item-action">
                    My Requests
                  </a>
                </div>

              </div> <!-- Single Widget -->
            </div>
          </div>
      </div>
    </div>
  </div>

</div>
@endsection
