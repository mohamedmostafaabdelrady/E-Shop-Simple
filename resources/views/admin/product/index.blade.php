@extends('admin.layout.admin')

@section('content')
  <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Show products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>products List</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>product Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                         <tr>
                                            
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>
                                            <a href="/products/{{$product->id}}/edit" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product], 'onsubmit' => 'return confirmDelete()']) !!}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-times">Delete</i>
                                                </button>
                                               {!! Form::close() !!}      
                                            </td>
                                         </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
<script type="text/javascript">
           function confirmDelete() {
                return confirm('Are you sure you want to delete?');
            }
       </script>
@endsection