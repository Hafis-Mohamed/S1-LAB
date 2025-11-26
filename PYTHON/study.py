class time:
    def __init__(self,hr,min,sec):
        self._hr=hr
        self._min=min
        self._sec=sec

    def __add__(self,other):
        h=self._hr+other._hr
        m=self._min+other._min
        s=self._sec+other._sec
        if h>=24:
            h%=24
        if m>=60:
            m%=60
            h+=1
        if s>=60:
            s%=60
            m+=1
        return time(h,m,s)
            
    def __str__(self):
        return f"{self._hr:02d}:{self._min:02d}:{self._sec:02d}"

t1=time(21,52,25)
t2=time(16,13,16)
t3=t1+t2
print(t3)