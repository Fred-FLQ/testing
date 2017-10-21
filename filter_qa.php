<?php
// FILTER QUESTION CPT

        function question_include_post_type_title( $action, $activity ) {
            if ( empty( $activity->id ) ) {
                return $action;
            }
            if ( 'new_question' != $activity->type ) {
                return $action;
            }
            preg_match_all( '/<a.*?>([^>]*)<\/a>/', $action, $matches );
            if ( empty( $matches[1][1] ) || '[Question]' != $matches[1][1] ) {
                return $action;
            }
            $post_type_title = bp_activity_get_meta( $activity->id, 'post_title' );
            if ( empty( $post_type_title ) ) {
                switch_to_blog( $activity->item_id );
                $post_type_title = get_post_field( 'post_title', $activity->secondary_item_id );
                // We have a title save it in activity meta to avoid switching blogs too much
                if ( ! empty( $post_type_title ) ) {
                    bp_activity_update_meta( $activity->id, 'post_title', $post_type_title );
                }
                restore_current_blog();
            }
            return str_replace( $matches[1][1], esc_html( $post_type_title ), $action );
        }
        add_filter( 'bp_activity_custom_post_type_post_action', 'question_include_post_type_title', 120, 2 );

        // FILTER ANSWER CPT

        function answer_include_post_type_title( $action, $activity ) {
            if ( empty( $activity->id ) ) {
                return $action;
            }
            if ( 'new_answer' != $activity->type ) {
                return $action;
            }
            preg_match_all( '/<a.*?>([^>]*)<\/a>/', $action, $matches );
            if ( empty( $matches[1][1] ) || '[Answer]' != $matches[1][1] ) {
                return $action;
            }
            $post_type_title = bp_activity_get_meta( $activity->id, 'post_title' );
            if ( empty( $post_type_title ) ) {
                switch_to_blog( $activity->item_id );
                $post_type_title = get_post_field( 'post_title', $activity->secondary_item_id );
                // We have a title save it in activity meta to avoid switching blogs too much
                if ( ! empty( $post_type_title ) ) {
                    bp_activity_update_meta( $activity->id, 'post_title', $post_type_title );
                }
                restore_current_blog();
            }
            return str_replace( $matches[1][1], esc_html( $post_type_title ), $action );
        }
        add_filter( 'bp_activity_custom_post_type_post_action', 'answer_include_post_type_title', 121, 2 );
        
?>
