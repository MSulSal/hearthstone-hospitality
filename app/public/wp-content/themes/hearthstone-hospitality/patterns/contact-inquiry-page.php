<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Contact and Inquiry</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">Contact Hearthstone Hospitality</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">Use this page for direct booking contact, event requests, and general guest support.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"48%"} -->
<div class="wp-block-column" style="flex-basis:48%"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Direct contact</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Phone: (replace)<br>Email: (replace)<br>Address: (replace)</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Front desk hours</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Replace with front desk and check-in support times.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"52%"} -->
<div class="wp-block-column" style="flex-basis:52%"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Inquiry form area</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your form block or shortcode here. Keep fields simple: name, email, phone, dates, notes.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Send inquiry</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;
