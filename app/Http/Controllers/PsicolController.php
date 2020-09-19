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
        $query = 'SELECT * 
                  FROM spaces 
                  WHERE id NOT IN (SELECT spaces_id FROM vehicles)
                 ';
        $spaces = DB::select($query);
        return view('new-vehicle')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'New Vehicle')
            ->with('spaces', $spaces);
    }
    
    
    public function saveVehicle()
    {
        $data = request()->all();
 
        Vehicle::create([
            'plate' => $data['txtPlate'], 
            'owner' => $data['txtOwner'],
            'spaces_id' => $data['cboSpace'],
        ]);
        
        return redirect('vehicles');
    }
}
