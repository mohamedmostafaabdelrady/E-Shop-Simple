@extends('admin.layout.admin')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
									 @if(count($errors)>0)
                                        <div class="alret alert-danger col-md-8 col-md-offset-2">
                                         @foreach($errors->all() as $error)
                                            <p >{{$error}}</p>
                                         @endforeach
                                        </div>
                                    @endif
                </div>
            </div>
{{Form::model($category, ['route' => ['categories.update', $category->id],'method'=>'patch'])}}
    <div class="form-group">
    <label class="font-weight-bold" for="name">Category Name</label>
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>
     <input class="btn btn-primary" type="submit" value="Update">
@endsection