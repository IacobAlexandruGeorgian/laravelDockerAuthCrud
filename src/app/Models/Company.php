<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'address'
    ];

    public function projects($id)
    {
        return DB::table('projects')->where('company_id', $id)->get();
    }
}
