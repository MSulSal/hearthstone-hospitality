<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"20px","right":"20px"}},"color":{"background":"#f3eadf"}},"layout":{"type":"constrained","contentSize":"940px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3eadf;padding-top:48px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">My Stay</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Use this page as your control panel for the rest of your visit.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"42px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1040px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:42px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Stay essentials</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Check-in starts at 3:00 PM.</li><li>Checkout is at 11:00 AM.</li><li>Need early/late timing help? Message front desk in advance.</li><li>Need first-floor access support? Use the service request form.</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Popular guest needs</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/dining/">Order room service</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/gift-shop/">Open gift shop</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/service-requests/">Request towels or amenities</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/contact/" style="color:#f7f4ee;background-color:#6f8680">Contact front desk</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Stay tips</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Fireplace rooms are limited and usually book first.</li><li>If stairs are difficult, request a first-floor room.</li><li>The depot is directly across from the inn, so train-day departures are easy.</li><li>Most central Chama stops are walkable from the inn.</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Need something else?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use <a href="/service-requests/">Service Requests</a> for non-urgent help and <a href="/contact/">Front Desk Contact</a> for urgent assistance.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;
