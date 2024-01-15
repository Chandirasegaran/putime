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

# Close the cursor and connection
cursor.close()
connection.close()

# Print the number of departments and names
print("Number of departments (n):", n)
print("Department names:", names)
