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

			<?php
/*
			// Redimensionnement dynamique des images
			jimport('joomla.filesystem.folder');
			$image = $item->fields['agx-image']->rawvalue;
			
			$widths = array(
						800,
						1000,
						1200,
						1600,
						1920,
						2560,
						4000	
						);
			
			$imageurl 	= explode('/', $image);
			$filename 	= end($imageurl);
			$pathsrc 	= implode('/', array_diff($imageurl, array($filename)));
			
			//echo  $filename . '<br>' . $pathsrc . '<br>';
			
			$panel = new StdClass();
			
			if (!JFolder::exists(JPATH_SITE . '/' . $pathsrc . '/thumbs')) JFolder::create(JPATH_SITE . '/' . $pathsrc . '/thumbs');
			$pathdest	= $pathsrc . '/thumbs';
			
			$src 		= JPATH_SITE . '/' . $pathsrc . '/' . $filename;
			$thumb 		= JPATH_SITE . '/' . $pathdest . '/' . $filename;
			
			$panel->Thumb	= $pathdest . '/' . $filename;
			$panel->Number 	= $nr;
			$panel->ImageProperties = array();
			
			$imageProperties 	= getimagesize($src);
			$filenameParts 		= explode('.', $filename);
			
			$panel->ImageProperties['extension']	= array_reverse($filenameParts)[0];
			$panel->ImageProperties['width']		= $imageProperties[0];
			$panel->ImageProperties['height']		= $imageProperties[1];
			$panel->ImageProperties['mime']			= $imageProperties['mime'];
			$panel->ImageProperties['name']			= str_ireplace('.'.$panel->ImageProperties['extension'], '', $filename);
			$panel->ImageProperties['path_src']		= JPATH_SITE . '/' . $pathsrc;
			$panel->ImageProperties['path_dest']	= JPATH_SITE . '/' . $pathdest;
			
			$sources = array();
			$srcset	= array();
			
			foreach ($widths as $w) 
			{
				if ((int)$w <= (int)$panel->ImageProperties['width']) 
				{
					$dest = $panel->ImageProperties['path_dest'] . '/' . $panel->ImageProperties['name'] . '-' . $w . 'w.' . $panel->ImageProperties['extension'];
					if (!file_exists($dest)) 
					{ 
						$thumbnail = new Imagick($src);
						$thumbnail->resizeImage($w,0,Imagick::FILTER_CATROM,1);
						$thumbnail->writeImage($dest);
						$thumbnail->destroy(); 
					}
					$sources[$w.'w'] = $pathdest . '/' . $panel->ImageProperties['name'] . '-' . $w . 'w.' . $panel->ImageProperties['extension'];
					$srcset[] = JURI::root() . 	$pathdest . '/' . $panel->ImageProperties['name'] . '-' . $w . 'w.' . $panel->ImageProperties['extension'] . ' ' . $w . 'w';
				}
			}
			
			$panel->ImageProperties['sources']		= $sources;
			$panel->ImageProperties['srcset']		= $srcset;
*/
			?>

        	<img src="<?php echo $item->fields['agx-image']->rawvalue; ?>" width="<?php echo $params->get('agx_largeur', '800'); ?>" height="<?php echo $params->get('agx_hauteur', '600'); ?>" alt="">
<!--
			<img
			    src="<?php echo $panel->ImageProperties['sources']['400w']; ?>"
				width="<?php echo $params->get('agx_largeur', '800'); ?>" 
				height="<?php echo $params->get('agx_hauteur', '600'); ?>" 			    
				alt="<?php echo $image_alt; ?>" 
				srcset="<?php echo implode(', ', $panel->ImageProperties['srcset']); ?>"
				sizes="(min-width: 960px) 50vw, 100vw"
				/>
-->

			<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				<div class="uk-width-1-2 uk-container-center">
					<?php if ($item->fields['agx-title']->rawvalue) : ?>
					<h2><?php echo $item->fields['agx-title']->rawvalue; ?></h2>
					<?php endif; ?>
					<?php if ($item->fields['agx-description']->rawvalue) : ?>
					<p><?php echo $item->fields['agx-description']->rawvalue; ?><p>
					<?php endif; ?>
					<?php if ($item->fields['agx-btntext']->rawvalue) : ?>
					<a href="<?php echo JRoute::_('index.php?Itemid=' . $item->fields['agx-btnlink']->rawvalue); ?>" class="uk-button uk-button-<?php echo $item->fields['agx-btnsize']->rawvalue[0]; ?> uk-button-<?php echo $item->fields['agx-btnstyle']->rawvalue[0]; ?>"><?php echo $item->fields['agx-btntext']->rawvalue; ?></a>
					<?php endif; ?>
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
