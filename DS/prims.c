//prims
#include <stdio.h>
#include <stdlib.h>
#define MAX 100

int main(){
    int n,e,adj[MAX][MAX],i,j,u,v,weight,start;
    printf("Enter the number of nodes :");
    scanf("%d",&n);
    printf("\nEnter the number of edges :");
    scanf("%d",&e);

    for(i=0;i<n;i++){
        for(j=0;j<n;j++){
            adj[i][j]=0;
        }
    }
    printf("\nEnter adjacency and weighteight :\n");
    for(i=0;i<e;i++){
        scanf("%d %d %d",&u,&v,&weight);
        adj[u][v]=weight;
        adj[v][u]=weight;
    }
    printf("\nAdjacency matrix weightith weighteight :\n");
    for(i=0;i<n;i++){
        for(j=0;j<n;j++){
            printf("%d ",adj[i][j]);
        }
        printf("\n");
    }
    printf("\nEnter start vertex (0-%d) :",n-1);
    scanf("%d",&start);
}