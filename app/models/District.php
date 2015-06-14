<?php

class District extends Eloquent
{

    protected $table='district';
    protected $guarded=array('id');
    protected $fields=array('district','region');

    public static $rules= array(
        'district'=>'required',
        'region'=>'required'
    );

    public function getId()
    {
        return $this->id;
    }

}