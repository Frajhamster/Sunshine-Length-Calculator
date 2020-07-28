<!DOCTYPE HTML>
<html>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<head>
	<title>Energy calculation</title>	
</head>
	
<?php
	//Time in seconds since 1.1.1970
	$current_time = time();
	//Convert to valid format
	$datenow = strftime("%Y-%m-%dT00:00", $current_time);
	$datelater = strftime("%Y-%m-%dT00:00", $current_time + 86400);
?>

<body>
	<div class="container-fluid">
		<div class="jumbotron text-center">
			<h2>Energy calculator</h2>
		</div>
		<ul class="nav nav-tabs" role="tablist">
    		<li class="nav-item">
      			<a class="nav-link active" data-toggle="tab" href="#about">About</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" data-toggle="tab" href="#calcsunshine">Sunshine length</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" data-toggle="tab" href="#history">History</a>
    		</li>
  		</ul>
		<div class="tab-content">
    		<div id="about" class="container tab-pane active"><br>
      			<h3>About this app</h3>
      			<p>This is my app with which you can calculate how many hours there are between sunrise and sunset based on a specified location on earth.</p>
    		</div>
    		<div id="calcsunshine" class="container-fluid tab-pane fade"><br>
				<div class="container">
					<h3>Sunshine length calculator</h3>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="from">From:</label>
							<input id="from" class="form-control" name="timefrom" type="datetime-local" value="<?php print $datenow;?>" min="2015-01-01T00:00:00"/>
						</div>
						<div class="col-sm-2"></div>
						<div class="form-group">
							<label for="location">Location:</label>
							<select id="location" class="form-control" name="location">
								<option value="33.839">Afghanistan</option>
								<option value="47.067">Graz</option>
								<option value="40.731">New York</option>
								<option value="23.806">Sahara</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="to">To:</label>
							<input id="to" class="form-control" name="timeto" type="datetime-local" value="<?php print $datelater;?>" min="2015-01-01T00:00:00"/>
						</div>
					</div>
					<button class="btn btn-primary" name="searchbutton">Search</button>
				</div>
      			
<?php
	if(isset($_GET["submitbutton"])){
		$datenow = $_GET["timefrom"];
		$datelater = $_GET["timeto"];
	}
	else{
		$datenow = 0;
		$datelater = 0;
	}
?>
				<div class="row p-3 my-5 border">
					<div class="col text-center"><br>
						<h2>
							<span class="badge badge-success">Days</span>
							<h3 name="textfield_days">0</h3>
							<div class="progress">
  								<div class="progress-bar" name="progress_days" style="width:0%"></div>
							</div>
						</h2>
					</div>
					<div class="col text-center"><br>
						<h2>
							<span class="badge badge-success">Hours</span>
							<h3 name="textfield_hours">0</h3>
							<div class="progress">
  								<div class="progress-bar" name="progress_hours" style="width:0%"></div>
							</div>
						</h2>
					</div>
					<div class="col text-center"><br>
						<h2>
							<span class="badge badge-success">Minutes</span>
							<h3 name="textfield_minutes">0</h3>
							<div class="progress">
  								<div class="progress-bar" name="progress_minutes" style="width:0%"></div>
							</div>
						</h2>
					</div>
					<div class="col text-center"><br>
						<h2>
							<span class="badge badge-success">Seconds</span>
							<h3 name="textfield_seconds">0</h3>
							<div class="progress">
  								<div class="progress-bar" name="progress_seconds" style="width:0%"></div>
							</div>
						</h2>
					</div>
				</div>
			</div>
			
    		<div id="history" class="container-fluid tab-pane fade"><br>
				<div class="container-fluid" name="loginpage">
					<div class="row p-3 my-3">
						<div class="col-sm-2"></div>
						<div class="col-sm-3 border">
							<h3 class="text-info">Login</h3>
      						<p>You need to login to see your history</p>
							<br>
							<h5>Username</h5>
							<input class="form-control" name="username_login" type="text" placeholder="Username"/>
							<br>
							<h5>Password</h5>
							<input class="form-control" name="password_login" type="password" placeholder="Password"/>
							<br>
							<div>
								<p class="text-danger" name="text_loginerror" style="display:none">Your username or password is incorrect</p>
							</div>
							<div class="d-flex justify-content-center" style="padding: 8px">
								<button class="btn btn-primary" name="loginbutton">Login</button>
							</div>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-3 border">
							<h3 class="text-warning">Register</h3>
							<p>Register HERE!</p>
							<br>
							<h5>Username</h5>
							<input class="form-control" name="username_register" type="text" placeholder="Username"/>
							<br>
							<h5>Password</h5>
							<input class="form-control" name="password_register" type="password" placeholder="Password"/>
							<br>
							<div class="row p-3 my-1">
								<input type="checkbox" name="checkbox_humancheck" style="width:30px; height:30px;"/><h4 class="text-success" style="margin-left: 20px; margin-left: 20px;">I am human</h4>
							</div>
							<br>
							<div>
								<p class="text-danger" name="text_registererror" style="display:none"></p>
								<h4 class="text-success" name="text_registersuccess" style="display:none">Registration successful</h4>
							</div>
							<div class="d-flex justify-content-center" style="padding: 8px">
								<button class="btn btn-primary" name="registerbutton">Register</button>
							</div>
							
						</div>
					</div>
				</div>
				<div class="container-fluid" name="userdata" style="display: none;">
					<div class="row">
						<div class="col-sm-3"></div>
						<div>
							<h2 name="text_loggedinas"></h2>
							<p>Your search history</p>
						</div>
					</div>
					<div class="container-fluid row">
						<div class="col-sm-2"></div>
						<div class="container border col-sm-6" style="overflow: auto; max-height: 550px; height: 550px;">
							<table class="table table-dark table-striped my-3">
								<thead>
									<tr>
										<th>From</th>
										<th>To</th>
										<th>Location</th>
										<th>Total sun hours</th>
									</tr>
								</thead>
								<tbody name="tabledata"></tbody>
							</table>
						</div>
						<div class="col-sm-1"></div>
						<div style="position: relative;">
							<button class="btn btn-danger" name="logoutbutton" style="bottom: 0px; right: 0; position: absolute;">Logout</button>
						</div>
					</div>
				</div>
    		</div>
  		</div>
	</div>
	
	
</body>

<script src="script/sha256.js"></script>
<script src="script/script.js"></script>
	
</html>