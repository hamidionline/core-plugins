<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j10525extended_maps
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );
		
		$options = array();
		$options[] = jomresHTML::makeOption( 'ROADMAP', 'Roadmap' );
		$options[] = jomresHTML::makeOption( 'SATELLITE', 'Satellite' );
		$options[] = jomresHTML::makeOption( 'HYBRID', 'Hybrid' );
		$options[] = jomresHTML::makeOption( 'TERRAIN', 'Terrain' );

        $configurationPanel = $componentArgs[ 'configurationPanel' ];

        $configurationPanel->insertHeading(jr_gettext('_JRPORTAL_EXTENDED_MAPS_TITLE', '_JRPORTAL_EXTENDED_MAPS_TITLE', false));
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', '_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_extmaps_overrideplist','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'extmaps_overrideplist' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		/* $configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HWIDTH', '_JRPORTAL_EXTENDED_MAPS_HWIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_width" value="'.$jrConfig[ 'extmaps_width' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting(); */
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', '_JRPORTAL_EXTENDED_MAPS_HHEIGHT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_height" value="'.$jrConfig[ 'extmaps_height' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JOMRES_MAP_MAPTYPE', '_JOMRES_MAP_MAPTYPE', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $options, 'cfg_extmaps_maptype','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'extmaps_maptype' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		if (!isset($jrConfig[ 'extmaps_groupmarkers' ]))
			$jrConfig[ 'extmaps_groupmarkers' ] = "1";
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', '_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_extmaps_groupmarkers','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'extmaps_groupmarkers' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HINFOICON', '_JRPORTAL_EXTENDED_MAPS_HINFOICON', false));
		$configurationPanel->setmiddle(get_showtime('live_site').' <input type="text" class="input-large" name="cfg_extmaps_infoicon" value="'.$jrConfig[ 'extmaps_infoicon' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', '_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_popupwidth" value="'.$jrConfig[ 'extmaps_popupwidth' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', '_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_img_width" value="'.$jrConfig[ 'extmaps_img_width' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', '_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_img_height" value="'.$jrConfig[ 'extmaps_img_height' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', '_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_extmaps_show_desc','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'extmaps_show_desc' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', '_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', false));
		$configurationPanel->setmiddle(jomresHTML::selectList( $yesno, 'cfg_extmaps_trim_desc','class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'extmaps_trim_desc' ]));
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft(jr_gettext('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', '_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', false));
		$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_extmaps_trim_value" value="'.$jrConfig[ 'extmaps_trim_value' ].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
