<html>                                                                  
 <head>                                                                  
 <script type="text/javascript" src="jquery.js"></script>          
 <script type="text/javascript">   
 
   // we will add our javascript code here  
	$(document).ready(function() {
	   // do stuff when DOM is ready
	   $(document).ready(function() {
			$("a").click(function() {
				alert("Hello world!");
			});
		});
	});   
	
	$(document).ready(function() {
		$("#orderedlist").addClass("red");
	});
	
	$(document).ready(function() {
		$("#orderedlist > li").addClass("blue");
	});
	$(document).ready(function() {
		$("#orderedlist li:last").hover(function() {
			$(this).addClass("green");
			},function(){
			$(this).removeClass("green");
		});
	});
 </script>                                                               
 </head>                                                                 
 <body>                                                                  
   <!-- we will add our HTML content here --> 
 <a href="#">Link</a>   
 </body>                                                                 
 </html>