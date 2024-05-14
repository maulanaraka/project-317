<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = ['report', 'media', 'report_is_approved','report_date','report_approved_date','report_request_date','event_id','admin_id','organizer_id'];

}
