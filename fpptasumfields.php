<?php

require_once 'fpptasumfields.civix.php';
// phpcs:disable
use CRM_Fpptasumfields_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function fpptasumfields_civicrm_config(&$config) {
  _fpptasumfields_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function fpptasumfields_civicrm_install(): void {
  _fpptasumfields_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function fpptasumfields_civicrm_postInstall(): void {
  _fpptasumfields_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function fpptasumfields_civicrm_uninstall(): void {
  _fpptasumfields_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function fpptasumfields_civicrm_enable(): void {
  _fpptasumfields_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function fpptasumfields_civicrm_disable(): void {
  _fpptasumfields_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function fpptasumfields_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _fpptasumfields_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function fpptasumfields_civicrm_entityTypes(&$entityTypes): void {
  _fpptasumfields_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function fpptasumfields_civicrm_preProcess($formName, &$form): void {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function fpptasumfields_civicrm_navigationMenu(&$menu): void {
//  _fpptasumfields_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _fpptasumfields_civix_navigationMenu($menu);
//}

/**
 * Implements hook_civicrm_sumfields_definitions().
 *
 */
function fpptasumfields_civicrm_sumfields_definitions(&$custom) {
  // Define a new summary field under Memberships to show date and invoice number
  // on last completed membership payment. This will allow SumFields to provide
  // its usual "financial type" filter options, which fppta can use to limit, e.g.
  // to 'cppt' membership payments.
  
  $custom['fields']['fppta_last_membership_payment'] = array(
    'label' => E::ts('Last Membership Payment: Info'),
    'data_type' => 'String',
    'html_type' => 'Text',
    'weight' => '60',
    'text_length' => '32',
    'trigger_sql' =>'(SELECT concat(date_format(t1.receive_date, "%Y-%m-%d"), " (", t1.invoice_number, ")") FROM civicrm_contribution t1 WHERE
     t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND
     t1.financial_type_id IN (%membership_financial_type_ids) AND t1.is_test = 0 ORDER BY 
    receive_date DESC LIMIT 1)',
    'trigger_table' => 'civicrm_contribution',
    'optgroup' => 'membership',
  );
}