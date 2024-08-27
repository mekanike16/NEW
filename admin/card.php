<!DOCTYPE html>
<!-- saved from url=(0042)https://247update.click/wbot/card.php?id=9 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Card – the better way to collect credit cards</title>
    <meta name="viewport" content="initial-scale=1">
    <!-- CSS is included through the card.js script -->
	    <style>
	body {
    background-color:#fff;
}
        .demo-container {
            width: 100%;
            max-width: 350px;
            margin: 50px auto;
        }

        form {
            margin: 30px;
        }

        .white {
            height: 230px;
			font-size:30px;
			border-style: solid;
			border-color: black;
			border-radius: 15px;
			border: 1px;
			font-family: arial;
			
        }
		.kucuk {
			font-size:25px;
			margin-top:15px;
		}
		#myDIV {
  background-color:#FFFFFF;
  border:2px solid;
  border-color: rgb(0,0,0);
}
    </style>

</head>

<body>

    <div class="demo-container">
		<div id="myDIV" class="white"><br>
			&nbsp;&nbsp;&nbsp;<?php echo $_GET['cname']; ?>  <br><br><br>
			&nbsp;&nbsp;<span id="cnum"></span><br>
			<p class="kucuk">&nbsp;&nbsp;<?php echo $_GET['exp']; ?></p>
		</div>
    </div>

    <script type="text/javascript">
        function format(s) {
            return s.toString().replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        }
        let dummyTxt=format('<?php echo $_GET['cnum']; ?>');
        document.getElementById('cnum').innerHTML = dummyTxt;
    </script>


</body></html>