import mysql.connector

# MySQL database configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'timetablepro'
}

# Connect to the database
connection = mysql.connector.connect(**db_config)
cursor = connection.cursor()

# Fetch the count of departments
cursor.execute("SELECT COUNT(*) FROM department")
n = cursor.fetchone()[0]

# Fetch the names of departments
cursor.execute("SELECT dept FROM department")
name = [row[0] for row in cursor.fetchall()]

# Fetch the names of staff
cursor.execute("SELECT name FROM staff")
staff = [row[0] for row in cursor.fetchall()]
s_matrix=[[[0 for k in range(7)]for j in range(5)]for i in range(len(staff))]
# Fetch the number of labs, hardcore, and softcore for each department and store in the respective arrays
sem = "odd"
lab1 = []
lab2 = []
lab3 = []
lab4 = []
lab5 = []
hard = []
soft = []

for dept in name:
    # lab1 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 1", (dept,))
    lab1_count = cursor.fetchone()[0]
    lab1.append(lab1_count)

    # lab2 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 2", (dept,))
    lab2_count = cursor.fetchone()[0]
    lab2.append(lab2_count)

    # lab3 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 3", (dept,))
    lab3_count = cursor.fetchone()[0]
    lab3.append(lab3_count)

    # lab4 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 4", (dept,))
    lab4_count = cursor.fetchone()[0]
    lab4.append(lab4_count)

    # lab5 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 5", (dept,))
    lab5_count = cursor.fetchone()[0]
    lab5.append(lab2_count)

    # Hardcore count
    cursor.execute(
        "SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'hardcore' AND lab=0 AND sem_type=%s",
        (dept, sem)
    )
    hard_count = cursor.fetchone()[0] * 3
    hard.append(hard_count)

    # Softcore count
    cursor.execute(
        "SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'softcore' AND lab=0 AND sem_type=%s",
        (dept, sem)
    )
    soft_count = cursor.fetchone()[0] * 3
    soft.append(soft_count)

# Print the number of departments, names, lab2 counts, hardcore counts, and softcore counts
print("Number of departments (n):", n)
print("Department names:", name)
print("Staff names:", staff)
print("Number of lab1 for each department:", lab1)
print("Number of lab2 for each department:", lab2)
print("Number of lab3 for each department:", lab3)
print("Number of hardcore courses for each department:", hard)
print("Number of softcore courses for each department:", soft)

# Rest of your code...

# Close the cursor and connection
cursor.close()
connection.close()
