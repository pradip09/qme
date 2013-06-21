function getPageSize(){

	var xScroll, yScroll;

	if (window.innerHeight && window.scrollMaxY) {
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}

	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}

	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else {
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}


	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)
	return arrayPageSize;
}

function showSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "visible";
	}
}

// ---------------------------------------------------

function hideSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "hidden";
	}
}


function setSelectList(list_arr,selval)
{
	for(i=0;i<list_arr.length;i++)
	{
		if(list_arr[i].value == selval)
		{
			list_arr[i].selected=true;
			break;
		}
	}
}
function valid(actPath)
{

	if(Trim(document.frmlist.keyword.value)=="")
	{
		alert("Please Enter keyword for Search.");
		document.frmlist.keyword.value="";
		document.frmlist.keyword.focus();
		return false;
	}
	document.frmlist.keyword.value = Trim(document.frmlist.keyword.value);
	document.frmlist.mode.value="Search";
	if(actPath)
	{
		window.location=actPath +"&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value;
		return false;
	}
}

function RedirectURL(URL,ExtraParam)
{
	if(!ExtraParam)ExtraParam='';
	window.location=URL+ExtraParam;
	return false;
}

function alpha(value,length)
{
	chk1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ- ";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}
function alphanum(value,length)
{
	chk1="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_. ";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}

function decimalNumber(value,length){
	chk1="1234567890.";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}
function number(value,length){
	chk1="1234567890-";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}
function onlynumber(value,length){
	chk1="1234567890";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}

function Trim(s)
{
	return s.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function pollwin(url,w, h)
{
	pollwindow=window.open(url,'pollwindow','top=0,left=0,status=no,toolbars=no,scrollbars=no,width='+w+',height='+h+',maximize=no,resizable');
	pollwindow.focus();
}






// This code was written by Tyler Akins and has been placed in the
// public domain.  It would be nice if you left this header intact.
// Base64 code from Tyler Akins -- http://rumkin.com

var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

function encode64(input) {
   var output = "";
   var chr1, chr2, chr3;
   var enc1, enc2, enc3, enc4;
   var i = 0;

   do {
      chr1 = input.charCodeAt(i++);
      chr2 = input.charCodeAt(i++);
      chr3 = input.charCodeAt(i++);

      enc1 = chr1 >> 2;
      enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
      enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
      enc4 = chr3 & 63;

      if (isNaN(chr2)) {
         enc3 = enc4 = 64;
      } else if (isNaN(chr3)) {
         enc4 = 64;
      }

      output = output + keyStr.charAt(enc1) + keyStr.charAt(enc2) +
         keyStr.charAt(enc3) + keyStr.charAt(enc4);
   } while (i < input.length);

   return output;
}

function decode64(input) {
   var output = "";
   var chr1, chr2, chr3;
   var enc1, enc2, enc3, enc4;
   var i = 0;

   // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
   input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

   do {
      enc1 = keyStr.indexOf(input.charAt(i++));
      enc2 = keyStr.indexOf(input.charAt(i++));
      enc3 = keyStr.indexOf(input.charAt(i++));
      enc4 = keyStr.indexOf(input.charAt(i++));

      chr1 = (enc1 << 2) | (enc2 >> 4);
      chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
      chr3 = ((enc3 & 3) << 6) | enc4;

      output = output + String.fromCharCode(chr1);

      if (enc3 != 64) {
         output = output + String.fromCharCode(chr2);
      }
      if (enc4 != 64) {
         output = output + String.fromCharCode(chr3);
      }
   } while (i < input.length);

   return output;
}

/* Added By chetan
Purpose : Checking for obj availabe and Its Not Blank Value*/
function checkValidNull(obj, msg)
{
	if(obj)
	{
		if(Trim(obj.value)=="")
		{
			alert(msg);
			obj.focus();
			return false;
		}
	}
	else
		return false;
	return true;
}


function checkValidZero(obj, msg)
{
	if(obj)
	{
		if(Trim(obj.value)=="" || Trim(obj.value)=="0")
		{
			alert(msg);
			obj.focus();
			return false;
		}
	}
	else
		return false;
	return true;
}

/* It is compare the condition (equal,greater,less)
Parameter : Objname,
comparision value
condition pass 'Equal', 'Greater','Less'
Alere Message to Dipslay
*/
function checkValidCompare(obj,comparewithvalue,condition, msg)
{
	if(obj)
	{
		val=obj.value;
		flag=false;
		if(condition=='Equal' && val==comparewithvalue)
			flag=true;
		if(condition=='Greater' && val >= comparewithvalue)
			flag=true;
		if(condition=='Less' && val< comparewithvalue)
			flag=true;
		if(condition=='LessEqual' && val<= comparewithvalue)
			flag=true;

		if(flag)
		{
			alert(msg);
			obj.focus();
			return false;
		}
		else
			return true;
	}
	else
		return false;
}

function checkValidLength(obj,len, msg)
{
	if(obj)
	{
		val=Trim(obj.value);
		if(val=="" || val.length<len )
		{
			alert(msg);
			obj.focus();
			return false;
		}
	}
	else
		return false;
	return true;
}
function checkValidNumber(obj, msg)
{
	chk1="1234567890";
	flag=false;
	if(obj)
	{
		value=obj.value;
		if(Trim(value)!="")
		{
			len=obj.value.length;
			//alert(len);
			for(i=0;i<len;i++)
			{
				ch1=value.charAt(i);
				rtn1=chk1.indexOf(ch1);
				if(rtn1==-1)
					flag=true;
			}
		}
	}else{
		flag=true;
		msg='Object is not Avaible';
	}
	if(flag)
	{
		alert(msg);
		obj.focus();
		return false;
	}
	return true;
}
function checkValidFloatNumber(obj, msg)
{
	chk1="1234567890.";
	flag=false;
	if(obj)
	{
		value=obj.value;
		if(Trim(value)!="")
		{
			len=obj.value.length;
			//alert(len);
			for(i=0;i<len;i++)
			{
				ch1=value.charAt(i);
				rtn1=chk1.indexOf(ch1);
				if(rtn1==-1)
					flag=true;
			}
		}else flag=true;
	}else{
		flag=true;
		msg='Object is not Avaible';
	}
	if(flag)
	{
		alert(msg);
		obj.focus();
		return false;
	}
	return true;
}

function checkKeyEventNumber()
{
	val = event.keyCode;
   	if(val==13 || val==17 || val==16|| val==46|| val==9)	return true;
	if(val<48)	event.keyCode=0;
	if(val>57)	event.keyCode=0;
	return true;
}
function checkKeyEventFloatNumber()
{


	//alert(event+" "+navigator.appName);
	var val;
	if (navigator.appName == "Microsoft Internet Explorer")
      val = window.event.keyCode;
   	else if (navigator.appName == "Navigator")
		val = event.which;
   	else if (navigator.appName == "Mozilla")
       val = event.keyCode;
   	else if (navigator.appName == "Netscape")
       val = event.which;

	//alert(val);
	//val = event.keyCode;

	if(val==13)		return true;
	if(val<48 && val!=46 && val!=43 && val!=45)
  		event.keyCode=0;
	if(val>57)
		event.keyCode=0;
	return true;
}
function checkValidPhoneFormate(obj, msg)
{
	chk1="+.1234567890()- ";
	flag=false;
	if(obj)
	{
		value=obj.value;
		if(Trim(value)!="")
		{
			len=obj.value.length;
			for(i=0;i<len;i++)
			{
				ch1=value.charAt(i);
				rtn1=chk1.indexOf(ch1);
				if(rtn1==-1)
					flag=true;
			}
		}
	}else{
		flag=true;
		msg='Object is not Avaible';
	}
	if(flag)
	{
		alert(msg);
		obj.focus();
		return false;
	}
	return true;
}
function openLoadingWindow(loadMsg)
{
	if(loadMsg)
		loadMsg += " Loading..." ;
	else
		loadMsg = "Loading...";
	winObj=window.open("",0,"menubar=no,resiable=no,width=320,height=10,top=50,left=50");
	//	winObj.document.write("<style>BODY {FONT-FAMILY: Arial, Helvetica, sans-serif; }</style><body bgcolor='#FDFCD9'><table width=100%><tr><Td align=center><h1>Loading....</h1></TD></tr></table></body>");
	winObj.document.write("<style>BODY {FONT-FAMILY: Arial, Helvetica, sans-serif; }</style><body bgcolor='#FDFCD9'><h1><span id='load_div'></span></h1><script>word=new String('"+loadMsg+"');i=0;function showMessage(){if(i>word.length)i=0;document.getElementById('load_div').innerHTML=word.substring(0,i);i++;window.setTimeout('showMessage()', 40);}showMessage();</script>");
	return winObj;
}
function closeLoadingWindow(winObj)
{
	winObj.close();
}
function getHTTPObject()
{
	// code for Mozilla, etc.
	if (window.XMLHttpRequest)
  	{
  		xmlhttp=new XMLHttpRequest()
  	}
// code for IE
	else if (window.ActiveXObject)
  	{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  	}
	return xmlhttp;
}
function Highlight(e)
{
	if(e.className!="raw_selectedbg")
		e.className="mouseover";
}
function UnHighlight(e,classname)
{
//	alert(e.className)
	if(e.className!="raw_selectedbg")
		e.className=classname;
}
function openPopupImageWindow(ImageName,ImagePath)
{
	s=window.open(site_url+'popup.php?page=enlarge&pid=1&amp;h=700&amp;w=700&amp;popup=1&vImage='+ImageName+'&vImagepath='+ImagePath,'enlarged_view','toolbar=no,resizable=yes,scrollbars=yes,width=700, height=700');
	s.focus();
	return false;
}
function Delete_Image(tablename,fieldname,fieldid,value,Image)
{
	document.frmadd.mode.value='DeleteImage';
	//alert(tablename+" "+fieldname+" "+fieldid+" "+value);
	document.frmadd.TABLENAME.value=tablename;
	document.frmadd.FIELDNAME.value=fieldname;
	document.frmadd.FIELDID.value=fieldid;
	document.frmadd.FIELDVALUE.value=value;
	document.frmadd.IMAGEVALUE.value=Image;
	document.frmadd.submit();
}
/*	added by bhavin	23-jan-2006		*/

function checkObjectNull(obj, msg)
{
	if("undefined" != typeof(obj.type))// If multiple value then return error
	{
		typeVal = obj.type
	}
	else
	{
		typeVal = obj[0].type
	}
	switch(typeVal)
	{
		case "text":
			if(obj.value=="")
			{
				alert(msg);
				obj.focus();
				return false;
			}
			break;
		case "radio":
			var tot = obj.length;
//				alert(tot);
			flag = 0;
			if(tot>0)// Return undefined if array of object
			{
				for(i=0; i<tot ; i++)
				{
					if(obj[i].checked)
					{
						flag=1;
						break;
					}
				}
			}
			else
			{
				if(obj.checked)
					flag=1;
			}
			if(flag==0)
			{
				alert(msg);
				if(tot>=0) obj[0].focus();
				else obj.focus();
				return false;
			}
			break;
		case "checkbox":
			var tot = obj.length;
//				alert(tot);
			flag = 0;
			if(tot>0)// Return undefined if array of object
			{
				for(i=0; i<tot ; i++)
				{
					if(obj[i].checked)
					{
						flag=1;
						break;
					}
				}
			}
			else
			{
				if(obj.checked)
					flag=1;
			}
			if(flag==0)
			{
				alert(msg);
				if(tot>=0) obj[0].focus();
				else obj.focus();
				return false;
			}
			break;

		case "select-one":
			if(obj.selectedIndex==0)
			{
				alert(msg);
				obj.focus();
				return false;
			}
			break;
		case "textarea":
			if(obj.value=="")
			{
				alert(msg);
				obj.focus();
				return false;
			}
			break;
		case "file":
			if(obj.value=="")
			{
				alert(msg);
				obj.focus();
				return false;
			}
			break;
	}
	return true;
}

function openWindow(destination,height, width) {
	var targetWindow = destination;
	var x = Math.random();
	x = x * 1000;
	x = Math.round(x);
	var wind = "window" + x
	temp = window.open(targetWindow, wind, config='height=' + height + ',width=' + width + ',toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no, directories=no,status=yes,left=50,top=50');
}
function Gen_OpenthickBox(fileurl,title,Extval,h,w)
{
	var u = inc_ajax_url+fileurl+"?"+Extval+"&keepThis=true&TB_iframe=true&height="+h+"&width="+w;
	//alert(u);return false;
 	var t = title;
	var g = null;
	TB_show(t, u, g);
	return false;
}
function submenu(fval,tot)
{
	//alert(fval + " --  " +tot);
	//alert(fval);
	if(typeof(admin_image_url)!='undefined' && admin_image_url!="")
		image_tab_url = admin_image_url;
	else
		image_tab_url = 'images/';
	//alert(image_tab_url)
	if(document.getElementById('TabId'))
		document.getElementById('TabId').value=fval;
	for(i=1;i<=tot;i++)
 	{
		var sample="form"+i;
		//alert(fval + " -- " + i);
		if(parseInt(fval)==parseInt(i))
		{
			document.getElementById(sample).style.display='inline';
		   	document.getElementById("form"+i+"td").background = image_tab_url + 'tab_enable.gif'
			document.getElementById("form"+i+"font").color = '#FFFFFF'
			if(fval==tot)
			{ document.getElementById("form"+i+"tdright").background = image_tab_url +  'tab_enable-right.gif' }
			else
			{ document.getElementById("form"+i+"tdright").background = image_tab_url +  'tab_enable-right.gif'}
		}
		else
		{
			if(document.getElementById("form"+i+"td").background != (image_tab_url + 'tab_disable.gif'))
			{
				//alert(document.getElementById("form"+i+"td"));
				document.getElementById(sample).style.display='none';
				if(document.getElementById("form"+i+"td").background=="")
					continue;
				document.getElementById("form"+i+"td").background = image_tab_url + 'tab_disable.gif';
				document.getElementById("form"+i+"tdright").background = image_tab_url + 'tab_disable-right.gif';
				document.getElementById("form"+i+"font").color = '#000000'
			}
		}
		//alert(document.all(sample).style.display + " >> " + i);
	 }
}
// Created By Ankit Agrawal
// Date : 26/Sept/2007
function switchto(plink,val){
	window.location=plink+'&iId='+val;
}

function switchtoRSS(plink,val){
	window.location=plink+'&iSiteId='+val+'&iId='+val;
}

/*	End Fucntion */

function findPosX(obj)
{
	var curleft = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}
	else if (obj.x)
		curleft += obj.x;
	return curleft;
}

function findPosY(obj)
{
	var curtop = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}
	else if (obj.y)
		curtop += obj.y;
	return curtop;
}

