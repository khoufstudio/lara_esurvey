<?php

namespace Modules\LoginPublic\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;


class LoginPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthenticatesUsers;
    use ValidatesRequests;

    public function showPublicLoginForm()
    {
        return view('loginpublic::index', ['url' => 'public']);
    }

    public function publicLogin(Request $request)
    {
        $this->validate($request, [
            'login'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('public')->attempt(['email' => $request->login, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('login', 'remember'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
