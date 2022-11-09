@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> Edit Category
                        <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-start">Back</a>
                    </h3>

                </div>

                <div class="card-body">
                      <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                       @csrf
                          @method('Put')
                          <div class="row">

                          <div class="col-md-6 mb-3">
                              <labal>Name</labal>
                              <input type="text" class="form-control" value="{{$category->name}}" name="name">

                              @error('name')  <small class="text-danger"> {{$message}}</small>        @enderror


                          </div>

                          <div class="col-md-6 mb-3">
                              <labal>Slug</labal>
                              <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
                              @error('slug')  <small class="text-danger"> {{$message}}</small>        @enderror

                          </div>

                              <div class="col-md-6 mb-3">
                                  <labal>Description</labal>
                                  <textarea class="form-control" rows="3" name="description">{{$category->description}}</textarea>
                                  @error('description')  <small class="text-danger"> {{$message}}</small>        @enderror

                              </div>

                              <div class="col-md-6 mb-3">
                                  <labal>Image</labal>
                                  <input type="file" class="form-control" name="image">
                                  <img src="{{asset('uploads/category/'.$category->image)}}" width="60px" height="60px">
                                  @error('image')  <small class="text-danger"> {{$message}}</small>     @enderror

                              </div>

                              <div class="col-md-6 mb-3">
                                  <labal>Status</labal>  <br>

                                  <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}}  name="status">
                                  @error('status')  <small class="text-danger"> {{$message}}</small>        @enderror
                              </div>




                              <div class="col-md-12 mb-3">
                                  <labal>Meta_title</labal>
                                  <input type="text" class="form-control" value="{{$category->meta_title}} "  name="meta_title">
                                  @error('meta_title')  <small class="text-danger"> {{$message}}</small>      @enderror

                              </div>

                              <div class="col-md-12 mb-3">
                                  <labal>Meta_keyword</labal>
                                  <textarea  class="form-control" rows="3" name="meta_keyword"> {{$category->meta_keyword}} </textarea>
                              </div>
                              @error('Meta_keyword')  <small class="text-danger"> {{$message}}</small>        @enderror

                              <div class="col-md-12 mb-3">
                                  <labal>Meta_description</labal>
                                  <textarea  class="form-control" rows="3" name="meta_description"> {{$category->meta_description}} </textarea>
                                  @error('meta_description')  <small class="text-danger"> {{$message}}</small>        @enderror

                              </div>

                              <div class="col-md-12 mb-3">
                               <button type="submit" class="btn btn-primary float-end">Update</button>

                              </div>

                          </div>
                      </form>
                </div>

            </div>

        </div>

    </div>

@endsection
