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


// Home Page light box
function opacityNew()
{
//	document.getElementById("MainID").className="CCC";
	document.getElementById("filter").style.display="block";
	ClientHeight=document.body.clientHeight;
	clientWidth=document.body.clientWidth;
	document.getElementById("filter").style.height=ClientHeight+'px';
	document.getElementById("filter").style.width=clientWidth+'px';
	document.getElementById("box").style.display="block";
}
function opacityNew1()
{
	document.getElementById("MainID").className="fff";
}

function closebutton()
{
	document.getElementById('box').style.display='none';
	document.getElementById('filter').style.display='none';
}
function CheckUncheckAll(frm,chk)
{
	if(chk.name.substr(0,8)!="CheckAll")
	{
		CheckName = chk.name;
		MyChecked = true;

		for(i=0;i<frm.elements.length;i++)
		{
			if(frm.elements[i].name==CheckName && frm.elements[i].checked==false)
			{
				MyChecked=false;
				break;
			}
		}

		CheckAll = eval("frm.CheckAll_"+CheckName.substr(0,CheckName.length-2));
		CheckAll.checked=MyChecked;
	}		
	else
	{
		CheckName = chk.name.substr(9,chk.name.length)+"[]";
		
		if(chk.checked==true)
			AllChecked = true;
		else
			AllChecked = false;

		for(i=0;i<frm.elements.length;i++)
		{
			if(frm.elements[i].name==CheckName)
				frm.elements[i].checked=AllChecked;		
		}
	}
}

	var tooltip=function(){
	var id = 'tt';
	var top = 3;
	var left = 10;
	var maxw = 300;
	var speed = 70;
	var timer = 20;
	var endalpha = 80; //transparent background
	var alpha = 0;
	var tt,t,c,b,h;
	var ie = document.all ? true : false;
	return{
		show:function(v,w){
			if(tt == null){
				tt = document.createElement('div');
				tt.setAttribute('id',id);
				t = document.createElement('div');
				t.setAttribute('id',id + 'top');
				c = document.createElement('div');
				c.setAttribute('id',id + 'cont');
				b = document.createElement('div');
				b.setAttribute('id',id + 'bot');
				tt.appendChild(t);
				tt.appendChild(c);
				tt.appendChild(b);
				document.body.appendChild(tt);
				tt.style.opacity = 0;
				tt.style.filter = 'alpha(opacity=70)';
				document.onmousemove = this.pos;
			}
			tt.style.display = 'block';
			c.innerHTML = v;
			tt.style.width = w ? w + 'px' : 'auto';
			if(!w && ie){
				t.style.display = 'none';
				b.style.display = 'none';
				tt.style.width = tt.offsetWidth;
				t.style.display = 'block';
				b.style.display = 'block';
			}
			if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
			h = parseInt(tt.offsetHeight) + top;
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(1)},timer);
		},
		pos:function(e){
			var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
			var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
			tt.style.top = (u - h) + 'px';
			tt.style.left = (l + left) + 'px';
		},
		fade:function(d){
			var a = alpha;
			if((a != endalpha && d == 1) || (a != 0 && d == -1)){
				var i = speed;
				if(endalpha - a < speed && d == 1){
					i = endalpha - a;
				}else if(alpha < speed && d == -1){
					i = a;
				}
				alpha = a + (i * d);
				tt.style.opacity = alpha * .01;
				tt.style.filter = 'alpha(opacity=' + alpha + ')';
			}else{
				clearInterval(tt.timer);
				if(d == -1){tt.style.display = 'none'}
			}
		},
		hide:function(){
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
		}
	};
}();
function searchStore()
{
	
	CompulsoryTxtFlds = Array("SearchBox");

	FriendlyNames = Array("Search Store");


	for(i=0;i<CompulsoryTxtFlds.length;i++)
	{
		myfld = eval("frmstore."+CompulsoryTxtFlds[i])
		
		if(myfld.value == "")
		{
			alert(FriendlyNames[i]+" can not be blank.");
			//myfld.select();
			myfld.focus();
			return false;
		}
	}
	
	document.frmstore.submit();
}
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	  {
	  // Firefox, Opera 8.0+, Safari
	  xmlHttp=new XMLHttpRequest();
	  }
	catch (e)
	  {
	  // Internet Explorer
	  try
	    {
	    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	    }
	  catch (e)
	    {
	    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	  }
	return xmlHttp;
}
function updatePlan(store,act)
{
	
	var url=siteurl+"updateplan.php?s="+store+"&act="+act;
	var xmlHttpDel;
	xmlHttpDel=GetXmlHttpObject();
	if (xmlHttpDel==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	xmlHttpDel.onreadystatechange=function()
	{
		if(xmlHttpDel.readyState == 4 && xmlHttpDel.status == 200)
		{
			if(xmlHttpDel.responseText!="None")
			{
				alert("Store is Added to your Day Plan");
			}
		}
	}
	xmlHttpDel.open("GET",url,true);
	xmlHttpDel.send(null);
}
function showReview(id,show,startrec)
{
	var e=document.getElementById("rev"+id);
	url=siteurl+"getReviews.php?stid="+id+"&strec="+startrec;
	var xmlHttpDel;
	xmlHttpDel=GetXmlHttpObject();
	if (xmlHttpDel==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	xmlHttpDel.onreadystatechange=function()
	{
		if(xmlHttpDel.readyState == 4 && xmlHttpDel.status == 200)
		{
			if(xmlHttpDel.responseText!="None")
			{
				e.innerHTML=xmlHttpDel.responseText;
			}
		}
	}
	
	xmlHttpDel.open("GET",url,true);
	xmlHttpDel.send(null);
	
	if(show==0)
	{
		if(e.style.display=="none")
			e.style.display="";
		else
			e.style.display="none";
	}
}

var newwindow;
function poptastic(url){
newwindow=window.open(url,'name','height=500,width=500,left=220,top=20,toolbar=no,menubar=no,directories=no,location=no,scrollbars=yes,status=no,resizable=yes,fullscreen=no');
if (window.focus) {newwindow.focus()}
}
function dohideComment(th)
{
	if(document.getElementById("cr1"+th).style.display=="none")
	 {
		document.getElementById("cr1"+th).style.display="";		
	 }
	else
	 {
		document.getElementById("cr1"+th).style.display="none";		
	 }
	
}
