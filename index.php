<?php
$file = fopen("timestamp.txt","r");
$timestamp=fread($file,filesize("timestamp.txt"));
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>jQuery Countdown</title>
<link rel="stylesheet" href="jquery.countdown.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$( document ).ready(function() 
{
!function(l){function f(t,a){var s=t.find(".digit");if(s.is(":animated"))return!1;if(t.data("digit")==a)return!1;t.data("digit",a);var n=l("<span>",{class:"digit",css:{top:"-2.1em",opacity:0},html:a});s.before(n).removeClass("static").animate({top:"2.5em",opacity:0},"fast",function(){s.remove()}),n.delay(100).animate({top:0,opacity:1},"fast",function(){n.addClass("static")})}l.fn.countdown=function(t){var a,s,n,i,o,c,e,p=l.extend({callback:function(){},timestamp:0},t);function d(t,a,s){f(c.eq(t),Math.floor(s/10)%10),f(c.eq(a),s%10)}return(e=this).addClass("countdownHolder"),l.each(["Days","Hours","Minutes","Seconds"],function(t){l('<span class="count'+this+'">').html('<span class="digitsss"><span class="position">\t\t\t\t\t<span class="digit static">0</span>\t\t\t\t</span>\t\t\t\t<span class="position">\t\t\t\t\t<span class="digit static">0</span>\t\t\t\t</span></span><span class="daysss">'+this+"</span>").appendTo(e)}),c=this.find(".position"),function t(){(a=Math.floor((p.timestamp-new Date)/1e3))<0&&(a=0),d(0,1,s=Math.floor(a/86400)),a-=86400*s,d(2,3,n=Math.floor(a/3600)),a-=3600*n,d(4,5,i=Math.floor(a/60)),d(6,7,o=a-=60*i),p.callback(s,n,i,o),setTimeout(t,1e3)}(),this}}(jQuery);

 var current_timestamp = (new Date()).getTime();
 var timstamp = <?php echo $timestamp; ?>;
 if(timstamp > current_timestamp)
 {
	var final_timestamp = timstamp;
 }
 else
 {
	var chour=0;
	var cmin=0;
	var csecond=0;
	var cdays=3;
	var final_timestamp = (new Date()).getTime() + (cdays*24*60*60*1000) + (chour*60*60*1000) + (cmin*60*1000) + (csecond*1000);
	$.post("updatetime.php", {final_timestamp: final_timestamp} , function(data){});
 }
$('#countdown').countdown({
timestamp	: final_timestamp,
callback	: function(days, hours, minutes, seconds)
{
var message = "";
message += days + " day" + ( days==1 ? '':'s' ) + ", ";
message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
}
});
});
</script>
</head>
<body>
<div id="countdown" class="countdownHolder"></div>
</body>
</html>
<?php
fclose($file);
?>
