<?php 
	switch ($player->getFace()) {
		case 'basic':
			echo '<style type="text/css">
                        .player-right {
                                background-image: url("web/pictures/right.png");
                                background-size: 100% 87%;
                                        }

                                .player-left {
                                    background-image: url("web/pictures/left.png");
                                    background-size: 100% 87%;
                                                }
                                                </style>';
			break;

		case 'captamerica':
            		echo '<style type="text/css">
                .player-right, .player-left {
                background-image: url("web/pictures/char/captamerica.png");
                background-size: 100% 87%;
            }

           
            </style>';
			break;

		case 'homer':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/homersimpson.png");
                    background-size: 100% 87%;
                }

    
                </style>';
			break;

		case 'iron':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/ironman.png");
                    background-size: 100% 87%;
                }

               
                </style>';
			break;

		case 'mickey':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/mickey.png");
                    background-size: 100% 87%;
                }

               
                </style>';
			break;
			
		case 'stitch':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/stitch.png");
                    background-size: 100% 87%;
                }

                
                </style>';
			break;
			
		case 'winnie':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/winnie.png");
                    background-size: 100% 87%;
                }

                </style>';
			break;

		case 'yoda':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/yoda.png");
                    background-size: 100% 87%;
                }

                
                </style>';
			break;		
		
		default:
                			echo '<style type="text/css">
                    .player-right {
                    background-image: url("web/pictures/right.png");
                    background-size: 100% 87%;
                }

                .player-left {
                    background-image: url("web/pictures/left.png");
                    background-size: 100% 87%;
                }
                </style>';
			break;
	}
 ?>