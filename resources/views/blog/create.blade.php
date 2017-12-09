@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Dashboard - Create New Post</div>

                <div class="panel-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['action' => 'BlogController@store']) !!}
                    {!! Form::token(); !!}
                    <div class="form-group">
                    {!! Form::label('lb-title', 'Title', ['class' => '']); !!}
                    {!! Form::text('title',null,['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-content', 'Body', ['class' => '']); !!}
                    {!! Form::textarea('post',null,['class' => 'form-control']); !!}
                    </div>
                    {!! Form::hidden('author', Auth::user()->name) !!}
                    {!! Form::submit('Submit',['class' => 'btn btn-default']); !!}
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
