<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('doctor_access')
                <li class="{{ request()->is("admin/doctors") || request()->is("admin/doctors/*") ? "active" : "" }}">
                    <a href="{{ route("admin.doctors.index") }}">
                        <i class="fa-fw fas fa-user-md">

                        </i>
                        <span>{{ trans('cruds.doctor.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('patient_access')
                <li class="{{ request()->is("admin/patients") || request()->is("admin/patients/*") ? "active" : "" }}">
                    <a href="{{ route("admin.patients.index") }}">
                        <i class="fa-fw far fa-address-card">

                        </i>
                        <span>{{ trans('cruds.patient.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('appointment_access')
                <li class="{{ request()->is("admin/appointments") || request()->is("admin/appointments/*") ? "active" : "" }}">
                    <a href="{{ route("admin.appointments.index") }}">
                        <i class="fa-fw far fa-calendar-alt">

                        </i>
                        <span>{{ trans('cruds.appointment.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('service_access')
                <li class="{{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                    <a href="{{ route("admin.services.index") }}">
                        <i class="fa-fw fas fa-cubes">

                        </i>
                        <span>{{ trans('cruds.service.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('operation_access')
                <li class="{{ request()->is("admin/operations") || request()->is("admin/operations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.operations.index") }}">
                        <i class="fa-fw fas fa-tooth">

                        </i>
                        <span>{{ trans('cruds.operation.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('medicine_access')
                <li class="{{ request()->is("admin/medicines") || request()->is("admin/medicines/*") ? "active" : "" }}">
                    <a href="{{ route("admin.medicines.index") }}">
                        <i class="fa-fw fas fa-pills">

                        </i>
                        <span>{{ trans('cruds.medicine.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('prescription_access')
                <li class="{{ request()->is("admin/prescriptions") || request()->is("admin/prescriptions/*") ? "active" : "" }}">
                    <a href="{{ route("admin.prescriptions.index") }}">
                        <i class="fa-fw fas fa-file-prescription">

                        </i>
                        <span>{{ trans('cruds.prescription.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('entry_access')
                <li class="{{ request()->is("admin/entries") || request()->is("admin/entries/*") ? "active" : "" }}">
                    <a href="{{ route("admin.entries.index") }}">
                        <i class="fa-fw fas fa-prescription">

                        </i>
                        <span>{{ trans('cruds.entry.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('material_access')
                <li class="{{ request()->is("admin/materials") || request()->is("admin/materials/*") ? "active" : "" }}">
                    <a href="{{ route("admin.materials.index") }}">
                        <i class="fa-fw fas fa-flask">

                        </i>
                        <span>{{ trans('cruds.material.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('expense_access')
                <li class="{{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                    <a href="{{ route("admin.expenses.index") }}">
                        <i class="fa-fw fas fa-hand-holding-usd">

                        </i>
                        <span>{{ trans('cruds.expense.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('employee_access')
                <li class="{{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                    <a href="{{ route("admin.employees.index") }}">
                        <i class="fa-fw fas fa-female">

                        </i>
                        <span>{{ trans('cruds.employee.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('report_access')
                <li class="{{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "active" : "" }}">
                    <a href="{{ route("admin.reports.index") }}">
                        <i class="fa-fw far fa-sticky-note">

                        </i>
                        <span>{{ trans('cruds.report.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>