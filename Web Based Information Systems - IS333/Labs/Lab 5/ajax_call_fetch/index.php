<!DOCTYPE html>
<html>
<head>
  <title>Ajax Suggestion Example (fetch)</title>
  <link rel="stylesheet" href="style.css">
  
  <script>
    function showHint(str) {
      if (str.length === 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }

      // Using fetch (GET)
      fetch(`get_data.php?q=${encodeURIComponent(str)}`)
        .then(response => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then(data => {
          console.log("Response:", data);
          document.getElementById("txtHint").innerHTML = data;
        })
        .catch(error => {
          console.error("Fetch error:", error);
          document.getElementById("txtHint").innerHTML = "Error fetching suggestions.";
        });
    }
  </script>
</head>

<body>
  <p><b>Start typing a name in the input field below:</b></p>
  <form action="">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
  </form>
  <p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>