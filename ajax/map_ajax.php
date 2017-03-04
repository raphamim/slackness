<?php

	if (isset($_POST) && isset($_POST['function']) && is_callable($_POST['function'])) {
		echo call_user_func($_POST['function'], $_POST);
	}

	function free_case($x, $y, $map) {
		foreach ($map['elements'] as $element) {
			if (($x == $map['player']['x_start'] && $y == $map['player']['y_start']) || ($x == $element['x'] && $y == $element['y'])) {
				return false;
			}
		}
		return true;
	}

	function place_elements($map, $count, $type) {

		for ($i = 1; $i <= $count; $i++) {
			do {
				$x = rand(2, $map['width']-1);
				$y = rand(2, $map['height']-1);
			} while (!free_case($x, $y, $map));
			array_push($map['elements'], array(
				'width' => 1,
				'height' => 1,
				'type' => $type,
				'x' => $x,
				'y' => $y
			));
		}
		return $map;
	}

	function genere_map($post) {

		$map = array(
			'pixels' => 15,
			'width' => 30,
			'height' => 30,
			'player' => array(
				'x_start' => 10,
				'y_start' => 10
			),
			'elements' => array(
				array(
					'width' => 1,
					'height' => 1,
					'type' => 'exit',
					'x' => 28,
					'y' => 28
				),
				array(
					'width' => 1,
					'height' => 1,
					'type' => 'exit',
					'x' => 28,
					'y' => 29
				),
				array(
					'width' => 1,
					'height' => 1,
					'type' => 'exit',
					'x' => 29,
					'y' => 28
				),
				array(
					'width' => 1,
					'height' => 1,
					'type' => 'level',
					'x' => 29,
					'y' => 29
				),
			)
		);

		$nbEnemies = $post['nbEnemies'];
		$nbBricks = 50;
		$nbBox = 30;

		$map = place_elements($map, $nbEnemies, 'enemy');
		$map = place_elements($map, $nbBricks, 'brick');
		$map = place_elements($map, $nbBox, 'box');

		return json_encode(array('map' => $map));
	}