function DivShowToolTip(idstr,TooltipText)
{
	CTRL = document.getElementById(idstr);
	xval = findPosX(CTRL);
	yval = findPosY(CTRL);
	document.getElementById("tooltip").innerHTML = "<div  onmousemove='JS_CALENDAR_FLAG=true;' onmouseout='JS_CALENDAR_FLAG=false;setTimeout(\"DivHideToolTip();\",1000);'><table cellpadding='10' cellspacing:'3' border='0' bgcolor='#000000' cellspacing='0' width='300px'><tr><td class='tooltip-top'>" + TooltipText  + "</td></tr><tr><td class='tooltip-bottom'  height='10px'></td></tr></table></div>";
	document.getElementById("tooltip").style.width = 350;
	document.getElementById("tooltip").style.top = parseInt(yval) + 9;
	document.getElementById("tooltip").style.left = parseInt(xval) + 11;
	document.getElementById("tooltip").style.visibility = "visible";

}
function DivHideToolTip()
{
	if(!JS_CALENDAR_FLAG)
		document.getElementById("tooltip").style.visibility = "hidden";
}
function replace_string(str)
{
	//str = Trim(str);
	//str = str.replace("/","");
	str = str.replace("’","");
	str = str.replace("(","");
	str = str.replace(")","");
	str = str.replace("?","");
	str = str.replace("-","_");
	str = str.replace("#","");
	//str = str.replace(",","");
	str = str.replace(";","");
	str = str.replace(":","");
	str = str.replace("'","");
	str = str.replace("\"","");
	str = str.replace("ø","_");
	str = str.replace("Ø","_");
	str = str.replace("Å","_");
	str = str.replace("æ","_");
	str = str.replace("å","_");
	str = str.replace(" ","_");
	str = str.replace("&","and");
	return str;
}
var i=0;
function pollwin_detail(url,w, h)
{
	pollwindow=window.open(url,'pollwindow'+i,'top=30,left=100,status=no,toolbars=no,scrollbars=yes,width='+w+',height='+h+',maximize=no,resizable');
	pollwindow.focus();
	i=i+1;
}

