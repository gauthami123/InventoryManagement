@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>List Products</h2>
            </div>
        </div>
		@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <a href="create_product">Add</button>
        <div class="row">
            <div class="col-sm-6">
                <table id="productTable" class="table table-bordered table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Action</th>

                    </tr>
					@php
					$i=1;
					@endphp
						@foreach($products as $product)
					
						<tr>
                        <td>{{$i}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_img}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category_id}}</td>
						
                        <td> 
						<a class="btn btn-primary" href="{{ url('edit/'.$product->id) }}">Edit</a>
                        <form action="{{ url('delete/'.$product->id) }}" method="post">
						{{method_field('DELETE')}}
						{{ csrf_field() }}
					 
   <input type="submit" class="btn btn-danger" value="Delete"/>
					</form>
                </div>
				
				@php
				$i++;
					@endphp
						@endforeach
					</tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>



    </table>

@endsection