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
names = [row[0] for row in cursor.fetchall()]
cursor.execute("SELECT name FROM staff")
staff = [row[0] for row in cursor.fetchall()]
# Fetch the number of labs, hardcore, and softcore for each department and store in the respective arrays
lab = []
hard = []
soft = []

for dept in names:
    # Lab count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 'yes'", (dept,))
    lab_count = cursor.fetchone()[0]
    lab.append(lab_count)

    # Hardcore count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'hardcore'", (dept,))
    hard_count = cursor.fetchone()[0]
    hard.append(hard_count)

    # Softcore count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'softcore'", (dept,))
    soft_count = cursor.fetchone()[0]
    soft.append(soft_count)

# Close the cursor and connection
cursor.close()
connection.close()
s_matrix=[[[0 for k in range(7)]for j in range(5)]for i in range(len(staff))]
# Print the number of departments, names, lab counts, hardcore counts, and softcore counts
print("Number of departments (n):", n)
print("Department names:", names)
print("staff names:", staff)
print("Number of labs for each department:", lab)
print("Number of hardcore courses for each department:", hard)
print("Number of softcore courses for each department:", soft)