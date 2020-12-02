<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminMyplantController extends Controller
{
    public function index()
    {
        $myplants = DB::table('my_plant')
        ->select('my_plant.id', 'users.name AS user', 'plant.plant_name', 'progress', 'my_plant.name AS name', 'plant.picture')
        ->join('users', 'users.id', '=', 'my_plant.id_user')
        ->join('plant', 'plant.id', '=', 'my_plant.id_plant')
        ->get();
        
        foreach ($myplants as $item) {
            $item->picture = url('plant')."/".$item->picture;
        }

        return view('myplant/index',['myplants' => $myplants]);
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

        $plantId = Str::uuid();
    	DB::table('plant')->insert([
            'id' => $plantId,
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
        
        DB::table('crop_statistic')->insert([
            'id' => Str::uuid(),
            'id_plant' => $plantId,
            'germ_days_low' => $request->germ_days_low,
            'germ_days_up' =>  $request->germ_days_up, 
            'germ_temperature_low'  => $request->germ_temperature_low,
            'germ_temperature_up'  => $request->germ_temperature_up,
            'growth_days_low' => $request->growth_days_low,
            'growth_days_up' =>$request->growth_days_up,
            'height_low'  => $request->height_low,
            'height_up'  => $request->height_up,
            'ph_low'  => $request->ph_low,
            'ph_up'  => $request->ph_up,
            'spacing_low' => $request->spacing_low,
            'spacing_up' => $request->spacing_up,
            'temperature_low' => $request->temperature_low,
            'temperature_up' => $request->temperature_up,
            'width_low' => $request->width_low,
            'width_up' => $request->width_up,
    	]);
        
    	return redirect('/admin/plant');
    }

    public function editPlant($id)
    {
    	$plant = DB::table('plant')->where('id',$id)->get();
        $category = DB::table('category')->get();
        $type = DB::table('type')->get();
        $statistic = DB::table('crop_statistic')->where('id_plant',$id)->get();

        return view('plant/edit',[
            'plant' => $plant,
            'category' => $category,
            'type'  => $type,
            'statistic' => $statistic,
        ]);
    }

    public function update(Request $request)
    {   
        $file = $request->file('picture'); 
        $nama_foto = time().'.'.$file->getClientOriginalExtension();
        $tujuan_upload = 'plant';
        $file->move($tujuan_upload,$nama_foto);

    	DB::table('plant')->where('id',$request->id)->update([
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
        
        DB::table('crop_statistic')->where('id_plant',$request->id)->update([

            'germ_days_low' => $request->germ_days_low,
            'germ_days_up' =>  $request->germ_days_up, 
            'germ_temperature_low'  => $request->germ_temperature_low,
            'germ_temperature_up'  => $request->germ_temperature_up,
            'growth_days_low' => $request->growth_days_low,
            'growth_days_up' =>$request->growth_days_up,
            'height_low'  => $request->height_low,
            'height_up'  => $request->height_up,
            'ph_low'  => $request->ph_low,
            'ph_up'  => $request->ph_up,
            'spacing_low' => $request->spacing_low,
            'spacing_up' => $request->spacing_up,
            'temperature_low' => $request->temperature_low,
            'temperature_up' => $request->temperature_up,
            'width_low' => $request->width_low,
            'width_up' => $request->width_up,
    	]);
        
    	return redirect('/admin/plant');
    }

    public function delete($id)
    {
    	DB::table('plant')->where('id',$id) ->delete();
    	return redirect('/admin/plant');
    }
}