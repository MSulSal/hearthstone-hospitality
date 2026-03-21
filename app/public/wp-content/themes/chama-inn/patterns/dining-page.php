<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e8ddcc;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Restaurant Orders</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">Order from your room, pickup, or front desk support</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">This page is the guest ordering surface used during active stays. Keep menu items, service windows, and sold-out status updated in real time.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1040px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Sample menu (demo data)</h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Breakfast</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Rail Yard Breakfast Plate — $15</li><li>Blue Corn Pancakes — $14</li><li>Smothered Breakfast Burrito — $13</li><li>Fresh Fruit + Yogurt Bowl — $11</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Lunch</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Green Chile Cheeseburger — $16</li><li>Santa Fe Turkey Club — $15</li><li>Southwest Caesar Salad — $13</li><li>Roasted Veggie Panini — $14</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Dinner</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li><strong>Filet Mignon</strong> (8 oz, herb butter, potatoes) — $44</li><li>Trout with Lemon Caper Sauce — $31</li><li>Green Chile Chicken Alfredo — $26</li><li>Wild Mushroom Risotto — $24</li></ul>
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
<h3 class="wp-block-heading">Order windows</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Breakfast: 7:00 AM - 10:30 AM</li><li>Lunch: 11:30 AM - 2:30 PM</li><li>Dinner: 5:00 PM - 9:00 PM</li><li>Late coffee/snacks: 9:00 PM - 10:00 PM</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Order states</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Received</li><li>In Kitchen</li><li>Ready for Pickup</li><li>Out for Delivery</li><li>Completed</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Guest notes</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Allergy and dietary modifiers supported</li><li>Room delivery fee: $4</li><li>Pickup location: Front Desk station</li><li>Sold-out items update every 15 minutes</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Start order</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:999px">Call front desk for help</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
