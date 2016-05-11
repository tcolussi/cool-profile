<?php
    include_once "fbmain.php";
?>

<!DOCTYPE html>

<!-- BEGIN html -->
<html>

<!-- BEGIN head -->
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>Cool Profile</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.png" />

<!-- Stylesheet -->
<link type="text/css" href="css/style.css" rel="stylesheet" />
<link type="text/css" href="css/jquery.ui.theme.css" rel="stylesheet" />
<link type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:rerular,italic,bold,bolditalic" rel="stylesheet" />
<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
<![endif]-->

<!-- END head -->
</head>

<!-- BEGIN body -->
<body>

<div id="preloader"></div>

<div id="header" class="inner">

  <div class="logo left">

    <img src="images/logo.png" alt="Cool Profile" />

    <div class="like-button">

      <fb:like href="https://www.facebook.com/facebook/" layout="button_count"></fb:like>

    </div><!--like-button-->

  </div><!--logo-->

  <div class="profile right">

    <a class="trigger">Hello, <strong><?php echo $user_profile['name']; ?></strong><span></span></a>

    <div class="tooltip">
      <ul>
      	<li><a href="<?php echo $user_profile['link']; ?>" target="_blank"><span>Profile</span></a></li>
        <li><a href="#" onclick="feedDialog(); return false;"><span>Share</span></a></li>
        <li><a href="#" onclick="fbLogout()"><span>Logout</span></a></li>
      </ul>
    </div><!--tooltip-->

  </div><!--profile-->

</div><!--header-->

