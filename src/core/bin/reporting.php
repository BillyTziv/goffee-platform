 <!DOCTYPE html>
 <html>
   <head>
      <?php include('head.php'); ?>
      <style>
	  
    		 #tableouter {
    			 
    			 width: 1000px;
    			 height: 300px;
    			 margin: 70px auto 0px auto;
    		 }
    		 
    	   #tableouter table th{
    			
    			 color: white;
    			 font-size:28px;
    			 font-family: 'Slabo 27px', serif;
    			 font-weight: normal;
    		 }
    		 
    		 #tableouter table td{
    			 text-align: center;
    			 color: white;
    			 font-size:62px;
    			 font-family: 'Slabo 27px', serif;
    			 font-weight: normal;
    		 }
    		 
          .axis--x path {
            display: none;

          }

          .line {
            fill: none;
            stroke: steelblue;
            stroke-width: 1.5px;
            
          }

          #reportingGraph {
            height: 500px;
            width: 1100px;
            padding: 15px;
            background-color: #efefef;
            border-radius: 10px;
            margin-bottom: 50px;
            box-shadow: 0px 0px 15px white;
            margin-left: auto;
            margin-right: auto;
          }
      </style>

      <!-- PHP code here -->
      <?php
         // Include the file to connect to the database
         include('connect.php');

         // Run the query and get all the results
         $myq = mysqli_query($conn, "SELECT COUNT(`id`), DATE_FORMAT(`start_date`, '%m') FROM `failures` GROUP BY DATE_FORMAT(`start_date`, '%m') ORDER BY (DATE_FORMAT(`start_date`, '%m')) ASC");
         $allTicketsResSet = mysqli_query($conn, "SELECT * FROM failures");
         $activeTicketsResSet = mysqli_query($conn, "SELECT * FROM failures WHERE status='0'");
         $resolvedTicketsResSet = mysqli_query($conn, "SELECT * FROM failures WHERE status='1'");

         // Count the number of rows mysql result have.
         $resultTotalRows = $allTicketsResSet->num_rows;
         $TotalRowsNum = $myq->num_rows;
         $resultActiveRows = $activeTicketsResSet->num_rows;
         $resultResolvedRows = $resolvedTicketsResSet->num_rows;

         // Prin the number of rows
         //echo "Total rows: " . $resultTotalRows;
         // Close the active connection with the database.
         $conn->close();
      ?>

      <!-- D3 Graph php code -->
      <?php
        $dataFile = fopen("myData.tsv", "w") or die("Unable to open data file!");
        $txt = "date\tAll tickets\n";
        $res = $myq->fetch_all(MYSQLI_ASSOC);
        fwrite($dataFile, $txt);

        for($i=0; $i<$TotalRowsNum; $i++) {
          $value = $res[$i]['COUNT(`id`)'];
          $month = $res[$i]['DATE_FORMAT(`start_date`, \'%m\')'];
          $txt = $month . "\t" . $value . "\n";
          fwrite($dataFile, $txt);
        }
        fclose($dataFile);
      ?>
   </head>
   <body>
      <?php include('mainHeader.php'); ?>


      <div id="main">
         <div id="pageTitle">
            <div id="pageTitleInner">Reporting</div>
         </div>
         <div id="tableouter">
            <table style="width:100%">
              <tr>
                  <th>All Tickets </th>
                  <th>Active Tickets</th>
                  <th>Inactive Tickets</th>
              </tr>
              <tr>
                  <td> <img src="../images/SupportTicket.png" alt="All Tickets" style="width:200px;"> </td>
                  <td> <img src="../images/SupportTicket.png" alt="Active Tickets" style="width:200px;"> </td>
                  <td> <img src="../images/SupportTicket.png" alt="Inactive Tickets" style="width:200px;"> </td>
              </tr>
              <tr>
                  <td> <p align="center"> <?php echo $resultTotalRows ?></p>  </td>
                  <td> <p align="center"> <?php echo $resultActiveRows ?> </p> </td>
                  <td> <p align="center">  <?php echo $resultResolvedRows ?> </p> </td>
              </tr>
             
            </table>
         </div><br><br>
         <form action="" method="POST">
          <table>
            <tr>
              <td>
                <img src="../images/filter.png" width="32px"/>
              </td>
              <td>
                <select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="viewType">
                  <option style="color: black;font-size: 14px;" value="all">2017</option>
                  <option style="color: black;font-size: 14px;" value="active">2016</option>
                  <option style="color: black;font-size: 14px;" value="resolved">2015</option>
                  <option style="color: black;font-size: 14px;" value="all">2014</option>
                  <option style="color: black;font-size: 14px;" value="active">2013</option>
                  <option style="color: black;font-size: 14px;" value="resolved">2012</option>
                </select>
              </td>
              <td>
                <input style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;font-weight: bold;width: 100px;border-radius: 5px" type="submit" value="Visualize">
              </td>
            </tr>
          </table></br>
          
          
        </form>
         <div id="reportingGraph">
          

          <svg width="960" height="500"></svg>
<script src="//d3js.org/d3.v4.min.js"></script>
<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 80, bottom: 30, left: 50},
    width = svg.attr("width") - margin.left - margin.right,
    height = svg.attr("height") - margin.top - margin.bottom,
    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var parseTime = d3.timeParse("%m");

var x = d3.scaleTime().range([0, width]),
    y = d3.scaleLinear().range([height, 0]),
    z = d3.scaleOrdinal(d3.schemeCategory10);

var line = d3.line()
    .curve(d3.curveBasis)
    .x(function(d) { return x(d.date); })
    .y(function(d) { return y(d.temperature); });

d3.tsv("myData.tsv", type, function(error, data) {
  if (error) throw error;

  var cities = data.columns.slice(1).map(function(id) {
    return {
      id: id,
      values: data.map(function(d) {
        return {date: d.date, temperature: d[id]};
      })
    };
  });

  x.domain(d3.extent(data, function(d) { return d.date; }));

  y.domain([
    d3.min(cities, function(c) { return d3.min(c.values, function(d) { return d.temperature; }); }),
    d3.max(cities, function(c) { return d3.max(c.values, function(d) { return d.temperature; }); })
  ]);

  z.domain(cities.map(function(c) { return c.id; }));

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("fill", "#000")
      .text("Number of Tickets, ");

  var city = g.selectAll(".city")
    .data(cities)
    .enter().append("g")
      .attr("class", "city");

  city.append("path")
      .attr("class", "line")
      .attr("d", function(d) { return line(d.values); })
      .style("stroke", function(d) { return z(d.id); });

  city.append("text")
      .datum(function(d) { return {id: d.id, value: d.values[d.values.length - 1]}; })
      .attr("transform", function(d) { return "translate(" + x(d.value.date) + "," + y(d.value.temperature) + ")"; })
      .attr("x", 3)
      .attr("dy", "0.35em")
      .style("font", "10px sans-serif")
      .text(function(d) { return d.id; });
});

function type(d, _, columns) {
  d.date = parseTime(d.date);
  for (var i = 1, n = columns.length, c; i < n; ++i) d[c = columns[i]] = +d[c];
  return d;
}

</script>
         </div>
      </div>
      <?php //include('footer.php'); ?>
   </body> 
</html>
