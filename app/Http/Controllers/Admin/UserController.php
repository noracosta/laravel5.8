<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\EditPasswordUserRequest;
use App\Http\Requests\Admin\Users\EditUserRequest;
use App\Repositories\Admin\UserRepository;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function index_data()
    {
        
        $users = $this->userRepository->find_all();

        return Datatables::of($users)

            ->addColumn('action', function ($user) {

                return view('admin.users.partials.actions-datatables', compact('user'))
                    ->render();

            })

            ->make(true);
    }

    public function create()
    {
        $roles = $this->userRepository->get_roles();

        return view('admin.users.create',compact('roles'));

    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        if (! $this->userRepository->create($data)) {

            flash('No se pudo crear el registro de usuario.')->error();

            return back();
        }

        flash('Registro de usuario creado.')->success()->important();

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $roles = $this->userRepository->get_roles();

        $user_roles = $this->userRepository->get_user_roles($user);

        $role_id = $this->userRepository->get_user_roles($user);

        return view('admin.users.show', compact('user','roles','user_roles'));
    }

    public function edit(User $user)
    {
                
        $roles = $this->userRepository->get_roles();

        $user_roles = $this->userRepository->get_user_roles($user);

        return view('admin.users.edit', compact('user','roles','user_roles'));
    }

    public function update(User $user, EditUserRequest $request)
    {
        $data = $request->validated();

        if (! $this->userRepository->edit($user, $data)) {

            flash('No se pudo editar el registro de usuario.')->error();

            return back();
        }

        flash('Registro de usuario actualizado.')->success()->important();

        return redirect()->back();
    }

    public function edit_password(User $user)
    {
                
        $roles = $this->userRepository->get_roles();

        $user_roles = $this->userRepository->get_user_roles($user);

        return view('admin.users.edit_password', compact('user','roles','user_roles'));
    }

    public function update_password(User $user, EditPasswordUserRequest $request)
    {
        
        $data = $request->validated();

        if (! $this->userRepository->edit_password($user, $data)) {

            flash('No se pudo editar el registro de usuario.')->error();

            return back();
        }

        flash('Registro de usuario actualizado.')->success()->important();

        return redirect()->back();
    }

    public function delete(User $user)
    {
        $roles = $this->userRepository->get_roles();

        $user_roles = $this->userRepository->get_user_roles($user);

        return view('admin.users.delete', compact('user','roles','user_roles'));
    }
    
    public function destroy(User $user)
    {
        $this->userRepository->delete($user);

        flash('Registro de usuario eliminado.')->success()->important();

        return redirect()->route('users.index');
    }

}