/* Rollover Effect */
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_showHideLayers(Id,Mode)
{
	var v,obj;
	try{
		obj=document.getElementById(Id);
		if (obj!=null){
			v=Mode;
			if (obj.style){
					obj=obj.style;
					v=(v=='show')?'visible':(v=='hide')?'hidden':v;
			}
			//alert(v);
			obj.visibility=v;
		}
	}catch(error){
		//alert("");
	}
}


function chkDigitZipcode(events)
{

	var unicodes=events.charCode? events.charCode :events.keyCode;

	if (unicodes!=8)
	{ //backspace
	        if( (unicodes>47 && unicodes<58 || unicodes == 127 || unicodes == 9)){
	  			return true;
		}
		else{
				if(events.charCode == 0)
					return true;
				else
					return false;
			}
	}
}


function checkprice(events)
{

	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if( ((unicodes>45 && unicodes<58) || unicodes == 39 || unicodes == 37  || unicodes == 9 || unicodes == 110)){
	            return true;
		}else{
			return false;
		}
	}
}

function subscribe_newsletter(val)
{
        if(document.getElementById('newsletter_email').value=='' || document.getElementById('newsletter_email').value=='Enter your Email ID here')
        {
                alert("Please enter Email for Newsletter Signup");
                return false;
        }

	if(document.getElementById('newsletter_email').value != ''){
		var valid_msg = isValidEmail(val);
		if(valid_msg != 0){
			alert(valid_msg);
			document.getElementById('newsletter_email').focus();
			return false;
		}
	}

       var extra ='';
       var url = site_url+'index.php?file=a-subscribe_newsletter';
       extra+='&email='+val;
       var pars = extra;

	//alert(url+pars);return false;
	var myAjax = new Ajax.Request(
	url,
	{
		method: 'get',
		parameters: pars,
		onSuccess: getMessage
	});

}

