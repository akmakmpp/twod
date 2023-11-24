<?php

namespace App\Http\Controllers;

use App\Models\DailyData;
use Illuminate\Http\Request;


class DailyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DailyData::orderBy('id','desc')->get()->first();
        if($data){
            return  response()->json([
                'status'    => true,
                'data'      => $data
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no data'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $dailyData = new DailyData();

     $dailyData->morning_set = $request->morning_set;
     $dailyData->morning_value = $request->morning_value;
     $dailyData->evening_set = $request->evening_set;
     $dailyData->evening_value = $request->evening_value;
     $dailyData->morning_modern = $request->morning_modern;
     $dailyData->morning_internet = $request->morning_internet;
     $dailyData->evening_modern = $request->evening_modern;
     $dailyData->evening_internet = $request->evening_internet;
     $dailyData->date = $request->date;
     $dailyData->save();

     return $dailyData;
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyData $dailyData)
    {
        $data = DailyData::orderBy('id','desc')->get();
        if(count($data)>0){
            return  response()->json([
                'status'    => true,
                'data'      => $data
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'There is no data'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyData $dailyData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dailyData= DailyData::find($request->id);

        $dailyData->morning_set = $request->morning_set;
        $dailyData->morning_value = $request->morning_value;
        $dailyData->evening_set = $request->evening_set;
        $dailyData->evening_value = $request->evening_value;
        $dailyData->morning_modern = $request->morning_modern;
        $dailyData->morning_internet = $request->morning_internet;
        $dailyData->evening_modern = $request->evening_modern;
        $dailyData->evening_internet = $request->evening_internet;
        $dailyData->date = $request->date;

  
        if($dailyData->update()){
            return response()->json([
                'status'    => true,
                'message'   => 'Success'
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'message'   => 'Fail'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $dailyData =DailyData::find($request->id);
        if ($dailyData->delete()) {
            return response()->json([
                'status'    => true,
                'message'   => 'Success'
            ]);

        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Fail to delete'
            ]);

        }
    }
}
