@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-lg-12 margin-tb" >
                <div class="float-left">
                    <h2><strong>Ajouter un nouveau produit</strong></h2>
                </div>
                <div class="float-right" >
                  <a class="btn btn-danger" href="/home">Back</a>
                </div>
        </div>
    </div>
    <br>
    <form action="/store" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <strong>Catégorie du produit</strong>
        <select class="form-control" name="product_category" required>
        <option></option>
        <option>Livres</option>
        <option>Immobiler</option>
        <option>Véhicules</option>
        <option>Pour la Maison et Jardin</option>
        <option>Loisirs et Divertisement</option>
        <option>Informatique et Multimedia</option>
        <option>Habillement</option>
        <option>Autres</option>
        </select>
        </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nom du produit</strong>
                 <input type="text"  maxlength="15" name="product_name" class="form-control" placeholder="Nom du produit" required>
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Code du produit</strong>
                 <input type="text" maxlength="15" name="product_code" class="form-control" placeholder="Code du produit" required>
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Description</strong>
                 <textarea type="text" maxlength="200" class="form-control" name="description" style="height: 150px" placeholder="Description" required>
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
                    <strong>Prix de départ</strong>
                 <input type="number" min="0" name="min_price" class="form-control" placeholder="Votre prix de départ" required>
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