<?php
/**
 * Plugin Name: Chama Ops
 * Plugin URI: https://chamastationinn.com
 * Description: Hospitality operations data models and workflows for Chama Station Inn.
 * Version: 1.5.0
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
                    <label for="chama_guest_preferred_room"><?php esc_html_e('Preferred Room / Preference', 'chama-ops'); ?></label>
                </th>
                <td>
                    <input
                        type="text"
                        id="chama_guest_preferred_room"
                        name="chama_guest_preferred_room"
                        value="<?php echo esc_attr($preferred_room); ?>"
                        class="regular-text"
                    >
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
            echo esc_html__('Dates:', 'chama-ops') . ' ' . esc_html(trim($check_in . ' → ' . $check_out)) . '<br>';
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

    <p><strong><?php esc_html_e('Email', 'chama-ops'); ?>:</strong><br><?php echo $guest_email !== '' ? esc_html($guest_email) : '—'; ?></p>

    <p><strong><?php esc_html_e('Phone', 'chama-ops'); ?>:</strong><br><?php echo $guest_phone !== '' ? esc_html($guest_phone) : '—'; ?></p>

    <p><strong><?php esc_html_e('Source', 'chama-ops'); ?>:</strong><br><?php echo $guest_source !== '' ? esc_html(chama_ops_format_guest_source_label($guest_source)) : '—'; ?></p>

    <p><strong><?php esc_html_e('Preference', 'chama-ops'); ?>:</strong><br><?php echo $guest_preference !== '' ? esc_html($guest_preference) : '—'; ?></p>

    <p><strong><?php esc_html_e('VIP', 'chama-ops'); ?>:</strong><br><?php echo $guest_vip === '1' ? esc_html__('Yes', 'chama-ops') : '—'; ?></p>

    <p><strong><?php esc_html_e('Marketing Consent', 'chama-ops'); ?>:</strong><br><?php echo $guest_consent === '1' ? esc_html__('Yes', 'chama-ops') : '—'; ?></p>

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
    $phone          = isset($_POST['chama_guest_phone']) ? sanitize_text_field(wp_unslash($_POST['chama_guest_phone'])) : '';
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
                : '—';
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
        'stay_guest'   => __('Guest', 'chama-ops'),
        'stay_dates'   => __('Dates', 'chama-ops'),
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
        case 'stay_guest':
            $guest_id = (int) get_post_meta($post_id, '_chama_stay_guest_id', true);

            echo $guest_id ? esc_html(get_the_title($guest_id)) : '—';
            break;

        case 'stay_dates':
            $check_in  = (string) get_post_meta($post_id, '_chama_stay_check_in', true);
            $check_out = (string) get_post_meta($post_id, '_chama_stay_check_out', true);

            if ($check_in || $check_out) {
                echo esc_html(trim($check_in . ' → ' . $check_out));
            } else {
                echo '—';
            }
            break;

        case 'stay_nights':
            $nights = (int) get_post_meta($post_id, '_chama_stay_nights', true);

            echo $nights > 0 ? esc_html((string) $nights) : '—';
            break;

        case 'stay_status':
            echo esc_html((string) get_post_meta($post_id, '_chama_stay_status', true));
            break;

        case 'stay_revenue':
            $revenue = (string) get_post_meta($post_id, '_chama_stay_revenue', true);

            echo $revenue !== '' ? esc_html('$' . $revenue) : '—';
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
        'booked_stays'     => add_query_arg('chama_stay_status_filter', 'booked', $stay_list_url),
        'checked_in_stays' => add_query_arg('chama_stay_status_filter', 'checked_in', $stay_list_url),
        'google_guests'    => add_query_arg('chama_guest_source', 'google', $guest_list_url),
        'repeat_guests'    => add_query_arg('chama_guest_source', 'repeat', $guest_list_url),
    ];
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

    $notice_key = isset($_GET['chama_ops_notice']) ? sanitize_text_field(wp_unslash($_GET['chama_ops_notice'])) : '';
    $seed_notice_messages = [
        'sample_data_seeded' => [
            'message' => __('Sample guest and stay data has been generated for the demo.', 'chama-ops'),
            'type'    => 'notice-success',
        ],
        'sample_data_exists' => [
            'message' => __('Sample data already exists; add more by re-running with the force option.', 'chama-ops'),
            'type'    => 'notice-warning',
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
    $action_links           = chama_ops_get_overview_action_links();
    $rollup_metrics         = chama_ops_get_stay_rollup_metrics();
    $average_revenue        = $rollup_metrics['average_revenue'];
    $average_revenue_night  = $rollup_metrics['average_revenue_per_night'];
    $seed_url               = wp_nonce_url(
        admin_url('admin-post.php?action=chama_ops_seed_sample_data'),
        'chama_ops_seed_sample_data_action',
        'chama_ops_seed_sample_data_nonce'
    );
    $seed_force_url = add_query_arg('chama_ops_force_sample_data', '1', $seed_url);
    ?>
    <div class="wrap">
        <?php if (isset($seed_notice_messages[$notice_key])) : ?>
            <div class="notice <?php echo esc_attr($seed_notice_messages[$notice_key]['type']); ?> inline">
                <p><?php echo esc_html($seed_notice_messages[$notice_key]['message']); ?></p>
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
            <a class="button" href="<?php echo esc_url($action_links['checked_in_stays']); ?>">
                <?php esc_html_e('Checked-In Stays', 'chama-ops'); ?>
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
                <?php esc_html_e('Generate Sample Data (force)', 'chama-ops'); ?>
            </a>
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
                        : '—';
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
                        : '—';
                    ?>
                </p>
                <p style="margin-bottom:0;"><?php esc_html_e('Across stays with both revenue and nights', 'chama-ops'); ?></p>
            </div>
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

    $existing = get_posts([
        'post_type'      => ['guest', 'stay'],
        'posts_per_page' => 1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'   => '_chama_ops_sample_data',
                'value' => '1',
            ],
        ],
    ]);

    if (!$force && !empty($existing)) {
        $redirect = add_query_arg(
            'chama_ops_notice',
            'sample_data_exists',
            wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview')
        );
        wp_safe_redirect($redirect);
        exit;
    }

    $guest_definitions = [
        [
            'handle'           => 'elena',
            'title'            => 'Sample Guest – Elena Cruz',
            'email'            => 'elena@chamastationinn.com',
            'phone'            => '(505) 222-0100',
            'marketing_source' => 'direct',
            'preferred_room'   => 'Riverside Cottage',
            'vip'              => '1',
            'consent'          => '1',
        ],
        [
            'handle'           => 'nate',
            'title'            => 'Sample Guest – Nate Morales',
            'email'            => 'nate+ops@chamastationinn.com',
            'phone'            => '(505) 222-0144',
            'marketing_source' => 'google',
            'preferred_room'   => 'Hilltop Suite',
            'vip'              => '',
            'consent'          => '1',
        ],
    ];

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

    $stay_definitions = [
        [
            'title'        => 'Stay – Elena Cruz (May 1–4, 2026)',
            'guest_handle' => 'elena',
            'check_in'     => '2026-05-01',
            'check_out'    => '2026-05-04',
            'status'       => 'booked',
            'revenue'      => '1380',
        ],
        [
            'title'        => 'Stay – Nate Morales (June 12–16, 2026)',
            'guest_handle' => 'nate',
            'check_in'     => '2026-06-12',
            'check_out'    => '2026-06-16',
            'status'       => 'checked_in',
            'revenue'      => '2120',
        ],
    ];

    foreach ($stay_definitions as $stay_data) {
        if (!isset($guest_ids[$stay_data['guest_handle']])) {
            continue;
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

        update_post_meta($stay_id, '_chama_stay_guest_id', $guest_ids[$stay_data['guest_handle']]);
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

    $redirect = add_query_arg(
        'chama_ops_notice',
        'sample_data_seeded',
        wp_get_referer() ?: admin_url('admin.php?page=chama-ops-overview')
    );
    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_chama_ops_seed_sample_data', 'chama_ops_seed_sample_data');

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
        <?php
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['chama_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_status_filter'])) : '';
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

        if ($selected_source !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_chama_guest_marketing_source',
                'value' => $selected_source,
            ];

            $query->set('meta_query', $meta_query);
        }
    }

    if ($post_type === 'stay') {
        $selected_status = isset($_GET['chama_stay_status_filter']) ? sanitize_text_field(wp_unslash($_GET['chama_stay_status_filter'])) : '';

        if ($selected_status !== '') {
            $meta_query   = (array) $query->get('meta_query');
            $meta_query[] = [
                'key'   => '_chama_stay_status',
                'value' => $selected_status,
            ];

            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'chama_ops_apply_admin_filters');
