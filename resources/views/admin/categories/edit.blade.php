@extends('admin.master')
@section('body')


  <section class="content-header">
    <h1>
      Edit Category
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
                  <!-- form start -->
                  {!! Form::model($category, ['route' => ['category.update', $category->id], 'files' => true]) !!}

                  {{ method_field('PUT') }}

                    <div class="box-body">

                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" required name="name" value="{{$category->name}}" required>
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
