$(document).foundation();
(function(){
	"use strict";

var navItem = document.querySelectorAll(".navItem");
var footerNavItem = document.querySelectorAll(".footerNavItem");
var headerImgTxt = document.querySelector("#headerImgTxt");
var desktopHeaderLogo = document.querySelector("#headerLogo");
var downArrow = document.querySelector("#downArrow");
var vidThumbCon = document.querySelectorAll(".vidThumbCon");
var storyTitle = document.querySelector("#storyTxt a");
var storyBody = document.querySelector("#storyTxt p");
var thumbnails = document.querySelectorAll(".rotatorImg");
var mobileRecipientImg = document.querySelector("#mobileRotatorImgCon img");
var currentImg = 0;

var storyContent = [
{title:"Andrea", link:"https://beadonor.ca/stories/andrea", story:"Andrea thinks often of her donor's family and their grief. &#34;Every moment a thought goes out to them. I want to make them proud by living and taking care of what's been given to me.&#34;"},
{title:"Justin", link:"https://beadonor.ca/stories/justin", story:"&#34;To give an organ to save someone's life, to me, is the ultimate expression of caring and unconditional love. Words can't describe what this means to me, to my life and the lives of my daughters.&#34;"},
{title:"Carol", link:"https://beadonor.ca/stories/carol", story:"&#34;I can honestly say - my friends, my family, my Mom, my Dad, my children couldn't have given me this. They did, and I don't even know them. How do you thank somebody that has given you life?&#34;"},
{title:"Ryley", link:"https://beadonor.ca/stories/ryley", story:"&#34;If you needed an organ, would you take one? If you would...why wouldn't you share yours to save somebody else's life? It makes you a hero.&#34;"},
{title:"Become a Hero", link:"https://www.ontario.ca/page/organ-and-tissue-donor-registration?utm_source=so&utm_medium=keyword&utm_campaign=original", story:"Today there are nearly 1,600 Ontarians waiting for a lifesaving organ transplant. By registering to become an organ donor, you are actively helping lower that number."}
];

$.getJSON('admin/ajaxQueryHeader.php', function(data) {

	var currentLeftImg;
	var currentRightImg;


	setInterval(function() {
		currentLeftImg = Math.floor(Math.random() * data.length);
		$('#headerRotatorLeft').css('background-image','url(images/uploads/' + data[currentLeftImg].landImg_img + ')');
	}, 3500);

	//setInterval(function() {
	//	currentRightImg = Math.floor(Math.random() * data.length);
	//	$('#headerRotatorRight').css('background-image','url(images/uploads/' + data[currentRightImg].landImg_img + ')');
	//}, 28000);

});

function headerTxtSlide() {
	TweenMax.from(headerImgTxt, 1, {x:5000, ease:SteppedEase.easeOut});
}

function pageScroll(e) {
	var clicked = e.currentTarget.id;

	if (clicked == "mobileCampaign" || clicked == "desktopCampaign" || clicked == "footerCampaign" || clicked == "downArrow") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#theCampaign", offsetY:149}});
	}else if (clicked == "mobileStats" || clicked == "desktopStats" || clicked == "footerStats") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#theCampaignImgs", offsetY:69}});
	}else if(clicked == "mobileStories" || clicked == "desktopStories" || clicked == "footerStories") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#recipientStories", offsetY:149}});
	}else if (clicked == "mobileMedia" || clicked == "desktopMedia" || clicked == "footerMedia") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#mediaCon", offsetY:69}});
	}else if (clicked == "mobileRegister" || clicked == "desktopRegister" || clicked == "footerRegister") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#registerCon", offsetY:69}});
	}else if (clicked == "mobileContact" || clicked == "desktopContact" || clicked == "footerContact") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#contactCon", offsetY:69}});
	}else if (clicked == "headerLogo") {
		TweenMax.to(window, 0.7, {scrollTo:{y:"#homeRotatorCon"}});
	}
}

function statsCounter() {
	var waitingList = document.querySelector("#waitingListNo");
	var livesSaved = document.querySelector("#livesSavedNo");
	var registeredDonors = document.querySelector("#registeredDonorsNo");
	var waitingListNum = 1528;
	var livesSavedNum = 13300;
	var registeredDonorsNum = 31;
	var statsCon = document.querySelector("#statsCon");
	var screenPOS;
	var animNo;
	screenPOS = window.scrollY;
	animNo = statsCon.offsetTop;

	if (screenPOS+500>animNo) {

		window.removeEventListener("scroll", statsCounter, false);

		waitingList.innerHTML = waitingListNum;
		livesSaved.innerHTML = livesSavedNum;
		registeredDonors.innerHTML = registeredDonorsNum;

		$('.counter').each(function () {
		    $(this).prop('Counter',0).animate({
		        Counter: $(this).text()
		    }, {
		        duration: 5500,
		        easing: 'swing',
		        step: function (now) {
		            $(this).text(Math.ceil(now));
		        }
		    });
		});
	}
}

$('.rotatorImg, #rotatorLeft, #rotator2Left, #rotatorRight, #rotator2Right').on('click', function() {

	if(this.id == "rotatorLeft" || this.id == "rotator2Left") {
		currentImg--;
		if (currentImg < 0) {
			currentImg = thumbnails.length - 1;
		}
	}else if(this.id == "rotatorRight" || this.id == "rotator2Right") {
		currentImg++;
		if (currentImg >= thumbnails.length) {
			currentImg = 0;
		}
	}else{
		var idSlice = this.id.slice(10,11);
		currentImg = parseInt(idSlice);
	}

		mobileRecipientImg.src = "images/rotator_img_" + currentImg + ".png";
		storyTitle.innerHTML = storyContent[currentImg].title;
		storyTitle.href = storyContent[currentImg].link;
		storyBody.innerHTML = storyContent[currentImg].story;
		$('.rotatorImg').addClass('nonActive');
		thumbnails[currentImg].classList.remove('nonActive');
});

function switchVid(e) {
	var vidCon = document.querySelector("#vidCon");
	var vidSrc = document.querySelector("#vidSrc");
	var mp4Src = document.querySelector("#mp4Src");
	var webmSrc = document.querySelector("#webmSrc");
	var oggSrc = document.querySelector("#oggSrc");
	var clickedThumb = e.currentTarget.id;

	vidCon.poster = "videos/" + clickedThumb + ".png";
	//vidCon.setAttribute("src", "videos/" + clickedThumb + ".mp4");
	mp4Src.src = "videos/" + clickedThumb + ".mp4";
	mp4Src.type = "video/mp4";
	webmSrc.src = "videos/" + clickedThumb + ".webm";
	webmSrc.type = "video/webm";
	oggSrc.src = "videos/" + clickedThumb + ".ogg";
	oggSrc.type = "video/ogg";
	
	vidCon.load();

	$('.vidThumbCon img').removeClass('activeVid');
	$(this).find('img').addClass('activeVid');
}

for (var i=0; i<vidThumbCon.length; i++) {
	vidThumbCon[i].addEventListener("click", switchVid, false);
}

window.addEventListener("scroll", statsCounter, false);
window.addEventListener("load", headerTxtSlide, false);
desktopHeaderLogo.addEventListener("click", pageScroll, false);
//downArrow.addEventListener("click", pageScroll, false);

for (var i=0; i<navItem.length; i++) {
	navItem[i].addEventListener("click", pageScroll, false);
}

for (var i=0; i<footerNavItem.length; i++) {
	footerNavItem[i].addEventListener("click", pageScroll, false);
}

})();