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
<p class="has-text-align-center">This page is the guest's personal stay center. Keep details current and easy to scan on mobile.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1040px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:52px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Stay Snapshot</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Room: <strong>Replace with room label</strong></li><li>Check-in: <strong>Replace with date/time</strong></li><li>Check-out: <strong>Replace with date/time</strong></li><li>Nights: <strong>Replace with computed stay nights</strong></li><li>Status: <strong>Booked / Checked-in / Checked-out</strong></li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Guest Preferences</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Show preference notes that should be respected during this stay: room setup, amenity notes, service timing, and communication preferences.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Quick Actions</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Order from restaurant</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Open gift shop</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Submit service request</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Contact front desk</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Departure Checklist</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Checkout time reminder</li><li>Outstanding orders or charges</li><li>Front desk key/lock instructions</li><li>Optional feedback request</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;
