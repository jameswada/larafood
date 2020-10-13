<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUser;


class UserController extends Controller
{

    private $repository;

    public function __construct(User $user)
    {
        $this->repository=$user;
        
    }
    public function index(){
        $users = $this->repository->tenantUsers()->paginate(5); 
        return view('admin.pages.users.index', 
            ['users'=>$users]);
    }
    
    public function create(){
        return view('admin.pages.users.create');
    }

    public function store(StoreUpdateUser $request){

        $data = $request->all();
        $data['tenant_id']= auth()->user()->tenant_id;
        $data['password']= bcrypt($data['password']);
        $this->repository->create($data);
        return redirect()->route('users.index');
    }
    
    public function show($id){
        $user = $this->repository->where('id', $id)->tenantUsers()->first(); 
        //  dd($user);
        if(!$user)
            return redirect()->back();
        return view('admin.pages.users.show', ['user'=>$user]); 
    }

    public function destroy($id){
        $user = $this->repository
                        ->where('id', $id)->tenantUsers()->first(); 
    
        if(!$user)
            return redirect()->back();

        // if($user->details->count()>0){
        //     return redirect()->back()->with('error', 'Não Posso deletar - Existem registros vinculados a este usuario');
            
        // };
        $user->delete();
        return redirect()->route('users.index');
    }

    public function search(Request $request){
        $filters= $request->only('filter');
        $users = $this->repository->where(function($query) use ($request){
            if($request->filter){
                $query->orWhere('name','LIKE',"%{$request->filter}%");
                $query->orWhere('email','LIKE',"%{$request->filter}%");
                
            }             
        })->tenantUsers()->paginate();


        return view('admin.pages.users.index', 
                    ['users'=>$users,'filters'=>$filters]);

    }

    public function edit($id){
        $user = $this->repository->where('id', $id)->tenantUsers()->first(); 
    
        if(!$user)
            return redirect()->back();

        return view('admin.pages.users.edit', ['user'=>$user]);
    }

    public function update(StoreUpdateUser $request, $id){
        $user = $this->repository->where('id', $id)->tenantUsers()->first(); 
        if(!$user)
            return redirect()->back();
        $data= $request->only('name','email');
        if($request->password){
            $data['password']= bcrypt( $data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }

}
