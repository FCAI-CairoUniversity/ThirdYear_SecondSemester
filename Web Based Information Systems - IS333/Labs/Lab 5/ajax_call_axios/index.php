<!DOCTYPE html>
<html>
<head>
  <title>Ajax Suggestion Example (Axios)</title>
  <link rel="stylesheet" href="style.css">
  
  <!-- Axios CDN -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  
  <script>
    function showHint(str) {
      if (str.length === 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }

      // Using Axios (GET)
      axios.get('get_data.php', {
        params: {
          q: str
        }
      })
      .then(response => {
        console.log("Response:", response.data);
        document.getElementById("txtHint").innerHTML = response.data;
      })
      .catch(error => {
        console.error("Axios error:", error);
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