<?php

class Region extends Eloquent{

    protected $table='region';
    protected $guarded=array('id');
    protected $fields=array('district_id','region');

    public static $rules= array(
        'region'=>'required'
    );

    public function getId()
    {
        return $this->id;
    }

}