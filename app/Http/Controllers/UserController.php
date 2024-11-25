<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;    

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $users = User::all();
        // dd(Role::where('name', 'Admin')->select('id')->first());
        $admin = Role::where('name', 'Admin')->select('id')->first();
        // dd($admin);
        $users = User::where('role_id', '!=', $admin->id)->get();
        // dd($users[1]->role->name);
        // dd($users);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Admin')->get();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email:dns|max:255|unique:users,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users,phone_number',
            'company_id_no' => 'required|string|unique:users,company_id_no',
            'last_formal_education' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,png|max:2048',
            'role_id' => 'required|exists:roles,id',
        ], [
            'photo.max'=>'The photo must not be greater than 2MB.'
        ]);

        $validated['photo'] = $request->file('photo')->store('photo-profile');
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('user.index')
                        ->with('success', 'User created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'Admin')->get();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            // 'password' => 'nullable|string|min:8',
            'email' => [
                'required',
                'string',
                'email:dns',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => [
                'required',
                'string',
                'max:15',
                Rule::unique('users', 'phone_number')->ignore($user->id),
            ],
            'company_id_no' => [
                'required',
                'integer',
                Rule::unique('users', 'company_id_no')->ignore($user->id),
            ],
            'last_formal_education' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,png|max:2048',
            'role_id' => 'required|exists:roles,id',
        ], [
            'photo.max' => 'The photo must not be greater than 2MB.',
        ]);
    
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $validated['photo'] = $request->file('photo')->store('photo-profile');
        } else {
            $validated['photo'] = $user->photo;
        }

        $user->update($validated);
    
        return redirect()->route('user.index')
                         ->with('success', 'User account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::delete($user->photo);
        }
        
        $user->delete();

        return redirect()->route('user.index')
                         ->with('success', 'User account deleted successfully.');
    }
}