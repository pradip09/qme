<?

define('TABLE_PREFIX','cmyk_');

define("TBL_ADMIN", TABLE_PREFIX.'admin');

define("TBL_CATEGORY", TABLE_PREFIX.'category');

define("TBL_BACKGROUNDIMG",TABLE_PREFIX.'background_image');
define("TBL_INDEXIMG",TABLE_PREFIX.'index_image');
define("TBL_GALLERY",TABLE_PREFIX.'gallery');
define("TBL_SETTINGS",TABLE_PREFIX.'settings');
define("TBL_TREATMENT",TABLE_PREFIX.'treatement');
define("TBL_INDEX_HOMECON",TABLE_PREFIX.'home_content');
define("TBL_TESTIMONIAL",TABLE_PREFIX.'testimonial');

define("TBL_NEWSLETTER",TABLE_PREFIX.'newsletter');

define("TBL_QUERY",TABLE_PREFIX.'query');

define("TBL_SIZE_CHART",TABLE_PREFIX.'size_chart');

define("TBL_OTHERS",TABLE_PREFIX.'others');

define("TBL_LANDING",TABLE_PREFIX.'landing');

define("TBL_ARTICLES",TABLE_PREFIX.'articles');

define("TBL_OTHERS_LANDING",TABLE_PREFIX.'landing_others');

define("TBL_PACK",TABLE_PREFIX.'package');

define("TBL_PACKDESC",TABLE_PREFIX.'packageDesc');

define("TBL_BASKET",TABLE_PREFIX.'baskets');

define("TBL_NEWS",TABLE_PREFIX.'news');
define("TBL_POS_LEVEL",TABLE_PREFIX.'pos_level1_PL1');
define("TBL_RULIST",TABLE_PREFIX.'request_user_list');
define("TBL_OCC_COURSE",TABLE_PREFIX.'occsaion_course');
define("TBL_COURSE_SUB",TABLE_PREFIX.'course_subject');
define("TBL_COURSE_DATES",TABLE_PREFIX.'course_dates');
define("TBL_COURSE_ASSIGN",TABLE_PREFIX.'course_assign');
define("TBL_COURSE_ACTIVITY",TABLE_PREFIX.'course_activity');

define("TBL_ACCOMODATION",TABLE_PREFIX.'accomodation');

define("TBL_USERS",TABLE_PREFIX.'users');

define("TBL_PAPERSIZE",TABLE_PREFIX.'paper_size');
define("TBL_PRICE",TABLE_PREFIX.'price');
define("TBL_PRICE_NEW",TABLE_PREFIX.'price_new');

define("TBL_PAPER_SURFACE_MATCH",TABLE_PREFIX.'paper_surface_match');

define("TBL_PHOTOS",TABLE_PREFIX.'photos');define("MENU_SEPARATOR",'|_');
define("LOGOUT_MESSAGE",'Good Bye, You have successfully log out');
$displayVars = array("login" => array(

										"session_expired" => "Your session has expired. Please login again",

										"login_failed"	  => "Email id/Password is incorrect",

										"email_exists"	  => "Email id already is not available",

										"email_invalid"	  => "Please enter a valid email id",

										"email_valid"	  => "Email id is available",

										"password_sent"	  => "Your login credentials has been sent to your email id.",

										"account_created" => "Your account was created. Please login now.",

										"blank"		  => ""

									),

					"fp" => array(

										"email_invalid"		  => "Email id that you have provided doesn't exists."

									)

									

					);

define("FILE_EXT",'.html');  // it can be .html, .htm, .php, .anything

$history_status = array("Payment Success", "Processing", "Shipped","Completed","Pending", "Cancelled");

?>