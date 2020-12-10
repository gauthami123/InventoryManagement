@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('productlist') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  @if(isset($data['product']))
  <form action="{{ url('update/'.$data['product']->id) }}" method="POST">

@else
<form action="{{ url('create') }}" method="POST">
@endif

  {{ csrf_field() }}
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" value="{{ $data['product']->product_name or old('name') }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="qty" value="{{ $data['product']->quantity or old('qty') }}" class="form-control" placeholder="Quantity">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				   <strong>Product Image:</strong>
                                                    <input id="product_img" type="file" class="form-control" name="product_img">
                                                    @if (auth()->user()->image)
                                                        <code>{{ auth()->user()->image }}</code>
                                                    @endif
                                                </div>
                                            </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				  <strong>Category:</strong>
				<select class="form-control m-bot15" name="category">
				@foreach($data['categorylist'] as $category)
				
					<option value="{{$category->id}}" >{{$category->category_name}}</option>
					
				@endforeach
					
        </select>
		</div></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection