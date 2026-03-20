<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"54px","bottom":"54px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#e8ddcc;padding-top:54px;padding-right:20px;padding-bottom:54px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#6f8680"}}} -->
<p class="has-text-color" style="color:#6f8680;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">About and Our Story</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"color":{"text":"#4e4035"}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#4e4035">A boutique Chama inn with regional character and modern comfort</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#393633"}}} -->
<p class="has-text-color" style="color:#393633">Use this page to connect place, hospitality style, and the inn's long-term vision for guests and community.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"980px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:50px;padding-right:20px;padding-bottom:50px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Story timeline</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Historic roots and railroad connection</li><li>Restoration milestones and improvements</li><li>Current chapter and guest-first priorities</li></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Inn values</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use this area for service values, community role, and commitment to clean, welcoming hospitality.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:999px">Read guest reviews</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
HTML;
