<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Events extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizers_id',
        'event_category_id',
        'active'
    ];

     // Relasi ke model Organizer
     public function organizer(): BelongsTo
     {
         return $this->belongsTo(Organizers::class,'organizers_id');  // Pastikan nama class dan namespace benar
     }
 
     // Relasi ke model EventCategory
     public function eventCategory()
     {
         return $this->belongsTo(Event_Categories::class,'event_category_id');  // Pastikan nama class dan namespace benar
     }
}
