// prims
#include <stdio.h>
#include <stdlib.h>
#define MAX 10

int n, e, adj[MAX][MAX], visited[MAX];

void prims(int start)
{
    int i, j, edges = 0, u, v, sum = 0;
    for (i = 0; i < n; i++)
        visited[i] = 0;
    visited[start] = 1;
    while (edges < n - 1)
    {
        u = -1, v = -1;
        int min = 9999;
        for (i = 0; i < n; i++)
        {
            if (visited[i])
            {
                for (j = 0; j < n; j++)
                {
                    if (!visited[j] && adj[i][j] != 0 && adj[i][j] < min)
                    {
                        min = adj[i][j];
                        u = i;
                        v = j;
                    }
                }
            }
        }
        if (u != -1 && v != -1)
        {
            printf("%d - %d  weight: %d\n", u, v, adj[u][v]);
            visited[v] = 1;
            sum += adj[u][v];
            edges++;
        }
    }
    printf("Total weight of MST: %d\n", sum);
}

int main()
{
    int u, v, weight, start, i, j;
    printf("Enter the number of nodes :");
    scanf("%d", &n);
    printf("\nEnter the number of edges :");
    scanf("%d", &e);

    for (i = 0; i < n; i++)
    {
        for (j = 0; j < n; j++)
        {
            adj[i][j] = 0;
        }
    }
    printf("\nEnter adjacency and weight :\n");
    for (i = 0; i < e; i++)
    {
        scanf("%d %d %d", &u, &v, &weight);
        if (u < 0 || u >= n || v < 0 || v >= n)
        {
            printf("Invalid vertices!\n");
            i--;
            continue;
        }
        if (weight < 0)
        {
            printf("Edge weight cannot be negative!!");
            printf("\nEnter positive weight :");
            scanf("%d", &weight);
        }
        adj[u][v] = weight;
        adj[v][u] = weight;
    }
    printf("\nAdjacency matrix with weight :\n");
    for (i = 0; i < n; i++)
    {
        for (j = 0; j < n; j++)
        {
            printf("%d ", adj[i][j]);
        }
        printf("\n");
    }
    printf("\nEnter start vertex (0-%d) :", n - 1);
    scanf("%d", &start);
    prims(start);
    return 0;
}