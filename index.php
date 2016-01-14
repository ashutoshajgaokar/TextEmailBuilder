<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Text Email Builder</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
<style type="text/css">
*{margin:0; padding:0}
a{text-decoration:none; outline:none}
img{border:0; vertical-align:top}
li{list-style:none}
/*------------------------------------ 1.1 General Properties ------------------------------------*/
.dblock{display:block}
.dnone{display:none}
.fltrt{float:right}
.fltlt{float:left}
.posabs{position:absolute}
.posrel{position:relative}
.overhide{overflow:hidden}
header,navigation,hgroup,nav,footer,section,aside,article{display:block}
body{font-family:Arial, Helvetica, sans-serif; background:#ececec}
.clearfix:after{visibility: hidden;display:block;font-size: 0;content: " ";clear: both;height:0}
* html .clearfix{zoom:1} 
*:first-child+html .clearfix{zoom:1} 
.clrBoth{clear:both}
.txtVal{padding:12px 5px; width:80%; display:block}
#lhs,#rhs{padding:20px; width:45%}

.btn{border:0; background:#555; color:#fff; padding:2px 3px; margin:1px 0; font-size:10px; border-radius:3px; cursor:pointer}
.btn:hover{background:#333}

.lineHolder label{font-size:13px; display:block; margin-bottom:5px}
.lineHolder{margin-bottom:20px}
#code a{text-decoration:underline}
#code table{width:100%}
#header h1{padding:20px; font-size:20px; font-family:Ubuntu, Arial; color:#fff;background:#000}
.btnBig,.lineHolder label{font-family:Ubuntu, Arial; text-transform:uppercase}
.info{font-family:Ubuntu, Arial;}
h2{font-size:18px; font-family:Ubuntu, Arial; text-align:center; color:#000; text-transform:uppercase}

.btnBig{border:0; background:#0078E7; color:#fff; padding:10px; margin:1px 0; font-size:14px; border-radius:2px; cursor:pointer; display:inline-block; font-weight:bold}
.btnBig:hover{background:#0962c4}
.btnHolder{text-align:center; padding-top:20px}
#code{background:#fff}
.info{text-align:right; font-size:14px; background:#FF9; color:#000; padding:5px 10px; margin-top:20px}

.lineHolder:nth-child(-n+4) .removeMe{display:none}

#rhs h2{padding-bottom:10px}

.formatHolder{padding:5px; background:#777; color:#fff}

#linkColor,#fontColor{background:none; border:0; height:35px}
.formatHolder label{font-size:12px; float:left; margin:10px 5px 0 0}
#fontSel,#fontSize,#txtAlign{height:25px; border:1px solid #ccc; padding:0; margin-top:5px}
.formCont{padding-right:15px}

.removeCta{background:#333; color:#fff; display:inline-block; padding:2px 5px; position:absolute; display:none; top:0; left:0; font-size:10px; border-radius:5px; cursor:pointer}
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<h1><img src="logo.gif" border="0"/></h1>
    </div>
    <div id="content">
    
    	<div id="lhs" class="fltlt">
        	
            <h2>Your Email template preview</h2>
            
            <div class="btnHolder">
                <input type="button" onclick="surroundSelection()" value="CTA" class="btnBig">
                <input type="button" id="copyCode" value="Copy code"  class="btnBig">
                <input type="button" id="removeCTA" value="Remove all Links" onclick="removeLinks()"  class="btnBig">
            </div>
            <div class="info">Highlight the text and click on the CTA button to make it a link(Call to Action)</div>
           
            <div id="codeWrapper" class="clearfix posrel">
                <div id="code" class="clearfix">
                    <table cellpadding="0" cellspacing="15" border="0" width="100%">
                    <tr>
                    <td></td>
                    </tr>
                    <tr>
                    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="-1"> Say goodbye to bad quality TV.  Browse <a href="{{campaign_publisher_url}}">Popular Cable TV Plans</a> online.</font></td>
                    </tr>
                    <tr>
                    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="-1">Compare <a href="{{campaign_publisher_url}}">Cable TV Bundles</a> based on rates, features, providers and more.</font></td>
                    </tr>
                    <tr>
                    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="-1"><a href="{{campaign_publisher_url}}">Upgrade to Cable TV Today.&gt;&gt;</a></font></td>
                    </tr>
                    </table>
                </div>
            <span class="removeCta">Remove CTA <div class="posrel"><img src="arr.png" border="0" class="posabs" style="top:0px; left:30%" /></div></span>
            </div>

        </div>
        <div id="rhs"  class="fltrt">
        	<div class="clearfix">
             <h2>Add email content here</h2>
             
            <div class="lineHolder"><label>Line <span>1</span></label><input type="text" class="txtVal" /> <input type="button" class="removeMe btn" value="Remove"></div>
            <div class="lineHolder"><label>Line <span>2</span></label><input type="text" class="txtVal" /> <input type="button" class="removeMe btn" value="Remove"></div>
            <div class="lineHolder"><label>Line <span>3</span></label><input type="text" class="txtVal" /> <input type="button" class="removeMe btn" value="Remove"></div>
            
           
            <input type="button" onclick="addLine()" value="Add a Line"  class="btnBig">
            
            </div>
        </div>
    
    </div>
    <div id="footer">

	</div>
</div>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#code a").on("mouseover", function() {
	
		removableAnchor = $(this);
		var dimensions = $(this).position();
		var top = dimensions.top - 15 +"px";
		
		$(".removeCta").css({
		'top' : top,
		'left' : dimensions.left,
		'display':'block'
		});

	});
	
	$(".removeCta").on("click", function() {
		removableAnchor.contents().unwrap();
		$(this).hide();
	});
		
	
	$("#code a").on("mouseout",function (){
		$(".removeCta").css("display","none");
	});
	
	$(".removeCta").on("mouseover", function() {
		$(this).css("display","block");
	});
	
	$(".removeCta").on("mouseout", function() {
		$(this).css("display","none");
	});
	

	$('#lhs tr').each(function(index){
		if(!index==0){
			$(".lineHolder").eq(index-1).find('input[type="text"]').val($(this).find('font').text());
		}
	});
		
	$(".txtVal").on( "keyup", function() {
		$("#lhs td font").eq($(this).parent().index()-1).html($(this).val());
			
	});
	
	$(".txtVal").on("blur", function() {
		var str = $("#code").html();
		var newstr = str.replace(">>", "&gt;&gt;");
		var newstr = newstr.replace("•","&#8226;");
		var newstr = newstr.replace("*","&#8226;");
		var finalStr = replaceWordChars(newstr);
		$("#code").html(finalStr);
	});
	
	$(".removeMe").on( "click", function() {
		
		if(!($(".lineHolder").size() < 4 )){
		
			$('#lhs tr').each(function(index){
				$(this).attr("id","row_"+index);
			});
			
			var removemeIndex = $(this).siblings().find('span').text();
	
			$("#row_"+removemeIndex+"").remove();
			$(this).parent().remove();
			
			$('.lineHolder').each(function(index){
				$(this).find('span').html(index+1);
			});
			
			$('#lhs tr').each(function(index){
				$(this).attr("id","row_"+index);
			});
		
		}
		
		
	});
	
});


function rgb2hex(rgb) {
	
	var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	function hex(x) {
	return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
	}
	
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}
 
function replaceWordChars(text) {
	
    var s = text;
    s = s.replace(/[\u2018\u2019\u201A]/g, "\'");
    s = s.replace(/[\u201C\u201D\u201E]/g, "\"");
    s = s.replace(/\u2026/g, "...");
    s = s.replace(/[\u2013\u2014]/g, "-");
    s = s.replace(/\u02C6/g, "^");
    s = s.replace(/\u2039/g, "<");
    s = s.replace(/\u203A/g, ">");
    s = s.replace(/[\u02DC\u00A0]/g, " ");
    return s;
}

function addLine(){
	var tableElement = $("#lhs tr:last").clone(true).removeAttr('id').find("font").html("").end();
	$(tableElement).insertAfter("#lhs tr:last");
	
	var indexVal =  $(".lineHolder").size()+1;
	
	var inputElement = $(".lineHolder:last").clone(true).find("input:text").val("").end();
	$(inputElement).insertAfter(".lineHolder:last");
	
	
	$(inputElement).find('span').html(indexVal);
	
	$('.lineHolder').each(function(index){
		$(this).find('span').html(index+1);
	});		
}


function surroundSelection() {
	
	
    var span = document.createElement("a");
    span.href="{{campaign_publisher_url}}";
        
    if (window.getSelection) {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(span);

            sel.removeAllRanges();
            sel.addRange(range);
        }
    }
	
	
	$('#lhs td font a').each( function () {
		if($(this).children().size() > 0){
			$(this).children().contents().unwrap();
		}
	});
	

	$("#code a").on("mouseover", function() {
	
		removableAnchor = $(this);
		var dimensions = $(this).position();
		var top = dimensions.top - 15 +"px";
		
		$(".removeCta").css({
			'top' : top,
			'left' : dimensions.left,
			'display':'block'
		});

	});
	
	$("#code a").on("mouseout",function (){
		$(".removeCta").css("display","none");
	});
	
	$(".removeCta").on("mouseover", function() {
		$(this).css("display","block");
	});
	
	$(".removeCta").on("mouseout", function() {
		$(this).css("display","none");
	});
	
}

function removeLinks(){
	
	$('#lhs td font a').each( function () {	
		$(this).contents().unwrap();
	});		
}
</script>
<script src="jquery.zclip.js"></script>
<script type="text/javascript">
var count=0;
function zclipHack(){
	$("#copyCode").zclip({
		path:"ZeroClipboard.swf",
		copy:function(){return $("#code").html().trim()}
	});
}
$('#copyCode').click(function(){
	zclipHack();
}); 
zclipHack();
</script>



</body>
</html>