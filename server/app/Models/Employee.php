<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Log;
class Employee extends Model
{
    use HasFactory;
    protected $fillable=['aa_id'];
    public function setAvatarAttribute($value){
        $filename = md5($value.time()).'.jpg';
        $destination='avatars'.'/'.$filename;
        $image = \Image::make($value)->encode('jpg', 90);
        $path=Storage::disk('s3')->put($destination, $image->stream(),'public');
        $this->attributes['avatar_link']=Storage::disk('s3')->url($destination);
    }
    public function attendance_area(){
        return $this->belongsTo(AttendanceArea::class,'aa_id','id');
    }
    public function attendance_logs(){
        return $this->hasMany(AttendanceLogs::class)->orderBy('created_at','desc');
    }
}
