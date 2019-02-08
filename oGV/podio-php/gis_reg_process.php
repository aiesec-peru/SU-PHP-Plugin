<?php
	include_once 'podio-php/PodioAPI.php';
	//Podio submit
	// This is to test the conection with the podio API and the authentication
	Podio::setup('expa-reg-2', 'YxHRe2mSAE070czTme4eT3K7WtdnHDrWY39JuCao5qTcQZbgtrD1dPIK8mykDc13');
	try {
  			Podio::authenticate_with_app(20291487, 'ec1526288fb947579c25629e24b22880');
		  	$v1 = $_POST['first_name'].'  '.$_POST['last_name'];
			$v2 = $_POST['edad'];
			$v3 = $_POST['email'];
			$v4 = $_POST['password'];
			$v5 = $_POST['phone'];
			$v6 = $_POST['ciudad'];
			$v7 = $_POST['universidad'];
			$vlc = $_POST['localcommittee'];
			list($v8, $v15) = explode("|", $vlc);
			$v9 = $_POST['carrera'];
			$v10 = $_POST['ciclo'];
			$v11 = $_POST['experiencia'];
			$v12 = $_POST['interested_in'];
			$v13 = $_POST['source'];
			$v14 = $_POST['interested_when'];
		  	$fields = 	new PodioItemFieldCollection(array(
							new PodioTextItemField(array("external_id" => "title", "values" => $v1)),
							new PodioTextItemField(array("external_id" => "edad",  "values" => $v2)),
							new PodioTextItemField(array("external_id" => "correo-electronico", "values" => $v3)),
							new PodioTextItemField(array("external_id" => "telefono", "values" => $v5)),
							new PodioCategoryItemField(array("external_id" => "ciudad", "values" 				=> intval($v6))),
							new PodioCategoryItemField(array("external_id" => "universidad", "values" 			=> intval($v7))),
							new PodioCategoryItemField(array("external_id" => "comite", "values" 				=> intval($v8))),
							new PodioCategoryItemField(array("external_id" => "campo-de-estudio", "values" 		=> intval($v9))),
							new PodioCategoryItemField(array("external_id" => "ciclo-en-curso", "values" 		=> intval($v10))),
							new PodioCategoryItemField(array("external_id" => "experiencia-laboral", "values" 	=> intval($v11))),
							new PodioCategoryItemField(array("external_id" => "programa-de-interes", "values" 	=> intval($v12))),
							new PodioCategoryItemField(array("external_id" => "mes-estimado-de-viaje", "values" => intval($v13))),
							new PodioCategoryItemField(array("external_id" => "medio-por-el-cual-nos-conociste", "values" => intval($v14)))
  						));
		  	// Create the item object with fields
		  	// Be sure to add an app or podio-php won't know where to create the item
		  	$item = new PodioItem(array	(	'app' => new PodioApp(20291487), // Attach to app with app_id=123
											'fields' => $fields
		  								));
		  	// Save the new item
		  	$item->save();
		}

	catch (PodioError $e) 
		{
  			// Something went wrong. Examine $e->body['error_description'] for a description of the error.
  			echo $e;
			
			echo '<SCRIPT LANGUAGE="JavaScript">';
		echo "alert('ERROR');";
		echo "alert('$e');";
		echo "</SCRIPT>";
		}
		
		
	function is_iterable($var)
		{
    		return $var !== null 
        		&& (is_array($var) 
            	|| $var instanceof Traversable 
            	|| $var instanceof Iterator 
            	|| $var instanceof IteratorAggregate);
		}

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://auth.aiesec.org/users/sign_in',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$result = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

// extract token from cURL result
preg_match('/<meta content="(.*)" name="csrf-token" \/>/', $result, $matches);
$gis_token = $matches[1];

//close connection
curl_close($ch1);

$user_lc = strval($v15);

