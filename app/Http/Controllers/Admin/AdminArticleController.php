<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = DB::table('article')->get();
        
        foreach ($articles as $item) {
            $item->picture = url('article')."/".$item->picture;
        }

        return view('article/index',['articles' => $articles]);
    }

    public function addArticle()
    {
        return view('article/form');
    }

    public function store(Request $request)
    {
        $file = $request->file('picture'); 
        $nama_foto = time().'.'.$file->getClientOriginalExtension();
        $tujuan_upload = 'article';
        $file->move($tujuan_upload,$nama_foto);

    	DB::table('article')->insert([
            'id' => Str::uuid(),
    		'title' => $request->title,
    		'category' => $request->category,
    		'description' => $request->description,
            'picture' => $nama_foto,
            'source' => $request->source,
            'author' => $request->author,
        ]);
                
    	return redirect('/admin/article');
    }

    public function editArticle($id)
    {
    	$article = DB::table('article')->where('id',$id)->get();

        return view('article/edit',[
            'article' => $article,
        ]);
    }

    public function update(Request $request)
    {   
        $file = $request->file('picture'); 
        $nama_foto = time().'.'.$file->getClientOriginalExtension();
        $tujuan_upload = 'article';
        $file->move($tujuan_upload,$nama_foto);
        
    	DB::table('article')->where('id',$request->id)->update([
    		'title' => $request->title,
    		'category' => $request->category,
    		'description' => $request->description,
            'picture' => $nama_foto,
            'source' => $request->source,
            'author' => $request->author,
        ]);
                
    	return redirect('/admin/article');
    }

    public function delete($id)
    {
    	DB::table('article')->where('id',$id) ->delete();
    	return redirect('/admin/article');
    }
}