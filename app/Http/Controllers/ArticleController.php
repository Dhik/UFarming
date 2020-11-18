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

    return response()->json([
      'plants' => $article, 
      'message' => 'SUCCESS'
    ], 200);
  }
}
