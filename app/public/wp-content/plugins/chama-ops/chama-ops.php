<?php
/**
 * Plugin Name: Chama Ops
 * Plugin URI: https://chamastationinn.com
 * Description: Hospitality operations data models and workflows for Chama Station Inn.
 * Version: 1.24.0
 * Author: Suleman Saleem
 * Text Domain: chama-ops
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom post types for hospitality operations.
 */
function chama_ops_register_post_types(): void
{
    $guest_labels = [
        'name'               => __('Guests', 'chama-ops'),
        'singular_name'      => __('Guest', 'chama-ops'),
        'menu_name'          => __('Guests', 'chama-ops'),
        'name_admin_bar'     => __('Guest', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Guest', 'chama-ops'),
        'new_item'           => __('New Guest', 'chama-ops'),
        'edit_item'          => __('Edit Guest', 'chama-ops'),
        'view_item'          => __('View Guest', 'chama-ops'),
        'all_items'          => __('All Guests', 'chama-ops'),
        'search_items'       => __('Search Guests', 'chama-ops'),
        'not_found'          => __('No guests found.', 'chama-ops'),
        'not_found_in_trash' => __('No guests found in Trash.', 'chama-ops'),
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
        'name'               => __('Stays', 'chama-ops'),
        'singular_name'      => __('Stay', 'chama-ops'),
        'menu_name'          => __('Stays', 'chama-ops'),
        'name_admin_bar'     => __('Stay', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Stay', 'chama-ops'),
        'new_item'           => __('New Stay', 'chama-ops'),
        'edit_item'          => __('Edit Stay', 'chama-ops'),
        'view_item'          => __('View Stay', 'chama-ops'),
        'all_items'          => __('All Stays', 'chama-ops'),
        'search_items'       => __('Search Stays', 'chama-ops'),
        'not_found'          => __('No stays found.', 'chama-ops'),
        'not_found_in_trash' => __('No stays found in Trash.', 'chama-ops'),
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
        'name'               => __('Room Service Menu', 'chama-ops'),
        'singular_name'      => __('Room Service Item', 'chama-ops'),
        'menu_name'          => __('Room Service Menu', 'chama-ops'),
        'name_admin_bar'     => __('Room Service Item', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Menu Item', 'chama-ops'),
        'new_item'           => __('New Menu Item', 'chama-ops'),
        'edit_item'          => __('Edit Menu Item', 'chama-ops'),
        'view_item'          => __('View Menu Item', 'chama-ops'),
        'all_items'          => __('All Menu Items', 'chama-ops'),
        'search_items'       => __('Search Menu Items', 'chama-ops'),
        'not_found'          => __('No menu items found.', 'chama-ops'),
        'not_found_in_trash' => __('No menu items found in Trash.', 'chama-ops'),
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
        'name'               => __('Room Service Orders', 'chama-ops'),
        'singular_name'      => __('Room Service Order', 'chama-ops'),
        'menu_name'          => __('Room Service Orders', 'chama-ops'),
        'name_admin_bar'     => __('Room Service Order', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Order', 'chama-ops'),
        'new_item'           => __('New Order', 'chama-ops'),
        'edit_item'          => __('Edit Order', 'chama-ops'),
        'view_item'          => __('View Order', 'chama-ops'),
        'all_items'          => __('All Orders', 'chama-ops'),
        'search_items'       => __('Search Orders', 'chama-ops'),
        'not_found'          => __('No orders found.', 'chama-ops'),
        'not_found_in_trash' => __('No orders found in Trash.', 'chama-ops'),
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
        'name'               => __('Gift Shop Orders', 'chama-ops'),
        'singular_name'      => __('Gift Shop Order', 'chama-ops'),
        'menu_name'          => __('Gift Shop Orders', 'chama-ops'),
        'name_admin_bar'     => __('Gift Shop Order', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Gift Shop Order', 'chama-ops'),
        'new_item'           => __('New Gift Shop Order', 'chama-ops'),
        'edit_item'          => __('Edit Gift Shop Order', 'chama-ops'),
        'view_item'          => __('View Gift Shop Order', 'chama-ops'),
        'all_items'          => __('All Gift Shop Orders', 'chama-ops'),
        'search_items'       => __('Search Gift Shop Orders', 'chama-ops'),
        'not_found'          => __('No gift shop orders found.', 'chama-ops'),
        'not_found_in_trash' => __('No gift shop orders found in Trash.', 'chama-ops'),
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
        'name'               => __('Service Requests', 'chama-ops'),
        'singular_name'      => __('Service Request', 'chama-ops'),
        'menu_name'          => __('Service Requests', 'chama-ops'),
        'name_admin_bar'     => __('Service Request', 'chama-ops'),
        'add_new'            => __('Add New', 'chama-ops'),
        'add_new_item'       => __('Add New Service Request', 'chama-ops'),
        'new_item'           => __('New Service Request', 'chama-ops'),
        'edit_item'          => __('Edit Service Request', 'chama-ops'),
        'view_item'          => __('View Service Request', 'chama-ops'),
        'all_items'          => __('All Service Requests', 'chama-ops'),
        'search_items'       => __('Search Service Requests', 'chama-ops'),
        'not_found'          => __('No service requests found.', 'chama-ops'),
        'not_found_in_trash' => __('No service requests found in Trash.', 'chama-ops'),
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
add_action('init', 'chama_ops_register_post_types');

/**
 * Register meta boxes for guest and stay records.
 */
function chama_ops_add_meta_boxes(): void
{
    add_meta_box(
        'chama_guest_details',
        __('Guest Details', 'chama-ops'),
        'chama_ops_render_guest_details_meta_box',
        'guest',
        'normal',
        'default'
    );

    add_meta_box(
        'chama_guest_related_stays',
        __('Related Stays', 'chama-ops'),
        'chama_ops_render_guest_related_stays_meta_box',
        'guest',
        'side',
        'high'
    );

    add_meta_box(
        'chama_stay_details',
        __('Stay Details', 'chama-ops'),
        'chama_ops_render_stay_details_meta_box',
        'stay',
        'normal',
        'default'
    );

    add_meta_box(
        'chama_stay_guest_summary',
        __('Linked Guest Summary', 'chama-ops'),
        'chama_ops_render_stay_guest_summary_meta_box',
        'stay',
        'side',
        'high'
    );

    add_meta_box(
        'chama_room_service_item_details',
        __('Menu Item Details', 'chama-ops'),
        'chama_ops_render_room_service_item_meta_box',
        'room_service_item',
        'normal',
        'default'
    );

    add_meta_box(
        'chama_room_service_order_details',
        __('Order Details', 'chama-ops'),
        'chama_ops_render_room_service_order_meta_box',
        'room_service_order',
        'normal',
        'default'
    );

    add_meta_box(
        'chama_gift_shop_order_details',
        __('Gift Shop Order Details', 'chama-ops'),
        'chama_ops_render_gift_shop_order_meta_box',
        'gift_shop_order',
        'normal',
        'default'
    );

    add_meta_box(
        'chama_service_request_details',
        __('Service Request Details', 'chama-ops'),
        'chama_ops_render_service_request_meta_box',
        'guest_service_request',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'chama_ops_add_meta_boxes');

/**
 * Render the guest details meta box.
 *
 * @param WP_Post $post The current post object.
 */
function chama_ops_render_guest_details_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_guest_details', 'chama_ops_guest_nonce');

    $email          = get_post_meta($post->ID, '_chama_guest_email', true);
    $phone          = get_post_meta($post->ID, '_chama_guest_phone', true);
    $marketing_src  = get_post_meta($post->ID, '_chama_guest_marketing_source', true);
    $preferred_room = get_post_meta($post->ID, '_chama_guest_preferred_room', true);
    $vip            = get_post_meta($post->ID, '_chama_guest_vip', true);
    $consent        = get_post_meta($post->ID, '_chama_guest_marketing_consent', true);
    $room_theme_suggestions = chama_ops_get_room_theme_suggestions();
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="chama_guest_email"><?php esc_html_e('Email', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="email"
                        id="chama_guest_email"
                        name="chama_guest_email"
                        value="<?php echo esc_attr($email); ?>"
                        class="regular-text"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_guest_phone"><?php esc_html_e('Phone', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="chama_guest_phone"
                        name="chama_guest_phone"
                        value="<?php echo esc_attr($phone); ?>"
                        class="regular-text"
                    >
                    <p class="description"><?php esc_html_e('10-digit US numbers auto-format on save.', 'chama-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_guest_marketing_source"><?php esc_html_e('Marketing Source', 'chama-ops'); ?></label>
                </th>
                <td>
                    <select id="chama_guest_marketing_source" name="chama_guest_marketing_source">
                        <option value=""><?php esc_html_e('Select a source', 'chama-ops'); ?></option>
                        <option value="direct" <?php selected($marketing_src, 'direct'); ?>><?php esc_html_e('Direct', 'chama-ops'); ?></option>
                        <option value="google" <?php selected($marketing_src, 'google'); ?>><?php esc_html_e('Google Search', 'chama-ops'); ?></option>
                        <option value="referral" <?php selected($marketing_src, 'referral'); ?>><?php esc_html_e('Referral', 'chama-ops'); ?></option>
                        <option value="social" <?php selected($marketing_src, 'social'); ?>><?php esc_html_e('Social Media', 'chama-ops'); ?></option>
                        <option value="repeat" <?php selected($marketing_src, 'repeat'); ?>><?php esc_html_e('Repeat Guest', 'chama-ops'); ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_guest_preferred_room"><?php esc_html_e('Preferred Room / Theme', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="chama_guest_preferred_room"
                        name="chama_guest_preferred_room"
                        value="<?php echo esc_attr($preferred_room); ?>"
                        list="chama_room_theme_suggestions"
                        class="regular-text"
                    >
                    <datalist id="chama_room_theme_suggestions">
                        <?php foreach ($room_theme_suggestions as $room_theme_label) : ?>
                            <option value="<?php echo esc_attr($room_theme_label); ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                    <p class="description"><?php esc_html_e('Select or type the guest room-theme preference.', 'chama-ops'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Flags', 'chama-ops'); ?></th>
                <td>
                    <label for="chama_guest_vip">
                        <input
                            type="checkbox"
                            id="chama_guest_vip"
                            name="chama_guest_vip"
                            value="1"
                            <?php checked($vip, '1'); ?>
                        >
                        <?php esc_html_e('VIP guest', 'chama-ops'); ?>
                    </label>
                    <br>
                    <label for="chama_guest_marketing_consent">
                        <input
                            type="checkbox"
                            id="chama_guest_marketing_consent"
                            name="chama_guest_marketing_consent"
                            value="1"
                            <?php checked($consent, '1'); ?>
                        >
                        <?php esc_html_e('Marketing consent received', 'chama-ops'); ?>
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
function chama_ops_calculate_stay_nights(string $check_in, string $check_out): ?int
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
function chama_ops_format_guest_phone(string $phone): string
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
 * Suggested room theme labels for inn-specific preference capture.
 *
 * @return array<int, string>
 */
function chama_ops_get_room_theme_suggestions(): array
{
    return [
        'Chama Canyon Calm',
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
function chama_ops_is_sample_record(int $post_id): bool
{
    return (string) get_post_meta($post_id, '_chama_ops_sample_data', true) === '1';
}

/**
 * Calculate revenue per night when both values are valid.
 *
 * @param string $revenue Revenue value as stored.
 * @param int    $nights  Persisted nights value.
 * @return float|null
 */
function chama_ops_calculate_revenue_per_night(string $revenue, int $nights): ?float
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
function chama_ops_get_stay_rollup_metrics(): array
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
        $status            = (string) get_post_meta($stay_post->ID, '_chama_stay_status', true);
        $nights            = (int) get_post_meta($stay_post->ID, '_chama_stay_nights', true);
        $revenue           = (string) get_post_meta($stay_post->ID, '_chama_stay_revenue', true);
        $revenue_per_night = chama_ops_calculate_revenue_per_night($revenue, $nights);

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
function chama_ops_get_data_quality_metrics(): array
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
        $email   = (string) get_post_meta($guest_id, '_chama_guest_email', true);
        $phone   = (string) get_post_meta($guest_id, '_chama_guest_phone', true);
        $consent = (string) get_post_meta($guest_id, '_chama_guest_marketing_consent', true);

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
        $linked_guest_id = (int) get_post_meta($stay_id, '_chama_stay_guest_id', true);
        $check_in        = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out       = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);
        $revenue         = (string) get_post_meta($stay_id, '_chama_stay_revenue', true);

        if ($linked_guest_id <= 0 || get_post_type($linked_guest_id) !== 'guest') {
            $metrics['stay_missing_guest_link']++;
        }

        if ($check_in === '' || $check_out === '') {
            $metrics['stay_missing_dates']++;
        } elseif (chama_ops_calculate_stay_nights($check_in, $check_out) === null) {
            $metrics['stay_invalid_date_range']++;
        }

        if ($revenue === '') {
            $metrics['stay_missing_revenue']++;
        }
    }

    $metrics['stay_arrival_contact_gaps_48h'] = count(chama_ops_get_arrival_contact_gap_stay_ids(1));

    return $metrics;
}

/**
 * Build an upcoming-arrivals list with readiness flags.
 *
 * @param int $days_ahead Number of days ahead to include.
 * @param int $limit Maximum number of stays to return.
 * @return array<int, array<string, mixed>>
 */
function chama_ops_get_upcoming_arrivals(int $days_ahead = 14, int $limit = 8): array
{
    $today = wp_date('Y-m-d');
    $window_end = wp_date('Y-m-d', strtotime('+' . max($days_ahead, 1) . ' days'));

    $upcoming_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => $limit,
        'post_status'    => ['publish', 'draft'],
        'meta_key'       => '_chama_stay_check_in',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'meta_query'     => [
            [
                'key'     => '_chama_stay_status',
                'value'   => 'booked',
                'compare' => '=',
            ],
            [
                'key'     => '_chama_stay_check_in',
                'value'   => [$today, $window_end],
                'compare' => 'BETWEEN',
                'type'    => 'DATE',
            ],
        ],
    ]);

    $arrivals = [];

    foreach ($upcoming_stays as $stay_post) {
        $stay_id          = (int) $stay_post->ID;
        $guest_id         = (int) get_post_meta($stay_id, '_chama_stay_guest_id', true);
        $check_in         = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out        = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);
        $status           = (string) get_post_meta($stay_id, '_chama_stay_status', true);
        $revenue          = (string) get_post_meta($stay_id, '_chama_stay_revenue', true);
        $nights           = (int) get_post_meta($stay_id, '_chama_stay_nights', true);
        $guest_name       = $guest_id > 0 ? get_the_title($guest_id) : '';
        $is_guest_missing = $guest_id <= 0 || get_post_type($guest_id) !== 'guest';
        $is_dates_missing = $check_in === '' || $check_out === '';
        $is_nights_invalid = $nights <= 0;
        $is_revenue_missing = $revenue === '';

        $issues = [];

        if ($is_guest_missing) {
            $issues[] = __('Missing guest link', 'chama-ops');
        }

        if ($is_dates_missing) {
            $issues[] = __('Missing stay dates', 'chama-ops');
        }

        if ($is_nights_invalid) {
            $issues[] = __('Nights not calculated', 'chama-ops');
        }

        if ($is_revenue_missing) {
            $issues[] = __('Missing estimated revenue', 'chama-ops');
        }

        $arrivals[] = [
            'stay_id'     => $stay_id,
            'stay_title'  => $stay_post->post_title,
            'stay_link'   => get_edit_post_link($stay_id) ?: '',
            'guest_name'  => $guest_name !== '' ? $guest_name : __('N/A', 'chama-ops'),
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
function chama_ops_get_booked_arrival_stay_ids(int $days_ahead = 1): array
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
                'key'   => '_chama_stay_status',
                'value' => 'booked',
            ],
            [
                'key'     => '_chama_stay_check_in',
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
function chama_ops_get_arrival_contact_gap_stay_ids(int $days_ahead = 1): array
{
    $gap_ids = [];

    foreach (chama_ops_get_booked_arrival_stay_ids($days_ahead) as $stay_id) {
        $stay_id  = (int) $stay_id;
        $guest_id = (int) get_post_meta($stay_id, '_chama_stay_guest_id', true);

        if (!chama_ops_is_guest_contact_ready($guest_id)) {
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
function chama_ops_get_guest_missing_contact_ids(): array
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
                    'key'     => '_chama_guest_email',
                    'compare' => 'NOT EXISTS',
                ],
                [
                    'key'     => '_chama_guest_email',
                    'value'   => '',
                    'compare' => '=',
                ],
            ],
            [
                'relation' => 'OR',
                [
                    'key'     => '_chama_guest_phone',
                    'compare' => 'NOT EXISTS',
                ],
                [
                    'key'     => '_chama_guest_phone',
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
function chama_ops_is_guest_contact_ready(int $guest_id): bool
{
    if ($guest_id <= 0 || get_post_type($guest_id) !== 'guest') {
        return false;
    }

    $guest_email = trim((string) get_post_meta($guest_id, '_chama_guest_email', true));
    $guest_phone = trim((string) get_post_meta($guest_id, '_chama_guest_phone', true));

    return $guest_email !== '' && $guest_phone !== '';
}

/**
 * Check whether a check-in date is in the current 48-hour (today/tomorrow) window.
 *
 * @param string $check_in Check-in date value.
 */
function chama_ops_is_check_in_within_next_48h(string $check_in): bool
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
function chama_ops_get_today_operations_metrics(): array
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
        $status    = (string) get_post_meta($stay_id, '_chama_stay_status', true);
        $check_in  = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);

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

    $arrivals_next_48h = count(chama_ops_get_booked_arrival_stay_ids(1));
    $contact_gaps_48h  = count(chama_ops_get_arrival_contact_gap_stay_ids(1));
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
function chama_ops_render_guest_related_stays_meta_box(WP_Post $post): void
{
    $related_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => 10,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'   => '_chama_stay_guest_id',
                'value' => (string) $post->ID,
            ],
        ],
    ]);

    if (empty($related_stays)) {
        echo '<p>' . esc_html__('No stays linked to this guest yet.', 'chama-ops') . '</p>';
        return;
    }

    echo '<ul style="margin:0;">';

    foreach ($related_stays as $stay_post) {
        $status            = (string) get_post_meta($stay_post->ID, '_chama_stay_status', true);
        $check_in          = (string) get_post_meta($stay_post->ID, '_chama_stay_check_in', true);
        $check_out         = (string) get_post_meta($stay_post->ID, '_chama_stay_check_out', true);
        $revenue           = (string) get_post_meta($stay_post->ID, '_chama_stay_revenue', true);
        $nights            = (int) get_post_meta($stay_post->ID, '_chama_stay_nights', true);
        $revenue_per_night = chama_ops_calculate_revenue_per_night($revenue, $nights);
        $edit_link         = get_edit_post_link($stay_post->ID);

        echo '<li style="margin-bottom:12px;">';
        echo '<strong>' . esc_html($stay_post->post_title) . '</strong><br>';
        echo esc_html__('Status:', 'chama-ops') . ' ' . esc_html(chama_ops_format_stay_status_label($status)) . '<br>';

        if ($check_in !== '' || $check_out !== '') {
            echo esc_html__('Dates:', 'chama-ops') . ' ' . esc_html(trim($check_in . ' -> ' . $check_out)) . '<br>';
        }

        if ($nights > 0) {
            echo esc_html__('Nights:', 'chama-ops') . ' ' . esc_html((string) $nights) . '<br>';
        }

        if ($revenue !== '') {
            echo esc_html__('Revenue:', 'chama-ops') . ' ' . esc_html('$' . $revenue) . '<br>';
        }

        if ($revenue_per_night !== null) {
            echo esc_html__('Revenue / Night:', 'chama-ops') . ' ' . esc_html('$' . number_format($revenue_per_night, 2)) . '<br>';
        }

        if ($edit_link) {
            echo '<a href="' . esc_url($edit_link) . '">' . esc_html__('Edit Stay', 'chama-ops') . '</a>';
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
function chama_ops_render_stay_details_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_stay_details', 'chama_ops_stay_nonce');

    $linked_guest_id   = get_post_meta($post->ID, '_chama_stay_guest_id', true);
    $check_in          = (string) get_post_meta($post->ID, '_chama_stay_check_in', true);
    $check_out         = (string) get_post_meta($post->ID, '_chama_stay_check_out', true);
    $status            = get_post_meta($post->ID, '_chama_stay_status', true);
    $revenue           = (string) get_post_meta($post->ID, '_chama_stay_revenue', true);
    $nights            = chama_ops_calculate_stay_nights($check_in, $check_out);
    $revenue_per_night = $nights !== null ? chama_ops_calculate_revenue_per_night($revenue, $nights) : null;

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
                    <label for="chama_stay_guest_id"><?php esc_html_e('Linked Guest', 'chama-ops'); ?></label>
                </th>
                <td>
                    <select id="chama_stay_guest_id" name="chama_stay_guest_id">
                        <option value=""><?php esc_html_e('Select a guest', 'chama-ops'); ?></option>
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
                    <label for="chama_stay_check_in"><?php esc_html_e('Check-in Date', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="date"
                        id="chama_stay_check_in"
                        name="chama_stay_check_in"
                        value="<?php echo esc_attr($check_in); ?>"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_stay_check_out"><?php esc_html_e('Check-out Date', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="date"
                        id="chama_stay_check_out"
                        name="chama_stay_check_out"
                        value="<?php echo esc_attr($check_out); ?>"
                    >
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Calculated Nights', 'chama-ops'); ?></th>
                <td>
                    <?php
                    echo $nights !== null
                        ? esc_html((string) $nights)
                        : esc_html__('Set both dates with check-out after check-in to calculate nights.', 'chama-ops');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php esc_html_e('Estimated Revenue / Night', 'chama-ops'); ?></th>
                <td>
                    <?php
                    echo $revenue_per_night !== null
                        ? esc_html('$' . number_format($revenue_per_night, 2))
                        : esc_html__('Enter revenue and valid dates to calculate revenue per night.', 'chama-ops');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_stay_status"><?php esc_html_e('Stay Status', 'chama-ops'); ?></label>
                </th>
                <td>
                    <select id="chama_stay_status" name="chama_stay_status">
                        <option value="lead" <?php selected($status, 'lead'); ?>><?php esc_html_e('Lead', 'chama-ops'); ?></option>
                        <option value="booked" <?php selected($status, 'booked'); ?>><?php esc_html_e('Booked', 'chama-ops'); ?></option>
                        <option value="checked_in" <?php selected($status, 'checked_in'); ?>><?php esc_html_e('Checked In', 'chama-ops'); ?></option>
                        <option value="checked_out" <?php selected($status, 'checked_out'); ?>><?php esc_html_e('Checked Out', 'chama-ops'); ?></option>
                        <option value="cancelled" <?php selected($status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'chama-ops'); ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="chama_stay_revenue"><?php esc_html_e('Estimated Revenue', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        id="chama_stay_revenue"
                        name="chama_stay_revenue"
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
function chama_ops_render_stay_guest_summary_meta_box(WP_Post $post): void
{
    $linked_guest_id = (int) get_post_meta($post->ID, '_chama_stay_guest_id', true);

    if ($linked_guest_id <= 0) {
        echo '<p>' . esc_html__('No guest linked yet. Select a guest in Stay Details and save the stay to see a summary here.', 'chama-ops') . '</p>';
        return;
    }

    $guest_post = get_post($linked_guest_id);

    if (!$guest_post || $guest_post->post_type !== 'guest') {
        echo '<p>' . esc_html__('The linked guest record could not be found.', 'chama-ops') . '</p>';
        return;
    }

    $guest_email      = (string) get_post_meta($linked_guest_id, '_chama_guest_email', true);
    $guest_phone      = (string) get_post_meta($linked_guest_id, '_chama_guest_phone', true);
    $guest_source     = (string) get_post_meta($linked_guest_id, '_chama_guest_marketing_source', true);
    $guest_preference = (string) get_post_meta($linked_guest_id, '_chama_guest_preferred_room', true);
    $guest_vip        = (string) get_post_meta($linked_guest_id, '_chama_guest_vip', true);
    $guest_consent    = (string) get_post_meta($linked_guest_id, '_chama_guest_marketing_consent', true);
    $guest_edit_link  = get_edit_post_link($linked_guest_id);
    ?>
    <p><strong><?php esc_html_e('Guest', 'chama-ops'); ?>:</strong><br><?php echo esc_html($guest_post->post_title); ?></p>

    <p><strong><?php esc_html_e('Email', 'chama-ops'); ?>:</strong><br><?php echo $guest_email !== '' ? esc_html($guest_email) : esc_html__('N/A', 'chama-ops'); ?></p>

    <p><strong><?php esc_html_e('Phone', 'chama-ops'); ?>:</strong><br><?php echo $guest_phone !== '' ? esc_html($guest_phone) : esc_html__('N/A', 'chama-ops'); ?></p>

    <p><strong><?php esc_html_e('Source', 'chama-ops'); ?>:</strong><br><?php echo $guest_source !== '' ? esc_html(chama_ops_format_guest_source_label($guest_source)) : esc_html__('N/A', 'chama-ops'); ?></p>

    <p><strong><?php esc_html_e('Preference', 'chama-ops'); ?>:</strong><br><?php echo $guest_preference !== '' ? esc_html($guest_preference) : esc_html__('N/A', 'chama-ops'); ?></p>

    <p><strong><?php esc_html_e('VIP', 'chama-ops'); ?>:</strong><br><?php echo $guest_vip === '1' ? esc_html__('Yes', 'chama-ops') : esc_html__('N/A', 'chama-ops'); ?></p>

    <p><strong><?php esc_html_e('Marketing Consent', 'chama-ops'); ?>:</strong><br><?php echo $guest_consent === '1' ? esc_html__('Yes', 'chama-ops') : esc_html__('N/A', 'chama-ops'); ?></p>

    <?php if ($guest_edit_link) : ?>
        <p style="margin-top:16px;">
            <a class="button button-secondary" href="<?php echo esc_url($guest_edit_link); ?>">
                <?php esc_html_e('Edit Linked Guest', 'chama-ops'); ?>
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
function chama_ops_save_guest_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_guest_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_guest_nonce'])), 'chama_ops_save_guest_details')) {
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

    $email          = isset($_POST['chama_guest_email']) ? sanitize_email(wp_unslash($_POST['chama_guest_email'])) : '';
    $phone_raw      = isset($_POST['chama_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_guest_phone'])) : '';
    $phone          = chama_ops_format_guest_phone($phone_raw);
    $marketing_src  = isset($_POST['chama_guest_marketing_source']) ? sanitize_text_field(wp_unslash($_POST['chama_guest_marketing_source'])) : '';
    $preferred_room = isset($_POST['chama_guest_preferred_room']) ? sanitize_text_field(wp_unslash($_POST['chama_guest_preferred_room'])) : '';
    $vip            = isset($_POST['chama_guest_vip']) ? '1' : '';
    $consent        = isset($_POST['chama_guest_marketing_consent']) ? '1' : '';

    update_post_meta($post_id, '_chama_guest_email', $email);
    update_post_meta($post_id, '_chama_guest_phone', $phone);
    update_post_meta($post_id, '_chama_guest_marketing_source', $marketing_src);
    update_post_meta($post_id, '_chama_guest_preferred_room', $preferred_room);
    update_post_meta($post_id, '_chama_guest_vip', $vip);
    update_post_meta($post_id, '_chama_guest_marketing_consent', $consent);
}
add_action('save_post', 'chama_ops_save_guest_meta');

/**
 * Save stay meta box data.
 *
 * @param int $post_id The current post ID.
 */
function chama_ops_save_stay_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_stay_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_stay_nonce'])), 'chama_ops_save_stay_details')) {
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

    $linked_guest_id = isset($_POST['chama_stay_guest_id']) ? absint(wp_unslash($_POST['chama_stay_guest_id'])) : 0;
    $check_in        = isset($_POST['chama_stay_check_in']) ? sanitize_text_field(wp_unslash($_POST['chama_stay_check_in'])) : '';
    $check_out       = isset($_POST['chama_stay_check_out']) ? sanitize_text_field(wp_unslash($_POST['chama_stay_check_out'])) : '';
    $status          = isset($_POST['chama_stay_status']) ? sanitize_text_field(wp_unslash($_POST['chama_stay_status'])) : 'lead';
    $revenue         = isset($_POST['chama_stay_revenue']) ? sanitize_text_field(wp_unslash($_POST['chama_stay_revenue'])) : '';
    $nights          = chama_ops_calculate_stay_nights($check_in, $check_out);

    update_post_meta($post_id, '_chama_stay_guest_id', $linked_guest_id);
    update_post_meta($post_id, '_chama_stay_check_in', $check_in);
    update_post_meta($post_id, '_chama_stay_check_out', $check_out);
    update_post_meta($post_id, '_chama_stay_status', $status);
    update_post_meta($post_id, '_chama_stay_revenue', $revenue);

    if ($nights !== null) {
        update_post_meta($post_id, '_chama_stay_nights', $nights);
    } else {
        delete_post_meta($post_id, '_chama_stay_nights');
    }
}
add_action('save_post', 'chama_ops_save_stay_meta');

/**
 * Sanitize decimal amount stored as a string with two decimals.
 *
 * @param string $raw_value Raw amount.
 * @return string
 */
function chama_ops_sanitize_decimal_amount(string $raw_value): string
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
function chama_ops_save_room_service_item_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_room_service_item_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_room_service_item_nonce'])), 'chama_ops_save_room_service_item')) {
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

    $price        = isset($_POST['chama_room_service_price']) ? chama_ops_sanitize_decimal_amount((string) wp_unslash($_POST['chama_room_service_price'])) : '';
    $prep_minutes = isset($_POST['chama_room_service_prep_minutes']) ? max(0, absint(wp_unslash($_POST['chama_room_service_prep_minutes']))) : 0;
    $is_available = isset($_POST['chama_room_service_available']) ? '1' : '';

    update_post_meta($post_id, '_chama_room_service_price', $price);
    update_post_meta($post_id, '_chama_room_service_prep_minutes', $prep_minutes);
    update_post_meta($post_id, '_chama_room_service_available', $is_available);
}
add_action('save_post', 'chama_ops_save_room_service_item_meta');

/**
 * Save room service order metadata.
 *
 * @param int $post_id Current post ID.
 */
function chama_ops_save_room_service_order_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_room_service_order_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_room_service_order_nonce'])), 'chama_ops_save_room_service_order')) {
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

    $item_id     = isset($_POST['chama_order_item_id']) ? absint(wp_unslash($_POST['chama_order_item_id'])) : 0;
    $quantity    = isset($_POST['chama_order_quantity']) ? max(1, absint(wp_unslash($_POST['chama_order_quantity']))) : 1;
    $room_number = isset($_POST['chama_order_room_number']) ? sanitize_text_field(wp_unslash($_POST['chama_order_room_number'])) : '';
    $guest_name  = isset($_POST['chama_order_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_order_guest_name'])) : '';
    $guest_phone = isset($_POST['chama_order_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_order_guest_phone'])) : '';
    $order_total = isset($_POST['chama_order_total']) ? chama_ops_sanitize_decimal_amount((string) wp_unslash($_POST['chama_order_total'])) : '';
    $order_state = isset($_POST['chama_order_status']) ? sanitize_key((string) wp_unslash($_POST['chama_order_status'])) : 'submitted';

    $allowed_states = ['submitted', 'in_kitchen', 'ready', 'delivering', 'completed', 'cancelled'];

    if (!in_array($order_state, $allowed_states, true)) {
        $order_state = 'submitted';
    }

    update_post_meta($post_id, '_chama_order_item_id', $item_id);
    update_post_meta($post_id, '_chama_order_quantity', $quantity);
    update_post_meta($post_id, '_chama_order_room_number', $room_number);
    update_post_meta($post_id, '_chama_order_guest_name', $guest_name);
    update_post_meta($post_id, '_chama_order_guest_phone', $guest_phone);
    update_post_meta($post_id, '_chama_order_total', $order_total);
    update_post_meta($post_id, '_chama_order_status', $order_state);
}
add_action('save_post', 'chama_ops_save_room_service_order_meta');

/**
 * Save gift shop order metadata.
 *
 * @param int $post_id Current post ID.
 */
function chama_ops_save_gift_shop_order_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_gift_shop_order_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_gift_shop_order_nonce'])), 'chama_ops_save_gift_shop_order')) {
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

    $item_key     = isset($_POST['chama_gift_item_key']) ? sanitize_key((string) wp_unslash($_POST['chama_gift_item_key'])) : '';
    $quantity     = isset($_POST['chama_gift_quantity']) ? max(1, absint(wp_unslash($_POST['chama_gift_quantity']))) : 1;
    $room_number  = isset($_POST['chama_gift_room_number']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_room_number'])) : '';
    $guest_name   = isset($_POST['chama_gift_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_guest_name'])) : '';
    $guest_phone  = isset($_POST['chama_gift_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_guest_phone'])) : '';
    $order_total  = isset($_POST['chama_gift_total']) ? chama_ops_sanitize_decimal_amount((string) wp_unslash($_POST['chama_gift_total'])) : '';
    $order_status = isset($_POST['chama_gift_order_status']) ? sanitize_key((string) wp_unslash($_POST['chama_gift_order_status'])) : 'submitted';

    $allowed_states = ['submitted', 'picked', 'preparing', 'ready', 'completed', 'cancelled'];

    if (!in_array($order_status, $allowed_states, true)) {
        $order_status = 'submitted';
    }

    update_post_meta($post_id, '_chama_gift_item_key', $item_key);
    update_post_meta($post_id, '_chama_gift_quantity', $quantity);
    update_post_meta($post_id, '_chama_gift_room_number', $room_number);
    update_post_meta($post_id, '_chama_gift_guest_name', $guest_name);
    update_post_meta($post_id, '_chama_gift_guest_phone', $guest_phone);
    update_post_meta($post_id, '_chama_gift_total', $order_total);
    update_post_meta($post_id, '_chama_gift_order_status', $order_status);
}
add_action('save_post', 'chama_ops_save_gift_shop_order_meta');

/**
 * Save guest service request metadata.
 *
 * @param int $post_id Current post ID.
 */
function chama_ops_save_service_request_meta(int $post_id): void
{
    if (!isset($_POST['chama_ops_service_request_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chama_ops_service_request_nonce'])), 'chama_ops_save_service_request')) {
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

    $category = isset($_POST['chama_service_request_category']) ? sanitize_key((string) wp_unslash($_POST['chama_service_request_category'])) : 'front_desk';
    $priority = isset($_POST['chama_service_request_priority']) ? sanitize_key((string) wp_unslash($_POST['chama_service_request_priority'])) : 'normal';
    $room     = isset($_POST['chama_service_request_room']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_room'])) : '';
    $name     = isset($_POST['chama_service_request_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_guest_name'])) : '';
    $phone    = isset($_POST['chama_service_request_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_guest_phone'])) : '';
    $status   = isset($_POST['chama_service_request_status']) ? sanitize_key((string) wp_unslash($_POST['chama_service_request_status'])) : 'submitted';

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

    update_post_meta($post_id, '_chama_service_request_category', $category);
    update_post_meta($post_id, '_chama_service_request_priority', $priority);
    update_post_meta($post_id, '_chama_service_request_room', $room);
    update_post_meta($post_id, '_chama_service_request_guest_name', $name);
    update_post_meta($post_id, '_chama_service_request_guest_phone', $phone);
    update_post_meta($post_id, '_chama_service_request_status', $status);
}
add_action('save_post', 'chama_ops_save_service_request_meta');

/**
 * Customize guest admin columns.
 *
 * @param array $columns Existing columns.
 * @return array
 */
function chama_ops_guest_columns(array $columns): array
{
    return [
        'cb'                  => $columns['cb'],
        'title'               => __('Guest', 'chama-ops'),
        'guest_origin'        => __('Origin', 'chama-ops'),
        'guest_email'         => __('Email', 'chama-ops'),
        'guest_phone'         => __('Phone', 'chama-ops'),
        'guest_marketing_src' => __('Source', 'chama-ops'),
        'guest_vip'           => __('VIP', 'chama-ops'),
        'date'                => $columns['date'],
    ];
}
add_filter('manage_guest_posts_columns', 'chama_ops_guest_columns');

/**
 * Render guest admin column values.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function chama_ops_render_guest_columns(string $column, int $post_id): void
{
    switch ($column) {
        case 'guest_origin':
            echo chama_ops_is_sample_record($post_id)
                ? esc_html__('Sample', 'chama-ops')
                : esc_html__('Persistent', 'chama-ops');
            break;

        case 'guest_email':
            echo esc_html((string) get_post_meta($post_id, '_chama_guest_email', true));
            break;

        case 'guest_phone':
            echo esc_html((string) get_post_meta($post_id, '_chama_guest_phone', true));
            break;

        case 'guest_marketing_src':
            echo esc_html((string) get_post_meta($post_id, '_chama_guest_marketing_source', true));
            break;

        case 'guest_vip':
            echo get_post_meta($post_id, '_chama_guest_vip', true) === '1'
                ? esc_html__('Yes', 'chama-ops')
                : esc_html__('N/A', 'chama-ops');
            break;
    }
}
add_action('manage_guest_posts_custom_column', 'chama_ops_render_guest_columns', 10, 2);

/**
 * Customize stay admin columns.
 *
 * @param array $columns Existing columns.
 * @return array
 */
function chama_ops_stay_columns(array $columns): array
{
    return [
        'cb'           => $columns['cb'],
        'title'        => __('Stay', 'chama-ops'),
        'stay_origin'  => __('Origin', 'chama-ops'),
        'stay_guest'   => __('Guest', 'chama-ops'),
        'stay_dates'   => __('Dates', 'chama-ops'),
        'stay_contact' => __('Contact Ready', 'chama-ops'),
        'stay_nights'  => __('Nights', 'chama-ops'),
        'stay_status'  => __('Status', 'chama-ops'),
        'stay_revenue' => __('Revenue', 'chama-ops'),
        'date'         => $columns['date'],
    ];
}
add_filter('manage_stay_posts_columns', 'chama_ops_stay_columns');

/**
 * Register sortable stay admin columns.
 *
 * @param array $sortable_columns Existing sortable columns.
 * @return array
 */
function chama_ops_stay_sortable_columns(array $sortable_columns): array
{
    $sortable_columns['stay_nights']  = 'stay_nights';
    $sortable_columns['stay_revenue'] = 'stay_revenue';

    return $sortable_columns;
}
add_filter('manage_edit-stay_sortable_columns', 'chama_ops_stay_sortable_columns');

/**
 * Render stay admin column values.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function chama_ops_render_stay_columns(string $column, int $post_id): void
{
    switch ($column) {
        case 'stay_origin':
            echo chama_ops_is_sample_record($post_id)
                ? esc_html__('Sample', 'chama-ops')
                : esc_html__('Persistent', 'chama-ops');
            break;

        case 'stay_guest':
            $guest_id = (int) get_post_meta($post_id, '_chama_stay_guest_id', true);

            echo $guest_id ? esc_html(get_the_title($guest_id)) : esc_html__('N/A', 'chama-ops');
            break;

        case 'stay_dates':
            $check_in  = (string) get_post_meta($post_id, '_chama_stay_check_in', true);
            $check_out = (string) get_post_meta($post_id, '_chama_stay_check_out', true);

            if ($check_in || $check_out) {
                echo esc_html(trim($check_in . ' -> ' . $check_out));
            } else {
                echo esc_html__('N/A', 'chama-ops');
            }
            break;

        case 'stay_contact':
            $status   = (string) get_post_meta($post_id, '_chama_stay_status', true);
            $check_in = (string) get_post_meta($post_id, '_chama_stay_check_in', true);
            $guest_id = (int) get_post_meta($post_id, '_chama_stay_guest_id', true);

            if ($status !== 'booked' || !chama_ops_is_check_in_within_next_48h($check_in)) {
                echo esc_html__('N/A', 'chama-ops');
                break;
            }

            echo chama_ops_is_guest_contact_ready($guest_id)
                ? esc_html__('Ready', 'chama-ops')
                : esc_html__('Gap', 'chama-ops');
            break;

        case 'stay_nights':
            $nights = (int) get_post_meta($post_id, '_chama_stay_nights', true);

            echo $nights > 0 ? esc_html((string) $nights) : esc_html__('N/A', 'chama-ops');
            break;

        case 'stay_status':
            echo esc_html((string) get_post_meta($post_id, '_chama_stay_status', true));
            break;

        case 'stay_revenue':
            $revenue = (string) get_post_meta($post_id, '_chama_stay_revenue', true);

            echo $revenue !== '' ? esc_html('$' . $revenue) : esc_html__('N/A', 'chama-ops');
            break;
    }
}
add_action('manage_stay_posts_custom_column', 'chama_ops_render_stay_columns', 10, 2);

/**
 * Apply custom ordering for sortable stay admin columns.
 *
 * @param WP_Query $query The current query.
 */
function chama_ops_apply_stay_sorting(WP_Query $query): void
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') !== 'stay') {
        return;
    }

    $orderby = $query->get('orderby');

    if ($orderby === 'stay_revenue') {
        $query->set('meta_key', '_chama_stay_revenue');
        $query->set('orderby', 'meta_value_num');
    }

    if ($orderby === 'stay_nights') {
        $query->set('meta_key', '_chama_stay_nights');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'chama_ops_apply_stay_sorting');

/**
 * Register dashboard widgets.
 */
function chama_ops_register_dashboard_widgets(): void
{
    wp_add_dashboard_widget(
        'chama_ops_dashboard_summary',
        __('Chama Ops Summary', 'chama-ops'),
        'chama_ops_render_dashboard_summary_widget'
    );
}
add_action('wp_dashboard_setup', 'chama_ops_register_dashboard_widgets');

/**
 * Render the Chama Ops dashboard summary widget.
 */
function chama_ops_render_dashboard_summary_widget(): void
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
    <div class="chama-ops-dashboard-widget">
        <p>
            <strong><?php esc_html_e('Published Guests:', 'chama-ops'); ?></strong>
            <?php echo esc_html((string) $guest_total); ?>
        </p>
        <p>
            <strong><?php esc_html_e('Published Stays:', 'chama-ops'); ?></strong>
            <?php echo esc_html((string) $stay_total); ?>
        </p>

        <hr>

        <h4><?php esc_html_e('Recent Guests', 'chama-ops'); ?></h4>
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
            <p><?php esc_html_e('No guest records yet.', 'chama-ops'); ?></p>
        <?php endif; ?>

        <h4><?php esc_html_e('Recent Stays', 'chama-ops'); ?></h4>
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
            <p><?php esc_html_e('No stay records yet.', 'chama-ops'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Register the Chama Ops overview page under Dashboard.
 */
function chama_ops_register_admin_pages(): void
{
    add_dashboard_page(
        __('Chama Ops Overview', 'chama-ops'),
        __('Chama Ops Overview', 'chama-ops'),
        'edit_posts',
        'chama-ops-overview',
        'chama_ops_render_overview_page'
    );
}
add_action('admin_menu', 'chama_ops_register_admin_pages');

/**
 * Build stay status counts from all stay records.
 *
 * @return array<string, int>
 */
function chama_ops_get_stay_status_summary(): array
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
        $status = (string) get_post_meta($stay_post->ID, '_chama_stay_status', true);

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
function chama_ops_get_guest_source_summary(): array
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
        $source = (string) get_post_meta($guest_post->ID, '_chama_guest_marketing_source', true);

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
function chama_ops_format_stay_status_label(string $status): string
{
    $labels = [
        'lead'        => __('Lead', 'chama-ops'),
        'booked'      => __('Booked', 'chama-ops'),
        'checked_in'  => __('Checked In', 'chama-ops'),
        'checked_out' => __('Checked Out', 'chama-ops'),
        'cancelled'   => __('Cancelled', 'chama-ops'),
    ];

    return $labels[$status] ?? $status;
}

/**
 * Convert internal guest source key to readable label.
 *
 * @param string $source Internal source key.
 * @return string
 */
function chama_ops_format_guest_source_label(string $source): string
{
    $labels = [
        'direct'   => __('Direct', 'chama-ops'),
        'google'   => __('Google Search', 'chama-ops'),
        'referral' => __('Referral', 'chama-ops'),
        'social'   => __('Social Media', 'chama-ops'),
        'repeat'   => __('Repeat Guest', 'chama-ops'),
        'unknown'  => __('Unknown / Not Set', 'chama-ops'),
    ];

    return $labels[$source] ?? $source;
}

/**
 * Build pipeline-level KPIs from stay status counts.
 *
 * @param array<string, int> $stay_status_summary Status totals by key.
 * @return array<string, float|int|null>
 */
function chama_ops_get_pipeline_metrics(array $stay_status_summary): array
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
function chama_ops_get_operational_recommendations(
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
    $guest_missing_contact_count = count(chama_ops_get_guest_missing_contact_ids());
    $arrival_contact_ready_rate = isset($today_ops_metrics['arrival_contact_ready_rate_48h'])
        && $today_ops_metrics['arrival_contact_ready_rate_48h'] !== null
        ? (float) $today_ops_metrics['arrival_contact_ready_rate_48h']
        : null;

    if ($quality_issue_total > 0) {
        $recommendations[] = [
            'priority' => __('High', 'chama-ops'),
            'title'    => __('Resolve data quality gaps', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: %d is the number of records needing data cleanup. */
                __('%d records are missing required guest/stay fields. Clean these first to improve reporting accuracy.', 'chama-ops'),
                $quality_issue_total
            ),
            'link'     => $action_links['quality_guest_missing_contact'],
            'link_label' => __('Open quality queues', 'chama-ops'),
        ];
    }

    if ($guest_missing_contact_count > 0) {
        $recommendations[] = [
            'priority' => __('High', 'chama-ops'),
            'title'    => __('Close guest contact gaps', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: %d is number of guest profiles missing email or phone. */
                __('%d guest profiles are missing email or phone. Fix these to protect conversion and arrival comms.', 'chama-ops'),
                $guest_missing_contact_count
            ),
            'link'     => $action_links['quality_guest_missing_contact'],
            'link_label' => __('Open missing-contact guests', 'chama-ops'),
        ];
    }

    if ($lead_backlog_rate >= 35.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('High', 'chama-ops'),
            'title'    => __('Reduce lead backlog', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 42.3%. */
                __('Lead backlog is %s of your stay pipeline. Prioritize follow-up and conversion workflows.', 'chama-ops'),
                number_format($lead_backlog_rate, 1) . '%'
            ),
            'link'     => $action_links['lead_stays'],
            'link_label' => __('Open lead queue', 'chama-ops'),
        ];
    }

    if ($cancellation_rate >= 20.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('Medium', 'chama-ops'),
            'title'    => __('Investigate cancellation trend', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 23.0%. */
                __('Cancellation rate is %s. Review cancelled stays for policy, communication, or pricing issues.', 'chama-ops'),
                number_format($cancellation_rate, 1) . '%'
            ),
            'link'     => $action_links['cancelled_stays'],
            'link_label' => __('Open cancelled queue', 'chama-ops'),
        ];
    }

    if ($booked_or_later_rate < 60.0 && $total_stays_in_mix > 0) {
        $recommendations[] = [
            'priority' => __('Medium', 'chama-ops'),
            'title'    => __('Improve booking conversion', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: %s is a percentage like 55.4%. */
                __('Booked-or-later rate is %s. Focus on lead qualification and response speed.', 'chama-ops'),
                number_format($booked_or_later_rate, 1) . '%'
            ),
            'link'     => $action_links['booked_stays'],
            'link_label' => __('Open booked queue', 'chama-ops'),
        ];
    }

    if ($arrival_contact_gap_count > 0 && $arrivals_next_48h > 0) {
        $recommendations[] = [
            'priority' => __('High', 'chama-ops'),
            'title'    => __('Fix near-term arrival contact readiness', 'chama-ops'),
            'detail'   => sprintf(
                /* translators: 1: number of arrivals with contact gaps, 2: total booked arrivals in 48h, 3: readiness rate percentage. */
                __('%1$d of %2$d booked arrivals in the next 48 hours are missing contact readiness. Current readiness rate: %3$s.', 'chama-ops'),
                $arrival_contact_gap_count,
                $arrivals_next_48h,
                $arrival_contact_ready_rate !== null ? number_format($arrival_contact_ready_rate, 1) . '%' : __('N/A', 'chama-ops')
            ),
            'link'     => $action_links['today_arrival_contact_gaps_48h'],
            'link_label' => __('Open contact-gap queue', 'chama-ops'),
        ];
    }

    if (empty($recommendations)) {
        $recommendations[] = [
            'priority' => __('On Track', 'chama-ops'),
            'title'    => __('No urgent operational alerts', 'chama-ops'),
            'detail'   => __('Current metrics look stable. Keep logging complete stay and guest data to preserve accuracy.', 'chama-ops'),
            'link'     => $action_links['view_stays'],
            'link_label' => __('Review stays', 'chama-ops'),
        ];
    }

    return array_slice($recommendations, 0, 3);
}

