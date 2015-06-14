<?php

class UsersController extends \Basecontroller
{
    public function __construct()
    {
        $this->beforeFilter('auth');
        $routeArr = explode('@',Route::currentRouteAction());
        //Zend ACL check
        $userRole = Auth::user()->getRoleId();
        if(Acl::isAllowed($userRole, 'users',$routeArr[1])){
            //nothing to do
        }else{
            echo "not allowed ";  exit;
            //$this->layout = View::make('acl.notallowed');
            //$this->layout->content =
            //Redirect::to('setting');
            //exit;
        }

    }
    /**
     * Display a list of created user in storage.
     *
     */
    public function index()
    {
        $users=DB::table('users')
            ->join('roles','users.id','=','roles.user_id')
            ->join('district','users.id','=','district.id')
            ->join('zone','users.id','=','zone.id')
            ->join('region','users.id','=','region.id')
            ->select('firstname','lastname','username','phone','email','password','role','roles.user_id','roles.admin','roles.region','roles.district_health_post','roles.public_health_center','roles.health_post','roles.shealth_post','district.district','region.region','zone.zone')
            ->get();
       // return View::make('users.create', compact('uses'));
        $users=User::paginate(10);
        return View::make('users.index', compact('users'));
    }
    /**
     * Display District
     *
     */
    public function show()
    {
        $district=DB::table('district')
        ->select('district')
        ->get();
        return View::make('users.show', compact('district'));
    }



    /**
     * Store a newly created user in storage.
     *
     */
    public function store()
    {


        $input=Input::all();
       // $validation=Validator::make($input,User::$rules);
        //if($validation->passes())
        //{
            $pword=Hash::make($input['password']);
            $input['password']=$pword;
            $user=User::create($input);

            $roles = new roles;
            $roles->user_id = $user->id;
            $roles->region=$user->role_vak;
                if($user->role=='admin')
                {
                    $roles->admin  = $user->role;
                }
                elseif($user->role=='public_health_center')
                {
                    $roles->public_health_center  = $user->role;
                }
                elseif($user->role=='health_post')
                {
                    $roles->health_post  = $user->role;
                }
                elseif($user->role=='district_health_post')
                {
                    $roles->district_health_post  = $user->role;
                }
                elseif($user->role=='shealth_post')
                {
                    $roles->shealth_post  = $user->role;
                }

            $roles->save();
            return Redirect::to('users')->with('message', 'User created successfully.');

        //}
        return Redirect::route('users.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message','could not create user');
    }


    /**
     * Create a user in storage.
     *
     */
    public function create()
    {
        return View::make('users.create');
    }


    /**
     * Edit a created user in storage.
     *
     */
    public function edit($id)
    {
        $user=User::find($id);
        if(is_null($user))
        {
            return Redirect::route('users.index');
        }
        return View::make('users.edit',compact('user'));
    }

    /**
     * Update a created user in storage.
     *
     */
    public function update($id)
    {
        $input = Input::all();
        $validation = Validator::make($input,User::$updaterules);
        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update($input);
            $roles = new roles;
            $roles->user_id = $user->id;
            $roles->region=$user->role_vak;
            if($user->role=='admin')
            {
                $roles->admin  = $user->role;
            }
            elseif($user->role=='public_health_center')
            {
                $roles->public_health_center  = $user->role;
            }
            elseif($user->role=='health_post')
            {
                $roles->health_post  = $user->role;
            }
            elseif($user->role=='district_health_post')
            {
                $roles->district_health_post  = $user->role;
            }
            elseif($user->role=='shealth_post')
            {
                $roles->shealth_post  = $user->role;
            }

            $roles->save();
           return Redirect::route('users.index', $id);
        }
        return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /*
     * dropdown for roles
     */
    public function getDisZone()
    {
        $type = Input::get('type');
        if($type == 'region'){
            $regionData = Region::all();
            $html = '<option val="">Please select</option>';
            foreach($regionData as $srdata){
                $html .= '<option val="'.$srdata->id.'">'.$srdata->region.'</option>';
            }
            echo $html;
            exit;
        }
        elseif($type == 'district_health_post'){
            $disData = District::all();
            $html = '<option val="">Please select</option>';
            foreach($disData as $sddata){
                $html .= '<option val="'.$sddata->id.'">'.$sddata->district.'</option>';
            }
            echo $html;
            exit;
        }
        elseif($type == 'public_health_center'){
            $disData = District::all();
            $html = '<option val="">Please select</option>';
            foreach($disData as $sddata){
                $html .= '<option val="'.$sddata->id.'">'.$sddata->district.'</option>';
            }
            echo $html;
            exit;
        }
        elseif($type == 'health_post'){
            $disData = District::all();
            $html = '<option val="">Please select</option>';
            foreach($disData as $sddata){
                $html .= '<option val="'.$sddata->id.'">'.$sddata->district.'</option>';
            }
            echo $html;
            exit;
        }
        elseif($type == 'shealth_post'){
            $disData = District::all();
            $html = '<option val="">Please select</option>';
            foreach($disData as $sddata){
                $html .= '<option val="'.$sddata->id.'">'.$sddata->district.'</option>';
            }
            echo $html;
            exit;
        }
        elseif($type == 'admin'){
            $html = '<option val="">Disabled</option>';
            echo $html;
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return Redirect::route('users.index');
    }


}
