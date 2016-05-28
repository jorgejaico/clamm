<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Marca tendencia</title>
		
		<!-- Bootstrap Core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../../css/patros.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
			<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
		<script src="jquery-git.js"></script>

		<script type="text/javascript">
			tinymce.init({
			    selector: '#my_editor',
			    plugins: ["image"],
			    toolbar: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | mybutton',
			setup: function(editor) {
        editor.addButton('mybutton', {
            text:"IMAGE",
            icon: false,
            onclick: function(e) {
                console.log($(e.target));
                if($(e.target).prop("tagName") == 'BUTTON'){
                    console.log($(e.target).parent().parent().find('input').attr('id'));                    
                    if($(e.target).parent().parent().find('input').attr('id') != 'tinymce-uploader') {
                    $(e.target).parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                    }
                    $('#tinymce-uploader').trigger('click');
                    $('#tinymce-uploader').change(function(){
                        var input, file, fr, img;

                        if (typeof window.FileReader !== 'function') {
                            write("The file API isn't supported on this browser yet.");
                            return;
                        }

                        input = document.getElementById('tinymce-uploader');
                        if (!input) {
                            write("Um, couldn't find the imgfile element.");
                        }else if (!input.files) {
                            write("This browser doesn't seem to support the `files` property of file inputs.");
                        }else if (!input.files[0]) {
                            write("Please select a file before clicking 'Load'");
                        }else {
                            file = input.files[0];
                            fr = new FileReader();
                            fr.onload = createImage;
                            fr.readAsDataURL(file);
                        }

                        function createImage() {
                            img = new Image();
                            img.src = fr.result;
                             editor.insertContent('<img src="'+img.src+'"/>');
                        }
                });
            }
            if($(e.target).prop("tagName") == 'DIV'){
                if($(e.target).parent().find('input').attr('id') != 'tinymce-uploader') {
                    console.log($(e.target).parent().find('input').attr('id'));                                
                    $(e.target).parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                }
                $('#tinymce-uploader').trigger('click');
                $('#tinymce-uploader').change(function(){
                    var input, file, fr, img;

                    if (typeof window.FileReader !== 'function') {
                        write("The file API isn't supported on this browser yet.");
                        return;
                    }

                    input = document.getElementById('tinymce-uploader');
                    if (!input) {
                        write("Um, couldn't find the imgfile element.");
                    }else if (!input.files) {
                        write("This browser doesn't seem to support the `files` property of file inputs.");
                    }else if (!input.files[0]) {
                        write("Please select a file before clicking 'Load'");
                    }else{
                        file = input.files[0];
                        fr = new FileReader();
                        fr.onload = createImage;
                        fr.readAsDataURL(file);
                    }

                    function createImage() {
                        img = new Image();
                        img.src = fr.result;
                         editor.insertContent('<img src="'+img.src+'"/>');
                    }
                });
            }
                               
            if($(e.target).prop("tagName") == 'I'){
                console.log($(e.target).parent().parent().parent().find('input').attr('id')); 
                if($(e.target).parent().parent().parent().find('input').attr('id') != 'tinymce-uploader') {
                        $(e.target).parent().parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                                                                           }
                    $('#tinymce-uploader').trigger('click');
                    $('#tinymce-uploader').change(function(){
                        var input, file, fr, img;

                        if (typeof window.FileReader !== 'function') {
                            write("The file API isn't supported on this browser yet.");
                            return;
                        }

                        input = document.getElementById('tinymce-uploader');
                        if (!input) {
                            write("Um, couldn't find the imgfile element.");
                        }else if (!input.files) {
                            write("This browser doesn't seem to support the `files` property of file inputs.");
                        }else if (!input.files[0]) {
                            write("Please select a file before clicking 'Load'");
                        }else {
                            file = input.files[0];
                            fr = new FileReader();
                            fr.onload = createImage;
                            fr.readAsDataURL(file);
                        }

                        function createImage() {
                            img = new Image();
                            img.src = fr.result;
                            editor.insertContent('<img src="'+img.src+'"/>');
                            
                        }
                    });
                }
            }
        });
    }});
		</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            function enviar(){
                var titulo = document.getElementById('titulo').value;
                document.getElementById('tiBlog').value = titulo;
                var blog = tinyMCE.get('my_editor').getContent();
                document.getElementById('tBlog').value = blog;
                

            }
        </script>
        <script>
//get the input and UL list
var input = document.getElementById('filesToUpload');
var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
	list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
	//add to list
	var li = document.createElement('li');
	li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
	list.append(li);
}
        </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
   <script>
  $(function() {
    $( "#skills2" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
    <script>
  $(function() {
    $( "#skills3" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
    <script>
  $(function() {
    $( "#skills4" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
	<?php
		include ("../headerfooter/header.php");
		include ("../conexion/conexion.proc.php");
	?>

		
			
		<!-- Page Content -->

		<div class="container">
		<h1>TinyMCE Quick Start Guide</h1>
	    <input type="text" id="titulo" placeholder="Título" />
			<textarea id="my_editor"></textarea>
			<iframe id="form_target" name="form_target" style="display:none"></iframe>
	            <form id="my_form" action="../conexion/uploadBlog.proc.php" method="POST" enctype="multipart/form-data">
	            	<?php
	            		if(isset($_REQUEST['tipoPost'])){
	            	?>
	            	<input type="hidden" id="tipoPost" name="tipoPost" value="<?php echo $_REQUEST['tipoBlog'] ?>"/>
	            	<?php
	            	}
	            	?>
	                <input type="hidden" id="tBlog" name="tBlog" />
	                <input type="hidden" id="tiBlog" name="tiBlog" />
	                Portada: <input type="file" id="portada" name="portada" />
	                Imagenes: <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
	                <div class="ui-widget">
					    <label for="skills">Tags: </label>
					    <input id="skills" name="skills">
					    <input id="skills2" name="skills2">
					    <input id="skills3" name="skills3">
					    <input id="skills4" name="skills4">
					</div>
	                <button type="submit" id="blog" name="blog" onClick="enviar();"/>Publicar</button>
	            </form>
	            
					
		</div>
		

		

		<!-- Footer -->
	<?php
		include ("../headerfooter/footer.php");
	?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Portfolio -->
		<script src="js/jquery.quicksand.js"></script>	    
	

		<!--Jquery Smooth Scrolling-->
		<script>
			$(document).ready(function(){
				$('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
					e.preventDefault();

					var target = this.hash;
					var $target = $(target);

					$('html, body').stop().animate({
						'scrollTop': $target.offset().top
					}, 900, 'swing', function () {
						window.location.hash = target;
					});
				});

				$('a.page-scroll').bind('click', function(event) {
					var $anchor = $(this);
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500, 'easeInOutExpo');
					event.preventDefault();
				});

			   $(".nav a").on("click", function(){
					 $(".nav").find(".active").removeClass("active");
					$(this).parent().addClass("active");
				});

				$('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
					$(window).scroll(function () {
						if ($(this).scrollTop() != 0) {
							$('#toTop').fadeIn();
						} else {
							$('#toTop').fadeOut();
						}
					}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 700);
					return false;
				});

			});

		</script>

		<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
		e.preventDefault();
		$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
			  $filters,
			  { duration: 1000 },
			  gallery
			  );
		});

		$(document).ready(gallery);
		</script>


		


</body>
</html>




