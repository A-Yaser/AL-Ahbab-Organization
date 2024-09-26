<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstituteRequest;
use App\Http\Requests\UpdateInstituteRequest;
use App\Models\Center;
use App\Models\Institute;
use App\Models\Location;
use App\Models\Manager;
use App\Models\Region;
use App\Models\Tester;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::with('manager', 'centers')->get();

        return view('crud.institutes.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testers = Tester::all();
        $managers = Manager::all();
        $regions = Region::all();
        $centers = Center::all();
        // dd($managers);
        return view('crud.institutes.create', compact('testers', 'managers', 'regions', 'centers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstituteRequest $request)
    {

        Institute::create($request->all());

        return redirect()->route('institutes.index')->with('success', 'تم إضافة المعهد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institute $institute)
    {
        return view('crud.institutes.show', compact('institute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institute $institute)
    {
        $testers = Tester::all();
        $managers = Manager::all();
        $regions = Region::all();
        $centers = Center::all();

        return view('crud.institutes.edit', compact('institute', 'centers', 'testers', 'managers', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstituteRequest $request, Institute $institute)
    {

        $institute->update($request->all());

        return redirect()->route('institutes.index')->with('success', 'تم تحديث بيانات المعهد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $institute)
    {
        $institute->delete();

        return redirect()->route('institutes.index')->with('success', 'Institute deleted successfully.');
    }
}
