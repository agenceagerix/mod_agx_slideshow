<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_agx_slideshow
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the latest functions only once
JLoader::register('ModAgxSlideshowHelper', __DIR__ . '/helper.php');

$list            = ModAgxSlideshowHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_agx_slideshow', $params->get('layout', 'default'));
