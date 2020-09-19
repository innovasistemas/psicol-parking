<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Space;
use App\Models\Vehicle;


class PsicolController extends Controller
{ 
    public static $title = 'Psicol Parking';
    
    public function home()
    {
        return view('welcome')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'Home');
    }
    
    
    public function spaces()
    {
        return view('spaces')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'Spaces')
            ->with('spaces', Space::all());
    }
    
    
    public function vehicles()
    {
        $query = 'SELECT vehicles.*, spaces.description 
                  FROM spaces INNER JOIN vehicles 
                  ON spaces.id=spaces_id';
        $vehicles = DB::select($query);
        
        return view('vehicles')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'Vehicles')
            ->with('vehicles', $vehicles);
    }
    
    
    public function newVehicle()
    {
        return view('new-vehicle')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'New Vehicle')
            ->with('spaces', Space::all());
    }
    
    
    public function saveVehicle()
    {
        $data = request()->all();
//        var_dump($data);exit;
//        $arrayData = ['description' => $title];
//        return Profession::create($arrayData);
 
        return Vehicle::create([
            'plate' => $data['txtPlate'], 
            'owner' => $data['txtOwner'],
            'spaces_id' => $data['cboSpace'],
        ]);
    }
}
