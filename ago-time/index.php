<?php

	define( "TIMEBEFORE_NOW", 'now' );
	define( "TIMEBEFORE_MINUTE",		'{num} minute ago' );
	define( "TIMEBEFORE_MINUTES",		'{num} minutes ago' );
	define( "TIMEBEFORE_HOUR",		'{num} hour ago' );
	define( "TIMEBEFORE_HOURS",		'{num} hours ago' );
	define( "TIMEBEFORE_YESTERDAY",	'yesterday' );
	define( "TIMEBEFORE_FORMAT",		'%e %b' );
	define( "TIMEBEFORE_FORMAT_YEAR",	'%e %b, %Y' );

	function time_before( $time )
	{
		$out	= '';
		$now	= time();
		$diff	= $now - $time;

		if( $diff < 60 )
			return TIMEBEFORE_NOW;

		elseif( $diff < 3600 )
			return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

		elseif( $diff < 3600 * 24 )
			return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

		elseif( $diff < 3600 * 24 * 2 )
			return TIMEBEFORE_YESTERDAY;

		else
			return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
	}

?><!DOCTYPE html>

<html lang="en" class="no-js">

<head>
	<meta charset="utf-8" />
	<title>A Better Way To Present Time On the Web demo by Osvaldas Valutis</title>
	<meta name="robots" content="all">
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="main.css" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,400" />
	<style>

		html
		{
		}
			body
			{
				font-family: Roboto, sans-serif;
				color: #403d44;
				background-color: #ffcdb2;
				padding: 5rem 1.25rem; /* 80 20 */
			}

			.container
			{
				width: 100%;
				max-width: 42.5rem; /* 680 */
				text-align: center;
				margin: 0 auto;
			}

				.container header
				{
				}
					.container h1
					{
						font-size: 2.625rem; /* 42 */
						font-weight: 300;
						color: #403d44;
					}
					.container h1 a:hover,
					.container h1 a:focus
					{
						color: #b5838d;
					}
					.container p
					{
						color: #716b77;
						margin-top: 1.25rem; /* 20 */
					}

				.box
				{
					width: 100%;
					font-size: 1.25rem; /* 20 */
					background-color: #ffb4a2;
					padding: 2.5rem; /* 40 */
					margin-top: 2.5rem; /* 40 */
				}
				.box.is-highlight
				{
					-webkit-animation: shake .1s 5 ease-in-out;
					animation: shake .1s 5 ease-in-out;
				}
					@-webkit-keyframes shake
					{
						0%		{ -webkit-transform: rotate( 0deg ); }
						25%		{ -webkit-transform: rotate( 2deg ); }
						50%		{ -webkit-transform: rotate( 0deg ); }
						75%		{ -webkit-transform: rotate( -2deg ); }
						100%	{ -webkit-transform: rotate( 0deg ); }
					}
					@keyframes shake
					{
						0%		{ transform: rotate( 0deg ); }
						25%		{ transform: rotate( 2deg ); }
						50%		{ transform: rotate( 0deg ); }
						75%		{ transform: rotate( -2deg ); }
						100%	{ transform: rotate( 0deg ); }
					}

					.box time
					{
						font-weight: 700;
						cursor: help;
					}

	</style>

</head>

<body>




<div class="container" role="main">

	<header>
		<h1><a href="/link-to-the-article">A Better Way To Present Time On the Web</a></h1>
		<p>Wait for <strong class="the-counter">60</strong> seconds for real-time date increments.</p>
	</header>

	<section class="box">
		Published <time data-time="<?=( $time = time() )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

	<section class="box">
		Published <time data-time="<?=( $time = strtotime( '-1 minute' ) )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

	<section class="box">
		Published <time data-time="<?=( $time = strtotime( '-3 hours' ) )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

	<section class="box">
		Published <time data-time="<?=( $time = strtotime( '-25 hours' ) )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

	<section class="box">
		Published <time data-time="<?=( $time = strtotime( '-2 days' ) )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

	<section class="box">
		Published <time data-time="<?=( $time = strtotime( '-1 year -2 days' ) )?>" datetime="<?=date( 'Y-m-d', $time )?>" title="<?=strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time )?>"><?=time_before( $time )?></time>
	</section>

