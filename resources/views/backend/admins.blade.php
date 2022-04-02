@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Tous les admins</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/admin/ajouter-admin">
                        @csrf
                        <div class="" style="display: flex;align-items: center;">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input required type="text" class="form-control" name="name" id="name" placeholder="Nom de admin">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input required type="email" class="form-control" name="email" id="email" placeholder="Email de admin">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input required type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
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
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <th scope="row">
                                    {{ $admin->id }}
                                </th>
                                <td>{{ $admin->name }} </td>
                                <td>{{ $admin->email }} </td>
                                <td class="actions">
                                    <a class="text-danger" href="/admin/supprimer-admin/{{$admin->id}}">
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
© 2022 GitHub, Inc.
Terms
Privacy
Security
