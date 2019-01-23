@extends('admin.layout.admin')

@section('content')

    <h3>Add Category</h3>
                                      @if(count($errors)>0)
                                        <div class="alret alert-danger col-md-8 col-md-offset-2">
                                         @foreach($errors->all() as $error)
                                            <p >{{$error}}</p>
                                         @endforeach
                                        </div>
                                    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>
              {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
              {!! Form::close() !!}
        </div>
    </div>
@endsection