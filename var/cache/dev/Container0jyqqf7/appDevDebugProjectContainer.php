<?php

namespace Container0jyqqf7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class appDevDebugProjectContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    public function __construct()
    {
        $dir = $this->targetDirs[0] = \dirname(__DIR__);
        for ($i = 1; $i <= 2; ++$i) {
            $this->targetDirs[$i] = $dir = \dirname($dir);
        }
        $this->parameters = $this->getDefaultParameters();

        $this->services = array();
        $this->normalizedIds = array(
            'monolog.handler.createnewclub' => 'monolog.handler.createNewClub',
            'monolog.logger.createnewclub' => 'monolog.logger.createNewClub',
            'symfony\\bundle\\frameworkbundle\\controller\\redirectcontroller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController',
            'symfony\\bundle\\frameworkbundle\\controller\\templatecontroller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController',
        );
        $this->syntheticIds = array(
            'kernel' => true,
        );
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'annotations.reader' => 'getAnnotations_ReaderService',
            'assets.context' => 'getAssets_ContextService',
            'assets.packages' => 'getAssets_PackagesService',
            'cache.annotations' => 'getCache_AnnotationsService',
            'cache.app' => 'getCache_AppService',
            'cache.serializer' => 'getCache_SerializerService',
            'cache.system' => 'getCache_SystemService',
            'cache.validator' => 'getCache_ValidatorService',
            'config_cache_factory' => 'getConfigCacheFactoryService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'data_collector.form' => 'getDataCollector_FormService',
            'data_collector.form.extractor' => 'getDataCollector_Form_ExtractorService',
            'data_collector.request' => 'getDataCollector_RequestService',
            'data_collector.router' => 'getDataCollector_RouterService',
            'data_collector.translation' => 'getDataCollector_TranslationService',
            'debug.argument_resolver' => 'getDebug_ArgumentResolverService',
            'debug.controller_resolver' => 'getDebug_ControllerResolverService',
            'debug.debug_handlers_listener' => 'getDebug_DebugHandlersListenerService',
            'debug.event_dispatcher' => 'getDebug_EventDispatcherService',
            'debug.file_link_formatter' => 'getDebug_FileLinkFormatterService',
            'debug.log_processor' => 'getDebug_LogProcessorService',
            'debug.security.access.decision_manager' => 'getDebug_Security_Access_DecisionManagerService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'debug.validator' => 'getDebug_ValidatorService',
            'dende_calendar.listener.doctrine_event_listener' => 'getDendeCalendar_Listener_DoctrineEventListenerService',
            'dende_multitenancy.tenant_manager' => 'getDendeMultitenancy_TenantManagerService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.dbal.logger' => 'getDoctrine_Dbal_LoggerService',
            'doctrine.dbal.logger.profiling.default' => 'getDoctrine_Dbal_Logger_Profiling_DefaultService',
            'doctrine.dbal.logger.profiling.maintanance' => 'getDoctrine_Dbal_Logger_Profiling_MaintananceService',
            'doctrine.dbal.logger.profiling.tenant' => 'getDoctrine_Dbal_Logger_Profiling_TenantService',
            'doctrine.dbal.tenant_connection' => 'getDoctrine_Dbal_TenantConnectionService',
            'doctrine.orm.container_repository_factory' => 'getDoctrine_Orm_ContainerRepositoryFactoryService',
            'doctrine.orm.default_entity_listener_resolver' => 'getDoctrine_Orm_DefaultEntityListenerResolverService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_listeners.attach_entity_listeners' => 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.listeners.resolve_target_entity' => 'getDoctrine_Orm_Listeners_ResolveTargetEntityService',
            'doctrine.orm.naming_strategy.default' => 'getDoctrine_Orm_NamingStrategy_DefaultService',
            'doctrine.orm.quote_strategy.default' => 'getDoctrine_Orm_QuoteStrategy_DefaultService',
            'doctrine.orm.tenant_entity_listener_resolver' => 'getDoctrine_Orm_TenantEntityListenerResolverService',
            'doctrine.orm.tenant_entity_manager' => 'getDoctrine_Orm_TenantEntityManagerService',
            'doctrine.orm.tenant_listeners.attach_entity_listeners' => 'getDoctrine_Orm_TenantListeners_AttachEntityListenersService',
            'doctrine.orm.tenant_manager_configurator' => 'getDoctrine_Orm_TenantManagerConfiguratorService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService',
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService',
            'doctrine_cache.providers.doctrine.orm.tenant_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_TenantMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.tenant_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_TenantQueryCacheService',
            'doctrine_cache.providers.doctrine.orm.tenant_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_TenantResultCacheService',
            'file_locator' => 'getFileLocatorService',
            'fos_user.user_listener' => 'getFosUser_UserListenerService',
            'fos_user.util.canonical_fields_updater' => 'getFosUser_Util_CanonicalFieldsUpdaterService',
            'fos_user.util.email_canonicalizer' => 'getFosUser_Util_EmailCanonicalizerService',
            'fos_user.util.password_updater' => 'getFosUser_Util_PasswordUpdaterService',
            'fragment.listener' => 'getFragment_ListenerService',
            'gyman.app.subdomain_name_listener' => 'getGyman_App_SubdomainNameListenerService',
            'gyman.app.tenant_provider' => 'getGyman_App_TenantProviderService',
            'gyman.app.twig.avatar' => 'getGyman_App_Twig_AvatarService',
            'gyman.app.twig.entries_extension' => 'getGyman_App_Twig_EntriesExtensionService',
            'gyman.club.repository' => 'getGyman_Club_RepositoryService',
            'gyman.default.request.arraycollection_converter' => 'getGyman_Default_Request_ArraycollectionConverterService',
            'gyman.twig.voucher_extension' => 'getGyman_Twig_VoucherExtensionService',
            'http_kernel' => 'getHttpKernelService',
            'knp_menu.matcher' => 'getKnpMenu_MatcherService',
            'knp_menu.menu_provider' => 'getKnpMenu_MenuProviderService',
            'knp_menu.renderer_provider' => 'getKnpMenu_RendererProviderService',
            'liip_functional_test.exception_listener' => 'getLiipFunctionalTest_ExceptionListenerService',
            'liip_functional_test.validator' => 'getLiipFunctionalTest_ValidatorService',
            'locale_listener' => 'getLocaleListenerService',
            'monolog.handler.grouped_main' => 'getMonolog_Handler_GroupedMainService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.handler.streamed_main' => 'getMonolog_Handler_StreamedMainService',
            'monolog.logger.cache' => 'getMonolog_Logger_CacheService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.event' => 'getMonolog_Logger_EventService',
            'monolog.logger.php' => 'getMonolog_Logger_PhpService',
            'monolog.logger.profiler' => 'getMonolog_Logger_ProfilerService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.translation' => 'getMonolog_Logger_TranslationService',
            'monolog.processor.psr_log_message' => 'getMonolog_Processor_PsrLogMessageService',
            'ob_highcharts.twig.highcharts_extension' => 'getObHighcharts_Twig_HighchartsExtensionService',
            'profiler' => 'getProfilerService',
            'profiler_listener' => 'getProfilerListenerService',
            'request_stack' => 'getRequestStackService',
            'resolve_controller_name_subscriber' => 'getResolveControllerNameSubscriberService',
            'response_listener' => 'getResponseListenerService',
            'router' => 'getRouterService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map' => 'getSecurity_Firewall_MapService',
            'security.logout_url_generator' => 'getSecurity_LogoutUrlGeneratorService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.datetime' => 'getSensioFrameworkExtra_Converter_DatetimeService',
            'sensio_framework_extra.converter.doctrine.orm' => 'getSensioFrameworkExtra_Converter_Doctrine_OrmService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.security.listener' => 'getSensioFrameworkExtra_Security_ListenerService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'sentry.client' => 'getSentry_ClientService',
            'sentry.exception_listener' => 'getSentry_ExceptionListenerService',
            'service_locator.sr6ctxe' => 'getServiceLocator_Sr6ctxeService',
            'session.save_listener' => 'getSession_SaveListenerService',
            'session_listener' => 'getSessionListenerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'time.datetime_formatter' => 'getTime_DatetimeFormatterService',
            'time.templating.helper.time' => 'getTime_Templating_Helper_TimeService',
            'translator' => 'getTranslatorService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator_listener' => 'getTranslatorListenerService',
            'twig' => 'getTwigService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.profile' => 'getTwig_ProfileService',
            'uri_signer' => 'getUriSignerService',
            'validate_request_listener' => 'getValidateRequestListenerService',
            'validator.builder' => 'getValidator_BuilderService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
            'web_profiler.csp.handler' => 'getWebProfiler_Csp_HandlerService',
            'web_profiler.debug_toolbar' => 'getWebProfiler_DebugToolbarService',
        );
        $this->fileMap = array(
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => __DIR__.'/getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => __DIR__.'/getTemplateControllerService.php',
            'account_bundle.profile.edit_type' => __DIR__.'/getAccountBundle_Profile_EditTypeService.php',
            'account_bundle.registered_user_subscriber' => __DIR__.'/getAccountBundle_RegisteredUserSubscriberService.php',
            'account_bundle.registration.form.type' => __DIR__.'/getAccountBundle_Registration_Form_TypeService.php',
            'account_bundle.updated_profile_subscriber' => __DIR__.'/getAccountBundle_UpdatedProfileSubscriberService.php',
            'annotations.cache_warmer' => __DIR__.'/getAnnotations_CacheWarmerService.php',
            'app.listener.open_entry' => __DIR__.'/getApp_Listener_OpenEntryService.php',
            'app.listener.user_for_member_created' => __DIR__.'/getApp_Listener_UserForMemberCreatedService.php',
            'argument_resolver.default' => __DIR__.'/getArgumentResolver_DefaultService.php',
            'argument_resolver.request' => __DIR__.'/getArgumentResolver_RequestService.php',
            'argument_resolver.request_attribute' => __DIR__.'/getArgumentResolver_RequestAttributeService.php',
            'argument_resolver.service' => __DIR__.'/getArgumentResolver_ServiceService.php',
            'argument_resolver.session' => __DIR__.'/getArgumentResolver_SessionService.php',
            'argument_resolver.variadic' => __DIR__.'/getArgumentResolver_VariadicService.php',
            'cache.default_clearer' => __DIR__.'/getCache_DefaultClearerService.php',
            'cache.global_clearer' => __DIR__.'/getCache_GlobalClearerService.php',
            'cache.system_clearer' => __DIR__.'/getCache_SystemClearerService.php',
            'cache_clearer' => __DIR__.'/getCacheClearerService.php',
            'cache_warmer' => __DIR__.'/getCacheWarmerService.php',
            'chart' => __DIR__.'/getChartService.php',
            'config.resource.self_checking_resource_checker' => __DIR__.'/getConfig_Resource_SelfCheckingResourceCheckerService.php',
            'console.command.about' => __DIR__.'/getConsole_Command_AboutService.php',
            'console.command.assets_install' => __DIR__.'/getConsole_Command_AssetsInstallService.php',
            'console.command.cache_clear' => __DIR__.'/getConsole_Command_CacheClearService.php',
            'console.command.cache_pool_clear' => __DIR__.'/getConsole_Command_CachePoolClearService.php',
            'console.command.cache_pool_prune' => __DIR__.'/getConsole_Command_CachePoolPruneService.php',
            'console.command.cache_warmup' => __DIR__.'/getConsole_Command_CacheWarmupService.php',
            'console.command.config_debug' => __DIR__.'/getConsole_Command_ConfigDebugService.php',
            'console.command.config_dump_reference' => __DIR__.'/getConsole_Command_ConfigDumpReferenceService.php',
            'console.command.container_debug' => __DIR__.'/getConsole_Command_ContainerDebugService.php',
            'console.command.debug_autowiring' => __DIR__.'/getConsole_Command_DebugAutowiringService.php',
            'console.command.event_dispatcher_debug' => __DIR__.'/getConsole_Command_EventDispatcherDebugService.php',
            'console.command.form_debug' => __DIR__.'/getConsole_Command_FormDebugService.php',
            'console.command.router_debug' => __DIR__.'/getConsole_Command_RouterDebugService.php',
            'console.command.router_match' => __DIR__.'/getConsole_Command_RouterMatchService.php',
            'console.command.translation_debug' => __DIR__.'/getConsole_Command_TranslationDebugService.php',
            'console.command.translation_update' => __DIR__.'/getConsole_Command_TranslationUpdateService.php',
            'console.command.xliff_lint' => __DIR__.'/getConsole_Command_XliffLintService.php',
            'console.command.yaml_lint' => __DIR__.'/getConsole_Command_YamlLintService.php',
            'console.command_loader' => __DIR__.'/getConsole_CommandLoaderService.php',
            'console.error_listener' => __DIR__.'/getConsole_ErrorListenerService.php',
            'debug.dump_listener' => __DIR__.'/getDebug_DumpListenerService.php',
            'dende_calendar.calendar_repository' => __DIR__.'/getDendeCalendar_CalendarRepositoryService.php',
            'dende_calendar.entity_manager' => __DIR__.'/getDendeCalendar_EntityManagerService.php',
            'dende_calendar.event_repository' => __DIR__.'/getDendeCalendar_EventRepositoryService.php',
            'dende_calendar.factory.calendar' => __DIR__.'/getDendeCalendar_Factory_CalendarService.php',
            'dende_calendar.factory.event' => __DIR__.'/getDendeCalendar_Factory_EventService.php',
            'dende_calendar.factory.occurrence' => __DIR__.'/getDendeCalendar_Factory_OccurrenceService.php',
            'dende_calendar.form_type.create_event' => __DIR__.'/getDendeCalendar_FormType_CreateEventService.php',
            'dende_calendar.form_type.range_dates' => __DIR__.'/getDendeCalendar_FormType_RangeDatesService.php',
            'dende_calendar.form_type.update_event' => __DIR__.'/getDendeCalendar_FormType_UpdateEventService.php',
            'dende_calendar.handler.create_calendar' => __DIR__.'/getDendeCalendar_Handler_CreateCalendarService.php',
            'dende_calendar.handler.create_event' => __DIR__.'/getDendeCalendar_Handler_CreateEventService.php',
            'dende_calendar.handler.update_event' => __DIR__.'/getDendeCalendar_Handler_UpdateEventService.php',
            'dende_calendar.handler.update_occurrence' => __DIR__.'/getDendeCalendar_Handler_UpdateOccurrenceService.php',
            'dende_calendar.id_generator' => __DIR__.'/getDendeCalendar_IdGeneratorService.php',
            'dende_calendar.manager.update_occurrence' => __DIR__.'/getDendeCalendar_Manager_UpdateOccurrenceService.php',
            'dende_calendar.new_calendar_creation' => __DIR__.'/getDendeCalendar_NewCalendarCreationService.php',
            'dende_calendar.occurrences_provider' => __DIR__.'/getDendeCalendar_OccurrencesProviderService.php',
            'dende_calendar.occurrences_repository' => __DIR__.'/getDendeCalendar_OccurrencesRepositoryService.php',
            'dende_calendar.update_strategy.single' => __DIR__.'/getDendeCalendar_UpdateStrategy_SingleService.php',
            'dende_multitenancy.listener.command' => __DIR__.'/getDendeMultitenancy_Listener_CommandService.php',
            'dependency_injection.config.container_parameters_resource_checker' => __DIR__.'/getDependencyInjection_Config_ContainerParametersResourceCheckerService.php',
            'deprecated.form.registry' => __DIR__.'/getDeprecated_Form_RegistryService.php',
            'deprecated.form.registry.csrf' => __DIR__.'/getDeprecated_Form_Registry_CsrfService.php',
            'doctrine.cache_clear_metadata_command' => __DIR__.'/getDoctrine_CacheClearMetadataCommandService.php',
            'doctrine.cache_clear_query_cache_command' => __DIR__.'/getDoctrine_CacheClearQueryCacheCommandService.php',
            'doctrine.cache_clear_result_command' => __DIR__.'/getDoctrine_CacheClearResultCommandService.php',
            'doctrine.cache_collection_region_command' => __DIR__.'/getDoctrine_CacheCollectionRegionCommandService.php',
            'doctrine.clear_entity_region_command' => __DIR__.'/getDoctrine_ClearEntityRegionCommandService.php',
            'doctrine.clear_query_region_command' => __DIR__.'/getDoctrine_ClearQueryRegionCommandService.php',
            'doctrine.database_create_command' => __DIR__.'/getDoctrine_DatabaseCreateCommandService.php',
            'doctrine.database_drop_command' => __DIR__.'/getDoctrine_DatabaseDropCommandService.php',
            'doctrine.database_import_command' => __DIR__.'/getDoctrine_DatabaseImportCommandService.php',
            'doctrine.dbal.maintanance_connection' => __DIR__.'/getDoctrine_Dbal_MaintananceConnectionService.php',
            'doctrine.ensure_production_settings_command' => __DIR__.'/getDoctrine_EnsureProductionSettingsCommandService.php',
            'doctrine.fixtures_load_command' => __DIR__.'/getDoctrine_FixturesLoadCommandService.php',
            'doctrine.generate_entities_command' => __DIR__.'/getDoctrine_GenerateEntitiesCommandService.php',
            'doctrine.mapping_convert_command' => __DIR__.'/getDoctrine_MappingConvertCommandService.php',
            'doctrine.mapping_import_command' => __DIR__.'/getDoctrine_MappingImportCommandService.php',
            'doctrine.mapping_info_command' => __DIR__.'/getDoctrine_MappingInfoCommandService.php',
            'doctrine.orm.default_entity_manager.property_info_extractor' => __DIR__.'/getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService.php',
            'doctrine.orm.proxy_cache_warmer' => __DIR__.'/getDoctrine_Orm_ProxyCacheWarmerService.php',
            'doctrine.orm.tenant_entity_manager.property_info_extractor' => __DIR__.'/getDoctrine_Orm_TenantEntityManager_PropertyInfoExtractorService.php',
            'doctrine.orm.validator.unique' => __DIR__.'/getDoctrine_Orm_Validator_UniqueService.php',
            'doctrine.query_dql_command' => __DIR__.'/getDoctrine_QueryDqlCommandService.php',
            'doctrine.query_sql_command' => __DIR__.'/getDoctrine_QuerySqlCommandService.php',
            'doctrine.schema_create_command' => __DIR__.'/getDoctrine_SchemaCreateCommandService.php',
            'doctrine.schema_drop_command' => __DIR__.'/getDoctrine_SchemaDropCommandService.php',
            'doctrine.schema_update_command' => __DIR__.'/getDoctrine_SchemaUpdateCommandService.php',
            'doctrine.schema_validate_command' => __DIR__.'/getDoctrine_SchemaValidateCommandService.php',
            'doctrine_cache.contains_command' => __DIR__.'/getDoctrineCache_ContainsCommandService.php',
            'doctrine_cache.delete_command' => __DIR__.'/getDoctrineCache_DeleteCommandService.php',
            'doctrine_cache.flush_command' => __DIR__.'/getDoctrineCache_FlushCommandService.php',
            'doctrine_cache.stats_command' => __DIR__.'/getDoctrineCache_StatsCommandService.php',
            'doctrine_migrations.diff_command' => __DIR__.'/getDoctrineMigrations_DiffCommandService.php',
            'doctrine_migrations.execute_command' => __DIR__.'/getDoctrineMigrations_ExecuteCommandService.php',
            'doctrine_migrations.generate_command' => __DIR__.'/getDoctrineMigrations_GenerateCommandService.php',
            'doctrine_migrations.latest_command' => __DIR__.'/getDoctrineMigrations_LatestCommandService.php',
            'doctrine_migrations.migrate_command' => __DIR__.'/getDoctrineMigrations_MigrateCommandService.php',
            'doctrine_migrations.status_command' => __DIR__.'/getDoctrineMigrations_StatusCommandService.php',
            'doctrine_migrations.version_command' => __DIR__.'/getDoctrineMigrations_VersionCommandService.php',
            'filesystem' => __DIR__.'/getFilesystemService.php',
            'form.factory' => __DIR__.'/getForm_FactoryService.php',
            'form.registry' => __DIR__.'/getForm_RegistryService.php',
            'form.resolved_type_factory' => __DIR__.'/getForm_ResolvedTypeFactoryService.php',
            'form.server_params' => __DIR__.'/getForm_ServerParamsService.php',
            'form.type.birthday' => __DIR__.'/getForm_Type_BirthdayService.php',
            'form.type.button' => __DIR__.'/getForm_Type_ButtonService.php',
            'form.type.checkbox' => __DIR__.'/getForm_Type_CheckboxService.php',
            'form.type.choice' => __DIR__.'/getForm_Type_ChoiceService.php',
            'form.type.collection' => __DIR__.'/getForm_Type_CollectionService.php',
            'form.type.country' => __DIR__.'/getForm_Type_CountryService.php',
            'form.type.currency' => __DIR__.'/getForm_Type_CurrencyService.php',
            'form.type.date' => __DIR__.'/getForm_Type_DateService.php',
            'form.type.datetime' => __DIR__.'/getForm_Type_DatetimeService.php',
            'form.type.email' => __DIR__.'/getForm_Type_EmailService.php',
            'form.type.entity' => __DIR__.'/getForm_Type_EntityService.php',
            'form.type.file' => __DIR__.'/getForm_Type_FileService.php',
            'form.type.form' => __DIR__.'/getForm_Type_FormService.php',
            'form.type.hidden' => __DIR__.'/getForm_Type_HiddenService.php',
            'form.type.integer' => __DIR__.'/getForm_Type_IntegerService.php',
            'form.type.language' => __DIR__.'/getForm_Type_LanguageService.php',
            'form.type.locale' => __DIR__.'/getForm_Type_LocaleService.php',
            'form.type.money' => __DIR__.'/getForm_Type_MoneyService.php',
            'form.type.number' => __DIR__.'/getForm_Type_NumberService.php',
            'form.type.password' => __DIR__.'/getForm_Type_PasswordService.php',
            'form.type.percent' => __DIR__.'/getForm_Type_PercentService.php',
            'form.type.radio' => __DIR__.'/getForm_Type_RadioService.php',
            'form.type.range' => __DIR__.'/getForm_Type_RangeService.php',
            'form.type.repeated' => __DIR__.'/getForm_Type_RepeatedService.php',
            'form.type.reset' => __DIR__.'/getForm_Type_ResetService.php',
            'form.type.search' => __DIR__.'/getForm_Type_SearchService.php',
            'form.type.submit' => __DIR__.'/getForm_Type_SubmitService.php',
            'form.type.text' => __DIR__.'/getForm_Type_TextService.php',
            'form.type.textarea' => __DIR__.'/getForm_Type_TextareaService.php',
            'form.type.time' => __DIR__.'/getForm_Type_TimeService.php',
            'form.type.timezone' => __DIR__.'/getForm_Type_TimezoneService.php',
            'form.type.url' => __DIR__.'/getForm_Type_UrlService.php',
            'form.type_extension.csrf' => __DIR__.'/getForm_TypeExtension_CsrfService.php',
            'form.type_extension.form.data_collector' => __DIR__.'/getForm_TypeExtension_Form_DataCollectorService.php',
            'form.type_extension.form.http_foundation' => __DIR__.'/getForm_TypeExtension_Form_HttpFoundationService.php',
            'form.type_extension.form.validator' => __DIR__.'/getForm_TypeExtension_Form_ValidatorService.php',
            'form.type_extension.repeated.validator' => __DIR__.'/getForm_TypeExtension_Repeated_ValidatorService.php',
            'form.type_extension.submit.validator' => __DIR__.'/getForm_TypeExtension_Submit_ValidatorService.php',
            'form.type_extension.upload.validator' => __DIR__.'/getForm_TypeExtension_Upload_ValidatorService.php',
            'form.type_guesser.doctrine' => __DIR__.'/getForm_TypeGuesser_DoctrineService.php',
            'form.type_guesser.validator' => __DIR__.'/getForm_TypeGuesser_ValidatorService.php',
            'fos_js_routing.controller' => __DIR__.'/getFosJsRouting_ControllerService.php',
            'fos_js_routing.extractor' => __DIR__.'/getFosJsRouting_ExtractorService.php',
            'fos_js_routing.serializer' => __DIR__.'/getFosJsRouting_SerializerService.php',
            'fos_user.change_password.form.factory' => __DIR__.'/getFosUser_ChangePassword_Form_FactoryService.php',
            'fos_user.change_password.form.type' => __DIR__.'/getFosUser_ChangePassword_Form_TypeService.php',
            'fos_user.command.activate_user' => __DIR__.'/getFosUser_Command_ActivateUserService.php',
            'fos_user.command.change_password' => __DIR__.'/getFosUser_Command_ChangePasswordService.php',
            'fos_user.command.create_user' => __DIR__.'/getFosUser_Command_CreateUserService.php',
            'fos_user.command.deactivate_user' => __DIR__.'/getFosUser_Command_DeactivateUserService.php',
            'fos_user.command.demote_user' => __DIR__.'/getFosUser_Command_DemoteUserService.php',
            'fos_user.command.promote_user' => __DIR__.'/getFosUser_Command_PromoteUserService.php',
            'fos_user.group.form.factory' => __DIR__.'/getFosUser_Group_Form_FactoryService.php',
            'fos_user.group.form.type' => __DIR__.'/getFosUser_Group_Form_TypeService.php',
            'fos_user.group_manager' => __DIR__.'/getFosUser_GroupManagerService.php',
            'fos_user.listener.authentication' => __DIR__.'/getFosUser_Listener_AuthenticationService.php',
            'fos_user.listener.flash' => __DIR__.'/getFosUser_Listener_FlashService.php',
            'fos_user.listener.resetting' => __DIR__.'/getFosUser_Listener_ResettingService.php',
            'fos_user.mailer' => __DIR__.'/getFosUser_MailerService.php',
            'fos_user.object_manager' => __DIR__.'/getFosUser_ObjectManagerService.php',
            'fos_user.profile.form.factory' => __DIR__.'/getFosUser_Profile_Form_FactoryService.php',
            'fos_user.profile.form.type' => __DIR__.'/getFosUser_Profile_Form_TypeService.php',
            'fos_user.registration.form.factory' => __DIR__.'/getFosUser_Registration_Form_FactoryService.php',
            'fos_user.registration.form.type' => __DIR__.'/getFosUser_Registration_Form_TypeService.php',
            'fos_user.resetting.form.factory' => __DIR__.'/getFosUser_Resetting_Form_FactoryService.php',
            'fos_user.resetting.form.type' => __DIR__.'/getFosUser_Resetting_Form_TypeService.php',
            'fos_user.security.interactive_login_listener' => __DIR__.'/getFosUser_Security_InteractiveLoginListenerService.php',
            'fos_user.security.login_manager' => __DIR__.'/getFosUser_Security_LoginManagerService.php',
            'fos_user.user_manager' => __DIR__.'/getFosUser_UserManagerService.php',
            'fos_user.user_provider.username' => __DIR__.'/getFosUser_UserProvider_UsernameService.php',
            'fos_user.username_form_type' => __DIR__.'/getFosUser_UsernameFormTypeService.php',
            'fos_user.util.token_generator' => __DIR__.'/getFosUser_Util_TokenGeneratorService.php',
            'fos_user.util.user_manipulator' => __DIR__.'/getFosUser_Util_UserManipulatorService.php',
            'fragment.handler' => __DIR__.'/getFragment_HandlerService.php',
            'fragment.renderer.hinclude' => __DIR__.'/getFragment_Renderer_HincludeService.php',
            'fragment.renderer.inline' => __DIR__.'/getFragment_Renderer_InlineService.php',
            'gyman.account.logout_handler' => __DIR__.'/getGyman_Account_LogoutHandlerService.php',
            'gyman.app.command.clear_entries' => __DIR__.'/getGyman_App_Command_ClearEntriesService.php',
            'gyman.app.command.clear_expired_vouchers' => __DIR__.'/getGyman_App_Command_ClearExpiredVouchersService.php',
            'gyman.app.command.dump_hosts' => __DIR__.'/getGyman_App_Command_DumpHostsService.php',
            'gyman.app.command.update_current_voucher' => __DIR__.'/getGyman_App_Command_UpdateCurrentVoucherService.php',
            'gyman.app.globals_factory' => __DIR__.'/getGyman_App_GlobalsFactoryService.php',
            'gyman.app.handler.clear_expired_current_vouchers' => __DIR__.'/getGyman_App_Handler_ClearExpiredCurrentVouchersService.php',
            'gyman.app.handler.close_expired_entries' => __DIR__.'/getGyman_App_Handler_CloseExpiredEntriesService.php',
            'gyman.app.handler.settings_update' => __DIR__.'/getGyman_App_Handler_SettingsUpdateService.php',
            'gyman.app.handler.update_current_vouchers' => __DIR__.'/getGyman_App_Handler_UpdateCurrentVouchersService.php',
            'gyman.app.listener.redirect_to_404' => __DIR__.'/getGyman_App_Listener_RedirectTo404Service.php',
            'gyman.app.listener.setup_club_paths' => __DIR__.'/getGyman_App_Listener_SetupClubPathsService.php',
            'gyman.app.remove_entry_from_occurrence' => __DIR__.'/getGyman_App_RemoveEntryFromOccurrenceService.php',
            'gyman.app.subdomain_provider' => __DIR__.'/getGyman_App_SubdomainProviderService.php',
            'gyman.app.test_subdomain_provider' => __DIR__.'/getGyman_App_TestSubdomainProviderService.php',
            'gyman.app.validator.voucher_amount_for_credit_entries_constraint' => __DIR__.'/getGyman_App_Validator_VoucherAmountForCreditEntriesConstraintService.php',
            'gyman.calendar.factory' => __DIR__.'/getGyman_Calendar_FactoryService.php',
            'gyman.calendar.repository' => __DIR__.'/getGyman_Calendar_RepositoryService.php',
            'gyman.club.club_manager' => __DIR__.'/getGyman_Club_ClubManagerService.php',
            'gyman.club.factory' => __DIR__.'/getGyman_Club_FactoryService.php',
            'gyman.club.provider' => __DIR__.'/getGyman_Club_ProviderService.php',
            'gyman.club.unique_subdomain.validator' => __DIR__.'/getGyman_Club_UniqueSubdomain_ValidatorService.php',
            'gyman.dashboard.members_query' => __DIR__.'/getGyman_Dashboard_MembersQueryService.php',
            'gyman.dashboard.menu.main' => __DIR__.'/getGyman_Dashboard_Menu_MainService.php',
            'gyman.dashboard.menu_builder' => __DIR__.'/getGyman_Dashboard_MenuBuilderService.php',
            'gyman.default.menu.main' => __DIR__.'/getGyman_Default_Menu_MainService.php',
            'gyman.default.menu.profile' => __DIR__.'/getGyman_Default_Menu_ProfileService.php',
            'gyman.default.menu_builder' => __DIR__.'/getGyman_Default_MenuBuilderService.php',
            'gyman.entries.cant_enter_past_occurrence.validator' => __DIR__.'/getGyman_Entries_CantEnterPastOccurrence_ValidatorService.php',
            'gyman.entries.close_entry' => __DIR__.'/getGyman_Entries_CloseEntryService.php',
            'gyman.entries.entry_form_type' => __DIR__.'/getGyman_Entries_EntryFormTypeService.php',
            'gyman.entries.only_enter_once.validator' => __DIR__.'/getGyman_Entries_OnlyEnterOnce_ValidatorService.php',
            'gyman.entries.open_entry' => __DIR__.'/getGyman_Entries_OpenEntryService.php',
            'gyman.entries.price_set_for_paid_entry.validator' => __DIR__.'/getGyman_Entries_PriceSetForPaidEntry_ValidatorService.php',
            'gyman.entries.query' => __DIR__.'/getGyman_Entries_QueryService.php',
            'gyman.entries.repository' => __DIR__.'/getGyman_Entries_RepositoryService.php',
            'gyman.event.factory' => __DIR__.'/getGyman_Event_FactoryService.php',
            'gyman.event.repository' => __DIR__.'/getGyman_Event_RepositoryService.php',
            'gyman.landing.create_club_handler' => __DIR__.'/getGyman_Landing_CreateClubHandlerService.php',
            'gyman.landing.form.registration' => __DIR__.'/getGyman_Landing_Form_RegistrationService.php',
            'gyman.landing.menu.tabs' => __DIR__.'/getGyman_Landing_Menu_TabsService.php',
            'gyman.landing.menu_builder' => __DIR__.'/getGyman_Landing_MenuBuilderService.php',
            'gyman.listener.create_section_for_calendar' => __DIR__.'/getGyman_Listener_CreateSectionForCalendarService.php',
            'gyman.members.create_member' => __DIR__.'/getGyman_Members_CreateMemberService.php',
            'gyman.members.create_user_for_member' => __DIR__.'/getGyman_Members_CreateUserForMemberService.php',
            'gyman.members.member_form_type' => __DIR__.'/getGyman_Members_MemberFormTypeService.php',
            'gyman.members.member_search_form_type' => __DIR__.'/getGyman_Members_MemberSearchFormTypeService.php',
            'gyman.members.members_manager' => __DIR__.'/getGyman_Members_MembersManagerService.php',
            'gyman.members.menu.tabs' => __DIR__.'/getGyman_Members_Menu_TabsService.php',
            'gyman.members.menu.tabs_picture' => __DIR__.'/getGyman_Members_Menu_TabsPictureService.php',
            'gyman.members.menu_builder' => __DIR__.'/getGyman_Members_MenuBuilderService.php',
            'gyman.members.query' => __DIR__.'/getGyman_Members_QueryService.php',
            'gyman.members.repository' => __DIR__.'/getGyman_Members_RepositoryService.php',
            'gyman.members.unique_member_barcode.validator' => __DIR__.'/getGyman_Members_UniqueMemberBarcode_ValidatorService.php',
            'gyman.members.unique_member_email.validator' => __DIR__.'/getGyman_Members_UniqueMemberEmail_ValidatorService.php',
            'gyman.members.update_member' => __DIR__.'/getGyman_Members_UpdateMemberService.php',
            'gyman.members.upload_club_logo_handler' => __DIR__.'/getGyman_Members_UploadClubLogoHandlerService.php',
            'gyman.members.upload_member_foto_handler' => __DIR__.'/getGyman_Members_UploadMemberFotoHandlerService.php',
            'gyman.occurrence.factory' => __DIR__.'/getGyman_Occurrence_FactoryService.php',
            'gyman.occurrence.repository' => __DIR__.'/getGyman_Occurrence_RepositoryService.php',
            'gyman.reports.filter_date' => __DIR__.'/getGyman_Reports_FilterDateService.php',
            'gyman.reports.generator' => __DIR__.'/getGyman_Reports_GeneratorService.php',
            'gyman.reports.strategy.all' => __DIR__.'/getGyman_Reports_Strategy_AllService.php',
            'gyman.reports.strategy.per_member' => __DIR__.'/getGyman_Reports_Strategy_PerMemberService.php',
            'gyman.reports.strategy.per_section' => __DIR__.'/getGyman_Reports_Strategy_PerSectionService.php',
            'gyman.repository.section' => __DIR__.'/getGyman_Repository_SectionService.php',
            'gyman.rest.entries.entry_form_type' => __DIR__.'/getGyman_Rest_Entries_EntryFormTypeService.php',
            'gyman.settings.club_details_type' => __DIR__.'/getGyman_Settings_ClubDetailsTypeService.php',
            'gyman.settings.club_settings_type' => __DIR__.'/getGyman_Settings_ClubSettingsTypeService.php',
            'gyman.settings.menu.main' => __DIR__.'/getGyman_Settings_Menu_MainService.php',
            'gyman.settings.menu_builder' => __DIR__.'/getGyman_Settings_MenuBuilderService.php',
            'gyman.settings.sections_handler' => __DIR__.'/getGyman_Settings_SectionsHandlerService.php',
            'gyman.settings.sections_type' => __DIR__.'/getGyman_Settings_SectionsTypeService.php',
            'gyman.user.repository' => __DIR__.'/getGyman_User_RepositoryService.php',
            'gyman.vouchers.close_voucher' => __DIR__.'/getGyman_Vouchers_CloseVoucherService.php',
            'gyman.vouchers.create_voucher' => __DIR__.'/getGyman_Vouchers_CreateVoucherService.php',
            'gyman.vouchers.form.voucher' => __DIR__.'/getGyman_Vouchers_Form_VoucherService.php',
            'gyman.vouchers.form.voucher_update' => __DIR__.'/getGyman_Vouchers_Form_VoucherUpdateService.php',
            'gyman.vouchers.repository' => __DIR__.'/getGyman_Vouchers_RepositoryService.php',
            'gyman.vouchers.repository.entry' => __DIR__.'/getGyman_Vouchers_Repository_EntryService.php',
            'gyman.vouchers.update_voucher' => __DIR__.'/getGyman_Vouchers_UpdateVoucherService.php',
            'kernel.class_cache.cache_warmer' => __DIR__.'/getKernel_ClassCache_CacheWarmerService.php',
            'knp_menu.factory' => __DIR__.'/getKnpMenu_FactoryService.php',
            'knp_menu.menu_provider.builder_alias' => __DIR__.'/getKnpMenu_MenuProvider_BuilderAliasService.php',
            'knp_menu.menu_provider.lazy' => __DIR__.'/getKnpMenu_MenuProvider_LazyService.php',
            'knp_menu.renderer.list' => __DIR__.'/getKnpMenu_Renderer_ListService.php',
            'knp_menu.renderer.twig' => __DIR__.'/getKnpMenu_Renderer_TwigService.php',
            'knp_menu.voter.router' => __DIR__.'/getKnpMenu_Voter_RouterService.php',
            'liip_functional_test.query.counter' => __DIR__.'/getLiipFunctionalTest_Query_CounterService.php',
            'liip_monitor.helper' => __DIR__.'/getLiipMonitor_HelperService.php',
            'liip_monitor.helper.console_reporter' => __DIR__.'/getLiipMonitor_Helper_ConsoleReporterService.php',
            'liip_monitor.helper.raw_console_reporter' => __DIR__.'/getLiipMonitor_Helper_RawConsoleReporterService.php',
            'liip_monitor.helper.runner_manager' => __DIR__.'/getLiipMonitor_Helper_RunnerManagerService.php',
            'liip_monitor.runner_default' => __DIR__.'/getLiipMonitor_RunnerDefaultService.php',
            'logger' => __DIR__.'/getLoggerService.php',
            'mailer.contact' => __DIR__.'/getMailer_ContactService.php',
            'mailer.credit_entry' => __DIR__.'/getMailer_CreditEntryService.php',
            'mailer.member_invitation' => __DIR__.'/getMailer_MemberInvitationService.php',
            'mailer.registration_successful' => __DIR__.'/getMailer_RegistrationSuccessfulService.php',
            'memcached' => __DIR__.'/getMemcachedService.php',
            'monolog.activation_strategy.not_found' => __DIR__.'/getMonolog_ActivationStrategy_NotFoundService.php',
            'monolog.handler.commands' => __DIR__.'/getMonolog_Handler_CommandsService.php',
            'monolog.handler.createNewClub' => __DIR__.'/getMonolog_Handler_CreateNewClubService.php',
            'monolog.handler.fingers_crossed.error_level_activation_strategy' => __DIR__.'/getMonolog_Handler_FingersCrossed_ErrorLevelActivationStrategyService.php',
            'monolog.handler.null_internal' => __DIR__.'/getMonolog_Handler_NullInternalService.php',
            'monolog.logger.commands' => __DIR__.'/getMonolog_Logger_CommandsService.php',
            'monolog.logger.console' => __DIR__.'/getMonolog_Logger_ConsoleService.php',
            'monolog.logger.createNewClub' => __DIR__.'/getMonolog_Logger_CreateNewClubService.php',
            'monolog.logger.security' => __DIR__.'/getMonolog_Logger_SecurityService.php',
            'monolog.logger.templating' => __DIR__.'/getMonolog_Logger_TemplatingService.php',
            'property_accessor' => __DIR__.'/getPropertyAccessorService.php',
            'router.cache_warmer' => __DIR__.'/getRouter_CacheWarmerService.php',
            'routing.loader' => __DIR__.'/getRouting_LoaderService.php',
            'security.access.authenticated_voter' => __DIR__.'/getSecurity_Access_AuthenticatedVoterService.php',
            'security.access.expression_voter' => __DIR__.'/getSecurity_Access_ExpressionVoterService.php',
            'security.access.role_hierarchy_voter' => __DIR__.'/getSecurity_Access_RoleHierarchyVoterService.php',
            'security.access_listener' => __DIR__.'/getSecurity_AccessListenerService.php',
            'security.access_map' => __DIR__.'/getSecurity_AccessMapService.php',
            'security.authentication.guard_handler' => __DIR__.'/getSecurity_Authentication_GuardHandlerService.php',
            'security.authentication.listener.anonymous.main' => __DIR__.'/getSecurity_Authentication_Listener_Anonymous_MainService.php',
            'security.authentication.listener.form.main' => __DIR__.'/getSecurity_Authentication_Listener_Form_MainService.php',
            'security.authentication.provider.anonymous.main' => __DIR__.'/getSecurity_Authentication_Provider_Anonymous_MainService.php',
            'security.authentication.provider.dao.main' => __DIR__.'/getSecurity_Authentication_Provider_Dao_MainService.php',
            'security.authentication.session_strategy' => __DIR__.'/getSecurity_Authentication_SessionStrategyService.php',
            'security.authentication_utils' => __DIR__.'/getSecurity_AuthenticationUtilsService.php',
            'security.channel_listener' => __DIR__.'/getSecurity_ChannelListenerService.php',
            'security.command.user_password_encoder' => __DIR__.'/getSecurity_Command_UserPasswordEncoderService.php',
            'security.context_listener.0' => __DIR__.'/getSecurity_ContextListener_0Service.php',
            'security.csrf.token_manager' => __DIR__.'/getSecurity_Csrf_TokenManagerService.php',
            'security.firewall.map.context.dev' => __DIR__.'/getSecurity_Firewall_Map_Context_DevService.php',
            'security.firewall.map.context.main' => __DIR__.'/getSecurity_Firewall_Map_Context_MainService.php',
            'security.http_utils' => __DIR__.'/getSecurity_HttpUtilsService.php',
            'security.logout_listener.main' => __DIR__.'/getSecurity_LogoutListener_MainService.php',
            'security.password_encoder' => __DIR__.'/getSecurity_PasswordEncoderService.php',
            'security.request_matcher.00qf1z7' => __DIR__.'/getSecurity_RequestMatcher_00qf1z7Service.php',
            'security.request_matcher.zfhj2lw' => __DIR__.'/getSecurity_RequestMatcher_Zfhj2lwService.php',
            'security.user_checker' => __DIR__.'/getSecurity_UserCheckerService.php',
            'security.user_value_resolver' => __DIR__.'/getSecurity_UserValueResolverService.php',
            'security.validator.user_password' => __DIR__.'/getSecurity_Validator_UserPasswordService.php',
            'sensio_distribution.security_checker' => __DIR__.'/getSensioDistribution_SecurityCheckerService.php',
            'sensio_distribution.security_checker.command' => __DIR__.'/getSensioDistribution_SecurityChecker_CommandService.php',
            'sensio_framework_extra.view.guesser' => __DIR__.'/getSensioFrameworkExtra_View_GuesserService.php',
            'services_resetter' => __DIR__.'/getServicesResetterService.php',
            'session' => __DIR__.'/getSessionService.php',
            'session.storage.filesystem' => __DIR__.'/getSession_Storage_FilesystemService.php',
            'session.storage.metadata_bag' => __DIR__.'/getSession_Storage_MetadataBagService.php',
            'session.storage.native' => __DIR__.'/getSession_Storage_NativeService.php',
            'session.storage.php_bridge' => __DIR__.'/getSession_Storage_PhpBridgeService.php',
            'swiftmailer.command.debug' => __DIR__.'/getSwiftmailer_Command_DebugService.php',
            'swiftmailer.command.new_email' => __DIR__.'/getSwiftmailer_Command_NewEmailService.php',
            'swiftmailer.command.send_email' => __DIR__.'/getSwiftmailer_Command_SendEmailService.php',
            'swiftmailer.email_sender.listener' => __DIR__.'/getSwiftmailer_EmailSender_ListenerService.php',
            'swiftmailer.mailer.default' => __DIR__.'/getSwiftmailer_Mailer_DefaultService.php',
            'swiftmailer.mailer.default.plugin.messagelogger' => __DIR__.'/getSwiftmailer_Mailer_Default_Plugin_MessageloggerService.php',
            'swiftmailer.mailer.default.spool' => __DIR__.'/getSwiftmailer_Mailer_Default_SpoolService.php',
            'swiftmailer.mailer.default.transport' => __DIR__.'/getSwiftmailer_Mailer_Default_TransportService.php',
            'swiftmailer.mailer.default.transport.eventdispatcher' => __DIR__.'/getSwiftmailer_Mailer_Default_Transport_EventdispatcherService.php',
            'swiftmailer.mailer.default.transport.real' => __DIR__.'/getSwiftmailer_Mailer_Default_Transport_RealService.php',
            'tactician.command.debug' => __DIR__.'/getTactician_Command_DebugService.php',
            'tactician.commandbus.default' => __DIR__.'/getTactician_Commandbus_DefaultService.php',
            'tactician.commandbus.default.handler.locator' => __DIR__.'/getTactician_Commandbus_Default_Handler_LocatorService.php',
            'tactician.commandbus.default.middleware.command_handler' => __DIR__.'/getTactician_Commandbus_Default_Middleware_CommandHandlerService.php',
            'tactician.handler.command_name_extractor.class_name' => __DIR__.'/getTactician_Handler_CommandNameExtractor_ClassNameService.php',
            'tactician.handler.method_name_inflector.handle' => __DIR__.'/getTactician_Handler_MethodNameInflector_HandleService.php',
            'tactician.handler.method_name_inflector.handle_class_name' => __DIR__.'/getTactician_Handler_MethodNameInflector_HandleClassNameService.php',
            'tactician.handler.method_name_inflector.handle_class_name_without_suffix' => __DIR__.'/getTactician_Handler_MethodNameInflector_HandleClassNameWithoutSuffixService.php',
            'tactician.handler.method_name_inflector.invoke' => __DIR__.'/getTactician_Handler_MethodNameInflector_InvokeService.php',
            'tactician.middleware.locking' => __DIR__.'/getTactician_Middleware_LockingService.php',
            'tactician.middleware.security' => __DIR__.'/getTactician_Middleware_SecurityService.php',
            'tactician.middleware.validator' => __DIR__.'/getTactician_Middleware_ValidatorService.php',
            'tactician.plugins.named_command.extractor' => __DIR__.'/getTactician_Plugins_NamedCommand_ExtractorService.php',
            'templating' => __DIR__.'/getTemplatingService.php',
            'templating.cache_warmer.template_paths' => __DIR__.'/getTemplating_CacheWarmer_TemplatePathsService.php',
            'templating.filename_parser' => __DIR__.'/getTemplating_FilenameParserService.php',
            'templating.finder' => __DIR__.'/getTemplating_FinderService.php',
            'templating.helper.logout_url' => __DIR__.'/getTemplating_Helper_LogoutUrlService.php',
            'templating.helper.security' => __DIR__.'/getTemplating_Helper_SecurityService.php',
            'templating.loader' => __DIR__.'/getTemplating_LoaderService.php',
            'translation.dumper.csv' => __DIR__.'/getTranslation_Dumper_CsvService.php',
            'translation.dumper.ini' => __DIR__.'/getTranslation_Dumper_IniService.php',
            'translation.dumper.json' => __DIR__.'/getTranslation_Dumper_JsonService.php',
            'translation.dumper.mo' => __DIR__.'/getTranslation_Dumper_MoService.php',
            'translation.dumper.php' => __DIR__.'/getTranslation_Dumper_PhpService.php',
            'translation.dumper.po' => __DIR__.'/getTranslation_Dumper_PoService.php',
            'translation.dumper.qt' => __DIR__.'/getTranslation_Dumper_QtService.php',
            'translation.dumper.res' => __DIR__.'/getTranslation_Dumper_ResService.php',
            'translation.dumper.xliff' => __DIR__.'/getTranslation_Dumper_XliffService.php',
            'translation.dumper.yml' => __DIR__.'/getTranslation_Dumper_YmlService.php',
            'translation.extractor' => __DIR__.'/getTranslation_ExtractorService.php',
            'translation.extractor.php' => __DIR__.'/getTranslation_Extractor_PhpService.php',
            'translation.loader' => __DIR__.'/getTranslation_LoaderService.php',
            'translation.loader.csv' => __DIR__.'/getTranslation_Loader_CsvService.php',
            'translation.loader.dat' => __DIR__.'/getTranslation_Loader_DatService.php',
            'translation.loader.ini' => __DIR__.'/getTranslation_Loader_IniService.php',
            'translation.loader.json' => __DIR__.'/getTranslation_Loader_JsonService.php',
            'translation.loader.mo' => __DIR__.'/getTranslation_Loader_MoService.php',
            'translation.loader.php' => __DIR__.'/getTranslation_Loader_PhpService.php',
            'translation.loader.po' => __DIR__.'/getTranslation_Loader_PoService.php',
            'translation.loader.qt' => __DIR__.'/getTranslation_Loader_QtService.php',
            'translation.loader.res' => __DIR__.'/getTranslation_Loader_ResService.php',
            'translation.loader.xliff' => __DIR__.'/getTranslation_Loader_XliffService.php',
            'translation.loader.yml' => __DIR__.'/getTranslation_Loader_YmlService.php',
            'translation.reader' => __DIR__.'/getTranslation_ReaderService.php',
            'translation.warmer' => __DIR__.'/getTranslation_WarmerService.php',
            'translation.writer' => __DIR__.'/getTranslation_WriterService.php',
            'twig.cache_warmer' => __DIR__.'/getTwig_CacheWarmerService.php',
            'twig.command.debug' => __DIR__.'/getTwig_Command_DebugService.php',
            'twig.command.lint' => __DIR__.'/getTwig_Command_LintService.php',
            'twig.controller.exception' => __DIR__.'/getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => __DIR__.'/getTwig_Controller_PreviewErrorService.php',
            'twig.exception_listener' => __DIR__.'/getTwig_ExceptionListenerService.php',
            'twig.form.renderer' => __DIR__.'/getTwig_Form_RendererService.php',
            'twig.runtime.httpkernel' => __DIR__.'/getTwig_Runtime_HttpkernelService.php',
            'twig.template_cache_warmer' => __DIR__.'/getTwig_TemplateCacheWarmerService.php',
            'twig.translation.extractor' => __DIR__.'/getTwig_Translation_ExtractorService.php',
            'validator.email' => __DIR__.'/getValidator_EmailService.php',
            'validator.expression' => __DIR__.'/getValidator_ExpressionService.php',
            'validator.mapping.cache_warmer' => __DIR__.'/getValidator_Mapping_CacheWarmerService.php',
            'validator.voucher_date' => __DIR__.'/getValidator_VoucherDateService.php',
            'var_dumper.cli_dumper' => __DIR__.'/getVarDumper_CliDumperService.php',
            'voucher_manager' => __DIR__.'/getVoucherManagerService.php',
            'web_profiler.controller.exception' => __DIR__.'/getWebProfiler_Controller_ExceptionService.php',
            'web_profiler.controller.profiler' => __DIR__.'/getWebProfiler_Controller_ProfilerService.php',
            'web_profiler.controller.router' => __DIR__.'/getWebProfiler_Controller_RouterService.php',
        );
        $this->privates = array(
            'doctrine.orm.default_metadata_cache' => true,
            'doctrine.orm.default_query_cache' => true,
            'doctrine.orm.default_result_cache' => true,
            'doctrine.orm.tenant_metadata_cache' => true,
            'doctrine.orm.tenant_query_cache' => true,
            'doctrine.orm.tenant_result_cache' => true,
            'fos_user.doctrine_registry' => true,
            'fos_user.util.username_canonicalizer' => true,
            'session.storage' => true,
            'swiftmailer.mailer' => true,
            'swiftmailer.plugin.messagelogger' => true,
            'swiftmailer.spool' => true,
            'swiftmailer.transport' => true,
            'swiftmailer.transport.real' => true,
            'tactician.commandbus' => true,
            'tactician.handler.locator.symfony' => true,
            'tactician.middleware.command_handler' => true,
            'account_bundle.profile.edit_type' => true,
            'account_bundle.registered_user_subscriber' => true,
            'account_bundle.registration.form.type' => true,
            'account_bundle.updated_profile_subscriber' => true,
            'annotation_reader' => true,
            'annotations.cache_warmer' => true,
            'annotations.reader' => true,
            'app.listener.open_entry' => true,
            'app.listener.user_for_member_created' => true,
            'argument_resolver.default' => true,
            'argument_resolver.request' => true,
            'argument_resolver.request_attribute' => true,
            'argument_resolver.service' => true,
            'argument_resolver.session' => true,
            'argument_resolver.variadic' => true,
            'assets.context' => true,
            'assets.packages' => true,
            'cache.annotations' => true,
            'cache.default_clearer' => true,
            'cache.serializer' => true,
            'cache.validator' => true,
            'chart' => true,
            'config.resource.self_checking_resource_checker' => true,
            'config_cache_factory' => true,
            'console.command.about' => true,
            'console.command.assets_install' => true,
            'console.command.cache_clear' => true,
            'console.command.cache_pool_clear' => true,
            'console.command.cache_pool_prune' => true,
            'console.command.cache_warmup' => true,
            'console.command.config_debug' => true,
            'console.command.config_dump_reference' => true,
            'console.command.container_debug' => true,
            'console.command.debug_autowiring' => true,
            'console.command.event_dispatcher_debug' => true,
            'console.command.form_debug' => true,
            'console.command.router_debug' => true,
            'console.command.router_match' => true,
            'console.command.translation_debug' => true,
            'console.command.translation_update' => true,
            'console.command.xliff_lint' => true,
            'console.command.yaml_lint' => true,
            'console.error_listener' => true,
            'controller_name_converter' => true,
            'data_collector.form' => true,
            'data_collector.form.extractor' => true,
            'data_collector.request' => true,
            'data_collector.router' => true,
            'data_collector.translation' => true,
            'debug.argument_resolver' => true,
            'debug.controller_resolver' => true,
            'debug.debug_handlers_listener' => true,
            'debug.dump_listener' => true,
            'debug.event_dispatcher' => true,
            'debug.file_link_formatter' => true,
            'debug.log_processor' => true,
            'debug.security.access.decision_manager' => true,
            'debug.stopwatch' => true,
            'debug.validator' => true,
            'dende_calendar.calendar_repository' => true,
            'dende_calendar.entity_manager' => true,
            'dende_calendar.event_repository' => true,
            'dende_calendar.factory.calendar' => true,
            'dende_calendar.factory.event' => true,
            'dende_calendar.factory.occurrence' => true,
            'dende_calendar.form_type.create_event' => true,
            'dende_calendar.form_type.range_dates' => true,
            'dende_calendar.form_type.update_event' => true,
            'dende_calendar.handler.create_calendar' => true,
            'dende_calendar.handler.create_event' => true,
            'dende_calendar.handler.update_event' => true,
            'dende_calendar.handler.update_occurrence' => true,
            'dende_calendar.id_generator' => true,
            'dende_calendar.listener.doctrine_event_listener' => true,
            'dende_calendar.manager.update_occurrence' => true,
            'dende_calendar.new_calendar_creation' => true,
            'dende_calendar.occurrences_provider' => true,
            'dende_calendar.occurrences_repository' => true,
            'dende_calendar.update_strategy.single' => true,
            'dende_multitenancy.listener.command' => true,
            'dende_multitenancy.tenant_manager' => true,
            'dependency_injection.config.container_parameters_resource_checker' => true,
            'deprecated.form.registry' => true,
            'deprecated.form.registry.csrf' => true,
            'doctrine.cache_clear_metadata_command' => true,
            'doctrine.cache_clear_query_cache_command' => true,
            'doctrine.cache_clear_result_command' => true,
            'doctrine.cache_collection_region_command' => true,
            'doctrine.clear_entity_region_command' => true,
            'doctrine.clear_query_region_command' => true,
            'doctrine.database_create_command' => true,
            'doctrine.database_drop_command' => true,
            'doctrine.database_import_command' => true,
            'doctrine.dbal.connection_factory' => true,
            'doctrine.dbal.logger' => true,
            'doctrine.dbal.logger.profiling.default' => true,
            'doctrine.dbal.logger.profiling.maintanance' => true,
            'doctrine.dbal.logger.profiling.tenant' => true,
            'doctrine.ensure_production_settings_command' => true,
            'doctrine.fixtures_load_command' => true,
            'doctrine.generate_entities_command' => true,
            'doctrine.mapping_convert_command' => true,
            'doctrine.mapping_import_command' => true,
            'doctrine.mapping_info_command' => true,
            'doctrine.orm.container_repository_factory' => true,
            'doctrine.orm.default_entity_listener_resolver' => true,
            'doctrine.orm.default_entity_manager.property_info_extractor' => true,
            'doctrine.orm.default_listeners.attach_entity_listeners' => true,
            'doctrine.orm.default_manager_configurator' => true,
            'doctrine.orm.listeners.resolve_target_entity' => true,
            'doctrine.orm.naming_strategy.default' => true,
            'doctrine.orm.proxy_cache_warmer' => true,
            'doctrine.orm.quote_strategy.default' => true,
            'doctrine.orm.tenant_entity_listener_resolver' => true,
            'doctrine.orm.tenant_entity_manager.property_info_extractor' => true,
            'doctrine.orm.tenant_listeners.attach_entity_listeners' => true,
            'doctrine.orm.tenant_manager_configurator' => true,
            'doctrine.orm.validator.unique' => true,
            'doctrine.orm.validator_initializer' => true,
            'doctrine.query_dql_command' => true,
            'doctrine.query_sql_command' => true,
            'doctrine.schema_create_command' => true,
            'doctrine.schema_drop_command' => true,
            'doctrine.schema_update_command' => true,
            'doctrine.schema_validate_command' => true,
            'doctrine_cache.contains_command' => true,
            'doctrine_cache.delete_command' => true,
            'doctrine_cache.flush_command' => true,
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => true,
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => true,
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => true,
            'doctrine_cache.providers.doctrine.orm.tenant_metadata_cache' => true,
            'doctrine_cache.providers.doctrine.orm.tenant_query_cache' => true,
            'doctrine_cache.providers.doctrine.orm.tenant_result_cache' => true,
            'doctrine_cache.stats_command' => true,
            'doctrine_migrations.diff_command' => true,
            'doctrine_migrations.execute_command' => true,
            'doctrine_migrations.generate_command' => true,
            'doctrine_migrations.latest_command' => true,
            'doctrine_migrations.migrate_command' => true,
            'doctrine_migrations.status_command' => true,
            'doctrine_migrations.version_command' => true,
            'file_locator' => true,
            'form.registry' => true,
            'form.resolved_type_factory' => true,
            'form.server_params' => true,
            'form.type.choice' => true,
            'form.type.entity' => true,
            'form.type.form' => true,
            'form.type_extension.csrf' => true,
            'form.type_extension.form.data_collector' => true,
            'form.type_extension.form.http_foundation' => true,
            'form.type_extension.form.validator' => true,
            'form.type_extension.repeated.validator' => true,
            'form.type_extension.submit.validator' => true,
            'form.type_extension.upload.validator' => true,
            'form.type_guesser.doctrine' => true,
            'form.type_guesser.validator' => true,
            'fos_js_routing.controller' => true,
            'fos_js_routing.extractor' => true,
            'fos_user.change_password.form.factory' => true,
            'fos_user.change_password.form.type' => true,
            'fos_user.command.activate_user' => true,
            'fos_user.command.change_password' => true,
            'fos_user.command.create_user' => true,
            'fos_user.command.deactivate_user' => true,
            'fos_user.command.demote_user' => true,
            'fos_user.command.promote_user' => true,
            'fos_user.group.form.factory' => true,
            'fos_user.group.form.type' => true,
            'fos_user.group_manager' => true,
            'fos_user.listener.authentication' => true,
            'fos_user.listener.flash' => true,
            'fos_user.listener.resetting' => true,
            'fos_user.mailer' => true,
            'fos_user.object_manager' => true,
            'fos_user.profile.form.factory' => true,
            'fos_user.profile.form.type' => true,
            'fos_user.registration.form.factory' => true,
            'fos_user.registration.form.type' => true,
            'fos_user.resetting.form.factory' => true,
            'fos_user.resetting.form.type' => true,
            'fos_user.security.interactive_login_listener' => true,
            'fos_user.security.login_manager' => true,
            'fos_user.user_listener' => true,
            'fos_user.user_manager' => true,
            'fos_user.user_provider.username' => true,
            'fos_user.username_form_type' => true,
            'fos_user.util.canonical_fields_updater' => true,
            'fos_user.util.email_canonicalizer' => true,
            'fos_user.util.password_updater' => true,
            'fos_user.util.token_generator' => true,
            'fos_user.util.user_manipulator' => true,
            'fragment.handler' => true,
            'fragment.listener' => true,
            'fragment.renderer.hinclude' => true,
            'fragment.renderer.inline' => true,
            'gyman.account.logout_handler' => true,
            'gyman.app.command.clear_entries' => true,
            'gyman.app.command.clear_expired_vouchers' => true,
            'gyman.app.command.dump_hosts' => true,
            'gyman.app.command.update_current_voucher' => true,
            'gyman.app.globals_factory' => true,
            'gyman.app.handler.clear_expired_current_vouchers' => true,
            'gyman.app.handler.close_expired_entries' => true,
            'gyman.app.handler.settings_update' => true,
            'gyman.app.handler.update_current_vouchers' => true,
            'gyman.app.listener.redirect_to_404' => true,
            'gyman.app.listener.setup_club_paths' => true,
            'gyman.app.remove_entry_from_occurrence' => true,
            'gyman.app.subdomain_name_listener' => true,
            'gyman.app.subdomain_provider' => true,
            'gyman.app.tenant_provider' => true,
            'gyman.app.test_subdomain_provider' => true,
            'gyman.app.twig.avatar' => true,
            'gyman.app.twig.entries_extension' => true,
            'gyman.app.validator.voucher_amount_for_credit_entries_constraint' => true,
            'gyman.calendar.factory' => true,
            'gyman.calendar.repository' => true,
            'gyman.club.club_manager' => true,
            'gyman.club.factory' => true,
            'gyman.club.provider' => true,
            'gyman.club.repository' => true,
            'gyman.club.unique_subdomain.validator' => true,
            'gyman.dashboard.members_query' => true,
            'gyman.dashboard.menu.main' => true,
            'gyman.dashboard.menu_builder' => true,
            'gyman.default.menu.main' => true,
            'gyman.default.menu.profile' => true,
            'gyman.default.menu_builder' => true,
            'gyman.default.request.arraycollection_converter' => true,
            'gyman.entries.cant_enter_past_occurrence.validator' => true,
            'gyman.entries.close_entry' => true,
            'gyman.entries.entry_form_type' => true,
            'gyman.entries.only_enter_once.validator' => true,
            'gyman.entries.open_entry' => true,
            'gyman.entries.price_set_for_paid_entry.validator' => true,
            'gyman.entries.query' => true,
            'gyman.entries.repository' => true,
            'gyman.event.factory' => true,
            'gyman.event.repository' => true,
            'gyman.landing.create_club_handler' => true,
            'gyman.landing.form.registration' => true,
            'gyman.landing.menu.tabs' => true,
            'gyman.landing.menu_builder' => true,
            'gyman.listener.create_section_for_calendar' => true,
            'gyman.members.create_member' => true,
            'gyman.members.create_user_for_member' => true,
            'gyman.members.member_form_type' => true,
            'gyman.members.member_search_form_type' => true,
            'gyman.members.members_manager' => true,
            'gyman.members.menu.tabs' => true,
            'gyman.members.menu.tabs_picture' => true,
            'gyman.members.menu_builder' => true,
            'gyman.members.query' => true,
            'gyman.members.repository' => true,
            'gyman.members.unique_member_barcode.validator' => true,
            'gyman.members.unique_member_email.validator' => true,
            'gyman.members.update_member' => true,
            'gyman.members.upload_club_logo_handler' => true,
            'gyman.members.upload_member_foto_handler' => true,
            'gyman.occurrence.factory' => true,
            'gyman.occurrence.repository' => true,
            'gyman.reports.filter_date' => true,
            'gyman.reports.generator' => true,
            'gyman.reports.strategy.all' => true,
            'gyman.reports.strategy.per_member' => true,
            'gyman.reports.strategy.per_section' => true,
            'gyman.repository.section' => true,
            'gyman.rest.entries.entry_form_type' => true,
            'gyman.settings.club_details_type' => true,
            'gyman.settings.club_settings_type' => true,
            'gyman.settings.menu.main' => true,
            'gyman.settings.menu_builder' => true,
            'gyman.settings.sections_handler' => true,
            'gyman.settings.sections_type' => true,
            'gyman.twig.voucher_extension' => true,
            'gyman.user.repository' => true,
            'gyman.vouchers.close_voucher' => true,
            'gyman.vouchers.create_voucher' => true,
            'gyman.vouchers.form.voucher' => true,
            'gyman.vouchers.form.voucher_update' => true,
            'gyman.vouchers.repository' => true,
            'gyman.vouchers.repository.entry' => true,
            'gyman.vouchers.update_voucher' => true,
            'kernel.class_cache.cache_warmer' => true,
            'knp_menu.menu_provider' => true,
            'knp_menu.menu_provider.builder_alias' => true,
            'knp_menu.menu_provider.lazy' => true,
            'knp_menu.renderer.list' => true,
            'knp_menu.renderer.twig' => true,
            'knp_menu.renderer_provider' => true,
            'knp_menu.voter.router' => true,
            'liip_functional_test.exception_listener' => true,
            'liip_functional_test.query.counter' => true,
            'liip_functional_test.validator' => true,
            'locale_listener' => true,
            'logger' => true,
            'mailer.contact' => true,
            'mailer.credit_entry' => true,
            'mailer.member_invitation' => true,
            'mailer.registration_successful' => true,
            'memcached' => true,
            'monolog.activation_strategy.not_found' => true,
            'monolog.handler.commands' => true,
            'monolog.handler.createNewClub' => true,
            'monolog.handler.fingers_crossed.error_level_activation_strategy' => true,
            'monolog.handler.grouped_main' => true,
            'monolog.handler.main' => true,
            'monolog.handler.null_internal' => true,
            'monolog.handler.streamed_main' => true,
            'monolog.logger.cache' => true,
            'monolog.logger.commands' => true,
            'monolog.logger.console' => true,
            'monolog.logger.createNewClub' => true,
            'monolog.logger.doctrine' => true,
            'monolog.logger.event' => true,
            'monolog.logger.php' => true,
            'monolog.logger.profiler' => true,
            'monolog.logger.request' => true,
            'monolog.logger.security' => true,
            'monolog.logger.templating' => true,
            'monolog.logger.translation' => true,
            'monolog.processor.psr_log_message' => true,
            'ob_highcharts.twig.highcharts_extension' => true,
            'profiler_listener' => true,
            'property_accessor' => true,
            'resolve_controller_name_subscriber' => true,
            'response_listener' => true,
            'router.cache_warmer' => true,
            'router.request_context' => true,
            'router_listener' => true,
            'security.access.authenticated_voter' => true,
            'security.access.expression_voter' => true,
            'security.access.role_hierarchy_voter' => true,
            'security.access_listener' => true,
            'security.access_map' => true,
            'security.authentication.guard_handler' => true,
            'security.authentication.listener.anonymous.main' => true,
            'security.authentication.listener.form.main' => true,
            'security.authentication.manager' => true,
            'security.authentication.provider.anonymous.main' => true,
            'security.authentication.provider.dao.main' => true,
            'security.authentication.session_strategy' => true,
            'security.authentication.trust_resolver' => true,
            'security.channel_listener' => true,
            'security.command.user_password_encoder' => true,
            'security.context_listener.0' => true,
            'security.encoder_factory' => true,
            'security.firewall' => true,
            'security.firewall.map' => true,
            'security.firewall.map.context.dev' => true,
            'security.firewall.map.context.main' => true,
            'security.http_utils' => true,
            'security.logout_listener.main' => true,
            'security.logout_url_generator' => true,
            'security.rememberme.response_listener' => true,
            'security.request_matcher.00qf1z7' => true,
            'security.request_matcher.zfhj2lw' => true,
            'security.role_hierarchy' => true,
            'security.user_checker' => true,
            'security.user_value_resolver' => true,
            'security.validator.user_password' => true,
            'sensio_distribution.security_checker' => true,
            'sensio_distribution.security_checker.command' => true,
            'sensio_framework_extra.cache.listener' => true,
            'sensio_framework_extra.controller.listener' => true,
            'sensio_framework_extra.converter.datetime' => true,
            'sensio_framework_extra.converter.doctrine.orm' => true,
            'sensio_framework_extra.converter.listener' => true,
            'sensio_framework_extra.converter.manager' => true,
            'sensio_framework_extra.security.listener' => true,
            'sensio_framework_extra.view.listener' => true,
            'sentry.client' => true,
            'sentry.exception_listener' => true,
            'service_locator.sr6ctxe' => true,
            'session.save_listener' => true,
            'session.storage.filesystem' => true,
            'session.storage.metadata_bag' => true,
            'session.storage.native' => true,
            'session.storage.php_bridge' => true,
            'session_listener' => true,
            'streamed_response_listener' => true,
            'swiftmailer.command.debug' => true,
            'swiftmailer.command.new_email' => true,
            'swiftmailer.command.send_email' => true,
            'swiftmailer.email_sender.listener' => true,
            'swiftmailer.mailer.default.spool' => true,
            'swiftmailer.mailer.default.transport' => true,
            'swiftmailer.mailer.default.transport.eventdispatcher' => true,
            'tactician.command.debug' => true,
            'tactician.commandbus.default.handler.locator' => true,
            'tactician.commandbus.default.middleware.command_handler' => true,
            'tactician.handler.command_name_extractor.class_name' => true,
            'tactician.handler.method_name_inflector.handle' => true,
            'tactician.handler.method_name_inflector.handle_class_name' => true,
            'tactician.handler.method_name_inflector.handle_class_name_without_suffix' => true,
            'tactician.handler.method_name_inflector.invoke' => true,
            'tactician.middleware.locking' => true,
            'tactician.middleware.security' => true,
            'tactician.middleware.validator' => true,
            'tactician.plugins.named_command.extractor' => true,
            'templating.cache_warmer.template_paths' => true,
            'templating.filename_parser' => true,
            'templating.finder' => true,
            'templating.helper.logout_url' => true,
            'templating.helper.security' => true,
            'templating.locator' => true,
            'templating.name_parser' => true,
            'time.datetime_formatter' => true,
            'time.templating.helper.time' => true,
            'translation.dumper.csv' => true,
            'translation.dumper.ini' => true,
            'translation.dumper.json' => true,
            'translation.dumper.mo' => true,
            'translation.dumper.php' => true,
            'translation.dumper.po' => true,
            'translation.dumper.qt' => true,
            'translation.dumper.res' => true,
            'translation.dumper.xliff' => true,
            'translation.dumper.yml' => true,
            'translation.extractor' => true,
            'translation.extractor.php' => true,
            'translation.loader' => true,
            'translation.loader.csv' => true,
            'translation.loader.dat' => true,
            'translation.loader.ini' => true,
            'translation.loader.json' => true,
            'translation.loader.mo' => true,
            'translation.loader.php' => true,
            'translation.loader.po' => true,
            'translation.loader.qt' => true,
            'translation.loader.res' => true,
            'translation.loader.xliff' => true,
            'translation.loader.yml' => true,
            'translation.reader' => true,
            'translation.warmer' => true,
            'translation.writer' => true,
            'translator.default' => true,
            'translator_listener' => true,
            'twig.cache_warmer' => true,
            'twig.command.debug' => true,
            'twig.command.lint' => true,
            'twig.exception_listener' => true,
            'twig.form.renderer' => true,
            'twig.loader' => true,
            'twig.profile' => true,
            'twig.runtime.httpkernel' => true,
            'twig.template_cache_warmer' => true,
            'twig.translation.extractor' => true,
            'uri_signer' => true,
            'validate_request_listener' => true,
            'validator.builder' => true,
            'validator.email' => true,
            'validator.expression' => true,
            'validator.mapping.cache_warmer' => true,
            'validator.voucher_date' => true,
            'var_dumper.cli_dumper' => true,
            'voucher_manager' => true,
            'web_profiler.csp.handler' => true,
            'web_profiler.debug_toolbar' => true,
        );
        $this->aliases = array(
            'cache.app_clearer' => 'cache.default_clearer',
            'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand' => 'doctrine_cache.contains_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand' => 'doctrine_cache.delete_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand' => 'doctrine_cache.flush_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand' => 'doctrine_cache.stats_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsdiffdoctrinecommand' => 'doctrine_migrations.diff_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsexecutedoctrinecommand' => 'doctrine_migrations.execute_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsgeneratedoctrinecommand' => 'doctrine_migrations.generate_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationslatestdoctrinecommand' => 'doctrine_migrations.latest_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsmigratedoctrinecommand' => 'doctrine_migrations.migrate_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsstatusdoctrinecommand' => 'doctrine_migrations.status_command',
            'console.command.doctrine_bundle_migrationsbundle_command_migrationsversiondoctrinecommand' => 'doctrine_migrations.version_command',
            'console.command.gyman_bundle_appbundle_command_clearexpiredcurrentvoucherscommand' => 'gyman.app.command.clear_expired_vouchers',
            'console.command.gyman_bundle_appbundle_command_closeentriescommand' => 'gyman.app.command.clear_entries',
            'console.command.gyman_bundle_appbundle_command_dumphostscommand' => 'gyman.app.command.dump_hosts',
            'console.command.gyman_bundle_appbundle_command_updatecurrentvouchercommand' => 'gyman.app.command.update_current_voucher',
            'console.command.league_tactician_bundle_command_debugcommand' => 'tactician.command.debug',
            'console.command.sensiolabs_security_command_securitycheckercommand' => 'sensio_distribution.security_checker.command',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.default_result_cache' => 'doctrine_cache.providers.doctrine.orm.default_result_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'doctrine.orm.tenant_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.tenant_metadata_cache',
            'doctrine.orm.tenant_query_cache' => 'doctrine_cache.providers.doctrine.orm.tenant_query_cache',
            'doctrine.orm.tenant_result_cache' => 'doctrine_cache.providers.doctrine.orm.tenant_result_cache',
            'event_dispatcher' => 'debug.event_dispatcher',
            'fos_user.doctrine_registry' => 'doctrine',
            'fos_user.util.username_canonicalizer' => 'fos_user.util.email_canonicalizer',
            'liip_monitor.runner' => 'liip_monitor.runner_default',
            'mailer' => 'swiftmailer.mailer.default',
            'session.storage' => 'session.storage.native',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.plugin.messagelogger' => 'swiftmailer.mailer.default.plugin.messagelogger',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
            'tactician.commandbus' => 'tactician.commandbus.default',
            'tactician.handler.locator.symfony' => 'tactician.commandbus.default.handler.locator',
            'tactician.middleware.command_handler' => 'tactician.commandbus.default.middleware.command_handler',
            'validator' => 'liip_functional_test.validator',
        );
    }

    public function getRemovedIds()
    {
        return require __DIR__.'/removed-ids.php';
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since version 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $file;
    }

