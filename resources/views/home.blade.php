@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row" >
        <div class="col-lg-12 margin-tb" >
                <div class="float-left">
                    <h2 class="text-danger"><strong>Liste des produits</strong></h2>
                </div>
                <div class="float-right" >
                  <a class="btn btn-danger" href="{{ route('create.product') }}">Créer un nouveau produit</a>
                </div>
        </div>
    </div>

    @if($message= Session::get('success'))
    <div class="alert alert-success">
    <p>{{$message}}</p>

    </div>



    @endif

    <table class="table table-bordered">
    <thead>
      <tr>
        <th width="80px">Nom du produit</th>
        <th width="150px">Image</th>
        <th  width="230px">Action</th>
        <th >meilleure offre</th>
        <th>Acheteur probable</th>
        <th>Email de l'acheteur</th>
        <th>Réponse</th>
        <th>Vente</th>
      </tr>
    </thead>
    <tbody>

      
    @foreach($products as $product)
 
     <tr>
        <td>{{$product->product_name}}</td>

        <td><img src='/public/products_images/{{($product->image)}}' class="mx-auto d-block" style="width:80px; height:80px;" ></td>
        <td>
        <a class="btn btn-secondary  active" href="/show/{{$product->id}}">Show</a>  
        <a class="btn btn-secondary  active" href="/edit/{{$product->id}}">Edit</a>
        @if($product->state_show===0)
        <a class="btn btn-secondary  active" href="/delete/{{$product->id}}" 
        onclick="return confirm('are you sure ?')">Delete</a> 
        @endif     
        </td>
        <td>
        {{$product->pro_sol}}
        </td>
        <td>
        
       
        @if($product->offers->buyer_id === $product->user_id)
        Votre propre offre 
        @else 
        {{$product->offers->user->name}}


        @endif  
     
       </td>
        <td> {{$product->offers->user->email}}</td>
        <td>
        @if($product->offers->buyer_id===$product->user_id)
                  
        @else 
                  @if($product->offers->state===0)
                  <a class="btn btn-secondary  active" href="/accept/{{$product->offers->id}}">Accepter</a>

                  <br>  <br> 
                  <a class="btn btn-danger  active" href="/refuse/{{$product->offers->id}}">Refuser</a>
                  @elseif ($product->offers->state===1)
                  <a class="btn btn-secondary  active">Offre acceptée</a>
                  @else
                  <a class="btn btn-danger  active" >Offre refusée</a>
                  @endif      

        @endif            
        </td>
        <td>        
        <a class="btn btn-danger  active">En cours</a>
       </td>
      <tr>
    
    @endforeach
    </tbody>
  </table>
</div>
          


@endsection


