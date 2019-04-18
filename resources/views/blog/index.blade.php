@extends('blog.master')
@section('body')

<section class="ann">
  <div class="container">



    @if(count($categories))

    <div class="row">
      <!-- ***** Left List ***** -->
      <div class="col-md-3 col-sm-12" style="height: 500px;">

    <h3> Categories</h3>


        <div class=" list">
          <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">


              <a class="catsubmenu" href="{{url('category/'.$category->id)}}">
                {{$category->name}}

              </a>
              <span class="badge badge-primary badge-pill">{{$category->posts()->count()}}</span>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <!-- ***** Best Selling list ***** -->
      <div class="col-md-9 col-sm-12">                

         <!-- Best Selling End -->
        <div class="">

             <h4>All Posts</h4> 
          <div class="row" >
            @foreach ($posts as $post)

            <div class="col-md-4">
          
            <div class="card">
              <a href="{{route('blog.show',$post->id)}}" style="color: #000;">
              <div class="card-body">
                <h5 style="font-weight: bold;" class="card-title">{{$post->title}}</h5>
                <p style="background-color: #ff8700;" class="card-subtitle mb-2  px-1 text-light d-inline">{{$post->category->name}}</p>
                <p style="height: 65px;overflow: hidden;" class="card-text">{{str_limit($post->description,60)}}</p>
                
              </div>
              </a>
            </div>

            </div>

            @endforeach

          </div>
        </div>
      </div>

      </div>

      @else

      <div style="height: 500px;">
        
      
      <h3> There are no posts right now!</h3>
</div>
      @endif

      

      {{ $posts->links() }}



  </div>
</section>











@stop
