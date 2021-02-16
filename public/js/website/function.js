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

function hmsWebsiteAll() {

	
}