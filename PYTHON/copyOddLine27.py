file1=open("file1.txt","r")
file2=open("file2.txt","w")

count=0
for line in file1:
    count+=1
    if count%2!=0:
        file2.write(line)