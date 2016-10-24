{\rtf1\ansi\ansicpg1252\cocoartf1404\cocoasubrtf470
{\fonttbl\f0\fmodern\fcharset0 Courier;}
{\colortbl;\red255\green255\blue255;\red0\green0\blue0;}
\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\deftab720
\pard\pardeftab720\sl280\partightenfactor0

\f0\fs24 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 <?php\
 session_start();\
 if (!isset($_SESSION['user'])) \{\
  header("Location: index.php");\
 \} else if(isset($_SESSION['user'])!="") \{\
  header("Location: home.php");\
 \}\
 \
 if (isset($_GET['logout'])) \{\
  unset($_SESSION['user']);\
  session_unset();\
  session_destroy();\
  header("Location: index.php");\
  exit;\
 \}\
}