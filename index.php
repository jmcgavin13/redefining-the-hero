<?php
	
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	$tbl_campaign = "tbl_campaign";
	$getCampaign = getAll($tbl_campaign);

	$tbl_info = "tbl_info";
	$getInfo = getAll($tbl_info);

	$tbl_photos = "tbl_photos";
	$getPhotos = getSix($tbl_photos);

	$tbl_stats = "tbl_stats";
	$getStats = getAll($tbl_stats);

	$tbl_statsLegend = "tbl_stats";
	$getStatsLegend = getAll($tbl_statsLegend);

	if(isset($_POST['name'])) {
		//echo $_POST['name'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$message = $_POST['msg'];
		$direct = "#";
		$add = $_POST['address'];
		if(empty($add)) {
			sendMessage($fname, $lname, $email, $message, $direct);
		}else{
			redirect_to("404.shtml");
		}
	}
	
?>

<?php
include_once("layout/header.php");
?>

<h1 class="hide">REDEFINING THE HERO</h1>
    

    
<!--START BODY CONTENT HERE-->


<a href="https://www.ontario.ca/page/organ-and-tissue-donor-registration?utm_source=so&utm_medium=keyword&utm_campaign=original" target="_blank"><img src="images/banner_register.svg" id="registerBanner" alt="Register"></a>

    
<!--start ladingPage-->
<div id="homeRotatorCon" class="row expanded">
	<div id="headerImgTxt">
		<h2>BECOME AN <span>ORGAN DONOR.</span> REDEFINE WHAT IT MEANS TO BE A <span>HERO.</span></h2>
		<h3>1 DONOR CAN SAVE 8 LIVES - IT COULD BE ANYONE</h3>
	</div>
	<div id="becomeAHeroCon">
		<a href="https://www.ontario.ca/page/organ-and-tissue-donor-registration?utm_source=so&utm_medium=keyword&utm_campaign=original" target="_blank" id="becomeAHeroBut">BECOME A HERO</a>
	</div>

	<img src="images/arrow_down.svg" id="downArrow" alt="Down">
	
<div id="headerRotatorLeft"></div>
<div id="headerRotatorRight"></div>

</div>
<!--end landingPage-->

<!--start theCampaign-->
<div class="row" data-equalizer>
	<div class="small-12 columns" id="theCampaign">
		<div class="show-for-large large-6 columns" id="theCampaignLogoCon" data-equalizer-watch>
			<img src="images/campaign_logo.svg" alt="Redefining The Hero">
		</div>
		<div class="small-12 large-6 columns" data-equalizer-watch>
			<h2>THE <span>CAMPAIGN</span></h2>
				<?php

					if(!is_string($getCampaign)){
						while($row = mysqli_fetch_array($getCampaign)){
							echo "<p>{$row['campaign_desc']}</p>";
						}
					}else{
						echo "<p>{$getCampaign}</p>";
					}

				?>
			<h3>BECOME A <span>DONOR.</span> BECOME A <span>HERO.</span></h3>
				
			<?php

				if(!is_string($getInfo)){
					while($row = mysqli_fetch_array($getInfo)){
						echo "<ul>";
						echo "<li><span>{$row['info_desc']}</span></li>";
						echo "</ul>";
					}
				}else{
					echo "<p>{$getInfo}</p>";
				}

			?>
		</div>
	</div>
</div>

<div class="row expanded">
	<div class="small-12 show-for-medium columns" id="theCampaignImgs">
		<?php

			if(!is_string($getPhotos)){
				while($row = mysqli_fetch_array($getPhotos)){
					echo "<img src=\"images/uploads/{$row['photos_img']}\" alt=\"{$row['photos_desc']}\" class=\"medium-2 columns\">";
				}
			}else{
				echo "<p>{$getPhotos}</p>";
			}

		?>
	</div>
</div>
<!--end theCampaign-->

<!--start stats-->
<div id="statsCon" class="row expanded">
		<?php

			if(!is_string($getStats)){
				while($row = mysqli_fetch_array($getStats)){
					echo "<div class=\"statistic small-12 medium-4 columns\">";
					echo "<h2>{$row['stats_title']}<sup>{$row['stats_id']} </sup></h2>";
					echo "<h3><i class=\"{$row['stats_icon']}\"></i> <span id=\"{$row['stats_idName']}\" class=\"counter\"></span></h3>";
					echo "</div>";
				}
			}else{
				echo "<p>{$getStats}</p>";
			}

		?>

	<div id="statsInfo">

		<?php

		if(!is_string($getStatsLegend)){
			while($row = mysqli_fetch_array($getStatsLegend)){
				echo "<p><sup>{$row['stats_id']} </sup>{$row['stats_legend']}</p>";
			}
		}else{
			echo "<p>{$getStatsLegend}</p>";
		}

	?>
	</div>
</div>
<!--end stats-->

