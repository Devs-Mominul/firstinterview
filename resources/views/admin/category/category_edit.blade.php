@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="py-5 mx-auto col-lg-8">
            <div class="px-4 py-5 mx-auto card">
              <div class="card-header d-flex align-items-center justify-content-between"><h4>Add Category</h4><a href="{{ route('category') }}" class="btn btn-primary">Add Category</a></div>
              <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-info">{{ session('success') }}</div>
                  @endif
                  <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="category_name" class="form-label">Category Name:</label>
                          <input type="text" name="category_name" id="" class="form-control" placeholder="Add Category">
                          @error('category_name')
                          <span class="text-danger">{{ $message }}</span>
                              
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="category_name" class="form-label">Category Image:</label>
                          <input type="file" name="category_img" id="" class="form-control" placeholder="Add Category">
                          @error('category_img')
                          <span class="text-danger">{{ $message }}</span>
                              
                          @enderror
                      </div>
                      <div class="py-3 mt-3 mb-2">
                          <button type="submit" class="btn btn-primary-hover">Add Category</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
    </div>
</div>
    
@endsection