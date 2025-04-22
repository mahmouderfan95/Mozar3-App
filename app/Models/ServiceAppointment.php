<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAppointment extends Model
{
    protected $fillable = [
        'service_id',
        'time_slot',
        'capacity',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