<!--start stories-->
<div id="recipientStories">
	<h2>RECIPIENTS AND <span>THEIR STORIES</span></h2>

	<div id="rotatorCon">

	<div id="mobileRotatorImgCon">
	  <img src="images/rotator_img_0.png" alt="Recipient">
	</div>
	  
	<div id="desktopRotatorImgCon">
	  <img src="images/rotator_arrow.svg" alt="arrow" id="rotator2Left">
	  <img src="images/rotator_arrow2.svg" alt="arrow" id="rotator2Right">

	  <img src="images/rotator_img_0.png" alt="Recipient" class="rotatorImg" id="rotatorImg0">
	  <img src="images/rotator_img_1.png" alt="Recipient" class="rotatorImg nonActive" id="rotatorImg1">
	  <img src="images/rotator_img_2.png" alt="Recipient" class="rotatorImg nonActive" id="rotatorImg2">
	  <img src="images/rotator_img_3.png" alt="Recipient" class="rotatorImg nonActive" id="rotatorImg3">
	  <img src="images/rotator_img_4.png" alt="Be a Hero" class="rotatorImg nonActive" id="rotatorImg4">
	</div>

		<div id="storyCon">
	    <img src="images/chevron.svg" id="rotatorLeft">
	    <img src="images/chevron.svg" id="rotatorRight">
			<div id="storyTxt">
				<a href="https://beadonor.ca/stories/andrea" target="_blank">Andrea</a>
				<p>Andrea thinks often of her donor's family and their grief. "Every moment a thought goes out to them. I want to make them proud by living and taking care of what's been given to me."</p>
			</div>
	    <img src="images/story_section.svg" id="decagon">
		</div>
	</div>
</div>
<!--end stories-->

<!--start media-->
<div id="mediaCon">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<h2>MEDIA</h2>
			<div class="vidThumbCon small-6 columns" id="redefining_the_hero">
				<img src="videos/redefining_the_hero_thumb.png" class="vidThumb activeVid" alt="Redefining the Hero">
				<p>Redefining the Hero</p>
			</div>
			<div class="vidThumbCon small-6 columns" id="trillium_gift_of_life_network_about_us">
				<img src="videos/trillium_gift_of_life_network_about_us_thumb.png" class="vidThumb" alt="Trillium Gift of Life Network">
				<p>Trillium Gift of Life Network</p>
			</div>
		</div>
		<div class="small-12 medium-6 columns">
			<video id="vidCon" width="100%" height="100%" poster="videos/redefining_the_hero_thumb.png" controls>
  				<source id="mp4Src" src="videos/redefining_the_hero.mp4" type="video/mp4">
  				<source id="webmSrc" src="videos/redefining_the_hero.webm" type="video/webm">
  				<source id="oggSrc" src="videos/redefining_the_hero.ogv" type="video/ogg">
  				Your browser does not support HTML5 video.
  			</video>
		</div>
	</div>
</div>
<!--end media-->

<!--start register-->
<div class="row" data-equalizer id="registerCon">
	<div class="small-12 medium-6 columns" id="registerChecklist" data-equalizer-watch>
		<h2>WILL YOU BECOME <span>A HERO?</span></h2>
		<h3>IT TAKES <span>LESS THAN 2 MINUTES</span> TO REGISTER.</h3>
		<div class="small-10 small-centered medium-12 medium-uncentered columns">
			<h4>REGISTRATION CHECKLIST</h4>
			<ol>
				<li>Be at least 16 years of age</li>
				<li>Possess a valid Ontario health card</li>
				<li><a href="https://www.ontario.ca/page/organ-and-tissue-donor-registration?utm_source=so&utm_medium=keyword&utm_campaign=original" target="_blank">Register</a> as a donor with the goverment of Ontario</li>
				<li>Share your lifesaving decision on social media</li>
			</ol>
		</div>
	</div>
	<div class="small-12 medium-6 columns" id="shareCon" data-equalizer-watch>
		<h3><span>SHARE</span> YOUR DECISION TO REGISTER</h3>
		<p>By making the decision to register as an organ donor, you are helping to save the lives of up to 8 individuals and affect so many more. Share your decision to register on social media and encourage your friends and family to register.</p>
		<div id="registerSocMediaIcons">
			<a href="#"><img src="images/instagram-logo.svg" alt="Instagram" class="registerSocIcon"></a>
			<a href="#"><img src="images/twitter-logo.svg" alt="Twitter" class="registerSocIcon"></a>
			<a href="#"><img src="images/facebook-logo.svg" alt="Facebook" class="registerSocIcon"></a>
			<a href="#"><img src="images/snapchat-logo.svg" alt="Snapchat" class="registerSocIcon"></a>
		</div>
	</div>
</div>
<!--end register-->

<!--start contact-->
<div id="contactCon" class="row expanded">
	<div class="small-12 medium-10 medium-centered columns">
		<h2>HAS YOUR LIFE BEEN AFFECTED BY AN ORGAN DONOR? <br><span>SHARE YOUR STORY.</span></h2>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<div id="contactLeft" class="small-12 medium-6 columns">
			<div>
				<input class="contactInput" name="fname" type="text" placeholder="First name" required>
			</div>
			
			<div>
				<input class="contactInput" id="lastName" name="lname" type="text" placeholder="Last name" required>
			</div>
			
			<div>
				<input class="contactInput" name="email" type="email" placeholder="Email" required>
			</div>

			<div>
				<input class="contactInput" id="addressForm" name="address" type="text" placeholder="Address">
			</div>
		</div>
			
			<div class="small-12 medium-6 columns">
				<textarea class="contactInput" id="msgInput" name="msg" placeholder="Message" required></textarea>
			</div>
			
			<div class="small-12 columns">
				<input id="submit" type="submit" value="SUBMIT">
			</div>
		</form>

	</div>
</div>
<!--end contact-->
    
    
<!--CLOSE BODY CONTENT HERE-->
    
    
    
<?php
	include("layout/footer.php");
?>