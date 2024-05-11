<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Admin;
use \App\Models\Community;
use \App\Models\Organizer;
class Event extends Model
{
    use HasFactory;
    

    protected $table = 'event';

    protected $fillable = ['title', 'description', 'event_date','media','event_status','event_category','event_is_approve','event_approved_date','event_request_date','admin_id','organizer_id','community_id'];

    // public function admin():hasMany {
    //     return $this->hasMany(Admin::class, 'id', 'admin_id');
    // }

    // public function organizer(){
    //     return $this->hasMany(Organizer::class, 'id', 'organizer_id');
    // }

    // public function community(){
    //     return $this->hasMany(Community::class, 'id', 'community_id');
    // }
}
