<!DOCTYPE html>
<html>
 
	<head>
 
	    <!-- En-tête du document  -->
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   
	    <!-- Balise meta  -->
	    <meta name="title" content="Titre de la page" />
	    <meta name="description" content="description de la page" />
	    <meta name="keywords" content="mots-clé1, mots-clé2, ..." />
	   
	    <!-- Indexer et suivre -->
	    <meta name="robots" content="index,follow" />
	   
	    <!-- Incorporez du CSS dans la page  -->
	    <style type="text/css" media="screen">
	      p { color:red; }
	    </style>
	   
	    <!-- Relier un fichier JavaScript  -->
	    <!-- Script -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	    <!-- jQuery UI -->
	    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

		<script type="text/javascript" src="js/site.js"></script>
	   
	    <noscript>La balise SCRIPT s'accompagne souvent de sa balise inverse : NOSCRIPT. Cette dernière contient un message à afficher si le script n'est pas supporté. Vous n'est pas obligé de mettre cette balise.
	    </noscript>

  	</head>
 
 
  	<body>
 
	    <!-- CORPS DE LA PAGE  -->
	    <h3>Bienvenue sur le portail des projets</h3>
	    
	    <form method="POST" action="index.php" onsubmit="return validate_form_project();">

	    	<?php include_once("treatment.inc.php"); ?>
		    
		    <?php if (isset($id) && $id != "") { ?>
	    	<div class="row">Modification d'un projet</div>
		    <div class="row">
		    	<label>ID </label>&nbsp; &nbsp; <?php echo $id; ?>
		    	<input type="hidden" name="id_" id="id_" size="64" value="<?php echo $id; ?>" autocomplete="false" />
		    </div>
			<?php } else { ?>
				<div class="row">Ajout d'un projet</div>
			<?php } ?>

		    <div class="row">
		    	<label>Titre : </label>
		    	<input type="text" name="title" id="title" placeholder="Titre" size="64" value="<?php echo isset($title) ? $title : ""; ?>" autocomplete="false" />
		    </div>
		    <div class="row">
		    	<label>Description : </label>
		    	<textarea name="description" id="description" placeholder="Lorem ipsum Lorem ipsum" rows="15" cols="64" autocomplete="false"><?php echo isset($description) ? $description : ""; ?></textarea>
		    </div>
		    <div class="row">
		    	<label>Date de début : </label>
		    	<input type="text" name="start_date" id="start_date" placeholder="2020-05-17" size="64" value="<?php echo isset($start_date) ? $start_date : ""; ?>" autocomplete="false" />
		    </div>
		    <div class="row">
		    	<label>Date d'&eacute;ch&eacute;ance : </label>
		    	<input type="text" name="due_date" id="due_date" placeholder="2020-05-17" size="64" value="<?php echo isset($due_date) ? $due_date : ""; ?>" autocomplete="false">
		    </div>
		    <div class="row">
		    	<input type="submit" name="valid_project" id="valid_project" value="Valider" />
		    </div>
		</form>
		<br/>
		
		<?php include_once("project.list.php"); ?>

	</body>
</html>
