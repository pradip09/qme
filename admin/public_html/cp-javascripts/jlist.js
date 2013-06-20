function Doaction(mode,file,frm)
{
	
	if(mode == ''){
		alert("Please select an option");
		return false;
	}else if(mode == 'Show All'){
		window.location="index.php?file="+file+"&mode=view";
		return false;
	}else if(mode == 'Show All Topics'){
		window.location="index.php?file="+file+"&mode=view";
		return false;
	}else if(mode == 'Show all'){
		//window.location="index.php?file="+file+"&mode=edit&iMemberId="+id+tab;
		frm.action.value="Show all";
    		frm.submit();	
		
	}else {
    	var y=0; var ans;
    	
        y = getCheckCount(frm);
        
    	if(y>0)
    	{	      	       
    
    		if(mode == 'Active'){
    			frm.action.value="Active";
    			frm.submit();	
    		}else if(mode == 'Inactive'){
    			frm.action.value="Inactive";
    			frm.submit();	
    		}else if(mode == 'Deletes'){
    			frm.action.value="Deletes";
    			frm.submit();			
    		}else if(mode == 'Suspend'){
    			frm.action.value="Suspend";
    			frm.submit();
    		}else if(mode == 'Approve'){
    			frm.action.value="Approve";
    			frm.submit();
    		}else if(mode == 'InApprove'){
    			frm.action.value="InApprove";
    			frm.submit();
    		}else if(mode == 'Deletet'){
    			frm.action.value="Deletet";
    			frm.submit();
    		}else if(mode == 'Delete'){
    			frm.action.value="Delete";
    			frm.submit();
    		}
    		
    	}
	}
	
}


function checkActive()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confirm Active Status of Selected Record(s) ?");
		if(ans == true)
		{	frm.action.value="Active";	
			frm.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Activate.");	return false;	}
}

function checkInActive()
{
	var y=0; var ans;
	y = getCheckCount();
	
	if(y>0)
	{	ans = confirm("Confirm Inactive Status of Selected Record(s) ?");
		if(ans == true)
		{	frm.action.value="Inactive";	
			frm.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Deactivate.");	return false;	}
}

function checkDelete()
{
	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{	ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	frm.action.value="Deletes";
		    frm.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}

function getCheckCount(frm)
{
	var x=0;
	for(i=0;i < frm.elements.length;i++)
	{	if (frm.elements[i].id == 'iId' && frm.elements[i].checked == true) 
			{x++;}
	}
	return x;
}

function checkAll(frm)
{
    var rs = (frm.check_all.checked)?true:false;
	
	
	for(i=0;i<frm.elements.length;i++)
	{
	  	if(frm.elements[i].id == 'iId')
  		{
			frm.elements[i].checked = rs;
		}

	}  
}
