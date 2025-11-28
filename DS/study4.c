#include<stdio.h>
#include<stdlib.h>

struct node{
    int data;
    struct node* left;
    struct node* right;
};

struct node* root=NULL;

void preOrder(struct node* root){
    if(root==NULL){
        return;
    }
    printf("%d->",root->data);
    preOrder(root->left);
    preOrder(root->right);
}

void inOrder(struct node* root){
    if(root==NULL){
        return;
    }
    inOrder(root->left);
    printf("%d->",root->data);
    inOrder(root->right);
}

void postOrder(struct node* root){
    if(root==NULL){
        return;
    }
    postOrder(root->left);
    postOrder(root->right);
    printf("%d->",root->data);
}

void display(){
    if(root==NULL){
        printf("tree is empty!");
    }
    printf("\nPREORDER :");
    preOrder(root);
    printf("\nPOSTORDER :");
    postOrder(root);
    printf("\nINORDER :");
    inOrder(root);
}

struct node* insert(struct node* root,struct node* new){
    if(root == NULL){
        root=new;
    }
    else if(new->data < root->data){
        root->left=insert(root->left,new);
    }else{
        root->right=insert(root->right,new);
    }
    return root;
}

int insertion(){
    int item;
    printf("enter the element to insert:");
    scanf("%d",&item);
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->left=new->right=NULL;
    root=insert(root,new);
}

struct node* srch(struct node* root,int item){
    if(root==NULL){
        printf("element not found");
        return NULL;
    }
    if(root->data==item){
        printf("element found");
    }
    else if(item<root->data){
        root->left=srch(root->left,item);
        return root->left;
    }else{
        root->right=srch(root->right,item);
        return root->right;
    }
}

void search(){
    int item;
    printf("element:");
    scanf("%d",&item);
    srch(root,item);
}

struct node* findMin(struct node* root){
    while(root->left!=NULL){
        root=root->left;
    }
    return root;
}

struct node* delete(struct node* root,int item){
    if(root==NULL){
        printf("element not found");
        return root;
    }
    struct node* temp;
    if(item<root->data){
        root->left=delete(root->left,item);
    }else if(item>root->data){
        root->right=delete(root->right,item);
    }else{//1 child
        if(root->left==NULL){
            temp=root->right;
            free(root);
            return temp;
        }else if(root->right==NULL){
            temp=root->left;
            free(root);
            return temp;
        }//2child
        root->data=findMin(root->right)->data;
        root->right=delete(root->right,root->data);
    }
     return root;   

}

int deletion(){
    int item;
    printf("element:");
    scanf("%d",&item);
    root=delete(root,item);
}

int main(){
    while(1){
        int choice;
        printf("\n1 for insertion, 2 for deletion,3 for search,4 for display,5 for exit\n");
        scanf("%d",&choice);

        switch(choice){
            case 1:
                insertion();
                break;
            case 2:
                deletion();
                break;
            case 3:
                search();
                break;
            case 4:
                display();
                break;
        }
    }
    
}