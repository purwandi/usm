(function($, w, doc){
    w.App = {
        init: function(){

            // var definition
            var chkConfirm  = $('#chkterm'),
                btnMulai    = $('#btn-mulai'),
                content     = $('#fullscreen'),
                frm         = $('#frm-jawab'),
                frmTarget   = $('#frm-target'),
                btnClose    = $('#btn-Close');

            // first disable button mulai
            btnMulai.attr('disabled', true);

            // check if user confirm of term
            chkConfirm.click(function(){
                if (chkConfirm.attr('checked')) {
                    btnMulai.attr('disabled', false);
                } else {
                    btnMulai.attr('disabled', true);
                }
            });
            
            // start click full screen
            btnMulai.click(function(){
                
                // go request full screen
                content.fullScreen({
                    'background' : '#FFF',
                    'callback' : function(fullScreen){

                        // if not full screen mode
                        if ( ! fullScreen) {
                            // remove hide class on target
                            content.html('');
                        
                        } else {
                            
                            // Fire ajax call
                            $.ajax({
                                type : 'GET',
                                url  : '/api/jawab?csrf_token='+ CSRF_TOKEN,
                                dataType : 'json',
                                success  : function(resp){
                                    
                                    if (resp.code == '200') {

                                        //display content
                                        content.html(resp.html.begin);

                                        // fire call button
                                        w.App.closeFull();

                                        // fire countdown
                                        w.App.countDown(resp);

                                        // fire ajax form
                                        w.App.formAjax();

                                        
                                    } else {

                                        //display content
                                        content.html(resp.html);

                                        // fire call button
                                        w.App.closeFull();
                                    }
                                }
                            });
                        }
                    }
                });
               
            });
            // end click
        },
        countDown: function(resp){
            // var coundown
            var     content     = $('#fullscreen'),
                    futuredate  = new cdtime("countdown", resp.waktu);

            // start display countdown    
            futuredate.displaycountdown("days", function(){
                // jika waktu habis
                if (this.timesup == true) {
                    // hapus content dan ganti dengan resp.habis
                    content.html(resp.html.end);

                } else {
                    //show countdown timer
                    return arguments[1]+" jam "+arguments[2]+" menit "+arguments[3]+" detik";
                }
            });
        },
        formAjax: function(){

             // var definition
            var frm         = $('#frm-jawab'),
                frmTarget   = $('#frm-target');

            // handle form ajax
            frm.ajaxForm({
                dataType : 'json',
                url : '/api/jawab',
                success : function(resp){
                    if (resp.code == '200') {
                        frmTarget.removeClass().addClass('alert alert-success').html(resp.html);
                    } else {
                        frmTarget.removeClass().addClass('alert alert-error').html(resp.html);
                    }

                    w.setTimeout(function(){
                        frmTarget.fadeOut(200); // fade out speed
                    }, 5000); // start to fadeOut after 5sec 
                }
            });
        },
        closeFull: function(){

            // var definition
            var btnClose    = $('#btn-Close'),
                content     = $('#fullscreen');

            // handle close
            btnClose.click(function(){
                content.html('');
                content.cancelFullScreen();
            });
        }
        
    };

})(jQuery, window, window.document);

/* Disable right click script
   visit http://www.rainbow.arch.scriptmania.com/scripts/
 ========================================================= */

var message = "Sorry, right-click has been disabled";

function clickIE() {
    if (document.all) {
        (message);
        return false;
    }
}

function clickNS(e) {
    if (document.layers||(document.getElementById&&!document.all)) {
        if (e.which == 2 || e.which == 3) {
            (message);
            return false;
        }
    }
}
if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
} else {
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false");