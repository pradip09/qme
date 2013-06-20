function Redirect(url)
{
	window.location =  tpanel_url+"/"+url;
	
}

/* To get relative Combo */
function getRelativeCombo(id,selectedCat,combId,comboText,genArr,ext){
//alert(genArr);
	
	var val = id;
	if(ext && ext !='')
		var extval = $(ext).value;
	//alert(extval);

	var control = document.getElementById(""+combId+"");
	//alert(control);
	control.options.length = 0;
	control.options[0] = new Option(comboText);
	control.options[0].value = "";
	//alert(genArr.length);
	//alert(genArr[0][2]+"===>"+val);
	for(i=0,j=0; i< genArr.length; i++)
	{
		if(ext && ext !=''){ 
			if(genArr[i][2] == val && extval == genArr[i][3])
			{
				if(selectedCat == genArr[i][0])
				{
					control.options[j+1] = new Option(genArr[i][1]);
					control.options[j+1].value = genArr[i][0];
					control.options[j+1].selected = true;
					//alert(control.options[j+1].value);
				}else
				{
					control.options[j+1] = new Option(genArr[i][1]);
					control.options[j+1].value = genArr[i][0];
					//alert(control.options[j+1].value);
				}
				j++;
			}
		}else{
		
			if(genArr[i][2] == val)
			{
				
				
				if(selectedCat == genArr[i][0])
				{ 	
					control.options[j+1] = new Option(genArr[i][1]);
					control.options[j+1].value = genArr[i][0];
					control.options[j+1].selected = true;
					
				}else
				{
					control.options[j+1] = new Option(genArr[i][1]);
					control.options[j+1].value = genArr[i][0];
					//alert(control.options[j+1].value);
				}
				j++;
			}
		}
	}
}

function actiononrows(action,primaryId,table)
{
	
	var oTable = $('#data_table').dataTable();
	
	var sData = jQuery('input:checked', oTable.fnGetNodes()).serialize();
	var aTrs = oTable.fnGetNodes();
	var str = '';
	for ( var i=0 ; i<aTrs.length ; i++ )
	{
		if(jQuery('input:checked', aTrs[i]).val()){
			str+=jQuery('input:checked', aTrs[i]).val()+",";
			if(action == 'delete')
			{
				var r=confirm("Are you sure to Detele? ");
				if (r==true)
				{
				oTable.fnDeleteRow(aTrs[i]);
				}
				else
				{
					return false;
				}
				
			}
		}
	}
	if(str == '')
	{
		alert("Please select atleast one record");
		return false;
	}
	 jQuery.ajax({
		type: "POST",
		url: site_url+"index.php?file=u-user&str="+str+"&iPrimaryId="+primaryId+"&action="+action+"&table="+table,
		success: function(data){
				var cnt = data.split("||");
				if(action != 'delete')
				{
					for ( var i=0 ; i<aTrs.length ; i++ )
					{
						if(jQuery('input:checked', aTrs[i]).val()){
							$("#status_"+jQuery('input:checked', aTrs[i]).val()).html(cnt[1]);
							$("#"+table+"_"+jQuery('input:checked', aTrs[i]).val()).attr("checked",false);
						}
					}
				}
				/*var msg = '';
				if(action == 'active')msg = cnt[0]+" records activated successfully";
				if(action == 'inactive')msg = cnt[0]+" records inactivated successfully";
				if(action == 'delete')msg = cnt[0]+" records deleted successfully";
				$("#actionmsg").show()
				$("#actionmsg").html(msg);
				setTimeout('$("#actionmsg").hide()',2000);*/
		}
    });
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