<?php
//use Eloquent;

class Product extends Eloquent
{

    protected $table= 'product';

    protected $guarded=array('id');
    protected $fields= array('name','program_id','unit_id','monthly_receive','monthly_outlet','monthly_expired','remarks');

    public static $rules= array(
        'name'=>'reqiured',
        'program_id'=>'required',
        'unit_id'=>'required',
        'monthly_received'=>'required',
        'monthly_outlet'=>'required',
        'monthly_expired'=>'required',
        'remarks'=>'required'
    );

    public function getId()
    {
        return $this->id;
    }




}
