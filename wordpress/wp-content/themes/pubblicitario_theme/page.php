<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Pubblicitario_theme
 */

get_header(); ?>

	<?
		//setto il fuso orario
		date_default_timezone_set('Europe/Rome');
		
		//prendo l'ora corrente
		$oraCorrente = strftime("%H");

		//imposto l'oggetto articolo di default
		$articolo_da_leggere  = get_field("articolo_default");

		//ciclo le fascie orario impostate
		while (have_rows('articoli_a_schermo')){
			the_row();
			$dalleOre = get_sub_field('dalle_ore');
			$alleOre = get_sub_field('alle_ore');

			if ($oraCorrente >= $dalleOre && $oraCorrente < $alleOre) {
				$articolo_da_leggere  = get_sub_field("articolo_selezionato");
			}
		}

		
		$idArticolo = $articolo_da_leggere->ID;
		



	?>

	

	<div class="swiper-container">
        <div class="swiper-wrapper">
	        <?
	        while (have_rows('contenuti',$idArticolo)) {
	        	the_row();
	        	$immagini = get_sub_field('foto');
	        ?>
	        	 <div class="swiper-slide"><img src="<?=$immagini?>" /></div>
	        <?
	        }
	        ?>
	    	<div class="swiper-pagination"></div>
    	</div>
	</div>


    <div class="marquee" id="messageBox">
    </div>


	 <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        centeredSlides: true,
        autoplay: 2500,
        effect: 'fade'
    });


    function getMessages(){
    	$.ajax({
          dataType: "json",
          url: 'http://localhost:8888/webservice/apis.php',
          data:{},
          cache:false,
          success: function(datiricevuti){
          	if (datiricevuti.messages.length > 0) {

          		messaggi=datiricevuti.messages;
          		messaggioText='';

          		for (var i = 0; i < messaggi.length; i++) {
          			messaggioText += messaggi[i].message + ' &nbsp; &nbsp; - &nbsp; &nbsp; ';
          		}
          		$('#messageBox').html(messaggioText);
          		$('.marquee').marquee({
          			//speed in milliseconds of the marquee
				    duration: 15000,
				    //gap in pixels between the tickers
				    gap: 50,
				    //time in milliseconds before the marquee will start animating
				    delayBeforeStart: 0,
				    //'left' or 'right'
				    direction: 'left',
				    //true or false - should the marquee be duplicated to show an effect of continues flow
				    duplicated: false
          		});

          	};
            console.log(datiricevuti);
          }

      });  
    }

    $(document).ready(function(){
    	getMessages();
    	$('.marquee').bind('finished', function(){
          			getMessages();
          		});
    	
    	//setInterval(function(){ getMessages(); }, 1*60*1000); //5 minuti
    });
    </script>

		
		

<?php get_footer(); ?>
