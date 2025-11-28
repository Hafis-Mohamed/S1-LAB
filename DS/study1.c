#include<stdio.h>
#include<stdlib.h>
#define MAX 10
int a[MAX][MAX],q[MAX],v[MAX],n;
// int front=-1,rear=-1;

// void enqueue(int item){
//     if(front==-1){
//         front++;
//     }
//     rear++;
//     q[rear]=item;
// }

// int dequeue(){
//     if(front==-1||front>rear){
//         return -1;
//     }
//     int item;
//     item=q[front];
//     front++;
//     return item;
// }

// void bfs(int root,int a[MAX][MAX]){
//     enqueue(root);
//     v[root]=1;
//     while(front!=-1&&front<=rear){
//         int node=dequeue();
//         printf("%d ",node);
//         for(int i=0;i<n;i++){
//             if(a[node][i]==1&&!v[i]){
//                 enqueue(i);
//                 v[i]=1;
//             }
//         }
//     }
//     printf("\n");
// }

void dfs(int root, int a[MAX][MAX]){
    printf("%d",root);
    v[root]=1;
    for(int i=0;i<n;i++){
        if(a[root][i]==1&&!v[i]){
            dfs(i,a);
        }
    }
}

int main(){
    int root;
    printf("enter number of nodes");
    scanf("%d",&n);
    printf("enter adjacency matric");
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            printf("a[%d][%d]=",i,j);
            scanf("%d",&a[i][j]);
        }
    }
    for(int i=0;i<n;i++){
        v[i]=0;
    }
    printf("enter starting node");
    scanf("%d",&root);
    // printf("BFS-->"); 
    // bfs(root,a);
    printf("DFS->");
    dfs(root,a);
    return 0;
}