<?php

namespace Histoire\PtitHistoireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Histoire\Constantes;


class ScenesController extends Controller {

	/**
	 * Ecran d'accueil
	 *
	 * @Route("/", name="index")
	 */
	public function indexAction() {
		// initialisation avec la 1ère scène
		$nomImageScene = Constantes::NOM_IMAGE_SCENE . '1';
		$imageScene = Constantes::REPERTOIRE_SCENES . $nomImageScene . Constantes::PNG;
		
		$nomImageMessage = Constantes::NOM_IMAGE_MESSAGE_VIDE;
		$imageMessage = Constantes::REPERTOIRE_MESSAGES . $nomImageMessage . Constantes::PNG;
				
		return $this->render('HistoirePtitHistoireBundle:Scenes:scenes.html.twig', array(
			'clefsOutils' => Constantes::$clefsOutils,
			'imageScene' => $imageScene,
			'nomScene' => $nomImageScene,
			'numScene' => 1,
			'imageMessage' => $imageMessage,
			'nomMessage' => $nomImageMessage
		));
	}
	
	
	/**
	 * Passer à la scène suivante ou la scène précédente selon l'outil utilisé
	 * 
	 * @Route("/changerScene", name="changerScene")
	 */
	public function changerSceneAction() {
		// récupération des paramètres (numero de la scène en cours et clef de l'outil sélectionné)
		$request = $this->get('request');
		$numSceneCourante = $request->request->get('numSceneCourante');
		$clefOutil = $request->request->get('clefOutil');

		$outilsSceneCourante = Constantes::$outilsParScene[$numSceneCourante];
		
		if ( $clefOutil == $outilsSceneCourante[Constantes::OUTIL_EFFICACE] ) {
		// Si l'outil sélectionné est le bon
			// On passe à la scène suivante
			$numSceneCourante++;
			// on affiche le message "Oh !"
			$nomImageMessage = Constantes::NOM_IMAGE_MESSAGE_OH;
			$imageMessage = Constantes::REPERTOIRE_MESSAGES . $nomImageMessage . Constantes::PNG;
		
		} elseif ( $clefOutil == $outilsSceneCourante[Constantes::OUTIL_DESTRUCTEUR] ) {
		// Si l'outil sélectionné est le mauvais
			// on revient à la scène précédente
			$numSceneCourante--;
			// on affiche le message "Oups."
			$nomImageMessage = Constantes::NOM_IMAGE_MESSAGE_OUPS;
			$imageMessage = Constantes::REPERTOIRE_MESSAGES . $nomImageMessage . Constantes::PNG;
			
		} else {
		// Si l'outil sélectionné n'est ni le bon ni le mauvais
			// on garde la scène courante
			// on affiche le message "..."
			$nomImageMessage = Constantes::NOM_IMAGE_MESSAGE_POINTS_SUSPENSIONS;
			$imageMessage = Constantes::REPERTOIRE_MESSAGES . $nomImageMessage . Constantes::PNG;
		}
		
		$nomImageScene = Constantes::NOM_IMAGE_SCENE . $numSceneCourante;
		$imageScene = Constantes::REPERTOIRE_SCENES . $nomImageScene . Constantes::PNG;
		
		// retourne la réponse Json
		$response = new Response();
		$response->headers->set('Content-type', 'application/json');		
		$response->setContent(
			json_encode( array(
				'imageScene' => $imageScene,
				'nomScene' => $nomImageScene,
				'numScene' => $numSceneCourante,
				'imageMessage' => $imageMessage,
				'nomMessage' => $nomImageMessage					
			))
		);
		
		return $response;
	}
}