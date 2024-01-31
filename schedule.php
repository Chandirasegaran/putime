<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container mt-5">
        <H1>Assign Schedule</H1>
        <div id="assign-schedule">


            <label for="listcourse">Select Your Course for Scheduling </label>

            <select class="custom-select" name="listcourse" id="listcourse" onclick="hideselect()" onchange="checkHour()">

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

                    function checkHour() {
                        checkHoursReq();
                        hourCheck();
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
        document.getElementById('listcourse').addEventListener('change', function() {
            var selectedCourse = this.value;
            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php",
                data: {
                    course: selectedCourse
                },
                success: function(response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                    // Make another AJAX request to fetch subject names and staff names
                    $.ajax({
                        type: "POST",
                        url: "fetch_subject_staff.php",
                        data: {
                            course: selectedCourse
                        },
                        success: function(subjectStaffTable) {
                            // Update the subjectStaffTable div with the received table data
                            document.getElementById('subjectStaffTable').innerHTML = subjectStaffTable;


                            checkHoursReq();


                        },
                        error: function(error) {
                            console.log("Error: " + error.responseText);
                        }
                    });
                },
                error: function(error) {
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Add an event listener to the select element
        document.getElementById('listcourse').addEventListener('change', function() {
            var selectedCourse = this.value;
            // alert(selectedCourse);
            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php", // Adjust the path to match your file structure
                data: {
                    course: selectedCourse
                },
                success: function(response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                },
                error: function(error) {
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
                for (let i = 1; i <= 5; i++) {
                    for (let j = 1; j <= 8; j++) {
                        for (let k = 0; k <= (document.getElementById("hidval").innerText - 1); k++) {
                            let element = document.getElementById(i.toString() + j.toString() + k.toString());
                            let clsvar = null;

                            if (element && element.value !== null) {
                                let staffValue = element.value + ".staff";
                                if (staffValue !== ".staff") {
                                    clsvar = staffValue;
                                }
                            }

                            // Now you can use clsvar, which will either be the value followed by ".staff" or null if conditions are not met.
                            let element1 = document.getElementById(i.toString() + j.toString() + k.toString());
                            let labvar = null;

                            if (element1 !== null && element1.value !== null) {
                                labvar = element1.value + ".lab";
                            }

                            // Now you can use labvar, which will either be the value followed by ".lab" or null if the element or its value is null.
                            // console.log(eval(clsvar));

                            let elements1 = document.querySelectorAll('.table' + i.toString() + j.toString());
                            let elements2 = document.querySelectorAll('.lab' + i.toString() + j.toString());
                            // Create an array to store the values

                            let hcheckarray = [];
                            // Assuming 'i' is defined in your context and you want to iterate 'j' from 1 to 7
                            for (let j1 = 1; j1 <= 7; j1++) {
                                // Select elements with class name based on 'i' and 'j'
                                let h_elements = document.querySelectorAll('.table' + i.toString() + j1.toString());

                                // Iterate over the NodeList and push innerText into hcheckarray
                                h_elements.forEach(function(element) {
                                    hcheckarray.push(element.innerText);
                                });
                            }
                            let vcheckarray = [];

                            if (j == 1) {
                                // Assuming 'i' is defined in your context and you want to iterate 'j' from 1 to 7
                                for (let i1 = 1; i1 <= 7; i1++) {
                                    // Select elements with class name based on 'i' and 'j'
                                    let v_elements = document.querySelectorAll('.table' + i1.toString() + j.toString());

                                    // Iterate over the NodeList and push innerText into hcheckarray
                                    v_elements.forEach(function(element) {
                                        vcheckarray.push(element.innerText);
                                    });
                                }
                                // console.log(vcheckarray);

                            }

                            let valuesArray = [];
                            let labArray = [];
                            // Iterate over the NodeList and push values into the array
                            elements1.forEach(function(elementpara) {
                                valuesArray.push(elementpara.innerText);
                            });
                            elements2.forEach(function(elementpara) {
                                labArray.push(elementpara.innerText);
                            });
                            if (valuesArray.includes(eval(clsvar))) {

                                // console.log(document.getElementById(i.toString() + j.toString() + k.toString()));
                                document.getElementById(i.toString() + j.toString() + k.toString()).remove();
                                // console.log(eval(clsvar),valuesArray);
                            } else if (eval(labvar) != 'no' && labArray.includes(eval(labvar))) {
                                // console.log(document.getElementById(i.toString() + j.toString() + k.toString()));
                                document.getElementById(i.toString() + j.toString() + k.toString()).remove();
                            } else if (hcheckarray.filter(element => element === eval(clsvar)).length >= 2) {
                                document.getElementById(i.toString() + j.toString() + k.toString()).style.backgroundColor = 'red';
                            } else if (vcheckarray.filter(element => element === eval(clsvar)).length >= 2) {

                                document.getElementById(i.toString() + j.toString() + k.toString()).style.backgroundColor = 'red';
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

                        // console.log(dropdown);

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
        var config = {
            childList: true,
            subtree: true
        };
        // Start observing the "assign-schedule" element
        observer.observe(document.getElementById("assign-schedule"), config);


        //change the drop dop color when a option is selected
        function mycheck() {
            hourCheck();


            for (let i = 1; i <= 5; i++) {
                // Iterate through the second digit (1 to 8)
                for (let j = 1; j <= 8; j++) {
                    // Construct the class name
                    let className = "sel" + i + j;

                    // Get the dropdown element
                    let dropdown = document.getElementsByClassName(className);
                    // console.log(dropdown);

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

        var staffUpdateAlertDisplayed = false; // Flag variable to track if the alert has been displayed
        function alertstaffupdate() {
            staffUpdateAlertDisplayed = true; // Set flag to true when alert is displayed
        }

        $(document).ready(function() {
            $("#subjectStaffTable").on("mouseleave", function() {
                if (staffUpdateAlertDisplayed) {
                    alert("Make Sure to click the Update Staff Button!");
                    staffUpdateAlertDisplayed = false; // Reset flag after displaying alert
                }
            });
        });
    </script>

    <script>
        //s11 s21 course code
        //s14 s24 hourse required
        //current course
        // Assuming the id of the h1 element is "currentcourse"
        let values = [];
        let valuesc = [];

        function checkHoursReq() {

            var currentCourseElement = document.getElementById("currentcourse");
            var currentCourseText = null;

            if (currentCourseElement !== null) {
                currentCourseText = currentCourseElement.innerText;
                // Now you can use currentCourseText safely.
            } else {
                // Handle the case when the element is not found.
                console.error("Element with ID 'currentcourse' not found.");
            }
            // console.log(currentCourseText);
            var counter = 1; // Start counter from 12
            while (true) {
                var id = "s" + counter + "4";
                var idc = "s" + counter + "1";

                // console.log(id);
                var element = document.getElementById(id);
                var element1 = document.getElementById(idc);

                // console.log(element.innerText);
                if (!element) {
                    break; // Exit the loop if no element is found
                }

                values.push(element.innerText || element.textContent);
                valuesc.push(element1.innerText || element1.textContent);
                counter++;
            }

            // var idsToDisable = ["110", "120", "130", "140"];

            // idsToDisable.forEach(function(id) {
            //     var element = document.getElementById(id);
            //     if (element) {
            //         element.disabled = true;
            //     }
            // });

        }

        function hourCheck() {
            var arrDisable = [];
            var arr1 = [];

            console.log(values);
            console.log(valuesc);

            var result = {};

            for (var i = 0; i < valuesc.length; i++) {
                var key = valuesc[i];
                var value = values[i];
                result[key] = value;
            }
            // console.log(result);

            // console.log(result["cssc1"]);

            for (let i = 1; i < 6; i++) {
                for (let j = 1; j < 9; j++) {
                    let checkId = "select" + i.toString() + j.toString();
                    var element = document.getElementById(checkId);
                    if (element !== null) {
                        arr1.push(element.value);
                    } else {
                        // Handle the case when the element is not found.
                        console.error("Element not found.");
                    }
                    arr1 = removeEmptyValues(arr1);

                    // You can use the id to do whatever you need here
                    // For example, uncomment the following lines to retrieve an element by its id
                    // let element = document.getElementById(id);
                    // console.log(element.value);
                }
            }

            for (var k = 0; k < arr1.length; k++) {

                if (result[arr1[k]] > 0) {
                    result[arr1[k]] = result[arr1[k]] - 1;
                }
                if (result[arr1[k]] == 0) {
                    arrDisable.push(arr1[k]);
                    disop();
                    // alert(arr1[k]);
                }

                console.log(result);

            }
            // console.log(valuesc);
            // console.log(arrDisable);
            function disop() {
                var indices = findIndicesOfElements(valuesc, arrDisable);
                console.log(indices); // Output: [1, 3, 4]
                disele = "";
                for (let r = 0; r < indices.length; r++) {
                    for (let p = 1; p < 6; p++) {
                        for (let q = 1; q < 9; q++) {
                            disele = p.toString() + q.toString() + indices[r];
                            // console.log(disele);
                            var option = document.getElementById(disele);
                            if (option) {
                                var selectValue = document.getElementById("select" + p.toString() + q.toString()).value;
                                if (!selectValue) {
                                    option.remove();
                                }


                            }
                        }
                    }

                }
            }

        }

        function findIndicesOfElements(array, elements) {
            var indices = [];
            for (var i = 0; i < array.length; i++) {
                if (elements.includes(array[i])) {
                    indices.push(i);
                }
            }
            return indices;
        }

        function removeEmptyValues(arr) {
            return arr.filter(function(value) {
                return value !== null && value !== undefined && value !== "" && value !== 0 && value !== false;
            });
        }
    </script>

</body>

</html>