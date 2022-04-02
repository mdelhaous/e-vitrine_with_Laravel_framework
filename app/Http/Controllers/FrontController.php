<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(Request $request)
    {
        $toparticles = Article::orderBy("views", 'desc')->limit(4)->get();
        $sort = $request->has('sort') ? $request->input('sort') : "id";
        $type = $request->has('type') ? $request->input('type') : "desc";
        if (
            $request->has('category') &&
            $request->input('category') != 0
        ) {
            $category_id = $request->input('category');
            $articles = Article::orderBy($sort, $type)->where('category_id', $request->input('category'))->simplePaginate(8);
        } else {
            $category_id = 0;
            $articles = Article::orderBy($sort, $type)->simplePaginate(8);
        }
        return view('frontend.home', ["articles" => $articles, "poparticles" => $toparticles, "sort" => $sort, "categorys" => Category::all(), "category_id" => $category_id]);
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        $category = Category::findOrFail($article->category_id);
        $article->increment('views', 1);

        return view('frontend.article', ["article" => $article, "category" => $category]);
    }
}

