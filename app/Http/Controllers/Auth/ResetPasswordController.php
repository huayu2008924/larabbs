<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * 从代码以及其中的注释中可看出，成功时候调用了 sendResetResponse() 方法，
     * 可惜此方法内的逻辑不是我们想要的。我们需要在表单提交成功后，设置闪存信息，再重定向到首页
     * 我们可以利用 PHP 里 Trait 的加载机制，在控制器中重写 sendResetResponse() 方法
     */
    protected function sendResetResponse(Request $request, $response)
    {
        session()->flash('success','密码更新成功，您已成功修改密码！');
        return redirect($this->redirectPath());
    }

}
