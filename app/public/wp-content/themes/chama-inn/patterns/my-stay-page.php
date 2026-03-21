<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:40px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#5f7a73"}}} -->
<p class="has-text-color" style="color:#5f7a73;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">My Stay</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Orders and session</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>See active orders, room context, and sign out when your stay is complete.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[chama_guest_my_stay]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
