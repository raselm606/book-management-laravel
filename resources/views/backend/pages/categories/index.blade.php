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
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Parent Category</th>
                                    <th>Description</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Parent Category</th>
                                    <th>Description</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><a href="{{route('category.show',[$category->slug])}}" target="_blank">{{route('category.show',[$category->slug])}}</a></td>
                                    <td>
                                        @if(!is_null($category->parent_category($category->parent_id)))
                                            {{ $category->parent_category($category->parent_id)->name }}
                                            @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->updated_at->diffForHumans()}}</td>
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
                                                <form action="{{route('admin.category.update', [$category->id])}}" method="post" >
                                                @csrf
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="name">Categories name</label>
                                                            <input class="form-control" id="name" type="text" name="name"   value="{{$category->name}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="slug">Categories Link</label>
                                                            <input class="form-control" id="slug" type="text" name="slug"   value="{{$category->slug}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="parent_id">Parent Category</label>
                                                            <select name="parent_id" id="parent_id" class="form-control">
                                                                <option value="">Select a category</option>
                                                                @foreach($parent_category as $parent)
                                                                    <option value="{{$parent->id}}"{{$category->parent_id == $parent->id ? 'selected' : ''}}>{{$parent->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="description">Categories Details</label>
                                                            <textarea  id="description" class="form-control" cols="30" rows="5" name="description">{!! $category->description !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Save Categories</button>
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
                                                <form action="{{route('admin.category.destroy', [$category->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$category->name}}</label> will be deleted !!</h5>
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

    <!-- add Publishyer Modal-->
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
                    <form action="{{route('admin.category.store')}}" method="post" >
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="name">Categories name</label>
                                <input class="form-control" id="name" type="text" name="name"   value="{{old('name')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="slug">Categories URL Text</label>
                                <input class="form-control" id="slug" type="text" name="slug"   value="{{old('slug')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="parent_id">Parent Category</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">Select a category</option>
                                    @foreach($parent_category as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="description">Categories Details</label>
                                <textarea  id="description" class="form-control" cols="30" rows="5" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Categories</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add author Modal-->







@endsection

