@extends('layouts.general')

@section('content')
@foreach($products as $product)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <h5 class="d-inline-block mb-2 text-danger">{{$product->product_category}}</h5>
            <h3 class="mb-0">{{$product->product_name}}</h3>
            <p class="d-inline-block mb-2 text-secondary">Créé par : <strong class ="d-inline-block mb-2 text-primary">{{$product->user->name}}</strong> </p>
            <div class="mb-1 text-muted">{{$product->created_at}}</div><br>
            <a href="/show/{{$product->id}}" class="stretched-link btn btn-dark ">voir les détails</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            <img src="/public/products_images/{{$product->image}}"  style="width:220px; height:200px;" >
            </div>
        </div>
        </div>
    @endforeach
@endsection