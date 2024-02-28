@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Add Product</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category_id" id="category_change" class="form-control">
                                            @foreach (App\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                             
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Sub Category</label>
                                        <select name="subcategory_id" id="subcategory" class="form-control">
                                            @foreach (App\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                
                               </div>
                        </div>
                      
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@push('script')


<script>
   $(document).ready(function(){
    $('#category_change').change(function(){
        var $category_id=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/GetCategory',
            data:{'category_id':$category_id},
            success:function(data){
                $('#subcategory').html(data);
            }
        })
    })
   })
</script>
    
@endpush