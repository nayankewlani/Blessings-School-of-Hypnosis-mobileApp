<!DOCTYPE html>
<html>
<head>
<title>Kundali Matching</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow p-4">
<h3 class="text-center mb-4">Kundali Matching</h3>

<form action="match.php" method="post">
<div class="row">

<!-- Girl Details -->
<div class="col-md-6">
<h5>Girl Details</h5>

<label>Date of Birth</label>
<input type="date" name="f_dob" class="form-control" required>

<label>Time of Birth (24h)</label>
<input type="time" name="f_time" class="form-control" required>

<label>Latitude</label>
<input type="text" name="f_lat" class="form-control" value="21.1458" required>

<label>Longitude</label>
<input type="text" name="f_lon" class="form-control" value="79.0882" required>

</div>

<!-- Boy Details -->
<div class="col-md-6">
<h5>Boy Details</h5>

<label>Date of Birth</label>
<input type="date" name="m_dob" class="form-control" required>

<label>Time of Birth (24h)</label>
<input type="time" name="m_time" class="form-control" required>

<label>Latitude</label>
<input type="text" name="m_lat" class="form-control" value="21.1458" required>

<label>Longitude</label>
<input type="text" name="m_lon" class="form-control" value="79.0882" required>

</div>

</div>

<div class="text-center mt-4">
<button class="btn btn-warning px-5">Get Matching</button>
</div>

</form>
</div>
</div>

</body>
</html>