/**
 * Build quick action URLs for the overview page.
 *
 * @return array<string, string>
 */
function chama_ops_get_overview_action_links(): array
{
    $guest_list_url = admin_url('edit.php?post_type=guest');
    $stay_list_url  = admin_url('edit.php?post_type=stay');
    $guest_hub_page = get_page_by_path('guest-hub');
    $my_stay_page   = get_page_by_path('my-stay');
    $dining_page    = get_page_by_path('dining');
    $gift_shop_page = get_page_by_path('gift-shop');
    $service_page   = get_page_by_path('service-requests');

    $guest_hub_url = $guest_hub_page instanceof WP_Post
        ? (string) get_permalink($guest_hub_page)
        : (string) home_url('/guest-hub/');
    $my_stay_url = $my_stay_page instanceof WP_Post
        ? (string) get_permalink($my_stay_page)
        : (string) home_url('/my-stay/');
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
        'sample_guests'    => add_query_arg('chama_data_origin', 'sample', $guest_list_url),
        'persistent_guests' => add_query_arg('chama_data_origin', 'persistent', $guest_list_url),
        'sample_stays'     => add_query_arg('chama_data_origin', 'sample', $stay_list_url),
        'persistent_stays' => add_query_arg('chama_data_origin', 'persistent', $stay_list_url),
        'lead_stays'       => add_query_arg('chama_stay_status_filter', 'lead', $stay_list_url),
        'booked_stays'     => add_query_arg('chama_stay_status_filter', 'booked', $stay_list_url),
        'checked_in_stays' => add_query_arg('chama_stay_status_filter', 'checked_in', $stay_list_url),
        'checked_out_stays' => add_query_arg('chama_stay_status_filter', 'checked_out', $stay_list_url),
        'cancelled_stays'  => add_query_arg('chama_stay_status_filter', 'cancelled', $stay_list_url),
        'today_arrivals'   => add_query_arg('chama_stay_today', 'arrivals', $stay_list_url),
        'today_departures' => add_query_arg('chama_stay_today', 'departures', $stay_list_url),
        'today_in_house'   => add_query_arg('chama_stay_today', 'in_house', $stay_list_url),
        'today_pending_check_ins' => add_query_arg([
            'chama_stay_today'         => 'arrivals',
            'chama_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_pending_check_outs' => add_query_arg([
            'chama_stay_today'         => 'departures',
            'chama_stay_status_filter' => 'checked_in',
        ], $stay_list_url),
        'today_overdue_arrivals' => add_query_arg([
            'chama_stay_today'         => 'overdue_arrivals',
            'chama_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrivals_next_48h' => add_query_arg([
            'chama_stay_today'         => 'arrivals_next_48h',
            'chama_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrival_contact_ready_48h' => add_query_arg([
            'chama_stay_today'         => 'arrivals_contact_ready',
            'chama_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'today_arrival_contact_gaps_48h' => add_query_arg([
            'chama_stay_today'         => 'arrivals_contact_gap',
            'chama_stay_status_filter' => 'booked',
        ], $stay_list_url),
        'google_guests'    => add_query_arg('chama_guest_source', 'google', $guest_list_url),
        'repeat_guests'    => add_query_arg('chama_guest_source', 'repeat', $guest_list_url),
        'missing_contact_guests' => add_query_arg('chama_guest_quality', 'missing_contact', $guest_list_url),
        'quality_guest_missing_contact'   => add_query_arg('chama_guest_quality', 'missing_contact', $guest_list_url),
        'quality_guest_missing_email'     => add_query_arg('chama_guest_quality', 'missing_email', $guest_list_url),
        'quality_guest_missing_phone'     => add_query_arg('chama_guest_quality', 'missing_phone', $guest_list_url),
        'quality_guest_missing_consent'   => add_query_arg('chama_guest_quality', 'missing_consent', $guest_list_url),
        'quality_stay_missing_guest_link' => add_query_arg('chama_stay_quality', 'missing_guest_link', $stay_list_url),
        'quality_stay_missing_dates'      => add_query_arg('chama_stay_quality', 'missing_dates', $stay_list_url),
        'quality_stay_invalid_dates'      => add_query_arg('chama_stay_quality', 'invalid_date_range', $stay_list_url),
        'quality_stay_missing_revenue'    => add_query_arg('chama_stay_quality', 'missing_revenue', $stay_list_url),
        'guest_hub'        => $guest_hub_url,
        'my_stay'          => $my_stay_url,
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
function chama_ops_get_room_service_order_metrics(): array
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

    $open_statuses = ['submitted', 'in_kitchen', 'ready', 'delivering'];
    $open_orders = 0;
    $completed_orders = 0;
    $gross_revenue = 0.0;

    foreach ($order_ids as $order_id_raw) {
        $order_id = (int) $order_id_raw;
        $order_status = (string) get_post_meta($order_id, '_chama_order_status', true);
        $order_total = (string) get_post_meta($order_id, '_chama_order_total', true);
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
function chama_ops_render_room_service_item_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_room_service_item', 'chama_ops_room_service_item_nonce');

    $price        = (string) get_post_meta($post->ID, '_chama_room_service_price', true);
    $prep_minutes = (int) get_post_meta($post->ID, '_chama_room_service_prep_minutes', true);
    $is_available = (string) get_post_meta($post->ID, '_chama_room_service_available', true);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="chama_room_service_price"><?php esc_html_e('Price', 'chama-ops'); ?></label></th>
                <td>
                    <input type="text" id="chama_room_service_price" name="chama_room_service_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="44.00">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_room_service_prep_minutes"><?php esc_html_e('Prep Time (minutes)', 'chama-ops'); ?></label></th>
                <td>
                    <input type="number" id="chama_room_service_prep_minutes" name="chama_room_service_prep_minutes" min="0" step="1" value="<?php echo esc_attr((string) $prep_minutes); ?>" class="small-text">
                </td>
            </tr>
            <tr>
                <th scope="row"><?php esc_html_e('Availability', 'chama-ops'); ?></th>
                <td>
                    <label>
                        <input type="checkbox" name="chama_room_service_available" value="1" <?php checked($is_available, '1'); ?>>
                        <?php esc_html_e('Available to order', 'chama-ops'); ?>
                    </label>
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
function chama_ops_render_room_service_order_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_room_service_order', 'chama_ops_room_service_order_nonce');

    $item_id     = (int) get_post_meta($post->ID, '_chama_order_item_id', true);
    $quantity    = (int) get_post_meta($post->ID, '_chama_order_quantity', true);
    $room_number = (string) get_post_meta($post->ID, '_chama_order_room_number', true);
    $guest_name  = (string) get_post_meta($post->ID, '_chama_order_guest_name', true);
    $guest_phone = (string) get_post_meta($post->ID, '_chama_order_guest_phone', true);
    $order_total = (string) get_post_meta($post->ID, '_chama_order_total', true);
    $order_state = (string) get_post_meta($post->ID, '_chama_order_status', true);

    if ($quantity <= 0) {
        $quantity = 1;
    }

    $item_options = get_posts([
        'post_type'      => 'room_service_item',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="chama_order_item_id"><?php esc_html_e('Menu Item', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_order_item_id" name="chama_order_item_id">
                        <option value="0"><?php esc_html_e('Select item', 'chama-ops'); ?></option>
                        <?php foreach ($item_options as $item_post) : ?>
                            <option value="<?php echo esc_attr((string) $item_post->ID); ?>" <?php selected($item_id, (int) $item_post->ID); ?>>
                                <?php echo esc_html($item_post->post_title); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_quantity"><?php esc_html_e('Quantity', 'chama-ops'); ?></label></th>
                <td><input type="number" id="chama_order_quantity" name="chama_order_quantity" min="1" step="1" value="<?php echo esc_attr((string) $quantity); ?>" class="small-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_room_number"><?php esc_html_e('Room Number', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_order_room_number" name="chama_order_room_number" value="<?php echo esc_attr($room_number); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_guest_name"><?php esc_html_e('Guest Name', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_order_guest_name" name="chama_order_guest_name" value="<?php echo esc_attr($guest_name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_guest_phone"><?php esc_html_e('Guest Phone', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_order_guest_phone" name="chama_order_guest_phone" value="<?php echo esc_attr($guest_phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_total"><?php esc_html_e('Order Total', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_order_total" name="chama_order_total" value="<?php echo esc_attr($order_total); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_order_status"><?php esc_html_e('Order Status', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_order_status" name="chama_order_status">
                        <option value="submitted" <?php selected($order_state, 'submitted'); ?>><?php esc_html_e('Submitted', 'chama-ops'); ?></option>
                        <option value="in_kitchen" <?php selected($order_state, 'in_kitchen'); ?>><?php esc_html_e('In Kitchen', 'chama-ops'); ?></option>
                        <option value="ready" <?php selected($order_state, 'ready'); ?>><?php esc_html_e('Ready', 'chama-ops'); ?></option>
                        <option value="delivering" <?php selected($order_state, 'delivering'); ?>><?php esc_html_e('Delivering', 'chama-ops'); ?></option>
                        <option value="completed" <?php selected($order_state, 'completed'); ?>><?php esc_html_e('Completed', 'chama-ops'); ?></option>
                        <option value="cancelled" <?php selected($order_state, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'chama-ops'); ?></option>
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
function chama_ops_render_gift_shop_order_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_gift_shop_order', 'chama_ops_gift_shop_order_nonce');

    $item_key     = (string) get_post_meta($post->ID, '_chama_gift_item_key', true);
    $quantity     = (int) get_post_meta($post->ID, '_chama_gift_quantity', true);
    $room_number  = (string) get_post_meta($post->ID, '_chama_gift_room_number', true);
    $guest_name   = (string) get_post_meta($post->ID, '_chama_gift_guest_name', true);
    $guest_phone  = (string) get_post_meta($post->ID, '_chama_gift_guest_phone', true);
    $order_total  = (string) get_post_meta($post->ID, '_chama_gift_total', true);
    $order_status = (string) get_post_meta($post->ID, '_chama_gift_order_status', true);

    if ($quantity <= 0) {
        $quantity = 1;
    }
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="chama_gift_item_key"><?php esc_html_e('Catalog Item Key', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_gift_item_key" name="chama_gift_item_key" value="<?php echo esc_attr($item_key); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_quantity"><?php esc_html_e('Quantity', 'chama-ops'); ?></label></th>
                <td><input type="number" id="chama_gift_quantity" name="chama_gift_quantity" min="1" step="1" value="<?php echo esc_attr((string) $quantity); ?>" class="small-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_room_number"><?php esc_html_e('Room Number', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_gift_room_number" name="chama_gift_room_number" value="<?php echo esc_attr($room_number); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_guest_name"><?php esc_html_e('Guest Name', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_gift_guest_name" name="chama_gift_guest_name" value="<?php echo esc_attr($guest_name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_guest_phone"><?php esc_html_e('Guest Phone', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_gift_guest_phone" name="chama_gift_guest_phone" value="<?php echo esc_attr($guest_phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_total"><?php esc_html_e('Order Total', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_gift_total" name="chama_gift_total" value="<?php echo esc_attr($order_total); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_gift_order_status"><?php esc_html_e('Order Status', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_gift_order_status" name="chama_gift_order_status">
                        <option value="submitted" <?php selected($order_status, 'submitted'); ?>><?php esc_html_e('Submitted', 'chama-ops'); ?></option>
                        <option value="picked" <?php selected($order_status, 'picked'); ?>><?php esc_html_e('Picked', 'chama-ops'); ?></option>
                        <option value="preparing" <?php selected($order_status, 'preparing'); ?>><?php esc_html_e('Preparing', 'chama-ops'); ?></option>
                        <option value="ready" <?php selected($order_status, 'ready'); ?>><?php esc_html_e('Ready', 'chama-ops'); ?></option>
                        <option value="completed" <?php selected($order_status, 'completed'); ?>><?php esc_html_e('Completed', 'chama-ops'); ?></option>
                        <option value="cancelled" <?php selected($order_status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'chama-ops'); ?></option>
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
function chama_ops_render_service_request_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_service_request', 'chama_ops_service_request_nonce');

    $category = (string) get_post_meta($post->ID, '_chama_service_request_category', true);
    $priority = (string) get_post_meta($post->ID, '_chama_service_request_priority', true);
    $room     = (string) get_post_meta($post->ID, '_chama_service_request_room', true);
    $name     = (string) get_post_meta($post->ID, '_chama_service_request_guest_name', true);
    $phone    = (string) get_post_meta($post->ID, '_chama_service_request_guest_phone', true);
    $status   = (string) get_post_meta($post->ID, '_chama_service_request_status', true);
    ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="chama_service_request_category"><?php esc_html_e('Category', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_service_request_category" name="chama_service_request_category">
                        <option value="housekeeping" <?php selected($category, 'housekeeping'); ?>><?php esc_html_e('Housekeeping', 'chama-ops'); ?></option>
                        <option value="amenities" <?php selected($category, 'amenities'); ?>><?php esc_html_e('Amenities', 'chama-ops'); ?></option>
                        <option value="front_desk" <?php selected($category, 'front_desk'); ?>><?php esc_html_e('Front Desk', 'chama-ops'); ?></option>
                        <option value="maintenance" <?php selected($category, 'maintenance'); ?>><?php esc_html_e('Maintenance', 'chama-ops'); ?></option>
                        <option value="other" <?php selected($category, 'other'); ?>><?php esc_html_e('Other', 'chama-ops'); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_service_request_priority"><?php esc_html_e('Priority', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_service_request_priority" name="chama_service_request_priority">
                        <option value="normal" <?php selected($priority, 'normal'); ?>><?php esc_html_e('Normal', 'chama-ops'); ?></option>
                        <option value="urgent" <?php selected($priority, 'urgent'); ?>><?php esc_html_e('Urgent', 'chama-ops'); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_service_request_room"><?php esc_html_e('Room Number', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_service_request_room" name="chama_service_request_room" value="<?php echo esc_attr($room); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_service_request_guest_name"><?php esc_html_e('Guest Name', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_service_request_guest_name" name="chama_service_request_guest_name" value="<?php echo esc_attr($name); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_service_request_guest_phone"><?php esc_html_e('Guest Phone', 'chama-ops'); ?></label></th>
                <td><input type="text" id="chama_service_request_guest_phone" name="chama_service_request_guest_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="chama_service_request_status"><?php esc_html_e('Status', 'chama-ops'); ?></label></th>
                <td>
                    <select id="chama_service_request_status" name="chama_service_request_status">
                        <option value="submitted" <?php selected($status, 'submitted'); ?>><?php esc_html_e('Submitted', 'chama-ops'); ?></option>
                        <option value="acknowledged" <?php selected($status, 'acknowledged'); ?>><?php esc_html_e('Acknowledged', 'chama-ops'); ?></option>
                        <option value="in_progress" <?php selected($status, 'in_progress'); ?>><?php esc_html_e('In Progress', 'chama-ops'); ?></option>
                        <option value="completed" <?php selected($status, 'completed'); ?>><?php esc_html_e('Completed', 'chama-ops'); ?></option>
                        <option value="cancelled" <?php selected($status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'chama-ops'); ?></option>
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
function chama_ops_get_demo_scenario_labels(): array
{
    return [
        'balanced'     => __('Balanced Demo', 'chama-ops'),
        'booking_rush' => __('Booking Rush', 'chama-ops'),
        'data_cleanup' => __('Data Cleanup Drill', 'chama-ops'),
    ];
}

/**
 * Resolve and validate a sample demo scenario key.
 *
 * @param string $raw_scenario Scenario key from user input.
 */
function chama_ops_resolve_demo_scenario(string $raw_scenario): string
{
    $scenario = sanitize_key($raw_scenario);
    $labels   = chama_ops_get_demo_scenario_labels();

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
function chama_ops_get_sample_data_post_ids(): array
{
    $sample_post_ids = get_posts([
        'post_type'      => ['guest', 'stay'],
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_chama_ops_sample_data',
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
function chama_ops_get_sample_data_counts(): array
{
    $counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (chama_ops_get_sample_data_post_ids() as $sample_post_id) {
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
function chama_ops_delete_sample_data_posts(): array
{
    $deleted_counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (chama_ops_get_sample_data_post_ids() as $sample_post_id) {
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
function chama_ops_promote_sample_data_posts(): array
{
    $promoted_counts = [
        'guest' => 0,
        'stay'  => 0,
        'total' => 0,
    ];

    foreach (chama_ops_get_sample_data_post_ids() as $sample_post_id) {
        $sample_post_id = (int) $sample_post_id;
        $post_type      = get_post_type($sample_post_id);
        $deleted_meta   = delete_post_meta($sample_post_id, '_chama_ops_sample_data');

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
 * Render the Chama Ops overview dashboard page.
 */
function chama_ops_render_overview_page(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to access this page.', 'chama-ops'));
    }

    $guest_counts = wp_count_posts('guest');
    $stay_counts  = wp_count_posts('stay');

    $guest_total = isset($guest_counts->publish) ? (int) $guest_counts->publish : 0;
    $stay_total  = isset($stay_counts->publish) ? (int) $stay_counts->publish : 0;

    $notice_key     = isset($_GET['chama_ops_notice']) ? sanitize_text_field(wp_unslash($_GET['chama_ops_notice'])) : '';
    $notice_scenario = isset($_GET['chama_ops_demo_scenario'])
        ? chama_ops_resolve_demo_scenario((string) wp_unslash($_GET['chama_ops_demo_scenario']))
        : 'balanced';
    $notice_nights_updated = isset($_GET['chama_ops_nights_updated'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_nights_updated'])))
        : 0;
    $notice_nights_cleared = isset($_GET['chama_ops_nights_cleared'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_nights_cleared'])))
        : 0;
    $notice_nights_unchanged = isset($_GET['chama_ops_nights_unchanged'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_nights_unchanged'])))
        : 0;
    $notice_nights_scanned = isset($_GET['chama_ops_nights_scanned'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_nights_scanned'])))
        : 0;
    $notice_promoted_guest_count = isset($_GET['chama_ops_promoted_guest_count'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_promoted_guest_count'])))
        : 0;
    $notice_promoted_stay_count = isset($_GET['chama_ops_promoted_stay_count'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_promoted_stay_count'])))
        : 0;
    $notice_phone_updated = isset($_GET['chama_ops_phone_updated'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_phone_updated'])))
        : 0;
    $notice_phone_unchanged = isset($_GET['chama_ops_phone_unchanged'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_phone_unchanged'])))
        : 0;
    $notice_phone_scanned = isset($_GET['chama_ops_phone_scanned'])
        ? max(0, (int) sanitize_text_field(wp_unslash($_GET['chama_ops_phone_scanned'])))
        : 0;
    $scenario_labels = chama_ops_get_demo_scenario_labels();
    $seed_notice_messages = [
        'sample_data_seeded' => [
            'message' => __('Sample guest and stay data has been generated for the demo.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_regenerated' => [
            'message' => __('Sample data has been regenerated and existing sample records were replaced.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_exists' => [
            'message' => __('Sample data already exists. Use regenerate if you want a clean reset of demo records.', 'chama-ops'),
            'type'    => 'notice-warning',
        ],
        'sample_data_cleared' => [
            'message' => __('Sample data was cleared from guests and stays.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_none' => [
            'message' => __('No sample data records were found to clear.', 'chama-ops'),
            'type'    => 'notice-info',
        ],
        'sample_data_promoted' => [
            'message' => __('Sample records are now persistent and will no longer be deleted by regenerate.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_promote_none' => [
            'message' => __('No sample records were available to convert.', 'chama-ops'),
            'type'    => 'notice-info',
        ],
        'stay_nights_rebuilt' => [
            'message' => __('Stay nights were recalculated from current check-in/check-out dates.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'guest_phones_normalized' => [
            'message' => __('Guest phone values were normalized for consistent display format.', 'chama-ops'),
            'type'    => 'notice-success',
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

    $stay_status_summary    = chama_ops_get_stay_status_summary();
    $guest_source_summary   = chama_ops_get_guest_source_summary();
    $pipeline_metrics       = chama_ops_get_pipeline_metrics($stay_status_summary);
    $action_links           = chama_ops_get_overview_action_links();
    $rollup_metrics         = chama_ops_get_stay_rollup_metrics();
    $data_quality_metrics   = chama_ops_get_data_quality_metrics();
    $today_ops_metrics      = chama_ops_get_today_operations_metrics();
    $recommendations        = chama_ops_get_operational_recommendations($pipeline_metrics, $data_quality_metrics, $today_ops_metrics, $action_links);
    $quality_issue_total    = array_sum($data_quality_metrics);
    $average_revenue        = $rollup_metrics['average_revenue'];
    $average_revenue_night  = $rollup_metrics['average_revenue_per_night'];
    $checked_in_total       = (int) ($stay_status_summary['checked_in'] ?? 0);
    $booked_total           = (int) ($stay_status_summary['booked'] ?? 0);
    $room_service_metrics   = chama_ops_get_room_service_order_metrics();
    $sample_data_counts     = chama_ops_get_sample_data_counts();
    $persistent_guest_count = max(0, $guest_total - (int) $sample_data_counts['guest']);
    $persistent_stay_count  = max(0, $stay_total - (int) $sample_data_counts['stay']);
    $upcoming_arrivals      = chama_ops_get_upcoming_arrivals(14, 8);
    $seed_url               = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_seed_sample_data'),
        'chama_ops_seed_sample_data_action',
        'chama_ops_seed_sample_data_nonce'
    );
    $seed_force_url = add_query_arg('chama_ops_force_sample_data', '1', $seed_url);
    $seed_booking_rush_url = add_query_arg([
        'chama_ops_force_sample_data' => '1',
        'chama_ops_demo_scenario'     => 'booking_rush',
    ], $seed_url);
    $seed_data_cleanup_url = add_query_arg([
        'chama_ops_force_sample_data' => '1',
        'chama_ops_demo_scenario'     => 'data_cleanup',
    ], $seed_url);
    $clear_seed_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_clear_sample_data'),
        'chama_ops_clear_sample_data_action',
        'chama_ops_clear_sample_data_nonce'
    );
    $promote_seed_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_promote_sample_data'),
        'chama_ops_promote_sample_data_action',
        'chama_ops_promote_sample_data_nonce'
    );
    $rebuild_nights_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_rebuild_stay_nights'),
        'chama_ops_rebuild_stay_nights_action',
        'chama_ops_rebuild_stay_nights_nonce'
    );
    $normalize_guest_phones_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_normalize_guest_phones'),
        'chama_ops_normalize_guest_phones_action',
        'chama_ops_normalize_guest_phones_nonce'
    );
    $export_guests_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_guests_csv'),
        'chama_ops_export_guests_csv_action',
        'chama_ops_export_guests_csv_nonce'
    );
    $export_missing_contact_guests_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_missing_contact_guests_csv'),
        'chama_ops_export_missing_contact_guests_csv_action',
        'chama_ops_export_missing_contact_guests_csv_nonce'
    );
    $export_quality_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_data_quality_snapshot_csv'),
        'chama_ops_export_data_quality_snapshot_csv_action',
        'chama_ops_export_data_quality_snapshot_csv_nonce'
    );
    $export_today_ops_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_today_ops_snapshot_csv'),
        'chama_ops_export_today_ops_snapshot_csv_action',
        'chama_ops_export_today_ops_snapshot_csv_nonce'
    );
    $export_action_board_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_action_board_snapshot_csv'),
        'chama_ops_export_action_board_snapshot_csv_action',
        'chama_ops_export_action_board_snapshot_csv_nonce'
    );
    $export_upcoming_arrivals_snapshot_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_upcoming_arrivals_snapshot_csv'),
        'chama_ops_export_upcoming_arrivals_snapshot_csv_action',
        'chama_ops_export_upcoming_arrivals_snapshot_csv_nonce'
    );
    $export_stays_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_stays_csv'),
        'chama_ops_export_stays_csv_action',
        'chama_ops_export_stays_csv_nonce'
    );
    $export_arrival_contact_gaps_url = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_arrival_contact_gaps_csv'),
        'chama_ops_export_arrival_contact_gaps_csv_action',
        'chama_ops_export_arrival_contact_gaps_csv_nonce'
    );
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
                            __('Scenario: %s.', 'chama-ops'),
                            $scenario_labels[$notice_scenario]
                        );
                    }

                    if ($notice_key === 'stay_nights_rebuilt') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: updated count, 2: cleared count, 3: unchanged count. */
                            __('Updated: %1$d, cleared: %2$d, unchanged: %3$d.', 'chama-ops'),
                            $notice_nights_updated,
                            $notice_nights_cleared,
                            $notice_nights_unchanged
                        );
                        $notice_message .= ' ' . sprintf(
                            /* translators: %d is the number of stay records scanned. */
                            __('Scanned stays: %d.', 'chama-ops'),
                            $notice_nights_scanned
                        );
                    }
                    if ($notice_key === 'sample_data_promoted') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: guest count, 2: stay count. */
                            __('Converted: %1$d guests, %2$d stays.', 'chama-ops'),
                            $notice_promoted_guest_count,
                            $notice_promoted_stay_count
                        );
                    }
                    if ($notice_key === 'guest_phones_normalized') {
                        $notice_message .= ' ' . sprintf(
                            /* translators: 1: updated count, 2: unchanged count, 3: scanned count. */
                            __('Updated: %1$d, unchanged: %2$d, scanned guests: %3$d.', 'chama-ops'),
                            $notice_phone_updated,
                            $notice_phone_unchanged,
                            $notice_phone_scanned
                        );
                    }

                    echo esc_html($notice_message);
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <h1><?php esc_html_e('Chama Ops Overview', 'chama-ops'); ?></h1>
        <p><?php esc_html_e('Quick snapshot of guest and stay activity for the current prototype.', 'chama-ops'); ?></p>

        <div style="display:flex;flex-wrap:wrap;gap:8px;margin:20px 0 24px;">
            <a class="button button-primary" href="<?php echo esc_url($action_links['add_guest']); ?>">
                <?php esc_html_e('Add New Guest', 'chama-ops'); ?>
            </a>
            <a class="button button-primary" href="<?php echo esc_url($action_links['add_stay']); ?>">
                <?php esc_html_e('Add New Stay', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['view_guests']); ?>">
                <?php esc_html_e('View Guests', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['view_stays']); ?>">
                <?php esc_html_e('View Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['booked_stays']); ?>">
                <?php esc_html_e('Booked Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['lead_stays']); ?>">
                <?php esc_html_e('Lead Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['checked_in_stays']); ?>">
                <?php esc_html_e('Checked-In Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['checked_out_stays']); ?>">
                <?php esc_html_e('Checked-Out Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['cancelled_stays']); ?>">
                <?php esc_html_e('Cancelled Stays', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['google_guests']); ?>">
                <?php esc_html_e('Google Guests', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['repeat_guests']); ?>">
                <?php esc_html_e('Repeat Guests', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($action_links['missing_contact_guests']); ?>">
                <?php esc_html_e('Guests Missing Contact', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_url); ?>">
                <?php esc_html_e('Generate Sample Data', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_force_url); ?>">
                <?php esc_html_e('Regenerate Sample Data', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_booking_rush_url); ?>">
                <?php esc_html_e('Load Booking Rush Demo', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($seed_data_cleanup_url); ?>">
                <?php esc_html_e('Load Data Cleanup Drill', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($promote_seed_url); ?>">
                <?php esc_html_e('Keep Current Sample Records', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($rebuild_nights_url); ?>">
                <?php esc_html_e('Recalculate Stay Nights', 'chama-ops'); ?>
            </a>
            <a class="button button-secondary" href="<?php echo esc_url($normalize_guest_phones_url); ?>">
                <?php esc_html_e('Normalize Guest Phones', 'chama-ops'); ?>
            </a>
            <a
                class="button button-secondary"
                href="<?php echo esc_url($clear_seed_url); ?>"
                onclick="return confirm('<?php echo esc_attr__('Clear all sample guest and stay records?', 'chama-ops'); ?>');"
            >
                <?php esc_html_e('Clear Sample Data', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_guests_url); ?>">
                <?php esc_html_e('Export Guests CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_missing_contact_guests_url); ?>">
                <?php esc_html_e('Export Missing-Contact Guests CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_quality_snapshot_url); ?>">
                <?php esc_html_e('Export Data Quality Snapshot CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_today_ops_snapshot_url); ?>">
                <?php esc_html_e('Export Today Ops Snapshot CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_action_board_snapshot_url); ?>">
                <?php esc_html_e('Export Action Board CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_upcoming_arrivals_snapshot_url); ?>">
                <?php esc_html_e('Export Upcoming Arrivals CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_stays_url); ?>">
                <?php esc_html_e('Export Stays CSV', 'chama-ops'); ?>
            </a>
            <a class="button" href="<?php echo esc_url($export_arrival_contact_gaps_url); ?>">
                <?php esc_html_e('Export 48h Contact Gaps CSV', 'chama-ops'); ?>
            </a>
        </div>

        <p style="margin:0 0 16px;">
            <?php
            printf(
                esc_html__('Sample records currently loaded: %1$d guests, %2$d stays.', 'chama-ops'),
                (int) $sample_data_counts['guest'],
                (int) $sample_data_counts['stay']
            );
            ?>
        </p>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Guest Experience Command Center', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Launch guest-facing pages, watch in-house demand, and drive same-day fulfillment from one place.', 'chama-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guest Hub Entry', 'chama-ops'); ?></strong><br>
                    <?php esc_html_e('QR landing surface for active guests.', 'chama-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['guest_hub']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open Guest Hub', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Restaurant Orders', 'chama-ops'); ?></strong><br>
                    <?php esc_html_e('Sample signature dish included: Filet Mignon.', 'chama-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['dining_pos']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open Restaurant Orders Page', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Gift Shop Orders', 'chama-ops'); ?></strong><br>
                    <?php esc_html_e('Guest-side catalog and pickup flow controls.', 'chama-ops'); ?><br>
                    <a href="<?php echo esc_url($action_links['gift_shop_pos']); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Open Gift Shop Page', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Live Fulfillment Load', 'chama-ops'); ?></strong><br>
                    <?php
                    printf(
                        esc_html__('%1$d checked-in / %2$d booked stays', 'chama-ops'),
                        $checked_in_total,
                        $booked_total
                    );
                    ?><br>
                    <a href="<?php echo esc_url($action_links['checked_in_stays']); ?>"><?php esc_html_e('Open checked-in queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Room Service Queue', 'chama-ops'); ?></strong><br>
                    <?php
                    printf(
                        esc_html__('%1$d open / %2$d total orders', 'chama-ops'),
                        (int) $room_service_metrics['open_orders'],
                        (int) $room_service_metrics['total_orders']
                    );
                    ?><br>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=room_service_order')); ?>"><?php esc_html_e('Open room-service orders', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Room Service Revenue', 'chama-ops'); ?></strong><br>
                    <?php
                    echo esc_html('$' . number_format((float) $room_service_metrics['gross_revenue'], 2));
                    ?><br>
                    <?php
                    printf(
                        esc_html__('%d completed orders', 'chama-ops'),
                        (int) $room_service_metrics['completed_orders']
                    );
                    ?>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Record Origin Snapshot', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('See which records are still demo/sample data versus persistent records.', 'chama-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Sample Guests', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $sample_data_counts['guest']); ?><br>
                    <a href="<?php echo esc_url($action_links['sample_guests']); ?>"><?php esc_html_e('Open sample guests', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Persistent Guests', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $persistent_guest_count); ?><br>
                    <a href="<?php echo esc_url($action_links['persistent_guests']); ?>"><?php esc_html_e('Open persistent guests', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Sample Stays', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $sample_data_counts['stay']); ?><br>
                    <a href="<?php echo esc_url($action_links['sample_stays']); ?>"><?php esc_html_e('Open sample stays', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Persistent Stays', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $persistent_stay_count); ?><br>
                    <a href="<?php echo esc_url($action_links['persistent_stays']); ?>"><?php esc_html_e('Open persistent stays', 'chama-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Today Operations Board', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Live same-day counts for arrivals, departures, and in-house operations.', 'chama-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrivals Today', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['arrivals_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrivals']); ?>"><?php esc_html_e('Open arrivals queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Departures Today', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['departures_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_departures']); ?>"><?php esc_html_e('Open departures queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('In-House Tonight', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['in_house_today']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_in_house']); ?>"><?php esc_html_e('Open in-house queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Pending Check-Ins', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['pending_check_ins']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_pending_check_ins']); ?>"><?php esc_html_e('Open pending check-ins', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Pending Check-Outs', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['pending_check_outs']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_pending_check_outs']); ?>"><?php esc_html_e('Open pending check-outs', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Overdue Arrivals', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['overdue_arrivals']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_overdue_arrivals']); ?>"><?php esc_html_e('Open overdue arrivals', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Gaps (48h)', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $today_ops_metrics['arrival_contact_gaps_48h']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_gaps_48h']); ?>"><?php esc_html_e('Open contact-gap queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Ready (48h)', 'chama-ops'); ?></strong><br>
                    <?php
                    $contact_ready_rate_48h = $today_ops_metrics['arrival_contact_ready_rate_48h'];
                    echo $contact_ready_rate_48h !== null
                        ? esc_html(number_format((float) $contact_ready_rate_48h, 1) . '%')
                        : esc_html__('N/A', 'chama-ops');
                    ?><br>
                    <?php
                    printf(
                        esc_html__('%1$d ready of %2$d booked', 'chama-ops'),
                        (int) $today_ops_metrics['arrival_contact_ready_48h'],
                        (int) $today_ops_metrics['arrivals_next_48h']
                    );
                    ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_ready_48h']); ?>"><?php esc_html_e('Open contact-ready queue', 'chama-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Upcoming Arrivals (Next 14 Days)', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Booked stays arriving soon, with readiness checks for guest link, dates, nights, and revenue.', 'chama-ops'); ?></p>
            <?php if (!empty($upcoming_arrivals)) : ?>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:12px;">
                    <?php foreach ($upcoming_arrivals as $arrival) : ?>
                        <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Stay:', 'chama-ops'); ?></strong>
                                <?php if ($arrival['stay_link'] !== '') : ?>
                                    <a href="<?php echo esc_url((string) $arrival['stay_link']); ?>"><?php echo esc_html((string) $arrival['stay_title']); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html((string) $arrival['stay_title']); ?>
                                <?php endif; ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Guest:', 'chama-ops'); ?></strong>
                                <?php if ($arrival['guest_link'] !== '') : ?>
                                    <a href="<?php echo esc_url((string) $arrival['guest_link']); ?>"><?php echo esc_html((string) $arrival['guest_name']); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html((string) $arrival['guest_name']); ?>
                                <?php endif; ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Dates:', 'chama-ops'); ?></strong>
                                <?php
                                $arrival_check_in  = (string) $arrival['check_in'];
                                $arrival_check_out = (string) $arrival['check_out'];
                                echo ($arrival_check_in !== '' || $arrival_check_out !== '')
                                    ? esc_html(trim($arrival_check_in . ' -> ' . $arrival_check_out))
                                    : esc_html__('N/A', 'chama-ops');
                                ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Nights:', 'chama-ops'); ?></strong>
                                <?php
                                echo (int) $arrival['nights'] > 0
                                    ? esc_html((string) $arrival['nights'])
                                    : esc_html__('N/A', 'chama-ops');
                                ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Status:', 'chama-ops'); ?></strong>
                                <?php echo esc_html(chama_ops_format_stay_status_label((string) $arrival['status'])); ?>
                            </p>
                            <p style="margin:0 0 8px;">
                                <strong><?php esc_html_e('Readiness:', 'chama-ops'); ?></strong>
                                <?php echo !empty($arrival['is_ready']) ? esc_html__('Ready', 'chama-ops') : esc_html__('Needs Attention', 'chama-ops'); ?>
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
                <p><?php esc_html_e('No booked arrivals in the next 14 days.', 'chama-ops'); ?></p>
            <?php endif; ?>
            <p style="margin:12px 0 0;">
                <a class="button" href="<?php echo esc_url($action_links['booked_stays']); ?>">
                    <?php esc_html_e('Open booked queue', 'chama-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['quality_stay_missing_dates']); ?>">
                    <?php esc_html_e('Open stay quality queue', 'chama-ops'); ?>
                </a>
            </p>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Action Board', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('Prioritized operational recommendations based on live pipeline and data quality metrics.', 'chama-ops'); ?></p>
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
                <h2 style="margin-top:0;"><?php esc_html_e('Guests', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $guest_total); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Published guest records', 'chama-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Stays', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $stay_total); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Published stay records', 'chama-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Booked / Active Nights', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html((string) $rollup_metrics['booked_active_nights']); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across booked, checked-in, and checked-out stays', 'chama-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Average Revenue / Stay', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;">
                    <?php
                    echo $average_revenue !== null
                        ? esc_html('$' . number_format((float) $average_revenue, 2))
                        : esc_html__('N/A', 'chama-ops');
                    ?>
                </p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across stays with revenue entered', 'chama-ops'); ?></p>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Average Revenue / Night', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;">
                    <?php
                    echo $average_revenue_night !== null
                        ? esc_html('$' . number_format((float) $average_revenue_night, 2))
                        : esc_html__('N/A', 'chama-ops');
                    ?>
                </p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across stays with both revenue and nights', 'chama-ops'); ?></p>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Pipeline Snapshot', 'chama-ops'); ?></h2>
            <p style="margin-top:0;"><?php esc_html_e('High-level booking flow health from current stay status mix.', 'chama-ops'); ?></p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Total Stays In Pipeline Mix', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $pipeline_metrics['total_stays_in_mix']); ?>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Booked-Or-Later Rate', 'chama-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['booked_or_later_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['booked_or_later_rate'], 1) . '%')
                        : esc_html__('N/A', 'chama-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['booked_stays']); ?>"><?php esc_html_e('Open booked queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Cancellation Rate', 'chama-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['cancellation_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['cancellation_rate'], 1) . '%')
                        : esc_html__('N/A', 'chama-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['cancelled_stays']); ?>"><?php esc_html_e('Open cancelled queue', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Lead Backlog Rate', 'chama-ops'); ?></strong><br>
                    <?php
                    echo $pipeline_metrics['lead_backlog_rate'] !== null
                        ? esc_html(number_format((float) $pipeline_metrics['lead_backlog_rate'], 1) . '%')
                        : esc_html__('N/A', 'chama-ops');
                    ?>
                    <br>
                    <a href="<?php echo esc_url($action_links['lead_stays']); ?>"><?php esc_html_e('Open lead queue', 'chama-ops'); ?></a>
                </div>
            </div>
        </div>

        <div style="background:#fff;border:1px solid #dcdcde;padding:16px;margin-bottom:16px;">
            <h2 style="margin-top:0;"><?php esc_html_e('Data Quality Radar', 'chama-ops'); ?></h2>
            <p style="margin-top:0;">
                <?php
                printf(
                    esc_html__('%d records currently need attention across guest/stay operations.', 'chama-ops'),
                    (int) $quality_issue_total
                );
                ?>
            </p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px;">
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Email', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_email']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_email']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Phone', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_phone']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_phone']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Guests Missing Consent', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['guest_missing_consent']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_guest_missing_consent']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Guest Link', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_guest_link']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_guest_link']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Dates', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_dates']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_dates']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Invalid Date Range', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_invalid_date_range']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_invalid_dates']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Stays Missing Revenue', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_missing_revenue']); ?><br>
                    <a href="<?php echo esc_url($action_links['quality_stay_missing_revenue']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
                <div style="padding:12px;border:1px solid #dcdcde;background:#f9f9f9;">
                    <strong><?php esc_html_e('Arrival Contact Gaps (48h)', 'chama-ops'); ?></strong><br>
                    <?php echo esc_html((string) $data_quality_metrics['stay_arrival_contact_gaps_48h']); ?><br>
                    <a href="<?php echo esc_url($action_links['today_arrival_contact_gaps_48h']); ?>"><?php esc_html_e('Open filtered list', 'chama-ops'); ?></a>
                </div>
            </div>
            <p style="margin:12px 0 0;">
                <a class="button" href="<?php echo esc_url($action_links['quality_guest_missing_contact']); ?>">
                    <?php esc_html_e('Guests Missing Contact', 'chama-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['view_guests']); ?>">
                    <?php esc_html_e('Review Guests', 'chama-ops'); ?>
                </a>
                <a class="button" href="<?php echo esc_url($action_links['view_stays']); ?>">
                    <?php esc_html_e('Review Stays', 'chama-ops'); ?>
                </a>
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:16px;margin-bottom:16px;">
            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Stay Status Breakdown', 'chama-ops'); ?></h2>
                <ul style="margin:0;">
                    <?php foreach ($stay_status_summary as $status_key => $count) : ?>
                        <li>
                            <strong><?php echo esc_html(chama_ops_format_stay_status_label($status_key)); ?>:</strong>
                            <?php echo esc_html((string) $count); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Guest Source Breakdown', 'chama-ops'); ?></h2>
                <ul style="margin:0;">
                    <?php foreach ($guest_source_summary as $source_key => $count) : ?>
                        <li>
                            <strong><?php echo esc_html(chama_ops_format_guest_source_label($source_key)); ?>:</strong>
                            <?php echo esc_html((string) $count); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:16px;">
            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Recent Guests', 'chama-ops'); ?></h2>
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
                    <p><?php esc_html_e('No guest records yet.', 'chama-ops'); ?></p>
                <?php endif; ?>
            </div>

            <div style="background:#fff;border:1px solid #dcdcde;padding:16px;">
                <h2 style="margin-top:0;"><?php esc_html_e('Recent Stays', 'chama-ops'); ?></h2>
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
                    <p><?php esc_html_e('No stay records yet.', 'chama-ops'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Seed demo guest/stay records for quick walkthroughs.
 */
function chama_ops_seed_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to seed sample data.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_seed_sample_data_action', 'chama_ops_seed_sample_data_nonce');

    $force = isset($_GET['chama_ops_force_sample_data']) && sanitize_text_field(wp_unslash($_GET['chama_ops_force_sample_data'])) === '1';

    $existing_sample_post_ids = chama_ops_get_sample_data_post_ids();

    if (!$force && !empty($existing_sample_post_ids)) {
        $redirect = add_query_arg(
            'chama_ops_notice',
            'sample_data_exists',
            wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview')
        );
        wp_safe_redirect($redirect);
        exit;
    }

    if ($force && !empty($existing_sample_post_ids)) {
        chama_ops_delete_sample_data_posts();
    }

    $scenario = isset($_GET['chama_ops_demo_scenario'])
        ? chama_ops_resolve_demo_scenario((string) wp_unslash($_GET['chama_ops_demo_scenario']))
        : 'balanced';
    $today = new DateTimeImmutable(wp_date('Y-m-d'));

    if ($scenario === 'booking_rush') {
        $guest_definitions = [
            [
                'handle'           => 'elena',
                'title'            => 'Sample Guest - Elena Cruz',
                'email'            => 'elena@chamastationinn.com',
                'phone'            => '(505) 222-0100',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Chama Canyon Calm',
                'vip'              => '1',
                'consent'          => '1',
            ],
            [
                'handle'           => 'nate',
                'title'            => 'Sample Guest - Nate Morales',
                'email'            => 'nate+ops@chamastationinn.com',
                'phone'            => '',
                'marketing_source' => 'google',
                'preferred_room'   => 'Taos Adobe',
                'vip'              => '',
                'consent'          => '1',
            ],
            [
                'handle'           => 'sara',
                'title'            => 'Sample Guest - Sara Lin',
                'email'            => 'sara@chamastationinn.com',
                'phone'            => '(505) 222-0198',
                'marketing_source' => 'referral',
                'preferred_room'   => 'Santa Fe Serenity',
                'vip'              => '',
                'consent'          => '1',
            ],
            [
                'handle'           => 'omar',
                'title'            => 'Sample Guest - Omar Patel',
                'email'            => 'omar@chamastationinn.com',
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
                'email'            => 'elena@chamastationinn.com',
                'phone'            => '',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Chama Canyon Calm',
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
                'email'            => 'elena@chamastationinn.com',
                'phone'            => '(505) 222-0100',
                'marketing_source' => 'direct',
                'preferred_room'   => 'Chama Canyon Calm',
                'vip'              => '1',
                'consent'          => '1',
            ],
            [
                'handle'           => 'nate',
                'title'            => 'Sample Guest - Nate Morales',
                'email'            => 'nate+ops@chamastationinn.com',
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

    foreach ($guest_definitions as $guest_data) {
        $guest_id = wp_insert_post([
            'post_title'  => $guest_data['title'],
            'post_type'   => 'guest',
            'post_status' => 'publish',
            'post_content'=> esc_html__('Demo guest record created for the overview dashboard.', 'chama-ops'),
        ], true);

        if (is_wp_error($guest_id)) {
            wp_die($guest_id->get_error_message(), '', ['response' => 500]);
        }

        update_post_meta($guest_id, '_chama_guest_email', $guest_data['email']);
        update_post_meta($guest_id, '_chama_guest_phone', $guest_data['phone']);
        update_post_meta($guest_id, '_chama_guest_marketing_source', $guest_data['marketing_source']);
        update_post_meta($guest_id, '_chama_guest_preferred_room', $guest_data['preferred_room']);
        update_post_meta($guest_id, '_chama_guest_vip', $guest_data['vip']);
        update_post_meta($guest_id, '_chama_guest_marketing_consent', $guest_data['consent']);
        update_post_meta($guest_id, '_chama_ops_sample_data', '1');

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
            'post_content'=> esc_html__('Demo stay record seeded for the overview.', 'chama-ops'),
        ], true);

        if (is_wp_error($stay_id)) {
            wp_die($stay_id->get_error_message(), '', ['response' => 500]);
        }

        update_post_meta($stay_id, '_chama_stay_guest_id', $linked_guest_id);
        update_post_meta($stay_id, '_chama_stay_check_in', $stay_data['check_in']);
        update_post_meta($stay_id, '_chama_stay_check_out', $stay_data['check_out']);
        update_post_meta($stay_id, '_chama_stay_status', $stay_data['status']);
        update_post_meta($stay_id, '_chama_stay_revenue', $stay_data['revenue']);

        $nights = chama_ops_calculate_stay_nights($stay_data['check_in'], $stay_data['check_out']);

        if ($nights !== null) {
            update_post_meta($stay_id, '_chama_stay_nights', $nights);
        }

        update_post_meta($stay_id, '_chama_ops_sample_data', '1');
    }

    $redirect = add_query_arg([
        'chama_ops_notice'        => $force ? 'sample_data_regenerated' : 'sample_data_seeded',
        'chama_ops_demo_scenario' => $scenario,
    ], wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview'));
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_seed_sample_data', 'chama_ops_seed_sample_data');

/**
 * Clear all seeded sample data records.
 */
function chama_ops_clear_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to clear sample data.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_clear_sample_data_action', 'chama_ops_clear_sample_data_nonce');

    $deleted_counts = chama_ops_delete_sample_data_posts();
    $notice_key     = $deleted_counts['total'] > 0 ? 'sample_data_cleared' : 'sample_data_none';

    $redirect = add_query_arg(
        'chama_ops_notice',
        $notice_key,
        wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview')
    );
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_clear_sample_data', 'chama_ops_clear_sample_data');

/**
 * Convert current sample records into persistent records.
 */
function chama_ops_promote_sample_data(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to convert sample data.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_promote_sample_data_action', 'chama_ops_promote_sample_data_nonce');

    $promoted_counts = chama_ops_promote_sample_data_posts();
    $notice_key      = $promoted_counts['total'] > 0 ? 'sample_data_promoted' : 'sample_data_promote_none';

    $redirect = add_query_arg([
        'chama_ops_notice'               => $notice_key,
        'chama_ops_promoted_guest_count' => $promoted_counts['guest'],
        'chama_ops_promoted_stay_count'  => $promoted_counts['stay'],
    ], wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview'));
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_promote_sample_data', 'chama_ops_promote_sample_data');

/**
 * Recalculate persisted stay-night values from check-in/check-out dates.
 */
function chama_ops_rebuild_stay_nights(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to recalculate stay nights.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_rebuild_stay_nights_action', 'chama_ops_rebuild_stay_nights_nonce');

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
        $check_in   = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out  = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);
        $new_nights = chama_ops_calculate_stay_nights($check_in, $check_out);
        $had_nights = metadata_exists('post', $stay_id, '_chama_stay_nights');

        if ($new_nights === null) {
            if ($had_nights) {
                delete_post_meta($stay_id, '_chama_stay_nights');
                $cleared++;
            } else {
                $unchanged++;
            }

            continue;
        }

        $existing_nights = (string) get_post_meta($stay_id, '_chama_stay_nights', true);

        if ($had_nights && $existing_nights === (string) $new_nights) {
            $unchanged++;
            continue;
        }

        update_post_meta($stay_id, '_chama_stay_nights', $new_nights);
        $updated++;
    }

    $redirect = add_query_arg([
        'chama_ops_notice'          => 'stay_nights_rebuilt',
        'chama_ops_nights_updated'  => $updated,
        'chama_ops_nights_cleared'  => $cleared,
        'chama_ops_nights_unchanged' => $unchanged,
        'chama_ops_nights_scanned'  => count($stay_ids),
    ], wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview'));

    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_rebuild_stay_nights', 'chama_ops_rebuild_stay_nights');

/**
 * Normalize all stored guest phone values into the standard display format.
 */
function chama_ops_normalize_guest_phones(): void
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permission to normalize guest phones.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_normalize_guest_phones_action', 'chama_ops_normalize_guest_phones_nonce');

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
        $existing_phone = (string) get_post_meta($guest_id, '_chama_guest_phone', true);
        $formatted      = chama_ops_format_guest_phone($existing_phone);

        if ($formatted === $existing_phone) {
            $unchanged++;
            continue;
        }

        update_post_meta($guest_id, '_chama_guest_phone', $formatted);
        $updated++;
    }

    $redirect = add_query_arg([
        'chama_ops_notice'         => 'guest_phones_normalized',
        'chama_ops_phone_updated'  => $updated,
        'chama_ops_phone_unchanged' => $unchanged,
        'chama_ops_phone_scanned'  => count($guest_ids),
    ], wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview'));

    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_normalize_guest_phones', 'chama_ops_normalize_guest_phones');

/**
 * Send shared CSV response headers.
 *
 * @param string $filename Download file name.
 */
function chama_ops_send_csv_headers(string $filename): void
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
function chama_ops_prepare_csv_text(string $value): string
{
    return html_entity_decode(wp_strip_all_tags($value), ENT_QUOTES, 'UTF-8');
}

/**
 * Export all guest records to CSV.
 */
function chama_ops_export_guests_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export guests.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_export_guests_csv_action', 'chama_ops_export_guests_csv_nonce');

    $guests = get_posts([
        'post_type'      => 'guest',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $filename = 'chama-ops-guests-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
        $email             = (string) get_post_meta($guest_id, '_chama_guest_email', true);
        $phone             = (string) get_post_meta($guest_id, '_chama_guest_phone', true);
        $contact_ready     = chama_ops_is_guest_contact_ready($guest_id);
        $missing_email     = trim($email) === '';
        $missing_phone     = trim($phone) === '';
        $source_key        = (string) get_post_meta($guest_id, '_chama_guest_marketing_source', true);
        $preferred_room    = (string) get_post_meta($guest_id, '_chama_guest_preferred_room', true);
        $vip               = (string) get_post_meta($guest_id, '_chama_guest_vip', true);
        $marketing_consent = (string) get_post_meta($guest_id, '_chama_guest_marketing_consent', true);

        fputcsv($output, [
            $guest_id,
            chama_ops_prepare_csv_text((string) $guest_post->post_title),
            $email,
            $phone,
            $contact_ready ? 'Yes' : 'No',
            $missing_email ? 'Yes' : 'No',
            $missing_phone ? 'Yes' : 'No',
            $source_key !== '' ? chama_ops_format_guest_source_label($source_key) : 'N/A',
            $preferred_room,
            $vip === '1' ? 'Yes' : 'No',
            $marketing_consent === '1' ? 'Yes' : 'No',
            get_the_date('Y-m-d', $guest_id),
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_guests_csv', 'chama_ops_export_guests_csv');

/**
 * Export guest records that are missing email or phone.
 */
function chama_ops_export_missing_contact_guests_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export guests.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_missing_contact_guests_csv_action',
        'chama_ops_export_missing_contact_guests_csv_nonce'
    );

    $guest_ids = chama_ops_get_guest_missing_contact_ids();
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

    $filename = 'chama-ops-guests-missing-contact-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
        $email             = (string) get_post_meta($guest_id, '_chama_guest_email', true);
        $phone             = (string) get_post_meta($guest_id, '_chama_guest_phone', true);
        $missing_email     = trim($email) === '';
        $missing_phone     = trim($phone) === '';
        $source_key        = (string) get_post_meta($guest_id, '_chama_guest_marketing_source', true);
        $preferred_room    = (string) get_post_meta($guest_id, '_chama_guest_preferred_room', true);
        $vip               = (string) get_post_meta($guest_id, '_chama_guest_vip', true);
        $marketing_consent = (string) get_post_meta($guest_id, '_chama_guest_marketing_consent', true);

        fputcsv($output, [
            $guest_id,
            chama_ops_prepare_csv_text((string) $guest_post->post_title),
            $email,
            $phone,
            $missing_email ? 'Yes' : 'No',
            $missing_phone ? 'Yes' : 'No',
            $source_key !== '' ? chama_ops_format_guest_source_label($source_key) : 'N/A',
            $preferred_room,
            $vip === '1' ? 'Yes' : 'No',
            $marketing_consent === '1' ? 'Yes' : 'No',
            get_the_date('Y-m-d', $guest_id),
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_missing_contact_guests_csv', 'chama_ops_export_missing_contact_guests_csv');

/**
 * Export a compact data-quality snapshot with queue links.
 */
function chama_ops_export_data_quality_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export data quality snapshots.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_data_quality_snapshot_csv_action',
        'chama_ops_export_data_quality_snapshot_csv_nonce'
    );

    $metrics               = chama_ops_get_data_quality_metrics();
    $action_links          = chama_ops_get_overview_action_links();
    $guest_missing_contact = count(chama_ops_get_guest_missing_contact_ids());

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

    $filename = 'chama-ops-data-quality-snapshot-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
    }

    fputcsv($output, ['Issue', 'Count', 'Queue URL']);

    foreach ($rows as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_data_quality_snapshot_csv', 'chama_ops_export_data_quality_snapshot_csv');

/**
 * Export a compact same-day operations snapshot with queue links.
 */
function chama_ops_export_today_ops_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export today operations snapshots.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_today_ops_snapshot_csv_action',
        'chama_ops_export_today_ops_snapshot_csv_nonce'
    );

    $metrics      = chama_ops_get_today_operations_metrics();
    $action_links = chama_ops_get_overview_action_links();

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

    $filename = 'chama-ops-today-ops-snapshot-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
    }

    fputcsv($output, ['Metric', 'Value', 'Queue URL']);

    foreach ($rows as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_today_ops_snapshot_csv', 'chama_ops_export_today_ops_snapshot_csv');

/**
 * Export prioritized Action Board recommendations.
 */
function chama_ops_export_action_board_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export Action Board snapshots.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_action_board_snapshot_csv_action',
        'chama_ops_export_action_board_snapshot_csv_nonce'
    );

    $stay_status_summary  = chama_ops_get_stay_status_summary();
    $pipeline_metrics     = chama_ops_get_pipeline_metrics($stay_status_summary);
    $action_links         = chama_ops_get_overview_action_links();
    $data_quality_metrics = chama_ops_get_data_quality_metrics();
    $today_ops_metrics    = chama_ops_get_today_operations_metrics();
    $recommendations      = chama_ops_get_operational_recommendations(
        $pipeline_metrics,
        $data_quality_metrics,
        $today_ops_metrics,
        $action_links
    );

    $filename = 'chama-ops-action-board-snapshot-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
add_action('admin_post_chama_ops_export_action_board_snapshot_csv', 'chama_ops_export_action_board_snapshot_csv');

/**
 * Export upcoming-arrivals readiness snapshot.
 */
function chama_ops_export_upcoming_arrivals_snapshot_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export upcoming arrivals snapshots.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_upcoming_arrivals_snapshot_csv_action',
        'chama_ops_export_upcoming_arrivals_snapshot_csv_nonce'
    );

    $upcoming_arrivals = chama_ops_get_upcoming_arrivals(14, 200);

    $filename = 'chama-ops-upcoming-arrivals-snapshot-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
            isset($arrival['stay_title']) ? chama_ops_prepare_csv_text((string) $arrival['stay_title']) : '',
            isset($arrival['stay_link']) ? html_entity_decode((string) $arrival['stay_link'], ENT_QUOTES, 'UTF-8') : '',
            isset($arrival['guest_name']) ? chama_ops_prepare_csv_text((string) $arrival['guest_name']) : '',
            isset($arrival['guest_link']) ? html_entity_decode((string) $arrival['guest_link'], ENT_QUOTES, 'UTF-8') : '',
            isset($arrival['check_in']) ? (string) $arrival['check_in'] : '',
            isset($arrival['check_out']) ? (string) $arrival['check_out'] : '',
            isset($arrival['nights']) ? (int) $arrival['nights'] : '',
            isset($arrival['status']) ? chama_ops_format_stay_status_label((string) $arrival['status']) : '',
            !empty($arrival['is_ready']) ? 'Ready' : 'Needs Attention',
            $issues,
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_upcoming_arrivals_snapshot_csv', 'chama_ops_export_upcoming_arrivals_snapshot_csv');

/**
 * Export all stay records to CSV.
 */
function chama_ops_export_stays_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export stays.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer('chama_ops_export_stays_csv_action', 'chama_ops_export_stays_csv_nonce');

    $stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => -1,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $filename = 'chama-ops-stays-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
        $guest_id          = (int) get_post_meta($stay_id, '_chama_stay_guest_id', true);
        $check_in          = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out         = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);
        $nights            = (int) get_post_meta($stay_id, '_chama_stay_nights', true);
        $status            = (string) get_post_meta($stay_id, '_chama_stay_status', true);
        $revenue           = (string) get_post_meta($stay_id, '_chama_stay_revenue', true);
        $revenue_per_night = $nights > 0 ? chama_ops_calculate_revenue_per_night($revenue, $nights) : null;
        $guest_name        = $guest_id > 0 ? get_the_title($guest_id) : 'N/A';
        $is_booked         = $status === 'booked';
        $in_window_48h     = $is_booked && chama_ops_is_check_in_within_next_48h($check_in);
        $contact_ready     = $guest_id > 0 && chama_ops_is_guest_contact_ready($guest_id);
        $contact_gap_48h   = $in_window_48h && !$contact_ready;

        fputcsv($output, [
            $stay_id,
            chama_ops_prepare_csv_text((string) $stay_post->post_title),
            $guest_id > 0 ? $guest_id : '',
            chama_ops_prepare_csv_text((string) $guest_name),
            $check_in,
            $check_out,
            $nights > 0 ? $nights : '',
            $status !== '' ? chama_ops_format_stay_status_label($status) : 'N/A',
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
add_action('admin_post_chama_ops_export_stays_csv', 'chama_ops_export_stays_csv');

/**
 * Export next-48h arrival contact gaps to CSV.
 */
function chama_ops_export_arrival_contact_gaps_csv(): void
{
    if (!current_user_can('edit_posts')) {
        wp_die(esc_html__('You do not have permission to export arrival contact gaps.', 'chama-ops'), '', ['response' => 403]);
    }

    check_admin_referer(
        'chama_ops_export_arrival_contact_gaps_csv_action',
        'chama_ops_export_arrival_contact_gaps_csv_nonce'
    );

    $gap_stay_ids = chama_ops_get_arrival_contact_gap_stay_ids(1);

    $filename = 'chama-ops-arrival-contact-gaps-48h-' . wp_date('Ymd-His') . '.csv';
    chama_ops_send_csv_headers($filename);

    $output = fopen('php://output', 'w');

    if ($output === false) {
        wp_die(esc_html__('Unable to open CSV output stream.', 'chama-ops'), '', ['response' => 500]);
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
        $guest_id     = (int) get_post_meta($stay_id, '_chama_stay_guest_id', true);
        $check_in     = (string) get_post_meta($stay_id, '_chama_stay_check_in', true);
        $check_out    = (string) get_post_meta($stay_id, '_chama_stay_check_out', true);
        $status       = (string) get_post_meta($stay_id, '_chama_stay_status', true);
        $guest_name   = $guest_id > 0 ? get_the_title($guest_id) : 'N/A';
        $guest_email  = $guest_id > 0 ? trim((string) get_post_meta($guest_id, '_chama_guest_email', true)) : '';
        $guest_phone  = $guest_id > 0 ? trim((string) get_post_meta($guest_id, '_chama_guest_phone', true)) : '';
        $missing_mail = $guest_email === '';
        $missing_tel  = $guest_phone === '';

        if (!$stay_post instanceof WP_Post) {
            continue;
        }

        fputcsv($output, [
            $stay_id,
            chama_ops_prepare_csv_text((string) $stay_post->post_title),
            $check_in,
            $check_out,
            $guest_id > 0 ? $guest_id : '',
            chama_ops_prepare_csv_text((string) $guest_name),
            $guest_email,
            $guest_phone,
            $missing_mail ? 'Yes' : 'No',
            $missing_tel ? 'Yes' : 'No',
            $status !== '' ? chama_ops_format_stay_status_label($status) : 'N/A',
        ]);
    }

    fclose($output);
    exit;
}
add_action('admin_post_chama_ops_export_arrival_contact_gaps_csv', 'chama_ops_export_arrival_contact_gaps_csv');

/**
 * Render custom filters on Guest and Stay list screens.
 *
 * @param string $post_type Current post type.
 * @param string $which     Table nav location.
 */
function chama_ops_render_admin_filters(string $post_type, string $which): void
{
    if ($which !== 'top') {
        return;
    }

    if ($post_type === 'guest') {
        $selected_source = isset($_GET['chama_guest_source']) ? sanitize_text_field(wp_unslash($_GET['chama_guest_source'])) : '';
        $selected_quality = isset($_GET['chama_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['chama_guest_quality'])) : '';
        $selected_origin = isset($_GET['chama_data_origin']) ? sanitize_text_field(wp_unslash($_GET['chama_data_origin'])) : '';
        ?>
        <label class="screen-reader-text" for="chama_guest_source"><?php esc_html_e('Filter guests by source', 'chama-ops'); ?></label>
        <select name="chama_guest_source" id="chama_guest_source">
            <option value=""><?php esc_html_e('All Sources', 'chama-ops'); ?></option>
            <option value="direct" <?php selected($selected_source, 'direct'); ?>><?php esc_html_e('Direct', 'chama-ops'); ?></option>
            <option value="google" <?php selected($selected_source, 'google'); ?>><?php esc_html_e('Google Search', 'chama-ops'); ?></option>
            <option value="referral" <?php selected($selected_source, 'referral'); ?>><?php esc_html_e('Referral', 'chama-ops'); ?></option>
            <option value="social" <?php selected($selected_source, 'social'); ?>><?php esc_html_e('Social Media', 'chama-ops'); ?></option>
            <option value="repeat" <?php selected($selected_source, 'repeat'); ?>><?php esc_html_e('Repeat Guest', 'chama-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="chama_guest_quality"><?php esc_html_e('Filter guests by quality issue', 'chama-ops'); ?></label>
        <select name="chama_guest_quality" id="chama_guest_quality">
            <option value=""><?php esc_html_e('All Data Quality States', 'chama-ops'); ?></option>
            <option value="missing_contact" <?php selected($selected_quality, 'missing_contact'); ?>><?php esc_html_e('Missing Contact (Email or Phone)', 'chama-ops'); ?></option>
            <option value="missing_email" <?php selected($selected_quality, 'missing_email'); ?>><?php esc_html_e('Missing Email', 'chama-ops'); ?></option>
            <option value="missing_phone" <?php selected($selected_quality, 'missing_phone'); ?>><?php esc_html_e('Missing Phone', 'chama-ops'); ?></option>
            <option value="missing_consent" <?php selected($selected_quality, 'missing_consent'); ?>><?php esc_html_e('Missing Consent', 'chama-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="chama_data_origin"><?php esc_html_e('Filter records by origin', 'chama-ops'); ?></label>
        <select name="chama_data_origin" id="chama_data_origin">
            <option value=""><?php esc_html_e('All Record Origins', 'chama-ops'); ?></option>
            <option value="sample" <?php selected($selected_origin, 'sample'); ?>><?php esc_html_e('Sample Only', 'chama-ops'); ?></option>
            <option value="persistent" <?php selected($selected_origin, 'persistent'); ?>><?php esc_html_e('Persistent Only', 'chama-ops'); ?></option>
        </select>
        <?php
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['chama_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_status_filter'])) : '';
        $selected_quality = isset($_GET['chama_stay_quality']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_quality'])) : '';
        $selected_today = isset($_GET['chama_stay_today']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_today'])) : '';
        $selected_origin = isset($_GET['chama_data_origin']) ? sanitize_text_field(wp_unslash($_GET['chama_data_origin'])) : '';
        ?>
        <label class="screen-reader-text" for="chama_stay_status_filter"><?php esc_html_e('Filter stays by status', 'chama-ops'); ?></label>
        <select name="chama_stay_status_filter" id="chama_stay_status_filter">
            <option value=""><?php esc_html_e('All Statuses', 'chama-ops'); ?></option>
            <option value="lead" <?php selected($selected_status, 'lead'); ?>><?php esc_html_e('Lead', 'chama-ops'); ?></option>
            <option value="booked" <?php selected($selected_status, 'booked'); ?>><?php esc_html_e('Booked', 'chama-ops'); ?></option>
            <option value="checked_in" <?php selected($selected_status, 'checked_in'); ?>><?php esc_html_e('Checked In', 'chama-ops'); ?></option>
            <option value="checked_out" <?php selected($selected_status, 'checked_out'); ?>><?php esc_html_e('Checked Out', 'chama-ops'); ?></option>
            <option value="cancelled" <?php selected($selected_status, 'cancelled'); ?>><?php esc_html_e('Cancelled', 'chama-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="chama_stay_quality"><?php esc_html_e('Filter stays by quality issue', 'chama-ops'); ?></label>
        <select name="chama_stay_quality" id="chama_stay_quality">
            <option value=""><?php esc_html_e('All Data Quality States', 'chama-ops'); ?></option>
            <option value="missing_guest_link" <?php selected($selected_quality, 'missing_guest_link'); ?>><?php esc_html_e('Missing Guest Link', 'chama-ops'); ?></option>
            <option value="missing_dates" <?php selected($selected_quality, 'missing_dates'); ?>><?php esc_html_e('Missing Dates', 'chama-ops'); ?></option>
            <option value="invalid_date_range" <?php selected($selected_quality, 'invalid_date_range'); ?>><?php esc_html_e('Invalid Date Range', 'chama-ops'); ?></option>
            <option value="missing_revenue" <?php selected($selected_quality, 'missing_revenue'); ?>><?php esc_html_e('Missing Revenue', 'chama-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="chama_stay_today"><?php esc_html_e('Filter stays by today operations', 'chama-ops'); ?></label>
        <select name="chama_stay_today" id="chama_stay_today">
            <option value=""><?php esc_html_e('All Today States', 'chama-ops'); ?></option>
            <option value="arrivals" <?php selected($selected_today, 'arrivals'); ?>><?php esc_html_e('Arrivals Today', 'chama-ops'); ?></option>
            <option value="arrivals_next_48h" <?php selected($selected_today, 'arrivals_next_48h'); ?>><?php esc_html_e('Booked Arrivals (48h)', 'chama-ops'); ?></option>
            <option value="arrivals_contact_ready" <?php selected($selected_today, 'arrivals_contact_ready'); ?>><?php esc_html_e('Arrival Contact Ready (48h)', 'chama-ops'); ?></option>
            <option value="departures" <?php selected($selected_today, 'departures'); ?>><?php esc_html_e('Departures Today', 'chama-ops'); ?></option>
            <option value="in_house" <?php selected($selected_today, 'in_house'); ?>><?php esc_html_e('In-House Tonight', 'chama-ops'); ?></option>
            <option value="overdue_arrivals" <?php selected($selected_today, 'overdue_arrivals'); ?>><?php esc_html_e('Overdue Arrivals', 'chama-ops'); ?></option>
            <option value="arrivals_contact_gap" <?php selected($selected_today, 'arrivals_contact_gap'); ?>><?php esc_html_e('Arrival Contact Gaps (48h)', 'chama-ops'); ?></option>
        </select>
        <label class="screen-reader-text" for="chama_data_origin"><?php esc_html_e('Filter records by origin', 'chama-ops'); ?></label>
        <select name="chama_data_origin" id="chama_data_origin">
            <option value=""><?php esc_html_e('All Record Origins', 'chama-ops'); ?></option>
            <option value="sample" <?php selected($selected_origin, 'sample'); ?>><?php esc_html_e('Sample Only', 'chama-ops'); ?></option>
            <option value="persistent" <?php selected($selected_origin, 'persistent'); ?>><?php esc_html_e('Persistent Only', 'chama-ops'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'chama_ops_render_admin_filters', 10, 2);

/**
 * Apply custom admin list filters to Guest and Stay queries.
 *
 * @param WP_Query $query The current query.
 */
function chama_ops_apply_admin_filters(WP_Query $query): void
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $post_type = $query->get('post_type');

    if ($post_type === 'guest') {
        $selected_source = isset($_GET['chama_guest_source']) ? sanitize_text_field(wp_unslash($_GET['chama_guest_source'])) : '';
        $selected_quality = isset($_GET['chama_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['chama_guest_quality'])) : '';
        $selected_origin = isset($_GET['chama_data_origin']) ? sanitize_text_field(wp_unslash($_GET['chama_data_origin'])) : '';

        if ($selected_source !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_chama_guest_marketing_source',
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
                            'key'     => '_chama_guest_email',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_chama_guest_email',
                            'value'   => '',
                            'compare' => '=',
                        ],
                    ],
                    [
                        'relation' => 'OR',
                        [
                            'key'     => '_chama_guest_phone',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_chama_guest_phone',
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
                        'key'     => '_chama_guest_email',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_guest_email',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_phone') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_chama_guest_phone',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_guest_phone',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_consent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_chama_guest_marketing_consent',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_guest_marketing_consent',
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
                    'key'   => '_chama_ops_sample_data',
                    'value' => '1',
                ];
            }

            if ($selected_origin === 'persistent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_chama_ops_sample_data',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_ops_sample_data',
                        'value'   => '1',
                        'compare' => '!=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['chama_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_status_filter'])) : '';
        $selected_quality = isset($_GET['chama_stay_quality']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_quality'])) : '';
        $selected_today = isset($_GET['chama_stay_today']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_today'])) : '';
        $selected_origin = isset($_GET['chama_data_origin']) ? sanitize_text_field(wp_unslash($_GET['chama_data_origin'])) : '';

        if ($selected_status !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_chama_stay_status',
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
                        'key'     => '_chama_stay_guest_id',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_stay_guest_id',
                        'value'   => '',
                        'compare' => '=',
                    ],
                    [
                        'key'     => '_chama_stay_guest_id',
                        'value'   => '0',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'missing_dates') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_chama_stay_check_in',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_stay_check_in',
                        'value'   => '',
                        'compare' => '=',
                    ],
                    [
                        'key'     => '_chama_stay_check_out',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_stay_check_out',
                        'value'   => '',
                        'compare' => '=',
                    ],
                ];
            }

            if ($selected_quality === 'invalid_date_range') {
                $meta_query[] = [
                    [
                        'key'     => '_chama_stay_check_in',
                        'value'   => '',
                        'compare' => '!=',
                    ],
                    [
                        'key'     => '_chama_stay_check_out',
                        'value'   => '',
                        'compare' => '!=',
                    ],
                    [
                        'relation' => 'OR',
                        [
                            'key'     => '_chama_stay_nights',
                            'compare' => 'NOT EXISTS',
                        ],
                        [
                            'key'     => '_chama_stay_nights',
                            'value'   => '',
                            'compare' => '=',
                        ],
                        [
                            'key'     => '_chama_stay_nights',
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
                        'key'     => '_chama_stay_revenue',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_stay_revenue',
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
                    'key'     => '_chama_stay_check_in',
                    'value'   => $today,
                    'compare' => '=',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'arrivals_next_48h') {
                $meta_query[] = [
                    'key'   => '_chama_stay_status',
                    'value' => 'booked',
                ];
                $meta_query[] = [
                    'key'     => '_chama_stay_check_in',
                    'value'   => [$today, $tomorrow],
                    'compare' => 'BETWEEN',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'departures') {
                $meta_query[] = [
                    'key'     => '_chama_stay_check_out',
                    'value'   => $today,
                    'compare' => '=',
                    'type'    => 'DATE',
                ];
            }

            if ($selected_today === 'in_house') {
                $meta_query[] = [
                    'relation' => 'AND',
                    [
                        'key'     => '_chama_stay_check_in',
                        'value'   => $today,
                        'compare' => '<=',
                        'type'    => 'DATE',
                    ],
                    [
                        'key'     => '_chama_stay_check_out',
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
                        'key'     => '_chama_stay_check_in',
                        'value'   => $today,
                        'compare' => '<',
                        'type'    => 'DATE',
                    ],
                    [
                        'key'     => '_chama_stay_check_out',
                        'value'   => $today,
                        'compare' => '>',
                        'type'    => 'DATE',
                    ],
                ];
            }

            if ($selected_today === 'arrivals_contact_gap') {
                $gap_ids = chama_ops_get_arrival_contact_gap_stay_ids(1);
                $query->set('post__in', !empty($gap_ids) ? $gap_ids : [0]);
            }

            if ($selected_today === 'arrivals_contact_ready') {
                $arrival_ids = chama_ops_get_booked_arrival_stay_ids(1);
                $gap_ids     = chama_ops_get_arrival_contact_gap_stay_ids(1);
                $ready_ids   = array_values(array_diff($arrival_ids, $gap_ids));

                $query->set('post__in', !empty($ready_ids) ? array_map('intval', $ready_ids) : [0]);
            }

            $query->set('meta_query', $meta_query);
        }

        if ($selected_origin !== '') {
            $meta_query = (array) $query->get('meta_query');

            if ($selected_origin === 'sample') {
                $meta_query[] = [
                    'key'   => '_chama_ops_sample_data',
                    'value' => '1',
                ];
            }

            if ($selected_origin === 'persistent') {
                $meta_query[] = [
                    'relation' => 'OR',
                    [
                        'key'     => '_chama_ops_sample_data',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key'     => '_chama_ops_sample_data',
                        'value'   => '1',
                        'compare' => '!=',
                    ],
                ];
            }

            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'chama_ops_apply_admin_filters');

/**
 * Render contextual admin notices for today-operations stay filters.
 */
function chama_ops_render_stay_filter_context_notice(): void
{
    if (!is_admin() || !function_exists('get_current_screen')) {
        return;
    }

    $screen = get_current_screen();

    if (!$screen || $screen->base !== 'edit' || $screen->post_type !== 'stay') {
        return;
    }

    $selected_today = isset($_GET['chama_stay_today']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_today'])) : '';

    if ($selected_today === '') {
        return;
    }

    $arrivals_next_48h  = count(chama_ops_get_booked_arrival_stay_ids(1));
    $contact_gap_count  = count(chama_ops_get_arrival_contact_gap_stay_ids(1));
    $contact_ready_count = max(0, $arrivals_next_48h - $contact_gap_count);
    $stay_list_url      = admin_url('edit.php?post_type=stay');
    $ready_url          = add_query_arg([
        'chama_stay_today'         => 'arrivals_contact_ready',
        'chama_stay_status_filter' => 'booked',
    ], $stay_list_url);
    $gap_url            = add_query_arg([
        'chama_stay_today'         => 'arrivals_contact_gap',
        'chama_stay_status_filter' => 'booked',
    ], $stay_list_url);

    if ($arrivals_next_48h === 0) {
        echo '<div class="notice notice-info is-dismissible"><p>';
        esc_html_e('No booked arrivals are scheduled in the next 48 hours.', 'chama-ops');
        echo '</p></div>';
        return;
    }

    if ($selected_today === 'arrivals_contact_gap') {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: number of contact-gap stays, 2: total booked arrivals in 48h, 3: opening anchor tag, 4: closing anchor tag. */
                __('%1$d of %2$d booked arrivals in the next 48 hours are missing contact readiness. %3$sView contact-ready queue%4$s.', 'chama-ops')
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
                __('%1$d of %2$d booked arrivals in the next 48 hours are contact-ready. %3$sView contact-gap queue%4$s.', 'chama-ops')
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
                __('%1$d booked arrivals are scheduled in the next 48 hours: %2$d ready, %3$d with contact gaps. %4$sReady queue%5$s | %6$sGap queue%7$s.', 'chama-ops')
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
add_action('admin_notices', 'chama_ops_render_stay_filter_context_notice');

/**
 * Render contextual admin notices for guest quality filters.
 */
function chama_ops_render_guest_filter_context_notice(): void
{
    if (!is_admin() || !function_exists('get_current_screen')) {
        return;
    }

    $screen = get_current_screen();

    if (!$screen || $screen->base !== 'edit' || $screen->post_type !== 'guest') {
        return;
    }

    $selected_quality = isset($_GET['chama_guest_quality']) ? sanitize_text_field(wp_unslash($_GET['chama_guest_quality'])) : '';

    if ($selected_quality === '') {
        return;
    }

    $metrics               = chama_ops_get_data_quality_metrics();
    $missing_contact_count = count(chama_ops_get_guest_missing_contact_ids());
    $guest_list_url        = admin_url('edit.php?post_type=guest');
    $missing_contact_url   = add_query_arg('chama_guest_quality', 'missing_contact', $guest_list_url);
    $missing_email_url     = add_query_arg('chama_guest_quality', 'missing_email', $guest_list_url);
    $missing_phone_url     = add_query_arg('chama_guest_quality', 'missing_phone', $guest_list_url);
    $export_url            = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_export_missing_contact_guests_csv'),
        'chama_ops_export_missing_contact_guests_csv_action',
        'chama_ops_export_missing_contact_guests_csv_nonce'
    );

    if ($selected_quality === 'missing_contact') {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        printf(
            wp_kses_post(
                /* translators: 1: missing-contact guest count, 2: opening anchor tag to missing-email queue, 3: closing anchor tag, 4: opening anchor tag to missing-phone queue, 5: closing anchor tag, 6: opening anchor tag to export URL, 7: closing anchor tag. */
                __('%1$d guest profiles are missing at least one contact field. %2$sMissing email queue%3$s | %4$sMissing phone queue%5$s | %6$sExport outreach file%7$s.', 'chama-ops')
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
                __('%1$d guest profiles are missing email. %2$sView full missing-contact queue%3$s.', 'chama-ops')
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
                __('%1$d guest profiles are missing phone. %2$sView full missing-contact queue%3$s.', 'chama-ops')
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
                __('%d guest profiles are missing marketing consent.', 'chama-ops')
            ),
            (int) $metrics['guest_missing_consent']
        );
        echo '</p></div>';
    }
}
add_action('admin_notices', 'chama_ops_render_guest_filter_context_notice');

/**
 * Auto-format guest phone input on admin edit screens.
 */
function chama_ops_render_guest_phone_format_script(): void
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
        var input = document.getElementById('chama_guest_phone');

        if (!input) {
            return;
        }

        var formatChamaGuestPhone = function (rawValue) {
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
            input.value = formatChamaGuestPhone(input.value);
        };

        input.addEventListener('blur', applyPhoneFormat);
        input.addEventListener('change', applyPhoneFormat);
    }());
    </script>
    <?php
}
add_action('admin_print_footer_scripts', 'chama_ops_render_guest_phone_format_script');

/**
 * Return available room service menu items.
 *
 * @return WP_Post[]
 */
function chama_ops_get_available_room_service_items(): array
{
    $items = get_posts([
        'post_type'      => 'room_service_item',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    if (!is_array($items)) {
        return [];
    }

    return array_values(array_filter($items, static function ($item): bool {
        if (!$item instanceof WP_Post) {
            return false;
        }

        return (string) get_post_meta((int) $item->ID, '_chama_room_service_available', true) === '1';
    }));
}

/**
 * Render guest room-service app shortcode.
 *
 * Usage: [chama_room_service_app]
 *
 * @return string
 */
function chama_ops_render_room_service_app_shortcode(): string
{
    $items = chama_ops_get_available_room_service_items();
    $notice_key = isset($_GET['chama_room_service']) ? sanitize_key((string) wp_unslash($_GET['chama_room_service'])) : '';
    $order_ref  = isset($_GET['chama_room_service_order']) ? absint($_GET['chama_room_service_order']) : 0;

    ob_start();
    ?>
    <section class="chama-room-service-app" style="margin:0 auto;max-width:1080px;">
        <?php if ($notice_key === 'submitted' && $order_ref > 0) : ?>
            <div style="border:1px solid #b7d8c0;background:#ecf8ef;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php
                printf(
                    esc_html__('Order submitted. Reference #%d. Front desk will keep you updated.', 'chama-ops'),
                    $order_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'invalid_item') : ?>
            <div style="border:1px solid #e2b3b0;background:#fff2f2;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php esc_html_e('That menu item is currently unavailable. Please choose another item.', 'chama-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'missing_room') : ?>
            <div style="border:1px solid #e2b3b0;background:#fff2f2;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php esc_html_e('Please add a room number before submitting your order.', 'chama-ops'); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($items)) : ?>
            <p><?php esc_html_e('Room service menu is currently being updated. Please contact the front desk.', 'chama-ops'); ?></p>
        <?php else : ?>
            <div class="chama-order-grid">
                <?php foreach ($items as $item) : ?>
                    <?php
                    $item_id      = (int) $item->ID;
                    $price        = (string) get_post_meta($item_id, '_chama_room_service_price', true);
                    $prep_minutes = (int) get_post_meta($item_id, '_chama_room_service_prep_minutes', true);
                    ?>
                    <article class="chama-order-card">
                        <h3><?php echo esc_html((string) $item->post_title); ?></h3>
                        <?php if (trim((string) $item->post_content) !== '') : ?>
                            <p class="chama-order-meta"><?php echo esc_html(wp_strip_all_tags((string) $item->post_content)); ?></p>
                        <?php endif; ?>
                        <?php if ($price !== '') : ?>
                            <p class="chama-order-price">
                                <?php
                                printf(
                                    esc_html__('$%s', 'chama-ops'),
                                    esc_html(number_format((float) $price, 2))
                                );
                                ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($prep_minutes > 0) : ?>
                            <p class="chama-order-meta">
                                <?php
                                printf(
                                    esc_html__('Estimated prep: %d min', 'chama-ops'),
                                    $prep_minutes
                                );
                                ?>
                            </p>
                        <?php endif; ?>

                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:10px;">
                            <?php wp_nonce_field('chama_ops_submit_room_service_order_action', 'chama_ops_submit_room_service_order_nonce'); ?>
                            <input type="hidden" name="action" value="chama_ops_submit_room_service_order">
                            <input type="hidden" name="chama_room_service_item_id" value="<?php echo esc_attr((string) $item_id); ?>">

                            <p style="margin:0 0 8px;">
                                <label>
                                    <?php esc_html_e('Room', 'chama-ops'); ?><br>
                                    <input type="text" name="chama_room_service_room" required style="width:100%;">
                                </label>
                            </p>
                            <p style="margin:0 0 8px;">
                                <label>
                                    <?php esc_html_e('Qty', 'chama-ops'); ?><br>
                                    <input type="number" name="chama_room_service_qty" min="1" step="1" value="1" required style="width:100%;">
                                </label>
                            </p>
                            <p style="margin:0 0 8px;">
                                <label>
                                    <?php esc_html_e('Name (optional)', 'chama-ops'); ?><br>
                                    <input type="text" name="chama_room_service_guest_name" style="width:100%;">
                                </label>
                            </p>
                            <p style="margin:0 0 8px;">
                                <label>
                                    <?php esc_html_e('Phone (optional)', 'chama-ops'); ?><br>
                                    <input type="text" name="chama_room_service_guest_phone" style="width:100%;">
                                </label>
                            </p>
                            <p style="margin:0 0 10px;">
                                <label>
                                    <?php esc_html_e('Notes (optional)', 'chama-ops'); ?><br>
                                    <textarea name="chama_room_service_notes" rows="2" style="width:100%;"></textarea>
                                </label>
                            </p>
                            <button type="submit" class="wp-element-button" style="width:100%;"><?php esc_html_e('Add and Submit', 'chama-ops'); ?></button>
                        </form>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <?php
    return (string) ob_get_clean();
}
add_shortcode('chama_room_service_app', 'chama_ops_render_room_service_app_shortcode');

/**
 * Handle front-end room service order submissions.
 */
function chama_ops_submit_room_service_order(): void
{
    check_admin_referer('chama_ops_submit_room_service_order_action', 'chama_ops_submit_room_service_order_nonce');

    $item_id = isset($_POST['chama_room_service_item_id']) ? absint(wp_unslash($_POST['chama_room_service_item_id'])) : 0;
    $room    = isset($_POST['chama_room_service_room']) ? sanitize_text_field(wp_unslash($_POST['chama_room_service_room'])) : '';
    $qty     = isset($_POST['chama_room_service_qty']) ? max(1, absint(wp_unslash($_POST['chama_room_service_qty']))) : 1;
    $name    = isset($_POST['chama_room_service_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_room_service_guest_name'])) : '';
    $phone   = isset($_POST['chama_room_service_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_room_service_guest_phone'])) : '';
    $notes   = isset($_POST['chama_room_service_notes']) ? sanitize_textarea_field(wp_unslash($_POST['chama_room_service_notes'])) : '';

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = (string) home_url('/');
    }

    if ($room === '') {
        wp_safe_redirect(add_query_arg('chama_room_service', 'missing_room', $redirect_url));
        exit;
    }

    $item_post = get_post($item_id);

    if (!$item_post instanceof WP_Post || $item_post->post_type !== 'room_service_item') {
        wp_safe_redirect(add_query_arg('chama_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    $is_available = (string) get_post_meta($item_id, '_chama_room_service_available', true) === '1';

    if (!$is_available) {
        wp_safe_redirect(add_query_arg('chama_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    $price_raw = (string) get_post_meta($item_id, '_chama_room_service_price', true);
    $price     = $price_raw !== '' ? (float) $price_raw : 0.0;
    $total     = number_format($price * $qty, 2, '.', '');
    $order_note_lines = [];

    if ($name !== '') {
        $order_note_lines[] = sprintf(__('Guest Name: %s', 'chama-ops'), $name);
    }

    if ($phone !== '') {
        $order_note_lines[] = sprintf(__('Guest Phone: %s', 'chama-ops'), $phone);
    }

    if ($notes !== '') {
        $order_note_lines[] = sprintf(__('Notes: %s', 'chama-ops'), $notes);
    }

    $order_content = implode("\n", $order_note_lines);
    $order_title   = sprintf(
        __('Room %1$s - %2$s x%3$d', 'chama-ops'),
        $room,
        (string) $item_post->post_title,
        $qty
    );

    $order_id = wp_insert_post([
        'post_type'    => 'room_service_order',
        'post_status'  => 'publish',
        'post_title'   => $order_title,
        'post_content' => $order_content,
    ], true);

    if (is_wp_error($order_id) || (int) $order_id <= 0) {
        wp_safe_redirect(add_query_arg('chama_room_service', 'invalid_item', $redirect_url));
        exit;
    }

    update_post_meta((int) $order_id, '_chama_order_item_id', $item_id);
    update_post_meta((int) $order_id, '_chama_order_quantity', $qty);
    update_post_meta((int) $order_id, '_chama_order_room_number', $room);
    update_post_meta((int) $order_id, '_chama_order_guest_name', $name);
    update_post_meta((int) $order_id, '_chama_order_guest_phone', $phone);
    update_post_meta((int) $order_id, '_chama_order_total', $total);
    update_post_meta((int) $order_id, '_chama_order_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'chama_room_service'       => 'submitted',
        'chama_room_service_order' => (int) $order_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_chama_ops_submit_room_service_order', 'chama_ops_submit_room_service_order');
add_action('admin_post_chama_ops_submit_room_service_order', 'chama_ops_submit_room_service_order');

/**
 * Resolve a front-end page URL by slug with fallback.
 *
 * @param string $slug Page slug.
 * @param string $fallback_path Fallback path.
 */
function chama_ops_get_guest_page_url(string $slug, string $fallback_path): string
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
 * Render guest action grid shortcode.
 *
 * Usage: [chama_guest_action_grid]
 */
function chama_ops_render_guest_action_grid_shortcode(): string
{
    $actions = [
        [
            'title' => __('My Stay', 'chama-ops'),
            'description' => __('See stay essentials and quick links for this visit.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('my-stay', '/my-stay/'),
            'label' => __('Open my stay', 'chama-ops'),
        ],
        [
            'title' => __('Restaurant Orders', 'chama-ops'),
            'description' => __('Place room-service orders and submit notes from your phone.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('dining', '/dining/'),
            'label' => __('Order room service', 'chama-ops'),
        ],
        [
            'title' => __('Gift Shop', 'chama-ops'),
            'description' => __('Browse local goods and request pickup or room drop-off.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('gift-shop', '/gift-shop/'),
            'label' => __('Open gift shop', 'chama-ops'),
        ],
        [
            'title' => __('Service Requests', 'chama-ops'),
            'description' => __('Request towels, amenities, housekeeping, or support.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('service-requests', '/service-requests/'),
            'label' => __('Submit a request', 'chama-ops'),
        ],
        [
            'title' => __('During Your Stay', 'chama-ops'),
            'description' => __('Quick tips for train-day timing and local walkable plans.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('explore-chama', '/explore-chama/'),
            'label' => __('See stay tips', 'chama-ops'),
        ],
        [
            'title' => __('Front Desk Help', 'chama-ops'),
            'description' => __('Use this for urgent and non-urgent support paths.', 'chama-ops'),
            'url' => chama_ops_get_guest_page_url('contact', '/contact/'),
            'label' => __('Contact front desk', 'chama-ops'),
        ],
    ];

    ob_start();
    ?>
    <div class="chama-order-grid">
        <?php foreach ($actions as $action) : ?>
            <article class="chama-order-card">
                <h3><?php echo esc_html($action['title']); ?></h3>
                <p class="chama-order-meta"><?php echo esc_html($action['description']); ?></p>
                <div class="chama-order-actions wp-block-buttons">
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
add_shortcode('chama_guest_action_grid', 'chama_ops_render_guest_action_grid_shortcode');

/**
 * Return the default gift shop catalog.
 *
 * @return array<string, array<string, string|float>>
 */
function chama_ops_get_gift_shop_catalog(): array
{
    return [
        'chama_rail_mug' => [
            'label' => __('Chama Rail Mug', 'chama-ops'),
            'description' => __('Matte ceramic mug with station-inspired crest.', 'chama-ops'),
            'price' => 18.00,
        ],
        'station_canvas_tote' => [
            'label' => __('Station Inn Canvas Tote', 'chama-ops'),
            'description' => __('Natural canvas tote for train-day essentials.', 'chama-ops'),
            'price' => 22.00,
        ],
        'blue_corn_cookie_tin' => [
            'label' => __('Blue Corn Cookie Tin', 'chama-ops'),
            'description' => __('House favorite snack pack for your room or trip home.', 'chama-ops'),
            'price' => 16.00,
        ],
        'mountain_honey_jar' => [
            'label' => __('Mountain Honey Jar', 'chama-ops'),
            'description' => __('Local small-batch honey.', 'chama-ops'),
            'price' => 14.00,
        ],
        'travel_toiletry_kit' => [
            'label' => __('Emergency Toiletry Kit', 'chama-ops'),
            'description' => __('Travel-size basics in a compact pouch.', 'chama-ops'),
            'price' => 7.00,
        ],
        'sleep_comfort_set' => [
            'label' => __('Sleep Comfort Set', 'chama-ops'),
            'description' => __('Sleep mask and earplug set.', 'chama-ops'),
            'price' => 8.00,
        ],
    ];
}

/**
 * Render gift shop app shortcode.
 *
 * Usage: [chama_gift_shop_app]
 */
function chama_ops_render_gift_shop_app_shortcode(): string
{
    $catalog = chama_ops_get_gift_shop_catalog();
    $notice_key = isset($_GET['chama_gift_shop']) ? sanitize_key((string) wp_unslash($_GET['chama_gift_shop'])) : '';
    $order_ref  = isset($_GET['chama_gift_order']) ? absint($_GET['chama_gift_order']) : 0;

    ob_start();
    ?>
    <section class="chama-gift-shop-app" style="margin:0 auto;max-width:1080px;">
        <?php if ($notice_key === 'submitted' && $order_ref > 0) : ?>
            <div style="border:1px solid #b7d8c0;background:#ecf8ef;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php
                printf(
                    esc_html__('Gift order submitted. Reference #%d. Front desk will confirm pickup/drop-off.', 'chama-ops'),
                    $order_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'invalid_item') : ?>
            <div style="border:1px solid #e2b3b0;background:#fff2f2;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php esc_html_e('That catalog item is unavailable right now. Please choose another item.', 'chama-ops'); ?>
            </div>
        <?php elseif ($notice_key === 'missing_room') : ?>
            <div style="border:1px solid #e2b3b0;background:#fff2f2;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php esc_html_e('Please add your room number before submitting.', 'chama-ops'); ?>
            </div>
        <?php endif; ?>

        <div class="chama-order-grid">
            <?php foreach ($catalog as $item_key => $item) : ?>
                <article class="chama-order-card">
                    <h3><?php echo esc_html((string) $item['label']); ?></h3>
                    <p class="chama-order-meta"><?php echo esc_html((string) $item['description']); ?></p>
                    <p class="chama-order-price"><?php echo esc_html('$' . number_format((float) $item['price'], 2)); ?></p>

                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:10px;">
                        <?php wp_nonce_field('chama_ops_submit_gift_shop_order_action', 'chama_ops_submit_gift_shop_order_nonce'); ?>
                        <input type="hidden" name="action" value="chama_ops_submit_gift_shop_order">
                        <input type="hidden" name="chama_gift_item_key" value="<?php echo esc_attr($item_key); ?>">

                        <p style="margin:0 0 8px;">
                            <label>
                                <?php esc_html_e('Room', 'chama-ops'); ?><br>
                                <input type="text" name="chama_gift_room_number" required style="width:100%;">
                            </label>
                        </p>
                        <p style="margin:0 0 8px;">
                            <label>
                                <?php esc_html_e('Qty', 'chama-ops'); ?><br>
                                <input type="number" name="chama_gift_quantity" min="1" step="1" value="1" required style="width:100%;">
                            </label>
                        </p>
                        <p style="margin:0 0 8px;">
                            <label>
                                <?php esc_html_e('Name (optional)', 'chama-ops'); ?><br>
                                <input type="text" name="chama_gift_guest_name" style="width:100%;">
                            </label>
                        </p>
                        <p style="margin:0 0 8px;">
                            <label>
                                <?php esc_html_e('Phone (optional)', 'chama-ops'); ?><br>
                                <input type="text" name="chama_gift_guest_phone" style="width:100%;">
                            </label>
                        </p>
                        <p style="margin:0 0 10px;">
                            <label>
                                <?php esc_html_e('Pickup note (optional)', 'chama-ops'); ?><br>
                                <textarea name="chama_gift_order_notes" rows="2" style="width:100%;"></textarea>
                            </label>
                        </p>
                        <button type="submit" class="wp-element-button" style="width:100%;"><?php esc_html_e('Submit order', 'chama-ops'); ?></button>
                    </form>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('chama_gift_shop_app', 'chama_ops_render_gift_shop_app_shortcode');

/**
 * Handle front-end gift shop submissions.
 */
function chama_ops_submit_gift_shop_order(): void
{
    check_admin_referer('chama_ops_submit_gift_shop_order_action', 'chama_ops_submit_gift_shop_order_nonce');

    $catalog = chama_ops_get_gift_shop_catalog();
    $item_key = isset($_POST['chama_gift_item_key']) ? sanitize_key((string) wp_unslash($_POST['chama_gift_item_key'])) : '';
    $room     = isset($_POST['chama_gift_room_number']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_room_number'])) : '';
    $qty      = isset($_POST['chama_gift_quantity']) ? max(1, absint(wp_unslash($_POST['chama_gift_quantity']))) : 1;
    $name     = isset($_POST['chama_gift_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_guest_name'])) : '';
    $phone    = isset($_POST['chama_gift_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_gift_guest_phone'])) : '';
    $notes    = isset($_POST['chama_gift_order_notes']) ? sanitize_textarea_field(wp_unslash($_POST['chama_gift_order_notes'])) : '';

    $redirect_url = wp_get_referer();

    if (!is_string($redirect_url) || $redirect_url === '') {
        $redirect_url = (string) home_url('/gift-shop/');
    }

    if ($room === '') {
        wp_safe_redirect(add_query_arg('chama_gift_shop', 'missing_room', $redirect_url));
        exit;
    }

    if (!isset($catalog[$item_key])) {
        wp_safe_redirect(add_query_arg('chama_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    $item_label = (string) $catalog[$item_key]['label'];
    $unit_price = (float) $catalog[$item_key]['price'];
    $order_total = number_format($unit_price * $qty, 2, '.', '');

    $order_note_lines = [];

    if ($name !== '') {
        $order_note_lines[] = sprintf(__('Guest Name: %s', 'chama-ops'), $name);
    }

    if ($phone !== '') {
        $order_note_lines[] = sprintf(__('Guest Phone: %s', 'chama-ops'), $phone);
    }

    if ($notes !== '') {
        $order_note_lines[] = sprintf(__('Notes: %s', 'chama-ops'), $notes);
    }

    $order_title = sprintf(
        __('Room %1$s - %2$s x%3$d', 'chama-ops'),
        $room,
        $item_label,
        $qty
    );

    $order_id = wp_insert_post([
        'post_type'    => 'gift_shop_order',
        'post_status'  => 'publish',
        'post_title'   => $order_title,
        'post_content' => implode("\n", $order_note_lines),
    ], true);

    if (is_wp_error($order_id) || (int) $order_id <= 0) {
        wp_safe_redirect(add_query_arg('chama_gift_shop', 'invalid_item', $redirect_url));
        exit;
    }

    update_post_meta((int) $order_id, '_chama_gift_item_key', $item_key);
    update_post_meta((int) $order_id, '_chama_gift_quantity', $qty);
    update_post_meta((int) $order_id, '_chama_gift_room_number', $room);
    update_post_meta((int) $order_id, '_chama_gift_guest_name', $name);
    update_post_meta((int) $order_id, '_chama_gift_guest_phone', $phone);
    update_post_meta((int) $order_id, '_chama_gift_total', $order_total);
    update_post_meta((int) $order_id, '_chama_gift_order_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'chama_gift_shop'  => 'submitted',
        'chama_gift_order' => (int) $order_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_chama_ops_submit_gift_shop_order', 'chama_ops_submit_gift_shop_order');
add_action('admin_post_chama_ops_submit_gift_shop_order', 'chama_ops_submit_gift_shop_order');

/**
 * Render service request app shortcode.
 *
 * Usage: [chama_service_request_app]
 */
function chama_ops_render_service_request_app_shortcode(): string
{
    $notice_key  = isset($_GET['chama_service_request']) ? sanitize_key((string) wp_unslash($_GET['chama_service_request'])) : '';
    $request_ref = isset($_GET['chama_service_request_id']) ? absint($_GET['chama_service_request_id']) : 0;

    ob_start();
    ?>
    <section class="chama-service-request-app" style="margin:0 auto;max-width:900px;">
        <?php if ($notice_key === 'submitted' && $request_ref > 0) : ?>
            <div style="border:1px solid #b7d8c0;background:#ecf8ef;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php
                printf(
                    esc_html__('Request submitted. Reference #%d. Front desk will follow up shortly.', 'chama-ops'),
                    $request_ref
                );
                ?>
            </div>
        <?php elseif ($notice_key === 'missing_room') : ?>
            <div style="border:1px solid #e2b3b0;background:#fff2f2;padding:12px;border-radius:10px;margin-bottom:14px;">
                <?php esc_html_e('Please add your room number before submitting.', 'chama-ops'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="chama-card">
            <?php wp_nonce_field('chama_ops_submit_service_request_action', 'chama_ops_submit_service_request_nonce'); ?>
            <input type="hidden" name="action" value="chama_ops_submit_service_request">

            <p style="margin:0 0 8px;">
                <label>
                    <?php esc_html_e('Request type', 'chama-ops'); ?><br>
                    <select name="chama_service_request_category" required style="width:100%;">
                        <option value="housekeeping"><?php esc_html_e('Housekeeping', 'chama-ops'); ?></option>
                        <option value="amenities"><?php esc_html_e('Amenities', 'chama-ops'); ?></option>
                        <option value="front_desk"><?php esc_html_e('Front desk support', 'chama-ops'); ?></option>
                        <option value="maintenance"><?php esc_html_e('Maintenance', 'chama-ops'); ?></option>
                        <option value="other"><?php esc_html_e('Other', 'chama-ops'); ?></option>
                    </select>
                </label>
            </p>
            <p style="margin:0 0 8px;">
                <label>
                    <?php esc_html_e('Priority', 'chama-ops'); ?><br>
                    <select name="chama_service_request_priority" required style="width:100%;">
                        <option value="normal"><?php esc_html_e('Normal', 'chama-ops'); ?></option>
                        <option value="urgent"><?php esc_html_e('Urgent', 'chama-ops'); ?></option>
                    </select>
                </label>
            </p>
            <p style="margin:0 0 8px;">
                <label>
                    <?php esc_html_e('Room', 'chama-ops'); ?><br>
                    <input type="text" name="chama_service_request_room" required style="width:100%;">
                </label>
            </p>
            <p style="margin:0 0 8px;">
                <label>
                    <?php esc_html_e('Name (optional)', 'chama-ops'); ?><br>
                    <input type="text" name="chama_service_request_guest_name" style="width:100%;">
                </label>
            </p>
            <p style="margin:0 0 8px;">
                <label>
                    <?php esc_html_e('Phone (optional)', 'chama-ops'); ?><br>
                    <input type="text" name="chama_service_request_guest_phone" style="width:100%;">
                </label>
            </p>
            <p style="margin:0 0 10px;">
                <label>
                    <?php esc_html_e('Details', 'chama-ops'); ?><br>
                    <textarea name="chama_service_request_notes" rows="4" required style="width:100%;"></textarea>
                </label>
            </p>

            <button type="submit" class="wp-element-button"><?php esc_html_e('Submit request', 'chama-ops'); ?></button>
        </form>
    </section>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('chama_service_request_app', 'chama_ops_render_service_request_app_shortcode');

/**
 * Handle guest service request submissions.
 */
function chama_ops_submit_service_request(): void
{
    check_admin_referer('chama_ops_submit_service_request_action', 'chama_ops_submit_service_request_nonce');

    $category = isset($_POST['chama_service_request_category']) ? sanitize_key((string) wp_unslash($_POST['chama_service_request_category'])) : 'front_desk';
    $priority = isset($_POST['chama_service_request_priority']) ? sanitize_key((string) wp_unslash($_POST['chama_service_request_priority'])) : 'normal';
    $room     = isset($_POST['chama_service_request_room']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_room'])) : '';
    $name     = isset($_POST['chama_service_request_guest_name']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_guest_name'])) : '';
    $phone    = isset($_POST['chama_service_request_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_service_request_guest_phone'])) : '';
    $notes    = isset($_POST['chama_service_request_notes']) ? sanitize_textarea_field(wp_unslash($_POST['chama_service_request_notes'])) : '';

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
        $redirect_url = (string) home_url('/service-requests/');
    }

    if ($room === '') {
        wp_safe_redirect(add_query_arg('chama_service_request', 'missing_room', $redirect_url));
        exit;
    }

    $title = sprintf(
        __('Room %1$s - %2$s request', 'chama-ops'),
        $room,
        ucwords(str_replace('_', ' ', $category))
    );

    $note_lines = [trim($notes)];

    if ($name !== '') {
        $note_lines[] = sprintf(__('Guest Name: %s', 'chama-ops'), $name);
    }

    if ($phone !== '') {
        $note_lines[] = sprintf(__('Guest Phone: %s', 'chama-ops'), $phone);
    }

    $request_id = wp_insert_post([
        'post_type'    => 'guest_service_request',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_content' => implode("\n", array_filter($note_lines)),
    ], true);

    if (is_wp_error($request_id) || (int) $request_id <= 0) {
        wp_safe_redirect(add_query_arg('chama_service_request', 'missing_room', $redirect_url));
        exit;
    }

    update_post_meta((int) $request_id, '_chama_service_request_category', $category);
    update_post_meta((int) $request_id, '_chama_service_request_priority', $priority);
    update_post_meta((int) $request_id, '_chama_service_request_room', $room);
    update_post_meta((int) $request_id, '_chama_service_request_guest_name', $name);
    update_post_meta((int) $request_id, '_chama_service_request_guest_phone', $phone);
    update_post_meta((int) $request_id, '_chama_service_request_status', 'submitted');

    wp_safe_redirect(add_query_arg([
        'chama_service_request'    => 'submitted',
        'chama_service_request_id' => (int) $request_id,
    ], $redirect_url));
    exit;
}
add_action('admin_post_nopriv_chama_ops_submit_service_request', 'chama_ops_submit_service_request');
add_action('admin_post_chama_ops_submit_service_request', 'chama_ops_submit_service_request');

/**
 * Seed starter room-service menu items for demos.
 */
function chama_ops_seed_room_service_menu_items(): void
{
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    $seed_version = (int) get_option('chama_ops_room_service_seed_version', 0);

    if ($seed_version >= 1) {
        return;
    }

    $items = [
        [
            'title'        => 'Filet Mignon',
            'description'  => '8 oz filet with herb butter, roasted potatoes, and seasonal vegetables.',
            'price'        => '44.00',
            'prep_minutes' => 35,
        ],
        [
            'title'        => 'Trout + Lemon Caper',
            'description'  => 'Pan-seared trout, lemon caper sauce, wild rice, and charred asparagus.',
            'price'        => '31.00',
            'prep_minutes' => 24,
        ],
        [
            'title'        => 'Green Chile Chicken Alfredo',
            'description'  => 'House-made cream sauce, green chile, grilled chicken, and fresh herbs.',
            'price'        => '26.00',
            'prep_minutes' => 22,
        ],
        [
            'title'        => 'Garden Salad',
            'description'  => 'Mixed greens, seasonal vegetables, and house vinaigrette.',
            'price'        => '9.00',
            'prep_minutes' => 8,
        ],
        [
            'title'        => 'Hot Cocoa',
            'description'  => 'Rich cocoa with whipped cream.',
            'price'        => '6.00',
            'prep_minutes' => 5,
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

        update_post_meta((int) $item_id, '_chama_room_service_price', $item['price']);
        update_post_meta((int) $item_id, '_chama_room_service_prep_minutes', (int) $item['prep_minutes']);
        update_post_meta((int) $item_id, '_chama_room_service_available', '1');
    }

    update_option('chama_ops_room_service_seed_version', 1, false);
}
add_action('admin_init', 'chama_ops_seed_room_service_menu_items');

/**
 * Customize room-service order admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function chama_ops_add_room_service_order_columns(array $columns): array
{
    $columns['chama_order_room'] = __('Room', 'chama-ops');
    $columns['chama_order_item'] = __('Menu Item', 'chama-ops');
    $columns['chama_order_qty'] = __('Qty', 'chama-ops');
    $columns['chama_order_total'] = __('Total', 'chama-ops');
    $columns['chama_order_status'] = __('Order Status', 'chama-ops');

    return $columns;
}
add_filter('manage_room_service_order_posts_columns', 'chama_ops_add_room_service_order_columns');

/**
 * Render room-service order custom column values.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function chama_ops_render_room_service_order_column(string $column, int $post_id): void
{
    switch ($column) {
        case 'chama_order_room':
            echo esc_html((string) get_post_meta($post_id, '_chama_order_room_number', true));
            break;

        case 'chama_order_item':
            $item_id = (int) get_post_meta($post_id, '_chama_order_item_id', true);
            $item = $item_id > 0 ? get_post($item_id) : null;
            echo $item instanceof WP_Post
                ? esc_html((string) $item->post_title)
                : esc_html__('N/A', 'chama-ops');
            break;

        case 'chama_order_qty':
            echo esc_html((string) ((int) get_post_meta($post_id, '_chama_order_quantity', true)));
            break;

        case 'chama_order_total':
            $total = (string) get_post_meta($post_id, '_chama_order_total', true);
            echo $total !== ''
                ? esc_html('$' . number_format((float) $total, 2))
                : esc_html__('N/A', 'chama-ops');
            break;

        case 'chama_order_status':
            echo esc_html((string) get_post_meta($post_id, '_chama_order_status', true));
            break;
    }
}
add_action('manage_room_service_order_posts_custom_column', 'chama_ops_render_room_service_order_column', 10, 2);

/**
 * Customize gift shop order admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function chama_ops_add_gift_shop_order_columns(array $columns): array
{
    $columns['chama_gift_room'] = __('Room', 'chama-ops');
    $columns['chama_gift_item'] = __('Item', 'chama-ops');
    $columns['chama_gift_qty'] = __('Qty', 'chama-ops');
    $columns['chama_gift_total'] = __('Total', 'chama-ops');
    $columns['chama_gift_status'] = __('Status', 'chama-ops');

    return $columns;
}
add_filter('manage_gift_shop_order_posts_columns', 'chama_ops_add_gift_shop_order_columns');

/**
 * Render gift shop order admin columns.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function chama_ops_render_gift_shop_order_column(string $column, int $post_id): void
{
    $catalog = chama_ops_get_gift_shop_catalog();

    switch ($column) {
        case 'chama_gift_room':
            echo esc_html((string) get_post_meta($post_id, '_chama_gift_room_number', true));
            break;

        case 'chama_gift_item':
            $item_key = (string) get_post_meta($post_id, '_chama_gift_item_key', true);
            $item_label = isset($catalog[$item_key]['label']) ? (string) $catalog[$item_key]['label'] : $item_key;
            echo esc_html($item_label !== '' ? $item_label : __('N/A', 'chama-ops'));
            break;

        case 'chama_gift_qty':
            echo esc_html((string) ((int) get_post_meta($post_id, '_chama_gift_quantity', true)));
            break;

        case 'chama_gift_total':
            $total = (string) get_post_meta($post_id, '_chama_gift_total', true);
            echo $total !== ''
                ? esc_html('$' . number_format((float) $total, 2))
                : esc_html__('N/A', 'chama-ops');
            break;

        case 'chama_gift_status':
            echo esc_html((string) get_post_meta($post_id, '_chama_gift_order_status', true));
            break;
    }
}
add_action('manage_gift_shop_order_posts_custom_column', 'chama_ops_render_gift_shop_order_column', 10, 2);

/**
 * Customize service request admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function chama_ops_add_service_request_columns(array $columns): array
{
    $columns['chama_service_room'] = __('Room', 'chama-ops');
    $columns['chama_service_category'] = __('Category', 'chama-ops');
    $columns['chama_service_priority'] = __('Priority', 'chama-ops');
    $columns['chama_service_status'] = __('Status', 'chama-ops');

    return $columns;
}
add_filter('manage_guest_service_request_posts_columns', 'chama_ops_add_service_request_columns');

/**
 * Render service request admin columns.
 *
 * @param string $column Column key.
 * @param int    $post_id Current post ID.
 */
function chama_ops_render_service_request_column(string $column, int $post_id): void
{
    switch ($column) {
        case 'chama_service_room':
            echo esc_html((string) get_post_meta($post_id, '_chama_service_request_room', true));
            break;

        case 'chama_service_category':
            $category = (string) get_post_meta($post_id, '_chama_service_request_category', true);
            echo esc_html(ucwords(str_replace('_', ' ', $category)));
            break;

        case 'chama_service_priority':
            $priority = (string) get_post_meta($post_id, '_chama_service_request_priority', true);
            echo esc_html(ucfirst($priority));
            break;

        case 'chama_service_status':
            $status = (string) get_post_meta($post_id, '_chama_service_request_status', true);
            echo esc_html(ucwords(str_replace('_', ' ', $status)));
            break;
    }
}
add_action('manage_guest_service_request_posts_custom_column', 'chama_ops_render_service_request_column', 10, 2);

