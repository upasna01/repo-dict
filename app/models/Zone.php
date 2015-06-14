<?php

class Zone extends Eloquent

{
    protected $table='zone';
    protected $guarded=array('id');
    protected $fields=array('zone');

    function getId()
    {
        return $this->id;
    }
}
?>