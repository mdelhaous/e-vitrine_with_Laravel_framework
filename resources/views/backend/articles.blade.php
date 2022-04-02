@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Tous les produits</h4>
                </div>
                <div class="panel-body">
                    <div class="" style="justify-content: space-between;display: flex;">
                        <div class="col-12 col-md-3">
                            <h4>
                                Trier par:
                                @if($sort != "id")
                                <a href="/admin/produits?page={{$produits->currentPage()}}&sort=id">ID</a>
                                @else
                                <a href="/admin/produits?page={{$produits->currentPage()}}&sort=views">Views</a>
                                @endif
                            </h4>
                        </div>

                        <div class="col-12 col-md-3">
                            <a href="/admin/ajouter-produit" class="btn btn-block btn-primary">
                                Ajouter un produit
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Views</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <th scope="row">
                                    {{ $produit->id }}
                                    <!-- <img src="/storage/{{ $produit->image }}" style="width: 40px; height: 40px; border-radius: 50%;"> -->
                                </th>
                                <td>{{ $produit->name }} </td>
                                <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$produit->description}}</td>
                                <td>{{ $produit->price }}</td>
                                <td>{{ $produit->views }}</td>
                                <td class="actions">
                                    <a href="/admin/modifier-produit/{{$produit->id}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="text-danger" href="/admin/supprimer-produit/{{$produit->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{$produits->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .actions {
        text-align: center;
    }
    .actions i {
        font-size: 24px;
    }
</style>
@endsection