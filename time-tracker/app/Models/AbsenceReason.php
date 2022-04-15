<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceReason extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reason',
        'start_date',
        'stop_date'
    ];
    protected $dates = ['start_date', 'stop_date'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
