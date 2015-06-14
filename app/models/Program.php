<?php
//use Eloquent;

class Program extends Eloquent
{

    protected $table= 'program';

    protected $guarded=array('id');
    protected $fields= array('name','status');

    public static $rules= array(
        'name'=>'reqiured',
        'status'=>'required'
    );

    public function getId()
    {
        return $this->id;
    }


}