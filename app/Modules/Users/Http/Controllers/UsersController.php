<?php

namespace App\Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        return view('users.edit',  compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return redirect()->back();
    }
}
