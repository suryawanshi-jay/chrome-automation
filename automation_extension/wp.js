var url = location.href;
var SITEURL = 'http://192.168.0.54/auto_message';
var APPURL = SITEURL+'index.php/user';
if(url.indexOf('start.html')>0 ) {
	setTimeout(function(){
	var campaign_id = gup('c',url);
	var token = gup('token',url);
	var last_update = gup('last_update',url);
	//var nextpart = gup('nextpart',url);
	if(campaign_id) {
	
		window.localStorage.setItem("c",campaign_id);
	}
	else
	{
	
		var campaign_id = window.localStorage.getItem("c");
	}
	
	if(token) {
	
		window.localStorage.setItem("token",token);
	}
	else
	{
	
		var token = window.localStorage.getItem("token");
	}
	
	var obj = {};
	obj['campaign_start'] = 'y';
	chrome.storage.local.set(obj);
	
	if(last_update!='y') {
		last_update = 'n';
	}
	
	//if(nextpart != 'y') {
	//	nextpart = 'n';
	//}
	
	if(campaign_id!='') {
	
	
		$.ajax({
				type: "POST", 
				url: APPURL+'/campaign/'+campaign_id,
				data: {token:token,last_update:last_update},
				dataType: 'json',
				success: function (res) {
				
					if(res.success) {
						
						window.localStorage.setItem("l",res.data.id);
						var last_id = window.localStorage.getItem("l");
						var obj = {};
						obj['name'] = res.data.name;
						chrome.storage.local.set(obj);
						if(res.data.phone!='910000000000') {
							window.location = 'https://api.whatsapp.com/send?phone='+res.data.phone+'&text='+encodeURIComponent(res.data.text);
						}
						else
						{
							window.location = 'https://api.whatsapp.com/send?text='+encodeURIComponent(res.data.text);
						}
					}
					else
					{
						var obj = {};
						obj['campaign_start'] = 'n';
						chrome.storage.local.set(obj);
						$('.m-widget3 h1').html(res.msg);
					}
				},
			});
			
	}
	
	},3000);
	
	
}
	

chrome.storage.local.get('campaign_start', function(result){
        if(result.campaign_start=='y') {
	
		var l = document.getElementById('action-button');
		
		if(typeof l !='undefined' &&  l != null ) {
			
			l.click();
		}
		setInterval(function(){ 
		
		var l = document.getElementById('action-button');
		if(typeof l !='undefined' &&  l != null ) {
			l.click();
		}
		},3000);
		}
});
	
if(url.indexOf('web.whatsapp.com')>0) {
	chrome.storage.local.get('campaign_start', function(result){
        if(result.campaign_start=='y') {
			var myVar = setInterval(function(){ 
			var x = $("button.compose-btn-send");
			if (x.length > 0) {
				x.trigger('click');
				setTimeout(function(){
					window.location = SITEURL+"1";
				},5000);
			}
			
			var x = $('[data-icon="send"]').parent();
			if (x.length > 0) {
				x.trigger('click');
				setTimeout(function(){
					window.location = SITEURL+"/index.php/User/redirectWhatsapp";
				},5000);
			}
			
			var u = $('[data-animate-modal-popup="true"] [role="button"]');
			if (u.length > 0) {
				if(u.html()!='Log out') {
					u.trigger('click');
					setTimeout(function(){
						window.location = SITEURL+'/index.php/user/errorWithWhatsLogout';
					},3000);
				}
			}
			
			//This code will handle group message
			var v = $('[data-animate-modal-popup="true"] [data-animate-drawer-title="true"] button');
			if (v.length > 0) {
				
				chrome.storage.local.get('name', function(result){
				if(result.name != '') {
					setTimeout(function(){
						var checkbox_class = '_3I_df';
						var contact_class = '_25Ooe';
						var contact_index = '';
						var i = 0;
						$('.flow-drawer-container .'+contact_class).each(function(){
							if($(this).find('span').attr('title') == result.name) {
								contact_index = i
							}
							i++;
						});
						console.log(contact_index);
						if(contact_index!='') {
							$('.flow-drawer-container ._3I_df:eq('+contact_index+')').trigger('click');
						}
						else
						{
							v.trigger('click');
							setTimeout(function(){
								window.location = SITEURL+"4";
							},3000);
						}
					},3000);
				}
				});				
				
			}
			
			
		}, 1000);
		}
    });
	
}

function gup( name, url ) {
	if (!url) url = location.href;
	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var results = regex.exec( url );
	return results == null ? null : results[1];
}