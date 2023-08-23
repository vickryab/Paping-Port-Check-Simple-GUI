<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PAPING SIMPLE GUI</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">PAPING SIMPLE GUI</h2>
  <h5>2023 - @vickryab</h5><br>
  <form id="pingForm">
    <div class="mb-3">
      <label for="hostname" class="form-label">Hostname/IP:</label>
      <input type="text" class="form-control" id="hostname" name="hostname" placeholder="Enter hostname or IP" required>
    </div>
    <div class="mb-3">
      <label for="port" class="form-label">Port:</label>
      <input type="number" class="form-control" id="port" name="port" placeholder="Enter port number" required>
    </div>
    <div class="mb-3">
      <label for="count" class="form-label">Ping count:</label>
      <input type="number" class="form-control" id="count" name="count" value="4" required>
    </div>
    <button type="submit" class="btn btn-primary">Test Connectivity</button>
    <span id="checkingMessage" class="ms-2"></span>
  </form>

  <div class="container mt-3">
    <div class="card" style="display:none" id="pingDiv">
    <div class="card-body">
      <p class="card-text" id="pingResult"></p>
    </div>
  </div>
</div>
</div>

<script>
document.getElementById("pingForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const checkingMessage = document.getElementById("checkingMessage");
  const pingResultContainer = document.getElementById("pingResult");
  const hostname = document.getElementById("hostname").value;
  const port = document.getElementById("port").value;
  const count = document.getElementById("count").value;
  const resultdipslay = document.getElementById("pingDiv");
  resultdipslay.style.display = "none";

  checkingMessage.textContent = "";
  checkingMessage.textContent = "Checking...";
  pingResultContainer.innerHTML = '';
  const requestOptions = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `hostname=${hostname}&port=${port}&count=${count}`,
  };

  const pingResponse = await fetch('ping.php', requestOptions);
  const pingResult = await pingResponse.json();
  resultdipslay.style.display = "block";
  checkingMessage.textContent = "";
  
  
  pingResultContainer.innerHTML = `
    <p>Result: <pre>${pingResult.result}</pre></p>
  `;
});
</script>

</body>
</html>
