// ==UserScript==
// @name     Youtube Dark Theme
// @version  1
// @grant    none
// @author Phạm Trung Kiên
// @include https://www.youtube.com/*
// ==/UserScript==
function changeColor(el, bgc, color = '#ccc') {
	document.querySelectorAll(el).forEach(function(el) {
		el.style.setProperty('background-color', bgc, 'important');
		el.style.setProperty('color', color, 'important');
	});
}
var black23 = ['#yt-masthead-container', '#footer-container', '#creator-page-sidebar', '#vm-pagination', '.vm-video-item-content', '#non-appbar-vm-video-actions-bar', '#masthead-appbar', '#creator-subheader', '#vm-bulk-actions-selection', '#uploader-progress', '.metadata-tab', '.upload-item'],
grey12 = ['#body', '#masthead-search-term', '#vm-myvideos-search-box'],
greyccc = ['#yt-masthead-notifications-button', '#upload-btn', '.video-settings-add-tag', '.yt-uix-form-input-textarea', '.yt-uix-form-input-text' , '.metadata-tab h3'];
black23.forEach(function(el) {
	if (el == '.vm-video-item-content') {
		setTimeout(function() {
			let i = 1;
			while (i < 3) {
				changeColor(el, '#232323');
				changeColor('.vm-video-title-content', '', '#ccc');
				//changeColor('.yt-uix-form-input-checkbox', '#c3c3c3');
				changeColor('.vm-video-side-view-count a', '', '#ccc');
				i++;
			}
		}, 1000);
	}
	changeColor(el, '#232323');
});
greyccc.forEach(function(el){
	changeColor(el, '#ccc');
});
grey12.forEach(function(el) {
	changeColor(el, '#121212');
});
changeColor('#masthead-search-terms', '#121212', '#818181');
changeColor('.upload-widget', '#141414');
changeColor('.yt-uix-button', '#141414');
changeColor('#yt-masthead .yt-uix-button:not(#search-btn)', '', '');
document.getElementById('logo-container').style.filter = 'brightness(300%)';
document.querySelectorAll('.yt-uix-button-icon').forEach(function(el) {
	el.style.filter = 'invert(100%)';
});
document.querySelectorAll('.upload-time-remaining').forEach(function(el) {
	el.style.color = 'grey';
});
document.getElementById('appbar-guide-button').addEventListener('click', function(e) {
	setTimeout(function(){
		changeColor('.display-name', '', '#888888');
		changeColor('#guide-container', '#1C1C1C');
	}, 500);
});
