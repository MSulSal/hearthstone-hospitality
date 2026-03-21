<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"52px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"1020px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e8ddcc;padding-top:52px;padding-right:20px;padding-bottom:52px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#5f7a73"}}} -->
<p class="has-text-color" style="color:#5f7a73;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Room Service</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Order from your room</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Browse the live room-service menu, choose quantity, and submit your order directly from your phone. Front desk and kitchen receive orders in the admin dashboard.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Live item availability</li><li>Per-item prep time and pricing</li><li>Guest note field for requests or allergies</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"42px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:42px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:shortcode -->
[chama_room_service_app]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
