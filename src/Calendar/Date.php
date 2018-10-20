<?php
namespace Calendar;
use Calendar\Solar;
use Calendar\LunarSolarConverter;


class Date
{
    protected $ctime = null;

    protected $weekList = ['星期天','星期一','星期二','星期三','星期四','星期五','星期六',];

    protected $tianGan = ["甲","乙","丙","丁","戊","己","庚","辛","壬","癸"];

    protected $diZhi = ["子(鼠)","丑(牛)","寅(虎)","卯(兔)","辰(龙)","巳(蛇)","午(马)","未(羊)","申(猴)","酉(鸡)","戌(狗)","亥(猪)"];

    protected $lunarMonth = ["闰","正月","二月","三月","四月","五月","六月", "七月","八月","九月","十月","十一月","十二月"];

    protected $lunarDay = ["null","初一","初二","初三","初四","初五","初六","初七","初八","初九","初十", "十一","十二","十三","十四","十五","十六","十七","十八","十九","二十", "廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十"];

    protected $solarMonthDays = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    public static function today($day=0)
    {
        $day = (int)$day;
        return (new static())->info($day);
    }

    protected function info($day)
    {
        $this->ctime = $day ? strtotime("{$day}") : time();
        $data = [];
        $data['solarYear'] = date('Y', $this->ctime);
        $data['solarMonth'] = date('n', $this->ctime);
        $data['solarDay'] = date('j', $this->ctime);
        $data['currentWeek'] = $this->weekList[date('w', $this->ctime)];
        list($data['lunarYear'], $data['lunarMonth'], $data['lunarDay']) = $this->lunar($data['solarYear'], $data['solarMonth'], $data['solarDay']);
        $data['ganzhi'] = $this->getYGanZhi($data['lunarYear']);
        $data['lunarMonth'] = $this->lunarMonth[$data['lunarMonth']];
        $data['lunarDay'] = $this->lunarDay[$data['lunarDay']];
        $data['dayList'] = $this->dayList($data['solarYear'], $data['solarMonth']);
        unset($data['lunarYear']);
        return $data;
    }

    protected function lunar($solarYear, $solarMonth, $solarDay)
    {
        $solar = new Solar();
        $solar->solarYear = $solarYear;
        $solar->solarMonth = $solarMonth;
        $solar->solarDay = $solarDay;
        $lunar = LunarSolarConverter::SolarToLunar($solar);
        return [$lunar->lunarYear,$lunar->lunarMonth,$lunar->lunarDay];
    }

    protected function getYGanZhi($lunarYear)
    {
        $gan=$this->tianGan[($lunarYear-4) % 10];
        $zhi=$this->diZhi[($lunarYear-4) % 12];
        return $gan.$zhi.'年';
    }

    public function dayList($solarYear, $solarMonth)
    {
        $firstDayWeek = date('w', strtotime("{$solarYear}-{$solarMonth}-1"));

        $dayList = [];
        for ($i=1;$i<=$this->solarMonthDays[$solarMonth];$i++)
        {
            $dayList[] = $i;
        }

        for($i=1;$i<$firstDayWeek;$i++)
        {
            array_unshift($dayList, 0);
        }

        return $dayList;
    }
}