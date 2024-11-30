<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\User as ObjModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class MainService extends BaseService
{

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }



    public function register(){
        return view('web.register');
    }

    public function doRegister($request){

        unset($request['password_confirmation']);

        $data=$request;
        $data['password'] = Hash::make($data['password']);
        $data['slug']=$this->generateUserCode();
        $data['image']=$data['image']->store('user', 'public');
        $this->createData($data);

        session()->flash('success', 'تم التسجيل بنجاح من فضلك قم بتسجيل الدخول');

        return redirect()->route('web.home.index');
    }

    public function login()
    {
        return view('web.login');

    }

    public function doLogin($request){
        $data = $request->validate(
            [
                'email' => 'email',
                'password' => 'required',
            ],
            [
                'password.required' => 'يرجي ادخال كلمة المرور',
            ]
        );

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // If successful, flash success message and redirect to home page
            session()->flash('success', 'تم تسجيل الدخول بنجاح');
            return redirect()->route('web.home.index');
        }
        session()->flash('error', 'البريد الالكتروني او كلمة المرور غير صحيحة');
        return redirect()->route('web.login');


    }

    public function logout(){
        Auth::logout();
        session()->flash('success', 'تم تسجيل الخروج بنجاح');
        return redirect()->route('web.login');
    }

    protected function generateUserCode(): string
    {
        do {
            $slug = Str::random(11);
        } while ($this->firstWhere(['slug' => $slug]));

        return $slug;
    }
}