<div id="main" class="clearfix">

  <div id="left-add" class="banner">

	<script type="text/javascript">
		google_ad_client = "ca-pub-5997029164354874";
		google_ad_slot = "8599768551";
		google_ad_width = 120;
		google_ad_height = 600;
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>

  </div><!--left-add-->

  <div id="right-add" class="banner">

	<script type="text/javascript">
		google_ad_client = "ca-pub-5997029164354874";
		google_ad_slot = "2553234954";
		google_ad_width = 120;
		google_ad_height = 600;
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>

  </div><!--right-add-->

  <?php
    if (isset($_GET['res'])) {
      if ($_GET['res'] == 'true'){
  ?>

  <div class="alert clearfix" id="success">

    <p>Photo generated successfully. You can create another picture if you like...</p>

  </div><!--success-->

  <?php
	  }
    if ($_GET['res'] == 'false'){
  ?>

  <div class="alert clearfix" id="error">

    <p>An error has occurred, please try again...</p>

  </div><!--error-->

  <?php
	}
  }
  ?>

  <div class="alert clearfix" id="loading" >

    <p>Please wait while your photo is generated and uploaded to Facebook...</p>

  </div><!--loading-->

  <div id="wrap">

    <div id="fixer" class="clearfix">

      <div id="elements">

        <div class="object"><img id="object1" width="43" height="18" class="ui-widget-content" src="elements/glasses1.png" alt=""/></div>
        <div class="object"><img id="object2" width="43" height="18" class="ui-widget-content" src="elements/glasses2.png" alt=""/></div>
        <div class="object"><img id="object3" width="43" height="19" class="ui-widget-content" src="elements/glasses3.png" alt=""/></div>
        <div class="object"><img id="object4" width="43" height="18" class="ui-widget-content" src="elements/glasses4.png" alt=""/></div>
        <div class="object"><img id="object5" width="43" height="19" class="ui-widget-content" src="elements/glasses5.png" alt=""/></div>
        <div class="object"><img id="object6" width="43" height="17" class="ui-widget-content" src="elements/glasses6.png" alt=""/></div>
        <div class="object"><img id="object7" width="43" height="30" class="ui-widget-content" src="elements/mustache1.png" alt=""/></div>
        <div class="object"><img id="object8" width="43" height="26" class="ui-widget-content" src="elements/mustache2.png" alt=""/></div>
        <div class="object"><img id="object9" width="43" height="22" class="ui-widget-content" src="elements/mustache3.png" alt=""/></div>
        <div class="object"><img id="object10" width="43" height="20" class="ui-widget-content" src="elements/mustache4.png" alt=""/></div>
        <div class="object"><img id="object11" width="43" height="20" class="ui-widget-content" src="elements/mustache5.png" alt=""/></div>
        <div class="object"><img id="object12" width="43" height="31" class="ui-widget-content" src="elements/mustache6.png" alt=""/></div>
        <div class="object"><img id="object13" width="43" height="29" class="ui-widget-content" src="elements/hat1.png" alt=""/></div>
        <div class="object"><img id="object14" width="43" height="44" class="ui-widget-content" src="elements/hat2.png" alt=""/></div>
        <div class="object"><img id="object15" width="43" height="31" class="ui-widget-content" src="elements/hat3.png" alt=""/></div>
        <div class="object"><img id="object16" width="43" height="35" class="ui-widget-content" src="elements/hat4.png" alt=""/></div>
        <div class="object"><img id="object17" width="43" height="29" class="ui-widget-content" src="elements/hat5.png" alt=""/></div>
        <div class="object"><img id="object18" width="43" height="28" class="ui-widget-content" src="elements/hat6.png" alt=""/></div>
        <div class="object"><img id="object19" width="43" height="20" class="ui-widget-content" src="elements/lips1.png" alt=""/></div>
        <div class="object"><img id="object20" width="43" height="25" class="ui-widget-content" src="elements/lips2.png" alt=""/></div>
        <div class="object"><img id="object21" width="43" height="21" class="ui-widget-content" src="elements/lips3.png" alt=""/></div>
        <div class="object"><img id="object22" width="43" height="21" class="ui-widget-content" src="elements/lips4.png" alt=""/></div>
        <div class="object"><img id="object23" width="43" height="22" class="ui-widget-content" src="elements/lips5.png" alt=""/></div>
        <div class="object"><img id="object24" width="43" height="22" class="ui-widget-content" src="elements/lips6.png" alt=""/></div>

      </div><!--elements-->

    </div><!--fixer-->

  </div><!--wrap-->

  <div id="picture">

    <input type="text" id="description" value="Add a description..." onblur="this.value=!this.value?'Add a description...':this.value;" onclick="this.value='';" name="description">

    <div id="background" class="clearfix">

      <?php copy_remote_image("https://graph.facebook.com/{$user_profile['id']}/picture?width=960", $code2, $_CONFIG['max_width']); ?>

      <?php
		$destination = "fb_images/".$code2."_fb_photo.jpg";
		$image = getimagesize($destination);
		$width = $image[0];
		$height = $image[1];
	  ?>

      <img id="preview" src="<?php echo "fb_images/".$code2."_fb_photo.jpg"; ?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="Profile Picture" />

    </div><!--background-->

    <form id="jsonform" action="index.php" method="post" onsubmit="getImageData();">
      <input type="hidden" name="action" value="upload_fb_image">
      <input type="hidden" name="photo" value="<?php echo $destination;?>">
      <input type="hidden" name="message" id="message" value="">
      <input id="submit" type="submit" value="Upload to Facebook"/>
      <input id="jsondata" name="jsondata" type="hidden" value="Upload to Facebook" autocomplete="off">
    </form>

  </div><!--picture-->

  <div id="tools"></div>

</div><!--main-->

<div id="steps" class="clearfix">

  <div class="column">

    <h3>Choose</h3>

    <p><span class="number">1</span>Drag the elements in the left box and put them on your profile picture. Now ajust each element by making them bigger or smaller and rotating them to fit well in the picture.</p>

  </div><!--column-->

  <div class="column">

    <h3>Upload</h3>

    <p><span class="number">2</span>When you have your elements selected, press the "Upload to Facebook" button and automatically save the picture into a new photo album in your profile. You can also add a description for your picture.</p>

  </div><!--column-->

  <div class="column" id="last">

    <h3>Share</h3>

    <p><span class="number">3</span>Now share this awesome app with your friends by clicking the "like" button, post it in your profile by clicking the "share it" button or send an invitation by email by clicking the "invite" button.</p>

  </div><!--column-->

</div><!--steps-->

