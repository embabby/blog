@extends('admin.master')
@section('body')


  <section class="content-header">
    <h1>
      Create Post
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
                  <!-- form start -->
                  {!! Form::open(['route' => 'post.store', 'files' => true]) !!}
                    <div class="box-body">

                      <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" required type="text" name="title" required>
                      </div>

                      <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description">
                      </div>


                      <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                         {!! Form::label('category_id','Category', ['class' => 'control-label']) !!}
                         {!! Form::select('category_id',$categories,null, ['class' => 'form-control', 'id'=>'cat']) !!}
                      </div>
                                       
                     
                    </div><!-- /.box-body -->

                    <input type="hidden" name="image" id="image">


                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  {!! Form::close() !!}
                </div>
      </div>
    </div>

  </section>
@stop

