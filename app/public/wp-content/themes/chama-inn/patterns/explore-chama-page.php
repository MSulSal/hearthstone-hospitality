<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Explore Chama</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">Railroad heritage, mountain air, and local discovery</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">Start at 423 Terrace Ave, directly across from the depot, then branch into walkable restaurants, shops, and day-adventure routes.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Start here</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Cumbres and Toltec Scenic Railroad directly across the street</li><li>Walkable local dining and gift shops in central Chama</li><li>Mountain trails, fishing, and seasonal outdoor plans</li></ul>
<!-- /wp:list -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame"} -->
<figure class="wp-block-image size-large chama-photo-frame"><img src="/wp-content/themes/chama-inn/assets/images/location.png" alt="Trip planning map centered on Chama Station Inn location"/></figure>
<!-- /wp:image -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Need help planning?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use these visitor-tested reminders to make arrival and room selection easier.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Request first-floor rooms if stairs are a concern.</li><li>Fireplace rooms are limited and should be requested early.</li><li>Book early during peak train dates for best room choice.</li></ul>
<!-- /wp:list -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"chama-photo-frame"} -->
<figure class="wp-block-image size-large chama-photo-frame"><img src="/wp-content/themes/chama-inn/assets/images/nearby.png" alt="Nearby restaurant and attraction summary around Chama Station Inn"/></figure>
<!-- /wp:image -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#6f8680","text":"#f7f4ee"},"border":{"radius":"999px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:999px;color:#f7f4ee;background-color:#6f8680">Ask the front desk</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
