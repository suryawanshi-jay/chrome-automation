$(document).on('change','#campaign_current_status',function(){
	if($(this).is(':checked')) {
		var obj = {};
		obj['campaign_start'] = 'y';
		chrome.storage.local.set(obj);
	}
	else
	{
		var obj = {};
		obj['campaign_start'] = 'n';
		chrome.storage.local.set(obj);
	}
});

chrome.storage.local.get('campaign_start', function(result){
        if(result.campaign_start=='y') {
			$('#campaign_current_status').prop('checked',true);
		}
});

