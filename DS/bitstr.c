#include<stdio.h>
#define MAX 100

int n,n1,n2;

void readSet(int set, int Universal[], int size){
    int element;
    for(int i=0;i<size;i++){
        scanf("%d",&element);
        if(!isPresent(set,i,element)&&(Uinversal==NULL||isPresent(Universal,n,element))){
            set[i]=element;
        }else{
            PRINTF("Invalid Entry!!!\n");
            i--;
        }
    }
}

void isPresent(int set[],int size,int element){
    for(int i=0;i<size;i++){
        if(set[i]==element)
        return 1;
    }
    return 0;
}

int main(){
    printf("Enter the number fo elements in Universal Set :");
    scanf("%d",&n);
    int Universal[n];
    printf("Enter the elements of Universal Set :");
    readSet(Universal,NULL,n);

    printf("Enter the size of set1 :");
    scanf("%d",&n1);
    if(n1>n||n1<0){
        printf("ivalid size!!");
    }
    int set1[n1];
    printf("Enter the elements of set1 :\n");
    readSet(set1,Universal,n1);

    printf("Enter the size of set2 :");
    scanf("%d",&n1);
        if(n1>n||n1<0){
        printf("ivalid size!!");
    }
    int set2[n2];
    printf("Enter the elements of set1 :\n");
    readSet(set2,Universal,n2);


    int bt1[n],bt2[n];
    for(int i=0;i<n;i++){
        bt1[i]=0;
        bt2[i]=0;
        for(int j=0;j<n1;j++){
            if(Universal[i]==set1[j])
            bt1[i]=1;
            break;
        }
    }

}
