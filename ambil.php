
<?

header("Content-type:application/json");
$bx = $_GET['bx'] ; //token bearer whatsapp-meta
$id = $_GET['id'] ; //id gambar yang masuk ke bot (baca dari webhook)

if(empty($bx) || empty($id)){echo '{"status":"null-01"}'; exit();} //exit kalau kurang variable
$idm = $id.".jpg";  //id jadikan nama file ext jpg
$url1 = "https://graph.facebook.com/v17.0/".$id;
$headers = [
    'Authorization: Bearer '.$bx,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec ($ch);
curl_close ($ch);
$js = json_decode($res,true);
$urlx = $js['url'];
if(empty($urlx)){echo '{"status":"null-02"}'; exit();} //exit jika link gambar tidak ada

    $fp = fopen ($idm, 'w+');              // open file handle
    $ch = curl_init($urlx);
    curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_exec($ch);
    curl_close($ch);                              // closing curl handle
    fclose($fp);    

sleep(5);
$idm = "https://contoh.web.id/".$idm ;  //outputnya json, link jpgnya
echo '{"img":"'.$idm.'"}';


?>
