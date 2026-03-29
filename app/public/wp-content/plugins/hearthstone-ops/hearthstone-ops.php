<?php
/**
 * Plugin Name: Hearthstone Ops
 * Plugin URI: https://example.com
 * Description: Hospitality operations data models and workflows for Hearthstone Hospitality.
 * Version: 1.27.0
 * Author: Suleman Saleem
 * Text Domain: hearthstone-ops
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom post types for hospitality operations.
 */
function hearthstone_ops_register_post_types(): void
{
    $guest_labels = [
        'name'               => __('Guests', 'hearthstone-ops'),
        'singular_name'      => __('Guest', 'hearthstone-ops'),
        'menu_name'          => __('Guests', 'hearthstone-ops'),
        'name_admin_bar'     => __('Guest', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Guest', 'hearthstone-ops'),
        'new_item'           => __('New Guest', 'hearthstone-ops'),
        'edit_item'          => __('Edit Guest', 'hearthstone-ops'),
        'view_item'          => __('View Guest', 'hearthstone-ops'),
        'all_items'          => __('All Guests', 'hearthstone-ops'),
        'search_items'       => __('Search Guests', 'hearthstone-ops'),
        'not_found'          => __('No guests found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No guests found in Trash.', 'hearthstone-ops'),
    ];

    $guest_args = [
        'labels'             => $guest_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-id',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('guest', $guest_args);

    $stay_labels = [
        'name'               => __('Stays', 'hearthstone-ops'),
        'singular_name'      => __('Stay', 'hearthstone-ops'),
        'menu_name'          => __('Stays', 'hearthstone-ops'),
        'name_admin_bar'     => __('Stay', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Stay', 'hearthstone-ops'),
        'new_item'           => __('New Stay', 'hearthstone-ops'),
        'edit_item'          => __('Edit Stay', 'hearthstone-ops'),
        'view_item'          => __('View Stay', 'hearthstone-ops'),
        'all_items'          => __('All Stays', 'hearthstone-ops'),
        'search_items'       => __('Search Stays', 'hearthstone-ops'),
        'not_found'          => __('No stays found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No stays found in Trash.', 'hearthstone-ops'),
    ];

    $stay_args = [
        'labels'             => $stay_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('stay', $stay_args);

    $room_service_item_labels = [
        'name'               => __('Room Service Menu', 'hearthstone-ops'),
        'singular_name'      => __('Room Service Item', 'hearthstone-ops'),
        'menu_name'          => __('Room Service Menu', 'hearthstone-ops'),
        'name_admin_bar'     => __('Room Service Item', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Menu Item', 'hearthstone-ops'),
        'new_item'           => __('New Menu Item', 'hearthstone-ops'),
        'edit_item'          => __('Edit Menu Item', 'hearthstone-ops'),
        'view_item'          => __('View Menu Item', 'hearthstone-ops'),
        'all_items'          => __('All Menu Items', 'hearthstone-ops'),
        'search_items'       => __('Search Menu Items', 'hearthstone-ops'),
        'not_found'          => __('No menu items found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No menu items found in Trash.', 'hearthstone-ops'),
    ];

    $room_service_item_args = [
        'labels'             => $room_service_item_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 27,
        'menu_icon'          => 'dashicons-food',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('room_service_item', $room_service_item_args);

    $room_service_order_labels = [
        'name'               => __('Room Service Orders', 'hearthstone-ops'),
        'singular_name'      => __('Room Service Order', 'hearthstone-ops'),
        'menu_name'          => __('Room Service Orders', 'hearthstone-ops'),
        'name_admin_bar'     => __('Room Service Order', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Order', 'hearthstone-ops'),
        'new_item'           => __('New Order', 'hearthstone-ops'),
        'edit_item'          => __('Edit Order', 'hearthstone-ops'),
        'view_item'          => __('View Order', 'hearthstone-ops'),
        'all_items'          => __('All Orders', 'hearthstone-ops'),
        'search_items'       => __('Search Orders', 'hearthstone-ops'),
        'not_found'          => __('No orders found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No orders found in Trash.', 'hearthstone-ops'),
    ];

    $room_service_order_args = [
        'labels'             => $room_service_order_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 28,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('room_service_order', $room_service_order_args);

    $gift_shop_order_labels = [
        'name'               => __('Gift Shop Orders', 'hearthstone-ops'),
        'singular_name'      => __('Gift Shop Order', 'hearthstone-ops'),
        'menu_name'          => __('Gift Shop Orders', 'hearthstone-ops'),
        'name_admin_bar'     => __('Gift Shop Order', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Gift Shop Order', 'hearthstone-ops'),
        'new_item'           => __('New Gift Shop Order', 'hearthstone-ops'),
        'edit_item'          => __('Edit Gift Shop Order', 'hearthstone-ops'),
        'view_item'          => __('View Gift Shop Order', 'hearthstone-ops'),
        'all_items'          => __('All Gift Shop Orders', 'hearthstone-ops'),
        'search_items'       => __('Search Gift Shop Orders', 'hearthstone-ops'),
        'not_found'          => __('No gift shop orders found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No gift shop orders found in Trash.', 'hearthstone-ops'),
    ];

    $gift_shop_order_args = [
        'labels'             => $gift_shop_order_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 29,
        'menu_icon'          => 'dashicons-store',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('gift_shop_order', $gift_shop_order_args);

    $service_request_labels = [
        'name'               => __('Service Requests', 'hearthstone-ops'),
        'singular_name'      => __('Service Request', 'hearthstone-ops'),
        'menu_name'          => __('Service Requests', 'hearthstone-ops'),
        'name_admin_bar'     => __('Service Request', 'hearthstone-ops'),
        'add_new'            => __('Add New', 'hearthstone-ops'),
        'add_new_item'       => __('Add New Service Request', 'hearthstone-ops'),
        'new_item'           => __('New Service Request', 'hearthstone-ops'),
        'edit_item'          => __('Edit Service Request', 'hearthstone-ops'),
        'view_item'          => __('View Service Request', 'hearthstone-ops'),
        'all_items'          => __('All Service Requests', 'hearthstone-ops'),
        'search_items'       => __('Search Service Requests', 'hearthstone-ops'),
        'not_found'          => __('No service requests found.', 'hearthstone-ops'),
        'not_found_in_trash' => __('No service requests found in Trash.', 'hearthstone-ops'),
    ];

    $service_request_args = [
        'labels'             => $service_request_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-concierge-bell',
        'supports'           => ['title', 'editor'],
        'has_archive'        => false,
        'rewrite'            => false,
    ];

    register_post_type('guest_service_request', $service_request_args);
}
add_action('init', 'hearthstone_ops_register_post_types');

/**
 * Register meta boxes for guest and stay records.
 */
function hearthstone_ops_add_meta_boxes(): void
{
    add_meta_box(
        'hearthstone_guest_details',
        __('Guest Details', 'hearthstone-ops'),
        'hearthstone_ops_render_guest_details_meta_box',
        'guest',
        'normal',
        'default'
    );

    add_meta_box(
        'hearthstone_guest_related_stays',
        __('Related Stays', 'hearthstone-ops'),
        'hearthstone_ops_render_guest_related_stays_meta_box',
        'guest',
        'side',
        'high'
    );

    add_meta_box(
        'hearthstone_stay_details',
        __('Stay Details', 'hearthstone-ops'),
        'hearthstone_ops_render_stay_details_meta_box',
        'stay',
        'normal',
        'default'
    );

    add_meta_box(
        'hearthstone_stay_guest_summary',
        __('Linked Guest Summary', 'hearthstone-ops'),
        'hearthstone_ops_render_stay_guest_summary_meta_box',
        'stay',
        'side',
        'high'
    );

    add_meta_box(
        'hearthstone_room_service_item_details',
        __('Menu Item Details', 'hearthstone-ops'),
        'hearthstone_ops_render_room_service_item_meta_box',
        'room_service_item',
        'normal',
        'default'
    );

    add_meta_box(
        'hearthstone_room_service_order_details',
        __('Order Details', 'hearthstone-ops'),
        'hearthstone_ops_render_room_service_order_meta_box',
        'room_service_order',
        'normal',
        'default'
    );

    add_meta_box(
        'hearthstone_gift_shop_order_details',
        __('Gift Shop Order Details', 'hearthstone-ops'),
        'hearthstone_ops_render_gift_shop_order_meta_box',
        'gift_shop_order',
        'normal',
        'default'
    );

    add_meta_box(
        'hearthstone_service_request_details',
        __('Service Request Details', 'hearthstone-ops'),
        'hearthstone_ops_render_service_request_meta_box',
        'guest_service_request',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'hearthstone_ops_add_meta_boxes');

/**
 * Render the guest details meta box.
 *
 * @param WP_Post $post The current post object.
 */
function hearthstone_ops_render_guest_details_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_guest_details', 'hearthstone_ops_guest_nonce');

    $email          = get_post_meta($post->ID, '_hearthstone_guest_email', true);
    $phone          = get_post_meta($post->ID, '_hearthstone_guest_phone', true);
    $marketing_src  = get_post_meta($post->ID, '_hearthstone_guest_marketing_source', true);
    $preferred_room = get_post_meta($post->ID, '_hearthstone_guest_preferred_room', true);
    $vip            = get_post_meta($post->ID, '_hearthstone_guest_vip', true);
    $consent        = get_post_meta($post->ID, '_hearthstone_guest_marketing_consent', true);
    $room_theme_suggestions = hearthstone_ops_get_room_theme_suggestions();
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="hearthstone_guest_email"><?php esc_html_e('Email', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="email"
                        id="hearthstone_guest_email"
                        name="hearthstone_guest_email"
                        value="<?php echo esc_attr($email); ?>"
                        class="regular-text"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_guest_phone"><?php esc_html_e('Phone', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="hearthstone_guest_phone"
                        name="hearthstone_guest_phone"
                        value="<?php echo esc_attr($phone); ?>"
                        class="regular-text"
                    >
                    <p class="description"><?php esc_html_e('10-digit US numbers auto-format on save.', 'hearthstone-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_guest_marketing_source"><?php esc_html_e('Marketing Source', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <select id="hearthstone_guest_marketing_source" name="hearthstone_guest_marketing_source">
                        <option value=""><?php esc_html_e('Select a source', 'hearthstone-ops'); ?></option>
                        <option value="direct" <?php selected($marketing_src, 'direct'); ?>><?php esc_html_e('Direct', 'hearthstone-ops'); ?></option>
                        <option value="google" <?php selected($marketing_src, 'google'); ?>><?php esc_html_e('Google Search', 'hearthstone-ops'); ?></option>
                        <option value="referral" <?php selected($marketing_src, 'referral'); ?>><?php esc_html_e('Referral', 'hearthstone-ops'); ?></option>
                        <option value="social" <?php selected($marketing_src, 'social'); ?>><?php esc_html_e('Social Media', 'hearthstone-ops'); ?></option>
                        <option value="repeat" <?php selected($marketing_src, 'repeat'); ?>><?php esc_html_e('Repeat Guest', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_guest_preferred_room"><?php esc_html_e('Preferred Room / Theme', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="hearthstone_guest_preferred_room"
                        name="hearthstone_guest_preferred_room"
                        value="<?php echo esc_attr($preferred_room); ?>"
                        list="hearthstone_room_theme_suggestions"
                        class="regular-text"
                    >
                    <datalist id="hearthstone_room_theme_suggestions">
                        <?php foreach ($room_theme_suggestions as $room_theme_label) : ?>
                            <option value="<?php echo esc_attr($room_theme_label); ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                    <p class="description"><?php esc_html_e('Select or type the guest room-theme preference.', 'hearthstone-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Flags', 'hearthstone-ops'); ?></th>
                <td>
                    <label for="hearthstone_guest_vip">
                        <input
                            type="checkbox"
                            id="hearthstone_guest_vip"
                            name="hearthstone_guest_vip"
                            value="1"
                            <?php checked($vip, '1'); ?>
                        >
                        <?php esc_html_e('VIP guest', 'hearthstone-ops'); ?>
                    </label>
                    <br>
                    <label for="hearthstone_guest_marketing_consent">
                        <input
                            type="checkbox"
                            id="hearthstone_guest_marketing_consent"
                            name="hearthstone_guest_marketing_consent"
                            value="1"
                            <?php checked($consent, '1'); ?>
                        >
                        <?php esc_html_e('Marketing consent received', 'hearthstone-ops'); ?>
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Calculate stay nights from check-in and check-out dates.
 *
 * @param string $check_in  Check-in date in Y-m-d format.
 * @param string $check_out Check-out date in Y-m-d format.
 * @return int|null
 */
function hearthstone_ops_calculate_stay_nights(string $check_in, string $check_out): ?int
{
    if ($check_in === '' || $check_out === '') {
        return null;
    }

    try {
        $check_in_date  = new DateTimeImmutable($check_in);
        $check_out_date = new DateTimeImmutable($check_out);
    } catch (Exception $exception) {
        return null;
    }

    if ($check_out_date <= $check_in_date) {
        return null;
    }

    $interval = $check_in_date->diff($check_out_date);

    return isset($interval->days) ? (int) $interval->days : null;
}

/**
 * Format guest phone numbers for consistent admin display/storage.
 *
 * @param string $phone Raw phone input from admin form.
 */
function hearthstone_ops_format_guest_phone(string $phone): string
{
    $trimmed = trim($phone);

    if ($trimmed === '') {
        return '';
    }

    $digits = preg_replace('/\D+/', '', $trimmed);

    if ($digits === null || $digits === '') {
        return $trimmed;
    }

    if (strlen($digits) === 11 && substr($digits, 0, 1) === '1') {
        $digits = substr($digits, 1);
    }

    if (strlen($digits) === 10) {
        return sprintf(
            '(%s) %s-%s',
            substr($digits, 0, 3),
            substr($digits, 3, 3),
            substr($digits, 6, 4)
        );
    }

    return $trimmed;
}

/**
 * Suggested room theme labels for property-specific preference capture.
 *
 * @return array<int, string>
 */
function hearthstone_ops_get_room_theme_suggestions(): array
{
    return [
        'Hearthstone Canyon Calm',
        'Taos Adobe',
        'Santa Fe Serenity',
        'Bandelier Mesa',
        'White Sands Glow',
        'Jemez Forest Retreat',
        'Rio Grande Sunrise',
        'Abiquiu Sky',
        'High Desert Moon',
    ];
}

/**
 * Determine whether a record is currently tagged as demo/sample data.
 *
 * @param int $post_id Post ID.
 */
function hearthstone_ops_is_sample_record(int $post_id): bool
{
    return (string) get_post_meta($post_id, '_hearthstone_ops_sample_data', true) === '1';
}

/**
 * Calculate revenue per night when both values are valid.
 *
 * @param string $revenue Revenue value as stored.
 * @param int    $nights  Persisted nights value.
 * @return float|null
 */
function hearthstone_ops_calculate_revenue_per_night(string $revenue, int $nights): ?float
{
    if ($revenue === '' || $nights <= 0) {
        return null;
    }

    $revenue_amount = (float) $revenue;

    if ($revenue_amount <= 0) {
        return null;
    }

    return $revenue_amount / $nights;
}

/**
 * Build aggregate stay metrics for the overview page.
 *
 * @return array<string, float|int|null>
 */
function hearthstone_ops_get_stay_rollup_metrics(): array
{
    $stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $active_statuses         = ['booked', 'checked_in', 'checked_out'];
    $booked_active_nights    = 0;
    $revenue_total           = 0.0;
    $revenue_count           = 0;
    $revenue_per_night_total = 0.0;
    $revenue_per_night_count = 0;

    foreach ($stays as $stay_post) {
        $status            = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_status', true);
        $nights            = (int) get_post_meta($stay_post->ID, '_hearthstone_stay_nights', true);
        $revenue           = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_revenue', true);
        $revenue_per_night = hearthstone_ops_calculate_revenue_per_night($revenue, $nights);

        if (in_array($status, $active_statuses, true) && $nights > 0) {
            $booked_active_nights += $nights;
        }

        if ($revenue !== '') {
            $revenue_total += (float) $revenue;
            $revenue_count++;
        }

        if ($revenue_per_night !== null) {
            $revenue_per_night_total += $revenue_per_night;
            $revenue_per_night_count++;
        }
    }

    $average_revenue           = $revenue_count > 0 ? $revenue_total / $revenue_count : null;
    $average_revenue_per_night = $revenue_per_night_count > 0 ? $revenue_per_night_total / $revenue_per_night_count : null;

    return [
        'booked_active_nights'    => $booked_active_nights,
        'average_revenue'         => $average_revenue,
        'average_revenue_per_night' => $average_revenue_per_night,
        'revenue_total'           => $revenue_total,
        'revenue_count'           => $revenue_count,
    ];
}

/**
 * Build data-quality metrics for guest and stay records.
 *
 * @return array<string, int>
 */
function hearthstone_ops_get_data_quality_metrics(): array
{
    $metrics = [
        'guest_missing_email'      => 0,
        'guest_missing_phone'      => 0,
        'guest_missing_consent'    => 0,
        'stay_missing_guest_link'  => 0,
        'stay_missing_dates'       => 0,
        'stay_invalid_date_range'  => 0,
        'stay_missing_revenue'     => 0,
        'stay_arrival_contact_gaps_48h' => 0,
    ];

    $guest_ids = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    foreach ($guest_ids as $guest_id) {
        $email   = (string) get_post_meta($guest_id, '_hearthstone_guest_email', true);
        $phone   = (string) get_post_meta($guest_id, '_hearthstone_guest_phone', true);
        $consent = (string) get_post_meta($guest_id, '_hearthstone_guest_marketing_consent', true);

        if ($email === '') {
            $metrics['guest_missing_email']++;
        }

        if ($phone === '') {
            $metrics['guest_missing_phone']++;
        }

        if ($consent !== '1') {
            $metrics['guest_missing_consent']++;
        }
    }

    $stay_ids = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    foreach ($stay_ids as $stay_id) {
        $linked_guest_id = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);
        $check_in        = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out       = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);
        $revenue         = (string) get_post_meta($stay_id, '_hearthstone_stay_revenue', true);

        if ($linked_guest_id <= 0 || get_post_type($linked_guest_id) !== 'guest') {
            $metrics['stay_missing_guest_link']++;
        }

        if ($check_in === '' || $check_out === '') {
            $metrics['stay_missing_dates']++;
        } elseif (hearthstone_ops_calculate_stay_nights($check_in, $check_out) === null) {
            $metrics['stay_invalid_date_range']++;
        }

        if ($revenue === '') {
            $metrics['stay_missing_revenue']++;
        }
    }

    $metrics['stay_arrival_contact_gaps_48h'] = count(hearthstone_ops_get_arrival_contact_gap_stay_ids(1));

    return $metrics;
}

/**
 * Build an upcoming-arrivals list with readiness flags.
 *
 * @param int $days_ahead Number of days ahead to include.
 * @param int $limit Maximum number of stays to return.
 * @return array<int, array<string, mixed>>
 */
function hearthstone_ops_get_upcoming_arrivals(int $days_ahead = 14, int $limit = 8): array
{
    $today = wp_date('Y-m-d');
    $window_end = wp_date('Y-m-d', strtotime('+' . max($days_ahead, 1) . ' days'));

    $upcoming_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => $limit,
        'post_status'    => ['publish', 'draft'],
        'meta_key'       => '_hearthstone_stay_check_in',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'meta_query'     => [
            [
                'key'     => '_hearthstone_stay_status',
                'value'   => 'booked',
                'compare' => '=',
            ],
            [
                'key'     => '_hearthstone_stay_check_in',
                'value'   => [$today, $window_end],
                'compare' => 'BETWEEN',
                'type'    => 'DATE',
            ],
        ],
    ]);

    $arrivals = [];

    foreach ($upcoming_stays as $stay_post) {
        $stay_id          = (int) $stay_post->ID;
        $guest_id         = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);
        $check_in         = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out        = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);
        $status           = (string) get_post_meta($stay_id, '_hearthstone_stay_status', true);
        $revenue          = (string) get_post_meta($stay_id, '_hearthstone_stay_revenue', true);
        $nights           = (int) get_post_meta($stay_id, '_hearthstone_stay_nights', true);
        $guest_name       = $guest_id > 0 ? get_the_title($guest_id) : '';
        $is_guest_missing = $guest_id <= 0 || get_post_type($guest_id) !== 'guest';
        $is_dates_missing = $check_in === '' || $check_out === '';
        $is_nights_invalid = $nights <= 0;
        $is_revenue_missing = $revenue === '';

        $issues = [];

        if ($is_guest_missing) {
            $issues[] = __('Missing guest link', 'hearthstone-ops');
        }

        if ($is_dates_missing) {
            $issues[] = __('Missing stay dates', 'hearthstone-ops');
        }

        if ($is_nights_invalid) {
            $issues[] = __('Nights not calculated', 'hearthstone-ops');
        }

        if ($is_revenue_missing) {
            $issues[] = __('Missing estimated revenue', 'hearthstone-ops');
        }

        $arrivals[] = [
            'stay_id'     => $stay_id,
            'stay_title'  => $stay_post->post_title,
            'stay_link'   => get_edit_post_link($stay_id) ?: '',
            'guest_name'  => $guest_name !== '' ? $guest_name : __('N/A', 'hearthstone-ops'),
            'guest_link'  => $guest_id > 0 ? (get_edit_post_link($guest_id) ?: '') : '',
            'check_in'    => $check_in,
            'check_out'   => $check_out,
            'status'      => $status,
            'nights'      => $nights,
            'issues'      => $issues,
            'is_ready'    => empty($issues),
        ];
    }

    return $arrivals;
}

/**
 * Get booked arrivals between today and N days ahead.
 *
 * @param int $days_ahead Number of days ahead (inclusive) to inspect.
 * @return array<int, int>
 */
function hearthstone_ops_get_booked_arrival_stay_ids(int $days_ahead = 1): array
{
    $today      = wp_date('Y-m-d');
    $window_end = wp_date('Y-m-d', strtotime('+' . max(0, $days_ahead) . ' days'));

    $stay_ids = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_hearthstone_stay_status',
                'value' => 'booked',
            ],
            [
                'key'     => '_hearthstone_stay_check_in',
                'value'   => [$today, $window_end],
                'compare' => 'BETWEEN',
                'type'    => 'DATE',
            ],
        ],
    ]);

    return array_map('intval', $stay_ids);
}

/**
 * Get booked arrivals in the next N days that are missing guest contact readiness.
 *
 * A stay is considered a contact gap when it is booked to arrive between today and
 * the given day window and either has no linked guest or that guest is missing
 * email or phone.
 *
 * @param int $days_ahead Number of days ahead (inclusive) to inspect.
 * @return array<int, int>
 */
function hearthstone_ops_get_arrival_contact_gap_stay_ids(int $days_ahead = 1): array
{
    $gap_ids = [];

    foreach (hearthstone_ops_get_booked_arrival_stay_ids($days_ahead) as $stay_id) {
        $stay_id  = (int) $stay_id;
        $guest_id = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);

        if (!hearthstone_ops_is_guest_contact_ready($guest_id)) {
            $gap_ids[] = $stay_id;
        }
    }

    return $gap_ids;
}

/**
 * Get guest IDs with missing contact fields (email or phone).
 *
 * @return array<int, int>
 */
function hearthstone_ops_get_guest_missing_contact_ids(): array
{
    $guest_ids = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
        'meta_query'     => [
            'relation' => 'OR',
            [
                'relation' => 'OR',
                [
                    'key'     => '_hearthstone_guest_email',
                    'compare' => 'NOT EXISTS',
                ],
                [
                    'key'     => '_hearthstone_guest_email',
                    'value'   => '',
                    'compare' => '=',
                ],
            ],
            [
                'relation' => 'OR',
                [
                    'key'     => '_hearthstone_guest_phone',
                    'compare' => 'NOT EXISTS',
                ],
                [
                    'key'     => '_hearthstone_guest_phone',
                    'value'   => '',
                    'compare' => '=',
                ],
            ],
        ],
    ]);

    return array_map('intval', $guest_ids);
}

/**
 * Determine whether a guest has complete contact fields for arrival readiness.
 *
 * @param int $guest_id Guest post ID.
 */
function hearthstone_ops_is_guest_contact_ready(int $guest_id): bool
{
    if ($guest_id <= 0 || get_post_type($guest_id) !== 'guest') {
        return false;
    }

    $guest_email = trim((string) get_post_meta($guest_id, '_hearthstone_guest_email', true));
    $guest_phone = trim((string) get_post_meta($guest_id, '_hearthstone_guest_phone', true));

    return $guest_email !== '' && $guest_phone !== '';
}

/**
 * Check whether a check-in date is in the current 48-hour (today/tomorrow) window.
 *
 * @param string $check_in Check-in date value.
 */
function hearthstone_ops_is_check_in_within_next_48h(string $check_in): bool
{
    if ($check_in === '') {
        return false;
    }

    $today    = wp_date('Y-m-d');
    $tomorrow = wp_date('Y-m-d', strtotime('+1 day'));

    return $check_in >= $today && $check_in <= $tomorrow;
}

/**
 * Build same-day operations metrics for arrivals, departures, and in-house stays.
 *
 * @return array<string, int|float|null>
 */
function hearthstone_ops_get_today_operations_metrics(): array
{
    $today = wp_date('Y-m-d');

    $metrics = [
        'arrivals_today'       => 0,
        'departures_today'     => 0,
        'in_house_today'       => 0,
        'pending_check_ins'    => 0,
        'pending_check_outs'   => 0,
        'overdue_arrivals'     => 0,
        'arrival_contact_gaps_48h' => 0,
        'arrivals_next_48h'    => 0,
        'arrival_contact_ready_48h' => 0,
        'arrival_contact_ready_rate_48h' => null,
    ];

    $stay_ids = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    foreach ($stay_ids as $stay_id) {
        $status    = (string) get_post_meta($stay_id, '_hearthstone_stay_status', true);
        $check_in  = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);

        if ($check_in === $today) {
            $metrics['arrivals_today']++;

            if ($status === 'booked') {
                $metrics['pending_check_ins']++;
            }
        }

        if ($check_out === $today) {
            $metrics['departures_today']++;

            if ($status === 'checked_in') {
                $metrics['pending_check_outs']++;
            }
        }

        if ($check_in !== '' && $check_out !== '' && $check_in <= $today && $check_out > $today) {
            if (in_array($status, ['booked', 'checked_in'], true)) {
                $metrics['in_house_today']++;
            }
        }

        if (
            $status === 'booked'
            && $check_in !== ''
            && $check_out !== ''
            && $check_in < $today
            && $check_out > $today
        ) {
            $metrics['overdue_arrivals']++;
        }
    }

    $arrivals_next_48h = count(hearthstone_ops_get_booked_arrival_stay_ids(1));
    $contact_gaps_48h  = count(hearthstone_ops_get_arrival_contact_gap_stay_ids(1));
    $contact_ready_48h = max(0, $arrivals_next_48h - $contact_gaps_48h);

    $metrics['arrivals_next_48h'] = $arrivals_next_48h;
    $metrics['arrival_contact_gaps_48h'] = $contact_gaps_48h;
    $metrics['arrival_contact_ready_48h'] = $contact_ready_48h;
    $metrics['arrival_contact_ready_rate_48h'] = $arrivals_next_48h > 0
        ? round(($contact_ready_48h / $arrivals_next_48h) * 100, 1)
        : null;

    return $metrics;
}

/**
 * Render the related stays summary on the Guest edit screen.
 *
 * @param WP_Post $post The current Guest post object.
 */
function hearthstone_ops_render_guest_related_stays_meta_box(WP_Post $post): void
{
    $related_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => 10,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'   => '_hearthstone_stay_guest_id',
                'value' => (string) $post->ID,
            ],
        ],
    ]);

    if (empty($related_stays)) {
        echo '<p>' . esc_html__('No stays linked to this guest yet.', 'hearthstone-ops') . '</p>';
        return;
    }

    echo '<ul style="margin:0;">';

    foreach ($related_stays as $stay_post) {
        $status            = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_status', true);
        $check_in          = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_check_in', true);
        $check_out         = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_check_out', true);
        $revenue           = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_revenue', true);
        $nights            = (int) get_post_meta($stay_post->ID, '_hearthstone_stay_nights', true);
        $revenue_per_night = hearthstone_ops_calculate_revenue_per_night($revenue, $nights);
        $edit_link         = get_edit_post_link($stay_post->ID);

        echo '<li style="margin-bottom:12px;">';
        echo '<strong>' . esc_html($stay_post->post_title) . '</strong><br>';
        echo esc_html__('Status:', 'hearthstone-ops') . ' ' . esc_html(hearthstone_ops_format_stay_status_label($status)) . '<br>';

        if ($check_in !== '' || $check_out !== '') {
            echo esc_html__('Dates:', 'hearthstone-ops') . ' ' . esc_html(trim($check_in . ' -> ' . $check_out)) . '<br>';
        }

        if ($nights > 0) {
            echo esc_html__('Nights:', 'hearthstone-ops') . ' ' . esc_html((string) $nights) . '<br>';
        }

        if ($revenue !== '') {
            echo esc_html__('Revenue:', 'hearthstone-ops') . ' ' . esc_html('$' . $revenue) . '<br>';
        }

        if ($revenue_per_night !== null) {
            echo esc_html__('Revenue / Night:', 'hearthstone-ops') . ' ' . esc_html('$' . number_format($revenue_per_night, 2)) . '<br>';
        }

        if ($edit_link) {
            echo '<a href="' . esc_url($edit_link) . '">' . esc_html__('Edit Stay', 'hearthstone-ops') . '</a>';
        }

        echo '</li>';
    }

    echo '</ul>';
}

/**
 * Render the stay details meta box.
 *
 * @param WP_Post $post The current post object.
 */
function hearthstone_ops_render_stay_details_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_stay_details', 'hearthstone_ops_stay_nonce');

    $linked_guest_id   = get_post_meta($post->ID, '_hearthstone_stay_guest_id', true);
    $room_number       = (string) get_post_meta($post->ID, '_hearthstone_stay_room_number', true);
    $check_in          = (string) get_post_meta($post->ID, '_hearthstone_stay_check_in', true);
    $check_out         = (string) get_post_meta($post->ID, '_hearthstone_stay_check_out', true);
    $checkout_at       = (string) get_post_meta($post->ID, '_hearthstone_stay_checkout_at', true);
    $has_access_code   = trim((string) get_post_meta($post->ID, '_hearthstone_stay_access_code_hash', true)) !== '';
    $status            = get_post_meta($post->ID, '_hearthstone_stay_status', true);
    $revenue           = (string) get_post_meta($post->ID, '_hearthstone_stay_revenue', true);
    $nights            = hearthstone_ops_calculate_stay_nights($check_in, $check_out);
    $revenue_per_night = $nights !== null ? hearthstone_ops_calculate_revenue_per_night($revenue, $nights) : null;

    $guest_posts = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_guest_id"><?php esc_html_e('Linked Guest', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <select id="hearthstone_stay_guest_id" name="hearthstone_stay_guest_id">
                        <option value=""><?php esc_html_e('Select a guest', 'hearthstone-ops'); ?></option>
                        <?php foreach ($guest_posts as $guest_post) : ?>
                            <option value="<?php echo esc_attr($guest_post->ID); ?>" <?php selected((string) $linked_guest_id, (string) $guest_post->ID); ?>>
                                <?php echo esc_html($guest_post->post_title); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_check_in"><?php esc_html_e('Check-in Date', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="date"
                        id="hearthstone_stay_check_in"
                        name="hearthstone_stay_check_in"
                        value="<?php echo esc_attr($check_in); ?>"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_room_number"><?php esc_html_e('Room Number', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="hearthstone_stay_room_number"
                        name="hearthstone_stay_room_number"
                        value="<?php echo esc_attr($room_number); ?>"
                        class="regular-text"
                        placeholder="<?php esc_attr_e('Example: 5', 'hearthstone-ops'); ?>"
                    >
                    <p class="description"><?php esc_html_e('Used by guests to sign in to the stay app.', 'hearthstone-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_check_out"><?php esc_html_e('Check-out Date', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="date"
                        id="hearthstone_stay_check_out"
                        name="hearthstone_stay_check_out"
                        value="<?php echo esc_attr($check_out); ?>"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_checkout_at"><?php esc_html_e('Checkout Date/Time', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="datetime-local"
                        id="hearthstone_stay_checkout_at"
                        name="hearthstone_stay_checkout_at"
                        value="<?php echo esc_attr($checkout_at); ?>"
                    >
                    <p class="description"><?php esc_html_e('Optional precise session expiry. If blank, app sessions expire at 11:00 on check-out date.', 'hearthstone-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_access_code"><?php esc_html_e('Guest Access Code', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="password"
                        id="hearthstone_stay_access_code"
                        name="hearthstone_stay_access_code"
                        value=""
                        class="regular-text"
                        autocomplete="new-password"
                        placeholder="<?php esc_attr_e('Set or rotate code', 'hearthstone-ops'); ?>"
                    >
                    <p class="description">
                        <?php
                        echo $has_access_code
                            ? esc_html__('A code is already set. Enter a new one only if you want to rotate it.', 'hearthstone-ops')
                            : esc_html__('Set the code guests receive at check-in.', 'hearthstone-ops');
                        ?>
                    </p>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Calculated Nights', 'hearthstone-ops'); ?></th>
                <td>
                    <?php
                    echo $nights !== null
                        ? esc_html((string) $nights)
                        : esc_html__('Set both dates with check-out after check-in to calculate nights.', 'hearthstone-ops');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Estimated Revenue / Night', 'hearthstone-ops'); ?></th>
                <td>
                    <?php
                    echo $revenue_per_night !== null
                        ? esc_html('$' . number_format($revenue_per_night, 2))
                        : esc_html__('Enter revenue and valid dates to calculate revenue per night.', 'hearthstone-ops');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_status"><?php esc_html_e('Stay Status', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <select id="hearthstone_stay_status" name="hearthstone_stay_status">
                        <option value="lead" <?php selected($status, 'lead'); ?>><?php esc_html_e('Lead', 'hearthstone-ops'); ?></option>
                        <option value="booked" <?php selected($status, 'booked'); ?>><?php esc_html_e('Booked', 'hearthstone-ops'); ?></option>
                        <option value="checked_in" <?php selected($status, 'checked_in'); ?>><?php esc_html_e('Checked In', 'hearthstone-ops'); ?></option>
                        <option value="checked_out" <?php selected($status, 'checked_out'); ?>><?php esc_html_e('Checked Out', 'hearthstone-ops'); ?></option>
                        <option value="cancelled" <?php selected($status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="hearthstone_stay_revenue"><?php esc_html_e('Estimated Revenue', 'hearthstone-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        id="hearthstone_stay_revenue"
                        name="hearthstone_stay_revenue"
                        value="<?php echo esc_attr($revenue); ?>"
                    >
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Render the linked guest summary on the Stay edit screen.
 *
 * @param WP_Post $post The current Stay post object.
 */
function hearthstone_ops_render_stay_guest_summary_meta_box(WP_Post $post): void
{
    $linked_guest_id = (int) get_post_meta($post->ID, '_hearthstone_stay_guest_id', true);

    if ($linked_guest_id <= 0) {
        echo '<p>' . esc_html__('No guest linked yet. Select a guest in Stay Details and save the stay to see a summary here.', 'hearthstone-ops') . '</p>';
        return;
    }

    $guest_post = get_post($linked_guest_id);

    if (!$guest_post || $guest_post->post_type !== 'guest') {
        echo '<p>' . esc_html__('The linked guest record could not be found.', 'hearthstone-ops') . '</p>';
        return;
    }

    $guest_email      = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_email', true);
    $guest_phone      = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_phone', true);
    $guest_source     = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_marketing_source', true);
    $guest_preference = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_preferred_room', true);
    $guest_vip        = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_vip', true);
    $guest_consent    = (string) get_post_meta($linked_guest_id, '_hearthstone_guest_marketing_consent', true);
    $guest_edit_link  = get_edit_post_link($linked_guest_id);
    ?>
    <p><strong><?php esc_html_e('Guest', 'hearthstone-ops'); ?>:</strong><br><?php echo esc_html($guest_post->post_title); ?></p>

    <p><strong><?php esc_html_e('Email', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_email !== '' ? esc_html($guest_email) : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <p><strong><?php esc_html_e('Phone', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_phone !== '' ? esc_html($guest_phone) : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <p><strong><?php esc_html_e('Source', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_source !== '' ? esc_html(hearthstone_ops_format_guest_source_label($guest_source)) : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <p><strong><?php esc_html_e('Preference', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_preference !== '' ? esc_html($guest_preference) : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <p><strong><?php esc_html_e('VIP', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_vip === '1' ? esc_html__('Yes', 'hearthstone-ops') : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <p><strong><?php esc_html_e('Marketing Consent', 'hearthstone-ops'); ?>:</strong><br><?php echo $guest_consent === '1' ? esc_html__('Yes', 'hearthstone-ops') : esc_html__('N/A', 'hearthstone-ops'); ?></p>

    <?php if ($guest_edit_link) : ?>
        <p style="margin-top:16px;">
            <a class="button button-secondary" href="<?php echo esc_url($guest_edit_link); ?>">
                <?php esc_html_e('Edit Linked Guest', 'hearthstone-ops'); ?>
            </a>
        </p>
    <?php endif; ?>
    <?php
}

/**
 * Save guest meta box data.
 *
 * @param int $post_id The current post ID.
 */
function hearthstone_ops_save_guest_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_guest_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_guest_nonce'])), 'hearthstone_ops_save_guest_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'guest') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $email          = isset($_POST['hearthstone_guest_email']) ? sanitize_email(wp_unslash($_POST['hearthstone_guest_email'])) : '';
    $phone_raw      = isset($_POST['hearthstone_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_guest_phone'])) : '';
    $phone          = hearthstone_ops_format_guest_phone($phone_raw);
    $marketing_src  = isset($_POST['hearthstone_guest_marketing_source']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_guest_marketing_source'])) : '';
    $preferred_room = isset($_POST['hearthstone_guest_preferred_room']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_guest_preferred_room'])) : '';
    $vip            = isset($_POST['hearthstone_guest_vip']) ? '1' : '';
    $consent        = isset($_POST['hearthstone_guest_marketing_consent']) ? '1' : '';

    update_post_meta($post_id, '_hearthstone_guest_email', $email);
    update_post_meta($post_id, '_hearthstone_guest_phone', $phone);
    update_post_meta($post_id, '_hearthstone_guest_marketing_source', $marketing_src);
    update_post_meta($post_id, '_hearthstone_guest_preferred_room', $preferred_room);
    update_post_meta($post_id, '_hearthstone_guest_vip', $vip);
    update_post_meta($post_id, '_hearthstone_guest_marketing_consent', $consent);
}
add_action('save_post', 'hearthstone_ops_save_guest_meta');

/**
 * Save stay meta box data.
 *
 * @param int $post_id The current post ID.
 */
function hearthstone_ops_save_stay_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_stay_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_stay_nonce'])), 'hearthstone_ops_save_stay_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'stay') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $linked_guest_id = isset($_POST['hearthstone_stay_guest_id']) ? absint(wp_unslash($_POST['hearthstone_stay_guest_id'])) : 0;
    $room_number     = isset($_POST['hearthstone_stay_room_number']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_room_number'])) : '';
    $check_in        = isset($_POST['hearthstone_stay_check_in']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_check_in'])) : '';
    $check_out       = isset($_POST['hearthstone_stay_check_out']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_check_out'])) : '';
    $checkout_at     = isset($_POST['hearthstone_stay_checkout_at']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_checkout_at'])) : '';
    $access_code     = isset($_POST['hearthstone_stay_access_code']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_access_code'])) : '';
    $status          = isset($_POST['hearthstone_stay_status']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_status'])) : 'lead';
    $revenue         = isset($_POST['hearthstone_stay_revenue']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_stay_revenue'])) : '';
    $nights          = hearthstone_ops_calculate_stay_nights($check_in, $check_out);

    update_post_meta($post_id, '_hearthstone_stay_guest_id', $linked_guest_id);
    update_post_meta($post_id, '_hearthstone_stay_room_number', strtoupper(trim($room_number)));
    update_post_meta($post_id, '_hearthstone_stay_check_in', $check_in);
    update_post_meta($post_id, '_hearthstone_stay_check_out', $check_out);
    update_post_meta($post_id, '_hearthstone_stay_checkout_at', $checkout_at);
    update_post_meta($post_id, '_hearthstone_stay_status', $status);
    update_post_meta($post_id, '_hearthstone_stay_revenue', $revenue);

    if ($access_code !== '') {
        update_post_meta($post_id, '_hearthstone_stay_access_code_hash', wp_hash_password($access_code));
    }

    if ($nights !== null) {
        update_post_meta($post_id, '_hearthstone_stay_nights', $nights);
    } else {
        delete_post_meta($post_id, '_hearthstone_stay_nights');
    }
}
add_action('save_post', 'hearthstone_ops_save_stay_meta');

/**
 * Sanitize decimal amount stored as a string with two decimals.
 *
 * @param string $raw_value Raw amount.
 * @return string
 */
function hearthstone_ops_sanitize_decimal_amount(string $raw_value): string
{
    $normalized = preg_replace('/[^0-9.\-]/', '', $raw_value);

    if (!is_string($normalized) || $normalized === '') {
        return '';
    }

    $amount = (float) $normalized;

    if ($amount < 0) {
        $amount = 0.0;
    }

    return number_format($amount, 2, '.', '');
}

/**
 * Save room service menu item metadata.
 *
 * @param int $post_id Current post ID.
 */
function hearthstone_ops_save_room_service_item_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_room_service_item_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_room_service_item_nonce'])), 'hearthstone_ops_save_room_service_item')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'room_service_item') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $price        = isset($_POST['hearthstone_room_service_price']) ? hearthstone_ops_sanitize_decimal_amount((string) wp_unslash($_POST['hearthstone_room_service_price'])) : '';
    $prep_minutes = isset($_POST['hearthstone_room_service_prep_minutes']) ? max(0, absint(wp_unslash($_POST['hearthstone_room_service_prep_minutes']))) : 0;
    $is_available = isset($_POST['hearthstone_room_service_available']) ? '1' : '';
    $image_url    = isset($_POST['hearthstone_room_service_image_url']) ? esc_url_raw((string) wp_unslash($_POST['hearthstone_room_service_image_url'])) : '';

    update_post_meta($post_id, '_hearthstone_room_service_price', $price);
    update_post_meta($post_id, '_hearthstone_room_service_prep_minutes', $prep_minutes);
    update_post_meta($post_id, '_hearthstone_room_service_available', $is_available);
    update_post_meta($post_id, '_hearthstone_room_service_image_url', $image_url);
}
add_action('save_post', 'hearthstone_ops_save_room_service_item_meta');

/**
 * Save room service order metadata.
 *
 * @param int $post_id Current post ID.
 */
function hearthstone_ops_save_room_service_order_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_room_service_order_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_room_service_order_nonce'])), 'hearthstone_ops_save_room_service_order')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'room_service_order') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $item_id     = isset($_POST['hearthstone_order_item_id']) ? absint(wp_unslash($_POST['hearthstone_order_item_id'])) : 0;
    $quantity    = isset($_POST['hearthstone_order_quantity']) ? max(1, absint(wp_unslash($_POST['hearthstone_order_quantity']))) : 1;
    $room_number = isset($_POST['hearthstone_order_room_number']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_order_room_number'])) : '';
    $guest_name  = isset($_POST['hearthstone_order_guest_name']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_order_guest_name'])) : '';
    $guest_phone = isset($_POST['hearthstone_order_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_order_guest_phone'])) : '';
    $order_total = isset($_POST['hearthstone_order_total']) ? hearthstone_ops_sanitize_decimal_amount((string) wp_unslash($_POST['hearthstone_order_total'])) : '';
    $order_state = isset($_POST['hearthstone_order_status']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_order_status'])) : 'submitted';
    $item_qty_map = [];

    if (isset($_POST['hearthstone_order_item_qty']) && is_array($_POST['hearthstone_order_item_qty'])) {
        $item_qty_map = (array) wp_unslash($_POST['hearthstone_order_item_qty']);
    }

    $allowed_states = ['submitted', 'confirmed', 'in_kitchen', 'ready', 'delivering', 'completed', 'cancelled'];

    if (!in_array($order_state, $allowed_states, true)) {
        $order_state = 'submitted';
    }

    $did_update_line_items = false;
    $recalculated_order_total = '';
    $editable_states = ['submitted', 'confirmed'];

    if (!empty($item_qty_map) && in_array($order_state, $editable_states, true)) {
        $updated_cart = [];
        $updated_subtotal = 0.0;
        $updated_total_qty = 0;

        foreach ($item_qty_map as $raw_item_id => $raw_qty) {
            $item_id_for_cart = absint((string) $raw_item_id);
            $qty_for_cart = max(0, absint($raw_qty));

            if ($item_id_for_cart <= 0 || $qty_for_cart <= 0) {
                continue;
            }

            $item_post = get_post($item_id_for_cart);

            if (!$item_post instanceof WP_Post || $item_post->post_type !== 'room_service_item') {
                continue;
            }

            $updated_cart[$item_id_for_cart] = $qty_for_cart;
            $updated_total_qty += $qty_for_cart;

            $item_price_raw = (string) get_post_meta($item_id_for_cart, '_hearthstone_room_service_price', true);
            $item_price = $item_price_raw !== '' ? (float) $item_price_raw : 0.0;
            $updated_subtotal += ($item_price * $qty_for_cart);
        }

        if (!empty($updated_cart)) {
            $tip_percent = (int) get_post_meta($post_id, '_hearthstone_order_tip_percent', true);

            if ($tip_percent < 0) {
                $tip_percent = 0;
            }

            $updated_tip_amount = $updated_subtotal * ($tip_percent / 100);
            $recalculated_order_total = number_format($updated_subtotal + $updated_tip_amount, 2, '.', '');

            update_post_meta($post_id, '_hearthstone_order_items_json', wp_json_encode($updated_cart));
            update_post_meta($post_id, '_hearthstone_order_item_id', (int) array_key_first($updated_cart));
            update_post_meta($post_id, '_hearthstone_order_quantity', $updated_total_qty);
            update_post_meta($post_id, '_hearthstone_order_subtotal', number_format($updated_subtotal, 2, '.', ''));
            update_post_meta($post_id, '_hearthstone_order_tip_amount', number_format($updated_tip_amount, 2, '.', ''));

            $did_update_line_items = true;
        }
    }

    if (!$did_update_line_items && isset($_POST['hearthstone_order_item_id'])) {
        update_post_meta($post_id, '_hearthstone_order_item_id', $item_id);
    }

    if (!$did_update_line_items && isset($_POST['hearthstone_order_quantity'])) {
        update_post_meta($post_id, '_hearthstone_order_quantity', $quantity);
    }

    update_post_meta($post_id, '_hearthstone_order_room_number', $room_number);
    update_post_meta($post_id, '_hearthstone_order_guest_name', $guest_name);
    update_post_meta($post_id, '_hearthstone_order_guest_phone', $guest_phone);
    update_post_meta(
        $post_id,
        '_hearthstone_order_total',
        $did_update_line_items ? $recalculated_order_total : $order_total
    );
    update_post_meta($post_id, '_hearthstone_order_status', $order_state);
}
add_action('save_post', 'hearthstone_ops_save_room_service_order_meta');

/**
 * Save gift shop order metadata.
 *
 * @param int $post_id Current post ID.
 */
function hearthstone_ops_save_gift_shop_order_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_gift_shop_order_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_gift_shop_order_nonce'])), 'hearthstone_ops_save_gift_shop_order')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'gift_shop_order') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $item_key     = isset($_POST['hearthstone_gift_item_key']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_gift_item_key'])) : '';
    $quantity     = isset($_POST['hearthstone_gift_quantity']) ? max(1, absint(wp_unslash($_POST['hearthstone_gift_quantity']))) : 1;
    $room_number  = isset($_POST['hearthstone_gift_room_number']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_gift_room_number'])) : '';
    $guest_name   = isset($_POST['hearthstone_gift_guest_name']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_gift_guest_name'])) : '';
    $guest_phone  = isset($_POST['hearthstone_gift_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_gift_guest_phone'])) : '';
    $order_total  = isset($_POST['hearthstone_gift_total']) ? hearthstone_ops_sanitize_decimal_amount((string) wp_unslash($_POST['hearthstone_gift_total'])) : '';
    $order_status = isset($_POST['hearthstone_gift_order_status']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_gift_order_status'])) : 'submitted';

    $allowed_states = ['submitted', 'picked', 'preparing', 'ready', 'completed', 'cancelled'];

    if (!in_array($order_status, $allowed_states, true)) {
        $order_status = 'submitted';
    }

    if (isset($_POST['hearthstone_gift_item_key'])) {
        update_post_meta($post_id, '_hearthstone_gift_item_key', $item_key);
    }

    if (isset($_POST['hearthstone_gift_quantity'])) {
        update_post_meta($post_id, '_hearthstone_gift_quantity', $quantity);
    }

    update_post_meta($post_id, '_hearthstone_gift_room_number', $room_number);
    update_post_meta($post_id, '_hearthstone_gift_guest_name', $guest_name);
    update_post_meta($post_id, '_hearthstone_gift_guest_phone', $guest_phone);
    update_post_meta($post_id, '_hearthstone_gift_total', $order_total);
    update_post_meta($post_id, '_hearthstone_gift_order_status', $order_status);
}
add_action('save_post', 'hearthstone_ops_save_gift_shop_order_meta');

/**
 * Save guest service request metadata.
 *
 * @param int $post_id Current post ID.
 */
function hearthstone_ops_save_service_request_meta(int $post_id): void
{
    if (!isset($_POST['hearthstone_ops_service_request_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hearthstone_ops_service_request_nonce'])), 'hearthstone_ops_save_service_request')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'guest_service_request') {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $category = isset($_POST['hearthstone_service_request_category']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_service_request_category'])) : 'front_desk';
    $priority = isset($_POST['hearthstone_service_request_priority']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_service_request_priority'])) : 'normal';
    $room     = isset($_POST['hearthstone_service_request_room']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_room'])) : '';
    $name     = isset($_POST['hearthstone_service_request_guest_name']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_guest_name'])) : '';
    $phone    = isset($_POST['hearthstone_service_request_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_guest_phone'])) : '';
    $status   = isset($_POST['hearthstone_service_request_status']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_service_request_status'])) : 'submitted';

    $allowed_categories = ['housekeeping', 'amenities', 'front_desk', 'maintenance', 'other'];
    $allowed_priorities = ['normal', 'urgent'];
    $allowed_statuses   = ['submitted', 'acknowledged', 'in_progress', 'completed', 'cancelled'];

    if (!in_array($category, $allowed_categories, true)) {
        $category = 'front_desk';
    }

    if (!in_array($priority, $allowed_priorities, true)) {
        $priority = 'normal';
    }

    if (!in_array($status, $allowed_statuses, true)) {
        $status = 'submitted';
    }

    update_post_meta($post_id, '_hearthstone_service_request_category', $category);
    update_post_meta($post_id, '_hearthstone_service_request_priority', $priority);
    update_post_meta($post_id, '_hearthstone_service_request_room', $room);
    update_post_meta($post_id, '_hearthstone_service_request_guest_name', $name);
    update_post_meta($post_id, '_hearthstone_service_request_guest_phone', $phone);
    update_post_meta($post_id, '_hearthstone_service_request_status', $status);
}
add_action('save_post', 'hearthstone_ops_save_service_request_meta');

/**
 * Customize guest admin columns.
 *
 * @param array $columns Existing columns.
 * @return array
 */
function hearthstone_ops_guest_columns(array $columns): array
{
    return [
        'cb'                  => $columns['cb'],
        'title'               => __('Guest', 'hearthstone-ops'),
        'guest_origin'        => __('Origin', 'hearthstone-ops'),
        'guest_email'         => __('Email', 'hearthstone-ops'),
        'guest_phone'         => __('Phone', 'hearthstone-ops'),
        'guest_marketing_src' => __('Source', 'hearthstone-ops'),
        'guest_vip'           => __('VIP', 'hearthstone-ops'),
        'date'                => $columns['date'],
    ];
}
add_filter('manage_guest_posts_columns', 'hearthstone_ops_guest_columns');

/**
 * Render guest admin column values.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function hearthstone_ops_render_guest_columns(string $column, int $post_id): void
{
    switch ($column) {
        case 'guest_origin':
            echo hearthstone_ops_is_sample_record($post_id)
                ? esc_html__('Sample', 'hearthstone-ops')
                : esc_html__('Persistent', 'hearthstone-ops');
            break;

        case 'guest_email':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_guest_email', true));
            break;

        case 'guest_phone':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_guest_phone', true));
            break;

        case 'guest_marketing_src':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_guest_marketing_source', true));
            break;

        case 'guest_vip':
            echo get_post_meta($post_id, '_hearthstone_guest_vip', true) === '1'
                ? esc_html__('Yes', 'hearthstone-ops')
                : esc_html__('N/A', 'hearthstone-ops');
            break;
    }
}
add_action('manage_guest_posts_custom_column', 'hearthstone_ops_render_guest_columns', 10, 2);

/**
 * Customize stay admin columns.
 *
 * @param array $columns Existing columns.
 * @return array
 */
function hearthstone_ops_stay_columns(array $columns): array
{
    return [
        'cb'           => $columns['cb'],
        'title'        => __('Stay', 'hearthstone-ops'),
        'stay_origin'  => __('Origin', 'hearthstone-ops'),
        'stay_guest'   => __('Guest', 'hearthstone-ops'),
        'stay_dates'   => __('Dates', 'hearthstone-ops'),
        'stay_contact' => __('Contact Ready', 'hearthstone-ops'),
        'stay_nights'  => __('Nights', 'hearthstone-ops'),
        'stay_status'  => __('Status', 'hearthstone-ops'),
        'stay_revenue' => __('Revenue', 'hearthstone-ops'),
        'date'         => $columns['date'],
    ];
}
add_filter('manage_stay_posts_columns', 'hearthstone_ops_stay_columns');

/**
 * Register sortable stay admin columns.
 *
 * @param array $sortable_columns Existing sortable columns.
 * @return array
 */
function hearthstone_ops_stay_sortable_columns(array $sortable_columns): array
{
    $sortable_columns['stay_nights']  = 'stay_nights';
    $sortable_columns['stay_revenue'] = 'stay_revenue';

    return $sortable_columns;
}
add_filter('manage_edit-stay_sortable_columns', 'hearthstone_ops_stay_sortable_columns');

/**
 * Render stay admin column values.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function hearthstone_ops_render_stay_columns(string $column, int $post_id): void
{
    switch ($column) {
        case 'stay_origin':
            echo hearthstone_ops_is_sample_record($post_id)
                ? esc_html__('Sample', 'hearthstone-ops')
                : esc_html__('Persistent', 'hearthstone-ops');
            break;

        case 'stay_guest':
            $guest_id = (int) get_post_meta($post_id, '_hearthstone_stay_guest_id', true);

            echo $guest_id ? esc_html(get_the_title($guest_id)) : esc_html__('N/A', 'hearthstone-ops');
            break;

        case 'stay_dates':
            $check_in  = (string) get_post_meta($post_id, '_hearthstone_stay_check_in', true);
            $check_out = (string) get_post_meta($post_id, '_hearthstone_stay_check_out', true);

            if ($check_in || $check_out) {
                echo esc_html(trim($check_in . ' -> ' . $check_out));
            } else {
                echo esc_html__('N/A', 'hearthstone-ops');
            }
            break;

        case 'stay_contact':
            $status   = (string) get_post_meta($post_id, '_hearthstone_stay_status', true);
            $check_in = (string) get_post_meta($post_id, '_hearthstone_stay_check_in', true);
            $guest_id = (int) get_post_meta($post_id, '_hearthstone_stay_guest_id', true);

            if ($status !== 'booked' || !hearthstone_ops_is_check_in_within_next_48h($check_in)) {
                echo esc_html__('N/A', 'hearthstone-ops');
                break;
            }

            echo hearthstone_ops_is_guest_contact_ready($guest_id)
                ? esc_html__('Ready', 'hearthstone-ops')
                : esc_html__('Gap', 'hearthstone-ops');
            break;

        case 'stay_nights':
            $nights = (int) get_post_meta($post_id, '_hearthstone_stay_nights', true);

            echo $nights > 0 ? esc_html((string) $nights) : esc_html__('N/A', 'hearthstone-ops');
            break;

        case 'stay_status':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_stay_status', true));
            break;

        case 'stay_revenue':
            $revenue = (string) get_post_meta($post_id, '_hearthstone_stay_revenue', true);

            echo $revenue !== '' ? esc_html('$' . $revenue) : esc_html__('N/A', 'hearthstone-ops');
            break;
    }
}
add_action('manage_stay_posts_custom_column', 'hearthstone_ops_render_stay_columns', 10, 2);

/**
 * Apply custom ordering for sortable stay admin columns.
 *
 * @param WP_Query $query The current query.
 */
function hearthstone_ops_apply_stay_sorting(WP_Query $query): void
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') !== 'stay') {
        return;
    }

    $orderby = $query->get('orderby');

    if ($orderby === 'stay_revenue') {
        $query->set('meta_key', '_hearthstone_stay_revenue');
        $query->set('orderby', 'meta_value_num');
    }

    if ($orderby === 'stay_nights') {
        $query->set('meta_key', '_hearthstone_stay_nights');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'hearthstone_ops_apply_stay_sorting');

/**
 * Register dashboard widgets.
 */
function hearthstone_ops_register_dashboard_widgets(): void
{
    wp_add_dashboard_widget(
        'hearthstone_ops_dashboard_summary',
        __('Hearthstone Ops Summary', 'hearthstone-ops'),
        'hearthstone_ops_render_dashboard_summary_widget'
    );
}
add_action('wp_dashboard_setup', 'hearthstone_ops_register_dashboard_widgets');

/**
 * Render the Hearthstone Ops dashboard summary widget.
 */
function hearthstone_ops_render_dashboard_summary_widget(): void
{
    $guest_counts = wp_count_posts('guest');
    $stay_counts  = wp_count_posts('stay');

    $guest_total = isset($guest_counts->publish) ? (int) $guest_counts->publish : 0;
    $stay_total  = isset($stay_counts->publish) ? (int) $stay_counts->publish : 0;

    $recent_guests = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $recent_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    ?>
    <div class="hearthstone-ops-dashboard-widget">
        <p>
            <strong><?php esc_html_e('Published Guests:', 'hearthstone-ops'); ?></strong>
            <?php echo esc_html((string) $guest_total); ?>
        </p>
        <p>
            <strong><?php esc_html_e('Published Stays:', 'hearthstone-ops'); ?></strong>
            <?php echo esc_html((string) $stay_total); ?>
        </p>

        <hr>

        <h4><?php esc_html_e('Recent Guests', 'hearthstone-ops'); ?></h4>
        <?php if (!empty($recent_guests)) : ?>
            <ul>
                <?php foreach ($recent_guests as $guest_post) : ?>
                    <li>
                        <a href="<?php echo esc_url(get_edit_post_link($guest_post->ID)); ?>">
                            <?php echo esc_html($guest_post->post_title); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p><?php esc_html_e('No guest records yet.', 'hearthstone-ops'); ?></p>
        <?php endif; ?>

        <h4><?php esc_html_e('Recent Stays', 'hearthstone-ops'); ?></h4>
        <?php if (!empty($recent_stays)) : ?>
            <ul>
                <?php foreach ($recent_stays as $stay_post) : ?>
                    <li>
                        <a href="<?php echo esc_url(get_edit_post_link($stay_post->ID)); ?>">
                            <?php echo esc_html($stay_post->post_title); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p><?php esc_html_e('No stay records yet.', 'hearthstone-ops'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Register the Hearthstone Ops overview page under Dashboard.
 */
function hearthstone_ops_register_admin_pages(): void
{
    add_dashboard_page(
        __('Hearthstone Ops Overview', 'hearthstone-ops'),
        __('Hearthstone Ops Overview', 'hearthstone-ops'),
        'edit_posts',
        'hearthstone-ops-overview',
        'hearthstone_ops_render_overview_page'
    );
}
add_action('admin_menu', 'hearthstone_ops_register_admin_pages');

/**
 * Build stay status counts from all stay records.
 *
 * @return array<string, int>
 */
function hearthstone_ops_get_stay_status_summary(): array
{
    $summary = [
        'lead'        => 0,
        'booked'      => 0,
        'checked_in'  => 0,
        'checked_out' => 0,
        'cancelled'   => 0,
    ];

    $stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    foreach ($stays as $stay_post) {
        $status = (string) get_post_meta($stay_post->ID, '_hearthstone_stay_status', true);

        if (array_key_exists($status, $summary)) {
            $summary[$status]++;
        }
    }

    return $summary;
}

/**
 * Build guest acquisition-source counts from all guest records.
 *
 * @return array<string, int>
 */
function hearthstone_ops_get_guest_source_summary(): array
{
    $summary = [
        'direct'   => 0,
        'google'   => 0,
        'referral' => 0,
        'social'   => 0,
        'repeat'   => 0,
        'unknown'  => 0,
    ];

    $guests = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    foreach ($guests as $guest_post) {
        $source = (string) get_post_meta($guest_post->ID, '_hearthstone_guest_marketing_source', true);

        if ($source === '') {
            $summary['unknown']++;
            continue;
        }

        if (array_key_exists($source, $summary)) {
            $summary[$source]++;
        }
    }

    return $summary;
}

/**
 * Convert internal stay status key to readable label.
 *
 * @param string $status Internal status key.
 * @return string
 */
function hearthstone_ops_format_stay_status_label(string $status): string
{
    $labels = [
        'lead'        => __('Lead', 'hearthstone-ops'),
        'booked'      => __('Booked', 'hearthstone-ops'),
        'checked_in'  => __('Checked In', 'hearthstone-ops'),
        'checked_out' => __('Checked Out', 'hearthstone-ops'),
        'cancelled'   => __('Cancelled', 'hearthstone-ops'),
    ];

    return $labels[$status] ?? $status;
}

/**
 * Convert internal guest source key to readable label.
 *
 * @param string $source Internal source key.
 * @return string
 */
function hearthstone_ops_format_guest_source_label(string $source): string
{
    $labels = [
        'direct'   => __('Direct', 'hearthstone-ops'),
        'google'   => __('Google Search', 'hearthstone-ops'),
        'referral' => __('Referral', 'hearthstone-ops'),
        'social'   => __('Social Media', 'hearthstone-ops'),
        'repeat'   => __('Repeat Guest', 'hearthstone-ops'),
        'unknown'  => __('Unknown / Not Set', 'hearthstone-ops'),
    ];

    return $labels[$source] ?? $source;
}

/**
 * Build pipeline-level KPIs from stay status counts.
 *
 * @param array<string, int> $stay_status_summary Status totals by key.
 * @return array<string, float|int|null>
 */
function hearthstone_ops_get_pipeline_metrics(array $stay_status_summary): array
{
    $lead_count            = (int) ($stay_status_summary['lead'] ?? 0);
    $booked_count          = (int) ($stay_status_summary['booked'] ?? 0);
    $checked_in_count      = (int) ($stay_status_summary['checked_in'] ?? 0);
    $checked_out_count     = (int) ($stay_status_summary['checked_out'] ?? 0);
    $cancelled_count       = (int) ($stay_status_summary['cancelled'] ?? 0);
    $total_stays_in_mix    = $lead_count + $booked_count + $checked_in_count + $checked_out_count + $cancelled_count;
    $booked_or_later_count = $booked_count + $checked_in_count + $checked_out_count;

    $booked_or_later_rate = $total_stays_in_mix > 0 ? ($booked_or_later_count / $total_stays_in_mix) * 100 : null;
    $cancellation_rate    = $total_stays_in_mix > 0 ? ($cancelled_count / $total_stays_in_mix) * 100 : null;
    $lead_backlog_rate    = $total_stays_in_mix > 0 ? ($lead_count / $total_stays_in_mix) * 100 : null;

    return [
        'total_stays_in_mix'    => $total_stays_in_mix,
        'booked_or_later_count' => $booked_or_later_count,
        'booked_or_later_rate'  => $booked_or_later_rate,
        'cancellation_rate'     => $cancellation_rate,
        'lead_backlog_rate'     => $lead_backlog_rate,
    ];
}

/**
 * Build prioritized operational recommendations for the overview dashboard.
 *
 * @param array<string, float|int|null> $pipeline_metrics Pipeline KPI values.
 * @param array<string, int>            $data_quality_metrics Data-quality counts.
 * @param array<string, int|float|null> $today_ops_metrics Same-day operational KPI values.
 * @param array<string, string>         $action_links Quick action URLs.
 * @return array<int, array<string, string>>
 */
function hearthstone_ops_get_operational_recommendations(
    array $pipeline_metrics,
    array $data_quality_metrics,
    array $today_ops_metrics,
    array $action_links
): array {
    $recommendations = [];
    $quality_issue_total = array_sum($data_quality_metrics);
    $lead_backlog_rate = isset($pipeline_metrics['lead_backlog_rate']) ? (float) $pipeline_metrics['lead_backlog_rate'] : 0.0;
    $cancellation_rate = isset($pipeline_metrics['cancellation_rate']) ? (float) $pipeline_metrics['cancellation_rate'] : 0.0;
    $booked_or_later_rate = isset($pipeline_metrics['booked_or_later_rate']) ? (float) $pipeline_metrics['booked_or_later_rate'] : 0.0;
    $total_stays_in_mix = isset($pipeline_metrics['total_stays_in_mix']) ? (int) $pipeline_metrics['total_stays_in_mix'] : 0;
    $arrival_contact_gap_count = isset($today_ops_metrics['arrival_contact_gaps_48h']) ? (int) $today_ops_metrics['arrival_contact_gaps_48h'] : 0;
    $arrivals_next_48h = isset($today_ops_metrics['arrivals_next_48h']) ? (int) $today_ops_metrics['arrivals_next_48h'] : 0;
    $guest_missing_contact_count = count(hearthstone_ops_get_guest_missing_contact_ids());
    $arrival_contact_ready_rate = isset($today_ops_metrics['arrival_contact_ready_rate_48h'])
        && $today_ops_metrics['arrival_contact_ready_rate_48h'] !== null
        ? (float) $today_ops_metrics['arrival_contact_ready_rate_48h']
        : null;

    if ($quality_issue_total > 0) {
        $recommendations[] = [
            'priority' => __('High', 'hearthstone-ops'),
            'title'    => __('Resolve data quality gaps', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: %d is the number of records needing data cleanup. */
                __('%d records are missing required guest/stay fields. Clean these first to improve reporting accuracy.', 'hearthstone-ops'),
                $quality_issue_total
            ),
            'link'     => $action_links['quality_guest_missing_contact'],
            'link_label' => __('Open quality queues', 'hearthstone-ops'),
        ];
    }

    if ($guest_missing_contact_count > 0) {
        $recommendations[] = [
            'priority' => __('High', 'hearthstone-ops'),
            'title'    => __('Close guest contact gaps', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: %d is number of guest profiles missing email or phone. */
                __('%d guest profiles are missing email or phone. Fix these to protect conversion and arrival comms.', 'hearthstone-ops'),
                $guest_missing_contact_count
            ),
            'link'     => $action_links['quality_guest_missing_contact'],
            'link_label' => __('Open missing-contact guests', 'hearthstone-ops'),
        ];
    }

    if ($lead_backlog_rate >= 35.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('High', 'hearthstone-ops'),
            'title'    => __('Reduce lead backlog', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 42.3%. */
                __('Lead backlog is %s of your stay pipeline. Prioritize follow-up and conversion workflows.', 'hearthstone-ops'),
                number_format($lead_backlog_rate, 1) . '%'
            ),
            'link'     => $action_links['lead_stays'],
            'link_label' => __('Open lead queue', 'hearthstone-ops'),
        ];
    }

    if ($cancellation_rate >= 20.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('Medium', 'hearthstone-ops'),
            'title'    => __('Investigate cancellation trend', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 23.0%. */
                __('Cancellation rate is %s. Review cancelled stays for policy, communication, or pricing issues.', 'hearthstone-ops'),
                number_format($cancellation_rate, 1) . '%'
            ),
            'link'     => $action_links['cancelled_stays'],
            'link_label' => __('Open cancelled queue', 'hearthstone-ops'),
        ];
    }

    if ($booked_or_later_rate < 60.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('Medium', 'hearthstone-ops'),
            'title'    => __('Improve booking conversion', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 55.4%. */
                __('Booked-or-later rate is %s. Focus on lead qualification and response speed.', 'hearthstone-ops'),
                number_format($booked_or_later_rate, 1) . '%'
            ),
            'link'     => $action_links['booked_stays'],
            'link_label' => __('Open booked queue', 'hearthstone-ops'),
        ];
    }

    if ($arrival_contact_gap_count > 0 && $arrivals_next_48h > 0) {
        $recommendations[] = [
            'priority' => __('High', 'hearthstone-ops'),
            'title'    => __('Fix near-term arrival contact readiness', 'hearthstone-ops'),
            'detail'   => sprintf(
                /* translators: 1: number of arrivals with contact gaps, 2: total booked arrivals in 48h, 3: readiness rate percentage. */
                __('%1$d of %2$d booked arrivals in the next 48 hours are missing contact readiness. Current readiness rate: %3$s.', 'hearthstone-ops'),
                $arrival_contact_gap_count,
                $arrivals_next_48h,
                $arrival_contact_ready_rate !== null ? number_format($arrival_contact_ready_rate, 1) . '%' : __('N/A', 'hearthstone-ops')
            ),
            'link'     => $action_links['today_arrival_contact_gaps_48h'],
            'link_label' => __('Open contact-gap queue', 'hearthstone-ops'),
        ];
    }

    if (empty($recommendations)) {
        $recommendations[] = [
            'priority' => __('On Track', 'hearthstone-ops'),
            'title'    => __('No urgent operational alerts', 'hearthstone-ops'),
            'detail'   => __('Current metrics look stable. Keep logging complete stay and guest data to preserve accuracy.', 'hearthstone-ops'),
            'link'     => $action_links['view_stays'],
            'link_label' => __('Review stays', 'hearthstone-ops'),
        ];
    }

    return array_slice($recommendations, 0, 3);
}

/**
 * Build quick action URLs for the overview page.
 *
 * @return array<string, string>
 */
function hearthstone_ops_get_overview_action_links(): array
{
    $guest_list_url = admin_url('edit.php?post_type=guest');
    $stay_list_url  = admin_url('edit.php?post_type=stay');
    $home_page      = get_page_by_path('home');
    $dining_page    = get_page_by_path('dining');
    $gift_shop_page = get_page_by_path('gift-shop');
    $service_page   = get_page_by_path('service-requests');

    $app_home_url = $home_page instanceof WP_Post
        ? (string) get_permalink($home_page)
        : (string) home_url('/home/');
    $dining_url = $dining_page instanceof WP_Post
        ? (string) get_permalink($dining_page)
        : (string) home_url('/dining/');
    $gift_shop_url = $gift_shop_page instanceof WP_Post
        ? (string) get_permalink($gift_shop_page)
        : (string) home_url('/gift-shop/');
    $service_requests_url = $service_page instanceof WP_Post
        ? (string) get_permalink($service_page)
        : (string) home_url('/service-requests/');

    return [
        'add_guest'        => admin_url('post-new.php?post_type=guest'),
        'add_stay'         => admin_url('post-new.php?post_type=stay'),
        'view_guests'      => $guest_list_url,
        'view_stays'       => $stay_list_url,
        'sample_guests'    => add_query_arg('hearthstone_data_origin', 'sample', $guest_list_url),
        'persistent_guests' => add_query_arg('hearthstone_data_origin', 'persistent', $guest_list_url),
        'sample_stays'     => add_query_arg('hearthstone_data_origin', 'sample', $stay_list_url),
        'persistent_stays' => add_query_arg('hearthstone_data_origin', 'persistent', $stay_list_url),
        'lead_stays'       => add_query_arg('hearthstone_stay_status_filter', 'lead', $stay_list_url),
        'booked_stays'     => add_query_arg('hearthstone_stay_status_filter', 'booked', $stay_list_url),
        'checked_in_stays' => add_query_arg('hearthstone_stay_status_filter', 'checked_in', $stay_list_url),
        'checked_out_stays' => add_query_arg('hearthstone_stay_status_filter', 'checked_out', $stay_list_url),
        'cancelled_stays'  => add_query_arg('hearthstone_stay_status_filter', 'cancelled', $stay_list_url),
        'today_arrivals'   => add_query_arg('hearthstone_stay_today', 'arrivals', $stay_list_url),
        'today_departures' => add_query_arg('hearthstone_stay_today', 'departures', $stay_list_url),
        'today_in_house'   => add_query_arg('hearthstone_stay_today', 'in_house', $stay_list_url),
        'today_pending_check_ins' => add_query_arg([
            'hearthstone_stay_today'         => 'arrivals',
            'hearthstone_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_pending_check_outs' => add_query_arg([
            'hearthstone_stay_today'         => 'departures',
            'hearthstone_stay_status_filter' => 'checked_in',
        ], $stay_list_url),
        'today_overdue_arrivals' => add_query_arg([
            'hearthstone_stay_today'         => 'overdue_arrivals',
            'hearthstone_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrivals_next_48h' => add_query_arg([
            'hearthstone_stay_today'         => 'arrivals_next_48h',
            'hearthstone_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrival_contact_ready_48h' => add_query_arg([
            'hearthstone_stay_today'         => 'arrivals_contact_ready',
            'hearthstone_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrival_contact_gaps_48h' => add_query_arg([
            'hearthstone_stay_today'         => 'arrivals_contact_gap',
            'hearthstone_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'google_guests'    => add_query_arg('hearthstone_guest_source', 'google', $guest_list_url),
        'repeat_guests'    => add_query_arg('hearthstone_guest_source', 'repeat', $guest_list_url),
        'missing_contact_guests' => add_query_arg('hearthstone_guest_quality', 'missing_contact', $guest_list_url),
        'quality_guest_missing_contact'   => add_query_arg('hearthstone_guest_quality', 'missing_contact', $guest_list_url),
        'quality_guest_missing_email'     => add_query_arg('hearthstone_guest_quality', 'missing_email', $guest_list_url),
        'quality_guest_missing_phone'     => add_query_arg('hearthstone_guest_quality', 'missing_phone', $guest_list_url),
        'quality_guest_missing_consent'   => add_query_arg('hearthstone_guest_quality', 'missing_consent', $guest_list_url),
        'quality_stay_missing_guest_link' => add_query_arg('hearthstone_stay_quality', 'missing_guest_link', $stay_list_url),
        'quality_stay_missing_dates'      => add_query_arg('hearthstone_stay_quality', 'missing_dates', $stay_list_url),
        'quality_stay_invalid_dates'      => add_query_arg('hearthstone_stay_quality', 'invalid_date_range', $stay_list_url),
        'quality_stay_missing_revenue'    => add_query_arg('hearthstone_stay_quality', 'missing_revenue', $stay_list_url),
        'app_home'         => $app_home_url,
        'dining_pos'       => $dining_url,
        'gift_shop_pos'    => $gift_shop_url,
        'service_requests' => $service_requests_url,
    ];
}

/**
 * Build room-service order performance metrics.
 *
 * @return array<string, int|float>
 */
function hearthstone_ops_get_room_service_order_metrics(): array
{
    $order_ids = get_posts([
        'post_type'      => 'room_service_order',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    if (!is_array($order_ids)) {
        return [
            'total_orders'     => 0,
            'open_orders'      => 0,
            'completed_orders' => 0,
            'gross_revenue'    => 0.0,
        ];
    }

    $open_statuses = ['submitted', 'confirmed', 'in_kitchen', 'ready', 'delivering'];
    $open_orders = 0;
    $completed_orders = 0;
    $gross_revenue = 0.0;

    foreach ($order_ids as $order_id_raw) {
        $order_id = (int) $order_id_raw;
        $order_status = (string) get_post_meta($order_id, '_hearthstone_order_status', true);
        $order_total = (string) get_post_meta($order_id, '_hearthstone_order_total', true);
        $gross_revenue += (float) $order_total;

        if (in_array($order_status, $open_statuses, true)) {
            $open_orders++;
        }

        if ($order_status === 'completed') {
            $completed_orders++;
        }
    }

    return [
        'total_orders'     => count($order_ids),
        'open_orders'      => $open_orders,
        'completed_orders' => $completed_orders,
        'gross_revenue'    => $gross_revenue,
    ];
}

/**
 * Render room service menu item details.
 *
 * @param WP_Post $post Current menu item post.
 */
function hearthstone_ops_render_room_service_item_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_room_service_item', 'hearthstone_ops_room_service_item_nonce');

    $price        = (string) get_post_meta($post->ID, '_hearthstone_room_service_price', true);
    $prep_minutes = (int) get_post_meta($post->ID, '_hearthstone_room_service_prep_minutes', true);
    $is_available = (string) get_post_meta($post->ID, '_hearthstone_room_service_available', true);
    $image_url    = (string) get_post_meta($post->ID, '_hearthstone_room_service_image_url', true);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="hearthstone_room_service_price"><?php esc_html_e('Price', 'hearthstone-ops'); ?></label></th>
                <td>
                    <input type="text" id="hearthstone_room_service_price" name="hearthstone_room_service_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="44.00">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_room_service_prep_minutes"><?php esc_html_e('Prep Time (minutes)', 'hearthstone-ops'); ?></label></th>
                <td>
                    <input type="number" id="hearthstone_room_service_prep_minutes" name="hearthstone_room_service_prep_minutes" min="0" step="1" value="<?php echo esc_attr((string) $prep_minutes); ?>" class="small-text">
                </td>
            </tr>
            <tr>
                <th scope="row"><?php esc_html_e('Availability', 'hearthstone-ops'); ?></th>
                <td>
                    <label>
                        <input type="checkbox" name="hearthstone_room_service_available" value="1" <?php checked($is_available, '1'); ?>>
                        <?php esc_html_e('Available to order', 'hearthstone-ops'); ?>
                    </label>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_room_service_image_url"><?php esc_html_e('Card Image URL', 'hearthstone-ops'); ?></label></th>
                <td>
                    <input type="url" id="hearthstone_room_service_image_url" name="hearthstone_room_service_image_url" value="<?php echo esc_attr($image_url); ?>" class="regular-text" placeholder="https://images.pexels.com/...">
                    <p class="description"><?php esc_html_e('Optional: use a stock photo or uploaded media URL for a more presentable guest menu.', 'hearthstone-ops'); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Render room service order details.
 *
 * @param WP_Post $post Current order post.
 */
function hearthstone_ops_render_room_service_order_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_room_service_order', 'hearthstone_ops_room_service_order_nonce');

    $item_id     = (int) get_post_meta($post->ID, '_hearthstone_order_item_id', true);
    $quantity    = (int) get_post_meta($post->ID, '_hearthstone_order_quantity', true);
    $room_number = (string) get_post_meta($post->ID, '_hearthstone_order_room_number', true);
    $guest_name  = (string) get_post_meta($post->ID, '_hearthstone_order_guest_name', true);
    $guest_phone = (string) get_post_meta($post->ID, '_hearthstone_order_guest_phone', true);
    $order_total = (string) get_post_meta($post->ID, '_hearthstone_order_total', true);
    $order_state = (string) get_post_meta($post->ID, '_hearthstone_order_status', true);
    $line_items  = hearthstone_ops_get_room_service_order_line_items((int) $post->ID);
    $editable_states = ['submitted', 'confirmed'];
    $can_edit_line_items = in_array($order_state, $editable_states, true);
    $line_item_quantities = [];
    $item_options = get_posts([
        'post_type'      => 'room_service_item',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    if ($quantity <= 0) {
        $quantity = 1;
    }

    foreach ($line_items as $line_item) {
        $line_item_id = isset($line_item['item_id']) ? (int) $line_item['item_id'] : 0;
        $line_item_qty = isset($line_item['qty']) ? max(0, (int) $line_item['qty']) : 0;

        if ($line_item_id <= 0 || $line_item_qty <= 0) {
            continue;
        }

        $line_item_quantities[$line_item_id] = $line_item_qty;
    }
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <?php if (!empty($line_items)) : ?>
                <?php if ($can_edit_line_items) : ?>
                    <tr>
                        <th scope="row"><?php esc_html_e('Line Items', 'hearthstone-ops'); ?></th>
                        <td>
                            <table style="width:100%;max-width:620px;border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th style="text-align:left;padding:8px 10px;border-bottom:1px solid #dcdcde;"><?php esc_html_e('Item', 'hearthstone-ops'); ?></th>
                                        <th style="text-align:right;padding:8px 10px;border-bottom:1px solid #dcdcde;"><?php esc_html_e('Qty', 'hearthstone-ops'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($item_options as $item_post) : ?>
                                        <?php
                                        $option_item_id = (int) $item_post->ID;
                                        $option_qty = isset($line_item_quantities[$option_item_id]) ? (int) $line_item_quantities[$option_item_id] : 0;
                                        ?>
                                        <tr>
                                            <td style="padding:8px 10px;border-bottom:1px solid #f0f0f1;">
                                                <?php echo esc_html((string) $item_post->post_title); ?>
                                            </td>
                                            <td style="padding:8px 10px;border-bottom:1px solid #f0f0f1;text-align:right;">
                                                <input
                                                    type="number"
                                                    name="hearthstone_order_item_qty[<?php echo esc_attr((string) $option_item_id); ?>]"
                                                    min="0"
                                                    step="1"
                                                    value="<?php echo esc_attr((string) $option_qty); ?>"
                                                    class="small-text"
                                                >
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p class="description"><?php esc_html_e('You can edit items while status is Submitted or Confirmed. Set quantity to 0 to remove an item.', 'hearthstone-ops'); ?></p>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <th scope="row"><?php esc_html_e('Line Items', 'hearthstone-ops'); ?></th>
                        <td>
                            <ul style="margin:0;padding-left:18px;">
                                <?php foreach ($line_items as $line_item) : ?>
                                    <li>
                                        <?php
                                        echo esc_html(
                                            sprintf(
                                                /* translators: 1: menu item title, 2: quantity */
                                                __('%1$s x%2$d', 'hearthstone-ops'),
                                                $line_item['title'],
                                                $line_item['qty']
                                            )
                                        );
                                        ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="description"><?php esc_html_e('Line items lock once kitchen preparation starts.', 'hearthstone-ops'); ?></p>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php else : ?>
                <tr>
                    <th scope="row"><label for="hearthstone_order_item_id"><?php esc_html_e('Menu Item', 'hearthstone-ops'); ?></label></th>
                    <td>
                        <select id="hearthstone_order_item_id" name="hearthstone_order_item_id">
                            <option value="0"><?php esc_html_e('Select item', 'hearthstone-ops'); ?></option>
                            <?php foreach ($item_options as $item_post) : ?>
                                <option value="<?php echo esc_attr((string) $item_post->ID); ?>" <?php selected($item_id, (int) $item_post->ID); ?>>
                                    <?php echo esc_html($item_post->post_title); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description"><?php esc_html_e('Legacy fallback: use only if this order has no line-item cart data.', 'hearthstone-ops'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hearthstone_order_quantity"><?php esc_html_e('Quantity', 'hearthstone-ops'); ?></label></th>
                    <td><input type="number" id="hearthstone_order_quantity" name="hearthstone_order_quantity" min="1" step="1" value="<?php echo esc_attr((string) $quantity); ?>" class="small-text"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row"><label for="hearthstone_order_room_number"><?php esc_html_e('Room Number', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_order_room_number" name="hearthstone_order_room_number" value="<?php echo esc_attr($room_number); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_order_guest_name"><?php esc_html_e('Guest Name', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_order_guest_name" name="hearthstone_order_guest_name" value="<?php echo esc_attr($guest_name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_order_guest_phone"><?php esc_html_e('Guest Phone', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_order_guest_phone" name="hearthstone_order_guest_phone" value="<?php echo esc_attr($guest_phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_order_total"><?php esc_html_e('Order Total', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_order_total" name="hearthstone_order_total" value="<?php echo esc_attr($order_total); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_order_status"><?php esc_html_e('Order Status', 'hearthstone-ops'); ?></label></th>
                <td>
                    <select id="hearthstone_order_status" name="hearthstone_order_status">
                        <option value="submitted" <?php selected($order_state, 'submitted'); ?>><?php esc_html_e('Submitted', 'hearthstone-ops'); ?></option>
                        <option value="confirmed" <?php selected($order_state, 'confirmed'); ?>><?php esc_html_e('Confirmed', 'hearthstone-ops'); ?></option>
                        <option value="in_kitchen" <?php selected($order_state, 'in_kitchen'); ?>><?php esc_html_e('In Kitchen', 'hearthstone-ops'); ?></option>
                        <option value="ready" <?php selected($order_state, 'ready'); ?>><?php esc_html_e('Ready', 'hearthstone-ops'); ?></option>
                        <option value="delivering" <?php selected($order_state, 'delivering'); ?>><?php esc_html_e('Delivering', 'hearthstone-ops'); ?></option>
                        <option value="completed" <?php selected($order_state, 'completed'); ?>><?php esc_html_e('Completed', 'hearthstone-ops'); ?></option>
                        <option value="cancelled" <?php selected($order_state, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Render gift shop order details.
 *
 * @param WP_Post $post Current gift order post.
 */
function hearthstone_ops_render_gift_shop_order_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_gift_shop_order', 'hearthstone_ops_gift_shop_order_nonce');

    $item_key     = (string) get_post_meta($post->ID, '_hearthstone_gift_item_key', true);
    $quantity     = (int) get_post_meta($post->ID, '_hearthstone_gift_quantity', true);
    $room_number  = (string) get_post_meta($post->ID, '_hearthstone_gift_room_number', true);
    $guest_name   = (string) get_post_meta($post->ID, '_hearthstone_gift_guest_name', true);
    $guest_phone  = (string) get_post_meta($post->ID, '_hearthstone_gift_guest_phone', true);
    $order_total  = (string) get_post_meta($post->ID, '_hearthstone_gift_total', true);
    $order_status = (string) get_post_meta($post->ID, '_hearthstone_gift_order_status', true);
    $line_items   = hearthstone_ops_get_gift_shop_order_line_items((int) $post->ID);

    if ($quantity <= 0) {
        $quantity = 1;
    }
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <?php if (!empty($line_items)) : ?>
                <tr>
                    <th scope="row"><?php esc_html_e('Line Items', 'hearthstone-ops'); ?></th>
                    <td>
                        <ul style="margin:0;padding-left:18px;">
                            <?php foreach ($line_items as $line_item) : ?>
                                <li>
                                    <?php
                                    echo esc_html(
                                        sprintf(
                                            /* translators: 1: catalog item title, 2: quantity */
                                            __('%1$s x%2$d', 'hearthstone-ops'),
                                            $line_item['label'],
                                            $line_item['qty']
                                        )
                                    );
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e('Quantity', 'hearthstone-ops'); ?></th>
                    <td>
                        <?php
                        $total_line_qty = 0;

                        foreach ($line_items as $line_item) {
                            $total_line_qty += (int) $line_item['qty'];
                        }

                        echo esc_html((string) $total_line_qty);
                        ?>
                    </td>
                </tr>
            <?php else : ?>
                <tr>
                    <th scope="row"><label for="hearthstone_gift_item_key"><?php esc_html_e('Catalog Item Key', 'hearthstone-ops'); ?></label></th>
                    <td>
                        <input type="text" id="hearthstone_gift_item_key" name="hearthstone_gift_item_key" value="<?php echo esc_attr($item_key); ?>" class="regular-text">
                        <p class="description"><?php esc_html_e('Legacy fallback: use only if this order has no line-item cart data.', 'hearthstone-ops'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hearthstone_gift_quantity"><?php esc_html_e('Quantity', 'hearthstone-ops'); ?></label></th>
                    <td><input type="number" id="hearthstone_gift_quantity" name="hearthstone_gift_quantity" min="1" step="1" value="<?php echo esc_attr((string) $quantity); ?>" class="small-text"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row"><label for="hearthstone_gift_room_number"><?php esc_html_e('Room Number', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_gift_room_number" name="hearthstone_gift_room_number" value="<?php echo esc_attr($room_number); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_gift_guest_name"><?php esc_html_e('Guest Name', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_gift_guest_name" name="hearthstone_gift_guest_name" value="<?php echo esc_attr($guest_name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_gift_guest_phone"><?php esc_html_e('Guest Phone', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_gift_guest_phone" name="hearthstone_gift_guest_phone" value="<?php echo esc_attr($guest_phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_gift_total"><?php esc_html_e('Order Total', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_gift_total" name="hearthstone_gift_total" value="<?php echo esc_attr($order_total); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_gift_order_status"><?php esc_html_e('Order Status', 'hearthstone-ops'); ?></label></th>
                <td>
                    <select id="hearthstone_gift_order_status" name="hearthstone_gift_order_status">
                        <option value="submitted" <?php selected($order_status, 'submitted'); ?>><?php esc_html_e('Submitted', 'hearthstone-ops'); ?></option>
                        <option value="picked" <?php selected($order_status, 'picked'); ?>><?php esc_html_e('Picked', 'hearthstone-ops'); ?></option>
                        <option value="preparing" <?php selected($order_status, 'preparing'); ?>><?php esc_html_e('Preparing', 'hearthstone-ops'); ?></option>
                        <option value="ready" <?php selected($order_status, 'ready'); ?>><?php esc_html_e('Ready', 'hearthstone-ops'); ?></option>
                        <option value="completed" <?php selected($order_status, 'completed'); ?>><?php esc_html_e('Completed', 'hearthstone-ops'); ?></option>
                        <option value="cancelled" <?php selected($order_status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Render guest service request details.
 *
 * @param WP_Post $post Current request post.
 */
function hearthstone_ops_render_service_request_meta_box(WP_Post $post): void
{
    wp_nonce_field('hearthstone_ops_save_service_request', 'hearthstone_ops_service_request_nonce');

    $category = (string) get_post_meta($post->ID, '_hearthstone_service_request_category', true);
    $priority = (string) get_post_meta($post->ID, '_hearthstone_service_request_priority', true);
    $room     = (string) get_post_meta($post->ID, '_hearthstone_service_request_room', true);
    $name     = (string) get_post_meta($post->ID, '_hearthstone_service_request_guest_name', true);
    $phone    = (string) get_post_meta($post->ID, '_hearthstone_service_request_guest_phone', true);
    $status   = (string) get_post_meta($post->ID, '_hearthstone_service_request_status', true);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_category"><?php esc_html_e('Category', 'hearthstone-ops'); ?></label></th>
                <td>
                    <select id="hearthstone_service_request_category" name="hearthstone_service_request_category">
                        <option value="housekeeping" <?php selected($category, 'housekeeping'); ?>><?php esc_html_e('Housekeeping', 'hearthstone-ops'); ?></option>
                        <option value="amenities" <?php selected($category, 'amenities'); ?>><?php esc_html_e('Amenities', 'hearthstone-ops'); ?></option>
                        <option value="front_desk" <?php selected($category, 'front_desk'); ?>><?php esc_html_e('Front Desk', 'hearthstone-ops'); ?></option>
                        <option value="maintenance" <?php selected($category, 'maintenance'); ?>><?php esc_html_e('Maintenance', 'hearthstone-ops'); ?></option>
                        <option value="other" <?php selected($category, 'other'); ?>><?php esc_html_e('Other', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_priority"><?php esc_html_e('Priority', 'hearthstone-ops'); ?></label></th>
                <td>
                    <select id="hearthstone_service_request_priority" name="hearthstone_service_request_priority">
                        <option value="normal" <?php selected($priority, 'normal'); ?>><?php esc_html_e('Normal', 'hearthstone-ops'); ?></option>
                        <option value="urgent" <?php selected($priority, 'urgent'); ?>><?php esc_html_e('Urgent', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_room"><?php esc_html_e('Room Number', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_service_request_room" name="hearthstone_service_request_room" value="<?php echo esc_attr($room); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_guest_name"><?php esc_html_e('Guest Name', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_service_request_guest_name" name="hearthstone_service_request_guest_name" value="<?php echo esc_attr($name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_guest_phone"><?php esc_html_e('Guest Phone', 'hearthstone-ops'); ?></label></th>
                <td><input type="text" id="hearthstone_service_request_guest_phone" name="hearthstone_service_request_guest_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="hearthstone_service_request_status"><?php esc_html_e('Status', 'hearthstone-ops'); ?></label></th>
                <td>
                    <select id="hearthstone_service_request_status" name="hearthstone_service_request_status">
                        <option value="submitted" <?php selected($status, 'submitted'); ?>><?php esc_html_e('Submitted', 'hearthstone-ops'); ?></option>
                        <option value="acknowledged" <?php selected($status, 'acknowledged'); ?>><?php esc_html_e('Acknowledged', 'hearthstone-ops'); ?></option>
                        <option value="in_progress" <?php selected($status, 'in_progress'); ?>><?php esc_html_e('In Progress', 'hearthstone-ops'); ?></option>
                        <option value="completed" <?php selected($status, 'completed'); ?>><?php esc_html_e('Completed', 'hearthstone-ops'); ?></option>
                        <option value="cancelled" <?php selected($status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'hearthstone-ops'); ?></option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

/**
 * Return supported sample demo scenario labels.
 *
 * @return array<string, string>
 */
function hearthstone_ops_get_demo_scenario_labels(): array
{
    return [
        'balanced'     => __('Balanced Demo', 'hearthstone-ops'),
        'booking_rush' => __('Booking Rush', 'hearthstone-ops'),
        'data_cleanup' => __('Data Cleanup Drill', 'hearthstone-ops'),
    ];
}

/**
 * Resolve and validate a sample demo scenario key.
 *
 * @param string $raw_scenario Scenario key from user input.
 */
function hearthstone_ops_resolve_demo_scenario(string $raw_scenario): string
{
    $scenario = sanitize_key($raw_scenario);
    $labels   = hearthstone_ops_get_demo_scenario_labels();

    if (!isset($labels[$scenario])) {
        return 'balanced';
    }

    return $scenario;
}

/**
 * Return all sample data post IDs across guest and stay records.
 *
 * @return array<int, int>
 */
function hearthstone_ops_get_sample_data_post_ids(): array
{
    $sample_post_ids = get_posts([
        'post_type'      => ['guest', 'stay'],
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_hearthstone_ops_sample_data',
                'value' => '1',
            ],
        ],
    ]);

    return array_map('intval', $sample_post_ids);
}

/**
 * Return sample data counts by post type.
 *
 * @return array<string, int>
 */
function hearthstone_ops_get_sample_data_counts(): array
{
    $counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (hearthstone_ops_get_sample_data_post_ids() as $sample_post_id) {
        $post_type = get_post_type($sample_post_id);

        if ($post_type === 'guest') {
            $counts['guest']++;
        } elseif ($post_type === 'stay') {
            $counts['stay']++;
        }
    }

    $counts['total'] = $counts['guest'] + $counts['stay'];

    return $counts;
}

/**
 * Delete all sample data records and return deletion counts.
 *
 * @return array<string, int>
 */
function hearthstone_ops_delete_sample_data_posts(): array
{
    $deleted_counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (hearthstone_ops_get_sample_data_post_ids() as $sample_post_id) {
        $post_type = get_post_type($sample_post_id);
        $deleted   = wp_delete_post($sample_post_id, true);

        if ($deleted === false) {
            continue;
        }

        if ($post_type === 'guest') {
            $deleted_counts['guest']++;
        } elseif ($post_type === 'stay') {
            $deleted_counts['stay']++;
        }
    }

    $deleted_counts['total'] = $deleted_counts['guest'] + $deleted_counts['stay'];

    return $deleted_counts;
}

/**
 * Convert sample data records into persistent records.
 *
 * @return array<string, int>
 */
function hearthstone_ops_promote_sample_data_posts(): array
{
    $promoted_counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (hearthstone_ops_get_sample_data_post_ids() as $sample_post_id) {
        $sample_post_id = (int) $sample_post_id;
        $post_type      = get_post_type($sample_post_id);
        $deleted_meta   = delete_post_meta($sample_post_id, '_hearthstone_ops_sample_data');

        if (!$deleted_meta) {
            continue;
        }

        if ($post_type === 'guest') {
            $promoted_counts['guest']++;
        } elseif ($post_type === 'stay') {
            $promoted_counts['stay']++;
        }
    }

    $promoted_counts['total'] = $promoted_counts['guest'] + $promoted_counts['stay'];

    return $promoted_counts;
}

/**
 * Render the Hearthstone Ops overview dashboard page.
 */
function hearthstone_ops_render_overview_page(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to access this page.', 'hearthstone-ops'));
    }

    $guest_counts = wp_count_posts('guest');
    $stay_counts  = wp_count_posts('stay');

    $guest_total = isset($guest_counts->publish) ? (int) $guest_counts->publish : 0;
    $stay_total  = isset($stay_counts->publish) ? (int) $stay_counts->publish : 0;

    $notice_key     = isset($_GET['hearthstone_ops_notice']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_ops_notice'])) : '';
    $notice_scenario = isset($_GET['hearthstone_ops_demo_scenario'])
        ? hearthstone_ops_resolve_demo_scenario((string) wp_unslash($_GET['hearthstone_ops_demo_scenario']))
        : 'balanced';
    $notice_nights_updated = isset($_GET['hearthstone_ops_nights_updated'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_nights_updated'])))
        : 0;
    $notice_nights_cleared = isset($_GET['hearthstone_ops_nights_cleared'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_nights_cleared'])))
        : 0;
    $notice_nights_unchanged = isset($_GET['hearthstone_ops_nights_unchanged'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_nights_unchanged'])))
        : 0;
    $notice_nights_scanned = isset($_GET['hearthstone_ops_nights_scanned'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_nights_scanned'])))
        : 0;
    $notice_promoted_guest_count = isset($_GET['hearthstone_ops_promoted_guest_count'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_promoted_guest_count'])))
        : 0;
    $notice_promoted_stay_count = isset($_GET['hearthstone_ops_promoted_stay_count'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_promoted_stay_count'])))
        : 0;
    $notice_phone_updated = isset($_GET['hearthstone_ops_phone_updated'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_phone_updated'])))
        : 0;
    $notice_phone_unchanged = isset($_GET['hearthstone_ops_phone_unchanged'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_phone_unchanged'])))
        : 0;
    $notice_phone_scanned = isset($_GET['hearthstone_ops_phone_scanned'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['hearthstone_ops_phone_scanned'])))
        : 0;
    $notice_checkout_target = isset($_GET['hearthstone_ops_checkout_target'])
        ? sanitize_key((string) wp_unslash($_GET['hearthstone_ops_checkout_target']))
        : '';
    $notice_checkout_enabled = isset($_GET['hearthstone_ops_checkout_enabled'])
        ? sanitize_key((string) wp_unslash($_GET['hearthstone_ops_checkout_enabled']))
        : '';
    $seeded_guest_login = get_transient('hearthstone_ops_seeded_guest_login');
    $seeded_guest_room = '';
    $seeded_guest_code = '';

    if (
        is_array($seeded_guest_login)
        && isset($seeded_guest_login['room'], $seeded_guest_login['code'])
    ) {
        $seeded_guest_room = strtoupper(trim((string) $seeded_guest_login['room']));
        $seeded_guest_code = trim((string) $seeded_guest_login['code']);
    }

    if ($seeded_guest_room !== '' && $seeded_guest_code !== '') {
        delete_transient('hearthstone_ops_seeded_guest_login');
    }

    $scenario_labels = hearthstone_ops_get_demo_scenario_labels();
    $seed_notice_messages = [
        'sample_data_seeded' => [
            'message' => __('Sample guest and stay data has been generated for the demo.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_regenerated' => [
            'message' => __('Sample data has been regenerated and existing sample records were replaced.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_exists' => [
            'message' => __('Sample data already exists. Use regenerate if you want a clean reset of demo records.', 'hearthstone-ops'),
            'type'    => 'notice-warning',
        ],
        'sample_data_cleared' => [
            'message' => __('Sample data was cleared from guests and stays.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_none' => [
            'message' => __('No sample data records were found to clear.', 'hearthstone-ops'),
            'type'    => 'notice-info',
        ],
        'sample_data_promoted' => [
            'message' => __('Sample records are now persistent and will no longer be deleted by regenerate.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_promote_none' => [
            'message' => __('No sample records were available to convert.', 'hearthstone-ops'),
            'type'    => 'notice-info',
        ],
        'stay_nights_rebuilt' => [
            'message' => __('Stay nights were recalculated from current check-in/check-out dates.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'guest_phones_normalized' => [
            'message' => __('Guest phone values were normalized for consistent display format.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'wc_checkout_toggle_updated' => [
            'message' => __('Card-checkout availability was updated.', 'hearthstone-ops'),
            'type'    => 'notice-success',
        ],
        'wc_checkout_toggle_invalid' => [
            'message' => __('Card-checkout update could not be applied due to an invalid target.', 'hearthstone-ops'),
            'type'    => 'notice-error',
        ],
    ];

    $recent_guests = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $recent_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $stay_status_summary    = hearthstone_ops_get_stay_status_summary();
    $guest_source_summary   = hearthstone_ops_get_guest_source_summary();
    $pipeline_metrics       = hearthstone_ops_get_pipeline_metrics($stay_status_summary);
    $action_links           = hearthstone_ops_get_overview_action_links();
    $rollup_metrics         = hearthstone_ops_get_stay_rollup_metrics();
    $data_quality_metrics   = hearthstone_ops_get_data_quality_metrics();
    $today_ops_metrics      = hearthstone_ops_get_today_operations_metrics();
    $recommendations        = hearthstone_ops_get_operational_recommendations($pipeline_metrics, $data_quality_metrics, $today_ops_metrics, $action_links);
    $quality_issue_total    = array_sum($data_quality_metrics);
    $average_revenue        = $rollup_metrics['average_revenue'];
    $average_revenue_night  = $rollup_metrics['average_revenue_per_night'];
    $checked_in_total       = (int) ($stay_status_summary['checked_in'] ?? 0);
    $booked_total           = (int) ($stay_status_summary['booked'] ?? 0);
    $room_service_metrics   = hearthstone_ops_get_room_service_order_metrics();
    $wc_checkout_readiness  = hearthstone_ops_get_wc_checkout_readiness();
    $sample_data_counts     = hearthstone_ops_get_sample_data_counts();
    $persistent_guest_count = max(0, $guest_total - (int) $sample_data_counts['guest']);
    $persistent_stay_count  = max(0, $stay_total - (int) $sample_data_counts['stay']);
    $upcoming_arrivals      = hearthstone_ops_get_upcoming_arrivals(14, 8);
    $seed_url               = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_seed_sample_data'),
        'hearthstone_ops_seed_sample_data_action',
        'hearthstone_ops_seed_sample_data_nonce'
    );
    $seed_force_url = add_query_arg('hearthstone_ops_force_sample_data', '1', $seed_url);
    $seed_booking_rush_url = add_query_arg([
        'hearthstone_ops_force_sample_data' => '1',
        'hearthstone_ops_demo_scenario'     => 'booking_rush',
    ], $seed_url);
    $seed_data_cleanup_url = add_query_arg([
        'hearthstone_ops_force_sample_data' => '1',
        'hearthstone_ops_demo_scenario'     => 'data_cleanup',
    ], $seed_url);
    $clear_seed_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_clear_sample_data'),
        'hearthstone_ops_clear_sample_data_action',
        'hearthstone_ops_clear_sample_data_nonce'
    );
    $promote_seed_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_promote_sample_data'),
        'hearthstone_ops_promote_sample_data_action',
        'hearthstone_ops_promote_sample_data_nonce'
    );
    $rebuild_nights_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_rebuild_stay_nights'),
        'hearthstone_ops_rebuild_stay_nights_action',
        'hearthstone_ops_rebuild_stay_nights_nonce'
    );
    $normalize_guest_phones_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_normalize_guest_phones'),
        'hearthstone_ops_normalize_guest_phones_action',
        'hearthstone_ops_normalize_guest_phones_nonce'
    );
    $export_guests_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_guests_csv'),
        'hearthstone_ops_export_guests_csv_action',
        'hearthstone_ops_export_guests_csv_nonce'
    );
    $export_missing_contact_guests_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_missing_contact_guests_csv'),
        'hearthstone_ops_export_missing_contact_guests_csv_action',
        'hearthstone_ops_export_missing_contact_guests_csv_nonce'
    );
    $export_quality_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_data_quality_snapshot_csv'),
        'hearthstone_ops_export_data_quality_snapshot_csv_action',
        'hearthstone_ops_export_data_quality_snapshot_csv_nonce'
    );
    $export_today_ops_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_today_ops_snapshot_csv'),
        'hearthstone_ops_export_today_ops_snapshot_csv_action',
        'hearthstone_ops_export_today_ops_snapshot_csv_nonce'
    );
    $export_action_board_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_action_board_snapshot_csv'),
        'hearthstone_ops_export_action_board_snapshot_csv_action',
        'hearthstone_ops_export_action_board_snapshot_csv_nonce'
    );
    $export_upcoming_arrivals_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_upcoming_arrivals_snapshot_csv'),
        'hearthstone_ops_export_upcoming_arrivals_snapshot_csv_action',
        'hearthstone_ops_export_upcoming_arrivals_snapshot_csv_nonce'
    );
    $export_stays_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_stays_csv'),
        'hearthstone_ops_export_stays_csv_action',
        'hearthstone_ops_export_stays_csv_nonce'
    );
    $export_arrival_contact_gaps_url = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_arrival_contact_gaps_csv'),
        'hearthstone_ops_export_arrival_contact_gaps_csv_action',
        'hearthstone_ops_export_arrival_contact_gaps_csv_nonce'
    );
    $wc_settings_url = admin_url('admin.php?page=wc-settings');
    ?>
    <div class="wrap">
        <?php if (isset($seed_notice_messages[$notice_key])) : ?>
            <div class="notice <?php echo esc_attr($seed_notice_messages[$notice_key]['type']); ?> inline">
                <p>
                    <?php
                    $notice_message = (string) $seed_notice_messages[$notice_key]['message'];

                    if (
                        ($notice_key === 'sample_data_seeded' || $notice_key === 'sample_data_regenerated')
                        && isset($scenario_labels[$notice_scenario])
                    ) {
                        $notice_message .= ' ' . sprintf(
                            /* translators: %s is a demo scenario label. */
                            __('Scenario: %s.', 'hearthstone-ops'),
                            $scenario_labels[$notice_scenario]
                        );
                    }

                    if ($notice_key === 'stay_nights_rebuilt') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: updated count, 2: cleared count, 3: unchanged count. */
                            __('Updated: %1$d, cleared: %2$d, unchanged: %3$d.', 'hearthstone-ops'),
                            $notice_nights_updated,
                            $notice_nights_cleared,
                            $notice_nights_unchanged
                        );
                        $notice_message .= ' ' . sprintf(
                            /* translators: %d is the number of stay records scanned. */
                            __('Scanned stays: %d.', 'hearthstone-ops'),
                            $notice_nights_scanned
                        );
                    }
                    if ($notice_key === 'sample_data_promoted') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: guest count, 2: stay count. */
                            __('Converted: %1$d guests, %2$d stays.', 'hearthstone-ops'),
                            $notice_promoted_guest_count,
                            $notice_promoted_stay_count
                        );
                    }
                    if ($notice_key === 'guest_phones_normalized') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: updated count, 2: unchanged count, 3: scanned count. */
                            __('Updated: %1$d, unchanged: %2$d, scanned guests: %3$d.', 'hearthstone-ops'),
                            $notice_phone_updated,
                            $notice_phone_unchanged,
                            $notice_phone_scanned
                        );
                    }
                    if ($notice_key === 'wc_checkout_toggle_updated') {
                        $target_label = $notice_checkout_target === 'gift_shop'
                            ? __('Gift shop', 'hearthstone-ops')
                            : __('Dining', 'hearthstone-ops');
                        $toggle_label = $notice_checkout_enabled === '1'
                            ? __('enabled', 'hearthstone-ops')
                            : __('disabled', 'hearthstone-ops');

                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: checkout target label, 2: enabled/disabled label. */
                            __('%1$s card checkout is now %2$s.', 'hearthstone-ops'),
                            $target_label,
                            $toggle_label
                        );
                    }

                    echo esc_html($notice_message);
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if ($seeded_guest_room !== '' && $seeded_guest_code !== '') : ?>
            <div class="notice notice-info inline">
                <p>
                    <?php
                    printf(
                        /* translators: 1: room number, 2: access code. */
                        esc_html__('Guest app test login seeded. Room: %1$s | Access code: %2$s', 'hearthstone-ops'),
                        esc_html($seeded_guest_room),
                        esc_html($seeded_guest_code)
                    );
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <h1><?php esc_html_e('Hearthstone Ops Overview', 'hearthstone-ops'); ?></h1>
        <p><?php esc_html_e('Quick snapshot of guest and stay activity for the current prototype.', 'hearthstone-ops'); ?></p>

        <div style="display:flex;flex-wrap:wrap;gap:8px;margin:20px 0 24px;">
            <a class="button button-primary" href="<?php echo esc_url($action_links['add_guest']); ?>">
                <?php esc_html_e('Add New Guest', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-primary" href="<?php echo esc_url($action_links['add_stay']); ?>">
                <?php esc_html_e('Add New Stay', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['view_guests']); ?>">
                <?php esc_html_e('View Guests', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['view_stays']); ?>">
                <?php esc_html_e('View Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['booked_stays']); ?>">
                <?php esc_html_e('Booked Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['lead_stays']); ?>">
                <?php esc_html_e('Lead Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['checked_in_stays']); ?>">
                <?php esc_html_e('Checked-In Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['checked_out_stays']); ?>">
                <?php esc_html_e('Checked-Out Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['cancelled_stays']); ?>">
                <?php esc_html_e('Cancelled Stays', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['google_guests']); ?>">
                <?php esc_html_e('Google Guests', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['repeat_guests']); ?>">
                <?php esc_html_e('Repeat Guests', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['missing_contact_guests']); ?>">
                <?php esc_html_e('Guests Missing Contact', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_url); ?>">
                <?php esc_html_e('Generate Sample Data', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_force_url); ?>">
                <?php esc_html_e('Regenerate Sample Data', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_booking_rush_url); ?>">
                <?php esc_html_e('Load Booking Rush Demo', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_data_cleanup_url); ?>">
                <?php esc_html_e('Load Data Cleanup Drill', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($promote_seed_url); ?>">
                <?php esc_html_e('Keep Current Sample Records', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($rebuild_nights_url); ?>">
                <?php esc_html_e('Recalculate Stay Nights', 'hearthstone-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($normalize_guest_phones_url); ?>">
                <?php esc_html_e('Normalize Guest Phones', 'hearthstone-ops'); ?>
            </a>
            <a
                class="button button-secondary"
                href="<?php echo esc_url($clear_seed_url); ?>"
                onclick="return confirm('<?php echo esc_attr__('Clear all sample guest and stay records?', 'hearthstone-ops'); ?>');"
            >
                <?php esc_html_e('Clear Sample Data', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_guests_url); ?>">
                <?php esc_html_e('Export Guests CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_missing_contact_guests_url); ?>">
                <?php esc_html_e('Export Missing-Contact Guests CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_quality_snapshot_url); ?>">
                <?php esc_html_e('Export Data Quality Snapshot CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_today_ops_snapshot_url); ?>">
                <?php esc_html_e('Export Today Ops Snapshot CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_action_board_snapshot_url); ?>">
                <?php esc_html_e('Export Action Board CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_upcoming_arrivals_snapshot_url); ?>">
                <?php esc_html_e('Export Upcoming Arrivals CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_stays_url); ?>">
                <?php esc_html_e('Export Stays CSV', 'hearthstone-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_arrival_contact_gaps_url); ?>">
                <?php esc_html_e('Export 48h Contact Gaps CSV', 'hearthstone-ops'); ?>
            </a>
        </div>

        <p style="margin:0 0 16px;">
            <?php
            printf(
                esc_html__('Sample records currently loaded: %1$d guests, %2$d stays.', 'hearthstone-ops'),
                (int) $sample_data_counts['guest'],
                (int) $sample_data_counts['stay']
            );
            ?>
        </p>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Guest Experience Command Center', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Launch guest-facing pages, watch in-house demand, and drive same-day fulfillment from one place.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guest App Home', 'hearthstone-ops'); ?></strong><br>
                    <?php esc_html_e('Primary QR landing surface for active guests.', 'hearthstone-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['app_home']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open App Home', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Restaurant Orders', 'hearthstone-ops'); ?></strong><br>
                    <?php esc_html_e('Sample signature dish included: Filet Mignon.', 'hearthstone-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['dining_pos']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open Restaurant Orders Page', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Gift Shop Orders', 'hearthstone-ops'); ?></strong><br>
                    <?php esc_html_e('Guest-side catalog and pickup flow controls.', 'hearthstone-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['gift_shop_pos']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open Gift Shop Page', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Live Fulfillment Load', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    printf(
                        esc_html__('%1$d checked-in / %2$d booked stays', 'hearthstone-ops'),
                        $checked_in_total,
                        $booked_total
                    );
                    ?><br>
                    <a href="<?php echo esc_url($action_links['checked_in_stays']); ?>"><?php esc_html_e('Open checked-in queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Room Service Queue', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    printf(
                        esc_html__('%1$d open / %2$d total orders', 'hearthstone-ops'),
                        (int) $room_service_metrics['open_orders'],
                        (int) $room_service_metrics['total_orders']
                    );
                    ?><br>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=room_service_order')); ?>"><?php esc_html_e('Open room-service orders', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Room Service Revenue', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    echo esc_html('$' . number_format((float) $room_service_metrics['gross_revenue'], 2));
                    ?><br>
                    <?php
                    printf(
                        esc_html__('%d completed orders', 'hearthstone-ops'),
                        (int) $room_service_metrics['completed_orders']
                    );
                    ?>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Guest Card Checkout Readiness', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Control card checkout availability per module and confirm WooCommerce is ready before demos.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('WooCommerce Status', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html($wc_checkout_readiness['woo_ready'] ? __('Ready', 'hearthstone-ops') : __('Not ready', 'hearthstone-ops')); ?><br>
                    <?php
                    if ($wc_checkout_readiness['currency'] !== '') {
                        printf(
                            esc_html__('Currency: %s', 'hearthstone-ops'),
                            esc_html($wc_checkout_readiness['currency'])
                        );
                    } else {
                        esc_html_e('Currency: not detected', 'hearthstone-ops');
                    }
                    ?>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Enabled Payment Methods', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    if (!empty($wc_checkout_readiness['enabled_gateways'])) {
                        echo esc_html(implode(', ', $wc_checkout_readiness['enabled_gateways']));
                    } else {
                        esc_html_e('No active gateway detected.', 'hearthstone-ops');
                    }
                    ?><br>
                    <a href="<?php echo esc_url($wc_settings_url); ?>"><?php esc_html_e('Open WooCommerce settings', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Dining Card Checkout', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html($wc_checkout_readiness['dining_card_enabled'] ? __('Enabled', 'hearthstone-ops') : __('Disabled', 'hearthstone-ops')); ?><br>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:8px;">
                        <?php wp_nonce_field('hearthstone_ops_update_wc_checkout_toggle_action', 'hearthstone_ops_update_wc_checkout_toggle_nonce'); ?>
                        <input type="hidden" name="action" value="hearthstone_ops_update_wc_checkout_toggle">
                        <input type="hidden" name="hearthstone_ops_checkout_target" value="dining">
                        <input type="hidden" name="hearthstone_ops_checkout_enabled" value="<?php echo esc_attr($wc_checkout_readiness['dining_card_enabled'] ? '0' : '1'); ?>">
                        <button type="submit" class="button button-secondary">
                            <?php
                            echo esc_html(
                                $wc_checkout_readiness['dining_card_enabled']
                                    ? __('Disable dining card checkout', 'hearthstone-ops')
                                    : __('Enable dining card checkout', 'hearthstone-ops')
                            );
                            ?>
                        </button>
                    </form>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Gift Shop Card Checkout', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html($wc_checkout_readiness['gift_card_enabled'] ? __('Enabled', 'hearthstone-ops') : __('Disabled', 'hearthstone-ops')); ?><br>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:8px;">
                        <?php wp_nonce_field('hearthstone_ops_update_wc_checkout_toggle_action', 'hearthstone_ops_update_wc_checkout_toggle_nonce'); ?>
                        <input type="hidden" name="action" value="hearthstone_ops_update_wc_checkout_toggle">
                        <input type="hidden" name="hearthstone_ops_checkout_target" value="gift_shop">
                        <input type="hidden" name="hearthstone_ops_checkout_enabled" value="<?php echo esc_attr($wc_checkout_readiness['gift_card_enabled'] ? '0' : '1'); ?>">
                        <button type="submit" class="button button-secondary">
                            <?php
                            echo esc_html(
                                $wc_checkout_readiness['gift_card_enabled']
                                    ? __('Disable gift shop card checkout', 'hearthstone-ops')
                                    : __('Enable gift shop card checkout', 'hearthstone-ops')
                            );
                            ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Record Origin Snapshot', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('See which records are still demo/sample data versus persistent records.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Sample Guests', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $sample_data_counts['guest']); ?><br>
                    <a href="<?php echo esc_url($action_links['sample_guests']); ?>"><?php esc_html_e('Open sample guests', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Persistent Guests', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $persistent_guest_count); ?><br>
                    <a href="<?php echo esc_url($action_links['persistent_guests']); ?>"><?php esc_html_e('Open persistent guests', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Sample Stays', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $sample_data_counts['stay']); ?><br>
                    <a href="<?php echo esc_url($action_links['sample_stays']); ?>"><?php esc_html_e('Open sample stays', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Persistent Stays', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $persistent_stay_count); ?><br>
                    <a href="<?php echo esc_url($action_links['persistent_stays']); ?>"><?php esc_html_e('Open persistent stays', 'hearthstone-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Today Operations Board', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Live same-day counts for arrivals, departures, and in-house operations.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrivals Today', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['arrivals_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrivals']); ?>"><?php esc_html_e('Open arrivals queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Departures Today', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['departures_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_departures']); ?>"><?php esc_html_e('Open departures queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('In-House Tonight', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['in_house_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_in_house']); ?>"><?php esc_html_e('Open in-house queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Pending Check-Ins', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['pending_check_ins']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_pending_check_ins']); ?>"><?php esc_html_e('Open pending check-ins', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Pending Check-Outs', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['pending_check_outs']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_pending_check_outs']); ?>"><?php esc_html_e('Open pending check-outs', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Overdue Arrivals', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['overdue_arrivals']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_overdue_arrivals']); ?>"><?php esc_html_e('Open overdue arrivals', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Gaps (48h)', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['arrival_contact_gaps_48h']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_gaps_48h']); ?>"><?php esc_html_e('Open contact-gap queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Ready (48h)', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    $contact_ready_rate_48h = $today_ops_metrics['arrival_contact_ready_rate_48h'];
                    echo $contact_ready_rate_48h !== null
                        ? esc_html(number_format((float) $contact_ready_rate_48h, 1) . '%')
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?><br>
                    <?php
                    printf(
                        esc_html__('%1$d ready of %2$d booked', 'hearthstone-ops'),
                        (int) $today_ops_metrics['arrival_contact_ready_48h'],
                        (int) $today_ops_metrics['arrivals_next_48h']
                    );
                    ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_ready_48h']); ?>"><?php esc_html_e('Open contact-ready queue', 'hearthstone-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Upcoming Arrivals (Next 14 Days)', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Booked stays arriving soon, with readiness checks for guest link, dates, nights, and revenue.', 'hearthstone-ops'); ?></p>
            <?php if (!empty($upcoming_arrivals)) : ?>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:12px;">
                    <?php foreach ($upcoming_arrivals as $arrival) : ?>
                        <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Stay:', 'hearthstone-ops'); ?></strong>
                                <?php if ($arrival['stay_link'] !== '') : ?>
                                    <a href="<?php echo esc_url((string) $arrival['stay_link']); ?>"><?php echo esc_html((string) $arrival['stay_title']); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html((string) $arrival['stay_title']); ?>
                                <?php endif; ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Guest:', 'hearthstone-ops'); ?></strong>
                                <?php if ($arrival['guest_link'] !== '') : ?>
                                    <a href="<?php echo esc_url((string) $arrival['guest_link']); ?>"><?php echo esc_html((string) $arrival['guest_name']); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html((string) $arrival['guest_name']); ?>
                                <?php endif; ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Dates:', 'hearthstone-ops'); ?></strong>
                                <?php
                                $arrival_check_in  = (string) $arrival['check_in'];
                                $arrival_check_out = (string) $arrival['check_out'];
                                echo ($arrival_check_in !== '' || $arrival_check_out !== '')
                                    ? esc_html(trim($arrival_check_in . ' -> ' . $arrival_check_out))
                                    : esc_html__('N/A', 'hearthstone-ops');
                                ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Nights:', 'hearthstone-ops'); ?></strong>
                                <?php
                                echo (int) $arrival['nights'] > 0
                                    ? esc_html((string) $arrival['nights'])
                                    : esc_html__('N/A', 'hearthstone-ops');
                                ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Status:', 'hearthstone-ops'); ?></strong>
                                <?php echo esc_html(hearthstone_ops_format_stay_status_label((string) $arrival['status'])); ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Readiness:', 'hearthstone-ops'); ?></strong>
                                <?php echo !empty($arrival['is_ready']) ? esc_html__('Ready', 'hearthstone-ops') : esc_html__('Needs Attention', 'hearthstone-ops'); ?>
                            </p>
                            <?php if (!empty($arrival['issues'])) : ?>
                                <ul style="margin:0 0 8px 18px;">
                                    <?php foreach ($arrival['issues'] as $issue) : ?>
                                        <li><?php echo esc_html((string) $issue); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p><?php esc_html_e('No booked arrivals in the next 14 days.', 'hearthstone-ops'); ?></p>
            <?php endif; ?>
            <p style="margin:12px 0 0;">
                <a class="button" href="<?php echo esc_url($action_links['booked_stays']); ?>">
                    <?php esc_html_e('Open booked queue', 'hearthstone-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['quality_stay_missing_dates']); ?>">
                    <?php esc_html_e('Open stay quality queue', 'hearthstone-ops'); ?>
                </a>
            </p>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Action Board', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Prioritized operational recommendations based on live pipeline and data quality metrics.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:12px;">
                <?php foreach ($recommendations as $recommendation) : ?>
                    <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                        <p style="margin:0 0 8px;"><strong><?php echo esc_html($recommendation['priority']); ?></strong></p>
                        <p style="margin:0 0 8px;"><strong><?php echo esc_html($recommendation['title']); ?></strong></p>
                        <p style="margin:0 0 8px;"><?php echo esc_html($recommendation['detail']); ?></p>
                        <a href="<?php echo esc_url($recommendation['link']); ?>">
                            <?php echo esc_html($recommendation['link_label']); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin:24px 0;">
            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Guests', 'hearthstone-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $guest_total); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Published guest records', 'hearthstone-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Stays', 'hearthstone-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $stay_total); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Published stay records', 'hearthstone-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Booked / Active Nights', 'hearthstone-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $rollup_metrics['booked_active_nights']); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across booked, checked-in, and checked-out stays', 'hearthstone-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Average Revenue / Stay', 'hearthstone-ops'); ?></h2>
                <p style="font-size:28px;margin:0;">
                    <?php
                    echo $average_revenue !== null
                        ? esc_html('$' . number_format((float) $average_revenue, 2))
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?>
                </p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across stays with revenue entered', 'hearthstone-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Average Revenue / Night', 'hearthstone-ops'); ?></h2>
                <p style="font-size:28px;margin:0;">
                    <?php
                    echo $average_revenue_night !== null
                        ? esc_html('$' . number_format((float) $average_revenue_night, 2))
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?>
                </p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across stays with both revenue and nights', 'hearthstone-ops'); ?></p>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Pipeline Snapshot', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('High-level booking flow health from current stay status mix.', 'hearthstone-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Total Stays In Pipeline Mix', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $pipeline_metrics['total_stays_in_mix']); ?>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Booked-Or-Later Rate', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['booked_or_later_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['booked_or_later_rate'], 1) . '%')
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['booked_stays']); ?>"><?php esc_html_e('Open booked queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Cancellation Rate', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['cancellation_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['cancellation_rate'], 1) . '%')
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['cancelled_stays']); ?>"><?php esc_html_e('Open cancelled queue', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Lead Backlog Rate', 'hearthstone-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['lead_backlog_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['lead_backlog_rate'], 1) . '%')
                        : esc_html__('N/A', 'hearthstone-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['lead_stays']); ?>"><?php esc_html_e('Open lead queue', 'hearthstone-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Data Quality Radar', 'hearthstone-ops'); ?></h2>
            <p style="margin-top:0;">
                <?php
                printf(
                    esc_html__('%d records currently need attention across guest/stay operations.', 'hearthstone-ops'),
                    (int) $quality_issue_total
                );
                ?>
            </p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Email', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_email']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_email']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Phone', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_phone']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_phone']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Consent', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_consent']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_consent']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Guest Link', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_guest_link']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_guest_link']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Dates', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_dates']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_dates']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Invalid Date Range', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_invalid_date_range']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_invalid_dates']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Revenue', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_revenue']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_revenue']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Gaps (48h)', 'hearthstone-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_arrival_contact_gaps_48h']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_gaps_48h']); ?>"><?php esc_html_e('Open filtered list', 'hearthstone-ops'); ?></a>
                </div>
            </div>
            <p style="margin:12px 0 0;">
                <a class="button" href="<?php echo esc_url($action_links['quality_guest_missing_contact']); ?>">
                    <?php esc_html_e('Guests Missing Contact', 'hearthstone-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['view_guests']); ?>">
                    <?php esc_html_e('Review Guests', 'hearthstone-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['view_stays']); ?>">
                    <?php esc_html_e('Review Stays', 'hearthstone-ops'); ?>
                </a>
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:16px;margin-bottom:16px;">
            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Stay Status Breakdown', 'hearthstone-ops'); ?></h2>
                <ul style="margin:0;">
                    <?php foreach ($stay_status_summary as $status_key => $count) : ?>
                        <li>
                            <strong><?php echo esc_html(hearthstone_ops_format_stay_status_label($status_key)); ?>:</strong>
                            <?php echo esc_html((string) $count); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Guest Source Breakdown', 'hearthstone-ops'); ?></h2>
                <ul style="margin:0;">
                    <?php foreach ($guest_source_summary as $source_key => $count) : ?>
                        <li>
                            <strong><?php echo esc_html(hearthstone_ops_format_guest_source_label($source_key)); ?>:</strong>
                            <?php echo esc_html((string) $count); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:16px;">
            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Recent Guests', 'hearthstone-ops'); ?></h2>
                <?php if (!empty($recent_guests)) : ?>
                    <ul>
                        <?php foreach ($recent_guests as $guest_post) : ?>
                            <li>
                                <a href="<?php echo esc_url(get_edit_post_link($guest_post->ID)); ?>">
                                    <?php echo esc_html($guest_post->post_title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p><?php esc_html_e('No guest records yet.', 'hearthstone-ops'); ?></p>
                <?php endif; ?>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Recent Stays', 'hearthstone-ops'); ?></h2>
                <?php if (!empty($recent_stays)) : ?>
                    <ul>
                        <?php foreach ($recent_stays as $stay_post) : ?>
                            <li>
                                <a href="<?php echo esc_url(get_edit_post_link($stay_post->ID)); ?>">
                                    <?php echo esc_html($stay_post->post_title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p><?php esc_html_e('No stay records yet.', 'hearthstone-ops'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Seed demo guest/stay records for quick walkthroughs.
 */
function hearthstone_ops_seed_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to seed sample data.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_seed_sample_data_action', 'hearthstone_ops_seed_sample_data_nonce');

    $force = isset($_GET['hearthstone_ops_force_sample_data']) && sanitize_text_field(wp_unslash($_GET['hearthstone_ops_force_sample_data'])) === '1';

    $existing_sample_post_ids = hearthstone_ops_get_sample_data_post_ids();

    if (!$force && !empty($existing_sample_post_ids)) {
        $redirect = add_query_arg(
            'hearthstone_ops_notice',
            'sample_data_exists',
            wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview')
        );
        wp_safe_redirect($redirect);
        exit;
    }

    if ($force && !empty($existing_sample_post_ids)) {
        hearthstone_ops_delete_sample_data_posts();
    }

    $scenario = isset($_GET['hearthstone_ops_demo_scenario'])
        ? hearthstone_ops_resolve_demo_scenario((string) wp_unslash($_GET['hearthstone_ops_demo_scenario']))
        : 'balanced';
    $today = new DateTimeImmutable(wp_date('Y-m-d'));

    if ($scenario === 'booking_rush') {
        $guest_definitions = [
            [
                'handle'           => 'elena',
                'title'            => 'Sample Guest - Elena Cruz',
                'email'            => 'elena@hearthstonehospitality.com',
                'phone'            => '(505) 222-0100',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Hearthstone Canyon Calm',
                'vip'              => '1',
                'consent'          => '1',
            ],
            [
                'handle'           => 'nate',
                'title'            => 'Sample Guest - Nate Morales',
                'email'            => 'nate+ops@hearthstonehospitality.com',
                'phone'            => '',
                'marketing_source' => 'google',
                'preferred_room'   => 'Taos Adobe',
                'vip'              => '',
                'consent'          => '1',
            ],
            [
                'handle'           => 'sara',
                'title'            => 'Sample Guest - Sara Lin',
                'email'            => 'sara@hearthstonehospitality.com',
                'phone'            => '(505) 222-0198',
                'marketing_source' => 'referral',
                'preferred_room'   => 'Santa Fe Serenity',
                'vip'              => '',
                'consent'          => '1',
            ],
            [
                'handle'           => 'omar',
                'title'            => 'Sample Guest - Omar Patel',
                'email'            => 'omar@hearthstonehospitality.com',
                'phone'            => '(505) 222-0182',
                'marketing_source' => 'repeat',
                'preferred_room'   => 'High Desert Moon',
                'vip'              => '1',
                'consent'          => '1',
            ],
        ];

        $stay_definitions = [
            [
                'title'        => 'Stay - Elena Cruz (Arrives Today)',
                'guest_handle' => 'elena',
                'check_in'     => $today->format('Y-m-d'),
                'check_out'    => $today->modify('+2 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '920',
            ],
            [
                'title'        => 'Stay - Nate Morales (Arrives Tomorrow)',
                'guest_handle' => 'nate',
                'check_in'     => $today->modify('+1 day')->format('Y-m-d'),
                'check_out'    => $today->modify('+4 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '1420',
            ],
            [
                'title'        => 'Stay - Sara Lin (Weekend Booking)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('+3 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+5 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '1180',
            ],
            [
                'title'        => 'Stay - Omar Patel (In House)',
                'guest_handle' => 'omar',
                'check_in'     => $today->modify('-1 day')->format('Y-m-d'),
                'check_out'    => $today->modify('+2 days')->format('Y-m-d'),
                'status'       => 'checked_in',
                'revenue'      => '1760',
            ],
            [
                'title'        => 'Stay - Omar Patel (Overdue Arrival)',
                'guest_handle' => 'omar',
                'check_in'     => $today->modify('-1 day')->format('Y-m-d'),
                'check_out'    => $today->modify('+1 day')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '940',
            ],
            [
                'title'        => 'Stay - Elena Cruz (Lead Inquiry)',
                'guest_handle' => 'elena',
                'check_in'     => $today->modify('+7 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+9 days')->format('Y-m-d'),
                'status'       => 'lead',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Nate Morales (Checked Out)',
                'guest_handle' => 'nate',
                'check_in'     => $today->modify('-7 days')->format('Y-m-d'),
                'check_out'    => $today->modify('-4 days')->format('Y-m-d'),
                'status'       => 'checked_out',
                'revenue'      => '1320',
            ],
            [
                'title'        => 'Stay - Sara Lin (Cancelled)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('+10 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+12 days')->format('Y-m-d'),
                'status'       => 'cancelled',
                'revenue'      => '880',
            ],
        ];
    } elseif ($scenario === 'data_cleanup') {
        $guest_definitions = [
            [
                'handle'           => 'elena',
                'title'            => 'Sample Guest - Elena Cruz',
                'email'            => 'elena@hearthstonehospitality.com',
                'phone'            => '',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Hearthstone Canyon Calm',
                'vip'              => '1',
                'consent'          => '',
            ],
            [
                'handle'           => 'nate',
                'title'            => 'Sample Guest - Nate Morales',
                'email'            => '',
                'phone'            => '(505) 222-0144',
                'marketing_source' => 'google',
                'preferred_room'   => 'Taos Adobe',
                'vip'              => '',
                'consent'          => '',
            ],
            [
                'handle'           => 'sara',
                'title'            => 'Sample Guest - Sara Lin',
                'email'            => '',
                'phone'            => '',
                'marketing_source' => 'referral',
                'preferred_room'   => 'Santa Fe Serenity',
                'vip'              => '',
                'consent'          => '1',
            ],
        ];

        $stay_definitions = [
            [
                'title'        => 'Stay - Elena Cruz (Arrives Today Missing Revenue)',
                'guest_handle' => 'elena',
                'check_in'     => $today->format('Y-m-d'),
                'check_out'    => $today->modify('+1 day')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Nate Morales (Missing Dates)',
                'guest_handle' => 'nate',
                'check_in'     => '',
                'check_out'    => '',
                'status'       => 'booked',
                'revenue'      => '760',
            ],
            [
                'title'        => 'Stay - Sara Lin (Invalid Date Range)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('+5 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+2 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Unlinked Lead (No Guest)',
                'guest_handle' => '',
                'check_in'     => $today->modify('+7 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+8 days')->format('Y-m-d'),
                'status'       => 'lead',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Elena Cruz (Checked In)',
                'guest_handle' => 'elena',
                'check_in'     => $today->modify('-2 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+1 day')->format('Y-m-d'),
                'status'       => 'checked_in',
                'revenue'      => '1340',
            ],
            [
                'title'        => 'Stay - Sara Lin (Cancelled)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('+9 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+11 days')->format('Y-m-d'),
                'status'       => 'cancelled',
                'revenue'      => '620',
            ],
        ];
    } else {
        $guest_definitions = [
            [
                'handle'           => 'elena',
                'title'            => 'Sample Guest - Elena Cruz',
                'email'            => 'elena@hearthstonehospitality.com',
                'phone'            => '(505) 222-0100',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Hearthstone Canyon Calm',
                'vip'              => '1',
                'consent'          => '1',
            ],
            [
                'handle'           => 'nate',
                'title'            => 'Sample Guest - Nate Morales',
                'email'            => 'nate+ops@hearthstonehospitality.com',
                'phone'            => '',
                'marketing_source' => 'google',
                'preferred_room'   => 'Taos Adobe',
                'vip'              => '',
                'consent'          => '',
            ],
            [
                'handle'           => 'sara',
                'title'            => 'Sample Guest - Sara Lin',
                'email'            => '',
                'phone'            => '(505) 222-0198',
                'marketing_source' => 'referral',
                'preferred_room'   => 'Santa Fe Serenity',
                'vip'              => '',
                'consent'          => '1',
            ],
        ];

        $stay_definitions = [
            [
                'title'        => 'Stay - Elena Cruz (Arrives Today)',
                'guest_handle' => 'elena',
                'check_in'     => $today->format('Y-m-d'),
                'check_out'    => $today->modify('+1 day')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Elena Cruz (Upcoming Booked)',
                'guest_handle' => 'elena',
                'check_in'     => $today->modify('+2 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+5 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '1380',
            ],
            [
                'title'        => 'Stay - Nate Morales (In House)',
                'guest_handle' => 'nate',
                'check_in'     => $today->modify('-1 day')->format('Y-m-d'),
                'check_out'    => $today->modify('+2 days')->format('Y-m-d'),
                'status'       => 'checked_in',
                'revenue'      => '2120',
            ],
            [
                'title'        => 'Stay - Sara Lin (Checked Out)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('-8 days')->format('Y-m-d'),
                'check_out'    => $today->modify('-5 days')->format('Y-m-d'),
                'status'       => 'checked_out',
                'revenue'      => '980',
            ],
            [
                'title'        => 'Stay - Sara Lin (Lead Pending)',
                'guest_handle' => 'sara',
                'check_in'     => $today->modify('+9 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+11 days')->format('Y-m-d'),
                'status'       => 'lead',
                'revenue'      => '',
            ],
            [
                'title'        => 'Stay - Elena Cruz (Cancelled)',
                'guest_handle' => 'elena',
                'check_in'     => $today->modify('+6 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+7 days')->format('Y-m-d'),
                'status'       => 'cancelled',
                'revenue'      => '650',
            ],
            [
                'title'        => 'Stay - Unlinked Guest (Invalid Dates)',
                'guest_handle' => '',
                'check_in'     => $today->modify('+4 days')->format('Y-m-d'),
                'check_out'    => $today->modify('+3 days')->format('Y-m-d'),
                'status'       => 'booked',
                'revenue'      => '',
            ],
        ];
    }

    $guest_ids = [];
    $used_room_numbers = [];
    $next_room_number = 101;
    $seeded_login_room = '';
    $seeded_login_code = '';

    foreach ($guest_definitions as $guest_data) {
        $guest_id = wp_insert_post([
            'post_title'  => $guest_data['title'],
            'post_type'   => 'guest',
            'post_status' => 'publish',
            'post_content'=> esc_html__('Demo guest record created for the overview dashboard.', 'hearthstone-ops'),
        ], true);

        if (is_wp_error($guest_id)) {
            wp_die($guest_id->get_error_message(), '', ['response' => 500]);
        }

        update_post_meta($guest_id, '_hearthstone_guest_email', $guest_data['email']);
        update_post_meta($guest_id, '_hearthstone_guest_phone', $guest_data['phone']);
        update_post_meta($guest_id, '_hearthstone_guest_marketing_source', $guest_data['marketing_source']);
        update_post_meta($guest_id, '_hearthstone_guest_preferred_room', $guest_data['preferred_room']);
        update_post_meta($guest_id, '_hearthstone_guest_vip', $guest_data['vip']);
        update_post_meta($guest_id, '_hearthstone_guest_marketing_consent', $guest_data['consent']);
        update_post_meta($guest_id, '_hearthstone_ops_sample_data', '1');

        $guest_ids[$guest_data['handle']] = $guest_id;
    }

    foreach ($stay_definitions as $stay_data) {
        $linked_guest_id = 0;

        if (
            isset($stay_data['guest_handle'])
            && $stay_data['guest_handle'] !== ''
            && isset($guest_ids[$stay_data['guest_handle']])
        ) {
            $linked_guest_id = (int) $guest_ids[$stay_data['guest_handle']];
        }

        $stay_id = wp_insert_post([
            'post_title'  => $stay_data['title'],
            'post_type'   => 'stay',
            'post_status' => 'publish',
            'post_content'=> esc_html__('Demo stay record seeded for the overview.', 'hearthstone-ops'),
        ], true);

        if (is_wp_error($stay_id)) {
            wp_die($stay_id->get_error_message(), '', ['response' => 500]);
        }

        update_post_meta($stay_id, '_hearthstone_stay_guest_id', $linked_guest_id);
        update_post_meta($stay_id, '_hearthstone_stay_check_in', $stay_data['check_in']);
        update_post_meta($stay_id, '_hearthstone_stay_check_out', $stay_data['check_out']);
        update_post_meta($stay_id, '_hearthstone_stay_status', $stay_data['status']);
        update_post_meta($stay_id, '_hearthstone_stay_revenue', $stay_data['revenue']);

        $room_number = isset($stay_data['room_number']) ? strtoupper(trim((string) $stay_data['room_number'])) : '';

        if ($room_number === '') {
            while (in_array((string) $next_room_number, $used_room_numbers, true)) {
                $next_room_number++;
            }
            $room_number = (string) $next_room_number;
            $next_room_number++;
        }

        $used_room_numbers[] = $room_number;
        update_post_meta($stay_id, '_hearthstone_stay_room_number', $room_number);

        $nights = hearthstone_ops_calculate_stay_nights($stay_data['check_in'], $stay_data['check_out']);

        if ($nights !== null) {
            update_post_meta($stay_id, '_hearthstone_stay_nights', $nights);
        }

        $status = sanitize_key((string) $stay_data['status']);
        $is_guest_auth_stay = in_array($status, ['booked', 'checked_in'], true);

        if ($is_guest_auth_stay) {
            $access_code = isset($stay_data['access_code']) ? trim((string) $stay_data['access_code']) : '';

            if ($access_code === '') {
                $normalized_room_for_code = preg_replace('/[^a-zA-Z0-9]/', '', $room_number);
                $access_code = 'stay' . (is_string($normalized_room_for_code) && $normalized_room_for_code !== '' ? $normalized_room_for_code : (string) $stay_id);
            }

            update_post_meta($stay_id, '_hearthstone_stay_access_code_hash', wp_hash_password($access_code));

            $checkout_at = trim((string) get_post_meta($stay_id, '_hearthstone_stay_checkout_at', true));
            if ($checkout_at === '' && $stay_data['check_out'] !== '') {
                $default_checkout = strtotime($stay_data['check_out'] . ' 11:00:00');
                if (is_int($default_checkout) && $default_checkout > 0) {
                    update_post_meta($stay_id, '_hearthstone_stay_checkout_at', gmdate('Y-m-d\TH:i', $default_checkout));
                }
            }

            if ($seeded_login_room === '' && hearthstone_ops_get_stay_session_expiry_timestamp((int) $stay_id) > time()) {
                $seeded_login_room = $room_number;
                $seeded_login_code = $access_code;
            }
        }

        update_post_meta($stay_id, '_hearthstone_ops_sample_data', '1');
    }

    if ($seeded_login_room !== '' && $seeded_login_code !== '') {
        set_transient('hearthstone_ops_seeded_guest_login', [
            'room' => $seeded_login_room,
            'code' => $seeded_login_code,
        ], DAY_IN_SECONDS);
    }

    $redirect = add_query_arg([
        'hearthstone_ops_notice'        => $force ? 'sample_data_regenerated' : 'sample_data_seeded',
        'hearthstone_ops_demo_scenario' => $scenario,
    ], wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview'));
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_hearthstone_ops_seed_sample_data', 'hearthstone_ops_seed_sample_data');

/**
 * Backfill room numbers and access-code hashes on existing sample stays once.
 */
function hearthstone_ops_backfill_sample_guest_access_once(): void
{
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    $target_version = 1;
    $current_version = (int) get_option('hearthstone_ops_sample_guest_access_version', 0);

    if ($current_version >= $target_version) {
        return;
    }

    $sample_stay_ids = get_posts([
        'post_type'      => 'stay',
        'post_status'    => ['publish', 'draft'],
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_hearthstone_ops_sample_data',
                'value' => '1',
            ],
        ],
        'orderby'        => 'date',
        'order'          => 'ASC',
    ]);

    if (!is_array($sample_stay_ids) || empty($sample_stay_ids)) {
        update_option('hearthstone_ops_sample_guest_access_version', $target_version, false);
        return;
    }

    $next_room_number = 101;
    $used_room_numbers = [];
    $seeded_login_room = '';
    $seeded_login_code = '';

    foreach ($sample_stay_ids as $sample_stay_id) {
        $stay_id = (int) $sample_stay_id;

        if ($stay_id <= 0) {
            continue;
        }

        $status = sanitize_key((string) get_post_meta($stay_id, '_hearthstone_stay_status', true));

        if (!in_array($status, ['booked', 'checked_in'], true)) {
            continue;
        }

        $room_number = strtoupper(trim((string) get_post_meta($stay_id, '_hearthstone_stay_room_number', true)));

        if ($room_number === '') {
            while (in_array((string) $next_room_number, $used_room_numbers, true)) {
                $next_room_number++;
            }
            $room_number = (string) $next_room_number;
            $next_room_number++;
            update_post_meta($stay_id, '_hearthstone_stay_room_number', $room_number);
        }

        $used_room_numbers[] = $room_number;
        $access_code_hash = trim((string) get_post_meta($stay_id, '_hearthstone_stay_access_code_hash', true));
        $access_code = 'stay' . preg_replace('/[^a-zA-Z0-9]/', '', $room_number);

        if ($access_code_hash === '') {
            update_post_meta($stay_id, '_hearthstone_stay_access_code_hash', wp_hash_password($access_code));
        }

        $check_out = trim((string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true));
        $checkout_at = trim((string) get_post_meta($stay_id, '_hearthstone_stay_checkout_at', true));

        if ($checkout_at === '' && $check_out !== '') {
            $default_checkout = strtotime($check_out . ' 11:00:00');
            if (is_int($default_checkout) && $default_checkout > 0) {
                update_post_meta($stay_id, '_hearthstone_stay_checkout_at', gmdate('Y-m-d\TH:i', $default_checkout));
            }
        }

        if ($seeded_login_room === '' && hearthstone_ops_get_stay_session_expiry_timestamp($stay_id) > time()) {
            $seeded_login_room = $room_number;
            $seeded_login_code = $access_code;
        }
    }

    if ($seeded_login_room !== '' && $seeded_login_code !== '') {
        set_transient('hearthstone_ops_seeded_guest_login', [
            'room' => $seeded_login_room,
            'code' => $seeded_login_code,
        ], DAY_IN_SECONDS);
    }

    update_option('hearthstone_ops_sample_guest_access_version', $target_version, false);
}
add_action('admin_init', 'hearthstone_ops_backfill_sample_guest_access_once');

/**
 * Return deterministic demo guest credentials for non-production walkthroughs.
 *
 * @return array{room:string,code:string}
 */
function hearthstone_ops_get_demo_guest_credentials(): array
{
    return [
        'room' => 'DEMO101',
        'code' => 'hearthstone-demo',
    ];
}

/**
 * Decide whether demo guest credentials should be available.
 */
function hearthstone_ops_should_enable_demo_guest_login(): bool
{
    if (defined('CHAMA_OPS_ENABLE_DEMO_GUEST_LOGIN')) {
        return (bool) CHAMA_OPS_ENABLE_DEMO_GUEST_LOGIN;
    }

    $environment = function_exists('wp_get_environment_type')
        ? (string) wp_get_environment_type()
        : 'production';

    if ($environment !== 'production') {
        return true;
    }

    $host = wp_parse_url(home_url('/'), PHP_URL_HOST);

    if (!is_string($host) || $host === '') {
        return false;
    }

    return str_contains($host, '.local')
        || str_contains($host, 'localhost')
        || str_contains($host, '.test');
}

/**
 * Ensure a single demo stay exists for public prototype walkthroughs.
 */
function hearthstone_ops_ensure_demo_guest_login_stay(): void
{
    if (!hearthstone_ops_should_enable_demo_guest_login()) {
        return;
    }

    $credentials = hearthstone_ops_get_demo_guest_credentials();
    $room_number = strtoupper(trim($credentials['room']));
    $access_code = trim($credentials['code']);

    if ($room_number === '' || $access_code === '') {
        return;
    }

    $now = time();
    $check_in = wp_date('Y-m-d', $now);
    $check_out = wp_date('Y-m-d', $now + (30 * DAY_IN_SECONDS));
    $checkout_at_unix = strtotime($check_out . ' 11:00:00');
    $checkout_at = (is_int($checkout_at_unix) && $checkout_at_unix > 0)
        ? gmdate('Y-m-d\TH:i', $checkout_at_unix)
        : '';

    $stay_id = 0;

    $demo_stay_ids = get_posts([
        'post_type'      => 'stay',
        'post_status'    => ['publish', 'draft'],
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_hearthstone_ops_demo_guest_login',
                'value' => '1',
            ],
        ],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if (is_array($demo_stay_ids) && !empty($demo_stay_ids)) {
        $stay_id = (int) $demo_stay_ids[0];
    }

    if ($stay_id <= 0) {
        $room_stay_ids = get_posts([
            'post_type'      => 'stay',
            'post_status'    => ['publish', 'draft'],
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'   => '_hearthstone_stay_room_number',
                    'value' => $room_number,
                ],
            ],
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        if (is_array($room_stay_ids) && !empty($room_stay_ids)) {
            $stay_id = (int) $room_stay_ids[0];
        }
    }

    if ($stay_id <= 0) {
        $new_stay_id = wp_insert_post([
            'post_title'   => 'Demo Stay - Visitor Access',
            'post_type'    => 'stay',
            'post_status'  => 'publish',
            'post_content' => esc_html__('Persistent demo stay record for public guest-app walkthroughs.', 'hearthstone-ops'),
        ], true);

        if (is_wp_error($new_stay_id)) {
            return;
        }

        $stay_id = (int) $new_stay_id;
    }

    if ($stay_id <= 0) {
        return;
    }

    $meta_updates = [
        '_hearthstone_ops_demo_guest_login' => '1',
        '_hearthstone_stay_room_number'     => $room_number,
        '_hearthstone_stay_check_in'        => $check_in,
        '_hearthstone_stay_check_out'       => $check_out,
        '_hearthstone_stay_status'          => 'checked_in',
    ];

    if ($checkout_at !== '') {
        $meta_updates['_hearthstone_stay_checkout_at'] = $checkout_at;
    }

    foreach ($meta_updates as $meta_key => $meta_value) {
        $current_meta = (string) get_post_meta($stay_id, $meta_key, true);

        if ($current_meta !== $meta_value) {
            update_post_meta($stay_id, $meta_key, $meta_value);
        }
    }

    $access_code_hash = trim((string) get_post_meta($stay_id, '_hearthstone_stay_access_code_hash', true));

    if ($access_code_hash === '' || !wp_check_password($access_code, $access_code_hash, $stay_id)) {
        update_post_meta($stay_id, '_hearthstone_stay_access_code_hash', wp_hash_password($access_code));
    }

    $nights = hearthstone_ops_calculate_stay_nights($check_in, $check_out);

    if ($nights !== null) {
        $existing_nights = (string) get_post_meta($stay_id, '_hearthstone_stay_nights', true);

        if ($existing_nights !== (string) $nights) {
            update_post_meta($stay_id, '_hearthstone_stay_nights', $nights);
        }
    }
}
add_action('init', 'hearthstone_ops_ensure_demo_guest_login_stay', 20);

/**
 * Clear all seeded sample data records.
 */
function hearthstone_ops_clear_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to clear sample data.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_clear_sample_data_action', 'hearthstone_ops_clear_sample_data_nonce');

    $deleted_counts = hearthstone_ops_delete_sample_data_posts();
    $notice_key     = $deleted_counts['total'] > 0 ? 'sample_data_cleared' : 'sample_data_none';

    $redirect = add_query_arg(
        'hearthstone_ops_notice',
        $notice_key,
        wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview')
    );
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_hearthstone_ops_clear_sample_data', 'hearthstone_ops_clear_sample_data');

/**
 * Convert current sample records into persistent records.
 */
function hearthstone_ops_promote_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to convert sample data.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_promote_sample_data_action', 'hearthstone_ops_promote_sample_data_nonce');

    $promoted_counts = hearthstone_ops_promote_sample_data_posts();
    $notice_key      = $promoted_counts['total'] > 0 ? 'sample_data_promoted' : 'sample_data_promote_none';

    $redirect = add_query_arg([
        'hearthstone_ops_notice'               => $notice_key,
        'hearthstone_ops_promoted_guest_count' => $promoted_counts['guest'],
        'hearthstone_ops_promoted_stay_count'  => $promoted_counts['stay'],
    ], wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview'));
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_hearthstone_ops_promote_sample_data', 'hearthstone_ops_promote_sample_data');

/**
 * Recalculate persisted stay-night values from check-in/check-out dates.
 */
function hearthstone_ops_rebuild_stay_nights(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to recalculate stay nights.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_rebuild_stay_nights_action', 'hearthstone_ops_rebuild_stay_nights_nonce');

    $stay_ids = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    $updated   = 0;
    $cleared   = 0;
    $unchanged = 0;

    foreach ($stay_ids as $stay_id) {
        $stay_id    = (int) $stay_id;
        $check_in   = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out  = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);
        $new_nights = hearthstone_ops_calculate_stay_nights($check_in, $check_out);
        $had_nights = metadata_exists('post', $stay_id, '_hearthstone_stay_nights');

        if ($new_nights === null) {
            if ($had_nights) {
                delete_post_meta($stay_id, '_hearthstone_stay_nights');
                $cleared++;
            } else {
                $unchanged++;
            }

            continue;
        }

        $existing_nights = (string) get_post_meta($stay_id, '_hearthstone_stay_nights', true);

        if ($had_nights && $existing_nights === (string) $new_nights) {
            $unchanged++;
            continue;
        }

        update_post_meta($stay_id, '_hearthstone_stay_nights', $new_nights);
        $updated++;
    }

    $redirect = add_query_arg([
        'hearthstone_ops_notice'          => 'stay_nights_rebuilt',
        'hearthstone_ops_nights_updated'  => $updated,
        'hearthstone_ops_nights_cleared'  => $cleared,
        'hearthstone_ops_nights_unchanged' => $unchanged,
        'hearthstone_ops_nights_scanned'  => count($stay_ids),
    ], wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview'));

    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_hearthstone_ops_rebuild_stay_nights', 'hearthstone_ops_rebuild_stay_nights');

/**
 * Normalize all stored guest phone values into the standard display format.
 */
function hearthstone_ops_normalize_guest_phones(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to normalize guest phones.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_normalize_guest_phones_action', 'hearthstone_ops_normalize_guest_phones_nonce');

    $guest_ids = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
    ]);

    $updated   = 0;
    $unchanged = 0;

    foreach ($guest_ids as $guest_id) {
        $guest_id       = (int) $guest_id;
        $existing_phone = (string) get_post_meta($guest_id, '_hearthstone_guest_phone', true);
        $formatted      = hearthstone_ops_format_guest_phone($existing_phone);

        if ($formatted === $existing_phone) {
            $unchanged++;
            continue;
        }

        update_post_meta($guest_id, '_hearthstone_guest_phone', $formatted);
        $updated++;
    }

    $redirect = add_query_arg([
        'hearthstone_ops_notice'         => 'guest_phones_normalized',
        'hearthstone_ops_phone_updated'  => $updated,
        'hearthstone_ops_phone_unchanged' => $unchanged,
        'hearthstone_ops_phone_scanned'  => count($guest_ids),
    ], wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview'));

    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_hearthstone_ops_normalize_guest_phones', 'hearthstone_ops_normalize_guest_phones');

/**
 * Send shared CSV response headers.
 *
 * @param string $filename Download file name.
 */
function hearthstone_ops_send_csv_headers(string $filename): void
{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Pragma: no-cache');
    header('Expires: 0');
}

/**
 * Normalize text values for CSV readability.
 *
 * @param string $value Raw text value.
 */
function hearthstone_ops_prepare_csv_text(string $value): string
{
    return html_entity_decode(wp_strip_all_tags($value), ENT_QUOTES, 'UTF-8');
}

/**
 * Export all guest records to CSV.
 */
function hearthstone_ops_export_guests_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export guests.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_export_guests_csv_action', 'hearthstone_ops_export_guests_csv_nonce');

    $guests = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $filename = 'hearthstone-ops-guests-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, [
        'Guest ID',
        'Guest Name',
        'Email',
        'Phone',
        'Contact Ready',
        'Missing Email',
        'Missing Phone',
        'Marketing Source',
        'Preferred Room',
        'VIP',
        'Marketing Consent',
        'Created Date',
    ]);

    foreach ($guests as $guest_post) {
        $guest_id          = (int) $guest_post->ID;
        $email             = (string) get_post_meta($guest_id, '_hearthstone_guest_email', true);
        $phone             = (string) get_post_meta($guest_id, '_hearthstone_guest_phone', true);
        $contact_ready     = hearthstone_ops_is_guest_contact_ready($guest_id);
        $missing_email     = trim($email) === '';
        $missing_phone     = trim($phone) === '';
        $source_key        = (string) get_post_meta($guest_id, '_hearthstone_guest_marketing_source', true);
        $preferred_room    = (string) get_post_meta($guest_id, '_hearthstone_guest_preferred_room', true);
        $vip               = (string) get_post_meta($guest_id, '_hearthstone_guest_vip', true);
        $marketing_consent = (string) get_post_meta($guest_id, '_hearthstone_guest_marketing_consent', true);

        fputcsv($output, [
            $guest_id,
            hearthstone_ops_prepare_csv_text((string) $guest_post->post_title),
            $email,
            $phone,
            $contact_ready ? 'Yes' : 'No',
            $missing_email ? 'Yes' : 'No',
            $missing_phone ? 'Yes' : 'No',
            $source_key !== '' ? hearthstone_ops_format_guest_source_label($source_key) : 'N/A',
            $preferred_room,
            $vip === '1' ? 'Yes' : 'No',
            $marketing_consent === '1' ? 'Yes' : 'No',
            get_the_date('Y-m-d', $guest_id),
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_guests_csv', 'hearthstone_ops_export_guests_csv');

/**
 * Export guest records that are missing email or phone.
 */
function hearthstone_ops_export_missing_contact_guests_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export guests.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_missing_contact_guests_csv_action',
        'hearthstone_ops_export_missing_contact_guests_csv_nonce'
    );

    $guest_ids = hearthstone_ops_get_guest_missing_contact_ids();
    $guests    = [];

    if (!empty($guest_ids)) {
        $guests = get_posts([
            'post_type'      => 'guest',
            'posts_per_page' => -1,
            'post_status'    => ['publish', 'draft'],
            'post__in'       => $guest_ids,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);
    }

    $filename = 'hearthstone-ops-guests-missing-contact-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, [
        'Guest ID',
        'Guest Name',
        'Email',
        'Phone',
        'Missing Email',
        'Missing Phone',
        'Marketing Source',
        'Preferred Room',
        'VIP',
        'Marketing Consent',
        'Created Date',
    ]);

    foreach ($guests as $guest_post) {
        $guest_id          = (int) $guest_post->ID;
        $email             = (string) get_post_meta($guest_id, '_hearthstone_guest_email', true);
        $phone             = (string) get_post_meta($guest_id, '_hearthstone_guest_phone', true);
        $missing_email     = trim($email) === '';
        $missing_phone     = trim($phone) === '';
        $source_key        = (string) get_post_meta($guest_id, '_hearthstone_guest_marketing_source', true);
        $preferred_room    = (string) get_post_meta($guest_id, '_hearthstone_guest_preferred_room', true);
        $vip               = (string) get_post_meta($guest_id, '_hearthstone_guest_vip', true);
        $marketing_consent = (string) get_post_meta($guest_id, '_hearthstone_guest_marketing_consent', true);

        fputcsv($output, [
            $guest_id,
            hearthstone_ops_prepare_csv_text((string) $guest_post->post_title),
            $email,
            $phone,
            $missing_email ? 'Yes' : 'No',
            $missing_phone ? 'Yes' : 'No',
            $source_key !== '' ? hearthstone_ops_format_guest_source_label($source_key) : 'N/A',
            $preferred_room,
            $vip === '1' ? 'Yes' : 'No',
            $marketing_consent === '1' ? 'Yes' : 'No',
            get_the_date('Y-m-d', $guest_id),
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_missing_contact_guests_csv', 'hearthstone_ops_export_missing_contact_guests_csv');

/**
 * Export a compact data-quality snapshot with queue links.
 */
function hearthstone_ops_export_data_quality_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export data quality snapshots.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_data_quality_snapshot_csv_action',
        'hearthstone_ops_export_data_quality_snapshot_csv_nonce'
    );

    $metrics               = hearthstone_ops_get_data_quality_metrics();
    $action_links          = hearthstone_ops_get_overview_action_links();
    $guest_missing_contact = count(hearthstone_ops_get_guest_missing_contact_ids());

    $rows = [
        ['Guests Missing Contact (Email or Phone)', $guest_missing_contact, $action_links['quality_guest_missing_contact']],
        ['Guests Missing Email', (int) $metrics['guest_missing_email'], $action_links['quality_guest_missing_email']],
        ['Guests Missing Phone', (int) $metrics['guest_missing_phone'], $action_links['quality_guest_missing_phone']],
        ['Guests Missing Consent', (int) $metrics['guest_missing_consent'], $action_links['quality_guest_missing_consent']],
        ['Stays Missing Guest Link', (int) $metrics['stay_missing_guest_link'], $action_links['quality_stay_missing_guest_link']],
        ['Stays Missing Dates', (int) $metrics['stay_missing_dates'], $action_links['quality_stay_missing_dates']],
        ['Stays Invalid Date Range', (int) $metrics['stay_invalid_date_range'], $action_links['quality_stay_invalid_dates']],
        ['Stays Missing Revenue', (int) $metrics['stay_missing_revenue'], $action_links['quality_stay_missing_revenue']],
        ['Arrival Contact Gaps (48h)', (int) $metrics['stay_arrival_contact_gaps_48h'], $action_links['today_arrival_contact_gaps_48h']],
    ];

    $filename = 'hearthstone-ops-data-quality-snapshot-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, ['Issue', 'Count', 'Queue URL']);

    foreach ($rows as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_data_quality_snapshot_csv', 'hearthstone_ops_export_data_quality_snapshot_csv');

/**
 * Export a compact same-day operations snapshot with queue links.
 */
function hearthstone_ops_export_today_ops_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export today operations snapshots.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_today_ops_snapshot_csv_action',
        'hearthstone_ops_export_today_ops_snapshot_csv_nonce'
    );

    $metrics      = hearthstone_ops_get_today_operations_metrics();
    $action_links = hearthstone_ops_get_overview_action_links();

    $rows = [
        ['Arrivals Today', (int) $metrics['arrivals_today'], $action_links['today_arrivals']],
        ['Departures Today', (int) $metrics['departures_today'], $action_links['today_departures']],
        ['In-House Tonight', (int) $metrics['in_house_today'], $action_links['today_in_house']],
        ['Pending Check-Ins', (int) $metrics['pending_check_ins'], $action_links['today_pending_check_ins']],
        ['Pending Check-Outs', (int) $metrics['pending_check_outs'], $action_links['today_pending_check_outs']],
        ['Overdue Arrivals', (int) $metrics['overdue_arrivals'], $action_links['today_overdue_arrivals']],
        ['Booked Arrivals (Next 48h)', (int) $metrics['arrivals_next_48h'], $action_links['today_arrivals_next_48h']],
        ['Arrival Contact Ready (48h)', (int) $metrics['arrival_contact_ready_48h'], $action_links['today_arrival_contact_ready_48h']],
        ['Arrival Contact Gaps (48h)', (int) $metrics['arrival_contact_gaps_48h'], $action_links['today_arrival_contact_gaps_48h']],
        [
            'Arrival Contact Ready Rate (48h)',
            $metrics['arrival_contact_ready_rate_48h'] !== null
                ? number_format((float) $metrics['arrival_contact_ready_rate_48h'], 1) . '%'
                : 'N/A',
            $action_links['today_arrival_contact_ready_48h'],
        ],
    ];

    $filename = 'hearthstone-ops-today-ops-snapshot-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, ['Metric', 'Value', 'Queue URL']);

    foreach ($rows as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_today_ops_snapshot_csv', 'hearthstone_ops_export_today_ops_snapshot_csv');

/**
 * Export prioritized Action Board recommendations.
 */
function hearthstone_ops_export_action_board_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export Action Board snapshots.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_action_board_snapshot_csv_action',
        'hearthstone_ops_export_action_board_snapshot_csv_nonce'
    );

    $stay_status_summary  = hearthstone_ops_get_stay_status_summary();
    $pipeline_metrics     = hearthstone_ops_get_pipeline_metrics($stay_status_summary);
    $action_links         = hearthstone_ops_get_overview_action_links();
    $data_quality_metrics = hearthstone_ops_get_data_quality_metrics();
    $today_ops_metrics    = hearthstone_ops_get_today_operations_metrics();
    $recommendations      = hearthstone_ops_get_operational_recommendations(
        $pipeline_metrics,
        $data_quality_metrics,
        $today_ops_metrics,
        $action_links
    );

    $filename = 'hearthstone-ops-action-board-snapshot-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, ['Priority', 'Recommendation', 'Detail', 'Link Label', 'Queue URL']);

    foreach ($recommendations as $recommendation) {
        fputcsv($output, [
            isset($recommendation['priority']) ? (string) $recommendation['priority'] : '',
            isset($recommendation['title']) ? (string) $recommendation['title'] : '',
            isset($recommendation['detail']) ? (string) $recommendation['detail'] : '',
            isset($recommendation['link_label']) ? (string) $recommendation['link_label'] : '',
            isset($recommendation['link']) ? (string) $recommendation['link'] : '',
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_action_board_snapshot_csv', 'hearthstone_ops_export_action_board_snapshot_csv');

/**
 * Export upcoming-arrivals readiness snapshot.
 */
function hearthstone_ops_export_upcoming_arrivals_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export upcoming arrivals snapshots.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_upcoming_arrivals_snapshot_csv_action',
        'hearthstone_ops_export_upcoming_arrivals_snapshot_csv_nonce'
    );

    $upcoming_arrivals = hearthstone_ops_get_upcoming_arrivals(14, 200);

    $filename = 'hearthstone-ops-upcoming-arrivals-snapshot-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, [
        'Stay ID',
        'Stay Title',
        'Stay URL',
        'Guest Name',
        'Guest URL',
        'Check-In',
        'Check-Out',
        'Nights',
        'Status',
        'Readiness',
        'Issues',
    ]);

    foreach ($upcoming_arrivals as $arrival) {
        $issues = isset($arrival['issues']) && is_array($arrival['issues'])
            ? implode('; ', array_map('strval', $arrival['issues']))
            : '';

        fputcsv($output, [
            isset($arrival['stay_id']) ? (int) $arrival['stay_id'] : '',
            isset($arrival['stay_title']) ? hearthstone_ops_prepare_csv_text((string) $arrival['stay_title']) : '',
            isset($arrival['stay_link']) ? html_entity_decode((string) $arrival['stay_link'], ENT_QUOTES, 'UTF-8') : '',
            isset($arrival['guest_name']) ? hearthstone_ops_prepare_csv_text((string) $arrival['guest_name']) : '',
            isset($arrival['guest_link']) ? html_entity_decode((string) $arrival['guest_link'], ENT_QUOTES, 'UTF-8') : '',
            isset($arrival['check_in']) ? (string) $arrival['check_in'] : '',
            isset($arrival['check_out']) ? (string) $arrival['check_out'] : '',
            isset($arrival['nights']) ? (int) $arrival['nights'] : '',
            isset($arrival['status']) ? hearthstone_ops_format_stay_status_label((string) $arrival['status']) : '',
            !empty($arrival['is_ready']) ? 'Ready' : 'Needs Attention',
            $issues,
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_upcoming_arrivals_snapshot_csv', 'hearthstone_ops_export_upcoming_arrivals_snapshot_csv');

/**
 * Export all stay records to CSV.
 */
function hearthstone_ops_export_stays_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export stays.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_export_stays_csv_action', 'hearthstone_ops_export_stays_csv_nonce');

    $stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $filename = 'hearthstone-ops-stays-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, [
        'Stay ID',
        'Stay Title',
        'Guest ID',
        'Guest Name',
        'Check-In',
        'Check-Out',
        'Nights',
        'Status',
        'Estimated Revenue',
        'Revenue Per Night',
        'In 48h Arrival Window',
        'Contact Ready',
        'Contact Gap (48h Booked Arrivals)',
        'Created Date',
    ]);

    foreach ($stays as $stay_post) {
        $stay_id           = (int) $stay_post->ID;
        $guest_id          = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);
        $check_in          = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out         = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);
        $nights            = (int) get_post_meta($stay_id, '_hearthstone_stay_nights', true);
        $status            = (string) get_post_meta($stay_id, '_hearthstone_stay_status', true);
        $revenue           = (string) get_post_meta($stay_id, '_hearthstone_stay_revenue', true);
        $revenue_per_night = $nights > 0 ? hearthstone_ops_calculate_revenue_per_night($revenue, $nights) : null;
        $guest_name        = $guest_id > 0 ? get_the_title($guest_id) : 'N/A';
        $is_booked         = $status === 'booked';
        $in_window_48h     = $is_booked && hearthstone_ops_is_check_in_within_next_48h($check_in);
        $contact_ready     = $guest_id > 0 && hearthstone_ops_is_guest_contact_ready($guest_id);
        $contact_gap_48h   = $in_window_48h && !$contact_ready;

        fputcsv($output, [
            $stay_id,
            hearthstone_ops_prepare_csv_text((string) $stay_post->post_title),
            $guest_id > 0 ? $guest_id : '',
            hearthstone_ops_prepare_csv_text((string) $guest_name),
            $check_in,
            $check_out,
            $nights > 0 ? $nights : '',
            $status !== '' ? hearthstone_ops_format_stay_status_label($status) : 'N/A',
            $revenue,
            $revenue_per_night !== null ? number_format($revenue_per_night, 2) : '',
            $in_window_48h ? 'Yes' : 'No',
            $contact_ready ? 'Yes' : 'No',
            $contact_gap_48h ? 'Yes' : 'No',
            get_the_date('Y-m-d', $stay_id),
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_stays_csv', 'hearthstone_ops_export_stays_csv');

/**
 * Export next-48h arrival contact gaps to CSV.
 */
function hearthstone_ops_export_arrival_contact_gaps_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export arrival contact gaps.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'hearthstone_ops_export_arrival_contact_gaps_csv_action',
        'hearthstone_ops_export_arrival_contact_gaps_csv_nonce'
    );

    $gap_stay_ids = hearthstone_ops_get_arrival_contact_gap_stay_ids(1);

    $filename = 'hearthstone-ops-arrival-contact-gaps-48h-' . wp_date('Ymd-His') . '.csv';
    hearthstone_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'hearthstone-ops'), '', ['response' => 500]);
    }

    fputcsv($output, [
        'Stay ID',
        'Stay Title',
        'Check-In',
        'Check-Out',
        'Guest ID',
        'Guest Name',
        'Guest Email',
        'Guest Phone',
        'Missing Email',
        'Missing Phone',
        'Status',
    ]);

    foreach ($gap_stay_ids as $stay_id) {
        $stay_id      = (int) $stay_id;
        $stay_post    = get_post($stay_id);
        $guest_id     = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);
        $check_in     = (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true);
        $check_out    = (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true);
        $status       = (string) get_post_meta($stay_id, '_hearthstone_stay_status', true);
        $guest_name   = $guest_id > 0 ? get_the_title($guest_id) : 'N/A';
        $guest_email  = $guest_id > 0 ? trim((string) get_post_meta($guest_id, '_hearthstone_guest_email', true)) : '';
        $guest_phone  = $guest_id > 0 ? trim((string) get_post_meta($guest_id, '_hearthstone_guest_phone', true)) : '';
        $missing_mail = $guest_email === '';
        $missing_tel  = $guest_phone === '';

        if (!$stay_post instanceof WP_Post) {
            continue;
        }

        fputcsv($output, [
            $stay_id,
            hearthstone_ops_prepare_csv_text((string) $stay_post->post_title),
            $check_in,
            $check_out,
            $guest_id > 0 ? $guest_id : '',
            hearthstone_ops_prepare_csv_text((string) $guest_name),
            $guest_email,
            $guest_phone,
            $missing_mail ? 'Yes' : 'No',
            $missing_tel ? 'Yes' : 'No',
            $status !== '' ? hearthstone_ops_format_stay_status_label($status) : 'N/A',
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_hearthstone_ops_export_arrival_contact_gaps_csv', 'hearthstone_ops_export_arrival_contact_gaps_csv');

/**
 * Render custom filters on Guest and Stay list screens.
 *
 * @param string $post_type Current post type.
 * @param string $which     Table nav location.
 */
function hearthstone_ops_render_admin_filters(string $post_type, string $which): void
{
    if ($which !== 'top') {
        return;
    }

    if ($post_type === 'guest') {
        $selected_source = isset($_GET['hearthstone_guest_source']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_guest_source'])) : '';
        $selected_quality = isset($_GET['hearthstone_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_guest_quality'])) : '';
        $selected_origin = isset($_GET['hearthstone_data_origin']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_data_origin'])) : '';
        ?>
        <label class="screen-reader-text" for="hearthstone_guest_source"><?php esc_html_e('Filter guests by source', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_guest_source" id="hearthstone_guest_source">
            <option value=""><?php esc_html_e('All Sources', 'hearthstone-ops'); ?></option>
            <option value="direct" <?php selected($selected_source, 'direct'); ?>><?php esc_html_e('Direct', 'hearthstone-ops'); ?></option>
            <option value="google" <?php selected($selected_source, 'google'); ?>><?php esc_html_e('Google Search', 'hearthstone-ops'); ?></option>
            <option value="referral" <?php selected($selected_source, 'referral'); ?>><?php esc_html_e('Referral', 'hearthstone-ops'); ?></option>
            <option value="social" <?php selected($selected_source, 'social'); ?>><?php esc_html_e('Social Media', 'hearthstone-ops'); ?></option>
            <option value="repeat" <?php selected($selected_source, 'repeat'); ?>><?php esc_html_e('Repeat Guest', 'hearthstone-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="hearthstone_guest_quality"><?php esc_html_e('Filter guests by quality issue', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_guest_quality" id="hearthstone_guest_quality">
            <option value=""><?php esc_html_e('All Data Quality States', 'hearthstone-ops'); ?></option>
            <option value="missing_contact" <?php selected($selected_quality, 'missing_contact'); ?>><?php esc_html_e('Missing Contact (Email or Phone)', 'hearthstone-ops'); ?></option>
            <option value="missing_email" <?php selected($selected_quality, 'missing_email'); ?>><?php esc_html_e('Missing Email', 'hearthstone-ops'); ?></option>
            <option value="missing_phone" <?php selected($selected_quality, 'missing_phone'); ?>><?php esc_html_e('Missing Phone', 'hearthstone-ops'); ?></option>
            <option value="missing_consent" <?php selected($selected_quality, 'missing_consent'); ?>><?php esc_html_e('Missing Consent', 'hearthstone-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="hearthstone_data_origin"><?php esc_html_e('Filter records by origin', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_data_origin" id="hearthstone_data_origin">
            <option value=""><?php esc_html_e('All Record Origins', 'hearthstone-ops'); ?></option>
            <option value="sample" <?php selected($selected_origin, 'sample'); ?>><?php esc_html_e('Sample Only', 'hearthstone-ops'); ?></option>
            <option value="persistent" <?php selected($selected_origin, 'persistent'); ?>><?php esc_html_e('Persistent Only', 'hearthstone-ops'); ?></option>
        </select>
        <?php
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['hearthstone_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_status_filter'])) : '';
        $selected_quality = isset($_GET['hearthstone_stay_quality']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_quality'])) : '';
        $selected_today = isset($_GET['hearthstone_stay_today']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_today'])) : '';
        $selected_origin = isset($_GET['hearthstone_data_origin']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_data_origin'])) : '';
        ?>
        <label class="screen-reader-text" for="hearthstone_stay_status_filter"><?php esc_html_e('Filter stays by status', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_stay_status_filter" id="hearthstone_stay_status_filter">
            <option value=""><?php esc_html_e('All Statuses', 'hearthstone-ops'); ?></option>
            <option value="lead" <?php selected($selected_status, 'lead'); ?>><?php esc_html_e('Lead', 'hearthstone-ops'); ?></option>
            <option value="booked" <?php selected($selected_status, 'booked'); ?>><?php esc_html_e('Booked', 'hearthstone-ops'); ?></option>
            <option value="checked_in" <?php selected($selected_status, 'checked_in'); ?>><?php esc_html_e('Checked In', 'hearthstone-ops'); ?></option>
            <option value="checked_out" <?php selected($selected_status, 'checked_out'); ?>><?php esc_html_e('Checked Out', 'hearthstone-ops'); ?></option>
            <option value="cancelled" <?php selected($selected_status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'hearthstone-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="hearthstone_stay_quality"><?php esc_html_e('Filter stays by quality issue', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_stay_quality" id="hearthstone_stay_quality">
            <option value=""><?php esc_html_e('All Data Quality States', 'hearthstone-ops'); ?></option>
            <option value="missing_guest_link" <?php selected($selected_quality, 'missing_guest_link'); ?>><?php esc_html_e('Missing Guest Link', 'hearthstone-ops'); ?></option>
            <option value="missing_dates" <?php selected($selected_quality, 'missing_dates'); ?>><?php esc_html_e('Missing Dates', 'hearthstone-ops'); ?></option>
            <option value="invalid_date_range" <?php selected($selected_quality, 'invalid_date_range'); ?>><?php esc_html_e('Invalid Date Range', 'hearthstone-ops'); ?></option>
            <option value="missing_revenue" <?php selected($selected_quality, 'missing_revenue'); ?>><?php esc_html_e('Missing Revenue', 'hearthstone-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="hearthstone_stay_today"><?php esc_html_e('Filter stays by today operations', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_stay_today" id="hearthstone_stay_today">
            <option value=""><?php esc_html_e('All Today States', 'hearthstone-ops'); ?></option>
            <option value="arrivals" <?php selected($selected_today, 'arrivals'); ?>><?php esc_html_e('Arrivals Today', 'hearthstone-ops'); ?></option>
            <option value="arrivals_next_48h" <?php selected($selected_today, 'arrivals_next_48h'); ?>><?php esc_html_e('Booked Arrivals (48h)', 'hearthstone-ops'); ?></option>
            <option value="arrivals_contact_ready" <?php selected($selected_today, 'arrivals_contact_ready'); ?>><?php esc_html_e('Arrival Contact Ready (48h)', 'hearthstone-ops'); ?></option>
            <option value="departures" <?php selected($selected_today, 'departures'); ?>><?php esc_html_e('Departures Today', 'hearthstone-ops'); ?></option>
            <option value="in_house" <?php selected($selected_today, 'in_house'); ?>><?php esc_html_e('In-House Tonight', 'hearthstone-ops'); ?></option>
            <option value="overdue_arrivals" <?php selected($selected_today, 'overdue_arrivals'); ?>><?php esc_html_e('Overdue Arrivals', 'hearthstone-ops'); ?></option>
            <option value="arrivals_contact_gap" <?php selected($selected_today, 'arrivals_contact_gap'); ?>><?php esc_html_e('Arrival Contact Gaps (48h)', 'hearthstone-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="hearthstone_data_origin"><?php esc_html_e('Filter records by origin', 'hearthstone-ops'); ?></label>
        <select name="hearthstone_data_origin" id="hearthstone_data_origin">
            <option value=""><?php esc_html_e('All Record Origins', 'hearthstone-ops'); ?></option>
            <option value="sample" <?php selected($selected_origin, 'sample'); ?>><?php esc_html_e('Sample Only', 'hearthstone-ops'); ?></option>
            <option value="persistent" <?php selected($selected_origin, 'persistent'); ?>><?php esc_html_e('Persistent Only', 'hearthstone-ops'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'hearthstone_ops_render_admin_filters', 10, 2);

/**
 * Apply custom admin list filters to Guest and Stay queries.
 *
 * @param WP_Query $query The current query.
 */
function hearthstone_ops_apply_admin_filters(WP_Query $query): void
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $post_type = $query->get('post_type');

    if ($post_type === 'guest') {
        $selected_source = isset($_GET['hearthstone_guest_source']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_guest_source'])) : '';
        $selected_quality = isset($_GET['hearthstone_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_guest_quality'])) : '';
        $selected_origin = isset($_GET['hearthstone_data_origin']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_data_origin'])) : '';

        if ($selected_source !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_hearthstone_guest_marketing_source',
                'value' => $selected_source,
            ];

            $query->set('meta_query', $meta_query);
        }

        if ($selected_quality !== '') {
            $meta_query = (array) $query->get('meta_query');

            if ($selected_quality === 'missing_contact') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'relation' => 'OR',
                        [
                            'key'     => '_hearthstone_guest_email',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_hearthstone_guest_email',
                            'value'   => '',
                            'compare' => '=',
                        ],
                    ],
                    [
                        'relation' => 'OR',
                        [
                            'key'     => '_hearthstone_guest_phone',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_hearthstone_guest_phone',
                            'value'   => '',
                            'compare' => '=',
                        ],
                    ],
                ];
            }

            if ($selected_quality === 'missing_email') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_guest_email',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_guest_email',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_phone') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_guest_phone',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_guest_phone',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_consent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_guest_marketing_consent',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_guest_marketing_consent',
                        'value'   => '1',
                        'compare' => '!=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }

        if ($selected_origin !== '') {
            $meta_query = (array) $query->get('meta_query');

            if ($selected_origin === 'sample') {
                $meta_query[] = [
                    'key'   => '_hearthstone_ops_sample_data',
                    'value' => '1',
                ];
            }

            if ($selected_origin === 'persistent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_ops_sample_data',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_ops_sample_data',
                        'value'   => '1',
                        'compare' => '!=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['hearthstone_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_status_filter'])) : '';
        $selected_quality = isset($_GET['hearthstone_stay_quality']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_quality'])) : '';
        $selected_today = isset($_GET['hearthstone_stay_today']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_today'])) : '';
        $selected_origin = isset($_GET['hearthstone_data_origin']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_data_origin'])) : '';

        if ($selected_status !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_hearthstone_stay_status',
                'value' => $selected_status,
            ];

            $query->set('meta_query', $meta_query);
        }

        if ($selected_quality !== '') {
            $meta_query = (array) $query->get('meta_query');

            if ($selected_quality === 'missing_guest_link') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_stay_guest_id',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_stay_guest_id',
                        'value'   => '',
                        'compare' => '=',
                    ],
                    [
                        'key'     => '_hearthstone_stay_guest_id',
                        'value'   => '0',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_dates') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_stay_check_in',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_in',
                        'value'   => '',
                        'compare' => '=',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_out',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_out',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'invalid_date_range') {
                $meta_query[] = [
                    [
                        'key'     => '_hearthstone_stay_check_in',
                        'value'   => '',
                        'compare' => '!=',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_out',
                        'value'   => '',
                        'compare' => '!=',
                    ],
                    [
                        'relation' => 'OR',
                        [
                            'key'     => '_hearthstone_stay_nights',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_hearthstone_stay_nights',
                            'value'   => '',
                            'compare' => '=',
                        ],
                        [
                            'key'     => '_hearthstone_stay_nights',
                            'value'   => 0,
                            'compare' => '<=',
                            'type'    => 'NUMERIC',
                        ],
                    ],
                ];
            }

            if ($selected_quality === 'missing_revenue') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_stay_revenue',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_stay_revenue',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }

        if ($selected_today !== '') {
            $meta_query = (array) $query->get('meta_query');
            $today = wp_date('Y-m-d');
            $tomorrow = wp_date('Y-m-d', strtotime('+1 day'));

            if ($selected_today === 'arrivals') {
                $meta_query[] = [
                    'key'     => '_hearthstone_stay_check_in',
                    'value'   => $today,
                    'compare' => '=',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'arrivals_next_48h') {
                $meta_query[] = [
                    'key'   => '_hearthstone_stay_status',
                    'value' => 'booked',
                ];
                $meta_query[] = [
                    'key'     => '_hearthstone_stay_check_in',
                    'value'   => [$today, $tomorrow],
                    'compare' => 'BETWEEN',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'departures') {
                $meta_query[] = [
                    'key'     => '_hearthstone_stay_check_out',
                    'value'   => $today,
                    'compare' => '=',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'in_house') {
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key'     => '_hearthstone_stay_check_in',
                        'value'   => $today,
                        'compare' => '<=',
                        'type'    => 'DATE',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_out',
                        'value'   => $today,
                        'compare' => '>',
                        'type'    => 'DATE',
                    ],
                ];
            }

            if ($selected_today === 'overdue_arrivals') {
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key'     => '_hearthstone_stay_check_in',
                        'value'   => $today,
                        'compare' => '<',
                        'type'    => 'DATE',
                    ],
                    [
                        'key'     => '_hearthstone_stay_check_out',
                        'value'   => $today,
                        'compare' => '>',
                        'type'    => 'DATE',
                    ],
                ];
            }

            if ($selected_today === 'arrivals_contact_gap') {
                $gap_ids = hearthstone_ops_get_arrival_contact_gap_stay_ids(1);
                $query->set('post__in', !empty($gap_ids) ? $gap_ids : [0]);
            }

            if ($selected_today === 'arrivals_contact_ready') {
                $arrival_ids = hearthstone_ops_get_booked_arrival_stay_ids(1);
                $gap_ids     = hearthstone_ops_get_arrival_contact_gap_stay_ids(1);
                $ready_ids   = array_values(array_diff($arrival_ids, $gap_ids));

                $query->set('post__in', !empty($ready_ids) ? array_map('intval', $ready_ids) : [0]);
            }

            $query->set('meta_query', $meta_query);
        }

        if ($selected_origin !== '') {
            $meta_query = (array) $query->get('meta_query');

            if ($selected_origin === 'sample') {
                $meta_query[] = [
                    'key'   => '_hearthstone_ops_sample_data',
                    'value' => '1',
                ];
            }

            if ($selected_origin === 'persistent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_hearthstone_ops_sample_data',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_hearthstone_ops_sample_data',
                        'value'   => '1',
                        'compare' => '!=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'hearthstone_ops_apply_admin_filters');

/**
 * Render contextual admin notices for today-operations stay filters.
 */
function hearthstone_ops_render_stay_filter_context_notice(): void
{
    if (!is_admin() || !function_exists('get_current_screen')) {
        return;
    }

    $screen = get_current_screen();

    if (!$screen || $screen->base !== 'edit' || $screen->post_type !== 'stay') {
        return;
    }

    $selected_today = isset($_GET['hearthstone_stay_today']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_stay_today'])) : '';

    if ($selected_today === '') {
        return;
    }

    $arrivals_next_48h  = count(hearthstone_ops_get_booked_arrival_stay_ids(1));
    $contact_gap_count  = count(hearthstone_ops_get_arrival_contact_gap_stay_ids(1));
    $contact_ready_count = max(0, $arrivals_next_48h - $contact_gap_count);
    $stay_list_url      = admin_url('edit.php?post_type=stay');
    $ready_url          = add_query_arg([
        'hearthstone_stay_today'         => 'arrivals_contact_ready',
        'hearthstone_stay_status_filter' => 'booked',
    ], $stay_list_url);
    $gap_url            = add_query_arg([
        'hearthstone_stay_today'         => 'arrivals_contact_gap',
        'hearthstone_stay_status_filter' => 'booked',
    ], $stay_list_url);

    if ($arrivals_next_48h === 0) {
        echo '<div class="notice notice-info is-dismissible"><p>';
        esc_html_e('No booked arrivals are scheduled in the next 48 hours.', 'hearthstone-ops');
        echo '</p></div>';
        return;
    }

    if ($selected_today === 'arrivals_contact_gap') {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: number of contact-gap stays, 2: total booked arrivals in 48h, 3: opening anchor tag, 4: closing anchor tag. */
                __('%1$d of %2$d booked arrivals in the next 48 hours are missing contact readiness. %3$sView contact-ready queue%4$s.', 'hearthstone-ops')
            ),
            (int) $contact_gap_count,
            (int) $arrivals_next_48h,
            '<a href="' . esc_url($ready_url) . '">',
            '</a>'
        );
        echo '</p></div>';
        return;
    }

    if ($selected_today === 'arrivals_contact_ready') {
        echo '<div class="notice notice-success is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: number of contact-ready stays, 2: total booked arrivals in 48h, 3: opening anchor tag, 4: closing anchor tag. */
                __('%1$d of %2$d booked arrivals in the next 48 hours are contact-ready. %3$sView contact-gap queue%4$s.', 'hearthstone-ops')
            ),
            (int) $contact_ready_count,
            (int) $arrivals_next_48h,
            '<a href="' . esc_url($gap_url) . '">',
            '</a>'
        );
        echo '</p></div>';
        return;
    }

    if ($selected_today === 'arrivals_next_48h') {
        echo '<div class="notice notice-info is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: total booked arrivals in 48h, 2: contact-ready count, 3: contact-gap count, 4: opening anchor tag for ready queue, 5: closing anchor tag, 6: opening anchor tag for gap queue, 7: closing anchor tag. */
                __('%1$d booked arrivals are scheduled in the next 48 hours: %2$d ready, %3$d with contact gaps. %4$sReady queue%5$s | %6$sGap queue%7$s.', 'hearthstone-ops')
            ),
            (int) $arrivals_next_48h,
            (int) $contact_ready_count,
            (int) $contact_gap_count,
            '<a href="' . esc_url($ready_url) . '">',
            '</a>',
            '<a href="' . esc_url($gap_url) . '">',
            '</a>'
        );
        echo '</p></div>';
    }
}
add_action('admin_notices', 'hearthstone_ops_render_stay_filter_context_notice');

/**
 * Render contextual admin notices for guest quality filters.
 */
function hearthstone_ops_render_guest_filter_context_notice(): void
{
    if (!is_admin() || !function_exists('get_current_screen')) {
        return;
    }

    $screen = get_current_screen();

    if (!$screen || $screen->base !== 'edit' || $screen->post_type !== 'guest') {
        return;
    }

    $selected_quality = isset($_GET['hearthstone_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['hearthstone_guest_quality'])) : '';

    if ($selected_quality === '') {
        return;
    }

    $metrics               = hearthstone_ops_get_data_quality_metrics();
    $missing_contact_count = count(hearthstone_ops_get_guest_missing_contact_ids());
    $guest_list_url        = admin_url('edit.php?post_type=guest');
    $missing_contact_url   = add_query_arg('hearthstone_guest_quality', 'missing_contact', $guest_list_url);
    $missing_email_url     = add_query_arg('hearthstone_guest_quality', 'missing_email', $guest_list_url);
    $missing_phone_url     = add_query_arg('hearthstone_guest_quality', 'missing_phone', $guest_list_url);
    $export_url            = wp_nonce_url(
        admin_url('admin-post.php?action=hearthstone_ops_export_missing_contact_guests_csv'),
        'hearthstone_ops_export_missing_contact_guests_csv_action',
        'hearthstone_ops_export_missing_contact_guests_csv_nonce'
    );

    if ($selected_quality === 'missing_contact') {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: missing-contact guest count, 2: opening anchor tag to missing-email queue, 3: closing anchor tag, 4: opening anchor tag to missing-phone queue, 5: closing anchor tag, 6: opening anchor tag to export URL, 7: closing anchor tag. */
                __('%1$d guest profiles are missing at least one contact field. %2$sMissing email queue%3$s | %4$sMissing phone queue%5$s | %6$sExport outreach file%7$s.', 'hearthstone-ops')
            ),
            (int) $missing_contact_count,
            '<a href="' . esc_url($missing_email_url) . '">',
            '</a>',
            '<a href="' . esc_url($missing_phone_url) . '">',
            '</a>',
            '<a href="' . esc_url($export_url) . '">',
            '</a>'
        );
        echo '</p></div>';
        return;
    }

    if ($selected_quality === 'missing_email') {
        echo '<div class="notice notice-info is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: missing-email guest count, 2: opening anchor tag to missing-contact queue, 3: closing anchor tag. */
                __('%1$d guest profiles are missing email. %2$sView full missing-contact queue%3$s.', 'hearthstone-ops')
            ),
            (int) $metrics['guest_missing_email'],
            '<a href="' . esc_url($missing_contact_url) . '">',
            '</a>'
        );
        echo '</p></div>';
        return;
    }

    if ($selected_quality === 'missing_phone') {
        echo '<div class="notice notice-info is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: missing-phone guest count, 2: opening anchor tag to missing-contact queue, 3: closing anchor tag. */
                __('%1$d guest profiles are missing phone. %2$sView full missing-contact queue%3$s.', 'hearthstone-ops')
            ),
            (int) $metrics['guest_missing_phone'],
            '<a href="' . esc_url($missing_contact_url) . '">',
            '</a>'
        );
        echo '</p></div>';
        return;
    }

    if ($selected_quality === 'missing_consent') {
        echo '<div class="notice notice-info is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: %d is the number of guest profiles missing marketing consent. */
                __('%d guest profiles are missing marketing consent.', 'hearthstone-ops')
            ),
            (int) $metrics['guest_missing_consent']
        );
        echo '</p></div>';
    }
}
add_action('admin_notices', 'hearthstone_ops_render_guest_filter_context_notice');

/**
 * Auto-format guest phone input on admin edit screens.
 */
function hearthstone_ops_render_guest_phone_format_script(): void
{
    if (!is_admin() || !function_exists('get_current_screen')) {
        return;
    }

    $screen = get_current_screen();

    if (!$screen || $screen->base !== 'post' || $screen->post_type !== 'guest') {
        return;
    }
    ?>
    <script>
    (function () {
        var input = document.getElementById('hearthstone_guest_phone');

        if (!input) {
            return;
        }

        var formatHearthstoneGuestPhone = function (rawValue) {
            var trimmed = (rawValue || '').trim();

            if (trimmed === '') {
                return '';
            }

            var digits = trimmed.replace(/\D+/g, '');

            if (digits.length === 11 && digits.charAt(0) === '1') {
                digits = digits.slice(1);
            }

            if (digits.length === 10) {
                return '(' + digits.slice(0, 3) + ') ' + digits.slice(3, 6) + '-' + digits.slice(6);
            }

            return trimmed;
        };

        var applyPhoneFormat = function () {
            input.value = formatHearthstoneGuestPhone(input.value);
        };

        input.addEventListener('blur', applyPhoneFormat);
        input.addEventListener('change', applyPhoneFormat);
    }());
    </script>
    <?php
}
add_action('admin_print_footer_scripts', 'hearthstone_ops_render_guest_phone_format_script');

/**
 * Return available room service menu items.
 *
 * @return WP_Post[]
 */
function hearthstone_ops_get_available_room_service_items(): array
{
    $items = get_posts([
        'post_type'      => 'room_service_item',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    if (empty($items)) {
        hearthstone_ops_seed_room_service_menu_items(true);

        $items = get_posts([
            'post_type'      => 'room_service_item',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'title',
            'order'          => 'ASC',
        ]);
    }

    if (!is_array($items)) {
        return [];
    }

    return array_values(array_filter($items, static function ($item): bool {
        if (!$item instanceof WP_Post) {
            return false;
        }

        $availability = (string) get_post_meta((int) $item->ID, '_hearthstone_room_service_available', true);

        // Backward-compatible default: treat existing items as available unless explicitly disabled.
        if ($availability === '') {
            return true;
        }

        return $availability === '1';
    }));
}

/**
 * Return the default front-desk phone number used in guest app CTAs.
 */
function hearthstone_ops_get_front_desk_phone_number(): string
{
    $configured = trim((string) get_option('hearthstone_ops_front_desk_phone', ''));

    if ($configured !== '') {
        return $configured;
    }

    return '(575) 000-0000';
}

/**
 * Build a tel: link for front-desk actions.
 */
function hearthstone_ops_get_front_desk_tel_href(): string
{
    $phone = hearthstone_ops_get_front_desk_phone_number();
    $normalized = preg_replace('/[^0-9+]/', '', $phone);

    if (!is_string($normalized) || $normalized === '') {
        return '';
    }

    if ($normalized[0] !== '+' && strlen($normalized) === 10) {
        $normalized = '+1' . $normalized;
    }

    return 'tel:' . $normalized;
}

/**
 * Cookie name used for guest stay sessions.
 */
function hearthstone_ops_get_guest_session_cookie_name(): string
{
    return 'hearthstone_guest_session';
}

/**
 * Build transient key from session token.
 *
 * @param string $token Guest session token.
 */
function hearthstone_ops_get_guest_session_transient_key(string $token): string
{
    return 'hearthstone_ops_guest_session_' . $token;
}

/**
 * Set the guest-session cookie.
 *
 * @param string $token Session token.
 * @param int    $expires_at UTC timestamp for forced expiry at checkout.
 * @param bool   $remember Whether to persist cookie across browser restarts.
 */
function hearthstone_ops_set_guest_session_cookie(string $token, int $expires_at, bool $remember): void
{
    $cookie_name = hearthstone_ops_get_guest_session_cookie_name();
    $cookie_expiry = $remember ? $expires_at : 0;
    $path = defined('COOKIEPATH') && is_string(COOKIEPATH) && COOKIEPATH !== '' ? COOKIEPATH : '/';
    $domain = defined('COOKIE_DOMAIN') && is_string(COOKIE_DOMAIN) ? COOKIE_DOMAIN : '';
    $secure = is_ssl();

    if (PHP_VERSION_ID >= 70300) {
        setcookie($cookie_name, $token, [
            'expires'  => $cookie_expiry,
            'path'     => $path,
            'domain'   => $domain,
            'secure'   => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
    } else {
        setcookie($cookie_name, $token, $cookie_expiry, $path, $domain, $secure, true);
    }

    $_COOKIE[$cookie_name] = $token;
}

/**
 * Clear the guest-session cookie from the browser.
 */
function hearthstone_ops_clear_guest_session_cookie(): void
{
    $cookie_name = hearthstone_ops_get_guest_session_cookie_name();
    $path = defined('COOKIEPATH') && is_string(COOKIEPATH) && COOKIEPATH !== '' ? COOKIEPATH : '/';
    $domain = defined('COOKIE_DOMAIN') && is_string(COOKIE_DOMAIN) ? COOKIE_DOMAIN : '';
    $secure = is_ssl();

    if (PHP_VERSION_ID >= 70300) {
        setcookie($cookie_name, '', [
            'expires'  => time() - HOUR_IN_SECONDS,
            'path'     => $path,
            'domain'   => $domain,
            'secure'   => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
    } else {
        setcookie($cookie_name, '', time() - HOUR_IN_SECONDS, $path, $domain, $secure, true);
    }

    unset($_COOKIE[$cookie_name]);
}

/**
 * Resolve checkout-based session expiry timestamp for a stay.
 *
 * @param int $stay_id Stay post ID.
 */
function hearthstone_ops_get_stay_session_expiry_timestamp(int $stay_id): int
{
    $expires_at_raw = trim((string) get_post_meta($stay_id, '_hearthstone_stay_checkout_at', true));
    $expires_at = $expires_at_raw !== '' ? strtotime($expires_at_raw) : false;

    if (!is_int($expires_at) || $expires_at <= 0) {
        $check_out = trim((string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true));
        $expires_at = $check_out !== '' ? strtotime($check_out . ' 11:00:00') : false;
    }

    if (!is_int($expires_at) || $expires_at <= 0) {
        return time() + (3 * DAY_IN_SECONDS);
    }

    return $expires_at;
}

/**
 * Locate an active stay by room number and access code.
 *
 * @param string $room_number Submitted room number.
 * @param string $access_code Submitted access code.
 */
function hearthstone_ops_find_stay_for_guest_sign_in(string $room_number, string $access_code): ?WP_Post
{
    $normalized_room = strtoupper(trim($room_number));
    $normalized_code = trim($access_code);

    if ($normalized_room === '' || $normalized_code === '') {
        return null;
    }

    $candidate_ids = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'     => '_hearthstone_stay_room_number',
                'value'   => $normalized_room,
                'compare' => '=',
            ],
        ],
    ]);

    if (!is_array($candidate_ids) || empty($candidate_ids)) {
        return null;
    }

    foreach ($candidate_ids as $candidate_id) {
        $stay_id = (int) $candidate_id;

        if ($stay_id <= 0) {
            continue;
        }

        $status = sanitize_key((string) get_post_meta($stay_id, '_hearthstone_stay_status', true));

        if (!in_array($status, ['booked', 'checked_in'], true)) {
            continue;
        }

        $expires_at = hearthstone_ops_get_stay_session_expiry_timestamp($stay_id);

        if ($expires_at <= time()) {
            continue;
        }

        $access_code_hash = trim((string) get_post_meta($stay_id, '_hearthstone_stay_access_code_hash', true));

        if ($access_code_hash === '') {
            continue;
        }

        if (!wp_check_password($normalized_code, $access_code_hash, $stay_id)) {
            continue;
        }

        $stay_post = get_post($stay_id);

        if ($stay_post instanceof WP_Post && $stay_post->post_type === 'stay') {
            return $stay_post;
        }
    }

    return null;
}

/**
 * Persist and start a guest session.
 *
 * @param WP_Post $stay_post Active stay record.
 * @param string  $room_number Guest room number.
 * @param bool    $remember Whether browser persistence is requested.
 */
function hearthstone_ops_create_guest_session(WP_Post $stay_post, string $room_number, bool $remember): bool
{
    $stay_id = (int) $stay_post->ID;

    if ($stay_id <= 0) {
        return false;
    }

    $expires_at = hearthstone_ops_get_stay_session_expiry_timestamp($stay_id);

    if ($expires_at <= time()) {
        return false;
    }

    $token = wp_generate_password(40, false, false);
    $guest_id = (int) get_post_meta($stay_id, '_hearthstone_stay_guest_id', true);
    $session_payload = [
        'stay_id'     => $stay_id,
        'guest_id'    => $guest_id,
        'room_number' => strtoupper(trim($room_number)),
        'expires_at'  => $expires_at,
        'created_at'  => time(),
    ];

    $session_ttl = max(300, $expires_at - time());

    set_transient(hearthstone_ops_get_guest_session_transient_key($token), $session_payload, $session_ttl);
    hearthstone_ops_set_guest_session_cookie($token, $expires_at, $remember);

    return true;
}

/**
 * Return the current guest session payload if authenticated.
 *
 * @return array<string, int|string>|null
 */
function hearthstone_ops_get_guest_session(): ?array
{
    static $is_loaded = false;
    static $cached_session = null;

    if ($is_loaded) {
        return is_array($cached_session) ? $cached_session : null;
    }

    $is_loaded = true;
    $cookie_name = hearthstone_ops_get_guest_session_cookie_name();
    $token = isset($_COOKIE[$cookie_name]) ? sanitize_text_field((string) wp_unslash($_COOKIE[$cookie_name])) : '';

    if ($token === '') {
        return null;
    }

    $session_key = hearthstone_ops_get_guest_session_transient_key($token);
    $session_data = get_transient($session_key);

    if (!is_array($session_data)) {
        hearthstone_ops_clear_guest_session_cookie();
        return null;
    }

    $expires_at = isset($session_data['expires_at']) ? (int) $session_data['expires_at'] : 0;

    if ($expires_at > 0 && $expires_at <= time()) {
        delete_transient($session_key);
        hearthstone_ops_clear_guest_session_cookie();
        return null;
    }

    $cached_session = [
        'token'       => $token,
        'stay_id'     => isset($session_data['stay_id']) ? (int) $session_data['stay_id'] : 0,
        'guest_id'    => isset($session_data['guest_id']) ? (int) $session_data['guest_id'] : 0,
        'room_number' => isset($session_data['room_number']) ? (string) $session_data['room_number'] : '',
        'expires_at'  => $expires_at,
        'created_at'  => isset($session_data['created_at']) ? (int) $session_data['created_at'] : 0,
    ];

    return $cached_session;
}

/**
 * Clear active guest session from cookie + transient.
 */
function hearthstone_ops_clear_guest_session(): void
{
    $session = hearthstone_ops_get_guest_session();

    if (is_array($session) && isset($session['token']) && is_string($session['token']) && $session['token'] !== '') {
        delete_transient(hearthstone_ops_get_guest_session_transient_key($session['token']));
    }

    hearthstone_ops_clear_guest_session_cookie();
}

/**
 * Determine whether a guest session is active.
 */
function hearthstone_ops_is_guest_authenticated(): bool
{
    return is_array(hearthstone_ops_get_guest_session());
}

/**
 * Resolve room context for guest submissions.
 */
function hearthstone_ops_get_guest_room_context(): string
{
    $session = hearthstone_ops_get_guest_session();

    if (is_array($session) && isset($session['room_number'])) {
        $session_room = strtoupper(trim((string) $session['room_number']));

        if ($session_room !== '') {
            return $session_room;
        }
    }

    $query_room = isset($_GET['room']) ? sanitize_text_field((string) wp_unslash($_GET['room'])) : '';

    if ($query_room !== '') {
        return strtoupper(trim($query_room));
    }

    if (is_user_logged_in()) {
        $user_id = get_current_user_id();

        if ($user_id > 0) {
            $meta_candidates = [
                'hearthstone_room_number',
                '_hearthstone_room_number',
                'room_number',
            ];

            foreach ($meta_candidates as $meta_key) {
                $value = trim((string) get_user_meta($user_id, $meta_key, true));

                if ($value !== '') {
                    return strtoupper($value);
                }
            }
        }
    }

    return '';
}

/**
 * Resolve an editable room-service order for the current guest room.
 */
function hearthstone_ops_get_guest_editable_room_service_order(int $order_id, string $room_number): ?WP_Post
{
    $normalized_room = strtoupper(trim($room_number));

    if ($order_id <= 0 || $normalized_room === '') {
        return null;
    }

    $order_post = get_post($order_id);

    if (!$order_post instanceof WP_Post || $order_post->post_type !== 'room_service_order') {
        return null;
    }

    $order_room = strtoupper(trim((string) get_post_meta($order_id, '_hearthstone_order_room_number', true)));

    if ($order_room === '' || $order_room !== $normalized_room) {
        return null;
    }

    $order_status = sanitize_key((string) get_post_meta($order_id, '_hearthstone_order_status', true));

    if (!in_array($order_status, ['submitted', 'confirmed'], true)) {
        return null;
    }

    return $order_post;
}

/**
 * Build guest-facing action controls for an editable dining order.
 */
function hearthstone_ops_render_guest_room_service_order_actions(int $order_id, string $room_number): string
{
    $editable_order = hearthstone_ops_get_guest_editable_room_service_order($order_id, $room_number);

    if (!$editable_order instanceof WP_Post) {
        return '';
    }

    $dining_url = hearthstone_ops_get_guest_page_url('dining', '/dining/');
    $edit_url = add_query_arg('hearthstone_room_service_edit', $order_id, $dining_url);
    $request_uri = isset($_SERVER['REQUEST_URI']) ? (string) wp_unslash($_SERVER['REQUEST_URI']) : '';
    $return_url = $request_uri !== '' ? home_url($request_uri) : $dining_url;

    ob_start();
    ?>
    <a class="hearthstone-order-action-btn" href="<?php echo esc_url($edit_url); ?>">
        <?php esc_html_e('Edit order', 'hearthstone-ops'); ?>
    </a>
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="hearthstone-order-action-form">
        <?php wp_nonce_field('hearthstone_ops_cancel_room_service_order_action', 'hearthstone_ops_cancel_room_service_order_nonce'); ?>
        <input type="hidden" name="action" value="hearthstone_ops_cancel_room_service_order">
        <input type="hidden" name="hearthstone_room_service_order_id" value="<?php echo esc_attr((string) $order_id); ?>">
        <input type="hidden" name="hearthstone_guest_return" value="<?php echo esc_attr($return_url); ?>">
        <button type="submit" class="hearthstone-order-action-btn is-danger">
            <?php esc_html_e('Cancel order', 'hearthstone-ops'); ?>
        </button>
    </form>
    <?php

    return (string) ob_get_clean();
}

/**
 * Check whether WooCommerce checkout APIs are available.
 */
function hearthstone_ops_is_woocommerce_ready(): bool
{
    return class_exists('WooCommerce')
        && function_exists('WC')
        && function_exists('wc_get_checkout_url')
        && function_exists('wc_load_cart');
}

/**
 * Read a boolean plugin option with a fallback default.
 */
function hearthstone_ops_get_boolean_option(string $option_name, bool $default = false): bool
{
    $fallback = $default ? '1' : '0';
    $value = get_option($option_name, $fallback);

    return in_array((string) $value, ['1', 'yes', 'true', 'on'], true);
}

/**
 * Dining card checkout toggle (enabled by default when WooCommerce is available).
 */
function hearthstone_ops_is_wc_dining_checkout_enabled(): bool
{
    $enabled = hearthstone_ops_get_boolean_option('hearthstone_ops_wc_dining_checkout_enabled', true);

    return hearthstone_ops_is_woocommerce_ready()
        && (bool) apply_filters('hearthstone_ops_enable_wc_dining_checkout', $enabled);
}

/**
 * Gift-shop card checkout toggle.
 */
function hearthstone_ops_is_wc_gift_checkout_enabled(): bool
{
    $enabled = hearthstone_ops_get_boolean_option('hearthstone_ops_wc_gift_checkout_enabled', true);

    return hearthstone_ops_is_woocommerce_ready()
        && (bool) apply_filters('hearthstone_ops_enable_wc_gift_checkout', $enabled);
}

/**
 * Return WooCommerce checkout readiness details for ops admin.
 *
 * @return array{
 *   woo_ready: bool,
 *   currency: string,
 *   enabled_gateways: array<int, string>,
 *   dining_card_enabled: bool,
 *   gift_card_enabled: bool
 * }
 */
function hearthstone_ops_get_wc_checkout_readiness(): array
{
    $readiness = [
        'woo_ready'           => hearthstone_ops_is_woocommerce_ready(),
        'currency'            => '',
        'enabled_gateways'    => [],
        'dining_card_enabled' => hearthstone_ops_is_wc_dining_checkout_enabled(),
        'gift_card_enabled'   => hearthstone_ops_is_wc_gift_checkout_enabled(),
    ];

    if (!$readiness['woo_ready']) {
        return $readiness;
    }

    if (function_exists('get_woocommerce_currency')) {
        $currency = (string) get_woocommerce_currency();
        if ($currency !== '') {
            $readiness['currency'] = $currency;
        }
    }

    $wc = WC();
    if (!is_object($wc) || !method_exists($wc, 'payment_gateways')) {
        return $readiness;
    }

    $payment_gateways = $wc->payment_gateways();
    if (!is_object($payment_gateways) || !method_exists($payment_gateways, 'get_available_payment_gateways')) {
        return $readiness;
    }

    $available_gateways = $payment_gateways->get_available_payment_gateways();
    if (!is_array($available_gateways)) {
        return $readiness;
    }

    foreach ($available_gateways as $gateway) {
        if (!is_object($gateway)) {
            continue;
        }

        $gateway_title = '';
        if (isset($gateway->title)) {
            $gateway_title = trim((string) $gateway->title);
        }
        if ($gateway_title === '' && isset($gateway->id)) {
            $gateway_title = (string) $gateway->id;
        }

        if ($gateway_title !== '') {
            $readiness['enabled_gateways'][] = $gateway_title;
        }
    }

    return $readiness;
}

/**
 * Toggle guest card-checkout options from the overview page.
 */
function hearthstone_ops_update_wc_checkout_toggle(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to update checkout settings.', 'hearthstone-ops'), '', ['response' => 403]);
    }

    check_admin_referer('hearthstone_ops_update_wc_checkout_toggle_action', 'hearthstone_ops_update_wc_checkout_toggle_nonce');

    $target = isset($_POST['hearthstone_ops_checkout_target']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_ops_checkout_target'])) : '';
    $enabled = isset($_POST['hearthstone_ops_checkout_enabled']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_ops_checkout_enabled'])) : '0';

    $option_map = [
        'dining'    => 'hearthstone_ops_wc_dining_checkout_enabled',
        'gift_shop' => 'hearthstone_ops_wc_gift_checkout_enabled',
    ];

    if (!isset($option_map[$target])) {
        wp_safe_redirect(add_query_arg('hearthstone_ops_notice', 'wc_checkout_toggle_invalid', wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview')));
        exit;
    }

    $normalized_enabled = $enabled === '1' ? '1' : '0';
    update_option($option_map[$target], $normalized_enabled, false);

    wp_safe_redirect(add_query_arg([
        'hearthstone_ops_notice'           => 'wc_checkout_toggle_updated',
        'hearthstone_ops_checkout_target'  => $target,
        'hearthstone_ops_checkout_enabled' => $normalized_enabled,
    ], wp_get_referer() ?: admin_url('admin.php?page=hearthstone-ops-overview')));
    exit;
}
add_action('admin_post_hearthstone_ops_update_wc_checkout_toggle', 'hearthstone_ops_update_wc_checkout_toggle');

/**
 * Ensure WooCommerce cart/session objects are ready for checkout redirects.
 */
function hearthstone_ops_bootstrap_woocommerce_cart(): bool
{
    if (!hearthstone_ops_is_woocommerce_ready()) {
        return false;
    }

    $wc = WC();

    if (!is_object($wc)) {
        return false;
    }

    if (!isset($wc->cart) || !is_object($wc->cart)) {
        wc_load_cart();
    }

    return isset($wc->cart) && is_object($wc->cart) && method_exists($wc->cart, 'add_to_cart');
}

/**
 * Ensure a hidden WooCommerce product exists for a room-service item.
 */
function hearthstone_ops_get_or_create_wc_product_for_room_service_item(int $item_id): int
{
    if (!hearthstone_ops_is_woocommerce_ready() || $item_id <= 0) {
        return 0;
    }

    $item_post = get_post($item_id);

    if (!$item_post instanceof WP_Post || $item_post->post_type !== 'room_service_item') {
        return 0;
    }

    $price_raw = (string) get_post_meta($item_id, '_hearthstone_room_service_price', true);
    $price = $price_raw !== '' ? (float) $price_raw : 0.0;
    $mapped_product_id = (int) get_post_meta($item_id, '_hearthstone_wc_product_id', true);
    $product = $mapped_product_id > 0 ? wc_get_product($mapped_product_id) : null;

    if (!($product instanceof WC_Product)) {
        $product = new WC_Product_Simple();
        $product->set_status('publish');
        $product->set_catalog_visibility('hidden');
        $product->set_virtual(true);
        $product->set_manage_stock(false);
        $product->set_sku('hearthstone-rs-' . $item_id);
    }

    $product->set_name((string) $item_post->post_title);
    $product->set_description((string) $item_post->post_content);
    $product->set_regular_price(number_format($price, 2, '.', ''));
    $product->set_price(number_format($price, 2, '.', ''));
    $product->set_catalog_visibility('hidden');
    $product->set_virtual(true);
    $saved_product_id = (int) $product->save();

    if ($saved_product_id <= 0) {
        return 0;
    }

    update_post_meta($saved_product_id, '_hearthstone_ops_source_type', 'room_service_item');
    update_post_meta($saved_product_id, '_hearthstone_ops_source_id', $item_id);
    update_post_meta($item_id, '_hearthstone_wc_product_id', $saved_product_id);

    return $saved_product_id;
}

/**
 * Ensure a hidden WooCommerce product exists for a gift-shop catalog item.
 */
function hearthstone_ops_get_or_create_wc_product_for_gift_item(string $item_key, array $catalog_item): int
{
    if (!hearthstone_ops_is_woocommerce_ready()) {
        return 0;
    }

    $normalized_key = sanitize_key($item_key);

    if ($normalized_key === '') {
        return 0;
    }

    $map = get_option('hearthstone_ops_wc_gift_product_map', []);
    $map = is_array($map) ? $map : [];
    $mapped_product_id = isset($map[$normalized_key]) ? absint($map[$normalized_key]) : 0;
    $product = $mapped_product_id > 0 ? wc_get_product($mapped_product_id) : null;

    if (!($product instanceof WC_Product)) {
        $product = new WC_Product_Simple();
        $product->set_status('publish');
        $product->set_catalog_visibility('hidden');
        $product->set_virtual(true);
        $product->set_manage_stock(false);
        $product->set_sku('hearthstone-gift-' . $normalized_key);
    }

    $label = isset($catalog_item['label']) ? (string) $catalog_item['label'] : $normalized_key;
    $description = isset($catalog_item['description']) ? (string) $catalog_item['description'] : '';
    $price = isset($catalog_item['price']) ? (float) $catalog_item['price'] : 0.0;

    $product->set_name($label);
    $product->set_description($description);
    $product->set_regular_price(number_format($price, 2, '.', ''));
    $product->set_price(number_format($price, 2, '.', ''));
    $product->set_catalog_visibility('hidden');
    $product->set_virtual(true);
    $saved_product_id = (int) $product->save();

    if ($saved_product_id <= 0) {
        return 0;
    }

    update_post_meta($saved_product_id, '_hearthstone_ops_source_type', 'gift_shop_catalog');
    update_post_meta($saved_product_id, '_hearthstone_ops_source_key', $normalized_key);
    $map[$normalized_key] = $saved_product_id;
    update_option('hearthstone_ops_wc_gift_product_map', $map, false);

    return $saved_product_id;
}

/**
 * Begin WooCommerce checkout for a validated room-service cart.
 *
 * @param array<int, int> $validated_cart
 */
function hearthstone_ops_start_room_service_woocommerce_checkout(
    array $validated_cart,
    string $room,
    string $delivery_method,
    string $requested_time,
    int $tip_percent,
    string $order_notes,
    string $redirect_url
): void {
    if (!hearthstone_ops_bootstrap_woocommerce_cart()) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'woo_unavailable', $redirect_url));
        exit;
    }

    $wc = WC();

    if (!is_object($wc) || !isset($wc->cart) || !is_object($wc->cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'woo_unavailable', $redirect_url));
        exit;
    }

    $wc->cart->empty_cart();
    $checkout_cart = [];

    foreach ($validated_cart as $item_id => $qty) {
        $product_id = hearthstone_ops_get_or_create_wc_product_for_room_service_item((int) $item_id);

        if ($product_id <= 0 || $qty <= 0) {
            continue;
        }

        $added = $wc->cart->add_to_cart(
            $product_id,
            $qty,
            0,
            [],
            [
                'hearthstone_source_type' => 'dining',
                'hearthstone_source_item_id' => (int) $item_id,
            ]
        );

        if ($added) {
            $checkout_cart[(int) $item_id] = $qty;
        }
    }

    if (empty($checkout_cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    if (isset($wc->session) && is_object($wc->session)) {
        $wc->session->set('hearthstone_guest_checkout_context', [
            'source_type'     => 'dining',
            'room_number'     => strtoupper(trim($room)),
            'cart'            => $checkout_cart,
            'delivery_method' => sanitize_key($delivery_method),
            'requested_time'  => $requested_time,
            'tip_percent'     => max(0, $tip_percent),
            'notes'           => $order_notes,
            'return_url'      => hearthstone_ops_get_guest_page_url('dining', '/dining/'),
            'created_at'      => time(),
        ]);
    }

    wp_safe_redirect((string) wc_get_checkout_url());
    exit;
}

/**
 * Begin WooCommerce checkout for a validated gift-shop cart.
 *
 * @param array<string, int> $validated_cart
 */
function hearthstone_ops_start_gift_shop_woocommerce_checkout(
    array $validated_cart,
    array $catalog,
    string $room,
    string $fulfillment_method,
    string $fulfillment_window,
    string $guest_notes,
    string $redirect_url
): void {
    if (!hearthstone_ops_bootstrap_woocommerce_cart()) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'woo_unavailable', $redirect_url));
        exit;
    }

    $wc = WC();

    if (!is_object($wc) || !isset($wc->cart) || !is_object($wc->cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'woo_unavailable', $redirect_url));
        exit;
    }

    $wc->cart->empty_cart();
    $checkout_cart = [];

    foreach ($validated_cart as $item_key => $qty) {
        if (!isset($catalog[$item_key]) || $qty <= 0) {
            continue;
        }

        $product_id = hearthstone_ops_get_or_create_wc_product_for_gift_item($item_key, (array) $catalog[$item_key]);

        if ($product_id <= 0) {
            continue;
        }

        $added = $wc->cart->add_to_cart(
            $product_id,
            $qty,
            0,
            [],
            [
                'hearthstone_source_type' => 'gift_shop',
                'hearthstone_source_item_key' => $item_key,
            ]
        );

        if ($added) {
            $checkout_cart[$item_key] = $qty;
        }
    }

    if (empty($checkout_cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    if (isset($wc->session) && is_object($wc->session)) {
        $wc->session->set('hearthstone_guest_checkout_context', [
            'source_type'        => 'gift_shop',
            'room_number'        => strtoupper(trim($room)),
            'cart'               => $checkout_cart,
            'fulfillment_method' => sanitize_key($fulfillment_method),
            'fulfillment_window' => $fulfillment_window,
            'notes'              => $guest_notes,
            'return_url'         => hearthstone_ops_get_guest_page_url('gift-shop', '/gift-shop/'),
            'created_at'         => time(),
        ]);
    }

    wp_safe_redirect((string) wc_get_checkout_url());
    exit;
}

/**
 * Get checkout context from Woo session.
 *
 * @return array<string, mixed>|null
 */
function hearthstone_ops_get_wc_guest_checkout_context(): ?array
{
    if (!hearthstone_ops_is_woocommerce_ready()) {
        return null;
    }

    $wc = WC();

    if (!is_object($wc) || !isset($wc->session) || !is_object($wc->session)) {
        return null;
    }

    $context = $wc->session->get('hearthstone_guest_checkout_context');

    if (!is_array($context)) {
        return null;
    }

    return $context;
}

/**
 * Stamp checkout context metadata onto Woo orders before placement.
 *
 * @param object      $order Woo order object.
 * @param array<mixed> $data  Posted checkout data.
 */
function hearthstone_ops_attach_checkout_context_to_wc_order($order, array $data): void
{
    if (!is_object($order) || !method_exists($order, 'update_meta_data')) {
        return;
    }

    $context = hearthstone_ops_get_wc_guest_checkout_context();

    if (!is_array($context)) {
        return;
    }

    $source_type = isset($context['source_type']) ? sanitize_key((string) $context['source_type']) : '';
    $room_number = isset($context['room_number']) ? strtoupper(trim((string) $context['room_number'])) : '';

    if (!in_array($source_type, ['dining', 'gift_shop'], true)) {
        return;
    }

    $order->update_meta_data('_hearthstone_ops_source_type', $source_type);
    $order->update_meta_data('_hearthstone_ops_room_number', $room_number);
}
add_action('woocommerce_checkout_create_order', 'hearthstone_ops_attach_checkout_context_to_wc_order', 20, 2);

/**
 * Add restaurant tip as WooCommerce checkout fee.
 */
function hearthstone_ops_add_wc_dining_tip_fee($cart): void
{
    if (!hearthstone_ops_is_woocommerce_ready() || !is_object($cart) || !method_exists($cart, 'add_fee')) {
        return;
    }

    if (is_admin() && !wp_doing_ajax()) {
        return;
    }

    $context = hearthstone_ops_get_wc_guest_checkout_context();

    if (!is_array($context)) {
        return;
    }

    $source_type = isset($context['source_type']) ? sanitize_key((string) $context['source_type']) : '';
    $tip_percent = isset($context['tip_percent']) ? max(0, absint($context['tip_percent'])) : 0;

    if ($source_type !== 'dining' || $tip_percent <= 0) {
        return;
    }

    if (!method_exists($cart, 'get_subtotal')) {
        return;
    }

    $subtotal = (float) $cart->get_subtotal();

    if ($subtotal <= 0) {
        return;
    }

    $tip_amount = $subtotal * ($tip_percent / 100);

    if ($tip_amount <= 0) {
        return;
    }

    $cart->add_fee(sprintf(__('Dining tip (%d%%)', 'hearthstone-ops'), $tip_percent), $tip_amount, false);
}
add_action('woocommerce_cart_calculate_fees', 'hearthstone_ops_add_wc_dining_tip_fee', 20, 1);

/**
 * Return guests to the app after Woo checkout completion.
 */
function hearthstone_ops_filter_wc_order_received_url(string $url, $order): string
{
    if (!is_object($order) || !method_exists($order, 'get_meta') || !method_exists($order, 'get_id')) {
        return $url;
    }

    $source_type = sanitize_key((string) $order->get_meta('_hearthstone_ops_source_type', true));
    $synced_order_id = (int) $order->get_meta('_hearthstone_ops_synced_order_id', true);

    if ($source_type === 'dining') {
        return add_query_arg([
            'hearthstone_room_service'       => 'submitted',
            'hearthstone_room_service_order' => max(0, $synced_order_id),
            'wc_order'                 => (int) $order->get_id(),
        ], hearthstone_ops_get_guest_page_url('dining', '/dining/'));
    }

    if ($source_type === 'gift_shop') {
        return add_query_arg([
            'hearthstone_gift_shop'  => 'submitted',
            'hearthstone_gift_order' => max(0, $synced_order_id),
            'wc_order'         => (int) $order->get_id(),
        ], hearthstone_ops_get_guest_page_url('gift-shop', '/gift-shop/'));
    }

    return $url;
}
add_filter('woocommerce_get_checkout_order_received_url', 'hearthstone_ops_filter_wc_order_received_url', 20, 2);

/**
 * Mirror WooCommerce checkout orders into ops records for dashboards.
 *
 * @param int         $wc_order_id WooCommerce order ID.
 * @param string      $posted_data Raw posted checkout data.
 * @param object|null $wc_order    WooCommerce order object.
 */
function hearthstone_ops_sync_wc_checkout_context_to_ops_order(int $wc_order_id, string $posted_data, $wc_order): void
{
    if (!hearthstone_ops_is_woocommerce_ready() || !is_object($wc_order) || !method_exists($wc_order, 'get_meta')) {
        return;
    }

    if ((int) $wc_order->get_meta('_hearthstone_ops_synced_order_id', true) > 0) {
        return;
    }

    $wc = WC();

    if (!is_object($wc) || !isset($wc->session) || !is_object($wc->session)) {
        return;
    }

    $context = $wc->session->get('hearthstone_guest_checkout_context');

    if (!is_array($context)) {
        return;
    }

    $source_type = isset($context['source_type']) ? sanitize_key((string) $context['source_type']) : '';
    $room_number = isset($context['room_number']) ? strtoupper(trim((string) $context['room_number'])) : '';
    $cart = isset($context['cart']) && is_array($context['cart']) ? (array) $context['cart'] : [];
    $synced_record_id = 0;

    if ($source_type === 'dining' && !empty($cart)) {
        $validated_cart = [];
        $order_note_lines = [];
        $total_qty = 0;

        foreach ($cart as $item_id_raw => $qty_raw) {
            $item_id = absint((string) $item_id_raw);
            $qty = max(0, absint($qty_raw));

            if ($item_id <= 0 || $qty <= 0) {
                continue;
            }

            $item_post = get_post($item_id);

            if (!$item_post instanceof WP_Post || $item_post->post_type !== 'room_service_item') {
                continue;
            }

            $validated_cart[$item_id] = $qty;
            $total_qty += $qty;
            $order_note_lines[] = sprintf(
                __('%1$s x%2$d', 'hearthstone-ops'),
                (string) $item_post->post_title,
                $qty
            );
        }

        if (!empty($validated_cart)) {
            $tip_percent = isset($context['tip_percent']) ? max(0, absint($context['tip_percent'])) : 0;
            $requested_time = isset($context['requested_time']) ? sanitize_text_field((string) $context['requested_time']) : '';
            $notes = isset($context['notes']) ? sanitize_textarea_field((string) $context['notes']) : '';
            $delivery_method = isset($context['delivery_method']) ? sanitize_key((string) $context['delivery_method']) : 'room_delivery';

            if ($notes !== '') {
                $order_note_lines[] = __('Guest notes:', 'hearthstone-ops') . ' ' . $notes;
            }

            $synced_record_id = (int) wp_insert_post([
                'post_type'    => 'room_service_order',
                'post_status'  => 'publish',
                'post_title'   => sprintf(__('Room %1$s - Woo Order #%2$d', 'hearthstone-ops'), $room_number !== '' ? $room_number : 'N/A', $wc_order_id),
                'post_content' => implode("\n", $order_note_lines),
            ], true);

            if ($synced_record_id > 0) {
                update_post_meta($synced_record_id, '_hearthstone_order_item_id', (int) array_key_first($validated_cart));
                update_post_meta($synced_record_id, '_hearthstone_order_quantity', $total_qty);
                update_post_meta($synced_record_id, '_hearthstone_order_items_json', wp_json_encode($validated_cart));
                update_post_meta($synced_record_id, '_hearthstone_order_room_number', $room_number);
                update_post_meta($synced_record_id, '_hearthstone_order_delivery_method', $delivery_method);
                update_post_meta($synced_record_id, '_hearthstone_order_requested_time', $requested_time);
                update_post_meta($synced_record_id, '_hearthstone_order_tip_percent', $tip_percent);
                update_post_meta($synced_record_id, '_hearthstone_order_notes', $notes);
                update_post_meta($synced_record_id, '_hearthstone_order_subtotal', number_format((float) $wc_order->get_subtotal(), 2, '.', ''));
                update_post_meta($synced_record_id, '_hearthstone_order_total', number_format((float) $wc_order->get_total(), 2, '.', ''));
                update_post_meta($synced_record_id, '_hearthstone_order_status', 'submitted');
                update_post_meta($synced_record_id, '_hearthstone_wc_order_id', $wc_order_id);
            }
        }
    } elseif ($source_type === 'gift_shop' && !empty($cart)) {
        $catalog = hearthstone_ops_get_gift_shop_catalog();
        $validated_cart = [];
        $order_note_lines = [];
        $total_qty = 0;

        foreach ($cart as $item_key_raw => $qty_raw) {
            $item_key = sanitize_key((string) $item_key_raw);
            $qty = max(0, absint($qty_raw));

            if ($item_key === '' || $qty <= 0 || !isset($catalog[$item_key])) {
                continue;
            }

            $label = isset($catalog[$item_key]['label']) ? (string) $catalog[$item_key]['label'] : $item_key;
            $validated_cart[$item_key] = $qty;
            $total_qty += $qty;
            $order_note_lines[] = sprintf(
                __('%1$s x%2$d', 'hearthstone-ops'),
                $label,
                $qty
            );
        }

        if (!empty($validated_cart)) {
            $notes = isset($context['notes']) ? sanitize_textarea_field((string) $context['notes']) : '';
            $fulfillment_method = isset($context['fulfillment_method']) ? sanitize_key((string) $context['fulfillment_method']) : 'room_delivery';
            $fulfillment_window = isset($context['fulfillment_window']) ? sanitize_text_field((string) $context['fulfillment_window']) : '';

            if ($notes !== '') {
                $order_note_lines[] = __('Guest notes:', 'hearthstone-ops') . ' ' . $notes;
            }

            $synced_record_id = (int) wp_insert_post([
                'post_type'    => 'gift_shop_order',
                'post_status'  => 'publish',
                'post_title'   => sprintf(__('Room %1$s - Woo Gift Order #%2$d', 'hearthstone-ops'), $room_number !== '' ? $room_number : 'N/A', $wc_order_id),
                'post_content' => implode("\n", $order_note_lines),
            ], true);

            if ($synced_record_id > 0) {
                update_post_meta($synced_record_id, '_hearthstone_gift_item_key', (string) array_key_first($validated_cart));
                update_post_meta($synced_record_id, '_hearthstone_gift_quantity', $total_qty);
                update_post_meta($synced_record_id, '_hearthstone_gift_items_json', wp_json_encode($validated_cart));
                update_post_meta($synced_record_id, '_hearthstone_gift_room_number', $room_number);
                update_post_meta($synced_record_id, '_hearthstone_gift_fulfillment_method', $fulfillment_method);
                update_post_meta($synced_record_id, '_hearthstone_gift_fulfillment_window', $fulfillment_window);
                update_post_meta($synced_record_id, '_hearthstone_gift_guest_notes', $notes);
                update_post_meta($synced_record_id, '_hearthstone_gift_total', number_format((float) $wc_order->get_total(), 2, '.', ''));
                update_post_meta($synced_record_id, '_hearthstone_gift_order_status', 'submitted');
                update_post_meta($synced_record_id, '_hearthstone_wc_order_id', $wc_order_id);
            }
        }
    }

    if ($synced_record_id > 0) {
        $wc_order->update_meta_data('_hearthstone_ops_synced_order_id', $synced_record_id);
        $wc_order->update_meta_data('_hearthstone_ops_source_type', $source_type);
        $wc_order->update_meta_data('_hearthstone_ops_room_number', $room_number);
        $wc_order->save();
    }

    $wc->session->set('hearthstone_guest_checkout_context', null);
}
add_action('woocommerce_checkout_order_processed', 'hearthstone_ops_sync_wc_checkout_context_to_ops_order', 20, 3);

/**
 * Map WooCommerce order states into ops workflow states.
 */
function hearthstone_ops_map_wc_status_to_ops_status(string $wc_status, string $source_type): string
{
    $normalized_wc_status = sanitize_key($wc_status);
    $normalized_source_type = sanitize_key($source_type);

    if ($normalized_source_type === 'gift_shop') {
        $gift_map = [
            'pending'    => 'submitted',
            'on-hold'    => 'submitted',
            'failed'     => 'submitted',
            'processing' => 'preparing',
            'completed'  => 'completed',
            'cancelled'  => 'cancelled',
            'refunded'   => 'cancelled',
        ];

        return $gift_map[$normalized_wc_status] ?? 'submitted';
    }

    $dining_map = [
        'pending'    => 'submitted',
        'on-hold'    => 'submitted',
        'failed'     => 'submitted',
        'processing' => 'confirmed',
        'completed'  => 'completed',
        'cancelled'  => 'cancelled',
        'refunded'   => 'cancelled',
    ];

    return $dining_map[$normalized_wc_status] ?? 'submitted';
}

/**
 * Keep ops order status aligned with WooCommerce status updates.
 *
 * @param int         $wc_order_id Woo order ID.
 * @param string      $old_status Previous WC status.
 * @param string      $new_status Updated WC status.
 * @param object|null $order Woo order object.
 */
function hearthstone_ops_sync_wc_status_to_ops_order(int $wc_order_id, string $old_status, string $new_status, $order): void
{
    if (!is_object($order) || !method_exists($order, 'get_meta')) {
        return;
    }

    $synced_order_id = (int) $order->get_meta('_hearthstone_ops_synced_order_id', true);

    if ($synced_order_id <= 0) {
        return;
    }

    $source_type = sanitize_key((string) $order->get_meta('_hearthstone_ops_source_type', true));

    if ($source_type === 'gift_shop') {
        update_post_meta($synced_order_id, '_hearthstone_gift_order_status', hearthstone_ops_map_wc_status_to_ops_status($new_status, 'gift_shop'));
        return;
    }

    update_post_meta($synced_order_id, '_hearthstone_order_status', hearthstone_ops_map_wc_status_to_ops_status($new_status, 'dining'));
}
add_action('woocommerce_order_status_changed', 'hearthstone_ops_sync_wc_status_to_ops_order', 20, 4);

/**
 * Print cart interaction script one time per response.
 */
function hearthstone_ops_print_guest_cart_script_once(): void
{
    static $printed = false;

    if ($printed) {
        return;
    }

    $printed = true;
    ?>
    <script>
    (function () {
        var roots = document.querySelectorAll('[data-cart-app]');

        if (!roots.length) {
            return;
        }

        var trashIcon = '<span class="dashicons dashicons-trash" aria-hidden="true"></span>';

        roots.forEach(function (root) {
            var cards = root.querySelectorAll('[data-cart-item]');
            var cartInputs = root.querySelectorAll('[data-cart-input]');
            var summary = root.querySelector('[data-cart-summary]');
            var totalNode = root.querySelector('[data-cart-total]');
            var submitButtons = root.querySelectorAll('[data-cart-submit]');
            var checkoutModeInput = root.querySelector('[data-checkout-mode-input]');

            if (!cards.length || !cartInputs.length || !summary || !totalNode || !submitButtons.length) {
                return;
            }

            var primaryCartInput = cartInputs[0];
            var initialCart = {};
            var cart = {};

            try {
                initialCart = JSON.parse(String(primaryCartInput.value || '{}')) || {};
            } catch (error) {
                initialCart = {};
            }

            submitButtons.forEach(function (submitButton) {
                var baseLabel = String(submitButton.getAttribute('data-base-label') || submitButton.textContent || '').trim();
                submitButton.setAttribute('data-base-label', baseLabel);
                submitButton.setAttribute('aria-pressed', 'false');
            });

            var hasCheckoutMode = function (mode) {
                var normalizedMode = String(mode || 'ops');
                for (var index = 0; index < submitButtons.length; index += 1) {
                    if (String(submitButtons[index].getAttribute('data-checkout-mode') || 'ops') === normalizedMode) {
                        return true;
                    }
                }
                return false;
            };

            var resolveCheckoutMode = function (mode) {
                var requestedMode = String(mode || 'ops');
                if (hasCheckoutMode(requestedMode)) {
                    return requestedMode;
                }
                return hasCheckoutMode('ops') ? 'ops' : requestedMode;
            };

            var setCheckoutMode = function (mode) {
                if (!checkoutModeInput) {
                    return;
                }

                var activeMode = resolveCheckoutMode(mode);
                checkoutModeInput.value = activeMode;

                submitButtons.forEach(function (submitButton) {
                    var buttonMode = String(submitButton.getAttribute('data-checkout-mode') || 'ops');
                    var isActiveMode = buttonMode === activeMode;
                    submitButton.classList.toggle('is-mode-active', isActiveMode);
                    submitButton.setAttribute('aria-pressed', isActiveMode ? 'true' : 'false');
                });
            };

            root.addEventListener('click', function (event) {
                var modeTrigger = event.target.closest('[data-checkout-mode]');

                if (!modeTrigger || !checkoutModeInput) {
                    return;
                }

                setCheckoutMode(String(modeTrigger.getAttribute('data-checkout-mode') || 'ops'));
            });

            var setCartValue = function (value) {
                cartInputs.forEach(function (cartInput) {
                    cartInput.value = value;
                });
            };

            var setSubmitDisabled = function (isDisabled) {
                submitButtons.forEach(function (submitButton) {
                    submitButton.disabled = isDisabled;
                });
            };

            var setSubmitLabels = function (hasItems, itemCount, total) {
                submitButtons.forEach(function (submitButton) {
                    var baseLabel = String(submitButton.getAttribute('data-base-label') || submitButton.textContent || '').trim();

                    if (!hasItems) {
                        submitButton.textContent = baseLabel;
                        return;
                    }

                    var checkoutMode = String(submitButton.getAttribute('data-checkout-mode') || 'ops');

                    if (checkoutMode === 'woocommerce') {
                        submitButton.textContent = baseLabel + ' - $' + total.toFixed(2);
                        return;
                    }

                    submitButton.textContent = baseLabel + ' - ' + itemCount + ' item' + (itemCount === 1 ? '' : 's');
                });
            };

            var setQtyOnCard = function (card, qty) {
                var qtyNode = card.querySelector('[data-qty]');
                var clearBtn = card.querySelector('[data-action="clear"]');

                if (qtyNode) {
                    qtyNode.textContent = String(qty);
                }

                if (clearBtn) {
                    clearBtn.hidden = qty <= 0;
                }
            };

            var getItemData = function (card) {
                return {
                    id: String(card.getAttribute('data-item-id') || ''),
                    title: String(card.getAttribute('data-item-title') || ''),
                    price: parseFloat(String(card.getAttribute('data-item-price') || '0')) || 0
                };
            };

            var escapeHtml = function (value) {
                return String(value)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            };

            var recalculate = function () {
                var lines = [];
                var total = 0;
                var itemCount = 0;

                cards.forEach(function (card) {
                    var item = getItemData(card);
                    var qty = parseInt(String(cart[item.id] || 0), 10);

                    if (!item.id || qty <= 0) {
                        setQtyOnCard(card, 0);
                        return;
                    }

                    setQtyOnCard(card, qty);
                    total += item.price * qty;
                    itemCount += qty;
                    lines.push({
                        id: item.id,
                        title: item.title,
                        qty: qty,
                        subtotal: item.price * qty
                    });
                });

                if (!lines.length) {
                    summary.innerHTML = '<p class="hearthstone-order-meta">No items selected yet.</p>';
                    setSubmitDisabled(true);
                    setCartValue('{}');
                    totalNode.textContent = '$0.00';
                    setSubmitLabels(false, 0, 0);
                    return;
                }

                setSubmitDisabled(false);
                setCartValue(JSON.stringify(cart));
                totalNode.textContent = '$' + total.toFixed(2);
                setSubmitLabels(true, itemCount, total);

                var html = '<ul class="hearthstone-cart-lines">';

                lines.forEach(function (line) {
                    html += '<li class="hearthstone-cart-line">';
                    html += '<div class="hearthstone-cart-line__info"><strong>' + escapeHtml(line.title) + '</strong><span>x' + line.qty + ' - $' + line.subtotal.toFixed(2) + '</span></div>';
                    html += '<button type="button" class="hearthstone-cart-remove" data-remove-id="' + line.id + '" aria-label="Remove item">' + trashIcon + '</button>';
                    html += '</li>';
                });

                html += '</ul>';
                summary.innerHTML = html;
            };

            cards.forEach(function (card) {
                var item = getItemData(card);

                if (!item.id) {
                    return;
                }

                var initialQty = parseInt(String(initialCart[item.id] || 0), 10);

                if (isNaN(initialQty) || initialQty < 0) {
                    initialQty = 0;
                }

                cart[item.id] = initialQty;
                setQtyOnCard(card, initialQty);

                card.addEventListener('click', function (event) {
                    var trigger = event.target.closest('button[data-action]');

                    if (!trigger) {
                        return;
                    }

                    var action = trigger.getAttribute('data-action');
                    var currentQty = parseInt(String(cart[item.id] || 0), 10);

                    if (action === 'increment') {
                        cart[item.id] = currentQty + 1;
                    } else if (action === 'decrement') {
                        cart[item.id] = Math.max(0, currentQty - 1);
                    } else if (action === 'clear') {
                        cart[item.id] = 0;
                    }

                    recalculate();
                });
            });

            summary.addEventListener('click', function (event) {
                var removeButton = event.target.closest('[data-remove-id]');

                if (!removeButton) {
                    return;
                }

                var removeId = String(removeButton.getAttribute('data-remove-id') || '');

                if (removeId && Object.prototype.hasOwnProperty.call(cart, removeId)) {
                    cart[removeId] = 0;
                    recalculate();
                }
            });

            if (checkoutModeInput) {
                setCheckoutMode(String(checkoutModeInput.value || 'ops'));
            }

            recalculate();
        });
    }());
    </script>
    <?php
}

/**
 * Render guest room-service app shortcode.
 *
 * Usage: [hearthstone_room_service_app]
 *
 * @return string
 */
function hearthstone_ops_render_room_service_app_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $items = hearthstone_ops_get_available_room_service_items();
    $notice_key = isset($_GET['hearthstone_room_service']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_room_service'])) : '';
    $order_ref  = isset($_GET['hearthstone_room_service_order']) ? absint($_GET['hearthstone_room_service_order']) : 0;
    $has_woocommerce = hearthstone_ops_is_wc_dining_checkout_enabled();
    $room_number = hearthstone_ops_get_guest_room_context();
    $edit_order_id = isset($_GET['hearthstone_room_service_edit']) ? absint($_GET['hearthstone_room_service_edit']) : 0;
    $editable_order = hearthstone_ops_get_guest_editable_room_service_order($edit_order_id, $room_number);
    $editing_order_id = $editable_order instanceof WP_Post ? (int) $editable_order->ID : 0;
    $edit_locked = $edit_order_id > 0 && $editing_order_id <= 0;
    $dining_page_url = hearthstone_ops_get_guest_page_url('dining', '/dining/');
    $initial_cart_json = '{}';
    $initial_delivery_method = 'room_delivery';
    $initial_requested_time = '';
    $initial_tip_percent = 0;
    $initial_notes = '';

    if ($editing_order_id > 0) {
        $editable_line_items = hearthstone_ops_get_room_service_order_line_items($editing_order_id);
        $initial_cart = [];

        foreach ($editable_line_items as $line_item) {
            $line_item_id = isset($line_item['item_id']) ? (int) $line_item['item_id'] : 0;
            $line_item_qty = isset($line_item['qty']) ? max(0, (int) $line_item['qty']) : 0;

            if ($line_item_id <= 0 || $line_item_qty <= 0) {
                continue;
            }

            $initial_cart[$line_item_id] = $line_item_qty;
        }

        if (!empty($initial_cart)) {
            $initial_cart_json = (string) wp_json_encode($initial_cart);
        }

        $delivery_method_meta = sanitize_key((string) get_post_meta($editing_order_id, '_hearthstone_order_delivery_method', true));

        if (in_array($delivery_method_meta, ['room_delivery', 'pickup'], true)) {
            $initial_delivery_method = $delivery_method_meta;
        }

        $initial_requested_time = sanitize_text_field((string) get_post_meta($editing_order_id, '_hearthstone_order_requested_time', true));
        $initial_tip_percent = (int) get_post_meta($editing_order_id, '_hearthstone_order_tip_percent', true);

        if (!in_array($initial_tip_percent, [0, 10, 15, 20], true)) {
            $initial_tip_percent = 0;
        }

        $initial_notes = sanitize_textarea_field((string) get_post_meta($editing_order_id, '_hearthstone_order_notes', true));
    }

    ob_start();
    ?>
    <section class="hearthstone-room-service-app hearthstone-service-app" data-cart-app="room-service" style="margin:0 auto;max-width:1160px;">
        <?php if ($notice_key === 'submitted' && $order_ref > 0) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--success">
                <?php
                printf(
                    esc_html__('Order submitted. Reference #%d. Front desk will keep you updated.', 'hearthstone-ops'),
                    $order_ref
                );
                ?>
                <a href="<?php echo esc_url(add_query_arg('hearthstone_room_service_edit', $order_ref, $dining_page_url)); ?>"><?php esc_html_e('Review or edit order', 'hearthstone-ops'); ?></a>
            </div>
        <?php elseif ($notice_key === 'updated' && $order_ref > 0) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--success">
                <?php
                printf(
                    esc_html__('Order #%d updated. Front desk has the latest version.', 'hearthstone-ops'),
                    $order_ref
                );
                ?>
                <a href="<?php echo esc_url(add_query_arg('hearthstone_room_service_edit', $order_ref, $dining_page_url)); ?>"><?php esc_html_e('Review order again', 'hearthstone-ops'); ?></a>
            </div>
        <?php elseif ($notice_key === 'invalid_item') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('That menu item is currently unavailable. Please choose another item.', 'hearthstone-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'woo_unavailable') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('Card checkout is unavailable right now. Please submit as room charge.', 'hearthstone-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'edit_locked') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('This order cannot be edited anymore. Please contact front desk for changes.', 'hearthstone-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'cancelled' && $order_ref > 0) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--success">
                <?php
                printf(
                    esc_html__('Order #%d cancelled.', 'hearthstone-ops'),
                    $order_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'cancel_locked') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('This order can no longer be cancelled in the app. Please contact front desk.', 'hearthstone-ops'); ?>
            </div>
        <?php elseif ($edit_locked) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('That order can no longer be edited in the app. Please contact front desk for changes.', 'hearthstone-ops'); ?>
            </div>
        <?php endif; ?>
        <?php
        $tracked_order_card = '';

        if ($order_ref > 0) {
            $tracked_order_card = hearthstone_ops_render_guest_order_confirmation_card('dining', $order_ref, $room_number);
        }

        if ($tracked_order_card !== '') {
            echo $tracked_order_card; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } elseif ($order_ref > 0) {
            ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('That order is not available for this stay session.', 'hearthstone-ops'); ?>
            </div>
            <?php
        }
        ?>

        <?php if (empty($items)) : ?>
            <p><?php esc_html_e('Room service menu is currently being updated. Please contact the front desk.', 'hearthstone-ops'); ?></p>
        <?php else : ?>
            <div class="hearthstone-service-app__layout">
                <div class="hearthstone-service-app__catalog">
                    <h3 class="hearthstone-service-app__heading"><?php esc_html_e('Menu', 'hearthstone-ops'); ?></h3>
                    <div class="hearthstone-order-grid hearthstone-order-grid--restaurant">
                        <?php foreach ($items as $item) : ?>
                            <?php
                            $item_id      = (int) $item->ID;
                            $price        = (string) get_post_meta($item_id, '_hearthstone_room_service_price', true);
                            $prep_minutes = (int) get_post_meta($item_id, '_hearthstone_room_service_prep_minutes', true);
                            $image_url    = (string) get_post_meta($item_id, '_hearthstone_room_service_image_url', true);
                            ?>
                            <article class="hearthstone-order-card">
                                <?php if ($image_url !== '') : ?>
                                    <div class="hearthstone-order-card__media">
                                        <img
                                            src="<?php echo esc_url($image_url); ?>"
                                            alt="<?php echo esc_attr((string) $item->post_title); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </div>
                                <?php endif; ?>
                                <h3><?php echo esc_html((string) $item->post_title); ?></h3>
                                <?php if (trim((string) $item->post_content) !== '') : ?>
                                    <p class="hearthstone-order-meta"><?php echo esc_html(wp_strip_all_tags((string) $item->post_content)); ?></p>
                                <?php endif; ?>
                                <div class="hearthstone-order-card__meta-row">
                                    <?php if ($price !== '') : ?>
                                        <p class="hearthstone-order-price">
                                            <?php
                                            printf(
                                                esc_html__('$%s', 'hearthstone-ops'),
                                                esc_html(number_format((float) $price, 2))
                                            );
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if ($prep_minutes > 0) : ?>
                                        <p class="hearthstone-order-chip">
                                            <?php
                                            printf(
                                                esc_html__('%d min', 'hearthstone-ops'),
                                                $prep_minutes
                                            );
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div
                                    class="hearthstone-item-stepper"
                                    data-cart-item
                                    data-item-id="<?php echo esc_attr((string) $item_id); ?>"
                                    data-item-title="<?php echo esc_attr((string) $item->post_title); ?>"
                                    data-item-price="<?php echo esc_attr($price !== '' ? (string) ((float) $price) : '0'); ?>"
                                >
                                    <button type="button" class="hearthstone-step-btn" data-action="decrement" aria-label="<?php esc_attr_e('Decrease quantity', 'hearthstone-ops'); ?>">-</button>
                                    <span class="hearthstone-step-qty" data-qty>0</span>
                                    <button type="button" class="hearthstone-step-btn" data-action="increment" aria-label="<?php esc_attr_e('Increase quantity', 'hearthstone-ops'); ?>">+</button>
                                    <button type="button" class="hearthstone-step-clear" data-action="clear" hidden aria-label="<?php esc_attr_e('Remove item', 'hearthstone-ops'); ?>">
                                        <span class="dashicons dashicons-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <aside class="hearthstone-service-app__panel">
                    <div class="hearthstone-card hearthstone-order-panel">
                        <h3 class="hearthstone-service-app__heading"><?php esc_html_e('Order', 'hearthstone-ops'); ?></h3>
                        <?php if ($editing_order_id > 0) : ?>
                            <p class="hearthstone-order-meta">
                                <?php
                                printf(
                                    esc_html__('Editing order #%d. ', 'hearthstone-ops'),
                                    $editing_order_id
                                );
                                ?>
                                <a href="<?php echo esc_url($dining_page_url); ?>"><?php esc_html_e('Start a new order instead', 'hearthstone-ops'); ?></a>
                            </p>
                        <?php endif; ?>

                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="hearthstone-order-form">
                            <?php wp_nonce_field('hearthstone_ops_submit_room_service_order_action', 'hearthstone_ops_submit_room_service_order_nonce'); ?>
                            <input type="hidden" name="action" value="hearthstone_ops_submit_room_service_order">
                            <input type="hidden" name="hearthstone_checkout_mode" value="ops" data-checkout-mode-input>
                            <input type="hidden" name="hearthstone_room_service_cart" value="<?php echo esc_attr($initial_cart_json); ?>" data-cart-input>
                            <?php if ($editing_order_id > 0) : ?>
                                <input type="hidden" name="hearthstone_room_service_order_id" value="<?php echo esc_attr((string) $editing_order_id); ?>">
                            <?php endif; ?>

                            <div class="hearthstone-cart-summary" data-cart-summary>
                                <p class="hearthstone-order-meta"><?php esc_html_e('No items selected yet.', 'hearthstone-ops'); ?></p>
                            </div>
                            <p class="hearthstone-cart-total"><strong><?php esc_html_e('Total', 'hearthstone-ops'); ?>:</strong> <span data-cart-total>$0.00</span></p>

                            <p class="hearthstone-form-field">
                                <label for="hearthstone_order_delivery_method"><?php esc_html_e('Delivery method', 'hearthstone-ops'); ?></label>
                                <select id="hearthstone_order_delivery_method" name="hearthstone_order_delivery_method">
                                    <option value="room_delivery" <?php selected($initial_delivery_method, 'room_delivery'); ?>><?php esc_html_e('Room delivery', 'hearthstone-ops'); ?></option>
                                    <option value="pickup" <?php selected($initial_delivery_method, 'pickup'); ?>><?php esc_html_e('Pickup', 'hearthstone-ops'); ?></option>
                                </select>
                            </p>

                            <p class="hearthstone-form-field">
                                <label for="hearthstone_order_requested_time"><?php esc_html_e('Requested time', 'hearthstone-ops'); ?></label>
                                <input type="time" id="hearthstone_order_requested_time" name="hearthstone_order_requested_time" value="<?php echo esc_attr($initial_requested_time); ?>">
                            </p>

                            <p class="hearthstone-form-field">
                                <label for="hearthstone_order_tip_percent"><?php esc_html_e('Tip', 'hearthstone-ops'); ?></label>
                                <select id="hearthstone_order_tip_percent" name="hearthstone_order_tip_percent">
                                    <option value="0" <?php selected($initial_tip_percent, 0); ?>><?php esc_html_e('No tip', 'hearthstone-ops'); ?></option>
                                    <option value="10" <?php selected($initial_tip_percent, 10); ?>>10%</option>
                                    <option value="15" <?php selected($initial_tip_percent, 15); ?>>15%</option>
                                    <option value="20" <?php selected($initial_tip_percent, 20); ?>>20%</option>
                                </select>
                            </p>

                            <p class="hearthstone-form-field">
                                <label for="hearthstone_order_notes"><?php esc_html_e('Allergy / special notes', 'hearthstone-ops'); ?></label>
                                <textarea id="hearthstone_order_notes" name="hearthstone_order_notes" rows="3"><?php echo esc_textarea($initial_notes); ?></textarea>
                            </p>

                            <div class="hearthstone-order-actions wp-block-buttons">
                                <?php $ops_checkout_label = $editing_order_id > 0 ? __('Update order', 'hearthstone-ops') : __('Submit order', 'hearthstone-ops'); ?>
                                <button
                                    type="submit"
                                    class="wp-element-button hearthstone-order-submit"
                                    data-cart-submit
                                    data-checkout-mode="ops"
                                    data-base-label="<?php echo esc_attr($ops_checkout_label); ?>"
                                    disabled
                                >
                                    <?php echo esc_html($ops_checkout_label); ?>
                                </button>
                                <?php if ($has_woocommerce) : ?>
                                    <button
                                        type="submit"
                                        class="wp-element-button hearthstone-order-submit"
                                        data-cart-submit
                                        data-checkout-mode="woocommerce"
                                        data-base-label="<?php echo esc_attr__('Checkout with card', 'hearthstone-ops'); ?>"
                                        disabled
                                    >
                                        <?php esc_html_e('Checkout with card', 'hearthstone-ops'); ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        <?php endif; ?>
    </section>
    <?php hearthstone_ops_print_guest_cart_script_once(); ?>
    <?php
    return (string) ob_get_clean();
}
add_shortcode('hearthstone_room_service_app', 'hearthstone_ops_render_room_service_app_shortcode');

/**
 * Handle front-end room service order submissions.
 */
function hearthstone_ops_submit_room_service_order(): void
{
    check_admin_referer('hearthstone_ops_submit_room_service_order_action', 'hearthstone_ops_submit_room_service_order_nonce');

    if (!hearthstone_ops_is_guest_authenticated()) {
        wp_safe_redirect(add_query_arg('hearthstone_guest_auth', 'expired', hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/')));
        exit;
    }

    $cart_payload = isset($_POST['hearthstone_room_service_cart']) ? (string) wp_unslash($_POST['hearthstone_room_service_cart']) : '';
    $delivery_method = isset($_POST['hearthstone_order_delivery_method']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_order_delivery_method'])) : 'room_delivery';
    $requested_time = isset($_POST['hearthstone_order_requested_time']) ? sanitize_text_field((string) wp_unslash($_POST['hearthstone_order_requested_time'])) : '';
    $tip_percent = isset($_POST['hearthstone_order_tip_percent']) ? absint(wp_unslash($_POST['hearthstone_order_tip_percent'])) : 0;
    $order_notes = isset($_POST['hearthstone_order_notes']) ? sanitize_textarea_field((string) wp_unslash($_POST['hearthstone_order_notes'])) : '';
    $order_id_to_edit = isset($_POST['hearthstone_room_service_order_id']) ? absint(wp_unslash($_POST['hearthstone_room_service_order_id'])) : 0;
    $checkout_mode = isset($_POST['hearthstone_checkout_mode']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_checkout_mode'])) : 'ops';

    if (!in_array($delivery_method, ['room_delivery', 'pickup'], true)) {
        $delivery_method = 'room_delivery';
    }

    if (!in_array($tip_percent, [0, 10, 15, 20], true)) {
        $tip_percent = 0;
    }

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = (string) home_url('/dining/');
    }

    $cart = [];

    if ($cart_payload !== '') {
        $decoded_cart = json_decode($cart_payload, true);

        if (is_array($decoded_cart)) {
            foreach ($decoded_cart as $raw_item_id => $raw_qty) {
                $item_id = absint((string) $raw_item_id);
                $qty = max(0, absint($raw_qty));

                if ($item_id > 0 && $qty > 0) {
                    $cart[$item_id] = $qty;
                }
            }
        }
    }

    if (empty($cart)) {
        $legacy_item_id = isset($_POST['hearthstone_room_service_item_id']) ? absint(wp_unslash($_POST['hearthstone_room_service_item_id'])) : 0;
        $legacy_qty = isset($_POST['hearthstone_room_service_qty']) ? max(1, absint(wp_unslash($_POST['hearthstone_room_service_qty']))) : 0;

        if ($legacy_item_id > 0 && $legacy_qty > 0) {
            $cart[$legacy_item_id] = $legacy_qty;
        }
    }

    if (empty($cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    $validated_cart = [];
    $subtotal = 0.0;
    $total_qty = 0;
    $order_lines = [];

    foreach ($cart as $item_id => $qty) {
        $item_post = get_post($item_id);

        if (!$item_post instanceof WP_Post || $item_post->post_type !== 'room_service_item') {
            continue;
        }

        $is_available = (string) get_post_meta($item_id, '_hearthstone_room_service_available', true) === '1';

        if (!$is_available) {
            continue;
        }

        $price_raw = (string) get_post_meta($item_id, '_hearthstone_room_service_price', true);
        $price = $price_raw !== '' ? (float) $price_raw : 0.0;
        $line_total = $price * $qty;

        $validated_cart[$item_id] = $qty;
        $subtotal += $line_total;
        $total_qty += $qty;
        $order_lines[] = sprintf(
            __('%1$s x%2$d - $%3$s', 'hearthstone-ops'),
            (string) $item_post->post_title,
            $qty,
            number_format($line_total, 2)
        );
    }

    if (empty($validated_cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    $room = hearthstone_ops_get_guest_room_context();

    if ($checkout_mode === 'woocommerce' && !hearthstone_ops_is_wc_dining_checkout_enabled()) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'woo_unavailable', $redirect_url));
        exit;
    }

    if ($checkout_mode === 'woocommerce' && $order_id_to_edit <= 0) {
        hearthstone_ops_start_room_service_woocommerce_checkout(
            $validated_cart,
            $room,
            $delivery_method,
            $requested_time,
            $tip_percent,
            $order_notes,
            $redirect_url
        );
    }

    $order_note_lines = $order_lines;

    if ($order_notes !== '') {
        $order_note_lines[] = __('Guest notes:', 'hearthstone-ops') . ' ' . $order_notes;
    }

    $tip_amount = $subtotal * ($tip_percent / 100);
    $order_total = $subtotal + $tip_amount;

    $order_title = sprintf(
        __('Room %1$s - %2$d item(s)', 'hearthstone-ops'),
        $room,
        count($validated_cart)
    );

    $resolved_order_id = 0;
    $is_update = false;

    if ($order_id_to_edit > 0) {
        $editable_order = hearthstone_ops_get_guest_editable_room_service_order($order_id_to_edit, $room);

        if (!$editable_order instanceof WP_Post) {
            wp_safe_redirect(add_query_arg('hearthstone_room_service', 'edit_locked', $redirect_url));
            exit;
        }

        $update_result = wp_update_post([
            'ID'           => (int) $editable_order->ID,
            'post_title'   => $order_title,
            'post_content' => implode("\n", $order_note_lines),
        ], true);

        if (!is_wp_error($update_result) && (int) $update_result > 0) {
            $resolved_order_id = (int) $update_result;
            $is_update = true;
        }
    }

    if ($resolved_order_id <= 0) {
        $inserted_order_id = wp_insert_post([
            'post_type'    => 'room_service_order',
            'post_status'  => 'publish',
            'post_title'   => $order_title,
            'post_content' => implode("\n", $order_note_lines),
        ], true);

        if (is_wp_error($inserted_order_id) || (int) $inserted_order_id <= 0) {
            wp_safe_redirect(add_query_arg('hearthstone_room_service', 'invalid_item', $redirect_url));
            exit;
        }

        $resolved_order_id = (int) $inserted_order_id;
    }

    $first_item_id = (int) array_key_first($validated_cart);

    update_post_meta($resolved_order_id, '_hearthstone_order_item_id', $first_item_id);
    update_post_meta($resolved_order_id, '_hearthstone_order_quantity', $total_qty);
    update_post_meta($resolved_order_id, '_hearthstone_order_items_json', wp_json_encode($validated_cart));
    update_post_meta($resolved_order_id, '_hearthstone_order_room_number', $room);
    update_post_meta($resolved_order_id, '_hearthstone_order_guest_name', '');
    update_post_meta($resolved_order_id, '_hearthstone_order_guest_phone', '');
    update_post_meta($resolved_order_id, '_hearthstone_order_delivery_method', $delivery_method);
    update_post_meta($resolved_order_id, '_hearthstone_order_requested_time', $requested_time);
    update_post_meta($resolved_order_id, '_hearthstone_order_tip_percent', $tip_percent);
    update_post_meta($resolved_order_id, '_hearthstone_order_tip_amount', number_format($tip_amount, 2, '.', ''));
    update_post_meta($resolved_order_id, '_hearthstone_order_subtotal', number_format($subtotal, 2, '.', ''));
    update_post_meta($resolved_order_id, '_hearthstone_order_notes', $order_notes);
    update_post_meta($resolved_order_id, '_hearthstone_order_total', number_format($order_total, 2, '.', ''));
    update_post_meta($resolved_order_id, '_hearthstone_order_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'hearthstone_room_service'       => $is_update ? 'updated' : 'submitted',
        'hearthstone_room_service_order' => $resolved_order_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_submit_room_service_order', 'hearthstone_ops_submit_room_service_order');
add_action('admin_post_hearthstone_ops_submit_room_service_order', 'hearthstone_ops_submit_room_service_order');

/**
 * Cancel an editable room-service order from the guest app.
 */
function hearthstone_ops_cancel_room_service_order(): void
{
    check_admin_referer('hearthstone_ops_cancel_room_service_order_action', 'hearthstone_ops_cancel_room_service_order_nonce');

    if (!hearthstone_ops_is_guest_authenticated()) {
        wp_safe_redirect(add_query_arg('hearthstone_guest_auth', 'expired', hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/')));
        exit;
    }

    $order_id = isset($_POST['hearthstone_room_service_order_id']) ? absint(wp_unslash($_POST['hearthstone_room_service_order_id'])) : 0;
    $raw_return = isset($_POST['hearthstone_guest_return']) ? (string) wp_unslash($_POST['hearthstone_guest_return']) : '';
    $redirect_url = hearthstone_ops_get_guest_redirect_target($raw_return);

    if ($redirect_url === '') {
        $redirect_url = hearthstone_ops_get_guest_page_url('home', '/');
    }

    $room_number = hearthstone_ops_get_guest_room_context();
    $editable_order = hearthstone_ops_get_guest_editable_room_service_order($order_id, $room_number);

    if (!$editable_order instanceof WP_Post) {
        wp_safe_redirect(add_query_arg('hearthstone_room_service', 'cancel_locked', $redirect_url));
        exit;
    }

    update_post_meta($order_id, '_hearthstone_order_status', 'cancelled');

    wp_safe_redirect(add_query_arg([
        'hearthstone_room_service'       => 'cancelled',
        'hearthstone_room_service_order' => $order_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_cancel_room_service_order', 'hearthstone_ops_cancel_room_service_order');
add_action('admin_post_hearthstone_ops_cancel_room_service_order', 'hearthstone_ops_cancel_room_service_order');

/**
 * Advance room-service order status from the admin queue.
 */
function hearthstone_ops_advance_room_service_status(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You are not allowed to update orders.', 'hearthstone-ops'));
    }

    $order_id = isset($_GET['order_id']) ? absint(wp_unslash($_GET['order_id'])) : 0;
    $next_status = isset($_GET['next_status']) ? sanitize_key((string) wp_unslash($_GET['next_status'])) : '';
    $nonce = isset($_GET['_wpnonce']) ? sanitize_text_field((string) wp_unslash($_GET['_wpnonce'])) : '';

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = admin_url('edit.php?post_type=room_service_order');
    }

    if ($order_id <= 0 || $next_status === '') {
        wp_safe_redirect($redirect_url);
        exit;
    }

    $order_post = get_post($order_id);

    if (!$order_post instanceof WP_Post || $order_post->post_type !== 'room_service_order') {
        wp_safe_redirect($redirect_url);
        exit;
    }

    if (!current_user_can('edit_post', $order_id)) {
        wp_die(esc_html__('You are not allowed to edit this order.', 'hearthstone-ops'));
    }

    if (!wp_verify_nonce($nonce, 'hearthstone_ops_advance_room_service_status_' . $order_id . '_' . $next_status)) {
        wp_die(esc_html__('Security check failed.', 'hearthstone-ops'));
    }

    $delivery_method = (string) get_post_meta($order_id, '_hearthstone_order_delivery_method', true);
    $current_status = (string) get_post_meta($order_id, '_hearthstone_order_status', true);
    $expected_next_status = hearthstone_ops_get_next_room_service_status($current_status, $delivery_method);

    if ($expected_next_status !== $next_status) {
        wp_safe_redirect(add_query_arg('hearthstone_order_status_invalid', '1', $redirect_url));
        exit;
    }

    update_post_meta($order_id, '_hearthstone_order_status', $next_status);
    update_post_meta($order_id, '_hearthstone_order_status_updated_at', current_time('mysql'));

    wp_safe_redirect(add_query_arg([
        'hearthstone_order_status_updated' => '1',
        'hearthstone_order_ref' => $order_id,
        'hearthstone_order_status' => $next_status,
    ], $redirect_url));
    exit;
}
add_action('admin_post_hearthstone_ops_advance_room_service_status', 'hearthstone_ops_advance_room_service_status');

/**
 * Resolve a front-end page URL by slug with fallback.
 *
 * @param string $slug Page slug.
 * @param string $fallback_path Fallback path.
 */
function hearthstone_ops_get_guest_page_url(string $slug, string $fallback_path): string
{
    $page = get_page_by_path($slug);

    if ($page instanceof WP_Post) {
        $url = get_permalink($page);

        if (is_string($url) && $url !== '') {
            return $url;
        }
    }

    return (string) home_url($fallback_path);
}

/**
 * Resolve and validate redirect target from sign-in flow.
 *
 * @param string $raw_redirect Raw redirect value.
 */
function hearthstone_ops_get_guest_redirect_target(string $raw_redirect): string
{
    $fallback = hearthstone_ops_get_guest_page_url('home', '/');

    if ($raw_redirect === '') {
        return $fallback;
    }

    $validated = wp_validate_redirect($raw_redirect, $fallback);

    if (!is_string($validated) || $validated === '') {
        return $fallback;
    }

    return $validated;
}

/**
 * Render a small auth-required state used by protected shortcodes.
 */
function hearthstone_ops_render_guest_auth_required_state(): string
{
    $sign_in_url = hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/');
    $front_desk_phone = hearthstone_ops_get_front_desk_phone_number();
    $front_desk_tel = hearthstone_ops_get_front_desk_tel_href();

    ob_start();
    ?>
    <section class="hearthstone-guest-state hearthstone-guest-state--auth-required">
        <div class="hearthstone-guest-state__card">
            <h2><?php esc_html_e('Sign in to continue', 'hearthstone-ops'); ?></h2>
            <p><?php esc_html_e('Use your room number and check-in code to open the guest app.', 'hearthstone-ops'); ?></p>
            <div class="hearthstone-order-actions wp-block-buttons">
                <div class="wp-block-button">
                    <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($sign_in_url); ?>">
                        <?php esc_html_e('Go to guest sign in', 'hearthstone-ops'); ?>
                    </a>
                </div>
                <?php if ($front_desk_tel !== '') : ?>
                    <div class="wp-block-button is-style-outline">
                        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($front_desk_tel); ?>">
                            <?php
                            printf(
                                esc_html__('Call front desk (%s)', 'hearthstone-ops'),
                                esc_html($front_desk_phone)
                            );
                            ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php

    return (string) ob_get_clean();
}

/**
 * Return auth notice copy by key.
 *
 * @param string $notice_key Current notice key.
 */
function hearthstone_ops_get_guest_auth_notice_copy(string $notice_key): string
{
    if ($notice_key === 'invalid') {
        return __('We could not verify that room and code. Please try again or contact the front desk.', 'hearthstone-ops');
    }

    if ($notice_key === 'expired') {
        return __('Your guest session has expired at checkout. Please ask front desk for a new code if you need access.', 'hearthstone-ops');
    }

    if ($notice_key === 'signed_out') {
        return __('You have been signed out of the guest app.', 'hearthstone-ops');
    }

    return '';
}

/**
 * Handle guest sign-in action.
 */
function hearthstone_ops_handle_guest_sign_in(): void
{
    check_admin_referer('hearthstone_ops_guest_sign_in_action', 'hearthstone_ops_guest_sign_in_nonce');

    $room_number = isset($_POST['hearthstone_guest_room']) ? sanitize_text_field((string) wp_unslash($_POST['hearthstone_guest_room'])) : '';
    $access_code = isset($_POST['hearthstone_guest_access_code']) ? sanitize_text_field((string) wp_unslash($_POST['hearthstone_guest_access_code'])) : '';
    $remember = isset($_POST['hearthstone_guest_remember']) && (string) wp_unslash($_POST['hearthstone_guest_remember']) === '1';
    $raw_redirect = isset($_POST['hearthstone_guest_redirect']) ? (string) wp_unslash($_POST['hearthstone_guest_redirect']) : '';
    $landing_url = hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/');

    if ($room_number === '' || $access_code === '') {
        wp_safe_redirect(add_query_arg([
            'hearthstone_guest_auth'     => 'invalid',
            'hearthstone_guest_redirect' => $raw_redirect,
        ], $landing_url));
        exit;
    }

    $stay_post = hearthstone_ops_find_stay_for_guest_sign_in($room_number, $access_code);

    if (!$stay_post instanceof WP_Post) {
        wp_safe_redirect(add_query_arg([
            'hearthstone_guest_auth'     => 'invalid',
            'hearthstone_guest_redirect' => $raw_redirect,
        ], $landing_url));
        exit;
    }

    $started = hearthstone_ops_create_guest_session($stay_post, $room_number, $remember);

    if (!$started) {
        wp_safe_redirect(add_query_arg([
            'hearthstone_guest_auth'     => 'expired',
            'hearthstone_guest_redirect' => $raw_redirect,
        ], $landing_url));
        exit;
    }

    $target = hearthstone_ops_get_guest_redirect_target($raw_redirect);
    wp_safe_redirect($target);
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_guest_sign_in', 'hearthstone_ops_handle_guest_sign_in');
add_action('admin_post_hearthstone_ops_guest_sign_in', 'hearthstone_ops_handle_guest_sign_in');

/**
 * Handle guest sign-out action.
 */
function hearthstone_ops_handle_guest_sign_out(): void
{
    check_admin_referer('hearthstone_ops_guest_sign_out_action', 'hearthstone_ops_guest_sign_out_nonce');

    hearthstone_ops_clear_guest_session();

    $landing_url = hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/');
    wp_safe_redirect(add_query_arg('hearthstone_guest_auth', 'signed_out', $landing_url));
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_guest_sign_out', 'hearthstone_ops_handle_guest_sign_out');
add_action('admin_post_hearthstone_ops_guest_sign_out', 'hearthstone_ops_handle_guest_sign_out');

/**
 * Enforce guest authentication on protected app pages.
 */
function hearthstone_ops_enforce_guest_page_auth(): void
{
    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return;
    }

    $auth_slug = 'guest-access';
    $auth_url = hearthstone_ops_get_guest_page_url($auth_slug, '/guest-access/');
    $is_auth_page = is_page($auth_slug);

    if ($is_auth_page && hearthstone_ops_is_guest_authenticated()) {
        $redirect_raw = isset($_GET['hearthstone_guest_redirect']) ? (string) wp_unslash($_GET['hearthstone_guest_redirect']) : '';
        $target_url = hearthstone_ops_get_guest_redirect_target($redirect_raw);

        if ($target_url === $auth_url) {
            $target_url = hearthstone_ops_get_guest_page_url('home', '/');
        }

        wp_safe_redirect($target_url);
        exit;
    }

    if ($is_auth_page) {
        return;
    }

    $protected_slugs = [
        'dining',
        'gift-shop',
        'perks-info',
        'explore-local',
        'help',
        'my-stay',
    ];

    $is_protected = is_front_page() || is_page('home');

    if (!$is_protected) {
        foreach ($protected_slugs as $slug) {
            if (is_page($slug)) {
                $is_protected = true;
                break;
            }
        }
    }

    if (!$is_protected || hearthstone_ops_is_guest_authenticated()) {
        return;
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? (string) wp_unslash($_SERVER['REQUEST_URI']) : '/';
    $redirect_target = home_url($request_uri);

    wp_safe_redirect(add_query_arg('hearthstone_guest_redirect', $redirect_target, $auth_url));
    exit;
}
add_action('template_redirect', 'hearthstone_ops_enforce_guest_page_auth', 7);

/**
 * Return latest active room-service + gift orders for a room.
 *
 * @param string $room_number Guest room number.
 * @return array<int, array<string, int|string>>
 */
function hearthstone_ops_get_guest_active_orders_for_room(string $room_number): array
{
    $normalized_room = strtoupper(trim($room_number));

    if ($normalized_room === '') {
        return [];
    }

    $orders = [];

    $room_service_ids = get_posts([
        'post_type'      => 'room_service_order',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'     => '_hearthstone_order_room_number',
                'value'   => $normalized_room,
                'compare' => '=',
            ],
            [
                'key'     => '_hearthstone_order_status',
                'value'   => ['completed', 'cancelled'],
                'compare' => 'NOT IN',
            ],
        ],
    ]);

    if (is_array($room_service_ids)) {
        foreach ($room_service_ids as $order_id) {
            $order_id_int = (int) $order_id;
            $delivery_method = (string) get_post_meta($order_id_int, '_hearthstone_order_delivery_method', true);
            $orders[] = [
                'id'          => $order_id_int,
                'type'        => 'dining',
                'title'       => (string) get_the_title($order_id_int),
                'status'      => (string) get_post_meta($order_id_int, '_hearthstone_order_status', true),
                'eta'         => hearthstone_ops_get_room_service_eta_label($order_id_int),
                'fulfillment' => hearthstone_ops_get_guest_fulfillment_label($delivery_method),
                'date'        => (string) get_post_field('post_date', $order_id_int),
            ];
        }
    }

    $gift_order_ids = get_posts([
        'post_type'      => 'gift_shop_order',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'     => '_hearthstone_gift_room_number',
                'value'   => $normalized_room,
                'compare' => '=',
            ],
            [
                'key'     => '_hearthstone_gift_order_status',
                'value'   => ['completed', 'cancelled'],
                'compare' => 'NOT IN',
            ],
        ],
    ]);

    if (is_array($gift_order_ids)) {
        foreach ($gift_order_ids as $order_id) {
            $order_id_int = (int) $order_id;
            $fulfillment_method = (string) get_post_meta($order_id_int, '_hearthstone_gift_fulfillment_method', true);
            $window = trim((string) get_post_meta($order_id_int, '_hearthstone_gift_fulfillment_window', true));
            $orders[] = [
                'id'          => $order_id_int,
                'type'        => 'gift',
                'title'       => (string) get_the_title($order_id_int),
                'status'      => (string) get_post_meta($order_id_int, '_hearthstone_gift_order_status', true),
                'eta'         => $window !== '' ? sprintf(__('Window %s', 'hearthstone-ops'), $window) : '',
                'fulfillment' => hearthstone_ops_get_guest_fulfillment_label($fulfillment_method),
                'date'        => (string) get_post_field('post_date', $order_id_int),
            ];
        }
    }

    usort($orders, static function (array $left, array $right): int {
        $left_ts = isset($left['date']) ? strtotime((string) $left['date']) : 0;
        $right_ts = isset($right['date']) ? strtotime((string) $right['date']) : 0;

        if (!is_int($left_ts)) {
            $left_ts = 0;
        }

        if (!is_int($right_ts)) {
            $right_ts = 0;
        }

        return $right_ts <=> $left_ts;
    });

    return array_slice($orders, 0, 6);
}

/**
 * Resolve guest-facing fulfillment labels.
 */
function hearthstone_ops_get_guest_fulfillment_label(string $method): string
{
    $normalized_method = sanitize_key($method);

    $labels = [
        'room_delivery'     => __('Room delivery', 'hearthstone-ops'),
        'pickup'            => __('Pickup', 'hearthstone-ops'),
        'front_desk_pickup' => __('Front desk pickup', 'hearthstone-ops'),
    ];

    if (isset($labels[$normalized_method])) {
        return (string) $labels[$normalized_method];
    }

    return '';
}

/**
 * Build estimated dining-ready text for guest tracking cards.
 */
function hearthstone_ops_get_room_service_eta_label(int $order_id): string
{
    if ($order_id <= 0) {
        return '';
    }

    $status = sanitize_key((string) get_post_meta($order_id, '_hearthstone_order_status', true));

    if (in_array($status, ['ready', 'delivering', 'completed', 'cancelled'], true)) {
        return '';
    }

    $requested_time = trim((string) get_post_meta($order_id, '_hearthstone_order_requested_time', true));

    if ($requested_time !== '') {
        return sprintf(
            /* translators: %s: requested time value */
            __('Requested %s', 'hearthstone-ops'),
            $requested_time
        );
    }

    $prep_minutes = 0;
    $cart_json = (string) get_post_meta($order_id, '_hearthstone_order_items_json', true);
    $decoded_cart = json_decode($cart_json, true);

    if (is_array($decoded_cart)) {
        foreach ($decoded_cart as $item_id_raw => $qty_raw) {
            $item_id = absint((string) $item_id_raw);
            $qty = max(0, absint($qty_raw));

            if ($item_id <= 0 || $qty <= 0) {
                continue;
            }

            $item_prep = (int) get_post_meta($item_id, '_hearthstone_room_service_prep_minutes', true);
            $prep_minutes = max($prep_minutes, $item_prep);
        }
    }

    if ($prep_minutes <= 0) {
        $fallback_item_id = (int) get_post_meta($order_id, '_hearthstone_order_item_id', true);
        $prep_minutes = $fallback_item_id > 0
            ? (int) get_post_meta($fallback_item_id, '_hearthstone_room_service_prep_minutes', true)
            : 0;
    }

    if ($prep_minutes <= 0) {
        $prep_minutes = 25;
    }

    $prep_minutes = max(10, $prep_minutes);
    $created_ts = get_post_time('U', true, $order_id);

    if (!is_int($created_ts) || $created_ts <= 0) {
        $created_ts = (int) current_time('timestamp', true);
    }

    $eta_ts = $created_ts + ($prep_minutes * 60);

    return sprintf(
        /* translators: %s: local estimated ready time */
        __('Est. ready %s', 'hearthstone-ops'),
        wp_date((string) get_option('time_format'), $eta_ts)
    );
}

/**
 * Return the next operational status for a room-service order.
 */
function hearthstone_ops_get_next_room_service_status(string $current_status, string $delivery_method = ''): string
{
    $status = sanitize_key($current_status);
    $method = sanitize_key($delivery_method);

    if ($status === '') {
        $status = 'submitted';
    }

    if ($status === 'submitted') {
        return 'confirmed';
    }

    if ($status === 'confirmed') {
        return 'in_kitchen';
    }

    if ($status === 'in_kitchen') {
        return 'ready';
    }

    if ($status === 'ready') {
        return $method === 'pickup' ? 'completed' : 'delivering';
    }

    if ($status === 'delivering') {
        return 'completed';
    }

    return '';
}

/**
 * Return small CTA labels for admin queue progression.
 */
function hearthstone_ops_get_room_service_status_transition_label(string $next_status): string
{
    $labels = [
        'confirmed'  => __('Confirm', 'hearthstone-ops'),
        'in_kitchen' => __('Send to kitchen', 'hearthstone-ops'),
        'ready'      => __('Mark ready', 'hearthstone-ops'),
        'delivering' => __('Out for delivery', 'hearthstone-ops'),
        'completed'  => __('Complete', 'hearthstone-ops'),
    ];

    $normalized_status = sanitize_key($next_status);

    return isset($labels[$normalized_status]) ? (string) $labels[$normalized_status] : '';
}

/**
 * Build a secure action URL for admin queue status updates.
 */
function hearthstone_ops_get_room_service_status_advance_url(int $order_id, string $next_status): string
{
    $url = add_query_arg([
        'action'      => 'hearthstone_ops_advance_room_service_status',
        'order_id'    => $order_id,
        'next_status' => sanitize_key($next_status),
    ], admin_url('admin-post.php'));

    return (string) wp_nonce_url(
        $url,
        'hearthstone_ops_advance_room_service_status_' . $order_id . '_' . sanitize_key($next_status)
    );
}

/**
 * Human-friendly order status labels.
 *
 * @param string $status_key Raw order status key.
 */
function hearthstone_ops_get_guest_order_status_label(string $status_key): string
{
    $labels = [
        'submitted'  => __('Submitted', 'hearthstone-ops'),
        'confirmed'  => __('Confirmed', 'hearthstone-ops'),
        'in_kitchen' => __('Preparing', 'hearthstone-ops'),
        'preparing'  => __('Preparing', 'hearthstone-ops'),
        'ready'      => __('Ready', 'hearthstone-ops'),
        'delivering' => __('Out for delivery', 'hearthstone-ops'),
        'picked'     => __('Picked', 'hearthstone-ops'),
        'completed'  => __('Completed', 'hearthstone-ops'),
        'cancelled'  => __('Cancelled', 'hearthstone-ops'),
    ];

    $normalized_key = sanitize_key($status_key);

    if (isset($labels[$normalized_key])) {
        return (string) $labels[$normalized_key];
    }

    if ($normalized_key === '') {
        return __('Submitted', 'hearthstone-ops');
    }

    return ucwords(str_replace('_', ' ', $normalized_key));
}

/**
 * Resolve status badge CSS class for guest order status keys.
 */
function hearthstone_ops_get_guest_order_status_css_class(string $status_key): string
{
    $normalized_key = sanitize_key($status_key);

    $class_map = [
        'submitted'  => 'is-submitted',
        'confirmed'  => 'is-confirmed',
        'in_kitchen' => 'is-preparing',
        'preparing'  => 'is-preparing',
        'ready'      => 'is-ready',
        'delivering' => 'is-delivering',
        'picked'     => 'is-delivering',
        'completed'  => 'is-completed',
        'cancelled'  => 'is-cancelled',
    ];

    return isset($class_map[$normalized_key]) ? (string) $class_map[$normalized_key] : 'is-submitted';
}

/**
 * Build guest order tracking URL by module and order reference.
 */
function hearthstone_ops_get_guest_order_track_url(string $order_type, int $order_id = 0): string
{
    $normalized_type = sanitize_key($order_type);

    if ($normalized_type === 'gift') {
        $gift_url = hearthstone_ops_get_guest_page_url('gift-shop', '/gift-shop/');

        if ($order_id > 0) {
            return add_query_arg('hearthstone_gift_order', $order_id, $gift_url);
        }

        return $gift_url;
    }

    $dining_url = hearthstone_ops_get_guest_page_url('dining', '/dining/');

    if ($order_id > 0) {
        return add_query_arg('hearthstone_room_service_order', $order_id, $dining_url);
    }

    return $dining_url;
}

/**
 * Render shared guest order notices across home and my-stay views.
 */
function hearthstone_ops_render_guest_order_feedback_notices(): string
{
    $notice_entries = [];
    $room_notice_key = isset($_GET['hearthstone_room_service']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_room_service'])) : '';
    $room_order_ref  = isset($_GET['hearthstone_room_service_order']) ? absint($_GET['hearthstone_room_service_order']) : 0;
    $gift_notice_key = isset($_GET['hearthstone_gift_shop']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_gift_shop'])) : '';
    $gift_order_ref  = isset($_GET['hearthstone_gift_order']) ? absint($_GET['hearthstone_gift_order']) : 0;

    if ($room_notice_key === 'submitted' && $room_order_ref > 0) {
        $notice_entries[] = [
            'variant'   => 'success',
            'message'   => sprintf(__('Dining order #%d submitted.', 'hearthstone-ops'), $room_order_ref),
            'link_url'  => hearthstone_ops_get_guest_order_track_url('dining', $room_order_ref),
            'link_text' => __('Track dining order', 'hearthstone-ops'),
        ];
    } elseif ($room_notice_key === 'updated' && $room_order_ref > 0) {
        $notice_entries[] = [
            'variant'   => 'success',
            'message'   => sprintf(__('Dining order #%d updated.', 'hearthstone-ops'), $room_order_ref),
            'link_url'  => hearthstone_ops_get_guest_order_track_url('dining', $room_order_ref),
            'link_text' => __('Track dining order', 'hearthstone-ops'),
        ];
    } elseif ($room_notice_key === 'cancelled' && $room_order_ref > 0) {
        $notice_entries[] = [
            'variant' => 'success',
            'message' => sprintf(__('Dining order #%d cancelled.', 'hearthstone-ops'), $room_order_ref),
        ];
    } elseif ($room_notice_key === 'cancel_locked') {
        $notice_entries[] = [
            'variant' => 'error',
            'message' => __('This order can no longer be cancelled in the app. Please contact front desk.', 'hearthstone-ops'),
        ];
    } elseif ($room_notice_key === 'edit_locked') {
        $notice_entries[] = [
            'variant' => 'error',
            'message' => __('This order can no longer be edited in the app. Please contact front desk.', 'hearthstone-ops'),
        ];
    }

    if ($gift_notice_key === 'submitted' && $gift_order_ref > 0) {
        $notice_entries[] = [
            'variant'   => 'success',
            'message'   => sprintf(__('Gift shop order #%d submitted.', 'hearthstone-ops'), $gift_order_ref),
            'link_url'  => hearthstone_ops_get_guest_order_track_url('gift', $gift_order_ref),
            'link_text' => __('Track gift order', 'hearthstone-ops'),
        ];
    }

    if (empty($notice_entries)) {
        return '';
    }

    ob_start();
    foreach ($notice_entries as $notice_entry) {
        $variant = isset($notice_entry['variant']) && $notice_entry['variant'] === 'error'
            ? 'hearthstone-app-notice--error'
            : 'hearthstone-app-notice--success';
        ?>
        <div class="hearthstone-app-notice <?php echo esc_attr($variant); ?>">
            <?php echo esc_html((string) $notice_entry['message']); ?>
            <?php if (!empty($notice_entry['link_url']) && !empty($notice_entry['link_text'])) : ?>
                <a href="<?php echo esc_url((string) $notice_entry['link_url']); ?>"><?php echo esc_html((string) $notice_entry['link_text']); ?></a>
            <?php endif; ?>
        </div>
        <?php
    }

    return (string) ob_get_clean();
}

/**
 * Render a guest-facing order confirmation card after submit/update.
 */
function hearthstone_ops_render_guest_order_confirmation_card(string $order_type, int $order_id, string $room_number = ''): string
{
    $normalized_type = sanitize_key($order_type);

    if ($order_id <= 0 || !in_array($normalized_type, ['dining', 'gift'], true)) {
        return '';
    }

    $order_post = get_post($order_id);

    if (!$order_post instanceof WP_Post) {
        return '';
    }

    if ($normalized_type === 'dining' && $order_post->post_type !== 'room_service_order') {
        return '';
    }

    if ($normalized_type === 'gift' && $order_post->post_type !== 'gift_shop_order') {
        return '';
    }

    if ($room_number !== '') {
        $normalized_room = strtoupper(trim($room_number));
        $order_room = $normalized_type === 'gift'
            ? (string) get_post_meta($order_id, '_hearthstone_gift_room_number', true)
            : (string) get_post_meta($order_id, '_hearthstone_order_room_number', true);

        if (strtoupper(trim($order_room)) !== $normalized_room) {
            return '';
        }
    }

    $status_key = $normalized_type === 'gift'
        ? (string) get_post_meta($order_id, '_hearthstone_gift_order_status', true)
        : (string) get_post_meta($order_id, '_hearthstone_order_status', true);
    $status_label = hearthstone_ops_get_guest_order_status_label($status_key);
    $status_class = hearthstone_ops_get_guest_order_status_css_class($status_key);
    $home_track_url = add_query_arg(
        'hearthstone_track_order',
        $normalized_type . ':' . $order_id,
        hearthstone_ops_get_guest_page_url('home', '/')
    );
    $is_home_page = is_front_page() || is_page('home');

    $total_raw = $normalized_type === 'gift'
        ? (string) get_post_meta($order_id, '_hearthstone_gift_total', true)
        : (string) get_post_meta($order_id, '_hearthstone_order_total', true);
    $total_amount = is_numeric($total_raw) ? (float) $total_raw : 0.0;

    $detail_bits = [];

    if ($normalized_type === 'gift') {
        $fulfillment_label = hearthstone_ops_get_guest_fulfillment_label((string) get_post_meta($order_id, '_hearthstone_gift_fulfillment_method', true));
        $window_label = trim((string) get_post_meta($order_id, '_hearthstone_gift_fulfillment_window', true));

        if ($fulfillment_label !== '') {
            $detail_bits[] = $fulfillment_label;
        }

        if ($window_label !== '') {
            $detail_bits[] = sprintf(__('Window %s', 'hearthstone-ops'), $window_label);
        }
    } else {
        $fulfillment_label = hearthstone_ops_get_guest_fulfillment_label((string) get_post_meta($order_id, '_hearthstone_order_delivery_method', true));
        $eta_label = hearthstone_ops_get_room_service_eta_label($order_id);

        if ($fulfillment_label !== '') {
            $detail_bits[] = $fulfillment_label;
        }

        if ($eta_label !== '') {
            $detail_bits[] = $eta_label;
        }
    }

    ob_start();
    ?>
    <article class="hearthstone-card hearthstone-app-confirmation">
        <p class="hearthstone-service-app__section-title"><?php esc_html_e('Confirmation', 'hearthstone-ops'); ?></p>
        <h3><?php echo esc_html($normalized_type === 'gift' ? __('Gift order confirmed', 'hearthstone-ops') : __('Dining order confirmed', 'hearthstone-ops')); ?></h3>
        <p class="hearthstone-order-meta">
            <?php
            printf(
                esc_html__('#%1$d - Total $%2$s', 'hearthstone-ops'),
                $order_id,
                number_format($total_amount, 2)
            );
            ?>
        </p>
        <div class="hearthstone-active-order-status-row">
            <span class="hearthstone-order-status-badge <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_label); ?></span>
            <?php if (!empty($detail_bits)) : ?>
                <span class="hearthstone-order-meta"><?php echo esc_html(implode(' | ', $detail_bits)); ?></span>
            <?php endif; ?>
        </div>
        <div class="hearthstone-order-actions hearthstone-order-actions--inline">
            <?php if (!$is_home_page) : ?>
                <a class="hearthstone-order-action-btn" href="<?php echo esc_url($home_track_url); ?>">
                    <?php esc_html_e('Track on Home', 'hearthstone-ops'); ?>
                </a>
            <?php endif; ?>
            <a class="hearthstone-order-action-btn" href="<?php echo esc_url(hearthstone_ops_get_guest_page_url('my-stay', '/my-stay/')); ?>">
                <?php esc_html_e('Open My Stay', 'hearthstone-ops'); ?>
            </a>
        </div>
    </article>
    <?php

    return (string) ob_get_clean();
}

/**
 * Render active-order list with stronger status UI.
 *
 * @param array<int, array<string, int|string>> $active_orders Active guest orders.
 */
function hearthstone_ops_render_guest_active_orders_list(array $active_orders, string $room_number, string $empty_message, string $view_context = 'default'): string
{
    $is_home_context = $view_context === 'home';

    if (empty($active_orders)) {
        $dining_url = hearthstone_ops_get_guest_page_url('dining', '/dining/');
        $gift_url = hearthstone_ops_get_guest_page_url('gift-shop', '/gift-shop/');

        ob_start();
        ?>
        <div class="hearthstone-order-empty">
            <p class="hearthstone-order-meta"><?php echo esc_html($empty_message); ?></p>
            <?php if ($is_home_context) : ?>
                <div class="hearthstone-order-actions hearthstone-order-actions--inline">
                    <a class="hearthstone-order-action-btn" href="<?php echo esc_url($dining_url); ?>">
                        <?php esc_html_e('Order from Dining', 'hearthstone-ops'); ?>
                    </a>
                    <a class="hearthstone-order-action-btn" href="<?php echo esc_url($gift_url); ?>">
                        <?php esc_html_e('Browse Gift Shop', 'hearthstone-ops'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php

        return (string) ob_get_clean();
    }

    ob_start();
    ?>
    <ul class="hearthstone-active-order-list">
        <?php foreach ($active_orders as $order_index => $order) : ?>
            <?php
            $order_type = isset($order['type']) ? sanitize_key((string) $order['type']) : 'dining';
            $type_label = $order_type === 'gift' ? __('Gift Shop', 'hearthstone-ops') : __('Dining', 'hearthstone-ops');
            $status_key = isset($order['status']) ? (string) $order['status'] : 'submitted';
            $status_label = hearthstone_ops_get_guest_order_status_label($status_key);
            $status_class = hearthstone_ops_get_guest_order_status_css_class($status_key);
            $order_eta = isset($order['eta']) ? trim((string) $order['eta']) : '';
            $order_fulfillment = isset($order['fulfillment']) ? trim((string) $order['fulfillment']) : '';
            $meta_bits = array_filter([$order_eta, $order_fulfillment]);
            $order_id = isset($order['id']) ? (int) $order['id'] : 0;
            $tracking_key = $order_type . ':' . $order_id;
            $details_id = 'hearthstone-track-details-' . $order_type . '-' . ($order_id > 0 ? (string) $order_id : (string) $order_index);
            ?>
            <li class="hearthstone-active-order-item">
                <div class="hearthstone-active-order-header">
                    <strong><?php echo esc_html((string) ($order['title'] ?? '')); ?></strong>
                    <span class="hearthstone-order-type-pill"><?php echo esc_html($type_label); ?></span>
                </div>
                <?php if ($is_home_context) : ?>
                    <div class="hearthstone-order-actions hearthstone-order-actions--inline">
                        <button
                            type="button"
                            class="hearthstone-order-action-btn hearthstone-order-track-toggle"
                            data-order-track-toggle
                            data-track-key="<?php echo esc_attr($tracking_key); ?>"
                            aria-expanded="false"
                            aria-controls="<?php echo esc_attr($details_id); ?>"
                        >
                            <?php esc_html_e('Track order', 'hearthstone-ops'); ?>
                        </button>
                    </div>
                    <div
                        id="<?php echo esc_attr($details_id); ?>"
                        class="hearthstone-order-track-details"
                        data-order-track-details
                        hidden
                    >
                        <div class="hearthstone-active-order-status-row">
                            <span class="hearthstone-order-status-badge <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_label); ?></span>
                            <?php if (!empty($meta_bits)) : ?>
                                <span class="hearthstone-order-meta"><?php echo esc_html(implode(' | ', $meta_bits)); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($order_type === 'dining' && $order_id > 0) : ?>
                            <div class="hearthstone-order-actions hearthstone-order-actions--inline">
                                <?php echo hearthstone_ops_render_guest_room_service_order_actions($order_id, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="hearthstone-active-order-status-row">
                        <span class="hearthstone-order-status-badge <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_label); ?></span>
                        <?php if (!empty($meta_bits)) : ?>
                            <span class="hearthstone-order-meta"><?php echo esc_html(implode(' | ', $meta_bits)); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ($order_type === 'dining' && $order_id > 0) : ?>
                        <div class="hearthstone-order-actions hearthstone-order-actions--inline">
                            <?php echo hearthstone_ops_render_guest_room_service_order_actions($order_id, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php

    return (string) ob_get_clean();
}

/**
 * Render guest auth form card.
 *
 * @param string $notice_key Guest auth notice key.
 * @param string $redirect_target Requested redirect after sign-in.
 */
function hearthstone_ops_render_guest_auth_form_card(string $notice_key = '', string $redirect_target = ''): string
{
    $front_desk_phone = hearthstone_ops_get_front_desk_phone_number();
    $front_desk_tel = hearthstone_ops_get_front_desk_tel_href();
    $notice_copy = hearthstone_ops_get_guest_auth_notice_copy($notice_key);
    $logo_uri = '';
    $demo_credentials = hearthstone_ops_should_enable_demo_guest_login() ? hearthstone_ops_get_demo_guest_credentials() : null;

    if (function_exists('hearthstone_hospitality_get_logo_variant_uri')) {
        $logo_uri = (string) hearthstone_hospitality_get_logo_variant_uri('hero');
    }

    if ($logo_uri === '' && function_exists('hearthstone_hospitality_get_packaged_logo_uri')) {
        $logo_uri = (string) hearthstone_hospitality_get_packaged_logo_uri();
    }

    ob_start();
    ?>
    <section class="hearthstone-guest-auth-screen">
        <div class="hearthstone-guest-auth-screen__card">
            <?php if ($logo_uri !== '') : ?>
                <div class="hearthstone-guest-auth-screen__brand">
                    <img src="<?php echo esc_url($logo_uri); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </div>
            <?php endif; ?>

            <h1><?php esc_html_e('Guest sign in', 'hearthstone-ops'); ?></h1>
            <p><?php esc_html_e('Enter your room number and access code provided at check-in.', 'hearthstone-ops'); ?></p>

            <?php if (is_array($demo_credentials)) : ?>
                <p class="hearthstone-order-meta hearthstone-guest-auth-screen__demo">
                    <?php
                    printf(
                        /* translators: 1: demo room number, 2: demo access code. */
                        esc_html__('Demo access: Room %1$s | Access code %2$s', 'hearthstone-ops'),
                        esc_html((string) $demo_credentials['room']),
                        esc_html((string) $demo_credentials['code'])
                    );
                    ?>
                </p>
            <?php endif; ?>

            <?php if ($notice_copy !== '') : ?>
                <div class="hearthstone-app-notice hearthstone-app-notice--error">
                    <?php echo esc_html($notice_copy); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="hearthstone-order-form">
                <?php wp_nonce_field('hearthstone_ops_guest_sign_in_action', 'hearthstone_ops_guest_sign_in_nonce'); ?>
                <input type="hidden" name="action" value="hearthstone_ops_guest_sign_in">
                <input type="hidden" name="hearthstone_guest_redirect" value="<?php echo esc_attr($redirect_target); ?>">

                <p class="hearthstone-form-field">
                    <label for="hearthstone_guest_room"><?php esc_html_e('Room Number', 'hearthstone-ops'); ?></label>
                    <input
                        id="hearthstone_guest_room"
                        name="hearthstone_guest_room"
                        type="text"
                        autocomplete="off"
                        inputmode="text"
                        required
                    >
                </p>

                <p class="hearthstone-form-field">
                    <label for="hearthstone_guest_access_code"><?php esc_html_e('Access Code', 'hearthstone-ops'); ?></label>
                    <input
                        id="hearthstone_guest_access_code"
                        name="hearthstone_guest_access_code"
                        type="password"
                        autocomplete="one-time-code"
                        required
                    >
                </p>

                <p class="hearthstone-form-field hearthstone-form-field--inline">
                    <label for="hearthstone_guest_remember">
                        <input id="hearthstone_guest_remember" name="hearthstone_guest_remember" type="checkbox" value="1">
                        <?php esc_html_e('Remember this device until checkout', 'hearthstone-ops'); ?>
                    </label>
                </p>

                <button type="submit" class="wp-element-button hearthstone-order-submit">
                    <?php esc_html_e('Sign in', 'hearthstone-ops'); ?>
                </button>
            </form>

            <div class="hearthstone-guest-auth-screen__support">
                <p><?php esc_html_e('Need help?', 'hearthstone-ops'); ?></p>
                <?php if ($front_desk_tel !== '') : ?>
                    <a href="<?php echo esc_url($front_desk_tel); ?>">
                        <?php
                        printf(
                            esc_html__('Call front desk: %s', 'hearthstone-ops'),
                            esc_html($front_desk_phone)
                        );
                        ?>
                    </a>
                <?php else : ?>
                    <span><?php echo esc_html($front_desk_phone); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php

    return (string) ob_get_clean();
}

/**
 * Render guest auth access screen.
 *
 * Usage: [hearthstone_guest_auth_app]
 */
function hearthstone_ops_render_guest_auth_app_shortcode(): string
{
    $redirect_target = isset($_GET['hearthstone_guest_redirect']) ? (string) wp_unslash($_GET['hearthstone_guest_redirect']) : '';

    if (hearthstone_ops_is_guest_authenticated()) {
        $continue_url = hearthstone_ops_get_guest_redirect_target($redirect_target);

        ob_start();
        ?>
        <section class="hearthstone-guest-auth-screen">
            <div class="hearthstone-guest-auth-screen__card">
                <h1><?php esc_html_e('You are already signed in', 'hearthstone-ops'); ?></h1>
                <p><?php esc_html_e('Continue to your stay app.', 'hearthstone-ops'); ?></p>
                <div class="hearthstone-order-actions wp-block-buttons">
                    <div class="wp-block-button">
                        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($continue_url); ?>">
                            <?php esc_html_e('Open app', 'hearthstone-ops'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php

        return (string) ob_get_clean();
    }

    $notice_key = isset($_GET['hearthstone_guest_auth']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_guest_auth'])) : '';
    return hearthstone_ops_render_guest_auth_form_card($notice_key, $redirect_target);
}
add_shortcode('hearthstone_guest_auth_app', 'hearthstone_ops_render_guest_auth_app_shortcode');

/**
 * Render guest sign-in / home shell shortcode.
 *
 * Usage: [hearthstone_guest_home_shell]
 */
function hearthstone_ops_render_guest_home_shell_shortcode(): string
{
    $session = hearthstone_ops_get_guest_session();

    if (!is_array($session)) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $room_number = isset($session['room_number']) ? (string) $session['room_number'] : '';
    $stay_id = isset($session['stay_id']) ? (int) $session['stay_id'] : 0;
    $check_out = $stay_id > 0 ? (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true) : '';
    $active_orders = hearthstone_ops_get_guest_active_orders_for_room($room_number);
    $room_notice_key = isset($_GET['hearthstone_room_service']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_room_service'])) : '';
    $room_order_ref  = isset($_GET['hearthstone_room_service_order']) ? absint($_GET['hearthstone_room_service_order']) : 0;
    $gift_notice_key = isset($_GET['hearthstone_gift_shop']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_gift_shop'])) : '';
    $gift_order_ref  = isset($_GET['hearthstone_gift_order']) ? absint($_GET['hearthstone_gift_order']) : 0;
    $track_order_key_raw = isset($_GET['hearthstone_track_order']) ? sanitize_text_field((string) wp_unslash($_GET['hearthstone_track_order'])) : '';
    $track_order_key = preg_match('/^(dining|gift):\d+$/', $track_order_key_raw) ? $track_order_key_raw : '';
    $orders_poll_url = add_query_arg(
        'action',
        'hearthstone_ops_guest_orders_snapshot',
        admin_url('admin-ajax.php')
    );

    ob_start();
    ?>
    <section
        class="hearthstone-guest-home"
        data-track-order="<?php echo esc_attr($track_order_key); ?>"
        data-orders-poll-url="<?php echo esc_url($orders_poll_url); ?>"
        data-track-label="<?php echo esc_attr__('Track order', 'hearthstone-ops'); ?>"
        data-hide-label="<?php echo esc_attr__('Hide tracking', 'hearthstone-ops'); ?>"
        data-live-label="<?php echo esc_attr__('Live', 'hearthstone-ops'); ?>"
        data-reconnecting-label="<?php echo esc_attr__('Reconnecting...', 'hearthstone-ops'); ?>"
        data-updated-prefix="<?php echo esc_attr__('Updated', 'hearthstone-ops'); ?>"
    >
        <?php echo hearthstone_ops_render_guest_order_feedback_notices(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php
        if (in_array($room_notice_key, ['submitted', 'updated'], true) && $room_order_ref > 0) {
            echo hearthstone_ops_render_guest_order_confirmation_card('dining', $room_order_ref, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } elseif ($gift_notice_key === 'submitted' && $gift_order_ref > 0) {
            echo hearthstone_ops_render_guest_order_confirmation_card('gift', $gift_order_ref, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
        ?>

        <div class="hearthstone-guest-home__grid">
            <article class="hearthstone-card">
                <p class="hearthstone-service-app__section-title"><?php esc_html_e('Stay', 'hearthstone-ops'); ?></p>
                <h2><?php esc_html_e('Welcome back', 'hearthstone-ops'); ?></h2>
                <p class="hearthstone-order-meta">
                    <?php
                    printf(
                        esc_html__('Room %1$s%2$s', 'hearthstone-ops'),
                        esc_html($room_number !== '' ? $room_number : 'N/A'),
                        $check_out !== '' ? esc_html(' - Checkout ' . $check_out) : ''
                    );
                    ?>
                </p>
            </article>

            <article class="hearthstone-card">
                <p class="hearthstone-service-app__section-title"><?php esc_html_e('Today at the property', 'hearthstone-ops'); ?></p>
                <ul class="hearthstone-guest-home__bullet-list">
                    <li><?php esc_html_e('Room-service ordering is open for active guests.', 'hearthstone-ops'); ?></li>
                    <li><?php esc_html_e('Front desk support is available from the Help tab.', 'hearthstone-ops'); ?></li>
                    <li><?php esc_html_e('Use My Stay for perks, local tips, and active order tracking.', 'hearthstone-ops'); ?></li>
                </ul>
            </article>
        </div>
        <div class="hearthstone-card hearthstone-guest-home__orders">
            <div class="hearthstone-orders-head">
                <p class="hearthstone-service-app__section-title">
                    <?php esc_html_e('Active orders', 'hearthstone-ops'); ?>
                    <span class="hearthstone-orders-count" data-orders-count><?php echo esc_html((string) count($active_orders)); ?></span>
                </p>
                <div class="hearthstone-orders-live">
                    <span class="hearthstone-orders-live__dot" aria-hidden="true"></span>
                    <span class="hearthstone-order-meta" data-orders-updated><?php esc_html_e('Live', 'hearthstone-ops'); ?></span>
                    <button type="button" class="hearthstone-order-action-btn hearthstone-order-refresh-btn" data-orders-refresh>
                        <?php esc_html_e('Refresh', 'hearthstone-ops'); ?>
                    </button>
                </div>
            </div>
            <div data-home-orders-body>
                <?php
                echo hearthstone_ops_render_guest_active_orders_list(
                    $active_orders,
                    $room_number,
                    __('No active orders right now.', 'hearthstone-ops'),
                    'home'
                ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                ?>
            </div>
        </div>
    </section>
    <script>
    (function () {
        var homeRoot = document.querySelector('.hearthstone-guest-home');

        if (!homeRoot) {
            return;
        }

        var bodyContainer = homeRoot.querySelector('[data-home-orders-body]');

        if (!bodyContainer) {
            return;
        }

        var pollUrl = String(homeRoot.getAttribute('data-orders-poll-url') || '');
        var requestedTrackKey = String(homeRoot.getAttribute('data-track-order') || '');
        var trackLabel = String(homeRoot.getAttribute('data-track-label') || 'Track order');
        var hideLabel = String(homeRoot.getAttribute('data-hide-label') || 'Hide tracking');
        var liveLabel = String(homeRoot.getAttribute('data-live-label') || 'Live');
        var reconnectingLabel = String(homeRoot.getAttribute('data-reconnecting-label') || 'Reconnecting...');
        var updatedPrefix = String(homeRoot.getAttribute('data-updated-prefix') || 'Updated');
        var activeTrackKey = requestedTrackKey;
        var refreshButton = homeRoot.querySelector('[data-orders-refresh]');
        var updatedNode = homeRoot.querySelector('[data-orders-updated]');
        var countNode = homeRoot.querySelector('[data-orders-count]');
        var isRefreshing = false;

        var setUpdatedLabel = function (label) {
            if (updatedNode) {
                updatedNode.textContent = label;
            }
        };

        var setRefreshDisabled = function (disabled) {
            if (refreshButton) {
                refreshButton.disabled = !!disabled;
            }
        };

        var setTrackToggleState = function (toggleButton, expanded) {
            var detailsId = String(toggleButton.getAttribute('aria-controls') || '');

            if (!detailsId) {
                return;
            }

            var details = bodyContainer.querySelector('#' + detailsId);

            if (!details) {
                return;
            }

            toggleButton.setAttribute('aria-expanded', expanded ? 'true' : 'false');
            details.hidden = !expanded;
            toggleButton.textContent = expanded ? hideLabel : trackLabel;

            if (expanded) {
                activeTrackKey = String(toggleButton.getAttribute('data-track-key') || '');
            } else if (activeTrackKey === String(toggleButton.getAttribute('data-track-key') || '')) {
                activeTrackKey = '';
            }
        };

        var bindTrackToggles = function () {
            var toggles = bodyContainer.querySelectorAll('[data-order-track-toggle]');
            var pendingKey = activeTrackKey !== '' ? activeTrackKey : requestedTrackKey;
            var pendingHandled = false;

            toggles.forEach(function (toggleButton) {
                setTrackToggleState(toggleButton, false);

                toggleButton.addEventListener('click', function () {
                    var expanded = toggleButton.getAttribute('aria-expanded') === 'true';

                    setTrackToggleState(toggleButton, !expanded);
                });

                if (!pendingHandled && pendingKey !== '' && String(toggleButton.getAttribute('data-track-key') || '') === pendingKey) {
                    setTrackToggleState(toggleButton, true);
                    pendingHandled = true;
                    requestedTrackKey = '';
                }
            });
        };

        var refreshOrders = function (forceRefresh) {
            if (!pollUrl || (isRefreshing && !forceRefresh)) {
                return;
            }

            isRefreshing = true;
            setRefreshDisabled(true);

            window.fetch(pollUrl, { credentials: 'same-origin' })
                .then(function (response) {
                    if (!response.ok) {
                        return null;
                    }

                    return response.json();
                })
                .then(function (payload) {
                    if (!payload || !payload.success || !payload.data || !payload.data.html) {
                        return;
                    }

                    bodyContainer.innerHTML = String(payload.data.html);
                    bindTrackToggles();

                    if (countNode && typeof payload.data.count !== 'undefined') {
                        countNode.textContent = String(payload.data.count);
                    }

                    setUpdatedLabel(updatedPrefix + ' ' + new Date().toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' }));
                })
                .catch(function () {
                    setUpdatedLabel(reconnectingLabel);
                })
                .then(function () {
                    isRefreshing = false;
                    setRefreshDisabled(false);
                });
        };

        bindTrackToggles();
        setUpdatedLabel(liveLabel);
        if (refreshButton) {
            refreshButton.addEventListener('click', function () {
                refreshOrders(true);
            });
        }
        window.setInterval(refreshOrders, 15000);
    }());
    </script>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_guest_home_shell', 'hearthstone_ops_render_guest_home_shell_shortcode');

/**
 * Render My Stay screen shortcode.
 *
 * Usage: [hearthstone_guest_my_stay]
 */
function hearthstone_ops_render_guest_my_stay_shortcode(): string
{
    $session = hearthstone_ops_get_guest_session();

    if (!is_array($session)) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $room_number = isset($session['room_number']) ? (string) $session['room_number'] : '';
    $stay_id = isset($session['stay_id']) ? (int) $session['stay_id'] : 0;
    $check_in = $stay_id > 0 ? (string) get_post_meta($stay_id, '_hearthstone_stay_check_in', true) : '';
    $check_out = $stay_id > 0 ? (string) get_post_meta($stay_id, '_hearthstone_stay_check_out', true) : '';
    $active_orders = hearthstone_ops_get_guest_active_orders_for_room($room_number);
    $room_notice_key = isset($_GET['hearthstone_room_service']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_room_service'])) : '';
    $room_order_ref  = isset($_GET['hearthstone_room_service_order']) ? absint($_GET['hearthstone_room_service_order']) : 0;
    $gift_notice_key = isset($_GET['hearthstone_gift_shop']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_gift_shop'])) : '';
    $gift_order_ref  = isset($_GET['hearthstone_gift_order']) ? absint($_GET['hearthstone_gift_order']) : 0;

    ob_start();
    ?>
    <section class="hearthstone-guest-my-stay">
        <?php echo hearthstone_ops_render_guest_order_feedback_notices(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php
        if (in_array($room_notice_key, ['submitted', 'updated'], true) && $room_order_ref > 0) {
            echo hearthstone_ops_render_guest_order_confirmation_card('dining', $room_order_ref, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } elseif ($gift_notice_key === 'submitted' && $gift_order_ref > 0) {
            echo hearthstone_ops_render_guest_order_confirmation_card('gift', $gift_order_ref, $room_number); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
        ?>
        <div class="hearthstone-card">
            <h2><?php esc_html_e('My Stay', 'hearthstone-ops'); ?></h2>
            <p class="hearthstone-order-meta">
                <?php
                printf(
                    esc_html__('Room %1$s - %2$s to %3$s', 'hearthstone-ops'),
                    esc_html($room_number !== '' ? $room_number : 'N/A'),
                    esc_html($check_in !== '' ? $check_in : __('Check-in pending', 'hearthstone-ops')),
                    esc_html($check_out !== '' ? $check_out : __('Checkout pending', 'hearthstone-ops'))
                );
                ?>
            </p>
        </div>
        <div class="hearthstone-card" style="margin-top:14px;">
            <p class="hearthstone-service-app__section-title"><?php esc_html_e('Orders', 'hearthstone-ops'); ?></p>
            <?php
            echo hearthstone_ops_render_guest_active_orders_list(
                $active_orders,
                $room_number,
                __('No active orders yet. Open Dining or Gift Shop to place one.', 'hearthstone-ops'),
                'my_stay'
            ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            ?>
        </div>

        <div style="margin-top:14px;">
            <p class="hearthstone-service-app__section-title"><?php esc_html_e('Perks and stay essentials', 'hearthstone-ops'); ?></p>
            <?php echo do_shortcode('[hearthstone_guest_perks_info]'); ?>
        </div>

        <div class="hearthstone-card" style="margin-top:14px;">
            <p class="hearthstone-service-app__section-title"><?php esc_html_e('During your stay', 'hearthstone-ops'); ?></p>
            <div class="hearthstone-order-grid">
                <article class="hearthstone-order-card">
                    <h3><?php esc_html_e('At the property', 'hearthstone-ops'); ?></h3>
                    <ul class="hearthstone-guest-home__bullet-list">
                        <li><?php esc_html_e('Ask front desk if first-floor access is better for your stay.', 'hearthstone-ops'); ?></li>
                        <li><?php esc_html_e('Fireplace rooms are limited; request early when available.', 'hearthstone-ops'); ?></li>
                        <li><?php esc_html_e('Need towels, toiletries, or extra blankets? Submit a service request.', 'hearthstone-ops'); ?></li>
                    </ul>
                </article>
                <article class="hearthstone-order-card">
                    <h3><?php esc_html_e('In town', 'hearthstone-ops'); ?></h3>
                    <ul class="hearthstone-guest-home__bullet-list">
                        <li><?php esc_html_e('Local highlights are easy to reach from the property.', 'hearthstone-ops'); ?></li>
                        <li><?php esc_html_e('Most downtown dining and shops are walkable from your room.', 'hearthstone-ops'); ?></li>
                        <li><?php esc_html_e('Message front desk for same-day recommendations and timing tips.', 'hearthstone-ops'); ?></li>
                    </ul>
                </article>
            </div>
        </div>

    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_guest_my_stay', 'hearthstone_ops_render_guest_my_stay_shortcode');

/**
 * Render perks/info cards shortcode.
 *
 * Usage: [hearthstone_guest_perks_info]
 */
function hearthstone_ops_render_guest_perks_info_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $perks = [
        [
            'title' => __('Wi-Fi', 'hearthstone-ops'),
            'details' => __('Available in rooms and courtyard. Ask front desk for latest network details.', 'hearthstone-ops'),
        ],
        [
            'title' => __('Quiet hours', 'hearthstone-ops'),
            'details' => __('Please keep noise low from 10:00 PM through 7:00 AM.', 'hearthstone-ops'),
        ],
        [
            'title' => __('Housekeeping requests', 'hearthstone-ops'),
            'details' => __('Use Help to request towels, toiletries, extra blankets, or refresh service.', 'hearthstone-ops'),
        ],
        [
            'title' => __('Train-day convenience', 'hearthstone-ops'),
            'details' => __('The scenic railroad depot is directly across the street.', 'hearthstone-ops'),
        ],
    ];

    ob_start();
    ?>
    <section class="hearthstone-order-grid">
        <?php foreach ($perks as $perk) : ?>
            <article class="hearthstone-order-card">
                <h3><?php echo esc_html($perk['title']); ?></h3>
                <p class="hearthstone-order-meta"><?php echo esc_html($perk['details']); ?></p>
            </article>
        <?php endforeach; ?>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_guest_perks_info', 'hearthstone_ops_render_guest_perks_info_shortcode');

/**
 * Render help center shortcuts + service request form.
 *
 * Usage: [hearthstone_guest_help_center]
 */
function hearthstone_ops_render_guest_help_center_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $front_desk_phone = hearthstone_ops_get_front_desk_phone_number();
    $front_desk_tel = hearthstone_ops_get_front_desk_tel_href();

    ob_start();
    ?>
    <section class="hearthstone-guest-help-center">
        <div class="hearthstone-order-grid">
            <?php if ($front_desk_tel !== '') : ?>
                <article class="hearthstone-order-card">
                    <h3><?php esc_html_e('Call front desk', 'hearthstone-ops'); ?></h3>
                    <p class="hearthstone-order-meta"><?php echo esc_html($front_desk_phone); ?></p>
                    <div class="hearthstone-order-actions wp-block-buttons">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($front_desk_tel); ?>">
                                <?php esc_html_e('Call now', 'hearthstone-ops'); ?>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <article class="hearthstone-order-card">
                <h3><?php esc_html_e('Request an item', 'hearthstone-ops'); ?></h3>
                <p class="hearthstone-order-meta"><?php esc_html_e('Use the request form below for towels, toiletries, crib, or amenity needs.', 'hearthstone-ops'); ?></p>
            </article>

            <article class="hearthstone-order-card">
                <h3><?php esc_html_e('Report an issue', 'hearthstone-ops'); ?></h3>
                <p class="hearthstone-order-meta"><?php esc_html_e('Choose Maintenance in the request form and include details so staff can respond quickly.', 'hearthstone-ops'); ?></p>
            </article>
        </div>

        <div class="hearthstone-guest-help-center__form-wrap">
            <?php echo do_shortcode('[hearthstone_service_request_app]'); ?>
        </div>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_guest_help_center', 'hearthstone_ops_render_guest_help_center_shortcode');

/**
 * AJAX snapshot for live guest order tracking on Home.
 */
function hearthstone_ops_guest_orders_snapshot_ajax(): void
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        wp_send_json_error(['message' => __('Guest session expired.', 'hearthstone-ops')], 401);
    }

    $room_number = hearthstone_ops_get_guest_room_context();
    $active_orders = hearthstone_ops_get_guest_active_orders_for_room($room_number);

    $html = hearthstone_ops_render_guest_active_orders_list(
        $active_orders,
        $room_number,
        __('No active orders right now.', 'hearthstone-ops'),
        'home'
    );

    wp_send_json_success([
        'html' => $html,
        'count' => count($active_orders),
        'updated_at' => current_time('mysql'),
    ]);
}
add_action('wp_ajax_nopriv_hearthstone_ops_guest_orders_snapshot', 'hearthstone_ops_guest_orders_snapshot_ajax');
add_action('wp_ajax_hearthstone_ops_guest_orders_snapshot', 'hearthstone_ops_guest_orders_snapshot_ajax');

/**
 * Render guest action grid shortcode.
 *
 * Usage: [hearthstone_guest_action_grid]
 */
function hearthstone_ops_render_guest_action_grid_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $actions = [
        [
            'title' => __('Restaurant Orders', 'hearthstone-ops'),
            'url' => hearthstone_ops_get_guest_page_url('dining', '/dining/'),
            'label' => __('Order room service', 'hearthstone-ops'),
        ],
        [
            'title' => __('Gift Shop', 'hearthstone-ops'),
            'url' => hearthstone_ops_get_guest_page_url('gift-shop', '/gift-shop/'),
            'label' => __('Open gift shop', 'hearthstone-ops'),
        ],
        [
            'title' => __('Service Requests', 'hearthstone-ops'),
            'url' => hearthstone_ops_get_guest_page_url('help', '/help/'),
            'label' => __('Open help center', 'hearthstone-ops'),
        ],
        [
            'title' => __('My Stay', 'hearthstone-ops'),
            'url' => hearthstone_ops_get_guest_page_url('my-stay', '/my-stay/'),
            'label' => __('Open stay hub', 'hearthstone-ops'),
        ],
    ];

    ob_start();
    ?>
    <div class="hearthstone-order-grid">
        <?php foreach ($actions as $action) : ?>
            <article class="hearthstone-order-card">
                <h3><?php echo esc_html($action['title']); ?></h3>
                <div class="hearthstone-order-actions wp-block-buttons">
                    <div class="wp-block-button">
                        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($action['url']); ?>">
                            <?php echo esc_html($action['label']); ?>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_guest_action_grid', 'hearthstone_ops_render_guest_action_grid_shortcode');

/**
 * Return the default gift shop catalog.
 *
 * @return array<string, array<string, string|float>>
 */
function hearthstone_ops_get_gift_shop_catalog(): array
{
    return [
        'hearthstone_rail_mug' => [
            'label' => __('Hearthstone Rail Mug', 'hearthstone-ops'),
            'description' => __('Matte ceramic mug with signature crest.', 'hearthstone-ops'),
            'price' => 18.00,
            'category' => __('Signature Collection', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'hearthstone_canvas_tote' => [
            'label' => __('Hearthstone Canvas Tote', 'hearthstone-ops'),
            'description' => __('Natural canvas tote for train-day essentials.', 'hearthstone-ops'),
            'price' => 22.00,
            'category' => __('Signature Collection', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/1152077/pexels-photo-1152077.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'vintage_postcard_pack' => [
            'label' => __('Vintage Postcard Pack', 'hearthstone-ops'),
            'description' => __('Set of 12 destination-inspired postcards for keepsakes or mailing home.', 'hearthstone-ops'),
            'price' => 12.00,
            'category' => __('Signature Collection', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'rail_keychain_brass' => [
            'label' => __('Brass Rail Keychain', 'hearthstone-ops'),
            'description' => __('Engraved keychain inspired by historic rail details.', 'hearthstone-ops'),
            'price' => 9.00,
            'category' => __('Signature Collection', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/9428789/pexels-photo-9428789.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'blue_corn_cookie_tin' => [
            'label' => __('Blue Corn Cookie Tin', 'hearthstone-ops'),
            'description' => __('House favorite snack pack for your room or trip home.', 'hearthstone-ops'),
            'price' => 16.00,
            'category' => __('Pantry & Snacks', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/230325/pexels-photo-230325.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'mountain_honey_jar' => [
            'label' => __('Mountain Honey Jar', 'hearthstone-ops'),
            'description' => __('Local small-batch honey.', 'hearthstone-ops'),
            'price' => 14.00,
            'category' => __('Pantry & Snacks', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/1638280/pexels-photo-1638280.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'pinon_trail_mix' => [
            'label' => __('Pinon Trail Mix', 'hearthstone-ops'),
            'description' => __('Savory-sweet snack blend for train rides and day hikes.', 'hearthstone-ops'),
            'price' => 11.00,
            'category' => __('Pantry & Snacks', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/1028599/pexels-photo-1028599.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'artisan_hot_cocoa_kit' => [
            'label' => __('Artisan Hot Cocoa Kit', 'hearthstone-ops'),
            'description' => __('Single-serve cocoa set with house spice blend.', 'hearthstone-ops'),
            'price' => 13.00,
            'category' => __('Pantry & Snacks', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/14691929/pexels-photo-14691929.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'travel_toiletry_kit' => [
            'label' => __('Emergency Toiletry Kit', 'hearthstone-ops'),
            'description' => __('Travel-size basics in a compact pouch.', 'hearthstone-ops'),
            'price' => 7.00,
            'category' => __('Stay Essentials', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/4202921/pexels-photo-4202921.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'sleep_comfort_set' => [
            'label' => __('Sleep Comfort Set', 'hearthstone-ops'),
            'description' => __('Sleep mask and earplug set.', 'hearthstone-ops'),
            'price' => 8.00,
            'category' => __('Stay Essentials', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/3764579/pexels-photo-3764579.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'charger_cable_kit' => [
            'label' => __('Universal Charger Kit', 'hearthstone-ops'),
            'description' => __('Fast-charge brick with USB-C and Lightning cables.', 'hearthstone-ops'),
            'price' => 19.00,
            'category' => __('Stay Essentials', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/5081398/pexels-photo-5081398.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'cozy_slipper_set' => [
            'label' => __('Cozy Slipper Set', 'hearthstone-ops'),
            'description' => __('Soft in-room slippers for a warmer evening stay.', 'hearthstone-ops'),
            'price' => 15.00,
            'category' => __('Stay Essentials', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/4210860/pexels-photo-4210860.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'sunset_courtyard_candle' => [
            'label' => __('Sunset Courtyard Candle', 'hearthstone-ops'),
            'description' => __('Small-batch candle with cedar and warm amber notes.', 'hearthstone-ops'),
            'price' => 21.00,
            'category' => __('Upgrades & Comfort', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/4273460/pexels-photo-4273460.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        'flower_welcome_bundle' => [
            'label' => __('Welcome Flower Bundle', 'hearthstone-ops'),
            'description' => __('Fresh seasonal arrangement for your room on request.', 'hearthstone-ops'),
            'price' => 28.00,
            'category' => __('Upgrades & Comfort', 'hearthstone-ops'),
            'image_url' => 'https://images.pexels.com/photos/931155/pexels-photo-931155.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
    ];
}

/**
 * Render gift shop app shortcode.
 *
 * Usage: [hearthstone_gift_shop_app]
 */
function hearthstone_ops_render_gift_shop_app_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $catalog = hearthstone_ops_get_gift_shop_catalog();
    $notice_key = isset($_GET['hearthstone_gift_shop']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_gift_shop'])) : '';
    $order_ref  = isset($_GET['hearthstone_gift_order']) ? absint($_GET['hearthstone_gift_order']) : 0;
    $has_woocommerce = hearthstone_ops_is_wc_gift_checkout_enabled();
    $room_number = hearthstone_ops_get_guest_room_context();

    $grouped_catalog = [];
    $category_index = [];

    foreach ($catalog as $item_key => $item) {
        $category = isset($item['category']) && is_string($item['category'])
            ? $item['category']
            : __('Collection', 'hearthstone-ops');
        $category_slug = sanitize_title($category);

        if (!isset($grouped_catalog[$category])) {
            $grouped_catalog[$category] = [];
        }

        $grouped_catalog[$category][$item_key] = $item;

        if (!isset($category_index[$category_slug])) {
            $category_index[$category_slug] = [
                'label' => $category,
                'count' => 0,
            ];
        }

        $category_index[$category_slug]['count']++;
    }

    ob_start();
    ?>
    <section class="hearthstone-gift-shop-app hearthstone-service-app" data-cart-app="gift-shop" data-shop-app style="margin:0 auto;max-width:1160px;">
        <?php if ($notice_key === 'submitted' && $order_ref > 0) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--success">
                <?php
                printf(
                    esc_html__('Gift order submitted. Reference #%d. Front desk will confirm pickup/drop-off.', 'hearthstone-ops'),
                    $order_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'invalid_item') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('That catalog item is unavailable right now. Please choose another item.', 'hearthstone-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'woo_unavailable') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('Card checkout is unavailable right now. Please submit as room charge.', 'hearthstone-ops'); ?>
            </div>
        <?php endif; ?>
        <?php
        $tracked_gift_order_card = '';

        if ($order_ref > 0) {
            $tracked_gift_order_card = hearthstone_ops_render_guest_order_confirmation_card('gift', $order_ref, $room_number);
        }

        if ($tracked_gift_order_card !== '') {
            echo $tracked_gift_order_card; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } elseif ($order_ref > 0) {
            ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('That order is not available for this stay session.', 'hearthstone-ops'); ?>
            </div>
            <?php
        }
        ?>

        <header class="hearthstone-shopfront__header">
            <div class="hearthstone-shopfront__intro">
                <h2 class="hearthstone-service-app__heading hearthstone-shopfront__title"><?php esc_html_e('Gift shop', 'hearthstone-ops'); ?></h2>
                <p class="hearthstone-order-meta"><?php esc_html_e('Souvenirs, essentials, and comfort upgrades delivered during your stay.', 'hearthstone-ops'); ?></p>
            </div>
            <div class="hearthstone-shopfront__search-wrap">
                <label for="hearthstone_shop_search" class="screen-reader-text"><?php esc_html_e('Search gift shop items', 'hearthstone-ops'); ?></label>
                <input type="search" id="hearthstone_shop_search" class="hearthstone-shopfront__search" data-shop-search placeholder="<?php esc_attr_e('Search by item name', 'hearthstone-ops'); ?>">
            </div>
        </header>

        <div class="hearthstone-shopfront__filters" role="tablist" aria-label="<?php esc_attr_e('Gift shop categories', 'hearthstone-ops'); ?>">
            <button type="button" class="hearthstone-shopfront__filter is-active" data-shop-filter="all" aria-pressed="true">
                <?php esc_html_e('All', 'hearthstone-ops'); ?>
                <span class="hearthstone-shopfront__filter-count"><?php echo esc_html((string) count($catalog)); ?></span>
            </button>
            <?php foreach ($category_index as $category_slug => $category_data) : ?>
                <button type="button" class="hearthstone-shopfront__filter" data-shop-filter="<?php echo esc_attr($category_slug); ?>" aria-pressed="false">
                    <?php echo esc_html((string) $category_data['label']); ?>
                    <span class="hearthstone-shopfront__filter-count"><?php echo esc_html((string) $category_data['count']); ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="hearthstone-service-app__layout hearthstone-shopfront__layout">
            <div class="hearthstone-service-app__catalog hearthstone-shopfront__catalog">
                <div class="hearthstone-order-grid hearthstone-order-grid--shop">
                    <?php foreach ($grouped_catalog as $category_label => $group_items) : ?>
                        <?php
                        $category_slug = sanitize_title($category_label);
                        foreach ($group_items as $item_key => $item) :
                            $item_label = isset($item['label']) ? (string) $item['label'] : '';
                            $item_description = isset($item['description']) ? (string) $item['description'] : '';
                            $item_price = isset($item['price']) ? (float) $item['price'] : 0.0;
                            $image_url = isset($item['image_url']) ? (string) $item['image_url'] : '';
                            $search_index = strtolower(trim($item_label . ' ' . $item_description . ' ' . $category_label));
                            ?>
                            <article
                                class="hearthstone-order-card hearthstone-shop-card"
                                data-shop-card
                                data-shop-category="<?php echo esc_attr($category_slug); ?>"
                                data-shop-search-index="<?php echo esc_attr($search_index); ?>"
                                data-cart-item
                                data-item-id="<?php echo esc_attr((string) $item_key); ?>"
                                data-item-title="<?php echo esc_attr($item_label); ?>"
                                data-item-price="<?php echo esc_attr((string) $item_price); ?>"
                            >
                                <?php if ($image_url !== '') : ?>
                                    <div class="hearthstone-order-card__media hearthstone-shop-card__media">
                                        <img
                                            src="<?php echo esc_url($image_url); ?>"
                                            alt="<?php echo esc_attr($item_label); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </div>
                                <?php endif; ?>
                                <div class="hearthstone-shop-card__body">
                                    <p class="hearthstone-order-chip hearthstone-shop-card__category"><?php echo esc_html($category_label); ?></p>
                                    <h3><?php echo esc_html($item_label); ?></h3>
                                    <p class="hearthstone-order-meta"><?php echo esc_html($item_description); ?></p>
                                    <div class="hearthstone-order-card__meta-row hearthstone-shop-card__meta">
                                        <p class="hearthstone-order-price"><?php echo esc_html('$' . number_format($item_price, 2)); ?></p>
                                        <button type="button" class="hearthstone-shop-card__add-btn" data-action="increment"><?php esc_html_e('Add', 'hearthstone-ops'); ?></button>
                                    </div>
                                    <div class="hearthstone-item-stepper hearthstone-shop-card__stepper">
                                        <button type="button" class="hearthstone-step-btn" data-action="decrement" aria-label="<?php esc_attr_e('Decrease quantity', 'hearthstone-ops'); ?>">-</button>
                                        <span class="hearthstone-step-qty" data-qty>0</span>
                                        <button type="button" class="hearthstone-step-btn" data-action="increment" aria-label="<?php esc_attr_e('Increase quantity', 'hearthstone-ops'); ?>">+</button>
                                        <button type="button" class="hearthstone-step-clear" data-action="clear" hidden aria-label="<?php esc_attr_e('Remove item', 'hearthstone-ops'); ?>">
                                            <span class="dashicons dashicons-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <p class="hearthstone-order-meta hearthstone-shopfront__empty" data-shop-empty hidden><?php esc_html_e('No products match that filter yet. Try another category or search term.', 'hearthstone-ops'); ?></p>
            </div>

            <aside class="hearthstone-service-app__panel">
                <div class="hearthstone-card hearthstone-order-panel">
                    <h3 class="hearthstone-service-app__heading"><?php esc_html_e('Shopping cart', 'hearthstone-ops'); ?></h3>

                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="hearthstone-order-form">
                        <?php wp_nonce_field('hearthstone_ops_submit_gift_shop_order_action', 'hearthstone_ops_submit_gift_shop_order_nonce'); ?>
                        <input type="hidden" name="action" value="hearthstone_ops_submit_gift_shop_order">
                        <input type="hidden" name="hearthstone_checkout_mode" value="ops" data-checkout-mode-input>
                        <input type="hidden" name="hearthstone_gift_cart" value="{}" data-cart-input>

                        <div class="hearthstone-cart-summary" data-cart-summary>
                            <p class="hearthstone-order-meta"><?php esc_html_e('No items selected yet.', 'hearthstone-ops'); ?></p>
                        </div>
                        <p class="hearthstone-cart-total"><strong><?php esc_html_e('Total', 'hearthstone-ops'); ?>:</strong> <span data-cart-total>$0.00</span></p>

                        <p class="hearthstone-form-field">
                            <label for="hearthstone_gift_fulfillment_method"><?php esc_html_e('Fulfillment', 'hearthstone-ops'); ?></label>
                            <select id="hearthstone_gift_fulfillment_method" name="hearthstone_gift_fulfillment_method">
                                <option value="room_delivery"><?php esc_html_e('Room delivery', 'hearthstone-ops'); ?></option>
                                <option value="front_desk_pickup"><?php esc_html_e('Front desk pickup', 'hearthstone-ops'); ?></option>
                            </select>
                        </p>

                        <p class="hearthstone-form-field">
                            <label for="hearthstone_gift_fulfillment_window"><?php esc_html_e('Preferred window', 'hearthstone-ops'); ?></label>
                            <input type="text" id="hearthstone_gift_fulfillment_window" name="hearthstone_gift_fulfillment_window" placeholder="<?php esc_attr_e('Example: after 6:30 PM', 'hearthstone-ops'); ?>">
                        </p>

                        <p class="hearthstone-form-field">
                            <label for="hearthstone_gift_notes"><?php esc_html_e('Notes', 'hearthstone-ops'); ?></label>
                            <textarea id="hearthstone_gift_notes" name="hearthstone_gift_notes" rows="3"></textarea>
                        </p>

                        <div class="hearthstone-order-actions wp-block-buttons">
                            <button
                                type="submit"
                                class="wp-element-button hearthstone-order-submit"
                                data-cart-submit
                                data-checkout-mode="ops"
                                data-base-label="<?php echo esc_attr__('Place gift shop order', 'hearthstone-ops'); ?>"
                                disabled
                            >
                                <?php esc_html_e('Place gift shop order', 'hearthstone-ops'); ?>
                            </button>
                            <?php if ($has_woocommerce) : ?>
                                <button
                                    type="submit"
                                    class="wp-element-button hearthstone-order-submit"
                                    data-cart-submit
                                    data-checkout-mode="woocommerce"
                                    data-base-label="<?php echo esc_attr__('Checkout with card', 'hearthstone-ops'); ?>"
                                    disabled
                                >
                                    <?php esc_html_e('Checkout with card', 'hearthstone-ops'); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </aside>
        </div>
    </section>
    <?php hearthstone_ops_print_guest_cart_script_once(); ?>
    <?php hearthstone_ops_print_gift_shop_filters_script_once(); ?>
    <?php

    return (string) ob_get_clean();
}

/**
 * Print gift shop filters/search script one time per response.
 */
function hearthstone_ops_print_gift_shop_filters_script_once(): void
{
    static $printed = false;

    if ($printed) {
        return;
    }

    $printed = true;
    ?>
    <script>
    (function () {
        var roots = document.querySelectorAll('[data-shop-app]');

        if (!roots.length) {
            return;
        }

        var normalize = function (value) {
            return String(value || '').toLowerCase();
        };

        roots.forEach(function (root) {
            var cards = root.querySelectorAll('[data-shop-card]');
            var filters = root.querySelectorAll('[data-shop-filter]');
            var search = root.querySelector('[data-shop-search]');
            var emptyState = root.querySelector('[data-shop-empty]');

            if (!cards.length || !filters.length) {
                return;
            }

            var activeFilter = 'all';

            var applyFilters = function () {
                var query = normalize(search ? search.value : '');
                var visibleCount = 0;

                cards.forEach(function (card) {
                    var category = normalize(card.getAttribute('data-shop-category'));
                    var searchIndex = normalize(card.getAttribute('data-shop-search-index'));
                    var matchesCategory = activeFilter === 'all' || category === activeFilter;
                    var matchesQuery = query === '' || searchIndex.indexOf(query) !== -1;
                    var visible = matchesCategory && matchesQuery;

                    card.hidden = !visible;

                    if (visible) {
                        visibleCount += 1;
                    }
                });

                if (emptyState) {
                    emptyState.hidden = visibleCount > 0;
                }
            };

            filters.forEach(function (filterButton) {
                filterButton.addEventListener('click', function () {
                    activeFilter = normalize(filterButton.getAttribute('data-shop-filter') || 'all');

                    filters.forEach(function (button) {
                        var isActive = button === filterButton;
                        button.classList.toggle('is-active', isActive);
                        button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                    });

                    applyFilters();
                });
            });

            if (search) {
                search.addEventListener('input', applyFilters);
            }

            applyFilters();
        });
    }());
    </script>
    <?php
}
add_shortcode('hearthstone_gift_shop_app', 'hearthstone_ops_render_gift_shop_app_shortcode');

/**
 * Handle front-end gift shop submissions.
 */
function hearthstone_ops_submit_gift_shop_order(): void
{
    check_admin_referer('hearthstone_ops_submit_gift_shop_order_action', 'hearthstone_ops_submit_gift_shop_order_nonce');

    if (!hearthstone_ops_is_guest_authenticated()) {
        wp_safe_redirect(add_query_arg('hearthstone_guest_auth', 'expired', hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/')));
        exit;
    }

    $catalog = hearthstone_ops_get_gift_shop_catalog();
    $cart_payload = isset($_POST['hearthstone_gift_cart']) ? (string) wp_unslash($_POST['hearthstone_gift_cart']) : '';
    $fulfillment_method = isset($_POST['hearthstone_gift_fulfillment_method']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_gift_fulfillment_method'])) : 'room_delivery';
    $fulfillment_window = isset($_POST['hearthstone_gift_fulfillment_window']) ? sanitize_text_field((string) wp_unslash($_POST['hearthstone_gift_fulfillment_window'])) : '';
    $guest_notes = isset($_POST['hearthstone_gift_notes']) ? sanitize_textarea_field((string) wp_unslash($_POST['hearthstone_gift_notes'])) : '';
    $checkout_mode = isset($_POST['hearthstone_checkout_mode']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_checkout_mode'])) : 'ops';

    if (!in_array($fulfillment_method, ['room_delivery', 'front_desk_pickup'], true)) {
        $fulfillment_method = 'room_delivery';
    }

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = (string) home_url('/gift-shop/');
    }

    $cart = [];

    if ($cart_payload !== '') {
        $decoded_cart = json_decode($cart_payload, true);

        if (is_array($decoded_cart)) {
            foreach ($decoded_cart as $raw_item_key => $raw_qty) {
                $item_key = sanitize_key((string) $raw_item_key);
                $qty = max(0, absint($raw_qty));

                if ($item_key !== '' && $qty > 0) {
                    $cart[$item_key] = $qty;
                }
            }
        }
    }

    if (empty($cart)) {
        $legacy_item_key = isset($_POST['hearthstone_gift_item_key']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_gift_item_key'])) : '';
        $legacy_qty = isset($_POST['hearthstone_gift_quantity']) ? max(1, absint(wp_unslash($_POST['hearthstone_gift_quantity']))) : 0;

        if ($legacy_item_key !== '' && $legacy_qty > 0) {
            $cart[$legacy_item_key] = $legacy_qty;
        }
    }

    if (empty($cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    $validated_cart = [];
    $order_total = 0.0;
    $total_qty = 0;
    $order_note_lines = [];

    foreach ($cart as $item_key => $qty) {
        if (!isset($catalog[$item_key])) {
            continue;
        }

        $item_label = isset($catalog[$item_key]['label']) ? (string) $catalog[$item_key]['label'] : $item_key;
        $unit_price = isset($catalog[$item_key]['price']) ? (float) $catalog[$item_key]['price'] : 0.0;
        $line_total = $unit_price * $qty;

        $validated_cart[$item_key] = $qty;
        $order_total += $line_total;
        $total_qty += $qty;
        $order_note_lines[] = sprintf(
            __('%1$s x%2$d - $%3$s', 'hearthstone-ops'),
            $item_label,
            $qty,
            number_format($line_total, 2)
        );
    }

    if (empty($validated_cart)) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    $room = hearthstone_ops_get_guest_room_context();

    if ($checkout_mode === 'woocommerce' && !hearthstone_ops_is_wc_gift_checkout_enabled()) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'woo_unavailable', $redirect_url));
        exit;
    }

    if ($checkout_mode === 'woocommerce') {
        hearthstone_ops_start_gift_shop_woocommerce_checkout(
            $validated_cart,
            $catalog,
            $room,
            $fulfillment_method,
            $fulfillment_window,
            $guest_notes,
            $redirect_url
        );
    }

    if ($guest_notes !== '') {
        $order_note_lines[] = __('Guest notes:', 'hearthstone-ops') . ' ' . $guest_notes;
    }

    $order_title = sprintf(
        __('Room %1$s - Gift Order (%2$d item(s))', 'hearthstone-ops'),
        $room,
        count($validated_cart)
    );

    $order_id = wp_insert_post([
        'post_type'    => 'gift_shop_order',
        'post_status'  => 'publish',
        'post_title'   => $order_title,
        'post_content' => implode("\n", $order_note_lines),
    ], true);

    if (is_wp_error($order_id) || (int) $order_id <= 0) {
        wp_safe_redirect(add_query_arg('hearthstone_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    $first_item_key = (string) array_key_first($validated_cart);

    update_post_meta((int) $order_id, '_hearthstone_gift_item_key', $first_item_key);
    update_post_meta((int) $order_id, '_hearthstone_gift_quantity', $total_qty);
    update_post_meta((int) $order_id, '_hearthstone_gift_items_json', wp_json_encode($validated_cart));
    update_post_meta((int) $order_id, '_hearthstone_gift_room_number', $room);
    update_post_meta((int) $order_id, '_hearthstone_gift_guest_name', '');
    update_post_meta((int) $order_id, '_hearthstone_gift_guest_phone', '');
    update_post_meta((int) $order_id, '_hearthstone_gift_fulfillment_method', $fulfillment_method);
    update_post_meta((int) $order_id, '_hearthstone_gift_fulfillment_window', $fulfillment_window);
    update_post_meta((int) $order_id, '_hearthstone_gift_guest_notes', $guest_notes);
    update_post_meta((int) $order_id, '_hearthstone_gift_total', number_format($order_total, 2, '.', ''));
    update_post_meta((int) $order_id, '_hearthstone_gift_order_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'hearthstone_gift_shop'  => 'submitted',
        'hearthstone_gift_order' => (int) $order_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_submit_gift_shop_order', 'hearthstone_ops_submit_gift_shop_order');
add_action('admin_post_hearthstone_ops_submit_gift_shop_order', 'hearthstone_ops_submit_gift_shop_order');

/**
 * Render service request app shortcode.
 *
 * Usage: [hearthstone_service_request_app]
 */
function hearthstone_ops_render_service_request_app_shortcode(): string
{
    if (!hearthstone_ops_is_guest_authenticated()) {
        return hearthstone_ops_render_guest_auth_required_state();
    }

    $session     = hearthstone_ops_get_guest_session();
    $room_number = is_array($session) && isset($session['room_number']) ? (string) $session['room_number'] : '';
    $notice_key  = isset($_GET['hearthstone_service_request']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_service_request'])) : '';
    $request_ref = isset($_GET['hearthstone_service_request_id']) ? absint($_GET['hearthstone_service_request_id']) : 0;

    ob_start();
    ?>
    <section class="hearthstone-service-request-app">
        <?php if ($notice_key === 'submitted' && $request_ref > 0) : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--success">
                <?php
                printf(
                    esc_html__('Request submitted. Reference #%d. Front desk will follow up shortly.', 'hearthstone-ops'),
                    $request_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'missing_room') : ?>
            <div class="hearthstone-app-notice hearthstone-app-notice--error">
                <?php esc_html_e('Please add your room number before submitting.', 'hearthstone-ops'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="hearthstone-order-panel hearthstone-service-request-form">
            <?php wp_nonce_field('hearthstone_ops_submit_service_request_action', 'hearthstone_ops_submit_service_request_nonce'); ?>
            <input type="hidden" name="action" value="hearthstone_ops_submit_service_request">
            <div class="hearthstone-service-request-form__header">
                <h3 class="hearthstone-service-app__heading"><?php esc_html_e('Front desk request', 'hearthstone-ops'); ?></h3>
                <p class="hearthstone-order-meta"><?php esc_html_e('Tell us what you need and our team will follow up at your room.', 'hearthstone-ops'); ?></p>
            </div>
            <div class="hearthstone-service-request-form__grid">
                <p class="hearthstone-form-field">
                    <label for="hearthstone_service_request_category"><?php esc_html_e('Request type', 'hearthstone-ops'); ?></label>
                    <select id="hearthstone_service_request_category" name="hearthstone_service_request_category" required>
                        <option value="housekeeping"><?php esc_html_e('Housekeeping', 'hearthstone-ops'); ?></option>
                        <option value="amenities"><?php esc_html_e('Amenities', 'hearthstone-ops'); ?></option>
                        <option value="front_desk"><?php esc_html_e('Front desk support', 'hearthstone-ops'); ?></option>
                        <option value="maintenance"><?php esc_html_e('Maintenance', 'hearthstone-ops'); ?></option>
                        <option value="other"><?php esc_html_e('Other', 'hearthstone-ops'); ?></option>
                    </select>
                </p>

                <p class="hearthstone-form-field">
                    <label for="hearthstone_service_request_priority"><?php esc_html_e('Priority', 'hearthstone-ops'); ?></label>
                    <select id="hearthstone_service_request_priority" name="hearthstone_service_request_priority" required>
                        <option value="normal"><?php esc_html_e('Normal', 'hearthstone-ops'); ?></option>
                        <option value="urgent"><?php esc_html_e('Urgent', 'hearthstone-ops'); ?></option>
                    </select>
                </p>

                <p class="hearthstone-form-field hearthstone-form-field--full">
                    <label><?php esc_html_e('Room', 'hearthstone-ops'); ?></label>
                    <span class="hearthstone-service-request-form__room-value"><?php echo esc_html($room_number !== '' ? $room_number : __('Assigned at check-in', 'hearthstone-ops')); ?></span>
                </p>
            </div>

            <input type="hidden" name="hearthstone_service_request_room" value="<?php echo esc_attr($room_number); ?>">
            <p class="hearthstone-form-field">
                <label for="hearthstone_service_request_guest_name"><?php esc_html_e('Name (optional)', 'hearthstone-ops'); ?></label>
                <input
                    type="text"
                    id="hearthstone_service_request_guest_name"
                    name="hearthstone_service_request_guest_name"
                    autocomplete="name"
                >
            </p>
            <p class="hearthstone-form-field">
                <label for="hearthstone_service_request_guest_phone"><?php esc_html_e('Phone (optional)', 'hearthstone-ops'); ?></label>
                <input
                    type="tel"
                    id="hearthstone_service_request_guest_phone"
                    name="hearthstone_service_request_guest_phone"
                    inputmode="tel"
                    autocomplete="tel"
                >
            </p>
            <p class="hearthstone-form-field hearthstone-form-field--full">
                <label for="hearthstone_service_request_notes"><?php esc_html_e('Details', 'hearthstone-ops'); ?></label>
                <textarea
                    id="hearthstone_service_request_notes"
                    name="hearthstone_service_request_notes"
                    rows="4"
                    required
                    placeholder="<?php esc_attr_e('Tell the front desk what you need and where to deliver it.', 'hearthstone-ops'); ?>"
                ></textarea>
            </p>

            <button type="submit" class="hearthstone-order-submit hearthstone-service-request-form__submit"><?php esc_html_e('Submit request', 'hearthstone-ops'); ?></button>
        </form>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('hearthstone_service_request_app', 'hearthstone_ops_render_service_request_app_shortcode');

/**
 * Handle guest service request submissions.
 */
function hearthstone_ops_submit_service_request(): void
{
    check_admin_referer('hearthstone_ops_submit_service_request_action', 'hearthstone_ops_submit_service_request_nonce');

    if (!hearthstone_ops_is_guest_authenticated()) {
        wp_safe_redirect(add_query_arg('hearthstone_guest_auth', 'expired', hearthstone_ops_get_guest_page_url('guest-access', '/guest-access/')));
        exit;
    }

    $category = isset($_POST['hearthstone_service_request_category']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_service_request_category'])) : 'front_desk';
    $priority = isset($_POST['hearthstone_service_request_priority']) ? sanitize_key((string) wp_unslash($_POST['hearthstone_service_request_priority'])) : 'normal';
    $room     = isset($_POST['hearthstone_service_request_room']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_room'])) : '';
    $name     = isset($_POST['hearthstone_service_request_guest_name']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_guest_name'])) : '';
    $phone    = isset($_POST['hearthstone_service_request_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['hearthstone_service_request_guest_phone'])) : '';
    $notes    = isset($_POST['hearthstone_service_request_notes']) ? sanitize_textarea_field(wp_unslash($_POST['hearthstone_service_request_notes'])) : '';

    $allowed_categories = ['housekeeping', 'amenities', 'front_desk', 'maintenance', 'other'];
    $allowed_priorities = ['normal', 'urgent'];

    if (!in_array($category, $allowed_categories, true)) {
        $category = 'front_desk';
    }

    if (!in_array($priority, $allowed_priorities, true)) {
        $priority = 'normal';
    }

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = (string) home_url('/help/');
    }

    if ($room === '') {
        $room = hearthstone_ops_get_guest_room_context();
    }

    if ($room === '') {
        wp_safe_redirect(add_query_arg('hearthstone_service_request', 'missing_room', $redirect_url));
        exit;
    }

    $title = sprintf(
        __('Room %1$s - %2$s request', 'hearthstone-ops'),
        $room,
        ucwords(str_replace('_', ' ', $category))
    );

    $note_lines = [trim($notes)];

    if ($name !== '') {
        $note_lines[] = sprintf(__('Guest Name: %s', 'hearthstone-ops'), $name);
    }

    if ($phone !== '') {
        $note_lines[] = sprintf(__('Guest Phone: %s', 'hearthstone-ops'), $phone);
    }

    $request_id = wp_insert_post([
        'post_type'    => 'guest_service_request',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_content' => implode("\n", array_filter($note_lines)),
    ], true);

    if (is_wp_error($request_id) || (int) $request_id <= 0) {
        wp_safe_redirect(add_query_arg('hearthstone_service_request', 'missing_room', $redirect_url));
        exit;
    }

    update_post_meta((int) $request_id, '_hearthstone_service_request_category', $category);
    update_post_meta((int) $request_id, '_hearthstone_service_request_priority', $priority);
    update_post_meta((int) $request_id, '_hearthstone_service_request_room', $room);
    update_post_meta((int) $request_id, '_hearthstone_service_request_guest_name', $name);
    update_post_meta((int) $request_id, '_hearthstone_service_request_guest_phone', $phone);
    update_post_meta((int) $request_id, '_hearthstone_service_request_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'hearthstone_service_request'    => 'submitted',
        'hearthstone_service_request_id' => (int) $request_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_hearthstone_ops_submit_service_request', 'hearthstone_ops_submit_service_request');
add_action('admin_post_hearthstone_ops_submit_service_request', 'hearthstone_ops_submit_service_request');

/**
 * Seed starter room-service menu items for demos.
 */
function hearthstone_ops_seed_room_service_menu_items(bool $force = false): void
{
    if (!$force && (!is_admin() || !current_user_can('manage_options'))) {
        return;
    }

    $seed_version = (int) get_option('hearthstone_ops_room_service_seed_version', 0);
    $has_existing_items = !empty(get_posts([
        'post_type'      => 'room_service_item',
        'posts_per_page' => 1,
        'post_status'    => ['publish', 'draft', 'pending', 'private'],
    ]));

    if ($seed_version >= 2 && $has_existing_items) {
        return;
    }

    $items = [
        [
            'title'        => 'Filet Mignon',
            'description'  => '8 oz filet with herb butter, roasted potatoes, and seasonal vegetables.',
            'price'        => '44.00',
            'prep_minutes' => 35,
            'image_url'    => 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        [
            'title'        => 'Trout + Lemon Caper',
            'description'  => 'Pan-seared trout, lemon caper sauce, wild rice, and charred asparagus.',
            'price'        => '31.00',
            'prep_minutes' => 24,
            'image_url'    => 'https://images.pexels.com/photos/1516415/pexels-photo-1516415.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        [
            'title'        => 'Green Chile Chicken Alfredo',
            'description'  => 'House-made cream sauce, green chile, grilled chicken, and fresh herbs.',
            'price'        => '26.00',
            'prep_minutes' => 22,
            'image_url'    => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
        [
            'title'        => 'Garden Salad',
            'description'  => 'Mixed greens, seasonal vegetables, and house vinaigrette.',
            'price'        => '9.00',
            'prep_minutes' => 8,
            'image_url'    => 'https://images.pexels.com/photos/5938/food-salad-healthy-lunch.jpg?auto=compress&cs=tinysrgb&w=1400',
        ],
        [
            'title'        => 'Hot Cocoa',
            'description'  => 'Rich cocoa with whipped cream.',
            'price'        => '6.00',
            'prep_minutes' => 5,
            'image_url'    => 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=1400',
        ],
    ];

    foreach ($items as $item) {
        $existing_items = get_posts([
            'post_type'      => 'room_service_item',
            'title'          => $item['title'],
            'posts_per_page' => 1,
            'post_status'    => ['publish', 'draft', 'pending', 'private'],
        ]);
        $existing = !empty($existing_items) && $existing_items[0] instanceof WP_Post
            ? $existing_items[0]
            : null;

        if ($existing instanceof WP_Post) {
            $existing_id = (int) $existing->ID;

            $existing_price = (string) get_post_meta($existing_id, '_hearthstone_room_service_price', true);
            if ($existing_price === '') {
                update_post_meta($existing_id, '_hearthstone_room_service_price', $item['price']);
            }

            $existing_prep_minutes = (string) get_post_meta($existing_id, '_hearthstone_room_service_prep_minutes', true);
            if ($existing_prep_minutes === '') {
                update_post_meta($existing_id, '_hearthstone_room_service_prep_minutes', (int) $item['prep_minutes']);
            }

            $existing_available = (string) get_post_meta($existing_id, '_hearthstone_room_service_available', true);
            if ($existing_available === '') {
                update_post_meta($existing_id, '_hearthstone_room_service_available', '1');
            }

            $existing_image = (string) get_post_meta($existing_id, '_hearthstone_room_service_image_url', true);
            if ($existing_image === '' && isset($item['image_url'])) {
                update_post_meta($existing_id, '_hearthstone_room_service_image_url', $item['image_url']);
            }

            if (trim((string) $existing->post_content) === '' && $item['description'] !== '') {
                wp_update_post([
                    'ID'           => $existing_id,
                    'post_content' => $item['description'],
                ]);
            }

            continue;
        }

        $item_id = wp_insert_post([
            'post_type'    => 'room_service_item',
            'post_status'  => 'publish',
            'post_title'   => $item['title'],
            'post_content' => $item['description'],
        ], true);

        if (is_wp_error($item_id) || (int) $item_id <= 0) {
            continue;
        }

        update_post_meta((int) $item_id, '_hearthstone_room_service_price', $item['price']);
        update_post_meta((int) $item_id, '_hearthstone_room_service_prep_minutes', (int) $item['prep_minutes']);
        update_post_meta((int) $item_id, '_hearthstone_room_service_available', '1');

        if (isset($item['image_url'])) {
            update_post_meta((int) $item_id, '_hearthstone_room_service_image_url', $item['image_url']);
        }
    }

    update_option('hearthstone_ops_room_service_seed_version', 2, false);
}
add_action('admin_init', 'hearthstone_ops_seed_room_service_menu_items');

/**
 * Show admin notices for room-service queue actions.
 */
function hearthstone_ops_render_room_service_queue_notice(): void
{
    if (!current_user_can('edit_posts')) {
        return;
    }

    $updated = isset($_GET['hearthstone_order_status_updated']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_order_status_updated'])) : '';
    $invalid = isset($_GET['hearthstone_order_status_invalid']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_order_status_invalid'])) : '';

    if ($updated === '1') {
        $order_id = isset($_GET['hearthstone_order_ref']) ? absint(wp_unslash($_GET['hearthstone_order_ref'])) : 0;
        $status = isset($_GET['hearthstone_order_status']) ? sanitize_key((string) wp_unslash($_GET['hearthstone_order_status'])) : '';
        $status_label = hearthstone_ops_get_guest_order_status_label($status);

        echo '<div class="notice notice-success is-dismissible"><p>';
        printf(
            esc_html__('Room-service order #%1$d moved to %2$s.', 'hearthstone-ops'),
            $order_id,
            esc_html($status_label)
        );
        echo '</p></div>';
        return;
    }

    if ($invalid === '1') {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        esc_html_e('Order status could not be advanced from the current state.', 'hearthstone-ops');
        echo '</p></div>';
    }
}
add_action('admin_notices', 'hearthstone_ops_render_room_service_queue_notice');

/**
 * Return normalized room-service line items for admin rendering.
 *
 * @return array<int, array{item_id:int, title:string, qty:int}>
 */
function hearthstone_ops_get_room_service_order_line_items(int $order_id): array
{
    if ($order_id <= 0) {
        return [];
    }

    $line_items = [];
    $cart_json = (string) get_post_meta($order_id, '_hearthstone_order_items_json', true);
    $decoded_cart = json_decode($cart_json, true);

    if (is_array($decoded_cart)) {
        foreach ($decoded_cart as $item_id_raw => $qty_raw) {
            $item_id = absint((string) $item_id_raw);
            $qty = max(0, absint($qty_raw));

            if ($item_id <= 0 || $qty <= 0) {
                continue;
            }

            $item_post = get_post($item_id);
            $title = $item_post instanceof WP_Post
                ? (string) $item_post->post_title
                : sprintf(__('Menu item #%d', 'hearthstone-ops'), $item_id);

            $line_items[] = [
                'item_id' => $item_id,
                'title'   => $title,
                'qty'     => $qty,
            ];
        }
    }

    if (!empty($line_items)) {
        return $line_items;
    }

    $fallback_item_id = (int) get_post_meta($order_id, '_hearthstone_order_item_id', true);
    $fallback_qty = max(1, (int) get_post_meta($order_id, '_hearthstone_order_quantity', true));

    if ($fallback_item_id <= 0) {
        return [];
    }

    $fallback_post = get_post($fallback_item_id);
    $fallback_title = $fallback_post instanceof WP_Post
        ? (string) $fallback_post->post_title
        : sprintf(__('Menu item #%d', 'hearthstone-ops'), $fallback_item_id);

    return [[
        'item_id' => $fallback_item_id,
        'title'   => $fallback_title,
        'qty'     => $fallback_qty,
    ]];
}

/**
 * Return normalized gift-shop line items for admin rendering.
 *
 * @return array<int, array{item_key:string, label:string, qty:int}>
 */
function hearthstone_ops_get_gift_shop_order_line_items(int $order_id): array
{
    if ($order_id <= 0) {
        return [];
    }

    $catalog = hearthstone_ops_get_gift_shop_catalog();
    $line_items = [];
    $cart_json = (string) get_post_meta($order_id, '_hearthstone_gift_items_json', true);
    $decoded_cart = json_decode($cart_json, true);

    if (is_array($decoded_cart)) {
        foreach ($decoded_cart as $item_key_raw => $qty_raw) {
            $item_key = sanitize_key((string) $item_key_raw);
            $qty = max(0, absint($qty_raw));

            if ($item_key === '' || $qty <= 0) {
                continue;
            }

            $line_items[] = [
                'item_key' => $item_key,
                'label'    => isset($catalog[$item_key]['label']) ? (string) $catalog[$item_key]['label'] : $item_key,
                'qty'      => $qty,
            ];
        }
    }

    if (!empty($line_items)) {
        return $line_items;
    }

    $fallback_item_key = sanitize_key((string) get_post_meta($order_id, '_hearthstone_gift_item_key', true));
    $fallback_qty = max(1, (int) get_post_meta($order_id, '_hearthstone_gift_quantity', true));

    if ($fallback_item_key === '') {
        return [];
    }

    return [[
        'item_key' => $fallback_item_key,
        'label'    => isset($catalog[$fallback_item_key]['label']) ? (string) $catalog[$fallback_item_key]['label'] : $fallback_item_key,
        'qty'      => $fallback_qty,
    ]];
}

/**
 * Customize room-service order admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function hearthstone_ops_add_room_service_order_columns(array $columns): array
{
    $columns['hearthstone_order_room'] = __('Room', 'hearthstone-ops');
    $columns['hearthstone_order_item'] = __('Menu Items', 'hearthstone-ops');
    $columns['hearthstone_order_qty'] = __('Qty', 'hearthstone-ops');
    $columns['hearthstone_order_total'] = __('Total', 'hearthstone-ops');
    $columns['hearthstone_order_status'] = __('Order Status', 'hearthstone-ops');
    $columns['hearthstone_order_next'] = __('Next Step', 'hearthstone-ops');

    return $columns;
}
add_filter('manage_room_service_order_posts_columns', 'hearthstone_ops_add_room_service_order_columns');

/**
 * Render room-service order custom column values.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function hearthstone_ops_render_room_service_order_column(string $column, int $post_id): void
{
    switch ($column) {
        case 'hearthstone_order_room':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_order_room_number', true));
            break;

        case 'hearthstone_order_item':
            $line_items = hearthstone_ops_get_room_service_order_line_items($post_id);

            if (empty($line_items)) {
                echo esc_html__('N/A', 'hearthstone-ops');
                break;
            }

            $rendered_rows = [];
            $max_rows = 2;
            $visible_items = array_slice($line_items, 0, $max_rows);

            foreach ($visible_items as $line_item) {
                $rendered_rows[] = sprintf(
                    /* translators: 1: menu item title, 2: quantity */
                    __('%1$s x%2$d', 'hearthstone-ops'),
                    $line_item['title'],
                    $line_item['qty']
                );
            }

            if (count($line_items) > $max_rows) {
                $remaining = count($line_items) - $max_rows;
                $rendered_rows[] = sprintf(
                    /* translators: %d: count of additional order line items */
                    __('+%d more', 'hearthstone-ops'),
                    $remaining
                );
            }

            echo esc_html(implode(' | ', $rendered_rows));
            break;

        case 'hearthstone_order_qty':
            echo esc_html((string) ((int) get_post_meta($post_id, '_hearthstone_order_quantity', true)));
            break;

        case 'hearthstone_order_total':
            $total = (string) get_post_meta($post_id, '_hearthstone_order_total', true);
            echo $total !== ''
                ? esc_html('$' . number_format((float) $total, 2))
                : esc_html__('N/A', 'hearthstone-ops');
            break;

        case 'hearthstone_order_status':
            echo esc_html(hearthstone_ops_get_guest_order_status_label((string) get_post_meta($post_id, '_hearthstone_order_status', true)));
            break;

        case 'hearthstone_order_next':
            $current_status = (string) get_post_meta($post_id, '_hearthstone_order_status', true);
            $delivery_method = (string) get_post_meta($post_id, '_hearthstone_order_delivery_method', true);
            $next_status = hearthstone_ops_get_next_room_service_status($current_status, $delivery_method);

            if ($next_status === '') {
                echo '&mdash;';
                break;
            }

            $next_label = hearthstone_ops_get_room_service_status_transition_label($next_status);

            if ($next_label === '') {
                echo '&mdash;';
                break;
            }

            $action_url = hearthstone_ops_get_room_service_status_advance_url($post_id, $next_status);
            printf(
                '<a class="button button-small" href="%1$s">%2$s</a>',
                esc_url($action_url),
                esc_html($next_label)
            );
            break;
    }
}
add_action('manage_room_service_order_posts_custom_column', 'hearthstone_ops_render_room_service_order_column', 10, 2);

/**
 * Customize gift shop order admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function hearthstone_ops_add_gift_shop_order_columns(array $columns): array
{
    $columns['hearthstone_gift_room'] = __('Room', 'hearthstone-ops');
    $columns['hearthstone_gift_item'] = __('Items', 'hearthstone-ops');
    $columns['hearthstone_gift_qty'] = __('Qty', 'hearthstone-ops');
    $columns['hearthstone_gift_total'] = __('Total', 'hearthstone-ops');
    $columns['hearthstone_gift_status'] = __('Status', 'hearthstone-ops');

    return $columns;
}
add_filter('manage_gift_shop_order_posts_columns', 'hearthstone_ops_add_gift_shop_order_columns');

/**
 * Render gift shop order admin columns.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function hearthstone_ops_render_gift_shop_order_column(string $column, int $post_id): void
{
    switch ($column) {
        case 'hearthstone_gift_room':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_gift_room_number', true));
            break;

        case 'hearthstone_gift_item':
            $line_items = hearthstone_ops_get_gift_shop_order_line_items($post_id);

            if (empty($line_items)) {
                echo esc_html__('N/A', 'hearthstone-ops');
                break;
            }

            $rendered_rows = [];
            $max_rows = 2;
            $visible_items = array_slice($line_items, 0, $max_rows);

            foreach ($visible_items as $line_item) {
                $rendered_rows[] = sprintf(
                    /* translators: 1: catalog item label, 2: quantity */
                    __('%1$s x%2$d', 'hearthstone-ops'),
                    $line_item['label'],
                    $line_item['qty']
                );
            }

            if (count($line_items) > $max_rows) {
                $remaining = count($line_items) - $max_rows;
                $rendered_rows[] = sprintf(
                    /* translators: %d: count of additional order line items */
                    __('+%d more', 'hearthstone-ops'),
                    $remaining
                );
            }

            echo esc_html(implode(' | ', $rendered_rows));
            break;

        case 'hearthstone_gift_qty':
            echo esc_html((string) ((int) get_post_meta($post_id, '_hearthstone_gift_quantity', true)));
            break;

        case 'hearthstone_gift_total':
            $total = (string) get_post_meta($post_id, '_hearthstone_gift_total', true);
            echo $total !== ''
                ? esc_html('$' . number_format((float) $total, 2))
                : esc_html__('N/A', 'hearthstone-ops');
            break;

        case 'hearthstone_gift_status':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_gift_order_status', true));
            break;
    }
}
add_action('manage_gift_shop_order_posts_custom_column', 'hearthstone_ops_render_gift_shop_order_column', 10, 2);

/**
 * Customize service request admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function hearthstone_ops_add_service_request_columns(array $columns): array
{
    $columns['hearthstone_service_room'] = __('Room', 'hearthstone-ops');
    $columns['hearthstone_service_category'] = __('Category', 'hearthstone-ops');
    $columns['hearthstone_service_priority'] = __('Priority', 'hearthstone-ops');
    $columns['hearthstone_service_status'] = __('Status', 'hearthstone-ops');

    return $columns;
}
add_filter('manage_guest_service_request_posts_columns', 'hearthstone_ops_add_service_request_columns');

/**
 * Render service request admin columns.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function hearthstone_ops_render_service_request_column(string $column, int $post_id): void
{
    switch ($column) {
        case 'hearthstone_service_room':
            echo esc_html((string) get_post_meta($post_id, '_hearthstone_service_request_room', true));
            break;

        case 'hearthstone_service_category':
            $category = (string) get_post_meta($post_id, '_hearthstone_service_request_category', true);
            echo esc_html(ucwords(str_replace('_', ' ', $category)));
            break;

        case 'hearthstone_service_priority':
            $priority = (string) get_post_meta($post_id, '_hearthstone_service_request_priority', true);
            echo esc_html(ucfirst($priority));
            break;

        case 'hearthstone_service_status':
            $status = (string) get_post_meta($post_id, '_hearthstone_service_request_status', true);
            echo esc_html(ucwords(str_replace('_', ' ', $status)));
            break;
    }
}
add_action('manage_guest_service_request_posts_custom_column', 'hearthstone_ops_render_service_request_column', 10, 2);
