<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //define all roles
        $superadmin = Role::create(['id' => 1, 'name' => 'Super-Admin',]);
        $academicmaster = Role::create(['id' => 2, 'name' => 'Academic-Master',]);
        $teacher = Role::create(['id' => 3, 'name' => 'Teacher',]);

        //define Permission
        $createSubject = Permission::create(['name' => 'create-subject']);
        $viewSubject = Permission::create(['name' => 'view-subject']);
        $editSubject = Permission::create(['name'=>'edit-subject']);
        $deleteSubject = Permission::create(['name'=>'delete-subject']);

        $createTopic = Permission::create(['name'=>'create-topic']);
        $viewTopic = Permission::create(['name'=>'view-topic']);
        $editTopic = Permission::create(['name'=>'edit-topic']);
        $deleteTopic = Permission::create(['name'=>'delete-topic']);

        $createScheme = Permission::create(['name'=>'create-scheme']);
        $viewScheme = Permission::create(['name'=>'view-scheme']);
        $editScheme = Permission::create(['name'=>'edit-scheme']);
        $deleteScheme = Permission::create(['name'=>'delete-scheme']);
        $downloadScheme = Permission::create(['name'=>'download-scheme']);

        $createPlan = Permission::create(['name'=>'create-plan']);
        $viewPlan = Permission::create(['name'=>'view-plan']);
        $editPlan = Permission::create(['name'=>'edit-plan']);
        $deletePlan = Permission::create(['name'=>'delete-plan']);
        $downloadPlan = Permission::create(['name'=>'download-plan']);

        $createTeacher = Permission::create(['name'=>'create-teacher']);
        $viewTeacher = Permission::create(['name'=>'view-teacher']);
        $editTeacher = Permission::create(['name'=>'edit-teacher']);
        $deleteTeacher = Permission::create(['name'=>'delete-teacher']);

        Permission::create(['name'=>'create-academic-master']);
        Permission::create(['name'=>'create-super-admin']);

        //assign persmissions to roles
        $superadmin->syncPermissions(Permission::all());

        $academicmaster->syncPermissions([
            $createSubject,
            $viewSubject,
            $editSubject,
            $deleteSubject,

            $createTopic,
            $viewTopic,
            $editTopic,
            $deleteTopic,

            $createTeacher,
            $viewTeacher,
            $editTeacher,
            $deleteTeacher,

            $viewPlan,
            $downloadPlan,
            $viewScheme,
            $downloadScheme,
        ]);

        //teachers-
        $teacher->syncPermissions([
            $createPlan,
            $viewPlan,
            $editPlan,
            $deletePlan,
            $downloadPlan,

            $createScheme,
            $viewScheme,
            $editScheme,
            $deleteScheme,
            $downloadScheme,
        ]);
    }
}
