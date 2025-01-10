<?php

namespace App\Http\Controllers;

use App\Models\Service;  // Assuming you are fetching services from the database
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Method to return the services page with dynamic data
    public function services()
    {
        $services = Service::all();  // Fetch all services from the database
        return view('services', compact('services'));  // Pass services to the view
    }
}
