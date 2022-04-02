@extends('layouts.frontend')
@section('content')


<div class="container" style="margin-top: 50px;background-color: white;padding:20px">
    <div class="row">
        <div class="col-md-6">
            <img src="/storage/{{ $produit->image }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1 style="display: flex;justify-content: space-between;">
                <span>{{$produit->name}}</span>
                <span style="font-size: .7em;">{{$produit->price}}MAD</span>
            </h1>
            <p style="font-size: 1.3em;word-wrap: break-word;">
                {{$produit->description}}
            </p>
            <div style="display: flex;justify-content: space-between;font-size: 1.3em">
                <span>
                    <i class="fa fa-eye"></i> {{$produit->views}}
                </span>

                <a href="/?category={{$category->id}}">
                    {{$category->name}}
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #efefef;
    }
    .img-fluid {
        width: 100%
    }
</style>

<script>
</script>

@endsection