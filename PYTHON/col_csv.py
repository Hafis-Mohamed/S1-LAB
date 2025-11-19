import csv

with open(input("file :"),"r") as file:
    reader=csv.reader(file)

    fields=next(reader)
    choice=int(input("Enter the column to print :"))

    cols=[]
    for row in reader:
        cols.append(row[choice])
    print(fields[choice],"\n",cols)