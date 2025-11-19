
import csv

# A list of dictionaries
mydict = [
    {"Name": "Harry", "Age": "19"},
    {"Name": "Ron", "Age": "13"}, 
    {"Name": "Hermione", "Age": "78"}
]

# Write the csv file
with open("new.csv", "w") as file:
    writer = csv.DictWriter(file, fieldnames=["Name", "Age"])
    writer.writeheader()
    writer.writerows(mydict)
    
    
# Read the file
with open("new.csv", "r") as csvfile:
    file = csv.DictReader(csvfile)
    for row in file:
        print(row)
    