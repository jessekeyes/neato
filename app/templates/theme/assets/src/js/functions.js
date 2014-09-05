/**
	* Functions javascript.
	*
	* General application/site javascript functions.
*/

var waitForFinalEvent = (function()
{
	var timers = {};
	return function ( callback, ms, uniqueId )
	{
		if ( !uniqueId )
			uniqueId = "Don't call this twice without a uniqueId";
		if ( timers[uniqueId] )
			clearTimeout (timers[uniqueId]);
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// WP loads jquery in no-conflict mode so we do this.
jQuery(function($)
{

	// global and common functions

	// resize js functions live here
	$(window).on( 'load resize orientationchange', function()
	{
		waitForFinalEvent( function()
		{
			// place all responsive functions here
		}, 250 );
	});

});
// end ready