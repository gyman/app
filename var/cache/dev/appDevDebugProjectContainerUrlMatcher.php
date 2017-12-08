<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_home
            if ('/_profiler' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', '_profiler_home'));
                }

                return $ret;
            }

            if (0 === strpos($pathinfo, '/_profiler/search')) {
                // _profiler_search
                if ('/_profiler/search' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                }

                // _profiler_search_bar
                if ('/_profiler/search_bar' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                }

            }

            // _profiler_phpinfo
            if ('/_profiler/phpinfo' === $pathinfo) {
                return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
            }

            // _profiler_open_file
            if ('/_profiler/open' === $pathinfo) {
                return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
            }

            // _profiler_router
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
            }

            // _profiler_exception
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
            }

            // _profiler_exception_css
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/settings')) {
            // gyman_settings
            if ('/settings' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gyman_settings',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_settings'));
                }

                return $ret;
            }

            // gyman_settings_sections
            if ('/settings/sections' === $pathinfo) {
                return array (  '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::sectionsAction',  '_route' => 'gyman_settings_sections',);
            }

            // gyman_settings_details
            if ('/settings/details' === $pathinfo) {
                return array (  '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::detailsAction',  '_route' => 'gyman_settings_details',);
            }

        }

        $host = $context->getHost();

        if (preg_match('#^gyman\\.vagrant$#si', $host, $hostMatches)) {
            // gyman_landing_index
            if ('' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Gyman\\Bundle\\LandingPageBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gyman_landing_index',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_landing_index'));
                }

                return $ret;
            }

        }

        // gyman_app_default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gyman_app_default_index',);
            if (substr($pathinfo, -1) !== '/') {
                return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_app_default_index'));
            }

            return $ret;
        }

        // gyman_app_default_currentschedule
        if ('/current-schedule' === $pathinfo) {
            return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\DefaultController::currentScheduleAction',  '_route' => 'gyman_app_default_currentschedule',);
        }

        if (0 === strpos($pathinfo, '/calendar')) {
            // dende_calendar_default_index
            if ('/calendar' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::indexAction',  '_route' => 'dende_calendar_default_index',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'dende_calendar_default_index'));
                }

                return $ret;
            }

            // dende_calendar_default_getevents
            if ('/calendar/events' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_dende_calendar_default_getevents;
                }

                return array (  '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::getEventsAction',  '_route' => 'dende_calendar_default_getevents',);
            }
            not_dende_calendar_default_getevents:

            if (0 === strpos($pathinfo, '/calendar/occurrence')) {
                // dende_calendar_default_createevent
                if ('/calendar/occurrence/new' === $pathinfo) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_dende_calendar_default_createevent;
                    }

                    return array (  '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::createEventAction',  '_route' => 'dende_calendar_default_createevent',);
                }
                not_dende_calendar_default_createevent:

                // dende_calendar_default_updateevent
                if (preg_match('#^/calendar/occurrence/(?P<occurrenceId>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_dende_calendar_default_updateevent;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dende_calendar_default_updateevent')), array (  '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::updateEventAction',));
                }
                not_dende_calendar_default_updateevent:

            }

        }

        elseif (0 === strpos($pathinfo, '/entries')) {
            // gyman_entry_new
            if (0 === strpos($pathinfo, '/entries/member') && preg_match('#^/entries/member/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_gyman_entry_new;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_entry_new')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::createEntryAction',));
            }
            not_gyman_entry_new:

            // gyman_entry_close
            if (preg_match('#^/entries/(?P<id>[^/]++)/close$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_entry_close')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::closeAction',));
            }

            if (0 === strpos($pathinfo, '/entries/quick-')) {
                // gyman_entry_create_for_member
                if (0 === strpos($pathinfo, '/entries/quick-entry/occurrence') && preg_match('#^/entries/quick\\-entry/occurrence/(?P<occurrence>[^/]++)/member/(?P<member>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_entry_create_for_member')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickCreateEntryAction',));
                }

                // gyman_entry_remove_from_occurrence
                if (0 === strpos($pathinfo, '/entries/quick-remove/occurrence') && preg_match('#^/entries/quick\\-remove/occurrence/(?P<occurrence>[^/]++)/member/(?P<member>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_entry_remove_from_occurrence')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickRemoveEntryAction',));
                }

                // gyman_entries_close_for_occurrence
                if (0 === strpos($pathinfo, '/entries/quick-close/activity') && preg_match('#^/entries/quick\\-close/activity/(?P<occurrence>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_entries_close_for_occurrence')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickCloseEntriesAction',));
                }

            }

        }

        // gyman_error_club_not_found
        if ('/error/club-not-found' === $pathinfo) {
            return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\ErrorController::clubNotFoundAction',  '_route' => 'gyman_error_club_not_found',);
        }

        if (0 === strpos($pathinfo, '/members')) {
            // gyman_member_edit
            if (preg_match('#^/members/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_member_edit')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::updateAction',));
            }

            // gyman_member_new
            if ('/members/create' === $pathinfo) {
                return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::createAction',  '_route' => 'gyman_member_new',);
            }

            if (0 === strpos($pathinfo, '/members/search')) {
                // gyman_members_search_form
                if ('/members/search' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_gyman_members_search_form;
                    }

                    return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::searchFormAction',  '_route' => 'gyman_members_search_form',);
                }
                not_gyman_members_search_form:

                // gyman_members_search
                if ('/members/search' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_gyman_members_search;
                    }

                    return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::searchAction',  '_route' => 'gyman_members_search',);
                }
                not_gyman_members_search:

            }

            // gyman_members_typeahead
            if ('/members/query' === $pathinfo) {
                return array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::typeaheadAction',  '_route' => 'gyman_members_typeahead',);
            }

            // gyman_member_sendInvitation
            if (preg_match('#^/members/(?P<id>[^/]++)/sendInvitation$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_member_sendInvitation')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::sendInvitationAction',));
            }

            // gyman_member_register
            if (0 === strpos($pathinfo, '/members/register') && preg_match('#^/members/register/(?P<user>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_member_register')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::registerAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/vouchers')) {
            // gyman_voucher_new
            if (0 === strpos($pathinfo, '/vouchers/member') && preg_match('#^/vouchers/member/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_gyman_voucher_new;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_voucher_new')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::newAction',));
            }
            not_gyman_voucher_new:

            // gyman_vouchers_close
            if (preg_match('#^/vouchers/(?P<id>[^/]++)/close$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_vouchers_close')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::closeAction',));
            }

            // gyman_voucher_update
            if (preg_match('#^/vouchers/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_gyman_voucher_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_voucher_update')), array (  '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::updateAction',));
            }
            not_gyman_voucher_update:

        }

        elseif (0 === strpos($pathinfo, '/re')) {
            // gyman_reports_index
            if ('/reports' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Gyman\\Bundle\\ReportsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gyman_reports_index',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_reports_index'));
                }

                return $ret;
            }

            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if ('/register' === $trimmedPathinfo) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_fos_user_registration_register;
                    }

                    $ret = array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                    if (substr($pathinfo, -1) !== '/') {
                        return array_replace($ret, $this->redirect($pathinfo.'/', 'fos_user_registration_register'));
                    }

                    return $ret;
                }
                not_fos_user_registration_register:

                // fos_user_registration_check_email
                if ('/register/check-email' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fos_user_registration_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                }
                not_fos_user_registration_check_email:

                if (0 === strpos($pathinfo, '/register/confirm')) {
                    // fos_user_registration_confirm
                    if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_fos_user_registration_confirm;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                    }
                    not_fos_user_registration_confirm:

                    // fos_user_registration_confirmed
                    if ('/register/confirmed' === $pathinfo) {
                        if ('GET' !== $canonicalMethod) {
                            $allow[] = 'GET';
                            goto not_fos_user_registration_confirmed;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                    }
                    not_fos_user_registration_confirmed:

                }

            }

            elseif (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ('/resetting/request' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

                // fos_user_resetting_send_email
                if ('/resetting/send-email' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ('/resetting/check-email' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

            }

        }

        elseif (0 === strpos($pathinfo, '/profile')) {
            // profile_edit
            if ('/profile' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\ProfileController::indexAction',  '_route' => 'profile_edit',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'profile_edit'));
                }

                return $ret;
            }

            // fos_user_profile_show
            if ('/profile' === $trimmedPathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_fos_user_profile_show;
                }

                $ret = array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'fos_user_profile_show'));
                }

                return $ret;
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ('/profile/edit' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

            // fos_user_change_password
            if ('/profile/change-password' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

        }

        elseif (0 === strpos($pathinfo, '/admin/users')) {
            // admin_users
            if ('/admin/users' === $trimmedPathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_admin_users;
                }

                $ret = array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::indexAction',  '_route' => 'admin_users',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'admin_users'));
                }

                return $ret;
            }
            not_admin_users:

            // admin_users_create
            if ('/admin/users/' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_admin_users_create;
                }

                return array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::createAction',  '_route' => 'admin_users_create',);
            }
            not_admin_users_create:

            // admin_users_new
            if ('/admin/users/new' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_admin_users_new;
                }

                return array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::newAction',  '_route' => 'admin_users_new',);
            }
            not_admin_users_new:

            // admin_users_show
            if (preg_match('#^/admin/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_admin_users_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_show')), array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::showAction',));
            }
            not_admin_users_show:

            // admin_users_edit
            if (preg_match('#^/admin/users/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_admin_users_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_edit')), array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::editAction',));
            }
            not_admin_users_edit:

            // admin_users_update
            if (preg_match('#^/admin/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('PUT' !== $canonicalMethod) {
                    $allow[] = 'PUT';
                    goto not_admin_users_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_update')), array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::updateAction',));
            }
            not_admin_users_update:

            // admin_users_delete
            if (preg_match('#^/admin/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('DELETE' !== $canonicalMethod) {
                    $allow[] = 'DELETE';
                    goto not_admin_users_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_users_delete')), array (  '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::deleteAction',));
            }
            not_admin_users_delete:

        }

        elseif (0 === strpos($pathinfo, '/dashboard')) {
            // gyman_dashboard_index
            if ('/dashboard' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gyman_dashboard_index',);
                if (substr($pathinfo, -1) !== '/') {
                    return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_dashboard_index'));
                }

                return $ret;
            }

            // gyman_dashboard_getActivities
            if (0 === strpos($pathinfo, '/dashboard/dashboard/activities') && preg_match('#^/dashboard/dashboard/activities/(?P<date>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_dashboard_getActivities')), array (  '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::getActivitiesAction',));
            }

            // gyman_dashboard_listClassMembers
            if (0 === strpos($pathinfo, '/dashboard/activity') && preg_match('#^/dashboard/activity/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'gyman_dashboard_listClassMembers')), array (  '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::listClassMembersAction',));
            }

            if (0 === strpos($pathinfo, '/dashboard/member')) {
                // gyman_dashboard_member_index
                if ('/dashboard/member' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\MemberController::indexAction',  '_route' => 'gyman_dashboard_member_index',);
                    if (substr($pathinfo, -1) !== '/') {
                        return array_replace($ret, $this->redirect($pathinfo.'/', 'gyman_dashboard_member_index'));
                    }

                    return $ret;
                }

                // gyman_dashboard_member_calendar
                if ('/dashboard/member/calendar' === $pathinfo) {
                    return array (  '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\MemberController::getCalendarAction',  '_route' => 'gyman_dashboard_member_calendar',);
                }

            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            if ('GET' !== $canonicalMethod) {
                $allow[] = 'GET';
                goto not_fos_js_routing_js;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }
        not_fos_js_routing_js:

        if (0 === strpos($pathinfo, '/login')) {
            // fos_user_security_login
            if ('/login' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fos_user_security_login;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
            }
            not_fos_user_security_login:

            // fos_user_security_check
            if ('/login_check' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_fos_user_security_check;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
            }
            not_fos_user_security_check:

        }

        // fos_user_security_logout
        if ('/logout' === $pathinfo) {
            if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                $allow = array_merge($allow, array('GET', 'POST'));
                goto not_fos_user_security_logout;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }
        not_fos_user_security_logout:

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ('/group/list' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ('/group/new' === $pathinfo) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fos_user_group_new;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }
            not_fos_user_group_new:

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_fos_user_group_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }
            not_fos_user_group_edit:

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
