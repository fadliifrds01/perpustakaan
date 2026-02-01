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
            'password' => Hash::make('password123'), // Set password default 'password123'
        ]);

        return redirect()->route('Admin.Member.indexMember')
            ->with('success', 'Anggota berhasil ditambahkan!');
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
    public function editMember(string $id)
    {
        $member = MemberModel::findOrFail($id);
        return view('Admin.Member.editMember', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMember(Request $request, string $id)
    {
    $request = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users,email,' . $id,
    ]);

    $member = MemberModel::findOrFail($id);
    $member->update($request);

    return redirect()->route('Admin.Member.indexMember')
        ->with('success', 'Anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = MemberModel::findOrFail($id);
        $member->delete();

        return redirect()->route('Admin.Member.indexMember')->
        with('success', 'Anggota berhasil dihapus!');
    }
}
