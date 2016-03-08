<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use App\Cars;
use Response;
use App\Http\Requests;
use Carbon\Carbon;

class CarsController extends Controller
{
	public function __construct() {
	    $this->middleware('auth');
	}

	public function index() {
		$cars = Auth::user()->cars;		
		return view('cars.index', compact('cars'));
	}

    public function postCars() {
		$make = Auth::user();
		return view('cars.addcar');
    }

    public function postAddCar(Request $request) {
    	$validator = Validator::make($request->all(), [
            'make' => 'required|max:255',
            'vin' => 'required',
            'model' => 'required',
            'color' => 'required'
        ]);
        if ($validator->fails()) {
            return Response::make(['error' => 'error', 'message' => 'validation error'], 400);
        }
    	$status = Cars::insert([
    		'color' => $request->color,
    		'vin' => $request->vin,
    		'userID' => Auth::user()->id,
    		'make' => $request->make,
    		'model' => $request->model,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    		]);

    	if ($status) {
            return Response::make(['success' => 'success', 'message' => 'Car Added Successfully'], 200);
    	} else {
            return Response::make(['error' => 'error', 'message' => 'Insertion error'], 400);
    	}
    }
}