function getMessage(originalRequest){

  if(originalRequest.responseText.indexOf('invalid') == -1)
	{
		var xmlDocument = originalRequest.responseXML;

		var msg	=	xmlDocument.getElementsByTagName('msg').item(0).firstChild.data;
		//alert(login);
		if(msg != ''){
			alert(msg);
			document.getElementById('newsletter_email').value='';
			document.getElementById('newsletter_email').focus();
		}

	}
}

function getclearAddvance(obj){
	var msg = document.getElementById(obj.id).value;

	if(msg == ''){
	   msg = 'Enter Zip, City or State';
	   document.getElementById(obj.id).value = msg;
  }
	if(document.getElementById(obj.id).value == msg){
		document.getElementById(obj.id).value ='';
	}

}
function getDefaultValue(obj){

   if(document.getElementById(obj.id).value == ""){
      if(document.getElementById(obj.id).id == 'iZipID'){
         document.getElementById(obj.id).value = "Enter Zip, City or State";
      }
	}
	//$('msg').value = '';
}

function vaildsearch(){
  if(document.getElementById('iZipID').valuel !=''){
   var serchval = document.getElementById('iZipID').value;

	var extra ='';
	extra+='&serchval='+serchval;
	var url = site_url+"index.php?file=a-aj_savesessionzipcity";
	var pars = extra;
	//alert(url+pars);
	var myAjax = new Ajax.Request(
	url,
		{
			method: 'get',
			parameters: pars,
			onSuccess: getsaveSessionMessage
		});
  }
}

