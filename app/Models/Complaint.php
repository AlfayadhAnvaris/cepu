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


    public function complaint(){
        return $this->hasMany(ComplaintResponse::class);
    }
}