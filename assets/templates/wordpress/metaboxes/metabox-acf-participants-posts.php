<?php
/**
 * CiviCRM Participant Roles to WordPress Posts sync template.
 *
 * Handles markup for the CiviCRM Participant Roles to WordPress Posts meta box.
 *
 * @package CiviCRM_WP_Profile_Sync
 * @since 0.5
 */

?><!-- assets/templates/wordpress/metabox-participants-posts.php -->
<?php $prefix = 'cwps_acf_participant_role_to_post'; ?>

<div class="cwps_acf_wrapper <?php echo esc_attr( $prefix ); ?>">

	<p><?php esc_html_e( 'Select which Participants you want to sync to their corresponding WordPress Post Types.', 'civicrm-wp-profile-sync' ); ?></p>

	<?php if ( ! empty( $participant_roles ) ) : ?>
		<table class="form-table">

			<?php foreach ( $participant_roles as $participant_role_id => $label ) : ?>

				<?php $identifier = $prefix . '_' . $participant_role_id; ?>
				<?php $stop = ''; ?>

				<?php if ( 'fgffgs' == get_option( '_' . $identifier . '_offset', 'fgffgs' ) ) : ?>
					<?php $button = __( 'Sync Now', 'civicrm-wp-profile-sync' ); ?>
				<?php else : ?>
					<?php $button = __( 'Continue Sync', 'civicrm-wp-profile-sync' ); ?>
					<?php $stop = $identifier . '_stop'; ?>
				<?php endif; ?>

				<tr valign="top">
					<th scope="row"><label for="<?php echo esc_attr( $identifier ); ?>"><?php echo esc_html( $label ); ?></label></th>
					<td><input type="submit" id="<?php echo esc_attr( $identifier ); ?>" name="<?php echo esc_attr( $identifier ); ?>" data-security="<?php echo esc_attr( wp_create_nonce( $identifier ) ); ?>" value="<?php echo esc_attr( $button ); ?>" class="button-secondary" />
						<?php if ( ! empty( $stop ) ) : ?>
							<input type="submit" id="<?php echo esc_attr( $stop ); ?>" name="<?php echo esc_attr( $stop ); ?>" value="<?php esc_attr_e( 'Stop Sync', 'civicrm-wp-profile-sync' ); ?>" class="button-secondary" />
						<?php endif; ?>
					</td>
				</tr>

				<tr valign="top">
					<td colspan="2" class="progress-bar progress-bar-hidden"><div id="progress-bar-cwps_acf_participant_role_to_post_<?php echo esc_attr( $participant_role_id ); ?>"><div class="progress-label"></div></div></td>
				</tr>

			<?php endforeach; ?>

		</table>
	<?php else : ?>

		<div class="notice notice-warning inline" style="background-color: #f7f7f7;">
			<p><?php esc_html_e( 'No synced Participant Roles found.', 'civicrm-wp-profile-sync' ); ?></p>
		</div>

	<?php endif; ?>

</div>