function getsaveSessionMessage(originalRequest){
	
  if(originalRequest.responseText.indexOf('invalid') == -1)
	{
		var xmlDocument = originalRequest.responseText;
		//var succ	=	xmlDocument.getElementsByTagName('succ').item(0).firstChild.data;
		//if(succ == '1'){
			//window.location=site_url+"storelist";
		//}
		//alert(xmlDocument);
		if(xmlDocument != 0)
		{
			document.getElementById('featuerID').style.display = '';
			document.getElementById('featuerID1').style.display = 'none';
			document.getElementById('mycarousel').innerHTML = xmlDocument;
			
			
			jQuery('#mycarousel').jcarousel({
				//auto:2,
				wrap:'last'
				//initCallback: mycarousel_initCallback
			});
			if(jQuery('.img-hover').length <= 8){
				jQuery('.jcarousel-prev').hide()
				jQuery('.jcarousel-next').hide();
			}
			else
			{
				jQuery('.jcarousel-prev').show()
				jQuery('.jcarousel-next').show();
			}
		}
		else
		{
			//document.getElementById('featuerID').innerHTML = '<center><h2>No Stores Found</center></h2>';
			document.getElementById('featuerID').style.display = 'none';
			document.getElementById('featuerID1').style.display = '';
		}		
	}
}

function vaildsearchnew(){
	if(document.getElementById('iZipID').valuel !=''){
		var serchval = document.getElementById('iZipID').value;

		var extra ='';
		extra+='&serchval='+serchval;
		var url = site_url+"index.php?file=a-aj_savesessionzipcitynew";
		var pars = extra;
		//alert(url+pars);
		var myAjax = new Ajax.Request(
		url,
			{
				method: 'get',
				parameters: pars,
				onSuccess: getsaveSessionMessagenew
			});
	}
}

