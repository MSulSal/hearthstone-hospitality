<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","className":"chama-guest-hub-intro","style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"940px"}} -->
<div class="wp-block-group alignfull chama-guest-hub-intro has-background" style="background-color:#e8ddcc;padding-top:48px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Guest Hub</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">This page is designed for guests already at the inn. Keep each action short, clear, and mobile-first.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:52px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">My Stay</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Show room number, arrival/departure dates, and any saved preferences.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Open my stay</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Restaurant Orders</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Let guests place orders, track order status, and view service windows.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Order now</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Gift Shop</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Browse local items and request front-desk pickup or room delivery when available.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Browse shop</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Service Requests</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Request extra towels, housekeeping, amenities, and non-urgent support.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Request service</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Front Desk Help</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use this block for urgent support instructions, front desk number, and after-hours process.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="color:#f7f4ee;background-color:#6f8680">Contact front desk</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Explore Chama</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Quick local guide for train visitors, walkable shops, and same-day recommendations.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">See local guide</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;
