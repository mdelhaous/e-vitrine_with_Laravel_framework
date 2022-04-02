@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Tous les categories</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/admin/ajouter-category">
                        @csrf
                        <div class="" style="display: flex;align-items: center;">
                            <div class="col-12 col-md-9">
                                <div class="form-group">
                                    <label for="name">Nom de categorie</label>
                                    <input required type="text" class="form-control" name="name" id="name" placeholder="Nom de categorie">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">
                                    {{ $category->id }}
                                </th>
                                <td>{{ $category->name }} </td>
                                <td class="actions">
                                    <a class="text-danger" href="/admin/supprimer-category/{{$category->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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