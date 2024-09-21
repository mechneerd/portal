<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class PublishJobController extends Controller
{
    //
    public function create(Request $request){
        //dd($request);
        $publish_job = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'logo' => 'nullable|image|max:1024',
           // 'job_type' => 'required|string|in:full-time,part-time,contract',
            'expires_at' => 'nullable|date',
        ]);


        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $publish_job['logo'] = $path; // Store the path in the data array
        }

        //save
        JobPosting::create($publish_job);

        return redirect()->route('home');
        
    }
    public function index()
    {
        $jobs = JobPosting::all(); // You can also paginate or filter jobs as needed

        return Inertia::render('Post/Index', [
            'jobs' => $jobs,
        ]);
    }
    
}
