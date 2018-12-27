@extends('blog.master')
@section('body')

<section class="ann">
  <div class="container">




    <div class="row" style="height: 500px;">
      <!-- ***** Left List ***** -->
      

      <!-- ***** Best Selling list ***** -->
      <div class="col-md-9 col-sm-12">                

         <!-- Best Selling End -->
        <div class="mb-5 p-4 ">

             <h4 class="mb-4">TiTle</h4> 

             <p style="background-color: #ff8700;" class="card-subtitle mb-2  px-1 text-light d-inline">{{$post->category->name}}</p>

             <h6 class="text-secondary">{{$post->description}}</h6> 
             <hr>
             <p class="ml-5">{{$post->content}}</p> 
          <div class="row" >

            <div class="col-md-4">
             


           

            </div>


          </div>
        </div>
      </div>

      </div>

    

      


  </div>
</section>











@stop
