@extends('frontend.layout.app')
@section('content')

<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-12 border p-4">
            <form>
              <h3>Upload New Book</h3>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Book Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Book Title">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="author">Book Author</label>
                    <select name="author" id="author" class="form-control select2-author">
                      <option value="">Please select an author</option>
                      <option value="">Humayun Ahmed</option>
                      <option value="">Jafor Ikbal</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">Book Category</label>
                    <select name="category" id="category" class="form-control select2-category">
                      <option value="">Please select a category</option>
                      <option value="">Category 1</option>
                      <option value="">Category 2</option>
                      <option value="">Category 3</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="publication">Publication Year</label>
                    <select name="publication" id="publication" class="form-control select2-publication">
                      <option value="">Please select a publication year</option>
                      <option value="">2019</option>
                      <option value="">2018</option>
                      <option value="">2017</option>
                      <option value="">2016</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="isbn">Book ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="publisher">Book Publisher</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Enter Book Publisher">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="edition">Book Edition</label>
                    <input type="text" class="form-control" name="edition" id="edition" placeholder="Enter Book Edition">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="price">Book Price
                      <span class="text-info text-sm">(if want to sell)</span>
                    </label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Book Price" min="0">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="description">Book Details
                    </label>
                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="description">Book Image
                    </label>
                    <input type="file" name="image" id="image" class="form-control dropify" data-height="140" data-allowed-file-extensions="png jpg jpeg gif" data-max-file-size-preview="1M">
                  </div>
                </div>
              </div>


              <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload Book Now</button>
            </form>
          </div>

      </div>
    </div>
  </div>

</div>

@endsection
