<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'validator.builder' shared service.

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
$instance->setTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'});
$instance->setTranslationDomain('validators');
$instance->addXmlMappings(array(0 => '/vagrant/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml', 1 => '/vagrant/vendor/friendsofsymfony/user-bundle/Resources/config/validation.xml'));
$instance->addYamlMappings(array(0 => '/vagrant/vendor/dende/calendar-bundle/Resources/config/validation.yml', 1 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/createMember.yml', 2 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/createVoucher.yml', 3 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/details.yml', 4 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/openEntryCommand.yml', 5 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/section.yml', 6 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateMember.yml', 7 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateSettings.yml', 8 => '/vagrant/src/Bundle/AppBundle/Resources/config/validation/updateVoucher.yml'));
$instance->enableAnnotationMapping(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'});
$instance->addMethodMapping('loadValidatorMetadata');
$instance->setMetadataCache(new \Symfony\Component\Validator\Mapping\Cache\Psr6Cache(\Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDirs[0].'/validation.php'), ${($_ = isset($this->services['cache.validator']) ? $this->services['cache.validator'] : $this->load(__DIR__.'/getCache_ValidatorService.php')) && false ?: '_'})));
$instance->addObjectInitializers(array(0 => new \FOS\UserBundle\Validator\Initializer(${($_ = isset($this->services['fos_user.util.canonical_fields_updater']) ? $this->services['fos_user.util.canonical_fields_updater'] : $this->getFosUser_Util_CanonicalFieldsUpdaterService()) && false ?: '_'}), 1 => ${($_ = isset($this->services['doctrine.orm.validator_initializer']) ? $this->services['doctrine.orm.validator_initializer'] : $this->load(__DIR__.'/getDoctrine_Orm_ValidatorInitializerService.php')) && false ?: '_'}));
$instance->addXmlMapping('/vagrant/vendor/friendsofsymfony/user-bundle/DependencyInjection/Compiler/../../Resources/config/storage-validation/orm.xml');

return $instance;
