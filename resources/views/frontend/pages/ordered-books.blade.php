@extends('frontend.layout.app')
@section('content')

<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-8 p-1">
            <div class="profile-tab border p-2">
              <h3 class="">My Ordered Books</h3>
              <hr>
              <div>

              <div class="row">

                <div class="col-md-4">
                  <div class="single-book">
                    <img src="{{asset('front_assets/images/books/book.jpg')}}" alt="">
                    <div class="book-short-info">
                      <h5>Java Programming</h5>
                      <p>
                        <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                      </p>
                      <a href="{{url('books/single')}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>
                      <a href="" class="btn btn-outline-warning"><i class="fa fa-times"></i> Cancel</a>

                    </div>
                  </div>
                </div> <!-- Single Book Item -->
                <div class="col-md-4">
                  <div class="single-book">
                    <img src="{{asset('front_assets/images/books/book2.jpg')}}" alt="">
                    <div class="book-short-info">
                      <h5>C Programming</h5>
                      <p>
                        <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                      </p>
                      <a href="{{url('books/single')}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>
                      <a href="" class="btn btn-outline-warning"><i class="fa fa-times"></i> Cancel</a>

                    </div>
                  </div>
                </div> <!-- Single Book Item -->

                <div class="col-md-4">
                  <div class="single-book">
                    <img src="{{asset('front_assets/images/books/book1.jpg')}}" alt="">
                    <div class="book-short-info">
                      <h5>C++ Programming</h5>
                      <p>
                        <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                      </p>
                      <a href="{{url('books/single')}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>
                      <a href="" class="btn btn-outline-warning"><i class="fa fa-times"></i> Cancel</a>
                    </div>
                  </div>
                </div> <!-- Single Book Item -->
                <div class="col-md-4">
                  <div class="single-book">
                    <img src="{{asset('front_assets/images/books/book3.jpg')}}" alt="">
                    <div class="book-short-info">
                      <h5>Java Programming</h5>
                      <p>
                        <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                      </p>
                      <a href="{{url('books/single')}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>
                      <a href="" class="btn btn-outline-warning"><i class="fa fa-times"></i> Cancel</a>

                    </div>
                  </div>
                </div> <!-- Single Book Item -->
                <div class="col-md-4">
                  <div class="single-book">
                    <img src="{{asset('front_assets/images/books/book4.jpg')}}" alt="">
                    <div class="book-short-info">
                      <h5>Java Programming</h5>
                      <p>
                        <a href="" class=""><i class="fa fa-upload"></i> Polash Rana</a>
                      </p>
                      <a href="{{url('books/single')}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>
                      <a href="" class="btn btn-outline-warning"><i class="fa fa-times"></i> Cancel</a>

                    </div>
                  </div>
                </div> <!-- Single Book Item -->


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
