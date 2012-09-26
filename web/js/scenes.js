// soumission du formulaire formChangerScene
function soumettreFormChangerScene(clefOutil) {
	// mise à jour du formulaire avec la clef de l'outil sélectionné
	$('input[name="clefOutil"]').val(clefOutil);
	
	// submit du formulaire formChangerScene
	$.ajax({
		url: $('#formChangerScene').attr("action"),
		type: $('#formChangerScene').attr("method"),
		data: $('#formChangerScene').serialize(),
		success: function (reponse) {
			// Mise à jour du numéro de la scène
			$('input[name="numSceneCourante"]').val(reponse.numScene);
			// Mise à jour de la scène
			$('section[id="sectionScene"] img').attr('src', reponse.imageScene);
			$('section[id="sectionScene"] img').attr('alt', reponse.nomScene);
			// Mise à jour du message (Oh !, Oups., ...)
			$('section[id="sectionMessage"] img').attr('src', reponse.imageMessage);
			$('section[id="sectionMessage"] img').attr('alt', reponse.nomMessage);
		},
		error: function() {
			alert('Une erreur est survenu ; la page va être rechargé.');
			document.location.reload();
		}
	});
};


// stop la musique si elle est active, lance la musique si elle est arrêtée
function controlerMusique(srcMusiqueOn, srcMusiqueOff) {
	srcMusiqueCourant = $('nav#navMusique a#boutonMusique img').attr('src');
	
	if (srcMusiqueCourant == srcMusiqueOn) {
		// la musique est active, on la stop et on modife l'image du bouton musique
		document.querySelector('audio#musiqueLaPtitHistoire').pause();
		$('nav#navMusique a#boutonMusique img').attr('src', srcMusiqueOff);
		
	} else {
		// la musique est arrêtée, on la lance et on modife l'image du bouton musique
		document.querySelector('audio#musiqueLaPtitHistoire').play();
		$('nav#navMusique a#boutonMusique img').attr('src', srcMusiqueOn);
	}
}