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
        
//         $query = 'SELECT id FROM professions WHERE description = ?';
////        $profession = DB::select($query, ['Desarrollador back-end']);
//        $profession = DB::select($query, [$title]);
//        return $profession;
//        return $profession[0]->id;
        
        $query = 'SELECT vehicles.*, spaces.description 
                  FROM spaces INNER JOIN vehicles 
                  ON spaces.id=spaces_id';
        $vehicle = DB::select($query);
        
        return view('vehicles')
            ->with('title', PsicolController::$title)
            ->with('subTitle', 'Vehicles')
            ->with('vehicles', $vehicle);
//            ->with('vehicles', Vehicle::all());
    }
}
