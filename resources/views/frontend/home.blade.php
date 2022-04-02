@extends('layouts.frontend')
@section('content')

<div class="container-fluid wallpaper">
    <h1>
        E-Vitrine
    </h1>
    <h4>
        Votre première source des meilleurs produits
    </h4>
</div>

<div class="container">
    <h3 class="title text-center">Produits populaires</h3>
    <div class="row">
        @foreach($popProduits as $prod)
        <a href="/produit/{{$prod->id}}" class="not-a">
            <div class="col-md-3 prod">
                <img src="/storage/{{ $prod->image }}" alt="Image" class="img-fluid">
                <h4>
                    <span>
                        {{$prod->name}}
                    </span>
                    <span>
                        {{$prod->price}}MAD
                    </span>
                </h4>
                <p>
                    {{$prod->description ? $prod->description : "Pas de description"}}
                </p>
            </div>
        </a>
        @endforeach

    </div>
</div>


<div class="container" style="margin-bottom: 20px;">
    <h3 class="title text-center">Tous les produits</h3>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="sort">Trier par:</label>
                <select onchange="sortChange()" class="form-control" name="sort" id="sort">
                    <option {{$sort == "id" ? "selected" : ""}} value="id">Date</option>
                    <option {{$sort == "views" ? "selected" : ""}} value="views">Popularité</option>
                    <option {{$sort == "price" ? "selected" : ""}} value="price">Prix</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="type">Type:</label>
                <select onchange="sortChange()" class="form-control" name="type" id="type">
                    <option value="desc">Décroissant</option>
                    <option value="asc">Croissant</option>
                </select>
            </div>
        </div>

        <div class="col-md-2 col-md-offset-6">
            <div class="form-group">
                <label for="type">Categorie:</label>
                <select onchange="categoryChange()" class="form-control" name="category" id="category">
                    <option {{$category_id == 0 ? "selected" : ""}} value="0">Tous</option>
                    @foreach ($categories as $category)
                    <option {{$category_id == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($produits as $prod)
        <a href="/produit/{{$prod->id}}" class="not-a">
            <div class="col-md-3 prod">
                <img src="/storage/app/public/{{ $prod->image }}" alt="Image" class="img-fluid">
                <h4>
                    <span>
                        {{$prod->name}}
                    </span>
                    <span>
                        {{$prod->price}}MAD
                    </span>
                </h4>
                <p>
                    {{$prod->description ? $prod->description : "Pas de description"}}
                </p>
            </div>
        </a>
        @endforeach
    </div>
    {{$produits->links()}}
</div>

<style>
    body {
        background: #efefef;
    }
    .title {
        margin: 20px 0;
    }
    a.not-a {
        color: inherit;
    }
    nav {
        text-align: center;
    }
    .wallpaper {
        height: 60vh;
        background: url('/wallpaper.jpg');
        background-size: 100%;
        background-position: 25%;
    }
    .wallpaper h1 {
        text-align: center;
        margin-top: 10%;
        color: #E77613;
        text-transform: uppercase;
    }
    .wallpaper h4 {
        text-align: center;
        color: #b15505;
    }
    .prod {
        background-color: white;
        /* margin-right: 20px; */
        padding-top: 10px;
        cursor: pointer;
        transition: all .5s;
    }
    .prod:hover {
        transform: scale(1.06);
    }
    .prod img {
        width: 100%;
        height: 200px
    }
    .prod p {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .prod h4 {
        display: flex;
        justify-content: space-between;
    }
</style>

<script>
    function getValues() {
        let el = document.getElementById("sort");
        let sort = el.options[el.selectedIndex].value;
        el = document.getElementById("type");
        let type = el.options[el.selectedIndex].value;
        return {
            sort,
            type
        };
    }
    function sortChange() {
        let {
            sort,
            type
        } = getValues();
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category') ? parseInt(urlParams.get('category')) : 0
        window.location.href = `/?sort=${sort}&type=${type}&category=${category}`;
    }
    function categoryChange() {
        let el = document.getElementById("category");
        let category = el.options[el.selectedIndex].value;
        const urlParams = new URLSearchParams(window.location.search);
        let path = `/?category=${category}`;
        if (urlParams.get('sort'))
            path += "&sort=" + urlParams.get('sort');
        if (urlParams.get('type'))
            path += "&type=" + urlParams.get('type');
        window.location.href = path;
    }
</script>

@endsection