#include<stdio.h>
#include<stdlib.h>
#define MAX 10

int main(){
    int a[MAX][MAX],q[MAX],rear=0,front=0,n,indegree[MAX]={},top[MAX],count=0;
    printf("Enter number of nodes:");
    scanf("%d",&n);
    printf("Enter adjacency matrix:");
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            printf("a[%d][%d]=",i,j);
            scanf("%d",&a[i][j]);
            if(a[i][j]==1&&a[j][i]==1){
                printf("cannot be 1");
                a[i][j]=0;
            }
        }
    }
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            if(a[j][i]==1){
                indegree[i]++;
            }
        }
    }
    for(int i=0;i<n;i++){
        printf("indegree(%d)=%d\n",i,indegree[i]);
    }
    for(int i=0;i<n;i++){
        if(indegree[i]==0){
            q[rear++]=i;
        }
    }
    while(front<rear){
        int node=q[front++];
        top[count++]=node;
        for(int i=0;i<n;i++){
            if(a[node][i]==1){
                indegree[i]--;
                if(indegree[i]==0)
                    q[rear++]=i;
            }
        }
    }
    if(count!=n){
        printf("cycle detected!!");
    }
    else{
        printf("Topoligical Sort :");
        for(int i=0;i<n;i++){
            printf("%d ",top[i]);
        }
    }

}