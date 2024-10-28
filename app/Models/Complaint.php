<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable =[
     'title',
     'description',
     'status',
     'image',
     'guest_name',
     'guest_email',
     'guest_telp',
     'user_id',
    ];

function getStatusBadgeAttribute() {
     return match ($this->status) {
        'pending' => '<span class="badge" style="background-color: #ff7976;">PENDING</span>',
        'selesai' => '<span class="badge" style="background-color: #5ddab4;">SELESAI</span>',
        default => '<span class="badge" style="background-color: #57caeb;">'. strtoupper($this->status)  .'</span>',
     };
}


    public function complaint(){
        return $this->hasMany(ComplaintResponse::class);
    }


     function user()  {
        return $this->belongsTo(User::class);
     }
}
