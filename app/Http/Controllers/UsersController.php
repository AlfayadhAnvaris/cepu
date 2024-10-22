<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->input('password')){
            $input['password'] = bcrypt ($input['password']);
        }
        User::create($input);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    // show untuk menampilkan data
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // edit untuk mengedit data
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    // untuk update data
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        if ($request->input('password')) {
            $data['password'] = bcrypt($data['password']);
        } else{
            $data = Arr::except($data, 'password');
        }
        $user->update($data); //method chaining
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // untuk delete data 
    public function destroy(string $id)
    {
       $user = User::findOrFail($id);
       $user->delete();
       return redirect('/admin/users');
    }
}
