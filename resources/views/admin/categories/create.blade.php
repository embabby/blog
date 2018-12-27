@extends('admin.master')
@section('body')

  <section class="content-header">
    <h1>
      Create Category
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
                  <!-- form start -->
                  {!! Form::open(['route' => 'category.store', 'files' => true]) !!}
                    <div class="box-body">

                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" required type="text" name="name" required>
                      </div>
                                                                                                    
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  {!! Form::close() !!}
                </div>
      </div>
    </div>
  </section>
@stop

