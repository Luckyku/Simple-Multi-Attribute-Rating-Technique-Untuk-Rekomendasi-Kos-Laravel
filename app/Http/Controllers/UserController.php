<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index',[
            'titleWeb'=> 'Manage User',
            'users'=> User::where('is_admin', 0)->orderBY('created_at', 'desc')->paginate(10, ['*'], 'user'),
            'admins'=> User::where('is_admin', 1)->orderBy('created_at','desc')->paginate(5, ['*'], 'admin'), 
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', [
            'titleWeb'=> 'create admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:5|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'username' => 'required|min:5|max:25|unique:users|alpha_dash',
            'email' => 'required|unique:users|email:dns,rfc|max:255',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required|boolean'
            

        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['name'] = Str::title($validatedData['name']);
        User::create($validatedData);


        return redirect('/users')->with('create', 'Admin baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/users')->with('delete', 'admin sudah dihapus');
    }
}