/*FH
$referral_type_num = intval($_POST['source']);

$referral_type = '';

if($referral_type_num == 1 or $referral_type_num == 2){
  $referral_type = 'Facebook';
}
else if ($referral_type_num == 7){
  $referral_type = 'Friend';
}else if ($referral_type_num == 3){
  $referral_type = 'Other social media channel';
}else if ($referral_type_num == 12 || $referral_type_num == 14){
  $referral_type = 'Other social media channel';
}else if ($referral_type_num == 11){
  $referral_type = 'Event';
}else if ($referral_type_num == 5){
  $referral_type = 'Instagram';
}else if ($referral_type_num == 4){
  $referral_type = 'Twitter';
}else if ($referral_type_num == 6){
  $referral_type = 'LinkedIn';
}else if ($referral_type_num == 16){
  $referral_type = 'Search engine';
}else if ($referral_type_num == 10){
  $referral_type = 'Information booth on campus';
}
else {
  $referral_type = 'Other';
}
*/

 $referral_type = 'Other';

// structure data for GIS
// form structure taken from actual form submission at https://auth.aiesec.org/users/sign_in

$configs = include('config.php');

$fields = array(
    'authenticity_token' => htmlspecialchars($gis_token),
    'user[email]' => htmlspecialchars($v3),
    'user[first_name]' => htmlspecialchars($_POST['first_name']),
    'user[last_name]' => htmlspecialchars($_POST['last_name']),
    'user[password]' => htmlspecialchars($_POST['password']),
    'user[phone]' => htmlspecialchars($_POST['phone']), //ConFe
    'user[allow_phone_communication]' => htmlspecialchars($_POST['user_allow_phone_communication']), //Permitir el contacto telefónico		
    'user[country]' => $configs["country_name"], //'POLAND', // EXAMPLE: 'GERMANY' 
    'user[mc]' => $configs["mc_id"], //'1626', // EXAMPLE: 1596
    'user[lc_input]' => $user_lc,
    'user[lc]' => $user_lc,
    'user[alignment_id]' => htmlspecialchars($_POST['universidad_expa']), //universidad
    'user[referral_type]' => htmlspecialchars($_POST['interested_when']), //medio de interes
    'user[selected_programmes][]' => '1', //Voluntario Global ID=1
    'commit' => 'REGISTER'
    );


$fields_string = "";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.urlencode($value).'&'; }
rtrim($fields_string, '&');
$innerHTML = "";
/* UNCOMMENT THIS BLOCK: to enable real GIS form submission*/


// POST form with curl
$url = "https://auth.aiesec.org/users";
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_POST, count($fields));
curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_string);

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
// give cURL the SSL Cert for Salesforce
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false); // TODO: FIX SSL - VERIFYPEER must be set to true
//
// "without peer certificate verification, the server could use any certificate,
// including a self-signed one that was guaranteed to have a CN that matched 
// the serverâ€™s host name."
// http://unitstep.net/blog/2009/05/05/using-curl-in-php-to-access-https-ssltls-protected-sites/
// 
// curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 2);
// curl_setopt($ch2, CURLOPT_CAINFO, getcwd() . "\CACerts\VeriSignClass3PublicPrimaryCertificationAuthority-G5.crt");
$result = curl_exec($ch2);

curl_errors($ch2);
//close connection
curl_close($ch2);
//echo $result;
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($result);    
libxml_clear_errors();
$selector = new DOMXPath($doc);

$result = $selector->query('//div[@id="error_explanation"]');

$children = $result->item(0)->childNodes;
if (is_iterable($children))
{
    foreach ($children as $child) {
        $tmp_doc = new DOMDocument();
        $tmp_doc->appendChild($tmp_doc->importNode($child,true));  
        $innerHTML .= strip_tags($tmp_doc->saveHTML());
        //$innerHTML.add($tmp_doc->saveHTML());
    }
}

$innerHTML = preg_replace('~[\r\n]+~', '', $innerHTML);
$innerHTML = str_replace(array('"', "'"), '', $innerHTML);

 header("Location: http://aiesec.pe/jovenes-2/bienvenidogv/");

function curl_errors($ch)
{
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_errno= curl_errno($ch);
   echo "<h2>cURL errors</h2>";
   echo $http_status."<br>";
   echo $curl_errno.": ".curl_error($ch)."<br>";
}

?>
