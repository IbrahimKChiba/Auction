@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row" >
        <div class="col-lg-12 margin-tb" >
                <div class="float-left">
                    <h2 class="text-danger"><strong>Liste de mes offres</strong></h2>
                </div>
        </div>
    </div>

    
      
    <table class="table table-bordered">
    <thead>
      <tr>
        <th width="130px">Nom du produit</th>
        <th  width="130px">Votre offre</th>
        <th width="200px">Propriétaire du produit</th>
        <th >Détails</th>
        <th >Supprimer l'offre</th>
        <th width="130px">Etat</th>
        <th>Paiement</th>
      </tr>
    </thead>
    <tbody>
    @foreach($offers as $offer)
    @if($offer->buyer_id != $offer->product->user_id)

    <tr>
        <td>{{$offer->product->product_name}}</td>
        <td>{{$offer->best_offer}}</td>   
        <td>{{$offer->product->user->name}}</td>
        <td>
        <a class="btn btn-secondary  active" href="/show/{{$offer->product->id}}">Show</a>  
        </td>
        <td>
        @if($offer->state===0)
         <a class="btn btn-secondary  active" href="/deleteoffer/{{$offer->product->id}}" 
        onclick="return confirm('are you sure ?')">Delete</a> 
        @else
        @endif 
        </td> 
        <td>
        @if($offer->state===0)
        <a class="btn btn-danger  active">En cours</a>
        @elseif ($offer->state===1)
        <a class="btn btn-danger  active">Offre acceptée</a>
        @else
        <a class="btn btn-danger  active">Offre refusée</a>
        @endif 
        </td>
        <td>
        @if($offer->state===1)
         <a class="btn btn-danger  active" href="/paiment" >
         Payer</a> 
        @endif 
        </td> 
     </tr>
   
      @endif
    @endforeach

    </tbody>
  </table>
</div>
          


@endsection


