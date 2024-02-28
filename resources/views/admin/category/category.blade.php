@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>Category List</h4>
                    <a href="" class="btn btn-primary">Add Category</a>
                    
                </div>
                <div class="card-body">
                   <table class="table table-border table-hover">
                    <tr>
                        <th>Sl</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        
                        <td>
                            @if($category->category_img==null)
                             <img src="data:image/png;base64,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" alt="" width="60px"  height="60px" style="border-radius:50%;">
                            
                       
                            @else
                            <img src="{{ asset('upload/category/') }}/{{ $category->category_img }}" width="60px"  height="60px" style="border-radius: 50%;" alt="">
                            @endif
                            
                        </td>
                        
                            
                      
                        <td>
                            <div class="text-center d-flex align-items-center ">
                                <a href="{{ route('category.edit',$category->id) }}" class="py-2 btn btn-primary"><i class="fa fa-edit"></i></a>

                                &NonBreakingSpace;&NonBreakingSpace;
                                <a href=" {{ route('category.delete',$category->id) }}" class="py-2 btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                       
                    </tr>
                        
                    @endforeach
                   </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
          <div class="px-4 card">
            <div class="card-header"><h4>Add Category</h4></div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-info">{{ session('success') }}</div>
                @endif
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
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
