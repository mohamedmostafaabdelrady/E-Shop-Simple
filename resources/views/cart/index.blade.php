@extends('layout.main')
@section('content')
  <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cart Items</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <div class="panel panel-default col-md-10">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>size</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $cartItem)
                                         <tr>
                                            
                                            <td>{{$cartItem->name}}</td>
                                            <td>{{$cartItem->price}}</td>
                                            <td>{{$cartItem->attributes->size}}</td>
                                            <td>{{$cartItem->quantity}}</td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['cart.destroy', $cartItem->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                                <button type="submit" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times"></i>
                                                </button>
                                               {!! Form::close() !!}      
                                            </td>
                                         </tr>
                                         @endforeach

                                         <tr>
                                            <td></td>
                                            <td>Total Price: ${{Cart::getTotal()}}</td>
                                            <td></td>
                                            <td>Items:{{Cart::getTotalQuantity()}}</td>
                                            <td></td>
                                         </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
        </div>
 </div>
<script type="text/javascript">
           function confirmDelete() {
                return confirm('Are you sure you want to delete?');
            }
       </script>
@endsection