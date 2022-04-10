<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AttendanceLogs;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'designation'=>'required|max:50',
            'gender'    => 'required|max:255',
            'address' => 'required|max:512', 
            'employee_number'    =>'required',

        ]);
        if($validator->fails()){
            return response()->json(['message'=>'Parameters not matching'],400);
        }
        $validated = $validator->validated();
        $employee=new Employee;
        $employee->aa_id=1; //Assuming default Area is defined
        $employee->name=$validated['name'];
        $employee->designation=$validated['designation'];
        $employee->gender=$validated['gender'];
        $employee->address=$validated['address'];
        $employee->id=$validated['employee_number'];        
        if(isset($request['avatar'])){
            $employee->avatar=$request['avatar'];
        }        
        if(isset($request['android_id'])){
            $employee->android_id=$request['android_id'];
        }        
        $saved=$employee->save();
        return response()->json([
            'success'=>$saved
        ]);
    }
    public function get(Request $request){
        if(isset($request['employee_number'])){
            $employee=Employee::find($request['employee_number']);
        }
        else if(isset($request['android_id'])){
            $employee=Employee::where('android_id',$request['android_id'])->first();     
        }        
        return response()->json($employee);
    }
    public function check(Request $request){
        $user_latitude=$request['user_latitude'];
        $user_longitude=$request['user_longitude'];
        $employee=Employee::find($request['employee_number']);
        $response=[
            'valid'=>false
        ];
        if(!is_null($employee->attendance_area)){
            $area=$employee->attendance_area;
            $origin="origin=".$user_latitude.",".$user_longitude;
            $destination="destination=".$area->latitude.",".$area->longitude;
            $key="key=".config('app.google_maps_key');
            $parameters = $origin."&".$destination."&".$key;
            $output = "json";
            $completeurl="https://maps.googleapis.com/maps/api/directions/".$output."?".$parameters;
            $ch = curl_init();     
            curl_setopt($ch, CURLOPT_URL,$completeurl);              
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");         
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $res=json_decode(curl_exec($ch));
            if(count($res->routes)>0)
            {        
                $result=((($res)->routes)[0]->legs)[0];
                $distance=$result->distance;
                if(($distance->value)>100){
                    $response['message']='Address not within 100m range';
                }        
                else{
                    $response['valid']=true;
                }
            } else{
                $response['message']='Address not reachable';
            }   
        }else{
            $response['message']='Invalid employee';
        }
        return response()->json($response);
        
    }
    public function makeEntry(Request $request){
        $response=[
            'success'=>false
        ];
        $employee=Employee::find($request['employee_number']);
        if(is_null($employee)){
            $response['message']='Invalid employee number';
            return response()->json($response);
        }
        $logs=($employee->attendance_logs);
        if(count($logs) > 0){
            if(is_null($logs[0]->end_time)){
                $response['message']='Last entry not completed yet';
                return response()->json($response);
            }
        }
        $log=new AttendanceLogs;
        $log->employee_id=$employee->id;
        $log->start_time=Carbon::now();
        $saved=$log->save();
        if($saved){
            $response['success']=true;
        }
        else{
            $response['message']='Error saving log';
        }
        return response()->json($response);
    }
    public function makeExit(Request $request){
        $response=[
            'success'=>false
        ];
        $employee=Employee::find($request['employee_number']);
        if(is_null($employee)){
            $response['message']='Invalid employee number';
            return response()->json($response);
        }
        $logs=($employee->attendance_logs);
        if(count($logs) > 0){
            $lastlog=$logs[0];
            if(is_null($lastlog->end_time)){
                $lastlog->end_time=Carbon::now();
                $saved=$lastlog->save();
                if($saved){
                    $response['success']=true;
                    $response['log']=$lastlog;
                }
                else{
                    $response['message']='Error saving log';
                }
            }
            else{
                $response['message']='No Entry marked';
                $response['log']=$lastlog;
            }
        }
        else{
            $response['message']='No Entry marked';
        }        
        return response()->json($response);
    }
}
