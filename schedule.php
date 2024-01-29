<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container mt-5">
        <H1>Assign Schedule</H1>
        <div id="assign-schedule">


            <label for="listcourse">Select Your Course for Scheduling </label>
            <select class="custom-select" name="listcourse" id="listcourse" onclick="hideselect()">
                <option value="select" selected id="SelectCourseDrop">Select</option>
                <script>
                    let count = 1
                    function hideselect() {
                        count++;
                        // console.log(count);
                        if (count == 3) {
                            document.getElementById("SelectCourseDrop").remove();
                            document.getElementById("listcourse").removeAttribute("onclick");
                        }
                    }

                </script>
                <?php
                include 'db_connection.php';
                // Fetch and display the class schedule
                // $scheduleResult = $conn->query("SELECT * FROM admin");
                $scheduleResult = $conn->query("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));
                if ($scheduleResult->num_rows > 0) {
                    while ($classRow = $scheduleResult->fetch_assoc()) {
                        echo '<option value="' . $classRow["COURSE"] . '">' . $classRow["COURSE"] . '</option>';
                    }
                } else {
                    echo 'No class records found.';
                }
                $conn->close();
                ?>
            </select>
            <div id="subjectStaffTable" class="mt-5">
                <!-- Table for subject names and staff names will be displayed here -->
            </div>
            <br>
            <hr>
            <br>
            <form action="update_course_table.php" method="post">
                <div id="assigningtable">
                    <!-- Displaying Table -->
                </div>


            </form>
        </div>
    </div>
    <script>
        document.getElementById('listcourse').addEventListener('change', function () {
            var selectedCourse = this.value;
            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php",
                data: { course: selectedCourse },
                success: function (response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                    // Make another AJAX request to fetch subject names and staff names
                    $.ajax({
                        type: "POST",
                        url: "fetch_subject_staff.php",
                        data: { course: selectedCourse },
                        success: function (subjectStaffTable) {
                            // Update the subjectStaffTable div with the received table data
                            document.getElementById('subjectStaffTable').innerHTML = subjectStaffTable;
                        },
                        error: function (error) {
                            console.log("Error: " + error.responseText);
                        }
                    });
                },
                error: function (error) {
                    console.log("Error: " + error.responseText);
                }
            });
        });
        function check() {
            console.log("H");
            return false;
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Add an event listener to the select element
        document.getElementById('listcourse').addEventListener('change', function () {
            var selectedCourse = this.value;
            // alert(selectedCourse);
            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php", // Adjust the path to match your file structure
                data: { course: selectedCourse },
                success: function (response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                },
                error: function (error) {
                    console.log("Error: " + error.responseText);
                }
            });
        });
    </script>
    <script>
        // function removesel(clsname){
        //     console.log(document.getElementsByClassName(clsname));
        // };
        var hasFunctionExecuted = false;
        // Your onmouseover function
        function generatematrix() {
            if (!hasFunctionExecuted) {
                // Your code to execute on mouseover goes here
                // Assuming you have a variable for the total number of subjects ($si in this case)
                for (var i = 1; i <= document.getElementById('hidval').innerText; i++) {
                    let rowName = document.getElementById('s' + i + '1').innerText;
                    // console.log(rowName);
                    // Create a class variable dynamically using the name
                    window[rowName] = {
                        name: document.getElementById('s' + i + '2').innerText,
                        staff: document.getElementById('s' + i + '3').value,
                        hours: document.getElementById('s' + i + '4').innerText,
                        lab: document.getElementById('s' + i + '5').innerText
                    };
                    // Accessing class variables
                    // console.log(window[rowName].name);  // s11 name
                    // console.log(window[rowName].staff); // s11 staff
                    // console.log(window[rowName].hours); // s11 hours
                    // console.log(window[rowName].lab);   // s11 lab
                    //     row.push(document.getElementById('s' + i + '1').innerText);
                    //     row.push(document.getElementById('s' + i + '2').innerText);
                    //     row.push(document.getElementById('s' + i + '3').value);
                    //     row.push(document.getElementById('s' + i + '4').innerText);
                    //     row.push(document.getElementById('s' + i + '5').innerText);
                    // matrix.push(row);
                }


                console.log("class created");
                for (let i = 1; i <= 5; i++) {
                    for (let j = 1; j <= 8; j++) {
                        for (let k = 0; k <= (document.getElementById("hidval").innerText - 1); k++) {
                            let clsvar = (document.getElementById(i.toString() + j.toString() + k.toString())).value + ".staff";
                            let labvar = (document.getElementById(i.toString() + j.toString() + k.toString())).value + ".lab";
                            // console.log(eval(clsvar));

                            let elements1 = document.querySelectorAll('.table' + i.toString() + j.toString());
                            let elements2 = document.querySelectorAll('.lab' + i.toString() + j.toString());
                            // Create an array to store the values
                            let valuesArray = [];
                            let labArray = [];
                            // Iterate over the NodeList and push values into the array
                            elements1.forEach(function (elementpara) {
                                valuesArray.push(elementpara.innerText);
                            });
                            elements2.forEach(function (elementpara) {
                                labArray.push(elementpara.innerText);
                            });
                            if (valuesArray.includes(eval(clsvar))) {
                                console.log(document.getElementById(i.toString() + j.toString() + k.toString()));
                                document.getElementById(i.toString() + j.toString() + k.toString()).remove();
                                // console.log(eval(clsvar),valuesArray);
                            }
                            else if (eval(labvar) != 'no' && labArray.includes(eval(labvar))) {
                                console.log(document.getElementById(i.toString() + j.toString() + k.toString()));
                                document.getElementById(i.toString() + j.toString() + k.toString()).remove();
                            }
                        }
                    }
                }
                // Iterate through the first digit (1 to 5)
                for (let i = 1; i <= 5; i++) {
                    // Iterate through the second digit (1 to 8)
                    for (let j = 1; j <= 8; j++) {
                        // Construct the class name
                        let className = "sel" + i + j;

                        // Get the dropdown element
                        let dropdown = document.getElementsByClassName(className);
                        console.log(dropdown);
                        // Check if the dropdown exists
                        if (dropdown.length > 0) {
                            let selectedOption = dropdown[0].options[dropdown[0].selectedIndex];
                            let computedStyles = getComputedStyle(selectedOption);
                            let backgroundColor = computedStyles.backgroundColor;

                            // Set the background color
                            dropdown[0].style.backgroundColor = backgroundColor;
                        }
                    }
                }

                // console.log(matrix);
                // Set the flag to true to indicate that the function has been executed
                hasFunctionExecuted = true;
            }
        }
        // Function to reset hasFunctionExecuted to false when the content of "assign-schedule" is modified
        function resetFunctionExecutionFlag() {
            hasFunctionExecuted = false;
        }
        // Create a MutationObserver to observe changes in the content of "assign-schedule"
        var observer = new MutationObserver(resetFunctionExecutionFlag);
        // Define the configuration for the observer
        var config = { childList: true, subtree: true };
        // Start observing the "assign-schedule" element
        observer.observe(document.getElementById("assign-schedule"), config);

        function mycheck() {
            for (let i = 1; i <= 5; i++) {
                // Iterate through the second digit (1 to 8)
                for (let j = 1; j <= 8; j++) {
                    // Construct the class name
                    let className = "sel" + i + j;

                    // Get the dropdown element
                    let dropdown = document.getElementsByClassName(className);
                    console.log(dropdown);
                    // Check if the dropdown exists
                    if (dropdown.length > 0) {
                        let selectedOption = dropdown[0].options[dropdown[0].selectedIndex];
                        let computedStyles = getComputedStyle(selectedOption);
                        let backgroundColor = computedStyles.backgroundColor;

                        // Set the background color
                        dropdown[0].style.backgroundColor = backgroundColor;
                    }
                }
            }
        }
        function alertstaffupdate(){
 
            alert("Make Sure to click the Update Staff Button!");
        }

    </script>
</body>

</html>