<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Student Management
            'student_view' => 'View Student Details',
            'student_add' => 'Add New Student',
            'student_edit' => 'Edit Student Details',
            'student_delete' => 'Delete Student',
            
            // Teacher Management
            'teacher_view' => 'View Teacher Details',
            'teacher_add' => 'Add New Teacher',
            'teacher_edit' => 'Edit Teacher Details',
            'teacher_delete' => 'Delete Teacher',

            // Master Data
            'academic_year_manage' => 'Manage Academic Years',
            'class_manage' => 'Manage Classes',
            'section_manage' => 'Manage Sections',
            'subject_manage' => 'Manage Subjects',
                        'role_view' => 'View Roles',
            'role_add' => 'Add Roles',
            'role_edit' => 'Edit Roles',
            'role_delete' => 'Delete Roles',
            'parent_manage' => 'Manage Parents',
            'certificate_manage' => 'Manage Certificates',
            
            // Timetable
            'timetable_class' => 'View Class Timetable',
            'timetable_teacher' => 'View Teacher Timetable',
            'timetable_manage' => 'Manage Timetables',

            // Attendance
            'attendance_mark' => 'Mark Daily Attendance',
            'attendance_view' => 'View Attendance',
            'attendance_report' => 'Attendance Reports',

            // Homework
            'homework_create' => 'Create Homework',
            'homework_list' => 'View Homework List',
            'homework_submission' => 'View Homework Submissions',
            
            // Examination
            'exam_type' => 'Manage Exam Types',
            'exam_schedule' => 'Manage Exam Schedules',
            'marks_entry' => 'Enter/Edit Marks',
            
            // Others
            'result_view' => 'View Results',
            'notice_manage' => 'Manage Announcements',
            'notice_view' => 'View Announcements',
            'report_view' => 'View System Reports',
            'setting_manage' => 'Manage Settings',
        ];

        foreach ($permissions as $slug => $name) {
            Permission::updateOrCreate(['slug' => $slug], ['name' => $name]);
        }

        // Map Permissions to Roles
        $superAdmin = Role::where('id', 1)->first();
        $admin = Role::where('id', 2)->first(); // Admin
        $teacher = Role::where('id', 3)->first(); // Teacher
        $student = Role::where('id', 4)->first(); // Student
        $parent = Role::where('id', 5)->first(); // Parent

        if ($superAdmin) {
            $superAdmin->permissions()->sync(Permission::all());
        }

        if ($admin) {
            $admin->permissions()->sync(Permission::all());
        }

        if ($teacher) {
            $teacher->permissions()->sync(
                Permission::whereIn('slug', [
                    // Teacher can view students but not delete
                    'student_view', 
                    // Teacher can view other teachers
                    'teacher_view',
                    // Timetable rights
                    'timetable_class', 'timetable_teacher',
                    // Attendance rights
                    'attendance_mark', 'attendance_view',
                    // Homework rights
                    'homework_create', 'homework_list', 'homework_submission',
                    // Exam rights
                    'exam_schedule', 'marks_entry',
                    // Communication
                    'notice_view', 'result_view'
                ])->pluck('id')
            );
        }

        if ($student) {
            $student->permissions()->sync(
                Permission::whereIn('slug', [
                    'student_view', 
                    'timetable_class', 
                    'attendance_view', 
                    'homework_list', 
                    'notice_view', 
                    'result_view'
                ])->pluck('id')
            );
        }

        if ($parent) {
            $parent->permissions()->sync(
                Permission::whereIn('slug', [
                    'student_view', 
                    'timetable_class', 
                    'attendance_view', 
                    'homework_list', 
                    'notice_view', 
                    'result_view'
                ])->pluck('id')
            );
        }
    }
}
