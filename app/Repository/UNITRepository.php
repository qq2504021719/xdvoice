<?php
/**
 * Created by PhpStorm.
 * User: xhkj
 * Date: 2019/10/19
 * Time: 下午6:55
 */

namespace App\Repository;

require_once __DIR__."/../lib/baidu/AipNlp.php";
class UNITRepository
{
    const APP_ID = '17569204';
    const API_KEY = 'kWdlbO8aiSUFzvTiGLFIVajN';
    const SECRET_KEY = 'M6e8euMlUIG2NLPSYwvIndzDLetnzGM1';


    static public function get_access_token()
    {
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $post_data['grant_type']       = 'client_credentials';
        $post_data['client_id']      = self::API_KEY;
        $post_data['client_secret'] = self::SECRET_KEY;
        $o = "";
        foreach ( $post_data as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $res = CommonRepository::request_post($url, $post_data);

        if(isset($res['access_token']))
        {
            return $res['access_token'];

        }
        return '';
    }

    /**
     * UNIT对话API文档
     *
     * @param $str
     * @return mixed
     */
    static public function unit($str)
    {
        $token = self::get_access_token();
        $url = 'https://aip.baidubce.com/rpc/2.0/unit/bot/chat?access_token=' . $token;
        $bodys = '{"bot_session":"","log_id":"7758521","request":{"bernard_level":1,"client_session":"{\"client_results\":\"\", \"candidate_options\":[]}","query":"'.$str.'","query_info":{"asr_candidates":[],"source":"KEYBOARD","type":"TEXT"},"updates":"","user_id":"88888"},"bot_id":"84967","version":"2.0"}';
//        return json_decode($bodys,true);
        $res = CommonRepository::request_post($url, $bodys);
        return $res;
    }

    /**
     * 情感倾向分析
     *
     * @param $str
     * @return array
     */
    static public function sentimentClassify($str)
    {
        $token = self::get_access_token();

        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);
        // 调用情感倾向分析
        return $client->sentimentClassify($str);
    }


}