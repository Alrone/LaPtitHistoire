<?php

namespace Histoire;

/**
 * Liste de constantes
 */
class Constantes {
	
	// chemin vers le repertoire Scènes contenant les images des scènes
	const REPERTOIRE_SCENES = 'images/scenes/';
	const NOM_IMAGE_SCENE = 'scene_'; 		// nom des images des scènes sans le numéro
	const PNG = '.png'; 					// type des images des scènes : .png
	
	const REPERTOIRE_MESSAGES = 'images/messages/';
	const NOM_IMAGE_MESSAGE_VIDE = 'messageVide';
	const NOM_IMAGE_MESSAGE_OH = 'oh';
	const NOM_IMAGE_MESSAGE_OUPS = 'oups';
	const NOM_IMAGE_MESSAGE_POINTS_SUSPENSIONS = 'pointsDeSuspensions';
	
	const OUTIL_EFFICACE = true;			// Un outil efficace fait passer à la scène suivante.
	const OUTIL_DESTRUCTEUR = false;		// Un outil destructeur fait reculer à la scène précédente
	
	// clefs des outils (eau, soleil, graines, pipeau, lettre N et temps)
	const CLEF_EAU = 'eau';
	const CLEF_SOLEIL = 'soleil';
	const CLEF_GRAINES = 'graines';
	const CLEF_PIPEAU = 'pipeau';
	const CLEF_TEMPS = 'temps';
	const CLEF_LETTRE_N = 'lettreN';
	
	// liste des clefs des outils (eau, soleil, graines, pipeau, lettre N et temps)
	public static $clefsOutils = array (self::CLEF_EAU, self::CLEF_SOLEIL, self::CLEF_GRAINES, self::CLEF_PIPEAU, self::CLEF_TEMPS, self::CLEF_LETTRE_N);
	
	// Liste des outils efficaces et destructeurs de chaque scène (le numéro de chaque scène sert de clef 
	public static $outilsParScene = array(
		1 => array(
			// pas d'outil destructeur pour la 1ère scène car il n'y a pas de scène précédente
			self::OUTIL_EFFICACE => self::CLEF_EAU,
			self::OUTIL_DESTRUCTEUR => ''
		),
		2 => array(
			self::OUTIL_EFFICACE => self::CLEF_EAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_SOLEIL
		),
		3 => array(
			self::OUTIL_EFFICACE => self::CLEF_GRAINES,
			self::OUTIL_DESTRUCTEUR => self::CLEF_SOLEIL
		),
		4 => array(
			self::OUTIL_EFFICACE => self::CLEF_EAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_TEMPS
		),
		5 => array(
			self::OUTIL_EFFICACE => self::CLEF_SOLEIL,
			self::OUTIL_DESTRUCTEUR => self::CLEF_PIPEAU
		),
		6 => array(
			self::OUTIL_EFFICACE => self::CLEF_TEMPS,
			self::OUTIL_DESTRUCTEUR => self::CLEF_PIPEAU
		),
		7 => array(
			self::OUTIL_EFFICACE => self::CLEF_GRAINES,
			self::OUTIL_DESTRUCTEUR => self::CLEF_SOLEIL
		),
		8 => array(
			self::OUTIL_EFFICACE => self::CLEF_EAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_TEMPS
		),
		9 => array(
			self::OUTIL_EFFICACE => self::CLEF_SOLEIL,
			self::OUTIL_DESTRUCTEUR => self::CLEF_PIPEAU
		),
		10 => array(
			self::OUTIL_EFFICACE => self::CLEF_PIPEAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_SOLEIL
		),
		11 => array(
			self::OUTIL_EFFICACE => self::CLEF_PIPEAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_TEMPS
		),
		12 => array(
			self::OUTIL_EFFICACE => self::CLEF_PIPEAU,
			self::OUTIL_DESTRUCTEUR => self::CLEF_TEMPS
		),
		13 => array(
			self::OUTIL_EFFICACE => self::CLEF_TEMPS,
			self::OUTIL_DESTRUCTEUR => self::CLEF_PIPEAU
		),
		14 => array(
			self::OUTIL_EFFICACE => self::CLEF_TEMPS,
			self::OUTIL_DESTRUCTEUR => self::CLEF_PIPEAU
		),
		15 => array(
			self::OUTIL_EFFICACE => self::CLEF_LETTRE_N,
			self::OUTIL_DESTRUCTEUR => self::CLEF_TEMPS
		),
		16 => array(
			self::OUTIL_EFFICACE => '',
			self::OUTIL_DESTRUCTEUR => ''
		)
	);
}