<div id="footer">

  <div class="inner clearfix">

    <p class="left">Cool Profile © <?php echo date("Y") ?> | <a href="http://apps.volumens.com/cool-profile/privacy_policy.php" target="_blank">Privacy Policy</a></p>

    <p class="right">Developed by <a href="http://www.volumens.com" target="_blank">Volumens</a></p>

  </div><!--inner-->

</div><!--footer-->

<!-- JS Scripts -->
<script type="text/javascript" src="js/jquery.min.js?ver=1.8.2"></script>
<script type="text/javascript" src="js/jquery.ui.min.js?ver=1.8.24"></script>
<script type="text/javascript" src="js/jquery.tools.min.js?ver=1.2.7"></script>
<script type="text/javascript" src="js/jquery.rotate.min.js?ver=0.1"></script>
<script type="text/javascript" src="js/jquery.json.min.js?ver=1.0"></script>

<script type="text/javascript">

	// Feed Dialog
	function feedDialog() {
		FB.ui({
			method: 'feed',
			link: 'http://apps.volumens.com/cool-profile/',
			picture: 'http://apps.volumens.com/cool-profile/images/thumbnail.png',
			name: 'Cool Profile',
			caption: 'Facebook Application',
			description: 'Have fun adding funny elements to your profile picture and share it with your friends'
        });
	}
  
  function fbLogout() {
    FB.logout(function (response) {
        //Do what ever you want here when logged out like reloading the page
        window.location.reload();
    });
  }
  
  function newInvite(){
    var receiverUserIds = FB.ui({ 
          method : 'apprequests',
          message: 'Come on man checkout my applications. visit http://ithinkdiff.net',
    },
    function(receiverUserIds) {
            console.log("IDS : " + receiverUserIds.request_ids);
          }
    );
    //http://developers.facebook.com/docs/reference/dialogs/requests/
  }

	// Add description
	function getImageData() {
		document.getElementById('message').value = document.getElementById('description').value;
	}

	$(function(id) {

		// Preloader
		$(window).load(function(){
			$('#preloader').fadeOut(500,function(){$(this).remove();});
		});

		// Tooltip
		$('.trigger').tooltip({
			relative: true,
			position: 'bottom right',
			effect: 'slide',
			offset: [15, -180],
			delay: 500
		});

		// Loading Message
		$('#submit').click(function(){
			$('#loading').slideDown(500);
			$('body,html').animate({scrollTop:0},800);
		});

		// Alert Messages
		setTimeout(function() {
			$('#success, #error').slideUp(500);
		}, 10000);

		// Banner animation
		var offset = $(".banner").offset();
		var topPadding = 20;
		$(window).scroll(function() {
			if ($(window).scrollTop() > offset.top) {
				$(".banner").stop().animate({
					marginTop: $(window).scrollTop() - offset.top + topPadding
				});
			} else {
				$(".banner").stop().animate({
					marginTop: 0
				});
			};
		});

		// Main Functions
		var count_dropped_hits = 0;
		var data = {
			"images" : [{
				"id" : "object0", "src" : "<?php echo "fb_images/".$code2."_fb_photo.jpg"; ?>", "width" : "<?php echo $width;?>", "height" : "<?php echo $height;?>"
			}]
		};

	    // Array Remove - By John Resig (MIT Licensed)
		Array.prototype.remove = function(from, to) {
			var rest = this.slice((to || from) + 1 || this.length);
			this.length = from < 0 ? this.length + from : from;
			return this.push.apply(this, rest);
		};

		// Remove an object from data
		$('.remove',$('#tools')).live('click',function(){
			var $this = $(this);

			// The element next to this is the input that stores the obj id
			var objid = $this.next().val();
			// Remove the object from the sidebar
			$this.parent().remove();
			// ,from the picture
			var divwrapper = $('#'+objid).parent().parent();
			$('#'+objid).remove();

			// Add again to the elements list
			var image_elem = $this.parent().find('img');
			var thumb_width = image_elem.attr('width');
			var thumb_height = image_elem.attr('height');
			var thumb_src = image_elem.attr('src');
			$('<img/>',{
				id : objid,
				src : thumb_src,
				width : thumb_width,
				height : thumb_height,
				addClass : 'ui-widget-content'
			}).appendTo(divwrapper).resizable({
				handles : 'se',
				stop : resizestop
			}).parent('.ui-wrapper').draggable({
				revert: 'invalid'
			});

			// And unregister it - delete from object data
			var index = exist_object(objid);
			data.images.remove(index);
		});

		// Checks if an object was already registered
		function exist_object(id){
			for(var i = 0;i<data.images.length;++i){
				if(data.images[i].id == id)
				return i;
			}
			return -1;
		}

		// Triggered when stop resizing an object
		function resizestop(event, ui) {
			// Calculate and change values to obj (width and height)
			var $this = $(this);
			var objid = $this.find('.ui-widget-content').attr('id');
			var objwidth = ui.size.width;
			var objheight = ui.size.height;
			var index = exist_object(objid);

			if(index!=-1) { //if exists (it should!) update width and height
				data.images[index].width = objwidth;
				data.images[index].height = objheight;
			}
		}

		// Elements are resizable and draggable
		$('#elements img').resizable({
			// Only diagonal (south east)
			handles : 'se',
			stop : resizestop
		}).parent('.ui-wrapper').draggable({
			revert : 'invalid'
		});

		$('#background').droppable({
			accept : '#elements div', // Accept only draggables from #elements
			drop : function(event, ui) {
				var $this = $(this);
				++count_dropped_hits;
				var draggable_elem = ui.draggable;
				draggable_elem.css('z-index',count_dropped_hits);

				// Object was dropped : register it
				var objsrc = draggable_elem.find('.ui-widget-content').attr('src');
				var objwidth = parseFloat(draggable_elem.css('width'),10);
				var objheight = parseFloat(draggable_elem.css('height'),10);

				// For top and left we decrease the top and left of the droppable element
				var objtop = ui.offset.top - $this.offset().top;
				var objleft = ui.offset.left - $this.offset().left;
				var objid = draggable_elem.find('.ui-widget-content').attr('id');
				var index = exist_object(objid);

				if(index!=-1) { // If exists update top and left
					data.images[index].top = objtop;
					data.images[index].left = objleft;
				}
				else{
					// Register new one
					var newObject = {
						'id' : objid,
						'src' : objsrc,
						'width' : objwidth,
						'height' : objheight,
						'top' : objtop,
						'left' : objleft,
						'rotation' : '0'
					};
					data.images.push(newObject);
					// Add object to sidebar

					$('<div/>',{
						addClass : 'item'
					}).append(
						$('<div/>',{
							addClass : 'thumb',
							html : '<img width="43" height="'+objheight+'" class="ui-widget-content" src="'+objsrc+'"/>'
						})
					).append(
						$('<div/>',{
							addClass : 'slider',
							id : objid+'slider',
							html : '<span>Rotate</span><span class="degrees">0</span>'
						})
					).append(
						$('<a/>',{
							addClass : 'remove'
						})
					).append(
						$('<input/>',{
							type : 'hidden',
							value : objid // Keeps track of which object is associated
						})
					).appendTo($('#tools'));
					$('#'+objid+'slider').slider({
						orientation	: 'horizontal',
						max : 180,
						min : -180,
						value : 0,
						slide : function(event, ui) {
							var $this = $(this);
							// Change the rotation and register that value in data object when it stops
							draggable_elem.rotate({angle:ui.value});
							$('.degrees',$this).html(ui.value);
						},
						stop : function(event, ui) {
							newObject.rotation = ui.value;
						}
					});
				}
			}
		});

		// User presses the upload button
		$('#submit').bind('click',function(){
			var dataString = JSON.stringify(data);
			$('#jsondata').val(dataString);
			$('#jsonform').submit();
		});

	});

</script>

<div id="fb-root"></div>
<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
	FB.init({
		appId  : '<?= $_CONFIG['appid'] ?>',
		status : true, // Check login status
		cookie : true, // Enable cookies to allow the server to access the session
		xfbml  : true  // Parse XFBML
	});
</script>

</body>
<!-- END body -->

</html>
<!-- END html -->
