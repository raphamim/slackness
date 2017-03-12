var player_pos = {};
var map = null;
var sens = 'right';
var lifepoints = 3;
var directions = ['left', 'top', 'right', 'bottom'];
var nbEnemies = 3;
var enemiesInterval = null;
var gameInterval = null;
var seconds = 1;
var score = 0;
var level = 1;

// -------------------- Début Fonction JS/POO --------------------



function refreshDatasPoo(){
	$.ajax({
		url: "ajax/refresh_datas_poo.php",
		data: {
			player: $('#pseudo-first span').html(),
			level: level,
			score: score,
			life: lifepoints,
			time: seconds,
			function: 'alive'
		},
		method: "POST"
	}).done(function(data){
		// console.log('Envoie réussis = '+data);
	}).fail(function(error){
		// console.log(error);
		
	});
}


// -------------------- Fin fonction JS/POO --------------------

// Fonction pour créer un futur élément et le personnaliser 
function put_element(v, className) {
	$('#col-' + v.y + '-' + v.x).addClass(className);
	for (var row = 0; row < v.width; row++) {

		$('#col-' + v.y + '-' + (v.x + row)).addClass(className).data('type', className);

		for (var col = 0; col < v.height; col++) {

			$('#col-' + (v.y+col) + '-' + (v.x+row)).addClass(className).data('type', className);
		}
	}
}

// Fonction pour rajouter un élément a la map
function create_elements() {
	$.each(map.elements, function(k, v) {
		put_element(v, v.type);
	});
}

// Fonction qui anime la perte d'une vie
function animLesslife() {
	$('#less-life').show();
	$('#less-life').fadeToggle(2000);
	setTimeout(function(){$('#less-life').hide();}, 3000);
}

//Si l'élément est déplacable
function is_movable(type) {
	switch (type) {
		case 'box':
		case 'enemy':
		case 'player':
			return true;
		default:
			return false;
	}
}

//Récuperer la position précédente
function get_previous_position(direction, x, y) {
	switch (direction) {
		case 'left':
			x++;
			break;
		case 'top':
			y++;
			break;
		case 'right':
			x--;
			break;
		case 'bottom':
			y--;
			break;
	}
	return get_cell(x, y);
}

// Fonction pour envoyer les informations vers la bases de données
function sendDatas() {
	$.ajax({
		url: "ajax/send_datas.php",
		data: {
			player: $('#pseudo-first span').html(),
			level: $('#levels span').html(),
			score: $('#scores span').html(),
			function: 'sendDatas'
		},
		method: "POST"
	}).done(function(data){
		// console.log(data);
	}).fail(function(error){
		// console.log(error);
		
	});
}
// Fonction qui se déclenche lors de la perte d'un point de vie
function game_over() {
	$('#lifepoints').html('Nombre de vie(s) : ' +lifepoints);
	if (0 == lifepoints) {
		//console.log('finish');
		sendDatas();
		$('#game-area').fadeToggle(2000); 
		$('#game-infos').fadeToggle(2000); 
		setTimeout(function(){ document.location.href="game_over.php"}, 3000); 

	}
}

// Fonction pour récupérer le niveau actuel
function level_up(){
	$('#levels').html('Tu es seulement au niveau <span>'+level+'</span> feignasse !');
}

// Fonction pour définir les réactions selon les cases ou se déplace le player 
function player_cases(direction, x, y, element) {
	switch (element.data('type')) {
		case 'box':
			if (!element_can_move(direction, x, y, 'box')) {
				return false;
			}
			break;
		case 'brick':
		case 'exit':
			return false;
		case 'enemy':
			lifepoints--;
			refreshDatasPoo();
			animLesslife();
			game_over();
			break;
		case 'level':
			nbEnemies *= 2;
			clearInterval(enemiesInterval);
			clearInterval(gameInterval);
			genere_map(nbEnemies);
			lifepoints++;
			level++;
			score += 500;
			refreshDatasPoo();
			return false;
	}
	var player = get_cell(player_pos.x, player_pos.y);
	player.removeClass('player-' + sens);
	switch (direction) {
		case 'left':
		case 'right':
			sens = direction;
			break;
	}
	element.addClass('player-' + sens);
	player_pos.x = x;
	player_pos.y = y;
}

