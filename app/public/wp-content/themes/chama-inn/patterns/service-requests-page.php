<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"920px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e8ddcc;padding-top:48px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Service Requests</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Submit housekeeping, amenity, or support requests in one quick form.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:40px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:shortcode -->
[chama_service_request_app]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
