<?php

use Illuminate\Support\MessageBag;

require_once("CAS.php");

class UserController extends BaseController
{

    public function preLoginAction(){
        $data = Input::all();

        // Enable debugging
        phpCAS::setDebug();
        phpCAS::client(CAS_VERSION_2_0, "login.umd.edu",443, "cas");
        phpCAS::setNoCasServerValidation();
        phpCAS::forceAuthentication();

        if (isset($_REQUEST['logout'])) {
            phpCAS::logout();
        }

        $userName = phpCAS::getUser();

        $user = User::where('username','=',$userName)->get()->first();

        if ($user != null)
        {
            Auth::login($user);
            if(empty($user->firstName)){
                return Redirect::route("register");
            } else {
                return Redirect::route("home");
            }
        } else {

            $user = User::create([
                "username" => $userName,
                "isCAS"    => true
                ]);

            //$user->roles()->save(Role::where('description', '=', Role::$APPLICANT)->firstOrFail());
            Auth::login($user);
            return Redirect::route("register");
        }
    }

    public function register(){
        $data = Input::all();
        $user = Auth::user();

        if(!empty($data['uid'])){
            $user->uid = $data['uid'];
        }

        if(!empty($data['firstName'])){
            $user->firstName = $data['firstName'];
        }

        if(!empty($data['lastName'])){
            $user->lastName = $data['lastName'];
        } 

        if(!empty($data['preferredName'])){
            $user->preferredName = $data['preferredName'];
        }

        if(!empty($data['gender'])){
            $user->gender = $data['gender'];
        }

        if(!empty($data['telephone'])){
            $user->telephone = $data['telephone'];
        } 

        if(!empty($data['email'])){
            $user->email = $data['email'];
        } 

        if(!empty($data['gpa'])){
            $user->gpa = $data['gpa'];
        } 

        if(!empty($data['creditsCompleted'])){
            $user->creditsCompleted = $data['creditsCompleted'];
        } 

        if(!empty($data['major'])){
           foreach($data['major'] as $major){
                $user->majors()->save(Major::find($major));
           }
        } 

        if(!empty($data['minor'])){
            foreach($data['minor'] as $minor){
                $user->minors()->save(Minor::find($minor));
            }
        } 

        if(!empty($data['honor'])){
            foreach($data['honor'] as $honor){
                $user->honorPrograms()->save(HonorProgram::find($honor));
            }
        }  


        if(!empty($data['notes'])){
            $user->notes = $data['notes'];
        }  

        $user->save();

        if(empty($user->roles)){
            //if the users are kylie or jessica
            if($user->uid == "110508229" || $user->uid == "111339815"){
                $user->roles()->save(Role::where('description', '=', Role::$QUALITY_GUILD)->firstOrFail());
            } else {
                $test = KnownId::where("uid","=",$user->uid)->first();
                if(is_null($test)){
                    //Is a user that isn't known to be in quest
                    $user->roles()->save(Role::where('description', '=', Role::$APPLICANT)->firstOrFail());
                } else {
                    //User ID is known to be in quest
                    $user->roles()->save(Role::where('description', '=', Role::$READER)->firstOrFail());
                    $user->roles()->save(Role::where('description', '=', Role::$INTERVIEWER)->firstOrFail());
                }
            }
        }


        return Redirect::route("home");
    }

    public function loginAction()
    {
        $errors = new MessageBag();
        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];

        $validator = Validator::make(Input::all(), [
            "username" => "required",
            "password" => "required"
        ]);

        if ($validator->passes())
        {
            $credentials = [
                "username" => Input::get("username"),
                "password" => Input::get("password")
            ];

            $user = User::where('username','=',$credentials['username'])->get()->first();
            if (!isset($user)){
                return Redirect::route("internalLogin")->withInput($data);
            }
            if (!$user->isCAS && Auth::attempt($credentials))
            {
                if(empty($user->firstName)){
                    return Redirect::route("register");
                } else {
                    return Redirect::route("home");
                }
            }
        }
        else
        {
            $data["errors"] = new MessageBag([
                "password" => [
                "Username and/or password invalid."
                ]
                ]);
            $data["username"] = Input::get("username");
             return Redirect::route("internalLogin")->withInput($data);
        }
        return Redirect::route("internalLogin")->withInput($data);
    }

    public function logoutAction()
    {
        Auth::logout();
        return Redirect::route("login");
    }
}
