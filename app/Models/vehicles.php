<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class vehicles extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['Vehicle_Type', 'Vehicle_number', 'Engine_number', 'vehicle_Reg_Number','vehicle_standard_weight','Manufacturer','vehicle_tracking','Department_owned_vehicle','purchase_date','purchase_price','Source_of_purchase_date','Asset_code','chassis_number','Remarks','created_by' , 'created_at' , 'updated_by' , 'updated_at' , 'deleted_by' , 'deleted_at' , 'ip_address'];

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                    'ip_address'=> $_SERVER['REMOTE_ADDR'],
                ]);
            }
        });

        static::updated(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });

        static::deleting(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }


}