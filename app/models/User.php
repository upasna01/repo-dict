<?php
//use Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zend\Permissions\Acl\Role\RoleInterface;

class User extends Eloquent implements UserInterface, RemindableInterface, RoleInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $guarded= array('id');
    protected $fields= array('firstname','lastname','username','phone','email','password','roles');

    public static $rules= array(
        'firstname'=>'required',
        'lastname'=>'required',
        'username'=>'required',
        'phone'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:5',
        'role'=>'required'
    );
        public static $updaterules= array(
        'firstname'=>'required',
        'lastname'=>'required',
        'username'=>'required',
        'phone'=>'required',
        'email'=>'required|email',
        'role'=>'required'
    );
    public static $profilerules= array(
        'firstname'=>'required',
        'lastname'=>'required',
        'username'=>'required',
        'phone'=>'required',
        'email'=>'required|email',
    );
       public function getId()
    {
        return $this->id;
    }

    /**
     * Returns role of the user
     * @return string
     */
    public function getRoleId()
    {
        return $this->role;
    }

}
