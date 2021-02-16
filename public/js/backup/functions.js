// global variables
glob0 = 'active';
glob1 = '#overlay';
glob2 = '#side-nav';
glob3 = '.ui-tray';
glob4 = '.drawer';
glob5 = '.drawer--main';

function openDrawer(drawerClass){
	if ($(drawerClass)[0]){
		$(drawerClass).addClass(glob0);
	}
}
function openTray(trayClass){
	if ($(trayClass)[0]){
		$(glob1).addClass(glob0);
		$(trayClass).addClass(glob0);
		$(trayClass).find('.first-focus').focus();
	}
}
function closeTray(trayClass){
	if ($(trayClass)[0]){
		$(trayClass).removeClass(glob0);
	}
}
function closeAllTray(){
	$(glob1).removeClass('active');
	$(glob3).removeClass('active');
}

function hmsAll() {

	openTray('.ui-tray.splash');
	
	$('.first-focus').focus();

	$('body').on('click', '*[data-behaviour="add-loading"]', function() {
	    $(this).addClass('loading');
	});

	$('body').on('click', '*[data-behaviour="div-href"]', function() {

		var loc1 = $(this).attr('data-url');
		window.location.href = loc1;
	});
	$('body').on('click', '.page-tab', function() {

		var loc1 = $(this);
		var loc2 = $('.page-tab');
		var loc3 = loc1.attr('data-target');
		var loc4 = $('.page-tab-target');
		var loc5 = $('.page-tab-target.'+loc3);

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc4.removeClass(glob0);
		loc5.addClass(glob0);
	});
	$('body').on('click', '.open-pa-info', function () {

		var loc1 = '.pa-data-info';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.open-bs-info', function () {

		var loc1 = '.barge-schedule-view';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.ship-summary-switch-mode', function() {

		var loc1 = $(this);
		var loc2 = $('.ship-summary-switch-mode');
		var loc3 = loc1.attr('data-target');
		var loc4 = $('.'+loc3);
		var loc5 = $('.main-status-tab');

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc5.removeClass(glob0);
		loc4.addClass(glob0);
	});
	$('body').on('click', '.view-shift', function () {

		var loc1 = '.shift-activity-detail';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.view-meta', function () {

		var loc1 = '.nav-meta-tray';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.view-staff-shift', function () {

		var loc1 = '.shift-activity-detail-staff';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.switch-summary', function (e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = $('.switch-summary');
		var loc3 = loc1.attr('data-target');
		var loc4 = $('.'+loc3);
		var loc5 = $('.shift-table');

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc5.removeClass(glob0);
		loc4.addClass(glob0);
	});
	$('body').on('click', '.switch-discharge-detail', function (e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = $('.switch-discharge-detail');
		var loc3 = loc1.attr('data-seed');
		var loc4 = $('.table--shift-discharge-detail');

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc4.attr('data-mode',loc3);
	});
	$('body').on('click', '.switch-activity-detail', function (e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = $('.switch-activity-detail');
		var loc3 = loc1.attr('data-seed');
		var loc4 = $('.activity-slice');
		var loc5 = $('.activity-slice[data-mode="'+loc3+'"]');

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc4.removeClass(glob0);
		loc5.addClass(glob0);
	});
	$('body').on('click', '.switch-report-detail', function (e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = $('.switch-report-detail');
		var loc3 = loc1.attr('data-seed');
		var loc4 = $('.report-slice');
		var loc5 = $('.report-slice[data-mode="'+loc3+'"]');

		loc2.removeClass(glob0);
		loc1.addClass(glob0);

		loc4.removeClass(glob0);
		loc5.addClass(glob0);
	});
	$('body').on('click', '.apply-date-range-summary', function (e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = $('.nav-meta-tray');
		var loc3 = $('.summary-date-range');
		var loc4 = $('.switch-summary');
		var loc5 = $('.switch-summary.switch-activity');
		var loc6 = $('.shift-table');
		var loc7 = $('.shift-table.table--activities');

		loc1.addClass('loading');

	    setTimeout(function() {

	        loc4.removeClass(glob0);
	        loc5.addClass(glob0);

	        loc6.removeClass(glob0);
	        loc7.addClass(glob0);

	        loc3.removeClass(glob0);
	        loc2.addClass(glob0);
	        loc1.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.view-shift-discharge', function () {

		var loc1 = '.shift-discharge-detail';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.view-shift-report', function () {

		var loc1 = '.shift-report-detail';
		var loc2 = $(loc1);

	    loc2.addClass('loading');
	    openTray(loc1);

	    setTimeout(function() {
	        loc2.removeClass('loading');
	    }, 500);  
	});
	$('body').on('click', '.nav-icon', function () {

		$(glob1).addClass(glob0);
		$(glob2).addClass(glob0);
	});
	$('body').on('click', '#overlay', function () {

		$(glob1).removeClass(glob0);
		$(glob2).removeClass(glob0);
		$(glob4).removeClass(glob0);
		$(glob5).addClass(glob0);
	});
	$('body').on('click', '.close-sidebar', function () {

		$(glob2).removeClass(glob0);
	});
	$('body').on('click', '.open-drawer', function () {

		var loc1 = $(this).attr('data-target');
		openDrawer('.'+loc1);
	});
	$('body').on('click', '.close-current-drawer', function () {

		var loc1 = $(this).parents('.drawer');
		loc1.removeClass(glob0);
	});

	

	$('body').on('click', '.open-tray', function (e) {
		e.preventDefault();

		var loc1 = $(this).attr('data-target');
		openTray('.'+loc1);
	});
	$('body').on('click', '.close-tray', function (e) {
		e.preventDefault();

		var loc1 = $(this).attr('data-close');
		closeTray('.'+loc1);
	});
	$('body').on('click', '.close-all-tray, #overlay', function () {

		closeAllTray();
	});
	$('body').on('click', '.close-current', function () {

		var loc1 = $(this).parents('.ui-tray');
		loc1.removeClass(glob0);
	});
	$('body').on('click', '.hms-radio .form-badge-choice', function(e) {
		e.preventDefault();

		var loc1 = $(this);
		var loc2 = loc1.parents('.hms-radio').find('.form-badge-choice');

	    loc2.removeClass('selected');
	    loc1.addClass('selected');
	});
	$('body').on('click', '.ship-select-search-go', function() {

	    loc1 = $(this);
	    loc2 = $('.ship-result-options');

	    loc1.addClass('loading');

	    setTimeout(function() {
	        loc1.removeClass('loading');
	        loc2.removeClass('d-none');
	    }, 500); 
	});
	$('body').on('click', '.ship-option', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.ship-option');

		if (!loc1.hasClass('selected')) {
			loc2.removeClass('selected');
			loc1.addClass('selected');
		} else {
			loc1.removeClass('selected');
		}
	});
	$('body').on('click', '.confirm-ship-selection', function(e) {
		e.preventDefault();

		loc2 = $('.ui-tray');
		loc3 = $('#overlay');
		loc4 = $('.ship-option-target');
		loc5 = $('.selected-ship-template');

		loc10 = $('.ship-option.selected .ship-select-name').html();
		loc11 = $('.ship-option.selected .ship-select-meta').html();

		loc12 = $('.selected-ship-template .ship-select-name').html(loc10);
		loc13 = $('.selected-ship-template .ship-select-meta').html(loc11);

		loc4.html('');

		loc15 = loc5.html();
		loc4.html(loc15);

	    loc2.removeClass('active');
		loc3.removeClass('active');
	});
	$('body').on('click', '.tug-select-search-go', function() {

	    loc1 = $(this);
	    loc2 = $('.tug-result-options');

	    loc1.addClass('loading');

	    setTimeout(function() {
	        loc1.removeClass('loading');
	        loc2.removeClass('d-none');
	    }, 500); 
	});
	$('body').on('click', '.tug-option', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.tug-option');

		if (!loc1.hasClass('selected')) {
			loc1.addClass('selected');
		} else {
			loc1.removeClass('selected');
		}
	});
	$('body').on('click', '.confirm-tug-selection', function(e) {
		e.preventDefault();

		loc2 = $('.ui-tray');
		loc3 = $('#overlay');
		loc4 = $('.tug-option-target');
		loc5 = $('.selected-tug-template');

		loc4.html('');

		$('.tug-option.selected').each(function(){
			each1 = $(this).find('.tug-select-name').html();
			each2 = $(this).find('.tug-select-meta').html();

			loc5.find('.tug-select-name').html(each1);
			loc5.find('.tug-select-meta').html(each2);

			each3 = loc5.html();
			loc4.append(each3);
		});

		loc3.removeClass('active');
	    loc2.removeClass('active');
	});
	$('body').on('click', '.agent-select-search-go', function() {

	    loc1 = $(this);
	    loc2 = $('.agent-result-options');

	    loc1.addClass('loading');

	    setTimeout(function() {
	        loc1.removeClass('loading');
	        loc2.removeClass('d-none');
	    }, 500); 
	});
	$('body').on('click', '.company-select-search-go', function() {

	    loc1 = $(this);
	    loc2 = $('.company-result-options');

	    loc1.addClass('loading');

	    setTimeout(function() {
	        loc1.removeClass('loading');
	        loc2.removeClass('d-none');
	    }, 500); 
	});
	$('body').on('click', '.company-option', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.company-option');

		if (!loc1.hasClass('selected')) {
			loc2.removeClass('selected');
			loc1.addClass('selected');
		} else {
			loc1.removeClass('selected');
		}
	});
	$('body').on('click', '.agent-option', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.agent-option');

		if (!loc1.hasClass('selected')) {
			loc2.removeClass('selected');
			loc1.addClass('selected');
		} else {
			loc1.removeClass('selected');
		}
	});
	$('body').on('click', '.confirm-company-selection', function(e) {
		e.preventDefault();

		loc2 = $('.ui-tray');
		loc3 = $('#overlay');
		loc4 = $('.company-option-target');
		loc5 = $('.selected-company-template');

		loc10 = $('.company-option.selected .company-select-name').html();

		loc12 = $('.selected-company-template .company-select-name').html(loc10);

		loc4.html('');

		loc15 = loc5.html();
		loc4.html(loc15);

		console.log(loc15);

	    loc2.removeClass('active');
		loc3.removeClass('active');
	});
	$('body').on('click', '.confirm-agent-selection', function(e) {
		e.preventDefault();

		loc2 = $('.ui-tray');
		loc3 = $('#overlay');
		loc4 = $('.agent-option-target');
		loc5 = $('.selected-agent-template');

		loc10 = $('.agent-option.selected .agent-select-name').html();

		loc12 = $('.selected-agent-template .agent-select-name').html(loc10);

		loc4.html('');

		loc15 = loc5.html();
		loc4.html(loc15);

	    loc2.removeClass('active');
		loc3.removeClass('active');
	});
	$('body').on('click', '.do-register-ship', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.register-ship-feedback');

		loc1.addClass('loading');

		setTimeout(function() {
		    loc2.addClass('active');
		}, 500);  

		setTimeout(function() {
		    loc1.removeClass('loading');
		}, 1000);  
	});
	$('body').on('click', '.do-register-company', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.register-company-feedback');

		loc1.addClass('loading');

		setTimeout(function() {
		    loc2.addClass('active');
		}, 500);  

		setTimeout(function() {
		    loc1.removeClass('loading');
		}, 1000);  
	});
	$('body').on('click', '.do-register-tug', function(e) {
		e.preventDefault();

		loc1 = $(this);
		loc2 = $('.register-tug-feedback');

		loc1.addClass('loading');

		setTimeout(function() {
		    loc2.addClass('active');
		}, 500);  

		setTimeout(function() {
		    loc1.removeClass('loading');
		}, 1000);  
	});
	$('body').on('click', '.user-select-search-go', function() {

	    loc1 = $(this);
	    loc2 = $('.user-result-options');

	    loc1.addClass('loading');

	    setTimeout(function() {
	        loc1.removeClass('loading');
	        loc2.removeClass('d-none');
	    }, 500); 
	});
	$('body').on('click', '.user-tray-item', function(e) {
		e.preventDefault();

		loc1 = $(this);

		closeTray('.user-search-tray');
		openTray('.user-data-info');
	});
	$('body').on('click', '*[data-tray="toggle-section"]', function(e) {
		e.preventDefault();

		var loc1 = $(this).parents('.data-section');

		if (loc1.hasClass('active')) {
			loc1.removeClass('active');
		} else {
			loc1.addClass('active');
		}
	});
	$('body').on('click', '*[data-open="pa-activities"]', function(e) {
		e.preventDefault();

		var loc1 = '.pa-data-activities';

		openTray(loc1);
		$(loc1).addClass('loading');

		setTimeout(function() {
		    $(loc1).removeClass('loading');
		}, 500); 

		
	});
	$('body').on('click', '.timeline-tab', function(e) {
		e.preventDefault();

		var loc1 = $(this).attr('data-target');
		var loc2 = $('*[data-mode="'+loc1+'"]');
		var loc3 = $('.timeline-item');

		var loc4 = $(this).html();
		var loc5 = $('.timeline-filters .trigger');

		if (loc1 == 'all') {
			loc3.removeClass('d-none');
		} else {
			loc3.addClass('d-none');
			loc2.removeClass('d-none');
		}
		
		loc5.html(loc4);
	});
}