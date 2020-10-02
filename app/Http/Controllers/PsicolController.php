<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Space;
use App\Models\Vehicle;


class PsicolController extends Controller
{
    public static $title = 'Parking';
    public static $menu = [
        '' => 'Home',
        'spaces' => 'Spaces',
        'vehicles' => 'Vehicles',
        'new-vehicle' => 'New vehicle'
    ];

    public function home()
    {
        return view('welcome')
            ->with('title', PsicolController::$title)
            ->with('menu', PsicolController::$menu)
            ->with('subTitle', 'Home');
    }


    public function spaces()
    {
        return view('spaces')
            ->with('title', PsicolController::$title)
            ->with('menu', PsicolController::$menu)
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
            ->with('menu', PsicolController::$menu)
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
            ->with('menu', PsicolController::$menu)
            ->with('subTitle', 'New Vehicle')
            ->with('spaces', $spaces);
    }


    public function saveVehicle()
    {
        $data = request()->all();
        $data = request()->validate([
            'plate' => 'required|max:10|min:6|unique:vehicles,plate',
            'owner' => 'required|max:50|min:3',
            'space' => 'required|unique:vehicles,spaces_id',
        ]);
        $query = 'SELECT id FROM spaces WHERE id = ?';
        $space = DB::select($query, [$data['space']]);
        if(!empty($space)){
            Vehicle::create([
                'plate' => $data['plate'],
                'owner' => $data['owner'],
                'spaces_id' => $data['space'],
            ]);
        }
        return redirect('vehicles');
    }


    // public function destroy($id)
    public function deleteVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        // DB::table('vehicles')->delete($id); // Realiza la misma tarea que las dos líneas anteriores
        return redirect('/vehicles');
    }
}
