<?php
// Hook into WP SimplePay subscription creation
function create_user_on_subscription_creation($subscription) {
    if (!class_exists('WP_SimplePay_Subscription')) {
        return;
    }

    $user_email = $subscription->get_customer_email();
    $user = get_user_by('email', $user_email);
    if (empty($user)) {
        $password = wp_generate_password();
        $user_id = wp_create_user($user_email, $password, $user_email);
        wp_new_user_notification($user_id, $password);
    }
}

add_action('wp_simple_pay_subscription_created', 'create_user_on_subscription_creation');
