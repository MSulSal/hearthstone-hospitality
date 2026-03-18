<?php
/**
 * Plugin Name: Chama Ops
 * Plugin URI: https://chamastationinn.com
 * Description: Hospitality operations data models and workflows for Chama Station Inn.
 * Version: 0.5.0
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
        'chama_stay_details',
        __('Stay Details', 'chama-ops'),
        'chama_ops_render_stay_details_meta_box',
        'stay',
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
 * Render the stay details meta box.
 *
 * @param WP_Post $post The current post object.
 */
function chama_ops_render_stay_details_meta_box(WP_Post $post): void
{
    wp_nonce_field('chama_ops_save_stay_details', 'chama_ops_stay_nonce');

    $linked_guest_id = get_post_meta($post->ID, '_chama_stay_guest_id', true);
    $check_in        = get_post_meta($post->ID, '_chama_stay_check_in', true);
    $check_out       = get_post_meta($post->ID, '_chama_stay_check_out', true);
    $status          = get_post_meta($post->ID, '_chama_stay_status', true);
    $revenue         = get_post_meta($post->ID, '_chama_stay_revenue', true);

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

    update_post_meta($post_id, '_chama_stay_guest_id', $linked_guest_id);
    update_post_meta($post_id, '_chama_stay_check_in', $check_in);
    update_post_meta($post_id, '_chama_stay_check_out', $check_out);
    update_post_meta($post_id, '_chama_stay_status', $status);
    update_post_meta($post_id, '_chama_stay_revenue', $revenue);
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
        'stay_status'  => __('Status', 'chama-ops'),
        'stay_revenue' => __('Revenue', 'chama-ops'),
        'date'         => $columns['date'],
    ];
}
add_filter('manage_stay_posts_columns', 'chama_ops_stay_columns');

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

    $revenue_stays = get_posts([
        'post_type'      => 'stay',
        'posts_per_page' => 20,
        'post_status'    => ['publish', 'draft'],
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'     => '_chama_stay_status',
                'value'   => ['booked', 'checked_in', 'checked_out'],
                'compare' => 'IN',
            ],
        ],
    ]);

    $revenue_total = 0.0;

    foreach ($revenue_stays as $revenue_stay) {
        $amount = (string) get_post_meta($revenue_stay->ID, '_chama_stay_revenue', true);

        if ($amount !== '') {
            $revenue_total += (float) $amount;
        }
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Chama Ops Overview', 'chama-ops'); ?></h1>
        <p><?php esc_html_e('Quick snapshot of guest and stay activity for the current prototype.', 'chama-ops'); ?></p>

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
                <h2 style="margin-top:0;"><?php esc_html_e('Recent Revenue Snapshot', 'chama-ops'); ?></h2>
                <p style="font-size:28px;margin:0;"><?php echo esc_html('$' . number_format($revenue_total, 2)); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Booked / active / completed stays in recent records', 'chama-ops'); ?></p>
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