// Fonction qui gère les évenements lorsque l'on pousse des cases 
function box_cases(direction, x, y, element) {
	switch (element.data('type')) {
		case 'brick':
		case 'box':
		case 'exit':
			return false;
			refreshDatasPoo();
		case 'enemy':
			element.data('type', '').removeClass('enemy');
			score += 150;
			showScore();
			refreshDatasPoo();
			if ($('.enemy').length == 0) {
				// Si il n'y a plus d'énnemis on dégage la sortie 
				$('.exit').data('type', '').removeClass('exit');
			}
			break;
	}
	previous_element = get_previous_position(direction, x, y);
	previous_element.data('type', '').removeClass('box');
	element.data('type', 'box').addClass('box');
	return true;
}

// Fonction pour gérer l'emplacement des ennemis et leurs attaques
function enemy_cases(direction, x, y, element) {
	switch (element.data('type')) {
		case 'brick':
		case 'box':
		case 'enemy':
		case 'exit':
			return false;
	}
	if (element.hasClass('player-' + sens)) {
		lifepoints--;
		refreshDatasPoo();
		animLesslife();
		game_over();
	}

	previous_element = get_previous_position(direction, x, y);
	previous_element.data('type', '').removeClass('enemy');
	element.data('type', 'enemy').addClass('enemy');
	return true;
}

// Ajoute une case selon la position
function get_cell(x, y) {
	return $('#col-' + y + '-' + x);
}

// Gestion des autorisations de mouvement d'un élément
function element_can_move(direction, x, y, type) {
	if ('left' === direction && --x == 1 ||
		'right' === direction && ++x == map.width ||
		'top' === direction && --y == 1 ||
		'bottom' === direction && ++y == map.height
	) {
		return false;
	}
	if (!is_movable(type)) {
		return false;
	}

	return window[type + '_cases'](direction, x, y, get_cell(x, y));
}

// Mouvement du joueur si autorisation
function player_movements() {

	$('body').unbind('keydown').keydown(function(e) {

		switch (e.which) {

			case 37:
				element_can_move('left', player_pos.x, player_pos.y, 'player');
				break;
			case 38:
				element_can_move('top', player_pos.x, player_pos.y, 'player');
				break;
			case 39:
				element_can_move('right', player_pos.x, player_pos.y, 'player');
				break;
			case 40:
				element_can_move('bottom', player_pos.x, player_pos.y, 'player');
				break;
		}
	});

}

//Mouvement des ennemis généré aléatoirement et si autorisation
function init_enemies_movements() {
	enemiesInterval = setInterval(function() {

		$('.enemy').each(function(k, v) {
			var id = $(this).attr('id').split('-');
			direction = directions[Math.floor(Math.random() * 4)];
			element_can_move(direction, id[2], id[1], 'enemy');
		});

	}, 1000);
}

// Initialisation du temps de jeu 
function initGameTime() {
	gameInterval = setInterval(function() {
		$('#game-time').html('Temps de jeu : <span>' + seconds + '</span> seconde(s)');
		seconds++;
	}, 1000);
}

// Fonction pour récupérer le score
function showScore() {
	$('#scores').html('Score : <span>' +score+'</span>');
}
// Création de la Map en ajax
function genere_map() {

	$.ajax({
		url: 'ajax/map_ajax.php',
		data: {
			'function': 'genere_map',
			'nbEnemies': nbEnemies
		},
		type: 'POST',
		dataType: 'json'
	}).done(function(data) {
		
		map = data.map;
		var html = '';

		var classRow = '';
		var classCell = '';
		for (var i = 1; i <= data.map.height; i++) {

			classRow = '';
			if (i == 1 || data.map.height == i) {
				classRow = 'border';
			}
			html += '<div class="row '+ classRow +'">';
			for (var col = 1; col <= data.map.width; col++) {
				classCell = '';
				if (col == 1 || col == data.map.width) {
					classCell = 'border';
				}
				html += '<div class="cell '+ classCell +'" id="col-'+i+'-'+col+'"></div>';
			}
			html += '</div>';

		}

		$('#game-area').html(html);
		$('#game-area .cell').css(
			{
				'width': 2 + '%',
				'height': 27 + 'px',
			}
		);
		$('#game-area .row').css(
			{
				'height': 25 + 'px'
			}
		);

		$('#col-' + data.map.player.y_start + '-' + data.map.player.x_start).addClass('player-right');

		create_elements();

		player_pos.x = data.map.player.x_start;
		player_pos.y = data.map.player.y_start;

		player_movements();
		init_enemies_movements();
		$('#lifepoints').html('Nombre de vie(s) : <span>' +lifepoints+'</span>');
		$('#levels').html('Niveau : <span>' +level+'</span>');
		showScore();
		initGameTime();


	}).fail(function() {
		// Gestion des erreurs
		alert('AJAX error');
	});

}

$(document).ready(function() {
	// Génerer la map quand le dom est chargé
	genere_map();
});