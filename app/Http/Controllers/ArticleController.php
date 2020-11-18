<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ArticleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function list(){
    $article = Article::all();
    foreach ($article as $item) {
      $item->picture = url('article')."/".$item->picture;
    }
    
    return response()->json([
      'articles' => $article, 
      'message' => 'SUCCESS'
    ], 200);
  }

  public function detail($id) {
    $article = Article::where('id', $id)->first();
    $article->picture = url('article')."/".$article->picture;

    return response()->json([
      'article' => $article,
      'message' => 'SUCCESS'
    ], 200);
  }
}
