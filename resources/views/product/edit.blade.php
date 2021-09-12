@extends('layouts.app')
@section('content')

    <div class="container" >
    <div class="row">
        <div class="col-lg-12 margin-tb" >
                <div class="float-left">
                    <h2><strong>Modifier un produit</strong></h2>
                </div>
                <div class="float-right" >
                  <a class="btn btn-danger" href="/home">Back</a>
                </div>
        </div>
    </div>
    <br>
    <form action="/update/{{$product->id}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nom du produit</strong>
                 <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Code du produit</strong>
                 <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea type="text" class="form-control" name="description" style="height: 150px ; text-align:left;" value="Description">
                {{$product->description}} 
                 </textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Image du produit</strong> <br>
                 <input type="file" name="image" >
                </div>
               
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Ancienne image du produit</strong> <br>
                    <img src="/public/products_images/{{$product->image}}" style="width:120px; height:100px;" >                
                    <input type="hidden" name="old_image" value="{{$product->image}}" >

                </div>
               
            </div>
        </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                 <Button type="submit" class="btn btn-primary" >Envoyer</Button>
                </div>
               
            </div>

</form>
    
</div> 

@endsection