protected function createProxy($class, \Closure $factory)
{
    class_exists($class, false) || $this->load(__DIR__."/{$class}.php");

        return $factory();
}

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('Zsgr1QBwb0', 0, ($this->targetDirs[0].'/pools'));
        $a->setLogger(${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'});

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('y1TF1eMNau', 0, 'YL3vE1kuiaiul8UOKxi4LB', ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the public 'data_collector.dump' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector(${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'}, ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'}, 'UTF-8', ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, NULL);
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Logging\LoggerChain();
        $a->addLogger(${($_ = isset($this->services['doctrine.dbal.logger']) ? $this->services['doctrine.dbal.logger'] : $this->getDoctrine_Dbal_LoggerService()) && false ?: '_'});
        $a->addLogger(${($_ = isset($this->services['doctrine.dbal.logger.profiling.default']) ? $this->services['doctrine.dbal.logger.profiling.default'] : $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack()) && false ?: '_'});

        $b = new \Doctrine\DBAL\Configuration();
        $b->setSQLLogger($a);

        $c = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $c->addEventSubscriber(${($_ = isset($this->services['doctrine.orm.listeners.resolve_target_entity']) ? $this->services['doctrine.orm.listeners.resolve_target_entity'] : $this->getDoctrine_Orm_Listeners_ResolveTargetEntityService()) && false ?: '_'});
        $c->addEventSubscriber(${($_ = isset($this->services['fos_user.user_listener']) ? $this->services['fos_user.user_listener'] : $this->getFosUser_UserListenerService()) && false ?: '_'});
        $c->addEventListener(array(0 => 'loadClassMetadata'), ${($_ = isset($this->services['dende_calendar.listener.doctrine_event_listener']) ? $this->services['dende_calendar.listener.doctrine_event_listener'] : $this->getDendeCalendar_Listener_DoctrineEventListenerService()) && false ?: '_'});
        $c->addEventListener(array(0 => 'loadClassMetadata'), ${($_ = isset($this->services['doctrine.orm.default_listeners.attach_entity_listeners']) ? $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] : $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener()) && false ?: '_'});

        return $this->services['doctrine.dbal.default_connection'] = ${($_ = isset($this->services['doctrine.dbal.connection_factory']) ? $this->services['doctrine.dbal.connection_factory'] : $this->getDoctrine_Dbal_ConnectionFactoryService()) && false ?: '_'}->createConnection(array('driver' => 'pdo_mysql', 'host' => 'gyman.vagrant', 'port' => 3306, 'dbname' => 'gyman', 'user' => 'root', 'password' => 'root', 'charset' => 'UTF8', 'driverOptions' => array(), 'serverVersion' => '5.6', 'defaultTableOptions' => array()), $b, $c, array('enum' => 'string'));
    }

    /**
     * Gets the public 'doctrine.dbal.tenant_connection' shared service.
     *
     * @return \Dende\MultitenancyBundle\Connection\Wrapper
     */
    protected function getDoctrine_Dbal_TenantConnectionService()
    {
        $a = new \Doctrine\DBAL\Logging\LoggerChain();
        $a->addLogger(${($_ = isset($this->services['doctrine.dbal.logger']) ? $this->services['doctrine.dbal.logger'] : $this->getDoctrine_Dbal_LoggerService()) && false ?: '_'});
        $a->addLogger(${($_ = isset($this->services['doctrine.dbal.logger.profiling.tenant']) ? $this->services['doctrine.dbal.logger.profiling.tenant'] : $this->services['doctrine.dbal.logger.profiling.tenant'] = new \Doctrine\DBAL\Logging\DebugStack()) && false ?: '_'});

        $b = new \Doctrine\DBAL\Configuration();
        $b->setSQLLogger($a);

        $c = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $c->addEventSubscriber(${($_ = isset($this->services['doctrine.orm.listeners.resolve_target_entity']) ? $this->services['doctrine.orm.listeners.resolve_target_entity'] : $this->getDoctrine_Orm_Listeners_ResolveTargetEntityService()) && false ?: '_'});
        $c->addEventSubscriber(${($_ = isset($this->services['fos_user.user_listener']) ? $this->services['fos_user.user_listener'] : $this->getFosUser_UserListenerService()) && false ?: '_'});
        $c->addEventListener(array(0 => 'loadClassMetadata'), ${($_ = isset($this->services['dende_calendar.listener.doctrine_event_listener']) ? $this->services['dende_calendar.listener.doctrine_event_listener'] : $this->getDendeCalendar_Listener_DoctrineEventListenerService()) && false ?: '_'});
        $c->addEventListener(array(0 => 'loadClassMetadata'), ${($_ = isset($this->services['doctrine.orm.tenant_listeners.attach_entity_listeners']) ? $this->services['doctrine.orm.tenant_listeners.attach_entity_listeners'] : $this->services['doctrine.orm.tenant_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener()) && false ?: '_'});

        return $this->services['doctrine.dbal.tenant_connection'] = ${($_ = isset($this->services['doctrine.dbal.connection_factory']) ? $this->services['doctrine.dbal.connection_factory'] : $this->getDoctrine_Dbal_ConnectionFactoryService()) && false ?: '_'}->createConnection(array('driver' => 'pdo_mysql', 'host' => 'gyman.vagrant', 'port' => 3306, 'platform_service' => NULL, 'dbname' => NULL, 'user' => NULL, 'password' => NULL, 'charset' => 'UTF8', 'driverOptions' => array(), 'wrapperClass' => 'Dende\\MultitenancyBundle\\Connection\\Wrapper', 'serverVersion' => '5.6', 'defaultTableOptions' => array()), $b, $c, array('enum' => 'string'));
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->services['doctrine.orm.default_entity_manager'] = $this->createProxy('EntityManager_aa4c5a8', function () {
                return \EntityManager_aa4c5a8::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getDoctrine_Orm_DefaultEntityManagerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        $a = new \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver(array('/vagrant/src/Bundle/ClubBundle/Resources/config/doctrine' => 'Gyman\\Bundle\\ClubBundle\\Entity'));
        $a->setGlobalBasename('mapping');

        $b = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $b->addDriver($a, 'Gyman\\Bundle\\ClubBundle\\Entity');

        $c = new \Doctrine\ORM\Configuration();
        $c->setEntityNamespaces(array('ClubBundle' => 'Gyman\\Bundle\\ClubBundle\\Entity'));
        $c->setMetadataCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()) && false ?: '_'});
        $c->setQueryCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_query_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()) && false ?: '_'});
        $c->setResultCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_result_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()) && false ?: '_'});
        $c->setMetadataDriverImpl($b);
        $c->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
        $c->setProxyNamespace('Proxies');
        $c->setAutoGenerateProxyClasses(true);
        $c->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $c->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $c->setNamingStrategy(${($_ = isset($this->services['doctrine.orm.naming_strategy.default']) ? $this->services['doctrine.orm.naming_strategy.default'] : $this->services['doctrine.orm.naming_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultNamingStrategy()) && false ?: '_'});
        $c->setQuoteStrategy(${($_ = isset($this->services['doctrine.orm.quote_strategy.default']) ? $this->services['doctrine.orm.quote_strategy.default'] : $this->services['doctrine.orm.quote_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultQuoteStrategy()) && false ?: '_'});
        $c->setEntityListenerResolver(${($_ = isset($this->services['doctrine.orm.default_entity_listener_resolver']) ? $this->services['doctrine.orm.default_entity_listener_resolver'] : $this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this)) && false ?: '_'});
        $c->setRepositoryFactory(${($_ = isset($this->services['doctrine.orm.container_repository_factory']) ? $this->services['doctrine.orm.container_repository_factory'] : $this->getDoctrine_Orm_ContainerRepositoryFactoryService()) && false ?: '_'});
        $c->addCustomStringFunction('multi_concat', 'Spy\\TimelineBundle\\Driver\\Doctrine\\AST\\Functions\\MultiConcatFunction');
        $c->addCustomDatetimeFunction('dayname', 'Gyman\\Bundle\\AppBundle\\DQL\\Dayname');

        $instance = \Doctrine\ORM\EntityManager::create(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, $c);

        ${($_ = isset($this->services['doctrine.orm.default_manager_configurator']) ? $this->services['doctrine.orm.default_manager_configurator'] : $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array())) && false ?: '_'}->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'doctrine.orm.tenant_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_TenantEntityManagerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->services['doctrine.orm.tenant_entity_manager'] = $this->createProxy('EntityManager_6472e72', function () {
                return \EntityManager_6472e72::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getDoctrine_Orm_TenantEntityManagerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        $a = new \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver(array('/vagrant/vendor/dende/calendar-bundle/Resources/config/doctrine' => 'Dende\\Calendar\\Domain', '/vagrant/src/Bundle/AppBundle/Resources/config/doctrine' => 'Gyman\\Domain'));
        $a->setGlobalBasename('mapping');

        $b = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $b->addDriver($a, 'Dende\\Calendar\\Domain');
        $b->addDriver($a, 'Gyman\\Domain');
        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\XmlDriver(new \Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator(array('/vagrant/vendor/friendsofsymfony/user-bundle/Resources/config/doctrine-mapping' => 'FOS\\UserBundle\\Model'), '.orm.xml')), 'FOS\\UserBundle\\Model');
        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\YamlDriver(new \Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator(array('/vagrant/vendor/dende/calendar-bundle/Resources/config/doctrine' => 'Dende\\Calendar\\Domain'), '.orm.yml')), 'Dende\\Calendar\\Domain');

        $c = new \Doctrine\ORM\Configuration();
        $c->setEntityNamespaces(array('Calendar' => 'Dende\\Calendar\\Domain', 'Gyman' => 'Gyman\\Domain'));
        $c->setMetadataCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.tenant_metadata_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.tenant_metadata_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_TenantMetadataCacheService()) && false ?: '_'});
        $c->setQueryCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.tenant_query_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.tenant_query_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_TenantQueryCacheService()) && false ?: '_'});
        $c->setResultCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.tenant_result_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.tenant_result_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_TenantResultCacheService()) && false ?: '_'});
        $c->setMetadataDriverImpl($b);
        $c->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
        $c->setProxyNamespace('Proxies');
        $c->setAutoGenerateProxyClasses(true);
        $c->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $c->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $c->setNamingStrategy(${($_ = isset($this->services['doctrine.orm.naming_strategy.default']) ? $this->services['doctrine.orm.naming_strategy.default'] : $this->services['doctrine.orm.naming_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultNamingStrategy()) && false ?: '_'});
        $c->setQuoteStrategy(${($_ = isset($this->services['doctrine.orm.quote_strategy.default']) ? $this->services['doctrine.orm.quote_strategy.default'] : $this->services['doctrine.orm.quote_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultQuoteStrategy()) && false ?: '_'});
        $c->setEntityListenerResolver(${($_ = isset($this->services['doctrine.orm.tenant_entity_listener_resolver']) ? $this->services['doctrine.orm.tenant_entity_listener_resolver'] : $this->services['doctrine.orm.tenant_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this)) && false ?: '_'});
        $c->setRepositoryFactory(${($_ = isset($this->services['doctrine.orm.container_repository_factory']) ? $this->services['doctrine.orm.container_repository_factory'] : $this->getDoctrine_Orm_ContainerRepositoryFactoryService()) && false ?: '_'});
        $c->addCustomStringFunction('multi_concat', 'Spy\\TimelineBundle\\Driver\\Doctrine\\AST\\Functions\\MultiConcatFunction');
        $c->addCustomDatetimeFunction('dayname', 'Gyman\\Bundle\\AppBundle\\DQL\\Dayname');
        $c->addEntityNamespace('Calendar', 'Dende\\Calendar\\Domain');

        $instance = \Doctrine\ORM\EntityManager::create(${($_ = isset($this->services['doctrine.dbal.tenant_connection']) ? $this->services['doctrine.dbal.tenant_connection'] : $this->getDoctrine_Dbal_TenantConnectionService()) && false ?: '_'}, $c);

        ${($_ = isset($this->services['doctrine.orm.tenant_manager_configurator']) ? $this->services['doctrine.orm.tenant_manager_configurator'] : $this->services['doctrine.orm.tenant_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array())) && false ?: '_'}->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['debug.controller_resolver']) ? $this->services['debug.controller_resolver'] : $this->getDebug_ControllerResolverService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, ${($_ = isset($this->services['debug.argument_resolver']) ? $this->services['debug.argument_resolver'] : $this->getDebug_ArgumentResolverService()) && false ?: '_'});
    }

    /**
     * Gets the public 'knp_menu.matcher' shared service.
     *
     * @return \Knp\Menu\Matcher\Matcher
     */
    protected function getKnpMenu_MatcherService()
    {
        return $this->services['knp_menu.matcher'] = new \Knp\Menu\Matcher\Matcher(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['knp_menu.voter.router']) ? $this->services['knp_menu.voter.router'] : $this->load(__DIR__.'/getKnpMenu_Voter_RouterService.php')) && false ?: '_'};
        }, 1));
    }

    /**
     * Gets the public 'profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function getProfilerService()
    {
        $a = ${($_ = isset($this->services['monolog.logger.profiler']) ? $this->services['monolog.logger.profiler'] : $this->getMonolog_Logger_ProfilerService()) && false ?: '_'};

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.$this->targetDirs[0].'/profiler')), $a, true);

        $b = ${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'};

        $c = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $c->addInstance('cache.app', ${($_ = isset($this->services['cache.app']) ? $this->services['cache.app'] : $this->getCache_AppService()) && false ?: '_'});
        $c->addInstance('cache.system', ${($_ = isset($this->services['cache.system']) ? $this->services['cache.system'] : $this->getCache_SystemService()) && false ?: '_'});
        $c->addInstance('cache.validator', ${($_ = isset($this->services['cache.validator']) ? $this->services['cache.validator'] : $this->getCache_ValidatorService()) && false ?: '_'});
        $c->addInstance('cache.serializer', ${($_ = isset($this->services['cache.serializer']) ? $this->services['cache.serializer'] : $this->getCache_SerializerService()) && false ?: '_'});
        $c->addInstance('cache.annotations', ${($_ = isset($this->services['cache.annotations']) ? $this->services['cache.annotations'] : $this->getCache_AnnotationsService()) && false ?: '_'});

        $d = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
        $d->addLogger('maintanance', ${($_ = isset($this->services['doctrine.dbal.logger.profiling.maintanance']) ? $this->services['doctrine.dbal.logger.profiling.maintanance'] : $this->services['doctrine.dbal.logger.profiling.maintanance'] = new \Doctrine\DBAL\Logging\DebugStack()) && false ?: '_'});
        $d->addLogger('default', ${($_ = isset($this->services['doctrine.dbal.logger.profiling.default']) ? $this->services['doctrine.dbal.logger.profiling.default'] : $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack()) && false ?: '_'});
        $d->addLogger('tenant', ${($_ = isset($this->services['doctrine.dbal.logger.profiling.tenant']) ? $this->services['doctrine.dbal.logger.profiling.tenant'] : $this->services['doctrine.dbal.logger.profiling.tenant'] = new \Doctrine\DBAL\Logging\DebugStack()) && false ?: '_'});

        $e = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $e->setKernel($b);
        }

        $instance->add(${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector()) && false ?: '_'});
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'}));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(${($_ = isset($this->services['debug.validator']) ? $this->services['debug.validator'] : $this->getDebug_ValidatorService()) && false ?: '_'}));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(${($_ = isset($this->services['data_collector.form']) ? $this->services['data_collector.form'] : $this->getDataCollector_FormService()) && false ?: '_'});
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDirs[0].'/appDevDebugProjectContainer')));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}));
        $instance->add(${($_ = isset($this->services['data_collector.router']) ? $this->services['data_collector.router'] : $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()) && false ?: '_'});
        $instance->add($c);
        $instance->add(${($_ = isset($this->services['data_collector.translation']) ? $this->services['data_collector.translation'] : $this->getDataCollector_TranslationService()) && false ?: '_'});
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'}, ${($_ = isset($this->services['security.role_hierarchy']) ? $this->services['security.role_hierarchy'] : $this->getSecurity_RoleHierarchyService()) && false ?: '_'}, ${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'}, ${($_ = isset($this->services['debug.security.access.decision_manager']) ? $this->services['debug.security.access.decision_manager'] : $this->getDebug_Security_Access_DecisionManagerService()) && false ?: '_'}, ${($_ = isset($this->services['security.firewall.map']) ? $this->services['security.firewall.map'] : $this->getSecurity_Firewall_MapService()) && false ?: '_'}, ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'}));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(${($_ = isset($this->services['twig.profile']) ? $this->services['twig.profile'] : $this->services['twig.profile'] = new \Twig\Profiler\Profile()) && false ?: '_'}, ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}));
        $instance->add($d);
        $instance->add(new \Symfony\Bundle\SwiftmailerBundle\DataCollector\MessageDataCollector($this));
        $instance->add(${($_ = isset($this->services['data_collector.dump']) ? $this->services['data_collector.dump'] : $this->getDataCollector_DumpService()) && false ?: '_'});
        $instance->add($e);

        return $instance;
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router($this, '/vagrant/app/config/routing_dev.yml', array('cache_dir' => $this->targetDirs[0], 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appDevDebugProjectContainerUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appDevDebugProjectContainerUrlMatcher', 'strict_requirements' => true), ${($_ = isset($this->services['router.request_context']) ? $this->services['router.request_context'] : $this->getRouter_RequestContextService()) && false ?: '_'});

        $instance->setConfigCacheFactory(${($_ = isset($this->services['config_cache_factory']) ? $this->services['config_cache_factory'] : $this->getConfigCacheFactoryService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'}, ${($_ = isset($this->services['security.authentication.manager']) ? $this->services['security.authentication.manager'] : $this->getSecurity_Authentication_ManagerService()) && false ?: '_'}, ${($_ = isset($this->services['debug.security.access.decision_manager']) ? $this->services['debug.security.access.decision_manager'] : $this->getDebug_Security_Access_DecisionManagerService()) && false ?: '_'}, false);
    }

    /**
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator(new \Symfony\Component\Translation\LoggingTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.translation']) ? $this->services['monolog.logger.translation'] : $this->getMonolog_Logger_TranslationService()) && false ?: '_'}));
    }

    /**
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Twig\Environment(${($_ = isset($this->services['twig.loader']) ? $this->services['twig.loader'] : $this->getTwig_LoaderService()) && false ?: '_'}, array('form_themes' => $this->parameters['twig.form.resources'], 'debug' => true, 'strict_variables' => false, 'exception_controller' => 'twig.controller.exception:showAction', 'autoescape' => 'name', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8', 'default_path' => '/vagrant/templates', 'paths' => array(), 'date' => array('format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL), 'number_format' => array('decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',')));

        $a = ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'};
        $b = ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'};
        $c = ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'};
        $d = ${($_ = isset($this->services['knp_menu.matcher']) ? $this->services['knp_menu.matcher'] : $this->getKnpMenu_MatcherService()) && false ?: '_'};

        $e = new \Knp\Menu\Util\MenuManipulator();

        $f = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 0);
        $f->setDisplayOptions(array('fileLinkFormat' => $b));

        $g = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 1);
        $g->setDisplayOptions(array('maxStringLength' => 4096, 'fileLinkFormat' => $b));

        $h = new \Symfony\Bridge\Twig\AppVariable();
        $h->setEnvironment('dev');
        $h->setDebug(true);
        if ($this->has('security.token_storage')) {
            $h->setTokenStorage(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'});
        }
        if ($this->has('request_stack')) {
            $h->setRequestStack($c);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(${($_ = isset($this->services['twig.profile']) ? $this->services['twig.profile'] : $this->services['twig.profile'] = new \Twig\Profiler\Profile()) && false ?: '_'}, $a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(${($_ = isset($this->services['assets.packages']) ? $this->services['assets.packages'] : $this->getAssets_PackagesService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension($b, '/vagrant/app', 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($a, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($c, ${($_ = isset($this->services['router.request_context']) ? $this->services['router.request_context'] : $this->getRouter_RequestContextService()) && false ?: '_'}));
        $instance->addExtension(new \Twig\Extension\DebugExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(array(0 => $this, 1 => 'twig.form.renderer')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\WebLinkExtension($c));
        $instance->addExtension(new \Knp\Menu\Twig\MenuExtension(new \Knp\Menu\Twig\Helper(${($_ = isset($this->services['knp_menu.renderer_provider']) ? $this->services['knp_menu.renderer_provider'] : $this->getKnpMenu_RendererProviderService()) && false ?: '_'}, ${($_ = isset($this->services['knp_menu.menu_provider']) ? $this->services['knp_menu.menu_provider'] : $this->getKnpMenu_MenuProviderService()) && false ?: '_'}, $e, $d), $d, $e));
        $instance->addExtension(new \Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension(${($_ = isset($this->services['time.templating.helper.time']) ? $this->services['time.templating.helper.time'] : $this->getTime_Templating_Helper_TimeService()) && false ?: '_'}));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(${($_ = isset($this->services['ob_highcharts.twig.highcharts_extension']) ? $this->services['ob_highcharts.twig.highcharts_extension'] : $this->services['ob_highcharts.twig.highcharts_extension'] = new \Ob\HighchartsBundle\Twig\HighchartsExtension()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['gyman.twig.voucher_extension']) ? $this->services['gyman.twig.voucher_extension'] : $this->getGyman_Twig_VoucherExtensionService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['gyman.app.twig.entries_extension']) ? $this->services['gyman.app.twig.entries_extension'] : $this->services['gyman.app.twig.entries_extension'] = new \Gyman\Bundle\AppBundle\Twig\EntriesExtension()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['gyman.app.twig.avatar']) ? $this->services['gyman.app.twig.avatar'] : $this->getGyman_App_Twig_AvatarService()) && false ?: '_'});
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\DumpExtension(${($_ = isset($this->services['var_dumper.cloner']) ? $this->services['var_dumper.cloner'] : $this->getVarDumper_ClonerService()) && false ?: '_'}, $f));
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension($g));
        $instance->addGlobal('app', $h);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\ServiceLocator(array('Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => function () {
            return ${($_ = isset($this->services['twig.runtime.httpkernel']) ? $this->services['twig.runtime.httpkernel'] : $this->load(__DIR__.'/getTwig_Runtime_HttpkernelService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Form\\FormRenderer' => function () {
            return ${($_ = isset($this->services['twig.form.renderer']) ? $this->services['twig.form.renderer'] : $this->load(__DIR__.'/getTwig_Form_RendererService.php')) && false ?: '_'};
        }))));
        $instance->addGlobal('sentry_url', 'http://57c1dbc134824f4b99194c46a912c7fe:053224cf7c53440b80d71dd0017075ad@sentry.dev.gyman.pl/6');
        $instance->addGlobal('gallery_dir', '/uploads/gallery/');
        $instance->addGlobal('google_maps_api_key', NULL);
        $instance->addGlobal('baseUrl', 'gyman.vagrant');
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'var_dumper.cloner' shared service.
     *
     * @return \Symfony\Component\VarDumper\Cloner\VarCloner
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new \Symfony\Component\VarDumper\Cloner\VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMinDepth(1);
        $instance->setMaxString(-1);

        return $instance;
    }

    /**
     * Gets the private 'annotation_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\CachedReader(${($_ = isset($this->services['annotations.reader']) ? $this->services['annotations.reader'] : $this->getAnnotations_ReaderService()) && false ?: '_'}, new \Symfony\Component\Cache\DoctrineProvider(\Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDirs[0].'/annotations.php'), ${($_ = isset($this->services['cache.annotations']) ? $this->services['cache.annotations'] : $this->getCache_AnnotationsService()) && false ?: '_'})), true);
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->services['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'assets.context' shared service.
     *
     * @return \Symfony\Component\Asset\Context\RequestStackContext
     */
    protected function getAssets_ContextService()
    {
        return $this->services['assets.context'] = new \Symfony\Component\Asset\Context\RequestStackContext(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, '', false);
    }

    /**
     * Gets the private 'assets.packages' shared service.
     *
     * @return \Symfony\Component\Asset\Packages
     */
    protected function getAssets_PackagesService()
    {
        return $this->services['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), ${($_ = isset($this->services['assets.context']) ? $this->services['assets.context'] : $this->getAssets_ContextService()) && false ?: '_'}), array());
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->services['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('vUCLmqm+Rl', 0, 'YL3vE1kuiaiul8UOKxi4LB', ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->services['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('wlPGDN9sqT', 0, 'YL3vE1kuiaiul8UOKxi4LB', ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->services['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('xDabRMTJjO', 0, 'YL3vE1kuiaiul8UOKxi4LB', ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->services['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['dependency_injection.config.container_parameters_resource_checker']) ? $this->services['dependency_injection.config.container_parameters_resource_checker'] : $this->services['dependency_injection.config.container_parameters_resource_checker'] = new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this)) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['config.resource.self_checking_resource_checker']) ? $this->services['config.resource.self_checking_resource_checker'] : $this->services['config.resource.self_checking_resource_checker'] = new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker()) && false ?: '_'};
        }, 2));
    }

    /**
     * Gets the private 'controller_name_converter' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser
     */
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'});
    }

    /**
     * Gets the private 'data_collector.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector
     */
    protected function getDataCollector_FormService()
    {
        return $this->services['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector(${($_ = isset($this->services['data_collector.form.extractor']) ? $this->services['data_collector.form.extractor'] : $this->services['data_collector.form.extractor'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor()) && false ?: '_'});
    }

    /**
     * Gets the private 'data_collector.form.extractor' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor
     */
    protected function getDataCollector_Form_ExtractorService()
    {
        return $this->services['data_collector.form.extractor'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor();
    }

    /**
     * Gets the private 'data_collector.request' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector
     */
    protected function getDataCollector_RequestService()
    {
        return $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector();
    }

    /**
     * Gets the private 'data_collector.router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector
     */
    protected function getDataCollector_RouterService()
    {
        return $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector();
    }

    /**
     * Gets the private 'data_collector.translation' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollector\TranslationDataCollector
     */
    protected function getDataCollector_TranslationService()
    {
        return $this->services['data_collector.translation'] = new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.argument_resolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver
     */
    protected function getDebug_ArgumentResolverService()
    {
        return $this->services['debug.argument_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory(), new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['argument_resolver.request_attribute']) ? $this->services['argument_resolver.request_attribute'] : $this->services['argument_resolver.request_attribute'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver()) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['argument_resolver.request']) ? $this->services['argument_resolver.request'] : $this->services['argument_resolver.request'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver()) && false ?: '_'};
            yield 2 => ${($_ = isset($this->services['argument_resolver.session']) ? $this->services['argument_resolver.session'] : $this->services['argument_resolver.session'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver()) && false ?: '_'};
            yield 3 => ${($_ = isset($this->services['security.user_value_resolver']) ? $this->services['security.user_value_resolver'] : $this->load(__DIR__.'/getSecurity_UserValueResolverService.php')) && false ?: '_'};
            yield 4 => ${($_ = isset($this->services['argument_resolver.service']) ? $this->services['argument_resolver.service'] : $this->load(__DIR__.'/getArgumentResolver_ServiceService.php')) && false ?: '_'};
            yield 5 => ${($_ = isset($this->services['argument_resolver.default']) ? $this->services['argument_resolver.default'] : $this->services['argument_resolver.default'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver()) && false ?: '_'};
            yield 6 => ${($_ = isset($this->services['argument_resolver.variadic']) ? $this->services['argument_resolver.variadic'] : $this->services['argument_resolver.variadic'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver()) && false ?: '_'};
        }, 7)), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.controller_resolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->services['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ${($_ = isset($this->services['controller_name_converter']) ? $this->services['controller_name_converter'] : $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'})) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.request']) ? $this->services['monolog.logger.request'] : $this->getMonolog_Logger_RequestService()) && false ?: '_'}), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'}, ${($_ = isset($this->services['debug.argument_resolver']) ? $this->services['debug.argument_resolver'] : $this->getDebug_ArgumentResolverService()) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->services['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, ${($_ = isset($this->services['monolog.logger.php']) ? $this->services['monolog.logger.php'] : $this->getMonolog_Logger_PhpService()) && false ?: '_'}, -1, -1, true, ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'}, true);
    }

    /**
     * Gets the private 'debug.event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getDebug_EventDispatcherService()
    {
        $this->services['debug.event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.event']) ? $this->services['monolog.logger.event'] : $this->getMonolog_Logger_EventService()) && false ?: '_'});

        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['data_collector.router']) ? $this->services['data_collector.router'] : $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('console.command', array(0 => function () {
            return ${($_ = isset($this->services['dende_multitenancy.listener.command']) ? $this->services['dende_multitenancy.listener.command'] : $this->load(__DIR__.'/getDendeMultitenancy_Listener_CommandService.php')) && false ?: '_'};
        }, 1 => 'onConsoleCommand'), 255);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['gyman.account.logout_handler']) ? $this->services['gyman.account.logout_handler'] : $this->load(__DIR__.'/getGyman_Account_LogoutHandlerService.php')) && false ?: '_'};
        }, 1 => 'execute'), 1000);
        $instance->addListener('dende_calendar.calendar.after_creation', array(0 => function () {
            return ${($_ = isset($this->services['gyman.listener.create_section_for_calendar']) ? $this->services['gyman.listener.create_section_for_calendar'] : $this->load(__DIR__.'/getGyman_Listener_CreateSectionForCalendarService.php')) && false ?: '_'};
        }, 1 => 'onCalendarCreate'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['gyman.app.subdomain_name_listener']) ? $this->services['gyman.app.subdomain_name_listener'] : $this->getGyman_App_SubdomainNameListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 1000);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['gyman.app.listener.redirect_to_404']) ? $this->services['gyman.app.listener.redirect_to_404'] : $this->load(__DIR__.'/getGyman_App_Listener_RedirectTo404Service.php')) && false ?: '_'};
        }, 1 => 'onException'), 0);
        $instance->addListener('multitenancy.post_switch_connection', array(0 => function () {
            return ${($_ = isset($this->services['gyman.app.listener.setup_club_paths']) ? $this->services['gyman.app.listener.setup_club_paths'] : $this->load(__DIR__.'/getGyman_App_Listener_SetupClubPathsService.php')) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 0);
        $instance->addListener('gyman.open_entry.success', array(0 => function () {
            return ${($_ = isset($this->services['app.listener.open_entry']) ? $this->services['app.listener.open_entry'] : $this->load(__DIR__.'/getApp_Listener_OpenEntryService.php')) && false ?: '_'};
        }, 1 => 'onSuccess'), 0);
        $instance->addListener('gyman.member_for_user_created', array(0 => function () {
            return ${($_ = isset($this->services['app.listener.user_for_member_created']) ? $this->services['app.listener.user_for_member_created'] : $this->load(__DIR__.'/getApp_Listener_UserForMemberCreatedService.php')) && false ?: '_'};
        }, 1 => 'onUserCreate'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['sentry.exception_listener']) ? $this->services['sentry.exception_listener'] : $this->getSentry_ExceptionListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 0);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['sentry.exception_listener']) ? $this->services['sentry.exception_listener'] : $this->getSentry_ExceptionListenerService()) && false ?: '_'};
        }, 1 => 'onKernelException'), 0);
        $instance->addListener('console.exception', array(0 => function () {
            return ${($_ = isset($this->services['sentry.exception_listener']) ? $this->services['sentry.exception_listener'] : $this->getSentry_ExceptionListenerService()) && false ?: '_'};
        }, 1 => 'onConsoleException'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['response_listener']) ? $this->services['response_listener'] : $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')) && false ?: '_'};
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['streamed_response_listener']) ? $this->services['streamed_response_listener'] : $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), -1024);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['locale_listener']) ? $this->services['locale_listener'] : $this->getLocaleListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 16);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ${($_ = isset($this->services['locale_listener']) ? $this->services['locale_listener'] : $this->getLocaleListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['validate_request_listener']) ? $this->services['validate_request_listener'] : $this->services['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 256);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['resolve_controller_name_subscriber']) ? $this->services['resolve_controller_name_subscriber'] : $this->getResolveControllerNameSubscriberService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 24);
        $instance->addListener('console.error', array(0 => function () {
            return ${($_ = isset($this->services['console.error_listener']) ? $this->services['console.error_listener'] : $this->load(__DIR__.'/getConsole_ErrorListenerService.php')) && false ?: '_'};
        }, 1 => 'onConsoleError'), -128);
        $instance->addListener('console.terminate', array(0 => function () {
            return ${($_ = isset($this->services['console.error_listener']) ? $this->services['console.error_listener'] : $this->load(__DIR__.'/getConsole_ErrorListenerService.php')) && false ?: '_'};
        }, 1 => 'onConsoleTerminate'), -128);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['session_listener']) ? $this->services['session_listener'] : $this->getSessionListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 128);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['session.save_listener']) ? $this->services['session.save_listener'] : $this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), -1000);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['fragment.listener']) ? $this->services['fragment.listener'] : $this->getFragment_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 48);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['translator_listener']) ? $this->services['translator_listener'] : $this->getTranslatorListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 10);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ${($_ = isset($this->services['translator_listener']) ? $this->services['translator_listener'] : $this->getTranslatorListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), -100);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelException'), 0);
        $instance->addListener('kernel.terminate', array(0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelTerminate'), -1024);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['debug.debug_handlers_listener']) ? $this->services['debug.debug_handlers_listener'] : $this->getDebug_DebugHandlersListenerService()) && false ?: '_'};
        }, 1 => 'configure'), 2048);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['router_listener']) ? $this->services['router_listener'] : $this->getRouterListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 32);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ${($_ = isset($this->services['router_listener']) ? $this->services['router_listener'] : $this->getRouterListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['security.rememberme.response_listener']) ? $this->services['security.rememberme.response_listener'] : $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'), 8);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['twig.exception_listener']) ? $this->services['twig.exception_listener'] : $this->load(__DIR__.'/getTwig_ExceptionListenerService.php')) && false ?: '_'};
        }, 1 => 'onKernelException'), -128);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load(__DIR__.'/getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onException'), 0);
        $instance->addListener('kernel.terminate', array(0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load(__DIR__.'/getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onTerminate'), 0);
        $instance->addListener('console.error', array(0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load(__DIR__.'/getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onException'), 0);
        $instance->addListener('console.terminate', array(0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load(__DIR__.'/getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onTerminate'), 0);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.controller.listener']) ? $this->services['sensio_framework_extra.controller.listener'] : $this->getSensioFrameworkExtra_Controller_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.converter.listener']) ? $this->services['sensio_framework_extra.converter.listener'] : $this->getSensioFrameworkExtra_Converter_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.view.listener']) ? $this->services['sensio_framework_extra.view.listener'] : $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this)) && false ?: '_'};
        }, 1 => 'onKernelController'), -128);
        $instance->addListener('kernel.view', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.view.listener']) ? $this->services['sensio_framework_extra.view.listener'] : $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this)) && false ?: '_'};
        }, 1 => 'onKernelView'), 0);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.cache.listener']) ? $this->services['sensio_framework_extra.cache.listener'] : $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.cache.listener']) ? $this->services['sensio_framework_extra.cache.listener'] : $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.security.listener']) ? $this->services['sensio_framework_extra.security.listener'] : $this->getSensioFrameworkExtra_Security_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('fos_user.security.implicit_login', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.security.interactive_login_listener']) ? $this->services['fos_user.security.interactive_login_listener'] : $this->load(__DIR__.'/getFosUser_Security_InteractiveLoginListenerService.php')) && false ?: '_'};
        }, 1 => 'onImplicitLogin'), 0);
        $instance->addListener('security.interactive_login', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.security.interactive_login_listener']) ? $this->services['fos_user.security.interactive_login_listener'] : $this->load(__DIR__.'/getFosUser_Security_InteractiveLoginListenerService.php')) && false ?: '_'};
        }, 1 => 'onSecurityInteractiveLogin'), 0);
        $instance->addListener('fos_user.registration.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.authentication']) ? $this->services['fos_user.listener.authentication'] : $this->load(__DIR__.'/getFosUser_Listener_AuthenticationService.php')) && false ?: '_'};
        }, 1 => 'authenticate'), 0);
        $instance->addListener('fos_user.registration.confirmed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.authentication']) ? $this->services['fos_user.listener.authentication'] : $this->load(__DIR__.'/getFosUser_Listener_AuthenticationService.php')) && false ?: '_'};
        }, 1 => 'authenticate'), 0);
        $instance->addListener('fos_user.resetting.reset.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.authentication']) ? $this->services['fos_user.listener.authentication'] : $this->load(__DIR__.'/getFosUser_Listener_AuthenticationService.php')) && false ?: '_'};
        }, 1 => 'authenticate'), 0);
        $instance->addListener('fos_user.change_password.edit.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.group.create.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.group.delete.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.group.edit.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.profile.edit.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.registration.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.resetting.reset.completed', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.flash']) ? $this->services['fos_user.listener.flash'] : $this->load(__DIR__.'/getFosUser_Listener_FlashService.php')) && false ?: '_'};
        }, 1 => 'addSuccessFlash'), 0);
        $instance->addListener('fos_user.resetting.reset.initialize', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.resetting']) ? $this->services['fos_user.listener.resetting'] : $this->load(__DIR__.'/getFosUser_Listener_ResettingService.php')) && false ?: '_'};
        }, 1 => 'onResettingResetInitialize'), 0);
        $instance->addListener('fos_user.resetting.reset.success', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.resetting']) ? $this->services['fos_user.listener.resetting'] : $this->load(__DIR__.'/getFosUser_Listener_ResettingService.php')) && false ?: '_'};
        }, 1 => 'onResettingResetSuccess'), 0);
        $instance->addListener('fos_user.resetting.reset.request', array(0 => function () {
            return ${($_ = isset($this->services['fos_user.listener.resetting']) ? $this->services['fos_user.listener.resetting'] : $this->load(__DIR__.'/getFosUser_Listener_ResettingService.php')) && false ?: '_'};
        }, 1 => 'onResettingResetRequest'), 0);
        $instance->addListener('fos_user.registration.success', array(0 => function () {
            return ${($_ = isset($this->services['account_bundle.registered_user_subscriber']) ? $this->services['account_bundle.registered_user_subscriber'] : $this->load(__DIR__.'/getAccountBundle_RegisteredUserSubscriberService.php')) && false ?: '_'};
        }, 1 => 'onRegistrationCompleted'), 0);
        $instance->addListener('fos_user.profile.edit.completed', array(0 => function () {
            return ${($_ = isset($this->services['account_bundle.updated_profile_subscriber']) ? $this->services['account_bundle.updated_profile_subscriber'] : $this->load(__DIR__.'/getAccountBundle_UpdatedProfileSubscriberService.php')) && false ?: '_'};
        }, 1 => 'onProfileEditCompleted'), 0);
        $instance->addListener('fos_user.profile.edit.success', array(0 => function () {
            return ${($_ = isset($this->services['account_bundle.updated_profile_subscriber']) ? $this->services['account_bundle.updated_profile_subscriber'] : $this->load(__DIR__.'/getAccountBundle_UpdatedProfileSubscriberService.php')) && false ?: '_'};
        }, 1 => 'onProfileEditSuccess'), 0);
        $instance->addListener('fos_user.resetting.reset.success', array(0 => function () {
            return ${($_ = isset($this->services['account_bundle.updated_profile_subscriber']) ? $this->services['account_bundle.updated_profile_subscriber'] : $this->load(__DIR__.'/getAccountBundle_UpdatedProfileSubscriberService.php')) && false ?: '_'};
        }, 1 => 'onRessetingSuccess'), 0);
        $instance->addListener('console.command', array(0 => function () {
            return ${($_ = isset($this->services['debug.dump_listener']) ? $this->services['debug.dump_listener'] : $this->load(__DIR__.'/getDebug_DumpListenerService.php')) && false ?: '_'};
        }, 1 => 'configure'), 1024);
        $instance->addListener('kernel.response', array(0 => function () {
            return ${($_ = isset($this->services['web_profiler.debug_toolbar']) ? $this->services['web_profiler.debug_toolbar'] : $this->getWebProfiler_DebugToolbarService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'), -128);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ${($_ = isset($this->services['liip_functional_test.exception_listener']) ? $this->services['liip_functional_test.exception_listener'] : $this->services['liip_functional_test.exception_listener'] = new \Liip\FunctionalTestBundle\EventListener\ExceptionListener()) && false ?: '_'};
        }, 1 => 'setException'), 99999);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['liip_functional_test.exception_listener']) ? $this->services['liip_functional_test.exception_listener'] : $this->services['liip_functional_test.exception_listener'] = new \Liip\FunctionalTestBundle\EventListener\ExceptionListener()) && false ?: '_'};
        }, 1 => 'clearLastException'), 99999);
        $instance->addListener('kernel.request', array(0 => function () {
            return ${($_ = isset($this->services['liip_functional_test.validator']) ? $this->services['liip_functional_test.validator'] : $this->getLiipFunctionalTest_ValidatorService()) && false ?: '_'};
        }, 1 => 'clearLastErrors'), 99999);

        return $instance;
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->services['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter('phpstorm://%f:%l', ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, '/vagrant', '/_profiler/open?file=%f&line=%l#line%l');
    }

    /**
     * Gets the private 'debug.log_processor' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Processor\DebugProcessor
     */
    protected function getDebug_LogProcessorService()
    {
        return $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor();
    }

    /**
     * Gets the private 'debug.security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        return $this->services['debug.security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['security.access.authenticated_voter']) ? $this->services['security.access.authenticated_voter'] : $this->load(__DIR__.'/getSecurity_Access_AuthenticatedVoterService.php')) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['security.access.role_hierarchy_voter']) ? $this->services['security.access.role_hierarchy_voter'] : $this->load(__DIR__.'/getSecurity_Access_RoleHierarchyVoterService.php')) && false ?: '_'};
            yield 2 => ${($_ = isset($this->services['security.access.expression_voter']) ? $this->services['security.access.expression_voter'] : $this->load(__DIR__.'/getSecurity_Access_ExpressionVoterService.php')) && false ?: '_'};
        }, 3), 'affirmative', false, true));
    }

    /**
     * Gets the private 'debug.stopwatch' shared service.
     *
     * @return \Symfony\Component\Stopwatch\Stopwatch
     */
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true);
    }

    /**
     * Gets the private 'debug.validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getDebug_ValidatorService()
    {
        return $this->services['debug.validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator(${($_ = isset($this->services['validator.builder']) ? $this->services['validator.builder'] : $this->getValidator_BuilderService()) && false ?: '_'}->getValidator());
    }

    /**
     * Gets the private 'dende_calendar.listener.doctrine_event_listener' shared service.
     *
     * @return \Dende\CalendarBundle\Listener\DoctrineEventListener
     */
    protected function getDendeCalendar_Listener_DoctrineEventListenerService()
    {
        return $this->services['dende_calendar.listener.doctrine_event_listener'] = new \Dende\CalendarBundle\Listener\DoctrineEventListener($this->parameters['dende_calendar.mapping']);
    }

    /**
     * Gets the private 'dende_multitenancy.tenant_manager' shared service.
     *
     * @return \Dende\MultitenancyBundle\Manager\TenantManager
     */
    protected function getDendeMultitenancy_TenantManagerService()
    {
        $this->services['dende_multitenancy.tenant_manager'] = $instance = new \Dende\MultitenancyBundle\Manager\TenantManager(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});

        $instance->registerConnection('tenant', ${($_ = isset($this->services['doctrine.dbal.tenant_connection']) ? $this->services['doctrine.dbal.tenant_connection'] : $this->getDoctrine_Dbal_TenantConnectionService()) && false ?: '_'});
        $instance->registerProvider('tenant', ${($_ = isset($this->services['gyman.app.tenant_provider']) ? $this->services['gyman.app.tenant_provider'] : $this->getGyman_App_TenantProviderService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'doctrine.dbal.connection_factory' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ConnectionFactory
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory($this->parameters['doctrine.dbal.connection_factory.types']);
    }

    /**
     * Gets the private 'doctrine.dbal.logger' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Logger\DbalLogger
     */
    protected function getDoctrine_Dbal_LoggerService()
    {
        return $this->services['doctrine.dbal.logger'] = new \Symfony\Bridge\Doctrine\Logger\DbalLogger(${($_ = isset($this->services['monolog.logger.doctrine']) ? $this->services['monolog.logger.doctrine'] : $this->getMonolog_Logger_DoctrineService()) && false ?: '_'}, ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.dbal.logger.profiling.default' shared service.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack
     */
    protected function getDoctrine_Dbal_Logger_Profiling_DefaultService()
    {
        return $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the private 'doctrine.dbal.logger.profiling.maintanance' shared service.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack
     */
    protected function getDoctrine_Dbal_Logger_Profiling_MaintananceService()
    {
        return $this->services['doctrine.dbal.logger.profiling.maintanance'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the private 'doctrine.dbal.logger.profiling.tenant' shared service.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack
     */
    protected function getDoctrine_Dbal_Logger_Profiling_TenantService()
    {
        return $this->services['doctrine.dbal.logger.profiling.tenant'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the private 'doctrine.orm.container_repository_factory' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory
     */
    protected function getDoctrine_Orm_ContainerRepositoryFactoryService()
    {
        return $this->services['doctrine.orm.container_repository_factory'] = new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(${($_ = isset($this->services['service_locator.sr6ctxe']) ? $this->services['service_locator.sr6ctxe'] : $this->services['service_locator.sr6ctxe'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array())) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.orm.default_entity_listener_resolver' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver
     */
    protected function getDoctrine_Orm_DefaultEntityListenerResolverService()
    {
        return $this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this);
    }

    /**
     * Gets the private 'doctrine.orm.default_listeners.attach_entity_listeners' shared service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener
     */
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        return $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }

    /**
     * Gets the private 'doctrine.orm.default_manager_configurator' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator
     */
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
    }

    /**
     * Gets the private 'doctrine.orm.listeners.resolve_target_entity' shared service.
     *
     * @return \Doctrine\ORM\Tools\ResolveTargetEntityListener
     */
    protected function getDoctrine_Orm_Listeners_ResolveTargetEntityService()
    {
        $this->services['doctrine.orm.listeners.resolve_target_entity'] = $instance = new \Doctrine\ORM\Tools\ResolveTargetEntityListener();

        $instance->addResolveTargetEntity('Dende\\Calendar\\Domain\\Calendar\\EventInterface', 'Gyman\\Domain\\Calendar\\Event', array());
        $instance->addResolveTargetEntity('Dende\\Calendar\\Domain\\Calendar\\Event\\OccurrenceInterface', 'Gyman\\Domain\\Calendar\\Event\\Occurrence', array());

        return $instance;
    }

    /**
     * Gets the private 'doctrine.orm.naming_strategy.default' shared service.
     *
     * @return \Doctrine\ORM\Mapping\DefaultNamingStrategy
     */
    protected function getDoctrine_Orm_NamingStrategy_DefaultService()
    {
        return $this->services['doctrine.orm.naming_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultNamingStrategy();
    }

    /**
     * Gets the private 'doctrine.orm.quote_strategy.default' shared service.
     *
     * @return \Doctrine\ORM\Mapping\DefaultQuoteStrategy
     */
    protected function getDoctrine_Orm_QuoteStrategy_DefaultService()
    {
        return $this->services['doctrine.orm.quote_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultQuoteStrategy();
    }

    /**
     * Gets the private 'doctrine.orm.tenant_entity_listener_resolver' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver
     */
    protected function getDoctrine_Orm_TenantEntityListenerResolverService()
    {
        return $this->services['doctrine.orm.tenant_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this);
    }

    /**
     * Gets the private 'doctrine.orm.tenant_listeners.attach_entity_listeners' shared service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener
     */
    protected function getDoctrine_Orm_TenantListeners_AttachEntityListenersService()
    {
        return $this->services['doctrine.orm.tenant_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }

    /**
     * Gets the private 'doctrine.orm.tenant_manager_configurator' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator
     */
    protected function getDoctrine_Orm_TenantManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.tenant_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
    }

    /**
     * Gets the private 'doctrine.orm.validator_initializer' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.default_metadata_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.default_query_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.default_result_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.tenant_metadata_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_TenantMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.tenant_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_tenant_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.tenant_query_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_TenantQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.tenant_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_tenant_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'doctrine_cache.providers.doctrine.orm.tenant_result_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_TenantResultCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.tenant_result_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_tenant_7ce2cd66229867a9b4f1b6ef90791730a5f63b16df8c1c8c786c6fdb9fa88482');

        return $instance;
    }

    /**
     * Gets the private 'file_locator' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Config\FileLocator
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'}, '/vagrant/app/Resources', array(0 => '/vagrant/app'));
    }

    /**
     * Gets the private 'fos_user.user_listener' shared service.
     *
     * @return \FOS\UserBundle\Doctrine\UserListener
     */
    protected function getFosUser_UserListenerService()
    {
        return $this->services['fos_user.user_listener'] = new \FOS\UserBundle\Doctrine\UserListener(${($_ = isset($this->services['fos_user.util.password_updater']) ? $this->services['fos_user.util.password_updater'] : $this->getFosUser_Util_PasswordUpdaterService()) && false ?: '_'}, ${($_ = isset($this->services['fos_user.util.canonical_fields_updater']) ? $this->services['fos_user.util.canonical_fields_updater'] : $this->getFosUser_Util_CanonicalFieldsUpdaterService()) && false ?: '_'});
    }

    /**
     * Gets the private 'fos_user.util.canonical_fields_updater' shared service.
     *
     * @return \FOS\UserBundle\Util\CanonicalFieldsUpdater
     */
    protected function getFosUser_Util_CanonicalFieldsUpdaterService()
    {
        $a = ${($_ = isset($this->services['fos_user.util.email_canonicalizer']) ? $this->services['fos_user.util.email_canonicalizer'] : $this->services['fos_user.util.email_canonicalizer'] = new \FOS\UserBundle\Util\Canonicalizer()) && false ?: '_'};

        return $this->services['fos_user.util.canonical_fields_updater'] = new \FOS\UserBundle\Util\CanonicalFieldsUpdater($a, $a);
    }

    /**
     * Gets the private 'fos_user.util.email_canonicalizer' shared service.
     *
     * @return \FOS\UserBundle\Util\Canonicalizer
     */
    protected function getFosUser_Util_EmailCanonicalizerService()
    {
        return $this->services['fos_user.util.email_canonicalizer'] = new \FOS\UserBundle\Util\Canonicalizer();
    }

    /**
     * Gets the private 'fos_user.util.password_updater' shared service.
     *
     * @return \FOS\UserBundle\Util\PasswordUpdater
     */
    protected function getFosUser_Util_PasswordUpdaterService()
    {
        return $this->services['fos_user.util.password_updater'] = new \FOS\UserBundle\Util\PasswordUpdater(${($_ = isset($this->services['security.encoder_factory']) ? $this->services['security.encoder_factory'] : $this->getSecurity_EncoderFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'fragment.listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\FragmentListener
     */
    protected function getFragment_ListenerService()
    {
        return $this->services['fragment.listener'] = new \Symfony\Component\HttpKernel\EventListener\FragmentListener(${($_ = isset($this->services['uri_signer']) ? $this->services['uri_signer'] : $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('nuɐǝɔo ɹóʍʇsǝzɹd oƃǝɥɔns ɐu ɯǝłąuʎłdʍ')) && false ?: '_'}, '/_fragment');
    }

    /**
     * Gets the private 'gyman.app.subdomain_name_listener' shared service.
     *
     * @return \Gyman\Bundle\AppBundle\Listener\SubdomainNameListener
     */
    protected function getGyman_App_SubdomainNameListenerService()
    {
        return $this->services['gyman.app.subdomain_name_listener'] = new \Gyman\Bundle\AppBundle\Listener\SubdomainNameListener($this->get($this->getParameter("subdomain_provider_service")), ${($_ = isset($this->services['dende_multitenancy.tenant_manager']) ? $this->services['dende_multitenancy.tenant_manager'] : $this->getDendeMultitenancy_TenantManagerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'gyman.app.tenant_provider' shared service.
     *
     * @return \Gyman\Bundle\AppBundle\Services\TenantProvider
     */
    protected function getGyman_App_TenantProviderService()
    {
        return $this->services['gyman.app.tenant_provider'] = new \Gyman\Bundle\AppBundle\Services\TenantProvider($this->get($this->getParameter("subdomain_provider_service")), ${($_ = isset($this->services['gyman.club.repository']) ? $this->services['gyman.club.repository'] : $this->getGyman_Club_RepositoryService()) && false ?: '_'}, 'gyman.vagrant');
    }

    /**
     * Gets the private 'gyman.app.twig.avatar' shared service.
     *
     * @return \Gyman\Twig\Extension\Avatar
     */
    protected function getGyman_App_Twig_AvatarService()
    {
        return $this->services['gyman.app.twig.avatar'] = new \Gyman\Twig\Extension\Avatar(${($_ = isset($this->services['gyman.club.provider']) ? $this->services['gyman.club.provider'] : $this->load(__DIR__.'/getGyman_Club_ProviderService.php')) && false ?: '_'}->club(), '/vagrant/app/../web/uploads/gallery/', '/uploads/gallery/');
    }

    /**
     * Gets the private 'gyman.app.twig.entries_extension' shared service.
     *
     * @return \Gyman\Bundle\AppBundle\Twig\EntriesExtension
     */
    protected function getGyman_App_Twig_EntriesExtensionService()
    {
        return $this->services['gyman.app.twig.entries_extension'] = new \Gyman\Bundle\AppBundle\Twig\EntriesExtension();
    }

    /**
     * Gets the private 'gyman.club.repository' shared service.
     *
     * @return \Gyman\Bundle\ClubBundle\Entity\ClubRepository
     */
    protected function getGyman_Club_RepositoryService()
    {
        return $this->services['gyman.club.repository'] = ${($_ = isset($this->services['doctrine.orm.default_entity_manager']) ? $this->services['doctrine.orm.default_entity_manager'] : $this->getDoctrine_Orm_DefaultEntityManagerService()) && false ?: '_'}->getRepository('Gyman\\Bundle\\ClubBundle\\Entity\\Club');
    }

    /**
     * Gets the private 'gyman.default.request.arraycollection_converter' shared service.
     *
     * @return \Gyman\Bundle\AppBundle\Request\ArrayCollectionConverter
     */
    protected function getGyman_Default_Request_ArraycollectionConverterService()
    {
        $this->services['gyman.default.request.arraycollection_converter'] = $instance = new \Gyman\Bundle\AppBundle\Request\ArrayCollectionConverter();

        $instance->setEntityManager(${($_ = isset($this->services['doctrine.orm.tenant_entity_manager']) ? $this->services['doctrine.orm.tenant_entity_manager'] : $this->getDoctrine_Orm_TenantEntityManagerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'gyman.twig.voucher_extension' shared service.
     *
     * @return \Gyman\Bundle\AppBundle\Twig\VoucherExtension
     */
    protected function getGyman_Twig_VoucherExtensionService()
    {
        $this->services['gyman.twig.voucher_extension'] = $instance = new \Gyman\Bundle\AppBundle\Twig\VoucherExtension();

        $instance->setTranslator(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'knp_menu.menu_provider' shared service.
     *
     * @return \Knp\Menu\Provider\ChainProvider
     */
    protected function getKnpMenu_MenuProviderService()
    {
        return $this->services['knp_menu.menu_provider'] = new \Knp\Menu\Provider\ChainProvider(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['knp_menu.menu_provider.lazy']) ? $this->services['knp_menu.menu_provider.lazy'] : $this->load(__DIR__.'/getKnpMenu_MenuProvider_LazyService.php')) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['knp_menu.menu_provider.builder_alias']) ? $this->services['knp_menu.menu_provider.builder_alias'] : $this->load(__DIR__.'/getKnpMenu_MenuProvider_BuilderAliasService.php')) && false ?: '_'};
        }, 2));
    }

    /**
     * Gets the private 'knp_menu.renderer_provider' shared service.
     *
     * @return \Knp\Menu\Renderer\PsrProvider
     */
    protected function getKnpMenu_RendererProviderService()
    {
        return $this->services['knp_menu.renderer_provider'] = new \Knp\Menu\Renderer\PsrProvider(new \Symfony\Component\DependencyInjection\ServiceLocator(array('list' => function () {
            return ${($_ = isset($this->services['knp_menu.renderer.list']) ? $this->services['knp_menu.renderer.list'] : $this->load(__DIR__.'/getKnpMenu_Renderer_ListService.php')) && false ?: '_'};
        }, 'twig' => function () {
            return ${($_ = isset($this->services['knp_menu.renderer.twig']) ? $this->services['knp_menu.renderer.twig'] : $this->load(__DIR__.'/getKnpMenu_Renderer_TwigService.php')) && false ?: '_'};
        })), 'twig');
    }

    /**
     * Gets the private 'liip_functional_test.exception_listener' shared service.
     *
     * @return \Liip\FunctionalTestBundle\EventListener\ExceptionListener
     */
    protected function getLiipFunctionalTest_ExceptionListenerService()
    {
        return $this->services['liip_functional_test.exception_listener'] = new \Liip\FunctionalTestBundle\EventListener\ExceptionListener();
    }

    /**
     * Gets the private 'liip_functional_test.validator' shared service.
     *
     * @return \Liip\FunctionalTestBundle\Validator\DataCollectingValidator
     */
    protected function getLiipFunctionalTest_ValidatorService()
    {
        return $this->services['liip_functional_test.validator'] = new \Liip\FunctionalTestBundle\Validator\DataCollectingValidator(${($_ = isset($this->services['debug.validator']) ? $this->services['debug.validator'] : $this->getDebug_ValidatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, 'pl', ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'});
    }

    /**
     * Gets the private 'monolog.handler.grouped_main' shared service.
     *
     * @return \Monolog\Handler\GroupHandler
     */
    protected function getMonolog_Handler_GroupedMainService()
    {
        $this->services['monolog.handler.grouped_main'] = $instance = new \Monolog\Handler\GroupHandler(array(0 => ${($_ = isset($this->services['monolog.handler.streamed_main']) ? $this->services['monolog.handler.streamed_main'] : $this->getMonolog_Handler_StreamedMainService()) && false ?: '_'}), true);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : $this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->services['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/logs/dev.log'), 400, true, NULL);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : $this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.handler.streamed_main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_StreamedMainService()
    {
        $this->services['monolog.handler.streamed_main'] = $instance = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/logs/dev.log'), 400, true, NULL);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : $this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->services['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.doctrine' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.event' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_EventService()
    {
        $this->services['monolog.logger.event'] = $instance = new \Symfony\Bridge\Monolog\Logger('event');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.php' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_PhpService()
    {
        $this->services['monolog.logger.php'] = $instance = new \Symfony\Bridge\Monolog\Logger('php');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.profiler' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_ProfilerService()
    {
        $this->services['monolog.logger.profiler'] = $instance = new \Symfony\Bridge\Monolog\Logger('profiler');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.translation' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_TranslationService()
    {
        $this->services['monolog.logger.translation'] = $instance = new \Symfony\Bridge\Monolog\Logger('translation');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.grouped_main']) ? $this->services['monolog.handler.grouped_main'] : $this->getMonolog_Handler_GroupedMainService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.processor.psr_log_message' shared service.
     *
     * @return \Monolog\Processor\PsrLogMessageProcessor
     */
    protected function getMonolog_Processor_PsrLogMessageService()
    {
        return $this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor();
    }

    /**
     * Gets the private 'ob_highcharts.twig.highcharts_extension' shared service.
     *
     * @return \Ob\HighchartsBundle\Twig\HighchartsExtension
     */
    protected function getObHighcharts_Twig_HighchartsExtensionService()
    {
        return $this->services['ob_highcharts.twig.highcharts_extension'] = new \Ob\HighchartsBundle\Twig\HighchartsExtension();
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        return $this->services['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener(${($_ = isset($this->services['profiler']) ? $this->services['profiler'] : $this->getProfilerService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, NULL, false, false);
    }

    /**
     * Gets the private 'resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function getResolveControllerNameSubscriberService()
    {
        return $this->services['resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(${($_ = isset($this->services['controller_name_converter']) ? $this->services['controller_name_converter'] : $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'})) && false ?: '_'});
    }

    /**
     * Gets the private 'response_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, ${($_ = isset($this->services['router.request_context']) ? $this->services['router.request_context'] : $this->getRouter_RequestContextService()) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.request']) ? $this->services['monolog.logger.request'] : $this->getMonolog_Logger_RequestService()) && false ?: '_'}, '/vagrant', true);
    }

    /**
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['security.authentication.provider.dao.main']) ? $this->services['security.authentication.provider.dao.main'] : $this->load(__DIR__.'/getSecurity_Authentication_Provider_Dao_MainService.php')) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['security.authentication.provider.anonymous.main']) ? $this->services['security.authentication.provider.anonymous.main'] : $this->services['security.authentication.provider.anonymous.main'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('5a32f77b3b6615.07260813')) && false ?: '_'};
        }, 2), true);

        $instance->setEventDispatcher(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'security.authentication.trust_resolver' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver
     */
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }

    /**
     * Gets the private 'security.encoder_factory' shared service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\EncoderFactory
     */
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('FOS\\UserBundle\\Model\\UserInterface' => array('algorithm' => 'sha512', 'hash_algorithm' => 'sha512', 'key_length' => 40, 'ignore_case' => false, 'encode_as_base64' => true, 'iterations' => 5000, 'cost' => 13)));
    }

    /**
     * Gets the private 'security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener
     */
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener(${($_ = isset($this->services['security.firewall.map']) ? $this->services['security.firewall.map'] : $this->getSecurity_Firewall_MapService()) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        return $this->services['security.firewall.map'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\ServiceLocator(array('security.firewall.map.context.dev' => function () {
            return ${($_ = isset($this->services['security.firewall.map.context.dev']) ? $this->services['security.firewall.map.context.dev'] : $this->load(__DIR__.'/getSecurity_Firewall_Map_Context_DevService.php')) && false ?: '_'};
        }, 'security.firewall.map.context.main' => function () {
            return ${($_ = isset($this->services['security.firewall.map.context.main']) ? $this->services['security.firewall.map.context.main'] : $this->load(__DIR__.'/getSecurity_Firewall_Map_Context_MainService.php')) && false ?: '_'};
        })), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ${($_ = isset($this->services['security.request_matcher.zfhj2lw']) ? $this->services['security.request_matcher.zfhj2lw'] : $this->services['security.request_matcher.zfhj2lw'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/')) && false ?: '_'};
            yield 'security.firewall.map.context.main' => ${($_ = isset($this->services['security.request_matcher.00qf1z7']) ? $this->services['security.request_matcher.00qf1z7'] : $this->services['security.request_matcher.00qf1z7'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/')) && false ?: '_'};
        }, 2));
    }

    /**
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->services['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'});

        $instance->registerListener('main', '/logout', 'logout', '_csrf_token', NULL, NULL);

        return $instance;
    }

    /**
     * Gets the private 'security.rememberme.response_listener' shared service.
     *
     * @return \Symfony\Component\Security\Http\RememberMe\ResponseListener
     */
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }

    /**
     * Gets the private 'security.role_hierarchy' shared service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy($this->parameters['security.role_hierarchy.roles']);
    }

    /**
     * Gets the private 'sensio_framework_extra.cache.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener
     */
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener();
    }

    /**
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'});
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.datetime' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter
     */
    protected function getSensioFrameworkExtra_Converter_DatetimeService()
    {
        return $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter();
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.doctrine.orm' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter
     */
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener(${($_ = isset($this->services['sensio_framework_extra.converter.manager']) ? $this->services['sensio_framework_extra.converter.manager'] : $this->getSensioFrameworkExtra_Converter_ManagerService()) && false ?: '_'}, true);
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.manager' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager
     */
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $instance->add(${($_ = isset($this->services['sensio_framework_extra.converter.doctrine.orm']) ? $this->services['sensio_framework_extra.converter.doctrine.orm'] : $this->getSensioFrameworkExtra_Converter_Doctrine_OrmService()) && false ?: '_'}, 0, 'doctrine.orm');
        $instance->add(${($_ = isset($this->services['sensio_framework_extra.converter.datetime']) ? $this->services['sensio_framework_extra.converter.datetime'] : $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter()) && false ?: '_'}, 0, 'datetime');
        $instance->add(${($_ = isset($this->services['gyman.default.request.arraycollection_converter']) ? $this->services['gyman.default.request.arraycollection_converter'] : $this->getGyman_Default_Request_ArraycollectionConverterService()) && false ?: '_'}, 0, NULL);

        return $instance;
    }

    /**
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->services['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(NULL, new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), ${($_ = isset($this->services['security.authentication.trust_resolver']) ? $this->services['security.authentication.trust_resolver'] : $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken')) && false ?: '_'}, ${($_ = isset($this->services['security.role_hierarchy']) ? $this->services['security.role_hierarchy'] : $this->getSecurity_RoleHierarchyService()) && false ?: '_'}, ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'}, ${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }

    /**
     * Gets the private 'sentry.client' shared service.
     *
     * @return \Sentry\SentryBundle\SentrySymfonyClient
     */
    protected function getSentry_ClientService()
    {
        $this->services['sentry.client'] = $instance = new \Sentry\SentryBundle\SentrySymfonyClient('http://57c1dbc134824f4b99194c46a912c7fe:053224cf7c53440b80d71dd0017075ad@sentry.dev.gyman.pl/6', array(), NULL);

        $instance->setRelease(NULL);
        $instance->setEnvironment('dev');
        $instance->setAppPath('/vagrant/app/..');
        $instance->setExcludedAppPaths($this->parameters['sentry.excluded_app_paths']);
        $instance->setPrefixes($this->parameters['sentry.prefixes']);
        $instance->install();

        return $instance;
    }

    /**
     * Gets the private 'sentry.exception_listener' shared service.
     *
     * @return \Sentry\SentryBundle\EventListener\ExceptionListener
     */
    protected function getSentry_ExceptionListenerService()
    {
        return $this->services['sentry.exception_listener'] = new \Sentry\SentryBundle\EventListener\ExceptionListener(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'}, ${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'}, ${($_ = isset($this->services['sentry.client']) ? $this->services['sentry.client'] : $this->getSentry_ClientService()) && false ?: '_'}, $this->parameters['sentry.skip_capture']);
    }

    /**
     * Gets the private 'service_locator.sr6ctxe' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function getServiceLocator_Sr6ctxeService()
    {
        return $this->services['service_locator.sr6ctxe'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array());
    }

    /**
     * Gets the private 'session.save_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SaveSessionListener
     */
    protected function getSession_SaveListenerService()
    {
        return $this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener();
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\ServiceLocator(array('session' => function () {
            return ${($_ = isset($this->services['session']) ? $this->services['session'] : $this->load(__DIR__.'/getSessionService.php')) && false ?: '_'};
        })));
    }

    /**
     * Gets the private 'streamed_response_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener
     */
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }

    /**
     * Gets the private 'templating.locator' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator
     */
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator(${($_ = isset($this->services['file_locator']) ? $this->services['file_locator'] : $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'}, '/vagrant/app/Resources', array(0 => '/vagrant/app'))) && false ?: '_'}, $this->targetDirs[0]);
    }

    /**
     * Gets the private 'templating.name_parser' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser
     */
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'});
    }

    /**
     * Gets the private 'time.datetime_formatter' shared service.
     *
     * @return \Knp\Bundle\TimeBundle\DateTimeFormatter
     */
    protected function getTime_DatetimeFormatterService()
    {
        return $this->services['time.datetime_formatter'] = new \Knp\Bundle\TimeBundle\DateTimeFormatter(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'time.templating.helper.time' shared service.
     *
     * @return \Knp\Bundle\TimeBundle\Templating\Helper\TimeHelper
     */
    protected function getTime_Templating_Helper_TimeService()
    {
        return $this->services['time.templating.helper.time'] = new \Knp\Bundle\TimeBundle\Templating\Helper\TimeHelper(${($_ = isset($this->services['time.datetime_formatter']) ? $this->services['time.datetime_formatter'] : $this->getTime_DatetimeFormatterService()) && false ?: '_'});
    }

    /**
     * Gets the private 'translator.default' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\ServiceLocator(array('translation.loader.csv' => function () {
            return ${($_ = isset($this->services['translation.loader.csv']) ? $this->services['translation.loader.csv'] : $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader()) && false ?: '_'};
        }, 'translation.loader.dat' => function () {
            return ${($_ = isset($this->services['translation.loader.dat']) ? $this->services['translation.loader.dat'] : $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader()) && false ?: '_'};
        }, 'translation.loader.ini' => function () {
            return ${($_ = isset($this->services['translation.loader.ini']) ? $this->services['translation.loader.ini'] : $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader()) && false ?: '_'};
        }, 'translation.loader.json' => function () {
            return ${($_ = isset($this->services['translation.loader.json']) ? $this->services['translation.loader.json'] : $this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader()) && false ?: '_'};
        }, 'translation.loader.mo' => function () {
            return ${($_ = isset($this->services['translation.loader.mo']) ? $this->services['translation.loader.mo'] : $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader()) && false ?: '_'};
        }, 'translation.loader.php' => function () {
            return ${($_ = isset($this->services['translation.loader.php']) ? $this->services['translation.loader.php'] : $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader()) && false ?: '_'};
        }, 'translation.loader.po' => function () {
            return ${($_ = isset($this->services['translation.loader.po']) ? $this->services['translation.loader.po'] : $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader()) && false ?: '_'};
        }, 'translation.loader.qt' => function () {
            return ${($_ = isset($this->services['translation.loader.qt']) ? $this->services['translation.loader.qt'] : $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader()) && false ?: '_'};
        }, 'translation.loader.res' => function () {
            return ${($_ = isset($this->services['translation.loader.res']) ? $this->services['translation.loader.res'] : $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader()) && false ?: '_'};
        }, 'translation.loader.xliff' => function () {
            return ${($_ = isset($this->services['translation.loader.xliff']) ? $this->services['translation.loader.xliff'] : $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader()) && false ?: '_'};
        }, 'translation.loader.yml' => function () {
            return ${($_ = isset($this->services['translation.loader.yml']) ? $this->services['translation.loader.yml'] : $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader()) && false ?: '_'};
        })), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\MessageSelector()), 'pl', array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yaml', 1 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => ($this->targetDirs[0].'/translations'), 'debug' => true, 'resource_files' => array('af' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.af.yml'), 'ar' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ar.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ar.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ar.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ar.yml'), 'az' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.az.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.az.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.az.xlf'), 'bg' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.bg.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.bg.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.bg.yml'), 'ca' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ca.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ca.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ca.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ca.yml'), 'cs' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.cs.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.cs.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.cs.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.cs.yml'), 'cy' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf'), 'da' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.da.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.da.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.da.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.da.yml'), 'de' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.de.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.de.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.de.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.de.yml'), 'el' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.el.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.el.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.el.yml'), 'en' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.en.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.en.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.en.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.en.yml', 6 => '/vagrant/vendor/dende/calendar-bundle/Resources/translations/messages.en.yml'), 'es' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.es.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.es.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.es.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.es.yml'), 'et' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf', 2 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.et.yml'), 'eu' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.eu.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.eu.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.eu.yml'), 'fa' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fa.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fa.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fa.yml'), 'fi' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.fi.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fi.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fi.yml'), 'fr' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fr.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.fr.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fr.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fr.yml', 6 => '/vagrant/src/Bundle/ChartsBundle/Resources/translations/messages.fr.xlf', 7 => '/vagrant/src/Bundle/ClubBundle/Resources/translations/messages.fr.xlf', 8 => '/vagrant/src/Bundle/ReportsBundle/Resources/translations/messages.fr.xlf', 9 => '/vagrant/src/Bundle/LandingPageBundle/Resources/translations/messages.fr.xlf'), 'gl' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.gl.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.gl.yml'), 'he' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.he.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.he.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.he.yml'), 'hr' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hr.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.hr.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.hr.yml'), 'hu' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hu.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.hu.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.hu.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.hu.yml'), 'hy' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf'), 'id' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.id.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.id.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.id.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.id.yml'), 'it' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.it.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.it.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.it.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.it.yml'), 'ja' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ja.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ja.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ja.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ja.yml'), 'lb' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lb.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lb.yml'), 'lt' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lt.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.lt.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lt.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.lt.yml'), 'lv' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lv.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lv.xlf', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lv.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.lv.yml'), 'mn' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf'), 'nl' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nl.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.nl.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.nl.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.nl.yml'), 'nn' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nn.xlf'), 'no' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.no.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.no.xlf'), 'pl' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pl.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.pl.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pl.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pl.yml', 6 => '/vagrant/vendor/dende/calendar-bundle/Resources/translations/messages.pl.yml', 7 => '/vagrant/vendor/dende/calendar-bundle/Resources/translations/validators.pl.yml', 8 => '/vagrant/src/Bundle/DashboardBundle/Resources/translations/messages.pl.yml', 9 => '/vagrant/src/Bundle/AccountBundle/Resources/translations/messages.pl.yml', 10 => '/vagrant/src/Bundle/AccountBundle/Resources/translations/validators.pl.yml', 11 => '/vagrant/src/Bundle/MailerBundle/Resources/translations/FOSUserBundle.pl.yml', 12 => '/vagrant/src/Bundle/MailerBundle/Resources/translations/messages.pl.yml', 13 => '/vagrant/src/Bundle/AppBundle/Resources/translations/messages.pl.yml', 14 => '/vagrant/src/Bundle/SettingsBundle/Resources/translations/messages.pl.yml', 15 => '/vagrant/app/Resources/translations/messages.pl.yml'), 'pt' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.pt.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pt.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pt.yml'), 'pt_BR' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt_BR.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.pt_BR.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pt_BR.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pt_BR.yml'), 'ro' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ro.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ro.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ro.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ro.yml'), 'ru' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ru.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ru.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ru.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ru.yml'), 'sk' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sk.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.sk.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sk.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sk.yml'), 'sl' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sl.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.sl.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sl.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sl.yml'), 'sq' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf'), 'sr_Cyrl' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Cyrl.xlf'), 'sr_Latn' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Latn.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.sr_Latn.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sr_Latn.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sr_Latn.yml'), 'sv' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sv.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.sv.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sv.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sv.yml'), 'th' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.th.xlf', 2 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.th.yml', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.th.yml'), 'tr' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.tr.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.tr.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.tr.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.tr.yml'), 'uk' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.uk.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.uk.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.uk.yml'), 'vi' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.vi.xlf', 2 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.vi.xliff', 3 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.vi.yml', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.vi.yml'), 'zh_CN' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf', 1 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf', 2 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.zh_CN.xlf', 3 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.zh_CN.xliff', 4 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.zh_CN.yml', 5 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.zh_CN.yml'), 'zh_TW' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf', 1 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.zh_TW.xliff'), 'pt_PT' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt_PT.xlf', 1 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.pt_PT.xliff'), 'ua' => array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ua.xlf'), 'bs_Latn_BA' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.bs_Latn_BA.xliff'), 'eo' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.eo.xliff', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.eo.yml', 2 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.eo.yml'), 'hr_HR' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.hr_HR.xliff'), 'ky' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.ky.xliff', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ky.yml', 2 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ky.yml'), 'sr_Latin' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.sr_Latin.xliff'), 'zh' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.zh.xliff'), 'zh_HK' => array(0 => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle/Resources/translations/time.zh_HK.xliff'), 'bn' => array(0 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.bn.yml', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.bn.yml'), 'bn_BD' => array(0 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.bn_BD.yml', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.bn_BD.yml'), 'nb' => array(0 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.nb.yml', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.nb.yml'))));

        $instance->setConfigCacheFactory(${($_ = isset($this->services['config_cache_factory']) ? $this->services['config_cache_factory'] : $this->getConfigCacheFactoryService()) && false ?: '_'});
        $instance->setFallbackLocales(array(0 => 'pl'));

        return $instance;
    }

    /**
     * Gets the private 'translator_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\TranslatorListener
     */
    protected function getTranslatorListenerService()
    {
        return $this->services['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'});
    }

    /**
     * Gets the private 'twig.loader' shared service.
     *
     * @return \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader
     */
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader(${($_ = isset($this->services['templating.locator']) ? $this->services['templating.locator'] : $this->getTemplating_LocatorService()) && false ?: '_'}, ${($_ = isset($this->services['templating.name_parser']) ? $this->services['templating.name_parser'] : $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'})) && false ?: '_'}, '/vagrant');

        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', 'Framework');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', '!Framework');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', 'Security');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', '!Security');
        $instance->addPath('/vagrant/app/Resources/TwigBundle/views', 'Twig');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', 'Twig');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', '!Twig');
        $instance->addPath('/vagrant/vendor/symfony/swiftmailer-bundle/Resources/views', 'Swiftmailer');
        $instance->addPath('/vagrant/vendor/symfony/swiftmailer-bundle/Resources/views', '!Swiftmailer');
        $instance->addPath('/vagrant/vendor/knplabs/knp-menu-bundle/src/Resources/views', 'KnpMenu');
        $instance->addPath('/vagrant/vendor/knplabs/knp-menu-bundle/src/Resources/views', '!KnpMenu');
        $instance->addPath('/vagrant/app/Resources/FOSUserBundle/views', 'FOSUser');
        $instance->addPath('/vagrant/vendor/friendsofsymfony/user-bundle/Resources/views', 'FOSUser');
        $instance->addPath('/vagrant/vendor/friendsofsymfony/user-bundle/Resources/views', '!FOSUser');
        $instance->addPath('/vagrant/vendor/doctrine/doctrine-bundle/Resources/views', 'Doctrine');
        $instance->addPath('/vagrant/vendor/doctrine/doctrine-bundle/Resources/views', '!Doctrine');
        $instance->addPath('/vagrant/vendor/liip/monitor-bundle/Resources/views', 'LiipMonitor');
        $instance->addPath('/vagrant/vendor/liip/monitor-bundle/Resources/views', '!LiipMonitor');
        $instance->addPath('/vagrant/app/Resources/DendeCalendarBundle/views', 'DendeCalendar');
        $instance->addPath('/vagrant/vendor/dende/calendar-bundle/Resources/views', 'DendeCalendar');
        $instance->addPath('/vagrant/vendor/dende/calendar-bundle/Resources/views', '!DendeCalendar');
        $instance->addPath('/vagrant/src/Bundle/DashboardBundle/Resources/views', 'Dashboard');
        $instance->addPath('/vagrant/src/Bundle/DashboardBundle/Resources/views', '!Dashboard');
        $instance->addPath('/vagrant/src/Bundle/ChartsBundle/Resources/views', 'Charts');
        $instance->addPath('/vagrant/src/Bundle/ChartsBundle/Resources/views', '!Charts');
        $instance->addPath('/vagrant/src/Bundle/ClubBundle/Resources/views', 'Club');
        $instance->addPath('/vagrant/src/Bundle/ClubBundle/Resources/views', '!Club');
        $instance->addPath('/vagrant/src/Bundle/AccountBundle/Resources/views', 'Account');
        $instance->addPath('/vagrant/src/Bundle/AccountBundle/Resources/views', '!Account');
        $instance->addPath('/vagrant/src/Bundle/MailerBundle/Resources/views', 'Mailer');
        $instance->addPath('/vagrant/src/Bundle/MailerBundle/Resources/views', '!Mailer');
        $instance->addPath('/vagrant/src/Bundle/BaseBundle/Resources/views', 'Base');
        $instance->addPath('/vagrant/src/Bundle/BaseBundle/Resources/views', '!Base');
        $instance->addPath('/vagrant/src/Bundle/AppBundle/Resources/views', 'GymanApp');
        $instance->addPath('/vagrant/src/Bundle/AppBundle/Resources/views', '!GymanApp');
        $instance->addPath('/vagrant/src/Bundle/ReportsBundle/Resources/views', 'GymanReports');
        $instance->addPath('/vagrant/src/Bundle/ReportsBundle/Resources/views', '!GymanReports');
        $instance->addPath('/vagrant/src/Bundle/LandingPageBundle/Resources/views', 'GymanLandingPage');
        $instance->addPath('/vagrant/src/Bundle/LandingPageBundle/Resources/views', '!GymanLandingPage');
        $instance->addPath('/vagrant/src/Bundle/SettingsBundle/Resources/views', 'GymanSettings');
        $instance->addPath('/vagrant/src/Bundle/SettingsBundle/Resources/views', '!GymanSettings');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/views', 'Debug');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/views', '!Debug');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views', 'WebProfiler');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views', '!WebProfiler');
        $instance->addPath('/vagrant/vendor/liip/functional-test-bundle/Resources/views', 'LiipFunctionalTest');
        $instance->addPath('/vagrant/vendor/liip/functional-test-bundle/Resources/views', '!LiipFunctionalTest');
        $instance->addPath('/vagrant/app/Resources/views');
        $instance->addPath('/vagrant/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form');
        $instance->addPath('/vagrant/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views');

        return $instance;
    }

    /**
     * Gets the private 'twig.profile' shared service.
     *
     * @return \Twig\Profiler\Profile
     */
    protected function getTwig_ProfileService()
    {
        return $this->services['twig.profile'] = new \Twig\Profiler\Profile();
    }

    /**
     * Gets the private 'uri_signer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\UriSigner
     */
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('nuɐǝɔo ɹóʍʇsǝzɹd oƃǝɥɔns ɐu ɯǝłąuʎłdʍ');
    }

    /**
     * Gets the private 'validate_request_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener
     */
    protected function getValidateRequestListenerService()
    {
        return $this->services['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener();
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface
     */
    protected function getValidator_BuilderService()
    {
        $this->services['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\ServiceLocator(array('CantEnterPastOccurrenceValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.cant_enter_past_occurrence.validator']) ? $this->services['gyman.entries.cant_enter_past_occurrence.validator'] : $this->services['gyman.entries.cant_enter_past_occurrence.validator'] = new \Gyman\Bundle\AppBundle\Validator\CantEnterPastOccurrenceValidator()) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\CantEnterPastOccurrenceValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.cant_enter_past_occurrence.validator']) ? $this->services['gyman.entries.cant_enter_past_occurrence.validator'] : $this->services['gyman.entries.cant_enter_past_occurrence.validator'] = new \Gyman\Bundle\AppBundle\Validator\CantEnterPastOccurrenceValidator()) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\MaximumAmountGreaterThanCreditEntriesValidator' => function () {
            return ${($_ = isset($this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint']) ? $this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint'] : $this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint'] = new \Gyman\Bundle\AppBundle\Validator\MaximumAmountGreaterThanCreditEntriesValidator()) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\OnlyEnterOnceValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.only_enter_once.validator']) ? $this->services['gyman.entries.only_enter_once.validator'] : $this->services['gyman.entries.only_enter_once.validator'] = new \Gyman\Bundle\AppBundle\Validator\OnlyEnterOnceValidator()) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\PriceSetForPaidEntryValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.price_set_for_paid_entry.validator']) ? $this->services['gyman.entries.price_set_for_paid_entry.validator'] : $this->services['gyman.entries.price_set_for_paid_entry.validator'] = new \Gyman\Bundle\AppBundle\Validator\PriceSetForPaidEntryValidator()) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\UniqueClubSubdomainValidator' => function () {
            return ${($_ = isset($this->services['gyman.club.unique_subdomain.validator']) ? $this->services['gyman.club.unique_subdomain.validator'] : $this->load(__DIR__.'/getGyman_Club_UniqueSubdomain_ValidatorService.php')) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\UniqueMemberBarcodeValidator' => function () {
            return ${($_ = isset($this->services['gyman.members.unique_member_barcode.validator']) ? $this->services['gyman.members.unique_member_barcode.validator'] : $this->load(__DIR__.'/getGyman_Members_UniqueMemberBarcode_ValidatorService.php')) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\UniqueMemberEmailValidator' => function () {
            return ${($_ = isset($this->services['gyman.members.unique_member_email.validator']) ? $this->services['gyman.members.unique_member_email.validator'] : $this->load(__DIR__.'/getGyman_Members_UniqueMemberEmail_ValidatorService.php')) && false ?: '_'};
        }, 'Gyman\\Bundle\\AppBundle\\Validator\\VoucherDateValidator' => function () {
            return ${($_ = isset($this->services['validator.voucher_date']) ? $this->services['validator.voucher_date'] : $this->load(__DIR__.'/getValidator_VoucherDateService.php')) && false ?: '_'};
        }, 'OnlyEnterOnceValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.only_enter_once.validator']) ? $this->services['gyman.entries.only_enter_once.validator'] : $this->services['gyman.entries.only_enter_once.validator'] = new \Gyman\Bundle\AppBundle\Validator\OnlyEnterOnceValidator()) && false ?: '_'};
        }, 'PriceSetForPaidEntryValidator' => function () {
            return ${($_ = isset($this->services['gyman.entries.price_set_for_paid_entry.validator']) ? $this->services['gyman.entries.price_set_for_paid_entry.validator'] : $this->services['gyman.entries.price_set_for_paid_entry.validator'] = new \Gyman\Bundle\AppBundle\Validator\PriceSetForPaidEntryValidator()) && false ?: '_'};
        }, 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => function () {
            return ${($_ = isset($this->services['doctrine.orm.validator.unique']) ? $this->services['doctrine.orm.validator.unique'] : $this->load(__DIR__.'/getDoctrine_Orm_Validator_UniqueService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => function () {
            return ${($_ = isset($this->services['security.validator.user_password']) ? $this->services['security.validator.user_password'] : $this->load(__DIR__.'/getSecurity_Validator_UserPasswordService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => function () {
            return ${($_ = isset($this->services['validator.email']) ? $this->services['validator.email'] : $this->services['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator(false)) && false ?: '_'};
        }, 'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => function () {
            return ${($_ = isset($this->services['validator.expression']) ? $this->services['validator.expression'] : $this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator()) && false ?: '_'};
        }, 'UniqueClubSubdomainValidator' => function () {
            return ${($_ = isset($this->services['gyman.club.unique_subdomain.validator']) ? $this->services['gyman.club.unique_subdomain.validator'] : $this->load(__DIR__.'/getGyman_Club_UniqueSubdomain_ValidatorService.php')) && false ?: '_'};
        }, 'UniqueMemberBarcodeValidator' => function () {
            return ${($_ = isset($this->services['gyman.members.unique_member_barcode.validator']) ? $this->services['gyman.members.unique_member_barcode.validator'] : $this->load(__DIR__.'/getGyman_Members_UniqueMemberBarcode_ValidatorService.php')) && false ?: '_'};
        }, 'UniqueMemberEmailValidator' => function () {
            return ${($_ = isset($this->services['gyman.members.unique_member_email.validator']) ? $this->services['gyman.members.unique_member_email.validator'] : $this->load(__DIR__.'/getGyman_Members_UniqueMemberEmail_ValidatorService.php')) && false ?: '_'};
        }, 'doctrine.orm.validator.unique' => function () {
            return ${($_ = isset($this->services['doctrine.orm.validator.unique']) ? $this->services['doctrine.orm.validator.unique'] : $this->load(__DIR__.'/getDoctrine_Orm_Validator_UniqueService.php')) && false ?: '_'};
        }, 'security.validator.user_password' => function () {
            return ${($_ = isset($this->services['security.validator.user_password']) ? $this->services['security.validator.user_password'] : $this->load(__DIR__.'/getSecurity_Validator_UserPasswordService.php')) && false ?: '_'};
        }, 'validator.expression' => function () {
            return ${($_ = isset($this->services['validator.expression']) ? $this->services['validator.expression'] : $this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator()) && false ?: '_'};
        }, 'validator.voucher_amount_for_credit_entries_constraint' => function () {
            return ${($_ = isset($this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint']) ? $this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint'] : $this->services['gyman.app.validator.voucher_amount_for_credit_entries_constraint'] = new \Gyman\Bundle\AppBundle\Validator\MaximumAmountGreaterThanCreditEntriesValidator()) && false ?: '_'};
        }, 'validator.voucher_date_constraint' => function () {
            return ${($_ = isset($this->services['validator.voucher_date']) ? $this->services['validator.voucher_date'] : $this->load(__DIR__.'/getValidator_VoucherDateService.php')) && false ?: '_'};
        }))));
        $instance->setTranslator(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings(array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/config/validation.xml'));
        $instance->addYamlMappings(array(0 => '/vagrant/vendor/dende/calendar-bundle/Resources/config/validation.yml', 1 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/createClub.yml', 2 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/createMember.yml', 3 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/createVoucher.yml', 4 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/details.yml', 5 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/openEntryCommand.yml', 6 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/section.yml', 7 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateMember.yml', 8 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateSettings.yml', 9 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateVoucher.yml'));
        $instance->enableAnnotationMapping(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'});
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers(array(0 => new \FOS\UserBundle\Validator\Initializer(${($_ = isset($this->services['fos_user.util.canonical_fields_updater']) ? $this->services['fos_user.util.canonical_fields_updater'] : $this->getFosUser_Util_CanonicalFieldsUpdaterService()) && false ?: '_'}), 1 => ${($_ = isset($this->services['doctrine.orm.validator_initializer']) ? $this->services['doctrine.orm.validator_initializer'] : $this->getDoctrine_Orm_ValidatorInitializerService()) && false ?: '_'}));
        $instance->addXmlMapping('/vagrant/vendor/friendsofsymfony/user-bundle/DependencyInjection/Compiler/../../Resources/config/storage-validation/orm.xml');

        return $instance;
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->services['web_profiler.csp.handler'] = new \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler(new \Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator());
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->services['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener(${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}, false, 2, 'bottom', ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, '^/(app(_[\\w]+)?\\.php/)?_wdt', ${($_ = isset($this->services['web_profiler.csp.handler']) ? $this->services['web_profiler.csp.handler'] : $this->getWebProfiler_Csp_HandlerService()) && false ?: '_'});
    }

    public function getParameter($name)
    {
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = array(
        'kernel.cache_dir' => false,
        'kernel.logs_dir' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'profiler.storage.dsn' => false,
        'debug.container.dump' => false,
        'doctrine.orm.proxy_dir' => false,
    );
    private $dynamicParameters = array();

    /**
     * Computes a dynamic parameter.
     *
     * @param string The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        switch ($name) {
            case 'kernel.cache_dir': $value = $this->targetDirs[0]; break;
            case 'kernel.logs_dir': $value = ($this->targetDirs[2].'/logs'); break;
            case 'session.save_path': $value = ($this->targetDirs[0].'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDirs[0].'/validation.php'); break;
            case 'profiler.storage.dsn': $value = ('file:'.$this->targetDirs[0].'/profiler'); break;
            case 'debug.container.dump': $value = ($this->targetDirs[0].'/appDevDebugProjectContainer.xml'); break;
            case 'doctrine.orm.proxy_dir': $value = ($this->targetDirs[0].'/doctrine/orm/Proxies'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    private $normalizedParameterNames = array(
        'gallerydirectory' => 'galleryDirectory',
        'gallerypath' => 'galleryPath',
    );

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since version 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/vagrant/app',
            'kernel.project_dir' => '/vagrant',
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'app',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'KnpMenuBundle' => 'Knp\\Bundle\\MenuBundle\\KnpMenuBundle',
                'KnpTimeBundle' => 'Knp\\Bundle\\TimeBundle\\KnpTimeBundle',
                'FOSJsRoutingBundle' => 'FOS\\JsRoutingBundle\\FOSJsRoutingBundle',
                'FOSUserBundle' => 'FOS\\UserBundle\\FOSUserBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'ObHighchartsBundle' => 'Ob\\HighchartsBundle\\ObHighchartsBundle',
                'TacticianBundle' => 'League\\Tactician\\Bundle\\TacticianBundle',
                'LiipMonitorBundle' => 'Liip\\MonitorBundle\\LiipMonitorBundle',
                'DendeCalendarBundle' => 'Dende\\CalendarBundle\\DendeCalendarBundle',
                'DendeMultitenancyBundle' => 'Dende\\MultitenancyBundle\\DendeMultitenancyBundle',
                'DashboardBundle' => 'Gyman\\Bundle\\DashboardBundle\\DashboardBundle',
                'ChartsBundle' => 'Gyman\\Bundle\\ChartsBundle\\ChartsBundle',
                'ClubBundle' => 'Gyman\\Bundle\\ClubBundle\\ClubBundle',
                'AccountBundle' => 'Gyman\\Bundle\\AccountBundle\\AccountBundle',
                'MailerBundle' => 'Gyman\\Bundle\\MailerBundle\\MailerBundle',
                'BaseBundle' => 'Gyman\\Bundle\\BaseBundle\\BaseBundle',
                'GymanAppBundle' => 'Gyman\\Bundle\\AppBundle\\GymanAppBundle',
                'GymanReportsBundle' => 'Gyman\\Bundle\\ReportsBundle\\GymanReportsBundle',
                'GymanLandingPageBundle' => 'Gyman\\Bundle\\LandingPageBundle\\GymanLandingPageBundle',
                'GymanSettingsBundle' => 'Gyman\\Bundle\\SettingsBundle\\GymanSettingsBundle',
                'SentryBundle' => 'Sentry\\SentryBundle\\SentryBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'SensioDistributionBundle' => 'Sensio\\Bundle\\DistributionBundle\\SensioDistributionBundle',
                'SensioGeneratorBundle' => 'Sensio\\Bundle\\GeneratorBundle\\SensioGeneratorBundle',
                'LiipFunctionalTestBundle' => 'Liip\\FunctionalTestBundle\\LiipFunctionalTestBundle',
            ),
            'kernel.bundles_metadata' => array(
                'FrameworkBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle',
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ),
                'SecurityBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle',
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ),
                'TwigBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle',
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ),
                'MonologBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/monolog-bundle',
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ),
                'SwiftmailerBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/swiftmailer-bundle',
                    'namespace' => 'Symfony\\Bundle\\SwiftmailerBundle',
                ),
                'SensioFrameworkExtraBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/sensio/framework-extra-bundle',
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ),
                'KnpMenuBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/knplabs/knp-menu-bundle/src',
                    'namespace' => 'Knp\\Bundle\\MenuBundle',
                ),
                'KnpTimeBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/knplabs/knp-time-bundle/Knp/Bundle/TimeBundle',
                    'namespace' => 'Knp\\Bundle\\TimeBundle',
                ),
                'FOSJsRoutingBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/friendsofsymfony/jsrouting-bundle',
                    'namespace' => 'FOS\\JsRoutingBundle',
                ),
                'FOSUserBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/friendsofsymfony/user-bundle',
                    'namespace' => 'FOS\\UserBundle',
                ),
                'DoctrineBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/doctrine/doctrine-bundle',
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ),
                'DoctrineFixturesBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/doctrine/doctrine-fixtures-bundle',
                    'namespace' => 'Doctrine\\Bundle\\FixturesBundle',
                ),
                'DoctrineMigrationsBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/doctrine/doctrine-migrations-bundle',
                    'namespace' => 'Doctrine\\Bundle\\MigrationsBundle',
                ),
                'ObHighchartsBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/ob/highcharts-bundle',
                    'namespace' => 'Ob\\HighchartsBundle',
                ),
                'TacticianBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/league/tactician-bundle/src',
                    'namespace' => 'League\\Tactician\\Bundle',
                ),
                'LiipMonitorBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/liip/monitor-bundle',
                    'namespace' => 'Liip\\MonitorBundle',
                ),
                'DendeCalendarBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/dende/calendar-bundle',
                    'namespace' => 'Dende\\CalendarBundle',
                ),
                'DendeMultitenancyBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/dende/multitenancybundle/src',
                    'namespace' => 'Dende\\MultitenancyBundle',
                ),
                'DashboardBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/DashboardBundle',
                    'namespace' => 'Gyman\\Bundle\\DashboardBundle',
                ),
                'ChartsBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/ChartsBundle',
                    'namespace' => 'Gyman\\Bundle\\ChartsBundle',
                ),
                'ClubBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/ClubBundle',
                    'namespace' => 'Gyman\\Bundle\\ClubBundle',
                ),
                'AccountBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/AccountBundle',
                    'namespace' => 'Gyman\\Bundle\\AccountBundle',
                ),
                'MailerBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/MailerBundle',
                    'namespace' => 'Gyman\\Bundle\\MailerBundle',
                ),
                'BaseBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/BaseBundle',
                    'namespace' => 'Gyman\\Bundle\\BaseBundle',
                ),
                'GymanAppBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/AppBundle',
                    'namespace' => 'Gyman\\Bundle\\AppBundle',
                ),
                'GymanReportsBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/ReportsBundle',
                    'namespace' => 'Gyman\\Bundle\\ReportsBundle',
                ),
                'GymanLandingPageBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/LandingPageBundle',
                    'namespace' => 'Gyman\\Bundle\\LandingPageBundle',
                ),
                'GymanSettingsBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/src/Bundle/SettingsBundle',
                    'namespace' => 'Gyman\\Bundle\\SettingsBundle',
                ),
                'SentryBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/sentry/sentry-symfony/src/Sentry/SentryBundle',
                    'namespace' => 'Sentry\\SentryBundle',
                ),
                'DebugBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle',
                    'namespace' => 'Symfony\\Bundle\\DebugBundle',
                ),
                'WebProfilerBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle',
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ),
                'SensioDistributionBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/sensio/distribution-bundle',
                    'namespace' => 'Sensio\\Bundle\\DistributionBundle',
                ),
                'SensioGeneratorBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/sensio/generator-bundle',
                    'namespace' => 'Sensio\\Bundle\\GeneratorBundle',
                ),
                'LiipFunctionalTestBundle' => array(
                    'parent' => NULL,
                    'path' => '/vagrant/vendor/liip/functional-test-bundle',
                    'namespace' => 'Liip\\FunctionalTestBundle',
                ),
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appDevDebugProjectContainer',
            'database_driver' => 'pdo_mysql',
            'database_host' => 'gyman.vagrant',
            'database_port' => 3306,
            'database_name' => 'gyman',
            'database_user' => 'root',
            'database_password' => 'root',
            'mailer_transport' => 'smtp',
            'mailer_host' => 'gyman.vagrant',
            'mailer_user' => 'user',
            'mailer_password' => 'pass',
            'mailer_port' => 1025,
            'locale' => 'pl',
            'secret' => 'nuɐǝɔo ɹóʍʇsǝzɹd oƃǝɥɔns ɐu ɯǝłąuʎłdʍ',
            'use_assetic_controller' => false,
            'debug_toolbar' => true,
            'debug_redirects' => false,
            'sentry_url' => 'http://57c1dbc134824f4b99194c46a912c7fe:053224cf7c53440b80d71dd0017075ad@sentry.dev.gyman.pl/6',
            'sentry_revision' => NULL,
            'base_url' => 'gyman.vagrant',
            'sqlite_database_user' => 'admin',
            'sqlite_database_password' => 'admin',
            'google_maps_api_key' => NULL,
            'maintanance_database_user' => 'root',
            'maintanance_database_password' => 'root',
            'date_format' => 'Y.m.d',
            'time_format' => 'H:i:s',
            'datetime_format' => 'Y.m.d H:i:s',
            'session_lifetime' => 86400,
            'no_image' => '/bundles/gymanapp/images/no-profile.gif',
            'galleryDirectory' => '/vagrant/app/../web/uploads/gallery/',
            'galleryPath' => '/uploads/gallery/',
            'revision_file' => '/vagrant/app/../REVISION',
            'memcached.servers' => array(
                0 => array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                ),
            ),
            'subdomain_provider_service' => 'gyman.app.subdomain_provider',
            'resolved_occurrence_class' => 'Gyman\\Domain\\Calendar\\Event\\Occurrence',
            'dende_calendar.occurrences_repository.class' => 'Gyman\\Bundle\\AppBundle\\Repository\\OccurrenceRepository',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'kernel.secret' => 'nuɐǝɔo ɹóʍʇsǝzɹd oƃǝɥɔns ɐu ɯǝłąuʎłdʍ',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(

            ),
            'kernel.default_locale' => 'pl',
            'templating.helper.code.file_link_format' => 'phpstorm://%f:%l',
            'debug.file_link_format' => 'phpstorm://%f:%l',
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => array(
                'cookie_lifetime' => 86400,
                'cookie_httponly' => true,
                'gc_maxlifetime' => 1800,
                'gc_probability' => 1,
                'use_strict_mode' => true,
            ),
            'session.metadata.update_threshold' => '0',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => true,
            'translator.default_path' => '/vagrant/translations',
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'debug.error_handler.throw_at' => -1,
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.options.matcher.cache_class' => 'appDevDebugProjectContainerUrlMatcher',
            'router.options.generator.cache_class' => 'appDevDebugProjectContainerUrlGenerator',
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => '/vagrant/app/config/routing_dev.yml',
            'router.cache_class_prefix' => 'appDevDebugProjectContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.role_hierarchy.roles' => array(
                'ROLE_USER' => array(

                ),
                'ROLE_MEMBER' => array(
                    0 => 'ROLE_USER',
                ),
                'ROLE_INSTRUCTOR' => array(
                    0 => 'ROLE_USER',
                ),
                'ROLE_MODERATOR' => array(
                    0 => 'ROLE_USER',
                ),
                'ROLE_ADMIN' => array(
                    0 => 'ROLE_MODERATOR',
                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_ADMIN',
                ),
            ),
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
                1 => '::fields.html.twig',
            ),
            'twig.default_path' => '/vagrant/templates',
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => array(

            ),
            'monolog.handlers_to_channels' => array(
                'monolog.handler.grouped_main' => NULL,
                'monolog.handler.createNewClub' => array(
                    'type' => 'inclusive',
                    'elements' => array(
                        0 => 'createNewClub',
                    ),
                ),
                'monolog.handler.commands' => array(
                    'type' => 'inclusive',
                    'elements' => array(
                        0 => 'commands',
                    ),
                ),
                'monolog.handler.main' => NULL,
            ),
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.transport.smtp.encryption' => NULL,
            'swiftmailer.mailer.default.transport.smtp.port' => 1025,
            'swiftmailer.mailer.default.transport.smtp.host' => 'gyman.vagrant',
            'swiftmailer.mailer.default.transport.smtp.username' => 'user',
            'swiftmailer.mailer.default.transport.smtp.password' => 'pass',
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.mailer.default.transport.smtp.local_domain' => NULL,
            'swiftmailer.spool.default.memory.path' => '/vagrant/app/spool/default',
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => array(
                'default' => 'swiftmailer.mailer.default',
            ),
            'swiftmailer.default_mailer' => 'default',
            'sensio_framework_extra.view.guesser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Templating\\TemplateGuesser',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.converter.datetime.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DateTimeParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'knp_menu.factory.class' => 'Knp\\Menu\\MenuFactory',
            'knp_menu.factory_extension.routing.class' => 'Knp\\Menu\\Integration\\Symfony\\RoutingExtension',
            'knp_menu.helper.class' => 'Knp\\Menu\\Twig\\Helper',
            'knp_menu.matcher.class' => 'Knp\\Menu\\Matcher\\Matcher',
            'knp_menu.menu_provider.chain.class' => 'Knp\\Menu\\Provider\\ChainProvider',
            'knp_menu.menu_provider.container_aware.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\ContainerAwareProvider',
            'knp_menu.menu_provider.builder_alias.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\BuilderAliasProvider',
            'knp_menu.renderer_provider.class' => 'Knp\\Bundle\\MenuBundle\\Renderer\\ContainerAwareProvider',
            'knp_menu.renderer.list.class' => 'Knp\\Menu\\Renderer\\ListRenderer',
            'knp_menu.renderer.list.options' => array(

            ),
            'knp_menu.listener.voters.class' => 'Knp\\Bundle\\MenuBundle\\EventListener\\VoterInitializerListener',
            'knp_menu.voter.router.class' => 'Knp\\Menu\\Matcher\\Voter\\RouteVoter',
            'knp_menu.twig.extension.class' => 'Knp\\Menu\\Twig\\MenuExtension',
            'knp_menu.renderer.twig.class' => 'Knp\\Menu\\Renderer\\TwigRenderer',
            'knp_menu.renderer.twig.options' => array(

            ),
            'knp_menu.renderer.twig.template' => '@KnpMenu/menu.html.twig',
            'knp_menu.default_renderer' => 'twig',
            'time.templating.helper.time.class' => 'Knp\\Bundle\\TimeBundle\\Templating\\Helper\\TimeHelper',
            'time.datetime_formatter.class' => 'Knp\\Bundle\\TimeBundle\\DateTimeFormatter',
            'time.twig.extension.time.class' => 'Knp\\Bundle\\TimeBundle\\Twig\\Extension\\TimeExtension',
            'fos_js_routing.extractor.class' => 'FOS\\JsRoutingBundle\\Extractor\\ExposedRoutesExtractor',
            'fos_js_routing.controller.class' => 'FOS\\JsRoutingBundle\\Controller\\Controller',
            'fos_js_routing.cache_control' => array(
                'enabled' => false,
            ),
            'fos_user.backend_type_orm' => true,
            'fos_user.security.interactive_login_listener.class' => 'FOS\\UserBundle\\EventListener\\LastLoginListener',
            'fos_user.security.login_manager.class' => 'FOS\\UserBundle\\Security\\LoginManager',
            'fos_user.resetting.email.template' => 'MailerBundle:Templates:resetting.html.twig',
            'fos_user.registration.confirmation.template' => 'MailerBundle:Templates:registerConfirmation.html.twig',
            'fos_user.storage' => 'orm',
            'fos_user.firewall_name' => 'main',
            'fos_user.model_manager_name' => 'tenant',
            'fos_user.model.user.class' => 'Gyman\\Domain\\User',
            'fos_user.profile.form.type' => 'Gyman\\Bundle\\AccountBundle\\Form\\Type\\UserType',
            'fos_user.profile.form.name' => 'fos_user_profile_form',
            'fos_user.profile.form.validation_groups' => array(
                0 => 'Profile',
                1 => 'Default',
            ),
            'fos_user.registration.confirmation.from_email' => array(
                'office@gyman.pl' => 'Gyman.pl',
            ),
            'fos_user.registration.confirmation.enabled' => false,
            'fos_user.registration.form.type' => 'Gyman\\Bundle\\AccountBundle\\Form\\Type\\RegisterType',
            'fos_user.registration.form.name' => 'dende_registration_form',
            'fos_user.registration.form.validation_groups' => array(
                0 => 'Registration',
                1 => 'Default',
            ),
            'fos_user.change_password.form.validation_groups' => array(
                0 => 'ChangePassword',
                1 => 'Default',
            ),
            'fos_user.change_password.form.type' => 'FOS\\UserBundle\\Form\\Type\\ChangePasswordFormType',
            'fos_user.change_password.form.name' => 'fos_user_change_password_form',
            'fos_user.resetting.email.from_email' => array(
                'office@gyman.pl' => 'Gyman.pl',
            ),
            'fos_user.resetting.retry_ttl' => 7200,
            'fos_user.resetting.token_ttl' => 86400,
            'fos_user.resetting.form.validation_groups' => array(
                0 => 'ResetPassword',
                1 => 'Default',
            ),
            'fos_user.resetting.form.type' => 'FOS\\UserBundle\\Form\\Type\\ResettingFormType',
            'fos_user.resetting.form.name' => 'fos_user_resetting_form',
            'fos_user.group_manager.class' => 'FOS\\UserBundle\\Doctrine\\GroupManager',
            'fos_user.model.group.class' => 'Gyman\\Bundle\\ClubBundle\\Entity\\Group',
            'fos_user.group.form.type' => 'FOS\\UserBundle\\Form\\Type\\GroupFormType',
            'fos_user.group.form.name' => 'fos_user_group_form',
            'fos_user.group.form.validation_groups' => array(
                0 => 'Registration',
                1 => 'Default',
            ),
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
                'tenant' => 'doctrine.orm.tenant_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(
                'uuid' => array(
                    'class' => 'Ramsey\\Uuid\\Doctrine\\UuidType',
                    'commented' => true,
                ),
            ),
            'doctrine.connections' => array(
                'maintanance' => 'doctrine.dbal.maintanance_connection',
                'default' => 'doctrine.dbal.default_connection',
                'tenant' => 'doctrine.dbal.tenant_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerAwareEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine_migrations.dir_name' => '/vagrant/app/DoctrineMigrations',
            'doctrine_migrations.namespace' => 'Application\\Migrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.name' => 'Application Migrations',
            'doctrine_migrations.custom_template' => NULL,
            'doctrine_migrations.organize_migrations' => false,
            'ob_highcharts.twig_extension.class' => 'Ob\\HighchartsBundle\\Twig\\HighchartsExtension',
            'liip_monitor.runner.class' => 'Liip\\MonitorBundle\\Runner',
            'liip_monitor.helper.raw_console_reporter.class' => 'Liip\\MonitorBundle\\Helper\\RawConsoleReporter',
            'liip_monitor.helper.console_reporter.class' => 'Liip\\MonitorBundle\\Helper\\ConsoleReporter',
            'liip_monitor.helper.runner_manager.class' => 'Liip\\MonitorBundle\\Helper\\RunnerManager',
            'liip_monitor.helper.class' => 'Liip\\MonitorBundle\\Helper\\PathHelper',
            'liip_monitor.default_group' => 'default',
            'dende_calendar.occurrence.class' => 'Gyman\\Domain\\Calendar\\Event\\Occurrence',
            'dende_calendar.model_manager_name' => 'tenant',
            'dende_calendar.backend_type_orm' => true,
            'dende_calendar.calendar_repository_service_name' => 'gyman.calendar.repository',
            'dende_calendar.calendar_factory_service_name' => 'gyman.calendar.factory',
            'dende_calendar.event_repository_service_name' => 'gyman.event.repository',
            'dende_calendar.event_factory_service_name' => 'gyman.event.factory',
            'dende_calendar.occurrence_repository_service_name' => 'gyman.occurrence.repository',
            'dende_calendar.occurrence_factory_service_name' => 'gyman.occurrence.factory',
            'dende_calendar.mapping' => array(
                'event' => array(
                    'entity' => 'Dende\\Calendar\\Domain\\Calendar\\Event',
                    'map' => array(
                        'bundle' => 'Dende\\Calendar\\Domain\\Calendar\\Event',
                        'app' => 'Gyman\\Domain\\Calendar\\Event',
                    ),
                ),
                'calendar' => array(
                    'entity' => 'Dende\\Calendar\\Domain\\Calendar',
                    'map' => array(
                        'bundle' => 'Dende\\Calendar\\Domain\\Calendar',
                        'app' => 'Gyman\\Domain\\Calendar',
                    ),
                ),
            ),
            'dende_calendar.id_generator.class' => 'Dende\\Calendar\\Application\\Generator\\Doctrine\\IdGenerator',
            'dende_calendar.calendar_repository.class' => 'Dende\\CalendarBundle\\Repository\\ORM\\CalendarRepository',
            'dende_calendar.event_repository.class' => 'Dende\\CalendarBundle\\Repository\\ORM\\EventRepository',
            'dende_calendar.update_occurrences_manager.class' => 'Dende\\Calendar\\Application\\Service\\OccurrenceUpdateManager',
            'dende_multitenancy.config.patched_commands' => array(
                0 => 'doctrine:*',
                1 => 'fos:*',
                2 => 'gyman:entries:close_expired',
                3 => 'gyman:vouchers:*',
                4 => 'gyman:calendar:*',
            ),
            'dende_multitenancy.config.command_listener_config' => array(
                0 => array(
                    'name' => 'tenant',
                    'param' => 'club',
                    'desc' => 'Provide club name for tenant connection',
                ),
            ),
            'dende_multitenancy.listener.command.class' => 'Dende\\MultitenancyBundle\\Listener\\CommandListener',
            'dende_multitenanacy.tenant_manager.class' => 'Dende\\MultitenancyBundle\\Manager\\TenantManager',
            'contact.template' => 'MailerBundle:Templates:contactMail.html.twig',
            'contact.subject' => 'mailing.contact.subject',
            'registration_successful.template' => 'MailerBundle:Templates:registeredSuccess.html.twig',
            'registration_successful.subject' => 'mailing.registration_successful.subject',
            'credited_entry.template' => 'MailerBundle:Templates:creditEntry.html.twig',
            'member_invitation.template' => 'MailerBundle:Templates:memberInvitation.html.twig',
            'gyman_from' => array(
                'gyman.pl@gmail.com' => 'Gyman.pl website',
            ),
            'gyman_app.config' => array(
                'schedule_generator' => array(
                    'phantom_path' => '/vagrant/app/../node_modules/.bin/phantomjs',
                    'rasterize_script_path' => '/vagrant/app/../node_modules/phantomjs/lib/phantom/examples/rasterize.js',
                    'destination_directory' => '/vagrant/app/../web/schedules/',
                    'filename' => 'schedule.png',
                ),
                'galleryDir' => '/uploads/gallery/',
                'noImage' => 'null',
                'galleryPath' => 'null',
            ),
            'available_reporting_strategies' => array(
                'all' => 'Wszystkie operacje',
                'per-member' => 'Z podziałem na uczestników',
                'per-section' => 'Z podziałem na sekcje',
            ),
            'sentry.dsn' => 'http://57c1dbc134824f4b99194c46a912c7fe:053224cf7c53440b80d71dd0017075ad@sentry.dev.gyman.pl/6',
            'sentry.release' => NULL,
            'sentry.app_path' => '/vagrant/app/..',
            'sentry.client' => 'Sentry\\SentryBundle\\SentrySymfonyClient',
            'sentry.environment' => 'dev',
            'sentry.options' => array(

            ),
            'sentry.error_types' => NULL,
            'sentry.exception_listener' => 'Sentry\\SentryBundle\\EventListener\\ExceptionListener',
            'sentry.skip_capture' => array(
                0 => 'Symfony\\Component\\HttpKernel\\Exception\\HttpExceptionInterface',
            ),
            'sentry.prefixes' => array(
                0 => '/vagrant/app/..',
            ),
            'sentry.excluded_app_paths' => array(
                0 => '/vagrant/app/../vendor',
                1 => '/vagrant/app/../app/cache',
                2 => '/vagrant/app/../var/cache',
            ),
            'web_profiler.debug_toolbar.position' => 'bottom',
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'liip_functional_test.cache_sqlite_db' => false,
            'liip_functional_test.command_verbosity' => 'normal',
            'liip_functional_test.command_decoration' => true,
            'liip_functional_test.query.max_query_count' => NULL,
            'liip_functional_test.authentication.username' => '',
            'liip_functional_test.authentication.password' => '',
            'liip_functional_test.html5validation.url' => 'https://validator.nu/',
            'liip_functional_test.html5validation.ignores' => array(

            ),
            'liip_functional_test.html5validation.ignores_extract' => array(

            ),
            'liip_functional_test.paratest.process' => 5,
            'liip_functional_test.paratest.phpunit' => './bin/phpunit',
            'data_collector.templates' => array(
                'data_collector.request' => array(
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ),
                'data_collector.time' => array(
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ),
                'data_collector.memory' => array(
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ),
                'data_collector.validator' => array(
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ),
                'data_collector.ajax' => array(
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ),
                'data_collector.form' => array(
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ),
                'data_collector.exception' => array(
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ),
                'data_collector.logger' => array(
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ),
                'data_collector.events' => array(
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ),
                'data_collector.router' => array(
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ),
                'data_collector.cache' => array(
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ),
                'data_collector.translation' => array(
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ),
                'data_collector.security' => array(
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ),
                'data_collector.twig' => array(
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ),
                'data_collector.doctrine' => array(
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ),
                'swiftmailer.data_collector' => array(
                    0 => 'swiftmailer',
                    1 => '@Swiftmailer/Collector/swiftmailer.html.twig',
                ),
                'data_collector.dump' => array(
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ),
                'data_collector.config' => array(
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ),
            ),
            'console.command.ids' => array(
                'console.command.symfony_bundle_frameworkbundle_command_aboutcommand' => 'console.command.about',
                'console.command.symfony_bundle_frameworkbundle_command_assetsinstallcommand' => 'console.command.assets_install',
                'console.command.symfony_bundle_frameworkbundle_command_cacheclearcommand' => 'console.command.cache_clear',
                'console.command.symfony_bundle_frameworkbundle_command_cachepoolclearcommand' => 'console.command.cache_pool_clear',
                'console.command.symfony_bundle_frameworkbundle_command_cachepoolprunecommand' => 'console.command.cache_pool_prune',
                'console.command.symfony_bundle_frameworkbundle_command_cachewarmupcommand' => 'console.command.cache_warmup',
                'console.command.symfony_bundle_frameworkbundle_command_configdebugcommand' => 'console.command.config_debug',
                'console.command.symfony_bundle_frameworkbundle_command_configdumpreferencecommand' => 'console.command.config_dump_reference',
                'console.command.symfony_bundle_frameworkbundle_command_containerdebugcommand' => 'console.command.container_debug',
                'console.command.symfony_bundle_frameworkbundle_command_debugautowiringcommand' => 'console.command.debug_autowiring',
                'console.command.symfony_bundle_frameworkbundle_command_eventdispatcherdebugcommand' => 'console.command.event_dispatcher_debug',
                'console.command.symfony_bundle_frameworkbundle_command_routerdebugcommand' => 'console.command.router_debug',
                'console.command.symfony_bundle_frameworkbundle_command_routermatchcommand' => 'console.command.router_match',
                'console.command.symfony_bundle_frameworkbundle_command_translationdebugcommand' => 'console.command.translation_debug',
                'console.command.symfony_bundle_frameworkbundle_command_translationupdatecommand' => 'console.command.translation_update',
                'console.command.symfony_bundle_frameworkbundle_command_xlifflintcommand' => 'console.command.xliff_lint',
                'console.command.symfony_bundle_frameworkbundle_command_yamllintcommand' => 'console.command.yaml_lint',
                'console.command.symfony_component_form_command_debugcommand' => 'console.command.form_debug',
                'console.command.symfony_bundle_securitybundle_command_userpasswordencodercommand' => 'security.command.user_password_encoder',
                'console.command.symfony_bridge_twig_command_debugcommand' => 'twig.command.debug',
                'console.command.symfony_bundle_twigbundle_command_lintcommand' => 'twig.command.lint',
                'console.command.symfony_bundle_swiftmailerbundle_command_debugcommand' => 'swiftmailer.command.debug',
                'console.command.symfony_bundle_swiftmailerbundle_command_newemailcommand' => 'swiftmailer.command.new_email',
                'console.command.symfony_bundle_swiftmailerbundle_command_sendemailcommand' => 'swiftmailer.command.send_email',
                'console.command.fos_userbundle_command_activateusercommand' => 'fos_user.command.activate_user',
                'console.command.fos_userbundle_command_changepasswordcommand' => 'fos_user.command.change_password',
                'console.command.fos_userbundle_command_createusercommand' => 'fos_user.command.create_user',
                'console.command.fos_userbundle_command_deactivateusercommand' => 'fos_user.command.deactivate_user',
                'console.command.fos_userbundle_command_demoteusercommand' => 'fos_user.command.demote_user',
                'console.command.fos_userbundle_command_promoteusercommand' => 'fos_user.command.promote_user',
                'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand',
                'console.command.doctrine_bundle_doctrinebundle_command_createdatabasedoctrinecommand' => 'doctrine.database_create_command',
                'console.command.doctrine_bundle_doctrinebundle_command_dropdatabasedoctrinecommand' => 'doctrine.database_drop_command',
                'console.command.doctrine_bundle_doctrinebundle_command_generateentitiesdoctrinecommand' => 'doctrine.generate_entities_command',
                'console.command.doctrine_bundle_doctrinebundle_command_importmappingdoctrinecommand' => 'doctrine.mapping_import_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearmetadatacachedoctrinecommand' => 'doctrine.cache_clear_metadata_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearquerycachedoctrinecommand' => 'doctrine.cache_clear_query_cache_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearresultcachedoctrinecommand' => 'doctrine.cache_clear_result_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_collectionregiondoctrinecommand' => 'doctrine.cache_collection_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_convertmappingdoctrinecommand' => 'doctrine.mapping_convert_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_createschemadoctrinecommand' => 'doctrine.schema_create_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_dropschemadoctrinecommand' => 'doctrine.schema_drop_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_ensureproductionsettingsdoctrinecommand' => 'doctrine.ensure_production_settings_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_entityregioncachedoctrinecommand' => 'doctrine.clear_entity_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_importdoctrinecommand' => 'doctrine.database_import_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_infodoctrinecommand' => 'doctrine.mapping_info_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_queryregioncachedoctrinecommand' => 'doctrine.clear_query_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_rundqldoctrinecommand' => 'doctrine.query_dql_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_runsqldoctrinecommand' => 'doctrine.query_sql_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_updateschemadoctrinecommand' => 'doctrine.schema_update_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_validateschemacommand' => 'doctrine.schema_validate_command',
                'console.command.doctrine_bundle_fixturesbundle_command_loaddatafixturesdoctrinecommand' => 'doctrine.fixtures_load_command',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsdiffdoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsdiffdoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsexecutedoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsexecutedoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsgeneratedoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsgeneratedoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationslatestdoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationslatestdoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsmigratedoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsmigratedoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsstatusdoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsstatusdoctrinecommand',
                'console.command.doctrine_bundle_migrationsbundle_command_migrationsversiondoctrinecommand' => 'console.command.doctrine_bundle_migrationsbundle_command_migrationsversiondoctrinecommand',
                'console.command.league_tactician_bundle_command_debugcommand' => 'console.command.league_tactician_bundle_command_debugcommand',
                'console.command.gyman_bundle_appbundle_command_dumphostscommand' => 'console.command.gyman_bundle_appbundle_command_dumphostscommand',
                'console.command.gyman_bundle_appbundle_command_closeentriescommand' => 'console.command.gyman_bundle_appbundle_command_closeentriescommand',
                'console.command.gyman_bundle_appbundle_command_clearexpiredcurrentvoucherscommand' => 'console.command.gyman_bundle_appbundle_command_clearexpiredcurrentvoucherscommand',
                'console.command.gyman_bundle_appbundle_command_updatecurrentvouchercommand' => 'console.command.gyman_bundle_appbundle_command_updatecurrentvouchercommand',
                'console.command.sensiolabs_security_command_securitycheckercommand' => 'console.command.sensiolabs_security_command_securitycheckercommand',
            ),
            'console.lazy_command.ids' => array(
                'console.command.about' => true,
                'console.command.assets_install' => true,
                'console.command.cache_clear' => true,
                'console.command.cache_pool_clear' => true,
                'console.command.cache_pool_prune' => true,
                'console.command.cache_warmup' => true,
                'console.command.config_debug' => true,
                'console.command.config_dump_reference' => true,
                'console.command.container_debug' => true,
                'console.command.debug_autowiring' => true,
                'console.command.event_dispatcher_debug' => true,
                'console.command.router_debug' => true,
                'console.command.router_match' => true,
                'console.command.translation_debug' => true,
                'console.command.translation_update' => true,
                'console.command.xliff_lint' => true,
                'console.command.yaml_lint' => true,
                'console.command.form_debug' => true,
                'security.command.user_password_encoder' => true,
                'twig.command.debug' => true,
                'twig.command.lint' => true,
                'swiftmailer.command.debug' => true,
                'swiftmailer.command.new_email' => true,
                'swiftmailer.command.send_email' => true,
                'fos_user.command.activate_user' => true,
                'fos_user.command.change_password' => true,
                'fos_user.command.create_user' => true,
                'fos_user.command.deactivate_user' => true,
                'fos_user.command.demote_user' => true,
                'fos_user.command.promote_user' => true,
                'doctrine.database_create_command' => true,
                'doctrine.database_drop_command' => true,
                'doctrine.generate_entities_command' => true,
                'doctrine.mapping_import_command' => true,
                'doctrine.cache_clear_metadata_command' => true,
                'doctrine.cache_clear_query_cache_command' => true,
                'doctrine.cache_clear_result_command' => true,
                'doctrine.cache_collection_region_command' => true,
                'doctrine.mapping_convert_command' => true,
                'doctrine.schema_create_command' => true,
                'doctrine.schema_drop_command' => true,
                'doctrine.ensure_production_settings_command' => true,
                'doctrine.clear_entity_region_command' => true,
                'doctrine.database_import_command' => true,
                'doctrine.mapping_info_command' => true,
                'doctrine.clear_query_region_command' => true,
                'doctrine.query_dql_command' => true,
                'doctrine.query_sql_command' => true,
                'doctrine.schema_update_command' => true,
                'doctrine.schema_validate_command' => true,
                'doctrine.fixtures_load_command' => true,
            ),
            'liip_monitor.runners' => array(
                0 => 'liip_monitor.runner_default',
            ),
        );
    }
}
