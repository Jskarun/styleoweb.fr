function rollover(myid)

{
	var style = document.getElementById(myid).style;
	style.position = 'relative';
	style.top = '-238px';
}	

function rollout(myid)

{
	var style = document.getElementById(myid).style;
	style.top = '0px';
}	



// FACEBOOK

function fbs_click() {
	u=location.href;
	t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
}


