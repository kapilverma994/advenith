@extends('layouts.master_layout')
@section('title', 'Edit Post')
@section('admin_content')
@section('page_active','active')

<div class="container-fluid ">

<h1>Post</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="form-group">
              <select name="category" class="form-control" id="">

                <option value=""> Choose Category</option>
                @foreach($cats as $cat)
                <option value="{{$cat->id}}" {{$cat->id==$post->category_id?'selected':''}}> {{$cat->name}}</option>

                @endforeach
              </select>

            </div>
    <div class="form-group">
              <select name="subcategory" class="form-control" id="">

                <option value=""> Choose Subcategory</option>
              
              </select>

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" aria-describedby="emailHelp"
                placeholder="Enter Title" autocomplete="off" required >
                @error('title')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$post->description}}</textarea>
           
                @error('description')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                autocomplete="off"  >
                @error('image')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
            <div class="form-group">
<img src="{{url('public/uploads/post/'.$post->image)}}" alt="{{$post->image}}">
            </div>
         
        


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>




@endsection
@push('scripts')
 <script type="text/javascript">
      $(document).ready(function() {
        console.log('helo');
        $('select[name="category"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory"]').html('');
                       var d =$('select[name="subcategory"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
    
@endpush