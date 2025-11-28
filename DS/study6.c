#include<stdio.h>
#include<stdlib.h>

struct node{
    int data;
    struct node* next;
};

struct node* front=NULL;
struct node* rear=NULL;

void enqueue(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=NULL;
    if(front==NULL){
        front=new;
        rear=new;
        return;
    }
    struct node* temp=front;
    rear->next=new;
    rear=new;
}

void dequeue(){
    if(front==NULL){
        printf("queue is empty");
        return;
    }
    front=front->next;
    if(front==NULL){
        rear=NULL;
    }
}

void display(){
    struct node* temp=front;
    while(temp!=NULL){
        printf(" %d |",temp->data);
        temp=temp->next;
    }
}

int main(){
    int choice,item;
    while(1){
        printf("\n1 for enqueue, for dequeue,3 for display,4 for exit");
        scanf("%d",&choice);
        switch(choice){
            case 1:
                printf("element:");
                scanf("%d",&item);
                enqueue(item);
                break;
            case 2:
                dequeue();
                break;
            case 3:
                display();
                break;
        }
    }
}