a=int(input("Enter a number : "))
b=int(input("Enter second number : "))

print("gcd(%d,%d)"%(a,b))

while b:
    a,b = b, a%b

print("Gcd is : "+str(a))
# gcd=0
# if a>b:
#     min=b
# else:
#     min=a
# for i in range(1,min+1):
#     if (a%i==0) and (b%i==0):
#         gcd=i
# print(gcd)