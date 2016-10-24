<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title></title>
  <meta name="Generator" content="Cocoa HTML Writer">
  <meta name="CocoaVersion" content="1404.47">
  <style type="text/css">
    p.p1 {margin: 0.0px 0.0px 0.0px 0.0px; line-height: 14.0px; font: 12.0px Courier; color: #000000; -webkit-text-stroke: #000000}
    p.p2 {margin: 0.0px 0.0px 0.0px 0.0px; line-height: 14.0px; font: 12.0px Courier; color: #000000; -webkit-text-stroke: #000000; min-height: 14.0px}
    span.s1 {font-kerning: none}
  </style>
</head>
<body>
<p class="p1"><span class="s1">&lt;?php</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>// this will avoid mysql_connect() deprecation error.</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>error_reporting( ~E_DEPRECATED &amp; ~E_NOTICE );</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>// but I strongly suggest you to use PDO or MySQLi.</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>define('DBHOST', 'localhost');</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>define('DBUSER', 'root');</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>define('DBPASS', '');</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>define('DBNAME', 'dbtest');</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>$conn = mysql_connect(DBHOST,DBUSER,DBPASS);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>$dbcon = mysql_select_db(DBNAME);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if ( !$conn ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>die("Connection failed : " . mysql_error());</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if ( !$dbcon ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>die("Database Connection failed : " . mysql_error());</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>}</span></p>
</body>
</html>
