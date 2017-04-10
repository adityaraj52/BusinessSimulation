<?PHP
require_once("fg_membersite.php");

$fgmembersite = new FGMembersite("smtp.gmail.com", 587, "adityaraj5252@gmail.com", "Imeminem1");

//Provide your site name here
$fgmembersite -> SetWebsiteName('BusinessSimulation.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('adityaraj5252@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/
    'localhost',
    /*username*/
    'root',
    /*password*/
    'mysql',
    /*database name*/
    'icln',
    /*table name*/
    'fgusers3',
    /*table name fileupload*/
    'fgusers3_fileupload',
    /*table name eventupload*/
    'fgusers3_eventupload'
);

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>