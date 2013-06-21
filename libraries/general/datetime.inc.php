<?php
//define here datetime formate functions
function DateTime($text,$format='')
{
	if($text =="" || $text =="0000-00-00 00:00:00")
		return "---";
	switch($format)
	{
		//us formate
		case "1":
			return date('M j, Y',strtotime($text));
			break;

		case "2":
			return date('M j, y  [G:i] ',strtotime($text));
			break;

		case "3":
			return date("M j, Y", $text);
			break;

		case "4":
			return date('Y,n,j,G,',$text).intval(date('i',$text)).','.intval(date('s',$text));
			break;

		case "5":
			return date('l, F j, Y',$text);
			break;

		case "6":
			return date('g:i:s',$text);
			break;

		case "7":
			return date('D, F j, Y  h:i A',strtotime($text));
			break;
			
		case "8":
			return date('Y-m-d',strtotime($text));
			break;
		case "9":
			return date('F j, Y',strtotime($text));
			break;
		case "10":
			return date('d/m/y',strtotime($text));
			break;
		case "11":
			return date('m/d/y',strtotime($text));
			break;
		case "12":
			return date('H:i',strtotime($text));
			break;	
		default :
			return date('M j, Y',strtotime($text));
			break;
	}
}

//Function Used in Login History
function Time_Format($text)
{
	if($text =="" || $text =="0000-00-00 00:00:00")
		return "---";
	else
		return date('M j, y [G:i]',strtotime($text));
}
function getNextDate($addmonth,$fromdate,$extdays="")
{
	$frmdate=strtotime($fromdate);
	$day=Date("d",$frmdate);
	$month=Date("m",$frmdate);
	$year=Date("Y",$frmdate);
	if($extdays != '')
		$adddays = $extdays;
	$nextmonth = mktime(0, 0, 0,$month+$addmonth,$day+$adddays,$year);
	$date3=date("Y-m-d",$nextmonth);
	return $date3;
}
?>
