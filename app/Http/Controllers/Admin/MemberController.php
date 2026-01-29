<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MemberModel;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function showIndexMembers()
    {
        $members = MemberModel::all();
        return view('Admin.Member.indexMember', compact('members'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showCreateMembers()
    {
        return view('Admin.Member.createMember');
    }
    public function createMember(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
        ]);

        MemberModel::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make('password123'), // Set password default 'password'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
