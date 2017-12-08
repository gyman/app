<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_open_file' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:openAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/open',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_settings' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/settings/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_settings_sections' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::sectionsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/settings/sections',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_settings_details' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\SettingsBundle\\Controller\\DefaultController::detailsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/settings/details',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_landing_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\LandingPageBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (    0 =>     array (      0 => 'text',      1 => 'gyman.vagrant',    ),  ),  5 =>   array (  ),),
        'gyman_app_default_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_app_default_currentschedule' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\DefaultController::currentScheduleAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/current-schedule',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_entry_new' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::createEntryAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/entries/member',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_entry_close' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::closeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/close',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/entries',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_entry_create_for_member' => array (  0 =>   array (    0 => 'occurrence',    1 => 'member',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickCreateEntryAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'member',    ),    1 =>     array (      0 => 'text',      1 => '/member',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'occurrence',    ),    3 =>     array (      0 => 'text',      1 => '/entries/quick-entry/occurrence',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_entry_remove_from_occurrence' => array (  0 =>   array (    0 => 'occurrence',    1 => 'member',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickRemoveEntryAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'member',    ),    1 =>     array (      0 => 'text',      1 => '/member',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'occurrence',    ),    3 =>     array (      0 => 'text',      1 => '/entries/quick-remove/occurrence',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_entries_close_for_occurrence' => array (  0 =>   array (    0 => 'occurrence',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\EntriesController::quickCloseEntriesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'occurrence',    ),    1 =>     array (      0 => 'text',      1 => '/entries/quick-close/activity',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_error_club_not_found' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\ErrorController::clubNotFoundAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/error/club-not-found',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_member_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::updateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/members',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_member_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/members/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_members_search_form' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::searchFormAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/members/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_members_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/members/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_members_typeahead' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::typeaheadAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/members/query',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_member_sendInvitation' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::sendInvitationAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/sendInvitation',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/members',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_member_register' => array (  0 =>   array (    0 => 'user',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\MembersController::registerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'user',    ),    1 =>     array (      0 => 'text',      1 => '/members/register',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_voucher_new' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/new',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/vouchers/member',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_vouchers_close' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::closeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/close',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/vouchers',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_voucher_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AppBundle\\Controller\\VouchersController::updateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/vouchers',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_reports_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\ReportsBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/reports/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\ProfileController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/users/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/users/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/users/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::updateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_users_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\AccountBundle\\Controller\\UserController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_dashboard_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dashboard/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_dashboard_getActivities' => array (  0 =>   array (    0 => 'date',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::getActivitiesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'date',    ),    1 =>     array (      0 => 'text',      1 => '/dashboard/dashboard/activities',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_dashboard_listClassMembers' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\DefaultController::listClassMembersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/dashboard/activity',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_dashboard_member_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\MemberController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dashboard/member/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'gyman_dashboard_member_calendar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Gyman\\Bundle\\DashboardBundle\\Controller\\MemberController::getCalendarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dashboard/member/calendar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_js_routing_js' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'fos_js_routing.controller:indexAction',    '_format' => 'js',  ),  2 =>   array (    '_format' => 'js|json',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'js|json',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/js/routing',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_show' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_register' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirm' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/register/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirmed' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/confirmed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_request' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/request',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_send_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/send-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_reset' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/resetting/reset',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_change_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/change-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_group_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/group/list',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_group_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/group/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_group_show' => array (  0 =>   array (    0 => 'groupName',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'groupName',    ),    1 =>     array (      0 => 'text',      1 => '/group',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_group_edit' => array (  0 =>   array (    0 => 'groupName',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'groupName',    ),    2 =>     array (      0 => 'text',      1 => '/group',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_group_delete' => array (  0 =>   array (    0 => 'groupName',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'groupName',    ),    2 =>     array (      0 => 'text',      1 => '/group',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dende_calendar_default_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dende_calendar_default_getevents' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::getEventsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/events',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dende_calendar_default_createevent' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::createEventAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/occurrence/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dende_calendar_default_updateevent' => array (  0 =>   array (    0 => 'occurrenceId',  ),  1 =>   array (    '_controller' => 'Dende\\CalendarBundle\\Controller\\DefaultController::updateEventAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'occurrenceId',    ),    1 =>     array (      0 => 'text',      1 => '/calendar/occurrence',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
