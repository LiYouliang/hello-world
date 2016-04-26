<?php
/**
 * Created by Sublime Text.
 * User: You Liang Li
 * Date: 2016/3/16
 * Time: 16:19
 */

namespace FbSmartAds;

use Zend\Config\Writer\Json as WriterJson;

class Util
{
    /**
     * 秒数换算时间长度
     *
     * @param $time
     * @return bool|string
     */
    public static function Sec2Time($time)
    {
        if (is_numeric($time)) {
            $out   = '';
            $value = array(
                "years"   => 0, "days"    => 0, "hours" => 0,
                "minutes" => 0, "seconds" => 0,
            );
            if ($time >= 31556926) {
                $value["years"] = floor($time / 31556926);
                $out .= $value["years"] . '年';
                $time = ($time % 31556926);
            }
            if ($time >= 86400) {
                $value["days"] = floor($time / 86400);
                $out .= $value["days"] . '天';
                $time = ($time % 86400);
            }
            if ($time >= 3600) {
                $value["hours"] = floor($time / 3600);
                $out .= $value["hours"] . '小时';
                $time = ($time % 3600);
            }
            if ($time >= 60) {
                $value["minutes"] = floor($time / 60);
                $out .= $value["minutes"] . '分';
                $time = ($time % 60);
            }
            $value["seconds"] = floor($time);
            $out .= $value["seconds"] . '秒';
            return $out;

        } else {
            return (bool) false;
        }
    }

    /**
     * 所有数组的笛卡尔积
     *
     * @return array
     */
    public static function combineDika()
    {
        $data   = func_get_args();
        $cnt    = count($data);
        $result = array();
        foreach ($data[0] as $item) {
            $result[] = array($item);
        }
        for ($i = 1; $i < $cnt; $i++) {
            $result = self::combineArray($result, $data[$i]);
        }
        return $result;
    }

    /**
     * 两个数组的笛卡尔积
     *
     * @param $arr1
     * @param $arr2
     * @return array
     */
    public static function combineArray($arr1, $arr2)
    {
        $result = array();
        foreach ($arr1 as $item1) {
            foreach ($arr2 as $item2) {
                $temp     = $item1;
                $temp[]   = $item2;
                $result[] = $temp;
            }
        }
        return $result;
    }

    public static function writeJsonConf($filename, $config)
    {
        $writer = new WriterJson();
        $writer->toFile($filename, $config, $exclusiveLock = true);
    }

}
