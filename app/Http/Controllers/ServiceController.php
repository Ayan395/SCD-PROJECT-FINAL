<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query', '');

        $services = Service::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return response()->json([
            'services' => $services,
        ]);
    }

    /**
     * Display a listing of the resource.
     * Fetch all services for the frontend.
     */
    public function index()
    {
        $services = Service::with('category')->get(); // Fetch services with category relationship
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * Display the form to add a new service in the admin panel.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * Save the service to the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id', // Validate category
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'category_id' => $request->input('category_id'), // Save category_id
        ]);

        return redirect()->route('services.create')->with('success', 'Service created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     * Display the edit form for the admin.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * Save the updated service data to the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id', // Validate category
        ]);

        $service = Service::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $service->image = $request->file('image')->store('services', 'public');
        }

        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $service->image,
            'category_id' => $request->input('category_id'), // Update category_id
        ]);

        return redirect()->route('services.edit', $service->id)->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * Delete the service from the database.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
