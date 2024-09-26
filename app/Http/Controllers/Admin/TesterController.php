<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTesterRequest;
use App\Http\Requests\TesterRequest;
use App\Models\Institute;
use App\Models\Person;
use App\Models\Tester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::all();

        $testers = Tester::all();
        return view('crud.testers.index', compact(['institutes', 'testers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institutes = Institute::all();
        return view('crud.testers.create', compact('institutes'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(StoreTesterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->person()->create([
            'name' => $request->name,
            'username' => $request->username,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'IsMarried' => $request->IsMarried,
            'Status' => $request->Status ?? true,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = 'avatar' . '-' .  $user->person->id . time() . '-' .  $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->person->update([
            'profile_picture' => $profile
        ]);

        $user->person->tester()->create([
            // 'person_id' => $request->institute_id,
            // 'institute_id' => $request->institute_id,

        ]);

        // $user->assignRole('tester');

        return redirect()->route('testers.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Tester $tester)
    {
        return view('crud.testers.show', compact('tester'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tester $tester)
    {
        $institutes = Institute::all();

        return view('crud.testers.edit', compact(['tester', 'institutes']));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateTesterRequest $request, Tester $tester)
    {
        // dd($request);

        $tester->person()->update([
            'name' => $request->name,
            'username' => $request->username,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'IsMarried' => $request->IsMarried,
            'Status' => $request->Status ?? true,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = 'avatar' . '-' .  $tester->person->id . '-' . time() . '.' .  $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $tester->person->profile_picture;
        }


        $tester->person()->update([
            'profile_picture' => $profile
        ]);
        $tester->update([
            // 'person_id' => $request->institute_id,
            // 'institute_id' => $request->institute_id,

        ]);

        return redirect()->route('testers.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tester $tester)
    {
        $tester->delete();
        return redirect()->route('testers.index')->with('success', 'Tester deleted successfully.');
    }
}