function getsaveSessionMessagenew(originalRequest){
	
  if(originalRequest.responseText.indexOf('invalid') == -1)
	{
		var xmlDocument = originalRequest.responseXML; 
		//alert(originalRequest.responseXML);
		var succ	=	xmlDocument.getElementsByTagName('succ').item(0).firstChild.data;
		if(succ == 1){
			window.location = site_url+"home";
			return false;
		}
		
	}
}


function getCityName(objState, objCity, SelCity)
{
	stateobj=document.getElementById(objState);
	cityobj=document.getElementById(objCity);
        city_select = SelCity;
	var url = site_url+"getCity.php?Code=";
	var isWorking = false;
	if (!isWorking)
	{
		catID = stateobj.value;
		isWorking = true;
		url += catID;
		if (window.XMLHttpRequest)
	  	{
	  		http=new XMLHttpRequest()
	  		http.open("GET",url, true);
                        http.onreadystatechange=handleHttpResponse_city

                        http.send(null)
	  	}
		// code for IE
		else if (window.ActiveXObject)
	  	{
	  		http=new ActiveXObject("Microsoft.XMLHTTP")
	    	if (http)
	    	{
	    		http.open("GET",url, true);
	    		http.onreadystatechange=handleHttpResponse_city
	    		http.send()
	    	}
	  	}
  	}
}

function handleHttpResponse_city()
{
	if (http.readyState == 4)
	{
      	isWorking = false;
    	if (http.responseText.indexOf('invalid') == -1)
		{
			var xmlDocument = http.responseXML;
			var no = xmlDocument.getElementsByTagName('tot').item(0).firstChild.data;
			var City_Obj=cityobj;
			if(parseInt(no)>0)
			{
				City_Obj.length=parseInt(no)+1;
				for(j=0,i=1;i<City_Obj.length;i++,j++)
				{
	   		   		var City =xmlDocument.getElementsByTagName('id').item(j).firstChild.data;
					//var SelVal = (sel_state_name == iPId)? true : false ;
	   				City_Obj[i].value	= City;
	   				City_Obj[i].text 	= City;
                                        if(city_select==City)
                                        {
                                                City_Obj[i].selected = 'selected';
                                        }
   					isWorking = false;
  				}
                        }
		}
  	}
}


function getZipcode(objCity, objZip, SelZip)
{
	cityobj=document.getElementById(objCity);
	zipobj=document.getElementById(objZip);
        zip_select = SelZip;
	var url = site_url+"getZipcode.php?Code=";
	var isWorking = false;
	if (!isWorking)
	{
		catID = cityobj.value;
		isWorking = true;
		url += catID;
		if (window.XMLHttpRequest)
	  	{
	  		http=new XMLHttpRequest()
	  		http.open("GET",url, true);
                        http.onreadystatechange=handleHttpResponse_zip
                        http.send(null)
	  	}
		// code for IE
		else if (window.ActiveXObject)
	  	{
	  		http=new ActiveXObject("Microsoft.XMLHTTP")
	    	if (http)
	    	{
	    		http.open("GET",url, true);
	    		http.onreadystatechange=handleHttpResponse_zip
	    		http.send()
	    	}
	  	}
  	}
}


function handleHttpResponse_zip()
{
	if (http.readyState == 4)
	{
      	isWorking = false;
    	if (http.responseText.indexOf('invalid') == -1)
		{
			var xmlDocument = http.responseXML;
			var no = xmlDocument.getElementsByTagName('tot').item(0).firstChild.data;
			var Zip_Obj=zipobj;
			if(parseInt(no)>0)
			{
				Zip_Obj.length=parseInt(no)+1;
				for(j=0,i=1;i<Zip_Obj.length;i++,j++)
				{
	   		   		var Zip =xmlDocument.getElementsByTagName('id').item(j).firstChild.data;
	   				Zip_Obj[i].value	= Zip;
	   				Zip_Obj[i].text 	= Zip;
                                        if(Zip==zip_select)
                                        {
                                                Zip_Obj[i].selected = 'selected';
                                        }
   					isWorking = false;
  				}
                        }
		}
  	}
}

function getDefault(obj){

   if(document.getElementById(obj.id).value == ""){
      if(document.getElementById(obj.id).id == 'newsletter_email'){
         document.getElementById(obj.id).value = "Enter your Email ID here";
      }
	}
	//$('msg').value = '';
}

