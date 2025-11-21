#include <stdio.h>
#include <stdlib.h>
#define MAX 100

int n, e, adj[MAX][MAX], visited[MAX], u,v,w,parent[MAX];

struct edge{
    int u,v,w;
};

int find(int x){
    while(parent[x]!=x)
        x=parent[x];
    return x;
}

void union_set(int u,int v){
    int x=find(u);
    int y=find(v);
    parent[y]=x;
}

int kruskal(struct edge edge[]){
    int edge_used=0;
    int mst_weight=0;
    for(int i=0;i<e&&edge_used<n-1;i++){
        int u=edge[i].u;
        int v=edge[i].v;    
        if(find(u)!=find(v)){
            printf("Take Edge : %d - %d = %d\n",u,v,edge[i].w);
            mst_weight+=edge[i].w;
            union_set(u,v);
            edge_used++;
        }
    }
    printf("Total MST Weight : %d",mst_weight);
    return mst_weight;
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

    printf("Adjacency matrix is :\n");
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
    for(i=0;i<n;i++){
        parent[i]=i;
    }
    kruskal(edge);
    return 0;
            
}
