<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Country;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
class CountryController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    public function index(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $country = Country::all('name');
      

        
        return $country->toArray();
        
       
    }
    public function store(Request $request)
    {
    $this->validate($request, [
        'name' => 'required',
    ]);
 
    $country = new Country();
    $country->name = $request->name;

    if ($country->save())
        return response()->json([
            'success' => true,
            'country' =>  $country
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'Sorry, country could not be added'
        ], 500);
}
public function show($id)
{
    $country= Country::find($id);

    if (!$country) {
        return response()->json([
            'success' => false,
            'message' => 'country with id ' . $id . ' not found'
        ], 400);
    }

    return response()->json([
        'success' => true,
        'data' => $country->toArray()
    ], 400);
}

}
