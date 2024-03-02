<?php
// sl.php

// Include the schedule.php file
include 'schedule_lab.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lab Subjects</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <h1>Lab Subjects</h1>

        <!-- Bootstrap Form Group for selecting lab -->
        <div class="form-group">
            <label for="labDropdown">Select Lab:</label>
            <select class="form-control" id="labDropdown">
                <option value="1" selected>Lab 1</option>
                <option value="2">Lab 2</option>
                <option value="3">Lab 3</option>
                <option value="4">Lab 4</option>
            </select>
        </div>

        <!-- Bootstrap Table for displaying lab subjects -->
        <table class="table table-bordered lab-subjects">
            <tbody id="labSubjectsContainer"></tbody>
        </table>
        <form action="update_course_table.php" method="post">
                <div id="assigningtable">
                   

                </div>

            </form>
        <script>
            // jQuery function to handle changes in the lab dropdown
            $(document).ready(function () {
                // Initially call the function to load Lab 1 subjects
                updateLabSubjects(1);
                updateassigning_tab(1);
                $('#labDropdown').change(function () {
                    var selectedLab = $(this).val();

                    // Call the function to load lab subjects based on the selected lab
                    updateLabSubjects(selectedLab);
                    updateassigning_tab(selectedLab);
                });
            });

            // Function to fetch and display lab subjects based on lab number
            function updateLabSubjects(selectedLab) {
                $.ajax({
                    url: 'get_lab_subjects.php', // Adjust the URL as needed
                    type: 'POST',
                    data: { lab: selectedLab },
                    success: function (response) {
                        $('#labSubjectsContainer').html(response);
                    },
                    error: function () {
                        alert('Error fetching lab subjects.');
                    }
                });
            }
            function updateassigning_tab(selectedLab)
            {
                console.log("lab"+selectedLab);
                $.ajax({
                type: "POST",
                url: "fetch_lab_data.php", // Adjust the path to match your file structure
                data: {
                    course: "lab"+selectedLab,
                    labno:selectedLab
                },
                success: function(response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                    
                },
                error: function(error) {
                    console.log("Error: " + error.responseText);
                }

                });
            }
        </script>
    </div>
</body>

</html>
