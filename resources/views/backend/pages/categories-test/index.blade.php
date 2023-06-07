@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Categories</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addcat" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add Categories</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name English</th>
                                    <th>Name Bangla</th>
                                    <th>URL</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name English</th>
                                    <th>Name Bangla</th>
                                    <th>URL</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->category_en}}</td>
                                    <td>{{$category->category_bn}}</td>
                                    <td><a href="{{route('test.category.show',[$category->category_slug])}}" target="_blank">{{route('test.category.show',[$category->category_slug])}}</a></td>


                                    <td>{{($category->updated_at)->diffForHumans() }} </td>
                                    <td>
                                        <a href="#editcat{{$category->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletecat{{$category->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>

                                <!-- edit author Modal-->
                                <div class="modal fade" id="editcat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.test.category.update', [$category->id])}}" method="post" >
                                                @csrf
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="category_en">Categories English</label>
                                                            <input class="form-control" id="category_en" type="text" name="category_en"   value="{{$category->category_en}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="category_bn">Categories Bangla</label>
                                                            <input class="form-control" id="category_bn" type="text" name="category_bn"   value="{{$category->category_bn}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="category_slug">Categories Link</label>
                                                            <input class="form-control" id="category_slug" type="text" name="category_slug"   value="{{$category->category_slug}}">
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Save Category</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add author Modal-->

                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletecat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Categories?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.test.category.destroy', [$category->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$category->category_en}}</label> will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Yes Delete Categories</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete author Modal-->
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- add categorytest Modal-->
    <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.test.category.store')}}" method="post" >
                        @csrf
                        <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-12">
                                    <label class="small mb-1" for="category_en">Categories English</label>
                                    <input class="form-control" id="category_en" type="text" name="category_en"   value="{{old('category_en')}}">
                                </div>
                                <div class="col-md-12">
                                    <label class="small mb-1" for="category_bn">Categories Bangla</label>
                                    <input class="form-control" id="category_bn" type="text" name="category_bn"   value="{{old('category_bn')}}">
                                </div>
                                <div class="col-md-12">
                                    <label class="small mb-1" for="category_slug">Categories Link</label>
                                    <input class="form-control" id="category_slug" type="text" name="category_slug"   value="{{old('category_slug')}}">
                                </div>
                            </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Categories</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add category Modal-->







@endsection

