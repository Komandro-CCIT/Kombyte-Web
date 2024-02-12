    function myFunction() {
      var input = document.getElementById("myInput").value.toUpperCase();
      var columnIndex = parseInt(document.getElementById("columnSelect").value);
      var table = document.getElementById("myTable");
      var rows = table.getElementsByTagName("tr");

      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var headers = rows[i].getElementsByTagName("th");
        var found = false;

        if (columnIndex === 0) {
          for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent || cells[j].innerText;
            if (cellText.toUpperCase().indexOf(input) > -1) {
              found = true;
              break;
            }
          }
          for (var j = 0; j < headers.length; j++) {
            var headerText = headers[j].textContent || headers[j].innerText;
            if (headerText.toUpperCase().indexOf(input) > -1) {
              found = true;
              break;
            }
          }
        } else if (columnIndex === 4) {
          for (var j = 0; j < headers.length; j++) {
            var headerText = headers[j].textContent || headers[j].innerText;
            if (headerText.toUpperCase().indexOf(input) > -1) {
              found = true;
              break;
            }
          }
        } else {
          var cell = cells[columnIndex - 1];
          var header = headers[columnIndex];
          if (cell) {
            var cellText = cell.textContent || cell.innerText;
            if (cellText.toUpperCase().indexOf(input) > -1) {
              found = true;
            }
          }
        }

        rows[i].style.display = found ? "" : "none";
      }
    }