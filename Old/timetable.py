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
val=True
matrix=[[[0 for k in range(7)]for j in range(5)]for i in range(n)]


# Fetch the data from the 'assign' table
cursor.execute("SELECT staff_name, course_code, department, lab, credit FROM assign")
subjects = [list(row) for row in cursor.fetchall()]

def custom_sort(row):
    # Sort by lab in ascending order, with zero as the last priority
    return [row[3] if row[3] != 0 else float('inf')] + row

# Sort the subjects array
subjects = sorted(subjects, key=custom_sort)

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

    # # lab5 count
    # cursor.execute("SELECT COUNT(*) FROM course WHERE department = %s AND lab = 5", (dept,))
    # lab5_count = cursor.fetchone()[0]
    # lab5.append(lab2_count)
    # print("\n","\n",lab5)
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
        
        
for a in range(len(matrix)):
    l=lab1[a]
    while(l>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                for k in range(a):
                    if(matrix[k][i][j]!=1):
                        val=True
                    else:
                        val=False
                        break
                if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
                        matrix[a][i][j],matrix[a][i][j+1]=1,1
                        l-=2
                        break
                    
for a in range(len(matrix)):
    l=lab2[a]
    while(l>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                for k in range(a):
                    if(matrix[k][i][j]!=2):
                        val=True
                    else:
                        val=False
                        break
                if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
                        matrix[a][i][j],matrix[a][i][j+1]=2,2
                        l-=2
                        break
                    
for a in range(len(matrix)):
    l=lab3[a]
    while(l>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                for k in range(a):
                    if(matrix[k][i][j]!=3):
                        val=True
                    else:
                        val=False
                        break
                if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
                        matrix[a][i][j],matrix[a][i][j+1]=3,3
                        l-=2
                        break
     
for a in range(len(matrix)):
    l=lab4[a]
    while(l>0):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                for k in range(a):
                    if(matrix[k][i][j]!=4):
                        val=True
                    else:
                        val=False
                        break
                if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
                        matrix[a][i][j],matrix[a][i][j+1]=4,4
                        l-=2
                        break

# for a in range(len(matrix)):
#     l=lab5[a]
#     while(l>0):
#         for i in range(len(matrix[0])):
#             for j in range(len(matrix[0][0])):
#                 for k in range(a):
#                     if(matrix[k][i][j]!="l5"):
#                         val=True
#                     else:
#                         val=False
#                         break
#                 if(matrix[a][i][j]==0 and val==True and l>0 and j+1<6):
#                         matrix[a][i][j],matrix[a][i][j+1]='l5','l5'
#                         l-=2
#                         break

labname=[1,2,3,4]
for lcount in labname:
    for a in range(len(matrix)):
        for i in range(len(matrix[0])):
            for j in range(len(matrix[0][0])):
                if(matrix[a][i][j]==lcount and matrix[a][i][j+1]==lcount):
                    for sub in subjects:
                        if(name.index(sub[2])==a and sub[-2]==lcount and sub[-1]>0):
                            if(s_matrix[staff.index(sub[0])][i][j]==0 and s_matrix[staff.index(sub[0])][i][j+1]==0 and matrix[a][i][j]==lcount and matrix[a][i][j+1]==lcount):
                                s_matrix[staff.index(sub[0])][i][j],s_matrix[staff.index(sub[0])][i][j+1]=1,1
                                matrix[a][i][j]=sub[1]
                                matrix[a][i][j+1]=sub[1]
                                sub[-1]=sub[-1]-2

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
# for a in range(len(matrix)):
#     h=hard[a]
#     for i in range(len(matrix[0])):
#         for j in range(len(matrix[0][0])):
#             if(matrix[a][i][j]==0 and h>0 and j<4):
#                 for sub in subjects:
#                     if(name.index(sub[2])==a and sub[-2]==0 and sub[-1]>0):
#                             matrix[a][i][j]=sub[1]
#                             h-=1
                        # print(sub)
# Print the number of departments, names, lab2 counts, hardcore counts, and softcore counts
print("Number of departments (n):", n)
# print("Department names:", name)
# print("Staff names:", staff)
print("Number of lab1 for each department:", lab1)
print("Number of lab2 for each department:", lab2)
print("Number of lab3 for each department:", lab3)
print("Number of lab4 for each department:", lab4)
# print("Number of lab5 for each department:", lab5)
print("Number of hardcore courses for each department:", hard)
print("Number of softcore courses for each department:", soft)


for a in range(len(matrix)):
    print(name[a])
    for i in range(len(matrix[0])):
        for j in range(len(matrix[0][0])):
            print(matrix[a][i][j],end=" ")
        print()
    print("\n")
# Rest of your code...

# Close the cursor and connection
cursor.close()
connection.close()
