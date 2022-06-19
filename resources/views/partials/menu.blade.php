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
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/phone-numbers*") ? "c-show" : "" }} {{ request()->is("admin/wallets*") ? "c-show" : "" }}">
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
                    @can('phone_number_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.phone-numbers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/phone-numbers") || request()->is("admin/phone-numbers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.phoneNumber.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('wallet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wallets") || request()->is("admin/wallets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wallet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.wallet.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('place_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/states*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.place.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-school c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('state_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.states.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/states") || request()->is("admin/states/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.state.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('delivery_and_vehicle_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/delivery-types*") ? "c-show" : "" }} {{ request()->is("admin/vehicles*") ? "c-show" : "" }} {{ request()->is("admin/vehicle-types*") ? "c-show" : "" }} {{ request()->is("admin/vehicle-models*") ? "c-show" : "" }} {{ request()->is("admin/load-types*") ? "c-show" : "" }} {{ request()->is("admin/trailer-sizes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-truck-moving c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.deliveryAndVehicle.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('delivery_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.delivery-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delivery-types") || request()->is("admin/delivery-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck-moving c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.deliveryType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicles") || request()->is("admin/vehicles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicle.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-types") || request()->is("admin/vehicle-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_model_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-models.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-models") || request()->is("admin/vehicle-models/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleModel.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('load_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.load-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/load-types") || request()->is("admin/load-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck-loading c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.loadType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('trailer_size_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.trailer-sizes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trailer-sizes") || request()->is("admin/trailer-sizes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck-moving c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.trailerSize.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('currency_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.currencies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.currency.title') }}
                </a>
            </li>
        @endcan
        @can('carriers_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/carriers*") ? "c-show" : "" }} {{ request()->is("admin/carrier-posts*") ? "c-show" : "" }} {{ request()->is("admin/carrier-posts-descriptions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.carriersAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('carrier_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carriers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carriers") || request()->is("admin/carriers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carrier.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('carrier_post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carrier-posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carrier-posts") || request()->is("admin/carrier-posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carrierPost.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('carrier_posts_description_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carrier-posts-descriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carrier-posts-descriptions") || request()->is("admin/carrier-posts-descriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carrierPostsDescription.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('customer_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/customer-posts*") ? "c-show" : "" }} {{ request()->is("admin/customer-posts-descriptions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customerAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('customer_post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-posts") || request()->is("admin/customer-posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerPost.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_posts_description_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-posts-descriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-posts-descriptions") || request()->is("admin/customer-posts-descriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerPostsDescription.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('declarants_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/declarants*") ? "c-show" : "" }} {{ request()->is("admin/declarants-descriptions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.declarantsAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('declarant_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.declarants.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/declarants") || request()->is("admin/declarants/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.declarant.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('declarants_description_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.declarants-descriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/declarants-descriptions") || request()->is("admin/declarants-descriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.declarantsDescription.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('report_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/insertions*") ? "c-show" : "" }} {{ request()->is("admin/expenses-carrier-posts*") ? "c-show" : "" }} {{ request()->is("admin/expenses-customer-posts*") ? "c-show" : "" }} {{ request()->is("admin/expenses-declarant-posts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.report.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('insertion_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.insertions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/insertions") || request()->is("admin/insertions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.insertion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expenses_carrier_post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses-carrier-posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses-carrier-posts") || request()->is("admin/expenses-carrier-posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expensesCarrierPost.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expenses_customer_post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses-customer-posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses-customer-posts") || request()->is("admin/expenses-customer-posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expensesCustomerPost.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expenses_declarant_post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses-declarant-posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses-declarant-posts") || request()->is("admin/expenses-declarant-posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expensesDeclarantPost.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
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