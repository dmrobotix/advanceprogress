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
                    {!! Form::open(['url' => '/blog','id' => 'createform']) !!}
                    <div class="form-group">
                    {!! Form::label('lb-title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-keywords', 'Keywords (comma delimited)') !!}
                    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-body', 'Body'); !!}
                    {!! Form::textarea('body',null,['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summary', 'Short Summary') !!}
                    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summarycaption', 'Summary Caption') !!}
                    {!! Form::text('summarycaption', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summaryimage', 'Summary Image URL') !!}
                    {!! Form::text('summaryimage', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::hidden('author', Auth::user()->name) !!}
                    <h3>Upload images</h3>

                    <div class="form-group">
                    {!! Form::label('lb-files', 'Files') !!}
                    {!! Form::file('image[]', ['class' => 'form-control','multiple']) !!}
                    </div>
                    {!! Form::submit('Publish',['class' => 'btn btn-default']) !!}
                    {!! Form::button('Save',['class' => 'btn btn-default','id' => 'savebtn']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
