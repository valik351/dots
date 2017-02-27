<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request) {
        return view('admin.user.index', [
            'users' => User::where('name', 'like', '%' . $request->get('search', '') . '%')
                ->orWhere('email', 'like', '%' . $request->get('search', '') . '%')
                ->orWhere('id', 'like', '%' . $request->get('search', '') . '%')
                ->paginate(10)
        ]);
    }

    public function showForm(Request $request, $id = null) {
        return view('admin.user.form', [
            'user' => $id ? User::findOrFail($id) : null
        ]);
    }

    public function update(Request $request, $id) {
        return $this->create($request, $id);
    }

    public function create(Request $request, $id = null) {
        $user = $id ? User::findOrFail($id) : new User();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users' . ($id ? (',email,' . $id) : ''),
            'password' => 'confirmed' . ($id ? '' : '|required'),
            'role' => 'required|in:' . implode(',', User::roles())
        ]);

        $user->fill($request->all());
        if($request->get('password')) {
            $user->password = $request->get('password');
        }

        $user->save();

        \Session::flash('alert', [
            'type' => 'success',
            'message' => $id ? 'Пользователь обновлен успешно' : 'Пользователь создан успешно'
        ]);

        return redirect()->to(action('Backend\UserController@index'));
    }

    public function delete(Request $request, $id) {

        User::findOrFail($id)->delete();
        \Session::flash('alert', [
            'type' => 'success',
            'message' => 'Пользователь удален успешно'
        ]);

        return redirect()->to(action('Backend\UserController@index'));
    }
}
