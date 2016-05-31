<?
// Azbn API - Фреймворк ForEach 2.9

//$param['api_resp']['response']['item_list'] = array();
//$param['api_resp']['info']['item_type'] = $param['api_resp']['req']['item_type'];
//$param['api_resp']['info']['item_count'] = 0;
//$param['api_resp']['info']['info_msg'] = $this->FE->c_s(serialize($param['api_resp']['req']));

$param['api_resp']['response']['item_list'] = array();
$param['api_resp']['response']['result']['item_list'] = 0;
$param['api_resp']['response']['item'] = array();
$param['api_resp']['response']['result']['item'] = 1;

$param['api_resp']['info']['info_msg'] = 'Заявка принята. Менеджеры свяжутся с Вами через некоторое время';