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

# Fetch the number of lab2s, hardcore, and softcore for each department and store in the respective arrays
lab2 = []
hard = []
soft = []

for dept in name:
    # lab22 count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 2", (dept,))
    lab2_count = cursor.fetchone()[0]
    lab2.append(lab2_count)

    # Hardcore count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'hardcore'", (dept,))
    hard_count = cursor.fetchone()[0]
    hard.append(hard_count)

    # Softcore count
    cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND course_core = 'softcore'", (dept,))
    soft_count = cursor.fetchone()[0]*3
    soft.append(soft_count)




# Print the number of departments, names, lab2 counts, hardcore counts, and softcore counts
print("Number of departments (n):", n)
print("Department names:", name)
print("Number of lab2s for each department:", lab2)
print("Number of hardcore courses for each department:", hard)
print("Number of softcore courses for each department:", soft)

val=True
matrix=[[[0 for k in range(7)]for j in range(5)]for i in range(n)]
for a in range(len(matrix)):
    l=lab2[a]
    while(l>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                    for k in range(a):
                        if(matrix[k][i][j]!='l'):
                            val=True
                        else:
                            val=False
                            break
                    if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
                        matrix[a][i][j],matrix[a][i][j+1]='l','l'
                        l-=2
                        break
for a in range(len(matrix)):
    h=hard[a]
    for i in range(len(matrix[0])):
        for j in range(len(matrix[0][0])):
            if(matrix[a][i][j]==0 and h>0 and j<4):
                    matrix[a][i][j]='h'
                    h-=1               
    if(h>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                if(matrix[a][i][j]==0 and h>0):
                        matrix[a][i][j]='h'
                        h-=1
                    
for a in range(len(matrix)):
    s=soft[a]
    for i in range(len(matrix[0])):
        for j in range(len(matrix[0][0])):
            if(matrix[a][i][j]==0 and s>0):
                        matrix[a][i][j]='s'
                        s-=1
    if(s!=0):
        print("impossible class ",a)
        
for a in range(len(matrix)):
    print(name[a])
    for i in range(len(matrix[0])):
        for j in range(len(matrix[0][0])):
            print(matrix[a][i][j],end=" ")
        print()
    print("\n")
# Close the cursor and connection
cursor.close()
connection.close()