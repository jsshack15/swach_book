<!DOCTYPE html>

<?php

/*$host = 'localhost';
$user = 'root';
$pass = 'ashiva ';

mysql_connect($host, $user, $pass);

mysql_select_db('demo');*/

$username="root";
$password="ashiva";
mysql_connect("localhost", "$username", "$password");
mysql_select_db ("demo");

$select_path="select * from image_table";

$var=mysql_query($select_path);



   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be exactly 2 MB';
		}
      $folder="/var/www/html/";
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"/var/www/html/".$file_name);
        // $insert_path="INSERT INTO image_table VALUES('$folder','$file_name')";
         //$insert_path="INSERT INTO image_table contents (folder, image_name)  VALUES('fggg','vffgkudsg')";
		//mysql_query($insert_path);
		/*$username="root";
		$password="ashiva";
		mysql_connect("localhost", "$username", "$password");
		mysql_select_db ("demo");*/
		$sql = sprintf("INSERT INTO image_table (folder, image_name) VALUES('%s', '%s')",$folder, $file_name);
		mysql_query($sql);
		//echo $var;
         echo "Success";
      }
      else{
         print_r($errors);
      }
   }
?>

<html>
	<head>
		<!-- CHANGE TITLE AND META ACCORDINGLY -->
		<title>contest_page</title>
		<meta name="description" content="Faiz Malkani, Designer and Developer for Android and the Web">
		<meta name="keywords" content="faiz, malkani, android, ui, ux, frontend">
		<meta name="copyright" content="Copyright © 2014 Faiz Malkani. All Rights Reserved.">
		<meta name="author" content="Faiz Malkani">
		<meta name="theme-color" content="#ffffff">
		<meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
		<link rel="stylesheet" href="css/materialize.css" >
		<link rel="stylesheet" href="css/tidy.css">
		<link rel="stylesheet" href="css/animate.css">
		<script src="js/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
		<script src="bower_components/webcomponentsjs/webcomponents.js"></script>
        <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" />
        <script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/materialize.js"></script>
		<link rel="import" href="bower_components/paper-ripple/paper-ripple.html">
		<link rel="import" href="bower_components/paper-fab/paper-fab.html">
		<link rel="import" href="bower_components/iron-icons/iron-icons.html">
	</head>
	<body>
	
		<div class="container" style="width: 100%">
			<!-- COVER IMAGE AND FLOATING BUTTON -->
			<div class="cover-image"></div>	
			<div class="desktop-fab-container ">
				<!-- REPLACE WITH YOUR APP URL -->
     			<a href="YOUR_APP_URL_HERE">
     				<paper-fab class="wow fadeInUp desktop-fab" icon="shop"></paper-fab>
     			</a>
			</div>
			
			<!-- ICON, NAME AND DESCRIPTION -->
			<div class="wow fadeInUp content-card">
				<!-- REPLACE WITH YOUR APP URL -->
				<a href="YOUR_APP_URL_HERE">
					<paper-fab class="mobile-fab" icon="shop"></paper-fab>
				</a>
				
				<div class="icon-and-title-flex">
					<img src="img/ic_launcher.png" class="appicon"></img>
					<div class="title-container">
						<!-- REPLACE WITH YOUR APP NAME -->
						<span class="text-title" style="font-weight:400;text-shadow: 2px 2px black">CONTEST PAGE</span>
						<br><div class="intertext-padding"></div>
						<!-- REPLACE WITH YOUR DEV NAME -->
						<span class="text-subtitle"></span>
						<br><div class="intertext-padding"></div>
						<!-- REPLACE WITH YOUR APP PRICE -->
						<span class="text-subtitle">This contest page have been developed in order to achieve the goal of our Honorable Prime minister Sri.Narendra Modi ji to have a clean and green India.This contest is of 5 days and in this individual have to post his/her "Before and After" pic of a place showing the contribution in Swacch Bharat Abhayan.Winners are decided by the maximum number of votes they recieved in their pics.Prizes have been arranged for the winners.<h3>Interested people could upload their pics along with their discriptions:-</h3></span>
					</div>	
				</div><br><br>
				<!-- REPLACE WITH YOUR APP DESCRIPTION -->
				<span class="text-description" style="font-size: 1.1em">
				<form class="form1" name="form1" action="" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend style="font-weight:900">UPLOAD</legend>
						<label for="avatar" style="font-weight:900">Your image:</label>
						<input type="file" id="image" name="image" required><br>
						</br>
						<label for="discription" style="font-weight:900">Image discription:</label>
						<textarea name="discription" id="discription" cols="20" rows="2"></textarea><br>
						<br>
						<input type="submit" name="submit" value="Submit">
					</fieldset>
				</form>
			</div>
			
			<!-- OTHER APPS BY YOU -->
			<div class="wow fadeInUp content-works">


				<?php
				$select_path="select * from image_table";

				$var=mysql_query($select_path);				
				while($row=mysql_fetch_array($var))
				{
				$image_name=$row["image_name"];
			    $image_path=$row["folder"];
			    $image_id=$row["image_id"];
			    $like_counter=$row["like_counter"];
			    ?>
			    <div class="screenshot-item"> 
                <div id="outer" style="position:relative"><div id="inner" style="position:relative"><img class="materialboxed responsive-img" data-caption="A picture of some deer and tons of trees" width="250" src="/<?php echo $image_name?>"></div>
				<input type="image" class="like" data-id="<?php echo $row['image_id']?>" name="image" src="http://www.ecreativeim.com/blog/wp-content/uploads/2011/05/facebook-like-icon.png" width="25px"><input value="<?php echo $like_counter ?>" id="likeCount" style="align:center"></input></div>
				<figcaption style="background:white">Fig.1 - A view of the pulpit rock in Norway.</figcaption>
                </div>
                <?php
	                }
	                ?>
				
				<!--<div class="screenshot-item">
					
                    
                        <div id="outer" style="position:relative"><div id="inner" style="position:relative"><img class="materialboxed responsive-img" data-caption="A picture of some deer and tons of trees" width="250" src="http://bhiwandicity.net/wp-content/uploads/2014/11/113.jpg"></div>
						<input type="image" name="image" src="http://www.ecreativeim.com/blog/wp-content/uploads/2011/05/facebook-like-icon.png" width="25px"><input value="00" id="value" style="align:center"></input></div>
						<figcaption style="background:white">Fig.1 - A view of the pulpit rock in Norway.</figcaption>
               
                </div>-->
				
				
				
				
				
     	    </div>
		
		
		<!-- APP DETAILS -->
		<div class="wow fadeInUp content-card" style="margin-top: 0;">
     		<span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Details</span>
			<br><br>
			<div>
				<!-- REPLACE WITH YOUR APP DETAILS ACCORDINGLY -->
				<div class="detail-item">
					<iron-icon class="details-icon" icon="mail"></iron-icon>
					<span class="text-description"></span>
				</div>
			</div>	
     	</div>
		
		<!-- SPACE BELOW DETAILS -->	
		<div class="empty-space">
			<div class="meta-container wow fadeInUp">
				<div class="wow fadeInUp detail-item watermark credits">
						<span class="text-description credits-text" style="color: #ffffff"> <a href="http://faizmalkani.com" style="color: #fff; font-weight: 700"></a></span>
				</div>
			</div>	
		</div>
			
			
			
			
			
		<!-- ===================================================================================================== -->
			
		<!-- JAVASCRIPT -->
		
		<!-- Animations -->
		<script src="js/wow.min.js"></script>
		<script>
		$(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  </script>
		<script>
		window.onload = function() {
    var files = document.querySelectorAll("input[type=file]");
    files[0].addEventListener("change", function(e) {
        if(this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) { document.getElementById("preview").setAttribute("src", e.target.result); }
            reader.readAsDataURL(this.files[0]);
        }
    });
}
</script>
		<script>
			new WOW().init();
		</script>
		
		<!-- Scrollwheel Smoothing -->
		<script>
			$(function()
			{	
				var $window = $(window);
				var scrollTime = 0.2;
				var scrollDistance = 270;
				$window.on("mousewheel DOMMouseScroll", function(event)
				{
	
					event.preventDefault();	
					var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
					var scrollTop = $window.scrollTop();
					var finalScroll = scrollTop - parseInt(delta*scrollDistance);
					TweenMax.to($window, scrollTime, 
					{
						scrollTo : { y: finalScroll, autoKill:true }, ease: Power1.easeOut, overwrite: 5	 
						
					});
				});
			});
			$(document).on('click','.like',function(){
				var button = $(this);
				var id = $(this).attr('data-id');
				$.ajax({
				  method: "POST",
				  url: "likePic.php",
				  data: {'id':id}
				})
				  .done(function(data) {
				  	button.closest('.screenshot-item').find('#likeCount').val(data);
				    button.hide();
  				});
			});
		</script>
	</body>
</html>	