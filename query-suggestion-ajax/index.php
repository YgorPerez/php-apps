<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
        <script>
            function showSuggestion(string) {
                if (string.length == 0) {
                    document.getElementById('output').innerHTML = '';
                } else {
                    // AJAX REQUEST
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('output').innerHTML = this.responseText;
                        }
                    };  // end of onreadystatechange
                    xmlhttp.open('GET', 'suggest.php?q='+string, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Search users</h1>
            <form>
                <div class="form-group">
                    <label for="search">Search users:</label>
                    <input type="text" class="form-control" onkeyup="showSuggestion(this.value)">
                </div>
            </form>
            <p>Suggestions: <span id="output" style="font-weight:bold"></span></p>
        </div>
    </body>

</html>