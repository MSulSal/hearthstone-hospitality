<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">During Your Stay</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">What to do during your stay</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">Built from repeat guest tips: train-day timing, room-selection guidance, and walkable local stops.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">At the inn</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Ask for a first-floor room if stairs are difficult.</li><li>Fireplace rooms are limited; request early.</li><li>If you prefer quieter nights, many guests ask about upstairs options.</li><li>Need extra towels, blankets, or toiletries? Use Service Requests.</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">In town</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Local highlights are easy to reach from the property.</li><li>Dining and shopping options are available within a short walk or drive.</li><li>Guests commonly pair stay days with short local activity stops.</li><li>For same-day suggestions, message the front desk.</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame"} -->
<figure class="wp-block-image size-large chama-photo-frame"><img src="/wp-content/themes/chama-inn/assets/images/nearby.png" alt="Map and nearby points around Hearthstone Hospitality"/></figure>
<!-- /wp:image -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/contact/" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Ask front desk for suggestions</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
