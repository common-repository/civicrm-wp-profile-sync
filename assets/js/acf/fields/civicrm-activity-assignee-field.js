/**
 * CiviCRM Profile Sync Custom ACF Field Type - CiviCRM Activity Assignee Field.
 *
 * @package CiviCRM_WP_Profile_Sync
 */

(function($, undefined){

	// Extend the Select Field model.
	var Field = acf.models.SelectField.extend({
		type: 'civicrm_activity_assignee',
	});

	// Register it.
	acf.registerFieldType( Field );

	// Add basic condition types.
	acf.registerConditionForFieldType( 'hasValue', 'civicrm_activity_assignee' );
	acf.registerConditionForFieldType( 'hasNoValue', 'civicrm_activity_assignee' );

})(jQuery);