</div>




<!--

	JQUERY DEPENDENCY

-->

<script src="jquery-v1.min.js"></script>
<script>

	'use strict';

	;( function( $, window, document, undefined )
	{
		var $elements		= $( 'time[data-time]' ),
			strNow			= '<?=TIMEBEFORE_NOW?>',
			strMinute		= '<?=TIMEBEFORE_MINUTE?>',
			strMinutes		= '<?=TIMEBEFORE_MINUTES?>',
			strHour			= '<?=TIMEBEFORE_HOUR?>',
			strHours		= '<?=TIMEBEFORE_HOURS?>',
			strYesterday	= '<?=TIMEBEFORE_YESTERDAY?>',
			updateDates		= function()
			{
				$elements.each( function()
				{
					var $this	= $( this ),
						time	= $this.attr( 'data-time' ),
						now		= Math.round( new Date().getTime() / 1000 ),
						diff	= now - time,
						out		= '';

					if( diff < 60 )
						out = strNow;

					else if( diff < 3600 )
						out = ( ( out = Math.round( diff / 60 ) ) == 1 ? strMinute : strMinutes ).replace( '{num}', out );

					else if( diff < 3600 * 24 )
						out = ( ( out = Math.round( diff / 3660 ) ) == 1 ? strHour : strHours ).replace( '{num}', out );

					else if( diff < 3600 * 24 * 2 )
						out = strYesterday;

					else
						out = $this.attr( 'title' );

					$this.text( out );
				});
				setTimeout( updateDates, 1000 * 60 );
			};

		setTimeout( updateDates, 1000 * 60 );

	})( jQuery, window, document );

</script>



<!--

	NO-DEPENDENCIES (IE 9+)

-->

<!--
<script>

	'use strict';

	;( function ( document, window, index )
	{
		var elements		= document.querySelectorAll( 'time[data-time]' ),
			strNow			= '<?=TIMEBEFORE_NOW?>',
			strMinute		= '<?=TIMEBEFORE_MINUTE?>',
			strMinutes		= '<?=TIMEBEFORE_MINUTES?>',
			strHour			= '<?=TIMEBEFORE_HOUR?>',
			strHours		= '<?=TIMEBEFORE_HOURS?>',
			strYesterday	= '<?=TIMEBEFORE_YESTERDAY?>',
			updateDates		= function()
			{
				Array.prototype.forEach.call( elements, function( entry )
				{
					var time	= entry.getAttribute( 'data-time' ),
						now		= Math.round( new Date().getTime() / 1000 ),
						diff	= now - time,
						out		= '';

					if( diff < 60 )
						out = strNow;

					else if( diff < 3600 )
						out = ( ( out = Math.round( diff / 60 ) ) == 1 ? strMinute : strMinutes ).replace( '{num}', out );

					else if( diff < 3600 * 24 )
						out = ( ( out = Math.round( diff / 3660 ) ) == 1 ? strHour : strHours ).replace( '{num}', out );

					else if( diff < 3600 * 24 * 2 )
						out = strYesterday;

					else
						out = entry.getAttribute( 'title' );

					entry.textContent = out;
				});
				setTimeout( updateDates, 1000 * 60 );
			};

		setTimeout( updateDates, 1000 * 60 );

	}( document, window, 0 ));

</script>
-->



<!-- COUNTER FOR DEMO (YOU DO NOT NEED TO USE THE CODE BELOW) -->

<script>

	'use strict';

	;( function( $, window, document, undefined )
	{
		var $element	  = $( '.the-counter' ),
			$boxes		  = $( '.box' ).slice( 0, 2 ),
			count		  = 60,
			updateCounter = function()
			{
				count--;
				if( count < 0 )
				{
					count = 60;
					$boxes.addClass( 'is-highlight' );
					setTimeout( function(){ $boxes.removeClass( 'is-highlight' ); }, 3000 );
				}
				$element.text( count );
				setTimeout( updateCounter, 1000 );
			};

		updateCounter();

	})( jQuery, window, document );

</script>




</body>

</html>