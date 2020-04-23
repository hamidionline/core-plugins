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

class j10501superserver_config
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

		if (!isset($jrConfig[ 'live_superserver' ])) {
			$jrConfig[ 'live_superserver' ] = 0;
		}
		
		$yesno = array();
		$yesno[ ] = jomresHTML::makeOption('0', jr_gettext('_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false));
		$yesno[ ] = jomresHTML::makeOption('1', jr_gettext('_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false));

        $configurationPanel = $componentArgs[ 'configurationPanel' ];
		
		$configurationPanel->startPanel(jr_gettext('SUPERSERVER_TITLE', 'SUPERSERVER_TITLE', false));

        $configurationPanel->insertHeading(jr_gettext('SUPERSERVER_TITLE', 'SUPERSERVER_TITLE', false));
		
		$configurationPanel->setleft(jr_gettext('SUPERSERVER_DEV_PROD', 'SUPERSERVER_DEV_PROD', false));
		$configurationPanel->setmiddle(
			jomresHTML::selectList($yesno, 'cfg_live_superserver', 'class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'live_superserver' ])
			);
		$configurationPanel->setright(jr_gettext('SUPERSERVER_DEV_PROD_DESC', 'SUPERSERVER_DEV_PROD_DESC', false));
		$configurationPanel->insertSetting();
		$configurationPanel->endPanel();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
