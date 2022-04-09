<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceArea;
class AttendanceAreaController extends Controller
{
    public function update(Request $request){
        $area=AttendanceArea::find(1);
        $area->latitude=$request['latitude'];
        $area->longitude=$request['longitude'];
        $saved=$area->save();
        return response()->json([
            'success'   => $saved
        ]);
    }
}
