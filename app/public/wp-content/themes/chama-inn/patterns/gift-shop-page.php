<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Gift Shop</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">Guest gift shop orders during your stay</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">This page represents the guest side of the inn POS for retail items. Keep availability and pickup timing current.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1040px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Sample catalog (demo data)</h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Railroad & Inn Keepsakes</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Chama Rail Mug — $18</li><li>Cumbres Route Postcard Set — $9</li><li>Station Inn Canvas Tote — $22</li><li>Vintage Rail Patch Pack — $12</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Local Comfort & Pantry</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Mountain Honey Jar — $14</li><li>Blue Corn Cookie Tin — $16</li><li>Trail Snack Pack — $11</li><li>New Mexico Hot Cocoa Mix — $13</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Room Convenience</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Travel Toothbrush Kit — $6</li><li>Phone Charging Cable — $10</li><li>Sleep Mask + Earplug Set — $8</li><li>Emergency Toiletry Kit — $7</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Order flow</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Added to Cart</li><li>Paid</li><li>Packed</li><li>Ready for Pickup</li><li>Completed</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Pickup windows</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Front desk pickup: 8:00 AM - 10:00 PM</li><li>Room drop-off: 9:00 AM - 8:00 PM</li><li>Same-day cutoff: 7:30 PM</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Inventory practice</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Morning count</li><li>Shift close count</li><li>Low-stock alert below 5 units</li><li>Mark sold-out items immediately</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Browse gift shop</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:999px">Ask front desk about stock</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