function getclear(obj){
	var msg = document.getElementById(obj.id).value;

	if(msg == ''){
	   msg = 'Enter your Email ID here';
	   document.getElementById(obj.id).value = msg;
	}

	if(document.getElementById(obj.id).value == msg){
		document.getElementById(obj.id).value ='';
	}
}
function DisplayGeneralErrorMsg(msg){
        alert(msg);
        //var url = "generalerrormsgpopup/"+msg;
        //jQuery.facebox({ ajax: url});
}
function GeneralConformationBox(msg,mode,Id,funcname,disptype){
   var url = site_url+"errorconfirmpopup/"+msg+"/"+mode+"/"+funcname+"/"+disptype+"/"+Id;
   //alert(url);return false;
   jQuery.facebox({ ajax: url});
}
function chkValidPassword(events)
{
var unicodes=events.charCode? events.charCode :events.keyCode;

/*alert(unicodes);
return false;*/
	if (unicodes!=8)
	{//backspace
	        if((unicodes == 32))
	            return false;
			else
				return true;
	}
}
function chkValidPhone(events)
{
var unicodes=events.charCode? events.charCode :events.keyCode;
//alert(unicodes);
/*return false;*/
	if (unicodes!=8)
	{ //backspace
	        if( (unicodes>46 && unicodes<58) || unicodes == 46 || unicodes == 45 || unicodes == 40 || unicodes == 41 || unicodes == 43 || unicodes == 32 || unicodes == 9 || unicodes == 91 || unicodes == 93 || unicodes == 36 || unicodes == 37){
	            
		    return true;
		}else{
			return false;
		}
	}

}
function AllowOnlyPhoneNumeric(events)
{  
    var unicodes = events.charCode? events.charCode :events.keyCode;
	if(unicodes > 47 && unicodes < 58)
	   return true;
	else if(unicodes == '46' || unicodes == '9' || unicodes == 8 || unicodes == '40' || unicodes == '41' || unicodes == '43' || unicodes == '45')
		return true;
	else
	{
		return false;
	}
}

function getRegisterPage(){
	var url =site_url+'newregister';
	jQuery.facebox({ ajax: url});
}

function getregistrationMessageforpopup(originalRequest){
  if(originalRequest.responseText.indexOf('invalid') == -1){
        
        var xmlDocument = originalRequest.responseXML;
        var flag	=	xmlDocument.getElementsByTagName('flag').item(0).firstChild.data;
        //alert(flag);
        if(flag =='1'){
                DisplayGeneralErrorMsg("Email alrady exist.please check another Email address for registration.");
                return false;
        }else{
             window.location=site_url+"thanks";
        }
	}
}

function OnloadviewcartList(start){

	var extra = '';	
	extra+='&start='+start;

	var url = site_url+"index.php?file=a-aj_onloadviewcartlist";
	extra+='&page=1';
	var pars = extra; 

	//alert(url+pars);//return false;	 
	var myHome = new Ajax.Updater('divvewcartlist', url,{method: 'get',parameters: pars,evalScripts:false});
}

