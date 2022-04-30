@extends('layouts.master_layout')
@section('title', 'Edit Sucategory')
@section('admin_content')
@section('page_active','active')


<div class="container-fluid ">

<h1>Edit Subcatgegory</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('subcategory.update',$data->id)}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
              <select name="category" class="form-control" id="">

               @foreach ($cats as $cat)
                   <option value="{{$cat->id}}" {{$cat->id==$data->category_id?'selected':''}}>{{$cat->name}}</option>
               @endforeach
              </select>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Subcategory Name</label>
              <input type="text" name="subcategory" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Subcatgory Name" value="{{$data->subcategory_name}}" autocomplete="off" required >
                @error('subcategory')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
       


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection