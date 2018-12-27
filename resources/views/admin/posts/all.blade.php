@extends('admin.master')
@section('body')

<style type="text/css">
  th{
    cursor: default;
  }
</style>

  <section class="content-header">
    <h1>
      All Posts
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
  <table class="table table-bordered table-striped" id="posts">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>  
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
            <tr>
              <td>{{$post->title}}</td>
              <td>{{$post->category->name}}</td>            
             
              <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-xs btn-primary">Edit</a>
              <a href="{{route('post.delete',['id' => $post->id])}}" class="delete btn btn-xs btn-danger">Delete</a>
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
  $('#posts').DataTable({
    "fnDrawCallback": function(oSettings) {
        if ($('#users tr').length < 11) {
            $('.dataTables_paginate').hide();
        }
    },
    "language": {
          "emptyTable": "There are no posts!"
        }
  });
</script>

@stop