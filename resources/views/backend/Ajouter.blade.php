@extends('layout.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Ajouter produit</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/admin/ajouter-article" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="padding: 0px 20px">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Nom de produit</label>
                                    <input required type="text" class="form-control" name="name" id="name" placeholder="Nom de produit">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description de produit</label>
                                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Description de produit"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="price">Prix de produit</label>
                                    <input required type="number" class="form-control" name="price" id="price" placeholder="Prix de produit">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="category_id">Categorie de produit</label>
                                    <select placeholder="Categorie de produit" name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Image de produit</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-3">
                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                            <div class="col-12 col-sm-3">
                                <button type="reset" class="btn btn-danger btn-block">Réinitialiser</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection