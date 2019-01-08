@extends('layouts.alumno')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    /**
 *
 * jquery.charcounter.js version 1.2
 * requires jQuery version 1.2 or higher
 * Copyright (c) 2007 Tom Deater (http://www.tomdeater.com)
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 * 
 */
 
(function($) {
    /**
	 * attaches a character counter to each textarea element in the jQuery object
	 * usage: $("#myTextArea").charCounter(max, settings);
	 */
	
	$.fn.charCounter = function (max, settings) {
		max = max || 100;
		settings = $.extend({
			container: "<span></span>",
			classname: "charcounter",
			format: "(%1 characters remaining)",
			pulse: true,
			delay: 0
		}, settings);
		var p, timeout;
		
		function count(el, container) {
			el = $(el);
			if (el.val().length > max) {
			    el.val(el.val().substring(0, max));
			    if (settings.pulse && !p) {
			    	pulse(container, true);
			    };
			};
			if (settings.delay > 0) {
				if (timeout) {
					window.clearTimeout(timeout);
				}
				timeout = window.setTimeout(function () {
					container.html(settings.format.replace(/%1/, (max - el.val().length)));
				}, settings.delay);
			} else {
				container.html(settings.format.replace(/%1/, (max - el.val().length)));
			}
		};
		
		function pulse(el, again) {
			if (p) {
				window.clearTimeout(p);
				p = null;
			};
			el.animate({ opacity: 0.1 }, 100, function () {
				$(this).animate({ opacity: 1.0 }, 100);
			});
			if (again) {
				p = window.setTimeout(function () { pulse(el) }, 200);
			};
		};
		
		return this.each(function () {
			var container;
			if (!settings.container.match(/^<.+>$/)) {
				// use existing element to hold counter message
				container = $(settings.container);
			} else {
				// append element to hold counter message (clean up old element first)
				$(this).next("." + settings.classname).remove();
				container = $(settings.container)
								.insertAfter(this)
								.addClass(settings.classname);
			}
			$(this)
				.unbind(".charCounter")
				.bind("keydown.charCounter", function () { count(this, container); })
				.bind("keypress.charCounter", function () { count(this, container); })
				.bind("keyup.charCounter", function () { count(this, container); })
				.bind("focus.charCounter", function () { count(this, container); })
				.bind("mouseover.charCounter", function () { count(this, container); })
				.bind("mouseout.charCounter", function () { count(this, container); })
				.bind("paste.charCounter", function () { 
					var me = this;
					setTimeout(function () { count(me, container); }, 10);
				});
			if (this.addEventListener) {
				this.addEventListener('input', function () { count(this, container); }, false);
			};
			count(this, container);
		});
	};

})(jQuery);

$(function() {
    $(".counted").charCounter(320,{container: "#counter"});
});
</script>
<script> $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});


</script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Curriculum de $Persona</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>

<!--                
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
           -->
          
          <ul class="list-group">
            <li class="list-group-item text-muted">IDIOMAS<i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Idioma 1</strong></span> C1</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Idioma 2</strong></span> A2</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Idioma 3</strong></span> B2</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Idioma 4</strong></span> B1</li>
          </ul> 
               
          
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="first_name"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                            <label for="last_name"><h4>Apellido</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="phone"><h4>Telefono</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-12">
                             <label for="mobile"><h4>Direccion</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="email"><h4>Localidad</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-8">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                   
                         
                      <div class="panel-body">                
                    <form accept-charset="UTF-8" action="" method="POST">
                    <label for="email"><h4>Formación Académica</h4></label>
                        <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                    </form>
                </div>
                      <div class="panel-body">                
                    <form accept-charset="UTF-8" action="" method="POST">
                    <label for="email"><h4>Experiencia</h4></label>
                        <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                    </form>
                </div>
                <div class="panel-body">                
                    <form accept-charset="UTF-8" action="" method="POST">
                    <label for="email"><h4>Otros datos</h4></label>
                        <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                    </form>
                </div>
                      <div class="form-group">
                          
                 
                    
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                      <div class="form-group">
                          
              
              	</form>
              
              <hr>
              
             
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                     
@endsection
