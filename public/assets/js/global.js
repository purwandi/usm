(function($, w, doc){
	w.App = {
		init: function(){

			/* Var definisi
			==================================================== */
            var form 	= $('#frm-question'),
            	target 	= $('#target'),
            	btnreq 	= $('#btn-request');


			/* Handle btn full screen click
			==================================================== */
			btnreq.click(function(e){
                $('#content').fullScreen({
                    'background'    : '#FFF',
                    'callback'      : function(fullScreen){
                        if ( ! fullScreen){
                        
                            $('#content').addClass('hide'); 
                        
                        } else {

                        	if ($('#countdown').html() == '') {

                        		$("#countdown").CountDown({
                        			interval: 1000,
	                        		startFrom: 1000,
	                        		callBack:function(){
	                        			alert('done');
	                        		}
	                        	});
                        	}
                        	
                            $('#content').removeClass('hide'); 
                        }
                    }
                });
            });


			/* Handle close
			==================================================== */
			$('#btn-close').click(function(e){
				$('#content').addClass('hide'); 
				$('#content').cancelFullScreen();
			});


			/* Handle Ajax Form
			==================================================== */
            form.ajaxForm({
            	dataType : 'json',
            	beforeSubmit : function(){},
            	success : function(response){
            		if (response.status == '200'){
            			target.removeClass().addClass('alert alert-success').html(response.message);
            		} else {
            			target.removeClass().addClass('alert alert-error').html(response.message);	
            		}
            	}
            });

		},
		
	};

})(jQuery, window, window.document);


/* Countdown
==================================================== */
$.fn.CountDown = function(settings,whereat) {
    settings = $.extend({
    	interval: 1000,
    	startFrom: 10,
    	endAt: 0,
    	callBack: function() { }
    }, settings);

	return this.each(function() {
	    if (whereat == null && whereat != settings.endAt) {
	    	whereat = settings.startFrom;
	    }

	    $(this).text(whereat);

	    if (whereat > settings.endAt) {

			whereat = whereat - 1;
			var eleCont = $(this);

			setTimeout(function(){
				eleCont.CountDown(settings, whereat);
			},settings.interval);

	    } else {

	    	$(this).text("Done");
	    	settings.callBack(this);
	    }
	});
};

<!--
//Disable right click script
//visit http://www.rainbow.arch.scriptmania.com/scripts/
var message="Sorry, right-click has been disabled";
///////////////////////////////////
function clickIE() {
	if (document.all) {
		(message);
		return false;
	}
}
function clickNS(e) {
	if (document.layers||(document.getElementById&&!document.all)) {
		if (e.which == 2|| e.which == 3) {
			(message);
			return false;
		}
	}
}
if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = clickNS;
}
else{
	document.onmouseup = clickNS;
	document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")