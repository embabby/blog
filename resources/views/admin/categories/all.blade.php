@extends('admin.master')
@section('body')

<style type="text/css">
  th{
    cursor: default;
  }
</style>
  <section class="content-header">
    <h1>
      All Categories
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
    <div class="box-header">
      <h3 class="box-title"></h3>
    </div><!-- /.box-header -->
  <table class="table table-bordered table-striped" id="categories">
    <thead>
      <tr>
        <th>Name</th>
        <th>Posts Count</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
            <tr>
              <td>{{$category->name}}</td>
              <td>{{$category->posts()->count()}}</td>
             
                <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-xs btn-primary">Edit</a>
                <a href="{{route('category.delete',['id' => $category->id])}}" class="delete btn btn-xs btn-danger">Delete</a>
               </td> 
            </tr>
            
            @endforeach
    </tbody>
  </table>
</div>
      </div>
    </div>
  </section>
@stop


@section('page_scripts')

<script type="text/javascript">
  $('#categories').DataTable({
    "fnDrawCallback": function(oSettings) {
        if ($('#users tr').length < 11) {
            $('.dataTables_paginate').hide();
        }
    },
    "language": {
          "emptyTable": "There are no categories!"
        }
  });
</script>

@stop