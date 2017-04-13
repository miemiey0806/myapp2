<?php

use App\Role;
use Illuminate\Database\Seeder;

class roles extends Seeder
{
    public function run()
    {
        $owner=new Role();
        $owner->name ='owner';
        $owner->display_name = 'Product Owner'; //optional
        $owner->description='Product owner is the owner of a given project'; //optional
        $owner->save();

        $owner=new Role();
        $owner->name ='editor';
        $owner->display_name = 'Editor'; //optional
        $owner->description='Editor is the one that edit a given project'; //optional
        $owner->save();

        $owner=new Role();
        $owner->name ='admin';
        $owner->display_name = 'Admin User'; //optional
        $owner->description='Admin User is the one that manage a given project'; //optional
        $owner->save();
    }
}
