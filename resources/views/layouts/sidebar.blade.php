<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-graduation-cap me-2"></i>
        <span>School LMS</span>
    </div>

    @php
        $user = auth()->user();
        $sessionRole = session('role');
        $isAdmin = in_array($sessionRole, ['admin', 'superadmin'], true);
        $isTeacher = $sessionRole === 'teacher';
        $isStudent = $sessionRole === 'student';
        $isParent = $sessionRole === 'parent';

        $dashboardRoute = 'admin.dashboard';
        if ($isTeacher) {
            $dashboardRoute = 'teacher.dashboard';
        } elseif ($isStudent) {
            $dashboardRoute = 'student.dashboard';
        } elseif ($isParent) {
            $dashboardRoute = 'parent.dashboard';
        }

        $can = function (string $permission) use ($user) {
            return $user && method_exists($user, 'hasPermission') && $user->hasPermission($permission);
        };
    @endphp

    <!-- 1️⃣ Dashboard -->
    <a href="{{ route($dashboardRoute) }}"
        class="d-flex align-items-center {{ request()->routeIs($dashboardRoute) ? 'current-page' : '' }}">
        <i class="fas fa-th-large fs-5 me-1"></i>
        <span>Dashboard</span>
    </a>

    <!-- 1️⃣ Role Menus -->
    @if ($isTeacher)
        @php
            $teacherActive = request()->routeIs('teacher.*');
        @endphp
        <a href="#submenu-teacher" data-bs-toggle="collapse"
            class="d-flex justify-content-between align-items-center {{ $teacherActive ? 'active' : '' }}">
            <span>
                <i class="fa-solid fa-chalkboard-user fs-5"></i>
                <span>Teacher Panel</span>
            </span>
            <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
        </a>
        <div class="collapse {{ $teacherActive ? 'show' : '' }}" id="submenu-teacher">
            <a href="{{ route('teacher.classes.subjects') }}"
                class="ps-5 submenu {{ request()->routeIs('teacher.classes.subjects') ? 'current-page' : '' }}">
                <i class="fa-solid fa-book-open"></i> Class & Subjects
            </a>
            <a href="{{ route('teacher.homework') }}"
                class="ps-5 submenu {{ request()->routeIs('teacher.homework') ? 'current-page' : '' }}">
                <i class="fa-solid fa-clipboard-list"></i> Homework / Assignments
            </a>
            <a href="{{ route('teacher.exams') }}"
                class="ps-5 submenu {{ request()->routeIs('teacher.exams') ? 'current-page' : '' }}">
                <i class="fa-solid fa-pen-to-square"></i> Exam Creation
            </a>
            <a href="{{ route('teacher.performance') }}"
                class="ps-5 submenu {{ request()->routeIs('teacher.performance') ? 'current-page' : '' }}">
                <i class="fa-solid fa-chart-line"></i> Performance View
            </a>
        </div>
    @endif

    @if ($isStudent)
        @php
            $studentActive = request()->routeIs('student.*');
        @endphp
        <a href="#submenu-student" data-bs-toggle="collapse"
            class="d-flex justify-content-between align-items-center {{ $studentActive ? 'active' : '' }}">
            <span>
                <i class="fa-solid fa-user-graduate fs-5"></i>
                <span>Student Panel</span>
            </span>
            <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
        </a>
        <div class="collapse {{ $studentActive ? 'show' : '' }}" id="submenu-student">
            <a href="{{ route('student.subjects') }}"
                class="ps-5 submenu {{ request()->routeIs('student.subjects') ? 'current-page' : '' }}">
                <i class="fa-solid fa-book"></i> My Subjects
            </a>
            <a href="{{ route('student.homework') }}"
                class="ps-5 submenu {{ request()->routeIs('student.homework') ? 'current-page' : '' }}">
                <i class="fa-solid fa-file-circle-check"></i> Homework Submission
            </a>
            <a href="{{ route('student.online.classes') }}"
                class="ps-5 submenu {{ request()->routeIs('student.online.classes') ? 'current-page' : '' }}">
                <i class="fa-solid fa-video"></i> Online Classes
            </a>
            <a href="{{ route('student.exams.results') }}"
                class="ps-5 submenu {{ request()->routeIs('student.exams.results') ? 'current-page' : '' }}">
                <i class="fa-solid fa-square-check"></i> Exams & Results
            </a>
            <a href="{{ route('student.certificates') }}"
                class="ps-5 submenu {{ request()->routeIs('student.certificates') ? 'current-page' : '' }}">
                <i class="fa-solid fa-certificate"></i> Certificates
            </a>
        </div>
    @endif

    @if ($isParent)
        @php
            $parentActive = request()->routeIs('parent.*');
        @endphp
        <a href="#submenu-parent" data-bs-toggle="collapse"
            class="d-flex justify-content-between align-items-center {{ $parentActive ? 'active' : '' }}">
            <span>
                <i class="fa-solid fa-users fs-5"></i>
                <span>Parent Panel</span>
            </span>
            <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
        </a>
        <div class="collapse {{ $parentActive ? 'show' : '' }}" id="submenu-parent">
            <a href="{{ route('parent.attendance') }}"
                class="ps-5 submenu {{ request()->routeIs('parent.attendance') ? 'current-page' : '' }}">
                <i class="fa-solid fa-calendar-check"></i> Attendance View
            </a>
            <a href="{{ route('parent.homework.status') }}"
                class="ps-5 submenu {{ request()->routeIs('parent.homework.status') ? 'current-page' : '' }}">
                <i class="fa-solid fa-clipboard-check"></i> Homework Status
            </a>
            <a href="{{ route('parent.exam.results') }}"
                class="ps-5 submenu {{ request()->routeIs('parent.exam.results') ? 'current-page' : '' }}">
                <i class="fa-solid fa-square-poll-vertical"></i> Exam Results
            </a>
            <a href="{{ route('parent.notices') }}"
                class="ps-5 submenu {{ request()->routeIs('parent.notices') ? 'current-page' : '' }}">
                <i class="fa-solid fa-bullhorn"></i> Notices & Messages
            </a>
        </div>
    @endif

    @if ($isAdmin)
        <!-- 2️⃣ Master (Collapsible) -->
        @php
            $masterActive = request()->routeIs(
                'academic.year.*',
                'classes.*',
                'section.*',
                'subjects.*',
                'roles.*',
                'teachers.*',
                'students.*',
                'parents.*',
                'teacher.mapping*',
            );
        @endphp
        @if ($can('academic_year_manage') ||
            $can('class_manage') ||
            $can('section_manage') ||
            $can('subject_manage') ||
            $can('role_view') ||
            $can('role_add') ||
            $can('role_edit') ||
            $can('role_delete') ||
            $can('teacher_view') ||
            $can('student_view') ||
            $can('parent_manage'))
            <a href="#submenu-master" data-bs-toggle="collapse"
                class="d-flex justify-content-between align-items-center {{ $masterActive ? 'active' : '' }}">
                <span>
                    <i class="fas fa-layer-group fs-5"></i>
                    <span>Master</span>
                </span>
                <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
            </a>

            <div class="collapse {{ $masterActive ? 'show' : '' }}" id="submenu-master">
                @if ($can('academic_year_manage'))
                    <a href="{{ route('academic.year.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('academic.year.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-calendar"></i> Academic Year
                    </a>
                @endif
                @if ($can('class_manage'))
                    <a href="{{ route('classes.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('classes.*') ? 'current-page' : '' }}">
                        <i class="fas fa-chalkboard"></i> Class
                    </a>
                @endif
                @if ($can('section_manage'))
                    <a href="{{ route('section.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('section.*') ? 'current-page' : '' }}">
                        <i class="fas fa-th-large"></i> Section
                    </a>
                @endif
                @if ($can('subject_manage'))
                    <a href="{{ route('subjects.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('subjects.*') ? 'current-page' : '' }}">
                        <i class="fas fa-book-open"></i> Subjects
                    </a>
                @endif
                @if ($can('role_view') || $can('role_add') || $can('role_edit') || $can('role_delete'))
                    <a href="{{ route('roles.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('roles.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-user-shield"></i> Role and Permission
                    </a>
                @endif
                @if ($can('teacher_view'))
                    <a href="{{ route('teachers.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('teachers.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-chalkboard-user"></i> Teachers
                    </a>
                @endif
                @if ($can('student_view'))
                    <a href="{{ route('students.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('students.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-user-graduate"></i> Students
                    </a>
                @endif
                @if ($can('parent_manage'))
                    <a href="{{ route('parents.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('parents.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-users"></i> Parents
                    </a>
                @endif
                @if ($can('class_manage'))
                    <a href="{{ route('teacher.mapping') }}"
                        class="ps-5 submenu {{ request()->routeIs('teacher.mapping*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-link"></i> Class mapping
                    </a>
                @endif
                @if ($can('certificate_manage'))
                    <a href="{{ route('certificate.index') }}"
                        class="ps-5 submenu {{ request()->routeIs('certificate.*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-certificate"></i> Certificate
                    </a>
                @endif
            </div>
        @endif

        <!-- 3️⃣ Timetable -->
        @php
            $timetableActive = request()->routeIs('timetable.*');
        @endphp
        @if ($can('timetable_class') || $can('timetable_teacher'))
            <a href="#submenu-timetable" data-bs-toggle="collapse"
                class="d-flex justify-content-between align-items-center {{ $timetableActive ? 'active' : '' }}">
                <span>
                    <i class="fas fa-calendar-alt fs-5"></i>
                    <span>Timetable</span>
                </span>
                <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
            </a>
            <div class="collapse {{ $timetableActive ? 'show' : '' }}" id="submenu-timetable">
                @if ($can('timetable_class'))
                    <a href="{{ route('timetable.class') }}"
                        class="ps-5 submenu {{ request()->routeIs('timetable.class*') ? 'current-page' : '' }}">
                        <i class="fa-regular fa-clock"></i> Class Time Table
                    </a>
                @endif
                @if ($can('timetable_teacher'))
                    <a href="{{ route('timetable.teacher') }}"
                        class="ps-5 submenu {{ request()->routeIs('timetable.teacher*') ? 'current-page' : '' }}">
                        <i class="fa-regular fa-clock"></i> Teacher Time Table
                    </a>
                @endif
            </div>
        @endif

        <!-- 4️⃣ Homework -->
        @php
            $homeworkActive = request()->routeIs('homework.*');
        @endphp
        @if ($can('homework_create') || $can('homework_list') || $can('homework_submission'))
            <a href="#submenu-homework" data-bs-toggle="collapse"
                class="d-flex justify-content-between align-items-center {{ $homeworkActive ? 'active' : '' }}">
                <span>
                    <i class="fas fa-book fs-5"></i>
                    <span>Homework</span>
                </span>
                <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
            </a>
            <div class="collapse {{ $homeworkActive ? 'show' : '' }}" id="submenu-homework">
                @if ($can('homework_create'))
                    <a href="{{ route('homework.create') }}"
                        class="ps-5 submenu {{ request()->routeIs('homework.create*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-plus-circle"></i> Create Homework
                    </a>
                @endif
                @if ($can('homework_list'))
                    <a href="{{ route('homework.list') }}"
                        class="ps-5 submenu {{ request()->routeIs('homework.list*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-list"></i> Homework List
                    </a>
                @endif
                @if ($can('homework_submission'))
                    <a href="{{ route('homework.submission') }}"
                        class="ps-5 submenu {{ request()->routeIs('homework.submission*') ? 'current-page' : '' }}">
                        <i class="fa-solid fa-file-circle-check"></i> Submission
                    </a>
                @endif
            </div>
        @endif

        <!-- 5️⃣ Examination -->
        @php
            $examsActive = request()->routeIs('exams.*');
        @endphp
        @if ($can('exam_type') || $can('exam_schedule') || $can('marks_entry'))
            <a href="#submenu-exams" data-bs-toggle="collapse"
                class="d-flex justify-content-between align-items-center {{ $examsActive ? 'active' : '' }}">
                <span>
                    <i class="fa-solid fa-pen fs-5"></i>
                    <span>Examination</span>
                </span>
                <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
            </a>
            <div class="collapse {{ $examsActive ? 'show' : '' }}" id="submenu-exams">
                @if ($can('exam_type'))
                    <a href="{{ route('exams.type') }}"
                        class="ps-5 submenu {{ request()->routeIs('exams.type*') ? 'current-page' : '' }}">
                        <i class="fas fa-tasks"></i> Exam Type
                    </a>
                @endif
                @if ($can('exam_schedule'))
                    <a href="{{ route('exams.schedule') }}"
                        class="ps-5 submenu {{ request()->routeIs('exams.schedule*') ? 'current-page' : '' }}">
                        <i class="fas fa-calendar-check"></i> Exam Schedule
                    </a>
                @endif
                @if ($can('marks_entry'))
                    <a href="{{ route('exams.marks') }}"
                        class="ps-5 submenu {{ request()->routeIs('exams.marks*') ? 'current-page' : '' }}">
                        <i class="fas fa-marker"></i> Marks Entry
                    </a>
                @endif
            </div>
        @endif

        <!-- 6️⃣ Results -->
        @if ($can('result_view'))
            <a href="{{ route('results.index') }}"
                class="d-flex align-items-center {{ request()->routeIs('results.*') ? 'current-page' : '' }}">
                <i class="fa-solid fa-square-check fs-5 me-1"></i>
                <span>Results</span>
            </a>
        @endif

        <!-- 7️⃣ Communication -->
        @php
            $commActive = request()->routeIs('communication.*');
        @endphp
        @if ($can('notice_view') || $can('notice_manage'))
            <a href="#submenu-comm" data-bs-toggle="collapse"
                class="d-flex justify-content-between align-items-center {{ $commActive ? 'active' : '' }}">
                <span>
                    <i class="fa-sharp fa-solid fa-comment fs-5"></i>
                    <span>Communication</span>
                </span>
                <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
            </a>
            <div class="collapse {{ $commActive ? 'show' : '' }}" id="submenu-comm">
                <a href="{{ route('communication.announcements') }}"
                    class="ps-5 submenu {{ request()->routeIs('communication.*') ? 'current-page' : '' }}">
                    <i class="fas fa-bullhorn"></i> Announcements
                </a>
            </div>
        @endif
    @endif

</div>
