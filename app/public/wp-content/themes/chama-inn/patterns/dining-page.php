<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"42px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:42px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"20px"},"margin":{"bottom":"20px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:20px"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#5f7a73"}}} -->
<p class="has-text-color" style="color:#5f7a73;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Room Service</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"top":"6px","bottom":"8px"}}}} -->
<h2 class="wp-block-heading" style="margin-top:6px;margin-bottom:8px">Order in seconds</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use <strong>+</strong> and <strong>-</strong> to adjust quantity, then submit once.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"radius":"14px","width":"1px"},"spacing":{"padding":{"top":"12px","right":"14px","bottom":"12px","left":"14px"}},"color":{"background":"#fffaf2","border":"#ccb08c"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#ccb08c;border-width:1px;border-radius:14px;background-color:#fffaf2;padding-top:12px;padding-right:14px;padding-bottom:12px;padding-left:14px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px"><strong>Fast path:</strong> choose items, review totals, submit order.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:shortcode -->
[chama_room_service_app]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
