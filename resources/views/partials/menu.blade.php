<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('respondent_category_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.respondent-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/respondent-categories") || request()->is("admin/respondent-categories/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-500px c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.respondentCategory.title') }}
                </a>
            </li>
        @endcan
        @can('respondent_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.respondents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/respondents") || request()->is("admin/respondents/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.respondent.title') }}
                </a>
            </li>
        @endcan
        @can('resource_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.resources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/resources") || request()->is("admin/resources/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-parachute-box c-sidebar-nav-icon">

                    </i>
                    National Resource
                </a>
            </li>
        @endcan
        @can('question_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-question-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.question.title') }}
                </a>
            </li>
        @endcan
        @can('answer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-adn c-sidebar-nav-icon">

                    </i>
                    Misuse Reported
                </a>
            </li>
        @endcan
        @can('country_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.country.title') }}
                </a>
            </li>
        @endcan
        @can('county_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.counties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/counties") || request()->is("admin/counties/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.county.title') }}
                </a>
            </li>
        @endcan
        @can('sub_county_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sub-counties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-counties") || request()->is("admin/sub-counties/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subCounty.title') }}
                </a>
            </li>
        @endcan
        @can('constituency_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.constituencies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/constituencies") || request()->is("admin/constituencies/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.constituency.title') }}
                </a>
            </li>
        @endcan
        @can('ward_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.wards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wards") || request()->is("admin/wards/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.ward.title') }}
                </a>
            </li>
        @endcan
        @can('office_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.offices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.office.title') }} / Person
                </a>
            </li>
        @endcan
        @can('source_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sources") || request()->is("admin/sources/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-certificate c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.source.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
