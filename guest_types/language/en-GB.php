<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_GUESTTYPES_IS_CHILD',"Is this a Child guest type?");
jr_define('_JOMRES_GUESTTYPES_IS_CHILD_DESC',"Set this to Yes if this guest type would be classed as a Child guest type.");

jr_define('_JOMRES_GUESTTYPES_INTRO',"If you want to charge per person per night then you will need to create some guest types.");
jr_define('_JOMRES_GUESTTYPES_INSTRUCTIONS',"You can create as many guest types as you need, try starting out by creating just one guest type called 'Adult'. Leave all of the settings at their default values. Next, if for example you want to give children under 12 a discount of 50% you would create a new guest type, and call it 'Children under 12'. Set the 'Add variance?' option to - (negative) and set the 'Variance' to 50. This means when children are added to a booking they're charged 50% of the room cost of the room. " );

