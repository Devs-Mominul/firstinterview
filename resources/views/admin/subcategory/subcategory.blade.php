@extends('layout.app')
@section('content'),
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Subcategory List</h4></div>
                <div class="card-body">
                    <div class="row">
                        @foreach (App\Category::all() as $category)
                        <div class="col-lg-6">
                            <div class="card">
                                @if(session('success'))
                                <div class="alert alert-info">{{ session('delete') }}</div>
                                @endif
                                <div class="card-header"><h4>{{ $category->category_name }}</h4></div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>Subcategory</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach (App\Subcategory::where('category_id',$category->id)->get() as $sub)
                                        <tr>
                                            <td>{{ $sub->subcategory_name }}</td>
                                            <td><a href="{{ route('subcategory.delete',$sub->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                            
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="px-3 py-3 card">
                <div class="card-header">Add Subcategory</div>
                <div class="card-body">
                    @if(session('success'))
                <div class="alert alert-info">{{ session('success') }}</div>
                @endif
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Subcategory Name:</label>
                            <input type="text" name="subcategory_name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category Name:</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach (App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    
                                @endforeach
                            </select>
                           
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