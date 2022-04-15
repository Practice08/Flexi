<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'worked_hours', 'started_at', 'stopped_at'
    ];

    /**
    * {@inheritDoc}
    */
    protected $dates = ['started_at', 'stopped_at'];

    /**
    * {@inheritDoc}
    */
    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeMine($query){
        return $query->whereUserId(auth()->user()->id);
    }

    public function scopeRunning($query){
        return $query->whereNull('stopped_at');
    }

    // public function getTotalTimeChartAttribute()
    // {
    //     return $this->total_time ? round($this->total_time/3600, 2) : 0;
    // }
    public function getWorkedHours($stopped)
    {
        $started_at = $this->started_at ? Carbon::createFromFormat('Y-m-d H:i:s', $this->started_at) : null;
        return $stopped->diffInSeconds($started_at);
    }



}
