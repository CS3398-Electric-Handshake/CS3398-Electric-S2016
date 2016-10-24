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
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if( isset($_SESSION['user'])!="" ){</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>header("Location: home.php");</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>include_once 'dbconnect.php';</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>$error = false;</span></p>
<p class="p2"><span class="s1"></span><br></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space"> </span>if ( isset($_POST['btn-signup']) ) {</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// clean user inputs to prevent sql injections</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$name = trim($_POST['name']);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$name = strip_tags($name);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$name = htmlspecialchars($name);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = trim($_POST['email']);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = strip_tags($email);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$email = htmlspecialchars($email);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = trim($_POST['pass']);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = strip_tags($pass);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$pass = htmlspecialchars($pass);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// basic name validation</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if (empty($name)) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$nameError = "Please enter your full name.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>} else if (strlen($name) &lt; 3) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$nameError = "Name must have atleat 3 characters.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$nameError = "Name must contain alphabets and space.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>//basic email validation</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$emailError = "Please enter valid email address.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>} else {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>// check email exist or not</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$query = "SELECT userEmail FROM users WHERE userEmail='$email'";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$result = mysql_query($query);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$count = mysql_num_rows($result);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>if($count!=0){</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$emailError = "Provided Email is already in use.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// password validation</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if (empty($pass)){</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$passError = "Please enter password.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>} else if(strlen($pass) &lt; 6) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$error = true;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$passError = "Password must have atleast 6 characters.";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// password encrypt using SHA256();</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>$password = hash('sha256', $pass);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>// if there's no error, continue to signup</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>if( !$error ) {</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">   </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>$res = mysql_query($query);</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">    </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>if ($res) {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$errTyp = "success";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$errMSG = "Successfully registered, you may login now";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>unset($name);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>unset($email);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>unset($pass);</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>} else {</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$errTyp = "danger";</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>$errMSG = "Something went wrong, try again later...";<span class="Apple-converted-space"> </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>}<span class="Apple-converted-space"> </span></span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">    </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">  </span>}</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">  </span></span></p>
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
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;h2 class=""&gt;Sign Up.&lt;/h2&gt;</span></p>
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
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="alert alert-&lt;?php echo ($errTyp=="success") ? "success" : $errTyp; ?&gt;"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">    </span>&lt;span class="glyphicon glyphicon-info-sign"&gt;&lt;/span&gt; &lt;?php echo $errMSG; ?&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;?php</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>}</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">   </span>?&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="input-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-user"&gt;&lt;/span&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="&lt;?php echo $name ?&gt;" /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="text-danger"&gt;&lt;?php echo $nameError; ?&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="input-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-envelope"&gt;&lt;/span&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="&lt;?php echo $email ?&gt;" /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="text-danger"&gt;&lt;?php echo $emailError; ?&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;div class="input-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="input-group-addon"&gt;&lt;span class="glyphicon glyphicon-lock"&gt;&lt;/span&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;/div&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">                </span>&lt;span class="text-danger"&gt;&lt;?php echo $passError; ?&gt;&lt;/span&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;hr /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;button type="submit" class="btn btn-block btn-primary" name="btn-signup"&gt;Sign Up&lt;/button&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;hr /&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;/div&gt;</span></p>
<p class="p2"><span class="s1"><span class="Apple-converted-space">            </span></span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">            </span>&lt;div class="form-group"&gt;</span></p>
<p class="p1"><span class="s1"><span class="Apple-converted-space">             </span>&lt;a href="index.php"&gt;Sign in Here...&lt;/a&gt;</span></p>
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
