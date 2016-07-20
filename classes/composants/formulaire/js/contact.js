$(document).ready(function(){
   // 1.Je récupère la valeur de la balise <select>, au moment de la sélection
   $("#domain").change(function(){
   		var filiere = $('#domain').val();

   		// 2.J'envoie les valeurs récupérées vers le fichier php traitant le formulaire
  		$.post('gestion_formulaire_contact.php', { nom_filiere : filiere }, function(data) {
  			// 3.J'affiche les données dans les balises correspondantes
  			var src = (data["logo_filiere"] == "")?"":"img/"+data["logo_filiere"];
  			$("#logo_filiere").attr("src", src); 
  			$('#nom_coordo').html(data["nom_coordo"]); 
  			$('#nom_responsable').html(data["nom_responsable"]);
  			$('#telephone').html(data["telephone"]);
  		}, "json") .fail( function(xhr, textStatus, errorThrown) {
        	alert(errorThrown+ " : "+ xhr.responseText);
    	});
	});
   
});