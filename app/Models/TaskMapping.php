<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\PrefixDetails;
use App\Models\Ward;

class TaskMapping extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['zone','contract_mapping_id','ward', 'colony', 'society', 'task', 'waste_type', 'garbage_volume','beat_number','employee_count','vehicle_count', 'created_by' , 'created_at' , 'updated_by' , 'updated_at' , 'deleted_by' , 'deleted_at' , 'ip_address'];

    public function zone(){
        return $this->belongsTo(PrefixDetails::class, 'zone', 'id');
    }

    public function wasteType(){
        return $this->belongsTo(PrefixDetails::class, 'waste_type', 'id');
    }

    public function BeatNumber(){
        return $this->belongsTo(Ward::class, 'beat_number', 'id');
    }
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
