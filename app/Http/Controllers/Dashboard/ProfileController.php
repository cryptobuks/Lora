<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdate;
use App\Repositories\Picture;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $p_title = ""  ;
        $user = $request->user("user") ;
        if ($request->input("index" , "edit" ) == "edit")
        {
            $information = [
                'title' => trans("dash.profile.edit.text") ,
                'desc'  => trans("dash.profile.edit.desc") ,
                'breadcrumb' => [
                    trans("dash.profile.edit.text") => null
                ]
            ] ;
        }
        else
        {
            $information = [
                'title' => trans("dash.profile.changepassword.text") ,
                'desc'  => trans("dash.profile.changepassword.desc") ,
                'breadcrumb' => [
                    trans("dash.profile.changepassword.text") => null
                ]
            ] ;
        }
        return view("dash.profile.index" , compact("information" , 'user') ) ;
    }

    public function store(ProfileUpdate $request)
    {
        if ($request->hasFile('picture'))
            Picture::delete(Auth::guard("user")->user()->picture) ;

        Auth::guard("user")->user()->update(
            $request->input("password") ? [
                "password"  => bcrypt($request->input("password"))
            ] : [
                "firstname" => $request->input('firstname') ,
                "lastname"  => $request->input('lastname') ,
                "username"  => $request->input('username') ,
                "email"     => $request->input('email') ,
                "mobile"    => $request->input('mobile') ,
                "gender"    => $request->input('gender') ,
                "theme"     => $request->input("theme") ,
                "picture"   => Picture::create("picture") ,
            ]
        );
        return RepMessage(trans("dash.messages.success.profile.update")) ;
    }
}
