@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-lg-12 margin-tb" >
                <div class="float-left">
                    <h2><strong>Détails du produit</strong></h2>
                    
                </div>
                <div class="float-right" >
                  <a class="btn btn-danger" href="/home">Back</a>
                </div>
        </div>
    </div>
    <br>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nom du produit</strong> <br>
                    {{$product->product_name}}
                </div>
               
            </div>
 
        
   <div class="col-xs-6 col-sm-6 col-md-6"> 

            <form action="/show/{{$product->id}}/offer" method="POST">
            @csrf
            @if($product->state_show===0)

                    <div class="form-group">
                        <h5><strong>Faire une offre</strong></h5>
                    <input type="text" name="best_offer" class="form-control" placeholder="Votre offre en Dinars">
                    <input type="hidden" name="user_id" value="{{$product->user_id}}">
                    </div>
                    <div class="float-left" >
                        <Button type="submit" class="btn btn-danger">Votre offre </Button>
                        </div>
                        @else
                        <h5><strong>Offre expirée</strong></h5>
                        @endif

                </div>

            </form>
   
    
 </div>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Code du produit</strong> <br>
                    {{$product->product_code}}
                </div>
               
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            @if($message= Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{$message}}</p>
                    </div>     
            @endif
            @if($message= Session::get('refus'))
                    <div class="alert alert-danger">
                    <p>{{$message}}</p>
                    </div>     
            @endif
            </div>
    </div>
    <br> <br>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description</strong> <br>
                    {{$product->description}}
            </div>               
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <h3><strong>Best Offer</strong></h3>
                    {{$offer->best_offer}} Dinars
                </div>
            </div>
    </div>
    <br>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Image</strong> <br>
                    <img src="/public/products_images/{{$product->image}}" style="width:220px; height:200px;" >
                </div>
               
            </div>
    </div>     
    <br>
    
    <strong>Les commentaires</strong>
    <br>  <br> 
   
    <div class="col-lg-12 margin-tb"> 

    @foreach($product->comments as $com)

    <div class="card-header col-lg-12 margin-tb" > 
    <!--écrit par: <strong>{{ $com->user->name }}</strong>-->
    <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px;">
       {{ $com->user->name  }} 
     <img src="/uploads/avatars/{{ $com->user->avatar }}" style="width:35px; heigt:35px; position:absolute; top:5px; left:10px; border-radius:50%"/>
         </a>
      @if($product->user_id===auth()->user()->id OR $com->user->id===auth()->user()->id)
         <div class="float-right" >
        <a style="width:20px; heigt:20px; position:absolute; top:5%; " href="/show/{{$product->id}}/{{$com->id}}"
        onclick="return confirm('are you sure ?')"><h4>X</h4></a>
        </div>
       @endif  
    </div>

    <!-- -->
        <div class="card-header col-lg-12 margin-tb" >

    <p>{{ $com->body }}</p>
    <br>
    <br>      
    <hr>
    <strong>{{ $com->created_at }}</strong>
    </div>
    @endforeach
    </div>
    <br>
    <form action="/show/{{$product->id}}/comment" method="POST">
        @csrf
    

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="body" placeholder="Votre commentaire ...">
                    </textarea>
                </div>
            </div>
        </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                 <Button type="submit" class="btn btn-danger" >Ajouter un commentaire</Button>
                </div>
               
            </div>

    </form>
</div>
 
@endsection 
