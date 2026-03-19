<?php
/**
 * Plugin Name: Chama Ops
 * Plugin URI: https://chamastationinn.com
 * Description: Hospitality operations data models and workflows for Chama Station Inn.
 * Version: 1.22.0
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
            'link'     => $action_links['quality_stay_missing_dates'],
            'link_label' => __('Open quality queues', 'chama-ops'),
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
        'quality_guest_missing_email'     => add_query_arg('chama_guest_quality', 'missing_email', $guest_list_url),
        'quality_guest_missing_phone'     => add_query_arg('chama_guest_quality', 'missing_phone', $guest_list_url),
        'quality_guest_missing_consent'   => add_query_arg('chama_guest_quality', 'missing_consent', $guest_list_url),
        'quality_stay_missing_guest_link' => add_query_arg('chama_stay_quality', 'missing_guest_link', $stay_list_url),
        'quality_stay_missing_dates'      => add_query_arg('chama_stay_quality', 'missing_dates', $stay_list_url),
        'quality_stay_invalid_dates'      => add_query_arg('chama_stay_quality', 'invalid_date_range', $stay_list_url),
        'quality_stay_missing_revenue'    => add_query_arg('chama_stay_quality', 'missing_revenue', $stay_list_url),
    ];
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
        $source_key        = (string) get_post_meta($guest_id, '_chama_guest_marketing_source', true);
        $preferred_room    = (string) get_post_meta($guest_id, '_chama_guest_preferred_room', true);
        $vip               = (string) get_post_meta($guest_id, '_chama_guest_vip', true);
        $marketing_consent = (string) get_post_meta($guest_id, '_chama_guest_marketing_consent', true);

        fputcsv($output, [
            $guest_id,
            $guest_post->post_title,
            $email,
            $phone,
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
            $stay_post->post_title,
            $guest_id > 0 ? $guest_id : '',
            $guest_name,
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
            $stay_post->post_title,
            $check_in,
            $check_out,
            $guest_id > 0 ? $guest_id : '',
            $guest_name,
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

