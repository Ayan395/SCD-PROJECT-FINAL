<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Protecting the mass assignment of the 'name' attribute
    protected $fillable = [
        'name',  // Add this to allow mass assignment for the 'name' attribute
    ];
}
