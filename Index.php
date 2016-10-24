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
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>ob_start();</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>session_start();</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>require_once 'dbconnect.php';</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>// it will never let you open index(login) page if session is set</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if ( isset($_SESSION['user'])!="" ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>header("Location: home.php");</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>exit;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>$error = false;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if( isset($_POST['btn-login']) ) {<span class="Apple-converted-space"> </span></span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// prevent sql injections/ clear user invalid inputs</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = trim($_POST['email']);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = strip_tags($email);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = htmlspecialchars($email);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = trim($_POST['pass']);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = strip_tags($pass);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = htmlspecialchars($pass);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// prevent sql injections / clear user invalid inputs</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if(empty($email)){</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$emailError = "Please enter your email address.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$emailError = "Please enter valid email address.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if(empty($pass)){</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$passError = "Please enter your password.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// if there's no error, continue to login</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if (!$error) {</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">   </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$password = hash('sha256', $pass); // password hashing using SHA256</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$row=mysql_fetch_array($res);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">   </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>if( $count == 1 &amp;&amp; $row['userPass']==$password ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$_SESSION['user'] = $row['userId'];</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>header("Location: home.php");</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>} else {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$errMSG = "Incorrect Credentials, Try again...";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">    </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>}</span></p>
<p class="p1"><span class="s1">?&gt;</span></p>
<p class="p1"><span class="s1">&lt;!DOCTYPE html&gt;</span></p>
<p class="p1"><span class="s1">&lt;html&gt;</span></p>
<p class="p1"><span class="s1">&lt;head&gt;</span></p>
<p class="p1"><span class="s1">&lt;meta http-equiv="Content-Type" content="text/html; charset=utf-8" /&gt;</span></p>
<p class="p1"><span class="s1">&lt;title&gt;Coding Cage - Login &amp; Registration System&lt;/title&gt;</span></p>
<p class="p1"><span class="s1">&lt;link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"<span class="Apple-converted-space">  </span>/&gt;</span></p>
<p class="p1"><span class="s1">&lt;link rel="stylesheet" href="style.css" type="text/css" /&gt;</span></p>
<p class="p1"><span class="s1">&lt;/head&gt;</span></p>
<p class="p1"><span class="s1">&lt;body&gt;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">&lt;div class="container"&gt;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>&lt;div id="login-form"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;form method="post" action="&lt;?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?&gt;" autocomplete="off"&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">    </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">     </span>&lt;div class="col-md-12"&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">        </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">         </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;h2 class=""&gt;Sign In.&lt;/h2&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">        </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">         </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;hr /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;?php</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>if ( isset($errMSG) ) {</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">    </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>?&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="alert alert-danger"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;span class="glyphicon glyphicon-info-sign"&gt;&lt;/span&gt; &lt;?php echo $errMSG; ?&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;?php</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>?&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="input-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-envelope"&gt;&lt;/span&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;input type="email" name="email" class="form-control" placeholder="Your Email" value="&lt;?php echo $email; ?&gt;" maxlength="40" /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="text-danger"&gt;&lt;?php echo $emailError; ?&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="input-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-lock"&gt;&lt;/span&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="text-danger"&gt;&lt;?php echo $passError; ?&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;hr /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;button type="submit" class="btn btn-block btn-primary" name="btn-login"&gt;Sign In&lt;/button&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;hr /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;a href="register.php"&gt;Sign Up Here...&lt;/a&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">        </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">        </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">   </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;/form&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;/div&gt;<span class="Apple-converted-space"> </span></span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1">&lt;/body&gt;</span></p>
<p class="p1"><span class="s1">&lt;/html&gt;</span></p>
<p class="p1"><span class="s1">&lt;?php ob_end_flush(); ?&gt;</span></p>
</body>
</html>
