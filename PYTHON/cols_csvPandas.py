import pandas as pd
column=[input("Enter column to print :")]
file=pd.read_csv("data.csv",usecols=column)
print(file)