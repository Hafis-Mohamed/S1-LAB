#include<stdio.h>
#include<stdlib.h>
#define MAX 10

int a[MAX][MAX],visited[MAX];
int n,e;
int prims(int start,int a[MAX][MAX]){
    visited[start]=1;
    int edges=0,sum=0;
    while(edges<n-1)
    {
        int u=-1,v=-1,min=99999;
        for(int i=0;i<n;i++){
            if(visited[i]){
                for(int j=0;j<n;j++){
                    if(!visited[j]&&a[i][j]!=0&&a[i][j]<min){
                        min=a[i][j];
                        u=i;
                        v=j;
                    }
                }
            }
        }
        if(u!=-1&&v!=-1){
            printf("%d-%d=%d\n",u,v,a[u][v]);
            visited[v]=1;
            sum=sum+a[u][v];
            edges++;
        }
    
    }
    printf("weight:%d",sum);
}
int main(){
    int u,v,w,start;
    printf("enter number of vertices:");
    scanf("%d",&n);
    printf("enter number of edges:");
    scanf("%d",&e);
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            a[i][j]=0;
        }
    }
    printf("enter edges with weight:\n");
    for(int i=0;i<e;i++){
        scanf("%d %d %d",&u,&v,&w);
        a[u][v]=w;
        a[v][u]=w;
    }
    for(int i=0;i<n;i++){
        visited[i]=0;
    }
    printf("enter start vertex 0-%d",n-1);
    scanf("%d",&start);
    prims(start,a);
}