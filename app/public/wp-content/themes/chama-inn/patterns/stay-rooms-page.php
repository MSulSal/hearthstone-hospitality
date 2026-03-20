<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Stay and Rooms</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">Rooms designed for comfort, quiet, and Chama character</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">Nine guest rooms with clean comfort, friendly service, and walkable access to the train depot and downtown Chama.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"52px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:52px;padding-right:20px;padding-bottom:52px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Standard Queen</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A comfortable setup for couples and solo travelers looking for a clean, quiet room near the depot.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Courtyard-View Rooms</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Garden-facing options that emphasize calm mornings, evening quiet, and the inn's relaxed pace.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Fireplace Rooms</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>High-demand rooms that guests frequently mention. Reserve early when available.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"16px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame"} -->
<figure class="wp-block-image size-large chama-photo-frame"><img src="/wp-content/themes/chama-inn/assets/images/csi-assets/csi-20.jpg" alt="Courtyard seating area at Chama Station Inn"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame is-stucco-tint"} -->
<figure class="wp-block-image size-large chama-photo-frame is-stucco-tint"><img src="/wp-content/themes/chama-inn/assets/images/csi-assets/csi-22.jpg" alt="Guest walkway and room doors"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame"} -->
<figure class="wp-block-image size-large chama-photo-frame"><img src="/wp-content/themes/chama-inn/assets/images/csi-assets/csi-21.jpg" alt="Fireplace room feature"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:list -->
<ul><li>Ask for first-floor rooms if stairs are a concern.</li><li>Fireplace rooms are limited and often book first.</li><li>Some guests prefer upstairs rooms for extra quiet.</li><li>Book early during peak train season.</li></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">More guest voices</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>"Our room was clean, quaint, and exactly what we were looking for." - Kate M, May 2023</li><li>"Comfortable room, friendly staff, and very short walk to everything." - Julie E, September 2022</li><li>"Quiet stay in the heart of town, directly across from the train." - Christine P, July 2022</li></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Book your stay</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:999px">Ask a room question</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
