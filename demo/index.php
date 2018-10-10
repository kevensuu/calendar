<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <style>
        *,*:before,*:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }
        html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,img,abbr,acronym,address,big,cite,code,del,dfn,em,font,sub,sup,tt,var,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,hgroup,menu,nav,summary,time,mark,audio,video,header,footer,input,b{margin:0;padding:0;border:0;font-weight:inherit;font-style:inherit;font-family:inherit;vertical-align:baseline;background:transparent;}
        html{font-size:62.5%;}
        body{
            -ms-word-break: break-all;
            word-break: break-all;
            word-break: break-word;
            word-wrap: break-word;
            overflow-wrap: break-word;
            background: #fff;
            color: #353535;
            font-family:"微软雅黑";
            font-size: 14px;
            font-size: 1.4rem;
        }
        *{font-size: 14px;font-size: 1.4rem;}
        span b,span strong{font-size:inherit;}
        a{color: #353535;text-decoration:none;}
        h1, h2, h3, h4, h5, h6 ,p{font-weight: normal;margin: 0;padding: 0;}
        .oh,.mr{overflow: hidden;}
        .main{overflow: hidden;width: 100%;max-width: 1000px;_width:1000px;margin: 0 auto;overflow: hidden;}
        .wrap{overflow: hidden;width: 100%;max-width: 1000px;_width:1000px;margin: 0 auto;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
        .w960 .wrap{width: 100%;max-width: 960px;_width:960px;margin: 0 auto;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
        .w960 .mt18{margin-top: 18px;}
        .mt18{margin-top: 18px;}
        .pr{position: relative;}
        .box{background-color: #fff;}
        .w960 .mr{width: 31.25%;}

        @media screen and (min-width:960px)  {
            .w960 .mr{display: block;border: 1px solid #DADADA;}
        }
        .date{text-align: center;padding: 2%;height: 368px;}
        .date .dt{background: #da4041;line-height: 45px;text-align: center;font-weight: 600;color: #fff;font-size: 20px;font-size: 2rem;}
        .date .dm{padding: 0.7em;line-height: 1.7em;z-index: 10;position: relative;background: #fff;}
        .date .dm p{text-align: center;}
        .date .dm .fbw{font-size: 7.6rem;font-weight: bold;line-height: 76px;}
        .date .db span{width: 14%;line-height: 1.8em;}
        .date .db span,.date .db a{display: inline;text-align: center;float: left;}
        .date .db a{width: 7%;margin:1% 3.5%;height: 0;padding-bottom: 7%;_margin:1% 3%;display: inline-block;line-height: 137%;}
        .date .db a.cur{background: #dA4041;color: #FFF;border-radius: 40px;}
        .date .db p:nth-child(1){background: url(./images/datebg.png) repeat-x;background-color: #eee;margin-bottom: 10px;padding-top: 5px;}
        .date .d_select{position: absolute;top: 20px;width: 96%;z-index:111;}
        .date .d_select span{margin-right: 5%;float: right;display: inline-block;width: 20px;height: 20px;cursor: pointer;background: url(./images/index.png) no-repeat;background-position:-1px -196px; }
        .date .d_select p{margin-top: 30px;display: none;background: #F7F8F2;filter: alpha(opacity=95);opacity: 0.95;width: 100%;text-align: left;line-height: 2.5em;padding-bottom: 1em;}
        .date .d_select b{font-weight: 600;display: block;text-indent: 14px;}
        .date .d_select p a{display: inline-block;width: 15%;text-align: center;}
        .date .d_select p a:hover{color: #da4041;text-decoration: underline;}
        .datefixed .d_select p{width: 100%;}
        @media screen and (max-width:480px)  {
            .date .d_select{top: 13px;width: 100%;}
            .date .d_select p{margin-top: 32px;width: 100%;}
        }
    </style>
</head>
<?php
$day = (int)$_GET['day'];
$dateInfo = file_get_contents('http://local.test.com/packagist/calendar/test.php?day='.$day);
$dateInfo = json_decode($dateInfo, true);

?>
<body class="w960 index hPC">
<div class="wrap main oh mt18">
    <div class="mr box">
        <div class="date moh adroll pr">
            <p class="dt">日历</p>
            <div class="d_select">
                <span></span>
                <p style="display: none;">
                    <b>选择月份</b>
                    <a href="/1/1/">1</a>
                    <a href="/2/1/">2</a>
                    <a href="/3/1/">3</a>
                    <a href="/4/3/">4</a>
                    <a href="/5/1/">5</a>
                    <a href="/6/1/">6</a>
                    <a href="/7/1/">7</a>
                    <a href="/8/1/">8</a>
                    <a href="/9/1/">9</a>
                    <a href="/10/1/">10</a>
                    <a href="/11/1/">11</a>
                    <a href="/12/1/">12</a>
                </p>
            </div>
            <div class="dm">
                <p><?php echo "{$dateInfo['solarYear']}/{$dateInfo['solarMonth']} {$dateInfo['currentWeek']}";?></p>
                <p class="fbw"><?php echo $dateInfo['solarDay'];?></p>
                <p id="lunar"><?php echo "{$dateInfo['ganzhi']} {$dateInfo['lunarMonth']}{$dateInfo['lunarDay']}";?></p>
            </div>
            <div class="db">
                <p class="oh">
                    <span>一</span>
                    <span>二</span>
                    <span>三</span>
                    <span>四</span>
                    <span>五</span>
                    <span>六</span>
                    <span>日</span>
                </p>
                <p class="oh">
                    <?php
                    foreach ($dateInfo['dayList'] as $value)
                    {
                        if(!$value)
                        {
                            echo "<a href='#'></a>";
                            continue;
                        }

                        if($value == $dateInfo['solarDay'])
                        {
                            echo "<a href='' class='cur'>{$value}</a>";
                            continue;
                        }

                        echo "<a href=''>{$value}</a>";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/1.8.2/jquery.min.js"></script>
<script>$(function(){$(".date .d_select").hover(function(){$('.date .d_select p').show()},function(){$('.date .d_select p').hide()})});</script>
</body>
</html>