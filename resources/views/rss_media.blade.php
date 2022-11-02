<html xmlns="http://www.w3.org/1999/xhtml" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">

<head>
    <title>بزنس على الطريق مع محمد الغندور RSS Feed</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 14px;
            color: #1D2031;
            background: #FFFFFF;
            line-height: 1.666666;
            padding: 15px;
        }
        
        a,
        a:link,
        a:visited {
            color: #4AB2C5;
            text-decoration: none;
        }
        
        a:hover {
            color: #4AB2C5;
            text-decoration: underline;
        }
        
        h1 {
            line-height: 1.25em;
        }
        
        h1,
        h2,
        h3,
        p {
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        h2 {
            line-height: 1.25em;
            margin-bottom: 5px;
        }
        
        h3 {
            font-style: italic;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0px 4px 24px #00000029;
            border-radius: 13px;
        }
        
        .podcast-image {
            float: right;
            width: 160px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        
        .podcast-image img {
            width: 160px;
            height: auto;
            border-radius: 10px;
        }
        
        .podcast-header {
            margin-bottom: 20px;
        }
        
        .item {
            clear: both;
            border-top: 1px solid #e0e4e8;
            padding: 20px 0;
        }
        
        audio {
            width: 100%;
            border-radius: 4px;
        }
        
        audio:focus {
            outline: none;
        }
        
        .episode-image img {
            width: 100px;
            height: auto;
            margin: 0 30px 15px 0;
            border-radius: 5px;
        }
        
        .episode-time {
            font-size: 12px;
            color: #545d67;
            margin-bottom: 1em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="podcast-header">
            <h1>
                <div class="podcast-image">
                    <a href="{{ (string)$flux->channel->link }}"><img src="{{ (string)$flux->channel->image->url }}" title="{{ (string)$flux->channel->title }}"></a>
                </div>  {{ (string)$flux->channel->title }}   </h1>
            <p>
                {{ (string)$flux->channel->description }} 
            </p>
            <p><a href="{{ (string)$flux->channel->link }}" target="_blank">
                Visit podcast website →
              </a></p>
        </div>
        @foreach ($flux->channel->item as $item)
        {{ dd($item) }}
        <div class="item">
            <h2><a href="https://podeo.co" target="_blank">تعلم التسويق قبل إنشاء الحملة التسويقية</a></h2>
            <div class="episode-time"><span>Fri, 28 Oct 2022 11:00:00 +0000</span> •
                <span>30 minutes</span></div>
            <p>
                حوار بين مجموعة من المسوقين يتحدثوا عن أهمية دراسة التسويق وأساسياته، وأن التسويق ليست مقتصرة على الحملة التسويقية وليست مقتصرة على منصات التواصل الاجتماعي، بل التسويق كيف أحصل على ولاء العميل؟ وأمثلة على الاخفاقات التسويقية ونصائح لتحديد جمهورك المستهدف
                وكيفية تثقيف الجمهور بمنتجك أو خدمتك
            </p><audio controls="true" preload="none" src="https://media.podeo.co/episodes/NzAzMA/audio.mp3"></audio></div>
        @endforeach
        
        
      
    </div>
</body>

</html>