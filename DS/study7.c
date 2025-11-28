#include<stdio.h>
#include<stdlib.h>

struct node{
    int data;
    struct node* next;
};

struct node*top=NULL;

void push(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=top;
    top=new;
}

void pop(){
    if(top==NULL){
        printf("stack underflow");
        return;
    }
    top=top->next;
}

void display(){
    struct node* temp=top;
    while(temp!=NULL){
        printf("| %d |\n",temp->data);
        temp=temp->next;
    }
}

int main(){
    int choice,item;
    while(1){
        printf("\n1 for push, for pop,3 for display,4 for exit");
        scanf("%d",&choice);
        switch(choice){
            case 1:
                printf("element:");
                scanf("%d",&item);
                push(item);
                break;
            case 2:
                pop();
                break;
            case 3:
                display();
                break;
        }
    }
}