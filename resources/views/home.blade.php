@extends('layouts.master_layout')
@section('title', 'Create Category')
@section('admin_content')


<div class="container">
    @if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show custom"   role="alert">
    {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
    
      <th scope="col">Name</th>
      <th scope="col">Email</th>
   
      <th>Created At</th>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
    
      <td>{{Auth::user()->name}}</td>
      <td>{{Auth::user()->email}}</td>
   
      <td>{{Auth::user()->created_at->diffforhumans()}}</td>
  
  <td>

     
  
         
      </td>
  
    
    </tr>
 
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
