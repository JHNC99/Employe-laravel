<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //
    public function getEmploye()
    {
        return response()->json(Employe::all(), 200);
    }

    public function getEmployeID($id)
    {
        $employe = Employe::find($id);
        if (is_null($employe)) {
            return response()->json(["mensaje" => "This employe dosn't Exist"], 404);
        }
        return response()->json($employe = Employe::find($id), 200);
    }

    public function addEmploye(Request $request)
    {
        $employe = Employe::create($request->all());
        return response($employe, 200);
    }

    public function updateEmploye(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);
        if (is_null($employe)) {
            return response()->json(["mensaje" => 'Register not found']);
        }
        $employe->update($request->all());
        return response($employe, 200);
    }

    public function deleteEmploye(Request $request, $id)
    {
        $response = response()->json(["mensaje" => 'Register not found']);
        $employe = Employe::find($id);
        if (is_null($employe)) {
            return $response;
        }
        $employe->delete();
        return response()->json(["mensaje" => 'Register deleted'], 200);
    }

}
