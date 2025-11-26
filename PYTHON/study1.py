class larger:
    def __init__(self,n1,n2,n3):
        self.n1=n1
        self.n2=n2
        self.n3=n3
    def findLarge(self):
        if self.n1>self.n2:
            if self.n1>self.n3:
                print(self.n1,"is larger")
            else:
                print(self.n3,"is larger")
        elif self.n2>self.n3:
            print(self.n2,"is larger")
        else:
            print(self.n3,"is larger")
            
num1=int(input("enter number 1"))
num2=int(input("enter number 2"))
num3=int(input("enter number 3"))

s1=larger(num1,num2,num3)
s1.findLarge()