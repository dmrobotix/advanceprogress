@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Dashboard - Edit Post</div>

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
                    <h4>Is this post live? <span class="badge" style="text-transform:capitalize;">{{ $post->publish }}</span></h4>

                    {!! Form::open(['route' => ['blog.update', $post->id], 'method' => 'put', 'id' => 'createform']) !!}

                    <div class="form-group">
                    {!! Form::label('lb-title', 'Title'); !!}
                    {!! Form::text('title', $post->title, ['class' => 'form-control']); !!}
                    </div>
										<div class="form-group">
                    {!! Form::label('lb-author', 'Author'); !!}
                    {!! Form::text('author', $post->author, ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-keywords', 'Keywords (comma delimited)'); !!}
                    {!! Form::text('keywords', $post->keywords, ['class' => 'form-control']); !!}
                    </div>
                    <h4>Associated images</h4>
                    @if (sizeof($files)!=0)
                      @php $count = 0 @endphp
                      <div class="row">
                      @foreach ($files as $file)
                      <div class="col-md-2"><h5><strong>Image [{{$count}}]</strong></h5><img src="{{ url($file) }}" class="img-thumbnail"></div>
                      @php $count++ @endphp
                      @endforeach
                      </div>
                    @else
                      You have not added any images to this post.
                    @endif
                    <div class="form-group">
                    {!! Form::label('lb-body', 'Body'); !!}
                    {!! Form::textarea('body', $post->body, ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summary', 'Short Summary') !!}
                    {!! Form::textarea('summary', $post->summary, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summarycaption', 'Summary Caption') !!}
                    {!! Form::text('summarycaption', $post->summary_caption, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('lb-summaryimage', 'Summary Image URL') !!}
                    {!! Form::text('summaryimage', $post->summary_image, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Update',['class' => 'btn btn-default']) !!}
                    {!! Form::button('Save & Unpublish',['class' => 'btn btn-default','id' => 'savebtn']) !!}
                    <button class="btn btn-default" id="deletebtn" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    {!! Form::close() !!}
                    <br>
                    <div class="well">
                    <h3>Upload images</h3>
                    {!! Form::open(['route' => ['blog.update', $post->id], 'method' => 'put', 'id' => 'createform','files' => 'true']) !!}

                    <div class="form-group">
                    {!! Form::label('lb-files', 'Files') !!}
                    {!! Form::file('image[]', ['class' => 'form-control','multiple']) !!}
                    </div>
                    {!! Form::submit('Upload',['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
