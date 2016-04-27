<?php
/**
 * Created by Sublime Text.
 * User: You Liang Li
 * Date: 2016/3/16
 * Time: 16:19
 */

namespace FbSmartAds;

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

    public static function test()
    {
        echo 'test' . PHP_EOL;
    }

}
