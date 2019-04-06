<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_agx_slideshow
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$slideshow_params = array();
$slideshow_params[] = 'animation:' . '\'' . $params->get('agx_animation', 'fade') . '\'';
$slideshow_params[] = 'duration:' . $params->get('agx_duration', '500');
$slideshow_params[] = 'height:' . '\'' . $params->get('agx_height', 'auto') . '\'';
$slideshow_params[] = 'autoplayInterval:' . $params->get('agx_autoplayInterval', '7000');
$slideshow_params[] = 'autoplay:' . ($params->get('agx_autoplay', '1') ? 'true' : 'false');
$slideshow_params[] = 'pauseOnHover:' . ($params->get('agx_pauseOnHover', '1') ? 'true' : 'false');
$slideshow_params[] = 'videoautoplay:' . ($params->get('agx_videoautoplay', '1') ? 'true' : 'false');
$slideshow_params[] = 'videomute:' . ($params->get('agx_videomute', '1') ? 'true' : 'false');
$slideshow_params[] = 'kenburns:' . ($params->get('agx_kenburns', '1') ? 'true' : 'false');
?>

<div class="uk-slidenav-position uk-overlay-active" data-uk-slideshow="{<?php echo implode(', ', $slideshow_params); ?>}">
    <ul class="uk-slideshow">
		<?php foreach ($list as $item) : ?>
        <li>
        	<img src="<?php echo $item->fields['agx-image']->rawvalue; ?>" width="<?php echo $params->get('agx_largeur', '800'); ?>" height="<?php echo $params->get('agx_hauteur', '600'); ?>" alt="">
			<div class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
				<div class="uk-width-3-4 uk-container-center">
					<div class="agx-overlay-black">
						<?php if ($item->fields['agx-title']->rawvalue) : ?>
						<h2><?php echo $item->fields['agx-title']->rawvalue; ?></h2>
						<?php endif; ?>
						<?php if ($item->fields['agx-description']->rawvalue) : ?>
						<?php echo $item->fields['agx-description']->rawvalue; ?>
						<?php endif; ?>
						<?php if ($item->fields['agx-btntext']->rawvalue) : ?>
						<a href="<?php echo JRoute::_('index.php?Itemid=' . $item->fields['agx-btnlink']->rawvalue); ?>" class="uk-button uk-button-<?php echo $item->fields['agx-btnsize']->rawvalue[0]; ?> uk-button-<?php echo $item->fields['agx-btnstyle']->rawvalue[0]; ?>"><?php echo $item->fields['agx-btntext']->rawvalue; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php if ($params->get('agx_nav_arrows', '1')) : ?>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: <?php echo $params->get('agx_nav_color', 'rgba(255,255,255,0.7)'); ?>"></a>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: <?php echo $params->get('agx_nav_color', 'rgba(255,255,255,0.7)'); ?>"></a>
    <?php endif; ?>
    <?php if ($params->get('agx_nav_bubbles', '1')) : ?>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
        <?php foreach ($list as $i => $item) : ?>
        <li data-uk-slideshow-item="<?php echo $i; ?>"><a href="#"><?php echo $item->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
