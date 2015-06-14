<?php
class Roles extends \Eloquent{

    protected $table ='roles';
    protected $guarded=array('id');
    protected $fields=array('user_id','region','district_health_post','	public_health_center','health_post','sheath_post');

    public function getId()
    {
        return $this->id;
    }
}
?>