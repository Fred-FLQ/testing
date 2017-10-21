<?php
	/**
	 * Set tracking arguments for question and answer post type.
	 */
	public static function question_answer_tracking() {
		// Check if the Activity component is active before using it.
		if ( ! function_exists( 'bp_is_active' ) || ! bp_is_active( 'activity' ) ) {
			return;
		}

		bp_activity_set_post_type_tracking_args( 'question', array(
			'component_id'             => 'activity',
			'action_id'                => 'new_question',
			'contexts'                 => array( 'activity', 'member' ),
			'bp_activity_admin_filter' => __( 'Question', 'anspress-question-answer' ),
			'bp_activity_front_filter' => __( 'Question', 'anspress-question-answer' ),
			'bp_activity_new_post'     => __( '%1$s asked: <a href="AP_CPT_LINK">[Question]</a>', 'anspress-question-answer' ),
			'bp_activity_new_post_ms'  => __( '%1$s asked: <a href="AP_CPT_LINK">[Question]</a>, on the site %3$s', 'anspress-question-answer' ),
		) );

		bp_activity_set_post_type_tracking_args( 'answer', array(
			'component_id'             => 'activity',
			'action_id'                => 'new_answer',
			'contexts'                 => array( 'activity', 'member' ),
			'bp_activity_admin_filter' => __( 'Answer', 'anspress-question-answer' ),
			'bp_activity_front_filter' => __( 'Answer', 'anspress-question-answer' ),
			'bp_activity_new_post'     => __( '%1$s answered to: <a href="AP_CPT_LINK">[Answer]</a>', 'anspress-question-answer' ),
			'bp_activity_new_post_ms'  => __( '%1$s answered to: <a href="AP_CPT_LINK">[Answer]</a>, on the site %3$s', 'anspress-question-answer' ),
		) );
	}
?>
