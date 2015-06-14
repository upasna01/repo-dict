<?php


/*
|--------------------------------------------------------------------------
| ACL Resources, Roles, and Permissions
|--------------------------------------------------------------------------
|
| Below you may add resources and roles and define the permissions
| roles have on those resources.
|
*/

// Add Resources


// Add Roles


// Give roles permissions on resources
// Add page resource
Acl::addResource('users');
// Add admin role
Acl::addRole('admin');
// Add guest role
Acl::addRole('guest');
Acl::addRole('district');
Acl::addRole('zone');
Acl::addRole('healthpost');
// Give admin role add, edit, delete, and view permissions for page resource
Acl::allow('admin', 'users', array('create', 'edit', 'destroy','index','store','update','show','getDisZone'));

// Give guest role only view permissions for page resource
//Acl::allow('guest', 'users',  array('create', 'edit', 'delete', 'index'));
Acl::deny('district', 'users',  array('create', 'edit', 'delete'));
Acl::allow('district', 'users','index');

Acl::deny('zone', 'users',  array('create', 'edit', 'delete'));
Acl::allow('zone', 'users','index');

Acl::deny('healthpost', 'users',  array('create', 'edit', 'delete'));
Acl::allow('healthpost', 'users','index');
