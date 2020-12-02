<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminChecklistController extends Controller
{
    public function index($myplant_id)
    {
        $checklist = DB::table('checklist')
        ->where('id_myplant', $myplant_id)
        ->get();

        return view('checklist/index',[
            'myplant_id' => $myplant_id,
            'checklist' => $checklist
        ]);
    }

    public function addChecklist($myplant_id)
    {
        return view('checklist/form',[
            'myplant_id' => $myplant_id,
        ]);
    }

    public function store(Request $request)
    {
        $myplantId = $request->id_myplant;
    	DB::table('checklist')->insert([
            'id' => Str::uuid(),
    		'title' => $request->title,
    		'is_checked' => false,
            'desc' => $request->desc,
            'id_myplant' => $myplantId,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    	return redirect('/admin/checklist/get/'.$myplantId);
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