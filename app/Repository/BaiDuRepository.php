<?php
namespace App\Repository;

/**
 * Created by PhpStorm.
 * User: xhkj
 * Date: 2019/10/19
 * Time: 下午2:44
 */

require_once __DIR__."/../lib/baidu/AipNlp.php";

class BaiDuRepository
{
    const APP_ID = '17566695';
    const API_KEY = 'NO4eGtVZnI4x7hqswyDWLtKa';
    const SECRET_KEY = 'hsiWd2t4z1sOQS0XdWHcnGFYo8nvjaxS';

    /**
     * 词法分析接口
     *
     * @param $str
     * @return array
     */
    static public function lexer($str)
    {
        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);
        // 调用词法分析
        return $client->lexer($str);
    }

    /**
     * 调用DNN语言模型
     *
     * @param $str
     * @return array
     */
    static public function dnnlm($str)
    {
        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        // 调用DNN语言模型
        return $client->dnnlm($str);
    }

    /**
     * 文本纠错
     *
     * @param $str
     * @return array
     */
    static public function ecnet($str)
    {
        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        // 调用DNN语言模型
        return $client->ecnet($str);
    }

    /**
     * 文章标签
     *
     * @param $str
     * @return array
     */
    static public function keyword($str)
    {
        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        // 调用DNN语言模型
        return $client->keyword($str,$str);
    }

    /**
     * 评论观点抽取
     *
     * @param $str
     * @return array
     */
    static public function comment_tag($str)
    {
        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        // 如果有可选参数
        $options = array();
        $options["type"] = 11;
        return $client->commentTag($str,$options);
    }


    /**
     * 短文本相似度
     *
     * @param $text1
     * @param $text2
     */
    static public function simnet($text1,$text2)
    {

        $client = new \AipNlp(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        // 调用短文本相似度
        return $client->simnet($text1, $text2);

//        // 如果有可选参数
//        $options = array();
//        $options["model"] = "CNN";
//
//        // 带参数调用短文本相似度
//        return $client->simnet($text1, $text2, $options);
    }

    /**
     * 词性缩略说明
     *
     * @param $k
     * @return mixed|string
     */
    static public function chixing($k)
    {
        $arr = [
            'n'     => '普通名词',
            'f'     => '方位名词',
            's'     => '处所名词',
            't'     => '时间名词',
            'nr'    => '人名',
            'ns'    => '地名',
            'nt'    => '机构团体名',
            'nw'    => '作品名',
            'nz'    => '其他专名',
            'v'     => '普通动词',
            'vd'    => '动副词',
            'vn'    => '名动词',
            'a'     => '形容词',
            'ad'    => '副形词',
            'an'    => '名形词',
            'd'     => '副词',
            'm'     => '数量词',
            'q'     => '量词',
            'r'     => '代词',
            'p'     => '介词',
            'c'     => '连词',
            'u'     => '助词',
            'xc'    => '其他虚词',
            'w'     => '标点符号',
            'PER'   => '人名',
            'LOC'   => '地名',
            'ORG'   => '机构名',
            'TIME'  => '时间',
        ];
        return isset($arr[$k])?$arr[$k]:'';
    }
}