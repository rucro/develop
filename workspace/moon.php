
<html>
<head>
 <meta charset="UTF-8">
 <title>moon</title>
 <link type="text/css" rel="stylesheet" href="css/moon.css">
</head>
<body>
    <div>API参考サイトhttps://kijtra.com/article/date-info-api-v1/</div>
    
    <div style="text-align:center">
        <img src="/img/moon/moon1.jpg">
    </div>
    
    
 <script type="text/javascript">
function time( data ){
    var moon = data["moon_ja"];
    document.write(moon);
}
</script>
<script type='text/javascript' src='https://dateinfoapi.appspot.com/v1?callback=time'></script>
    
</body>
</html>