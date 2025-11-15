#include <stdio.h>
#include <stdlib.h>
#define MAX 100

int n, e, adj[MAX][MAX], visited[MAX];

struct edge{
    int u,v,w;
};

int kruskal(){
    
}

int main()
{
    int i, j;
    struct edge edge[MAX];
    printf("Enter the number of nodes :");
    scanf("%d", &n);
    printf("Enter number of edges :");
    scanf("%d", &e);

    for (i = 0; i < n; i++)
        for (j = 0; j < n; j++)
            adj[i][j] = 0;

    printf("Enter Adjacency edges with weight :\n");
    for (i = 0; i < e; i++)
    {
        scanf("%d %d %d", &edge[i].u, &edge[i].v, &edge[i].w);
        if (edge[i].u < 0 || edge[i].u >= n || edge[i].v < 0 || edge[i].v >= n)
        {
            printf("Invalid vertices!\n");
            i--;
            continue;
        }
        if (edge[i].w < 0)
        {
            printf("Edge weight cannot be negative!!");
            printf("\nEnter positive weight :");
            scanf("%d", &edge[i].w);
        }
        adj[edge[i].u][edge[i].v] = edge[i].w;
        adj[edge[i].v][edge[i].u] = edge[i].w;
    }

    for (i = 0; i < n; i++){
        for (j = 0; j < n; j++){
            printf("%d ", adj[i][j]);
        }
        printf("\n");
    }

    for(i=0;i<e;i++){
        for(j=0;j<e-i-1;j++){
            struct edge temp;
            if(edge[j].w>edge[j+1].w){
                temp=edge[j+1];
                edge[j+1]=edge[j];
                edge[j]=temp;
            }
        }
    }
    for(i=0;i<e;i++)
        printf("%d - %d = %d\n",edge[i].u,edge[i].v,edge[i].w);
    kruskal();
    return 0;
            
}