function popupvewcartUpdateCart(vSKUUPC){
         var extra = '';	
        if(document.getElementById('iQty'+vSKUUPC)){
                if(Trim(document.getElementById('iQty'+vSKUUPC).value) ==''){
                alert("Please Enter Quantity.");
                document.getElementById('iQty'+vSKUUPC).focus();
                return false;
                }
                var strqty = document.getElementById('iQty'+vSKUUPC).value;
                var strlength = strqty.length;
                if(strlength > 2){
                alert("Please enter two digit only.");
                document.getElementById('iQty'+vSKUUPC).focus();
                return false;
                }
                if(document.getElementById('iQty'+vSKUUPC).value < 1){
                        //alert("Please enter qty grater than zero.");
                        document.getElementById('iQty'+vSKUUPC).focus();
                        document.getElementById('iQty'+vSKUUPC).value = 1;
                        //return false;
                }

                var num = IsNumericnew(strqty);
                if(num == false){
                        //alert("Please enter digit only.");
                        document.getElementById('iQty'+vSKUUPC).focus();
                        document.getElementById('iQty'+vSKUUPC).value = 1;
                        //return false;			
                }
        }
       
        if(document.getElementById('iQty'+vSKUUPC).value > 0){
                        if(document.getElementById('iQty'+vSKUUPC)){
                                var iQty =  document.getElementById('iQty'+vSKUUPC).value;
                        }        
                        extra+='&iQty='+iQty;
                        
        }
        extra+='&vSKUUPC='+vSKUUPC; 
        var url = site_url+"index.php?file=a-aj_updatecartacctoqty";
        var pars = extra;
 
        //alert(url+pars);return false;	 
        var myAjax = new Ajax.Request(
        url,
        {
                method: 'get', 
                parameters: pars, 
                onSuccess: getpopviewcartUpdateMessage
        });	
		
}

 function getpopviewcartUpdateMessage(originalRequest){
        if(originalRequest.responseText.indexOf('invalid') == -1){
                var xmlDocument = originalRequest.responseXML; 		

                var vSKUUPC	=	xmlDocument.getElementsByTagName('vSKUUPC').item(0).firstChild.data;		
                var totprice =	xmlDocument.getElementsByTagName('totprice').item(0).firstChild.data;
                var grandtotal =	xmlDocument.getElementsByTagName('grandtotal').item(0).firstChild.data;

                if(document.getElementById('totprice'+vSKUUPC)){
                        document.getElementById('totprice'+vSKUUPC).innerHTML = "$"+totprice;
                }
                if(document.getElementById('divgrandtot')){
                        document.getElementById('divgrandtot').innerHTML = "$"+grandtotal;
                }
                 if(document.getElementById('totalshoppingprice')){
                        document.getElementById('totalshoppingprice').innerHTML    = '<span class="label"><strong>Total :</strong></span><span class="price"><strong> $ '+grandtotal+'</strong></span>'; 
                }

        }	

}
function IsNumericnew(sText){
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;
	for (i = 0; i < sText.length && IsNumber == true; i++) { 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) {
			IsNumber = false;
		}
	}
	return IsNumber;
}
function checkLogin_new(){
        var url=site_url+"login";
        jQuery.facebox({ ajax: url});      
}

//******************************************************************************************//
//********************* functions  for email-id validation ****************************//
//******************************************************************************************//
function isValidEmail(emailStr) {
	var checkTLD=1;
	var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat);
	if (matchArray==null) {
		return "Email address seems incorrect (see @ y. S ')";
		//alert("Email address seems incorrect (check @ and .'s)");
		//return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	// Start by checking that only basic ASCII characters are in the strings (0-127).
	for (i=0; i<user.length; i++) {
		if (user.charCodeAt(i)>127) {
			return "This user name contains invalid characters.";
			//return false;
		}
	}
	for (i=0; i<domain.length; i++) {
		if (domain.charCodeAt(i)>127) {
			return "Ths domain name contains invalid characters.";
			//return false;
		}
	}
	if (user.match(userPat)==null) {
		return "The user name does not appear to be valid.";
		//return false;
	}
	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
		for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				return "Destination IP address is not valid!";
				//return false;
	   		}
		}
		return 0;
	}
	var atomPat=new RegExp("^" + atom + "$");
	var domArr=domain.split(".");
	var len=domArr.length;
	for (i=0;i<len;i++) {
		if (domArr[i].search(atomPat)==-1) {
			return "The domain name does not appear to be valid.";
			//return false;
	   }	
	}
	if (checkTLD && domArr[domArr.length-1].length!=2 && 
		domArr[domArr.length-1].search(knownDomsPat)==-1) {
		return "The address must end in a known domain or two letter country." ;
		//return false;
	}

// Make sure there's a host name preceding the domain.

	if (len<2) {
		return "This address is a host name!";
		//return false;
	}	
	return 0;
}
function Trim(s) 
{
	return s.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function getState(iParentId){
	alert('hii');
	/*var extra='';
	if(iParentId!= ''){
		extra+='&iParentId='+iParentId;
	}
	if($('#file')){
		if($('#file').val() !=''){
			extra+='&templatefile='+$('#file').val();
		}
	}
	if(iCategoryId!= ''){
		extra+='&iCategoryId='+iCategoryId;
	}
	
	var url = site_url+"/index.php?file=a-ajstate";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		$('#divchildcatId').html(data);
		//GetProducts(0);
       });*/
}

function deleteitem(id ,type)
{
	//alert(id);
	//alert(type);
	var extra ='';
	extra+='&id='+id;
	extra+='&type='+type;
	//alert(extra);
	var url = site_url+"/index.php?file=a-ajdeletedata";
    
	var pars = extra; 
	$.post(url+pars,
            function(data) {
		//alert(data);
		var locat = data;
		window.location= site_url+locat;
	    });
}

