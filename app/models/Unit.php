<?php
//use Eloquent;

class Unit extends \Eloquent
{

    protected $table= 'unit';

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