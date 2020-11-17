<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminPlantController extends Controller
{
    public function index()
    {
        $plants = DB::table('plant')->get();
        
        foreach ($plants as $item) {
            $item->picture = url('plant')."/".$item->picture;
        }

        return view('plant/index',['plants' => $plants]);
    }

    public function addPlant()
    {
        $category = DB::table('category')->get();
        $type = DB::table('type')->get();

        return view('plant/form',[
            'category' => $category,
            'type'  => $type
        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('picture'); 
        $nama_foto = time().'.'.$file->getClientOriginalExtension();
        $tujuan_upload = 'plant';
        $file->move($tujuan_upload,$nama_foto);

    	DB::table('plant')->insert([
            'id' => Str::uuid(),
    		'plant_name' => $request->plant_name,
    		'summary' => $request->summary,
    		'growing' => $request->growing,
            'harvesting' => $request->harvesting,
            'picture' => $nama_foto,
            'difficulty' => $request->difficulty,
            'category_id' => $request->category,
            'type_id' => $request->type,
            'stages' => $request->stages,
            'total_days' => $request->total_days,
            'success_rate' => $request->success_rate
    	]);
        
    	return redirect('/admin/plant');
    }

    public function editPlant($id)
    {
    	$plant = DB::table('plant')->where('id',$id)->get();
        $category = DB::table('category')->get();
        $type = DB::table('type')->get();

        return view('plant/edit',[
            'plant' => $plant,
            'category' => $category,
            'type'  => $type
        ]);
    }

    public function update(Request $request)
    {   
        // $file = $request->file('picture'); 
        // $nama_foto = time().'.'.$file->getClientOriginalExtension();
        // $tujuan_upload = 'plant';
        // $file->move($tujuan_upload,$nama_foto);

    	DB::table('plant')->where('id',$request->id)->update([
    		'plant_name' => $request->plant_name,
    		'summary' => $request->summary,
    		'growing' => $request->growing,
            'harvesting' => $request->harvesting,
            // 'picture' => $nama_foto,
            'difficulty' => $request->difficulty,
            'category_id' => $request->category,
            'type_id' => $request->type,
            'stages' => $request->stages,
            'total_days' => $request->total_days,
            'success_rate' => $request->success_rate
    	]);
        
    	return redirect('/admin/plant');
    }

    public function delete($id)
    {
    	DB::table('plant')->where('id',$id) ->delete();
    	return redirect('/admin/plant');
    }
}