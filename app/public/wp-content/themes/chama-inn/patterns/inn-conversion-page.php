<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"52px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e8ddcc;padding-top:52px;padding-right:20px;padding-bottom:52px;padding-left:20px">
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/dining/" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Restaurant Orders</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/gift-shop/" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Gift Shop</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/service-requests/" style="border-radius:999px">Service Requests</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/contact/" style="border-radius:999px">Front Desk Contact</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:40px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:shortcode -->
[chama_guest_action_grid]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
