<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 19/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITPRICES',"Définir les prix manuellement");
jr_define('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITMINDAYS',"Définir les prix minimums des nuitées manuellement");
jr_define('_JOMRES_MICROMANAGE_PICKER_SETMINDAYS',"Définir le prix minimum des nuitées");
jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_DOW',"Définir les <em>prix des nuitées</em> par jour de la semaine");
jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_RATES',"Définir les <em>prix des nuitées</em> et par périodes");
jr_define('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_MINDAYS',"Définir les <em>prix mininums des nuitées</em> par périodes");
jr_define('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_RATES',"Les sélecteurs de date et le montant du tarif vous permettent de définir un prix pour une période donnée. Choisissez une date de début et de fin, entrez un prix et cliquez sur le bouton Définir le prix des nuitées.");
jr_define('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_MINDAYS',"Les sélecteurs de date et le montant minimum des nuitées vous permettent de définir une valeur pour le nombre minimum de nuitées pour une période donnée. Choisissez une date de début et de fin, entrez un nombre pour le nombre de nuitées minimums et cliquez sur 'Définir le montant minimum des nuitées'.");
jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO',"Utilisez ce menu déroulant pour changer les prix entre les dates individuelles et les nuitées minimums. Vous pouvez utiliser le sélecteur <em> par jour de la semaine </em>, le sélecteur <em> par périodes </ em> ou définir les prix minimums des nuitées en modifiant manuellement les dates.");
jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO_SMALL_VIEWPORT',"Utilisez ce menu déroulant pour changer les prix entre les dates individuelles et les prix minimums des nuitées. Vous pouvez utiliser le sélecteur <em> par périodes </ em> ou définir les prix minimums des nuitées en modifiant manuellement les dates.");
jr_define('_JOMRES_MICROMANAGE_PICKERS_SELECTOR',"Définir les prix ou les nuitées munimums");
jr_define('_JOMRES_MICROMANAGE_PICKER_BYDOW',"Définir les <em>nuitées minimums</em> par jour de la semaine");
jr_define('_JOMRES_MICROMANAGE_PICKER_BYDOW_INFO',"Les champs du jour de la semaine vous permettent de définir un nombre minimum de nuits pour un jour de la semaine donné. Lorsque vous cliquez sur le bouton du jour de la semaine, tous les jours de la semaine sont réglés sur ce réglage de nuitées minimum.");
jr_define('_JOMRES_MICROMANAGE_MANUALLY',"Définir manuellement les prix et nuitées minimums");
jr_define('_JOMRES_MICROMANAGE_SET_PRICES',"Définir les prix");
jr_define('_JOMRES_MICROMANAGE_SET_MINDAYS',"Définir les nuitées minimums");
jr_define('_JOMRES_MICROMANAGE_PRICE',"Par nuitée");
jr_define('_JOMRES_MICROMANAGE_MINDAYS',"Nuitées minimums");
jr_define('_JOMRES_MICROMANAGE_MAXDAYS',"Nuitées maximums");
jr_define('_JOMRES_MICROMANAGE_INTRO',"Ici, vous pouvez créer vos tarifs qui sont associés aux types de chambres de votre établissement. ");
jr_define('_JOMRES_MICROMANAGE_BASIC_SETTINGS',"Options les plus couramment utilisées");
jr_define('_JOMRES_MICROMANAGE_MODAL_BUTTON',"Explications");
jr_define('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS',"Si vous souhaitez ajouter différents prix pour différents nombres de clients, <em> vous pouvez créer plusieurs tarifs pour chaque type de chambre </ em> et avoir différentes valeurs ninimums/maximums de client ces tarifs.");
jr_define('_JOMRES_MICROMANAGE_INFO',"Donnez un nom au tarif, définissez le nombre maximal de nuitées, ainsi que le nombre minimal et maximal de clients, qui seront obligatoires dans le formulaire de réservation avant que le tarif ne soit proposé. <br/> <br/> Utilisez le panneau du sélecteur de date pour ajouter des prix et les réglages minimums de nuitées pour une période, ou modifier les informations directement. Si vous ne souhaitez pas que le tarif soit offert à certaines dates, laissez le prix à 0 (zéro) à ces dates. <br/> <br/> Vous pouvez avoir différents prix minimums nuitées à différentes dates. Par exemple, si vous souhaitez que les réservations soient plus longues pendant les semaines d'un festival ou d'une convention, vous pouvez définir les prix des nuitées pour ces périodes seulement. <br/> <br /> Si vous facturez un montant par personne (PPPN), vous pouvez activer ce paramètre dans l'onglet Paramètres > Configuration de l\'établissement > Tarifs et Devises, puis créer les types de clients dont vous avez besoin dans Paramètres > Types de clients.");
jr_define('_JOMRES_MICROMANAGE_EXTRAOPTIONS',"Options supplémentaires");
jr_define('_JOMRES_MICROMANAGE_EXTRA_OPTIONS',"Ce sont des options supplémentaires qui ne sont pas couramment utilisées, mais à votre disposition. <br/> <strong> Ignorer PPPN (par personne et par nuit)</strong>. Vous pouvez avoir plusieurs tarifs différents pour le même type de chambre ; par exemple un tarif par personne et par nuit et un autre tarif.<br/><strong>Autoriser les week-ends.</strong> L'option vous donne la possibilité de créer un tarif disponible uniquement en semaine ; par exemple si vous souhaitez un tarif spécial pour la clientèle d'affaires. Dans ce cas, définissez l'option sur NON et les nuitées minimums sur 1 et les nuitées maximums au maximum sur 5. <br/><strong> Uniquement les week-ends </strong> L'option est l'inverse de l'option Autoriser les week-ends. Les jours de semaine peuvent être configuré dans vos paramètres de configuration d'établissement. Cela vous permet aussi de définir un tarif week-end unique que vous voudrez peut-être proposer pour des événements spéciaux. <br /> <strong> Arrivées en semaine.</strong> Cette option vous permet de forcer l’enregistrement uniquement certains jours de la semaine. Il est préférable de l'utiliser conjointement avec les options Configuration des établissements > Réservations > Périodes fixes. La majorité des utilisateurs voudront laisser cette option définie sur Tous. <br/> Les deux dernières options, <strong> Nombre minimum de chambres déjà sélectionnées </ strong> et <strong> Nombre maximum de chambres déjà sélectionnées </ strong> sont très spécialisées et utiles pour les établissements avec des tarifs extrêmement compliqués.<em> Sauf si vous avez un besoin spécifique, vous devez laisser ces options de côté.</em> Utilisez-les, si vous souhaitez que ce tarif ne soit proposé que si le client a déjà sélectionné X nombre de chambres dans le formulaire de réservation ; par exemple, vous pouvez avoir un tarif de base où ces options sont laissées à la valeur par défaut et un deuxième tarif où l'option de chambres minimum déjà sélectionnées est définie sur 1, alors ce second tarif sera proposé dans le formulaire de réservation une fois la chambre sélectionnée.");
jr_define('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS_LIST_PAGE',"Vous pouvez créer plusieurs tarifs pour le même type de chambre. Ainsi, vous pouvez créer un tarif pour une période de 1 à 7 jours et un second tarif où le nombre de jours minimum est de 7, le nombre maximal de jours 14, etc. Cela vous permet de créer des schémas de tarification aussi simples ou aussi compliqués que vous le souhaitez. Il vous permet également de créer plusieurs tarifs avec différentes conditions, de sorte que vous puissiez avoir un deuxième ensemble de tarifs où le prix est inférieur pour Bed & Breakfast, et un autre ensemble de tarifs plus coûteux pour le lit + petit-déjeuner + repas du soir.");
jr_define('_JOMRES_MICROMANAGE_USE_SELECTED_DATES',"Définir uniquement les jours du sélecteur de date ");
