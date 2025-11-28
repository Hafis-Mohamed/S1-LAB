#include<stdio.h>
#include<stdlib.h>

struct node{
    int data;
    struct node* next;
    struct node* prev;
};

struct node* head=NULL;

void insertAtBeg(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=NULL;
    new->prev=NULL;
    if(head!=NULL){
        head->prev=new;
        new->next=head;
    }
    head=new;
}

void insertAtEnd(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=NULL;
    struct node* temp=head;
    while(temp->next!=NULL){
        temp=temp->next;
    }
    temp->next=new;
    new->prev=temp;
}

void display(){
    if(head==NULL){
        printf("ll is empty");
    }
    struct node* temp=head;
    printf("\nNULL");
    while(temp!=NULL){
        printf("<--%d-->",temp->data);
        temp=temp->next;
    }
    printf("NULL\n");
}

void insertByPosition(int item,int pos){
    if(pos<0){
        printf("ivalid Position");
        return;
    }
    if(pos==0){
        insertAtBeg(item);
        return;
    }
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=NULL;
    new->prev=NULL;
    struct node* temp=head;
    for(int i=0;temp!=NULL&&i<pos-1;i++){
        temp=temp->next;
    }
    if(temp==NULL){
        printf("position out of bounds");
        free(new);
        return;
    }
    new->next=temp->next;
    new->prev=temp;
    if(temp!=NULL){
        temp->next->prev=new;
    }
    temp->next=new;

}

void deleteFromBeg(){
    if(head==NULL){
        printf("ll is empty");
    }
    struct node* temp=head;
    head=head->next;
    if(head!=NULL){
        head->prev=NULL;
    }
    free(temp);
}

void deleteFromEnd(){
    if(head==NULL){
        printf("ll is empty");
        return;
    }
    struct node* temp=head;

    if(head->next==NULL){
        free(head);
        head=NULL;
        return;
    }
    while(temp->next!=NULL){

        temp=temp->next;
    }
    temp->prev->next=NULL;
    free(temp);
    
}

void deleteByValue(int item){
    if(head==NULL){
        printf("ll is empty");
        return;
    }
    struct node* temp=head;
    if(temp->data==item){
        head=head->next;
        head->prev=NULL;
        free(temp);
        return;
    }
    while(temp!=NULL){
        if(temp->data==item){
            temp->prev->next=temp->next;
            temp->next->prev=temp->prev;
            free(temp);
            return;
        }
        temp=temp->next;
    }
}

int main(){
    int choice,item,pos;
    while(1){
        printf("1 for insertatbeg\n");
        printf("2 for insertatend\n");
        printf("3 for insertatposition\n");
        printf("4 for deletefrobeg\n");
        printf("5 for deletefroend\n");
        printf("6 for deletebyvalue\n");
        printf("7 for display\n");
        printf("8 for search\n");
        printf("9 for exit\n");
        scanf("%d",&choice);
        switch(choice){
            case 1:
                printf("element:");
                scanf("%d",&item);
                insertAtBeg(item);
                break;
            case 2:
                printf("element:");
                scanf("%d",&item);
                insertAtEnd(item);
                break;
            case 3:
                printf("element:");
                scanf("%d",&item);
                printf("position:");
                scanf("%d",&pos);
                insertByPosition(item,pos);
                break;
            case 4:
                deleteFromBeg();
                break;
            case 5:
                deleteFromEnd();
                break;
            case 6:
                printf("element:");
                scanf("%d",&item);
                deleteByValue(item);
                break;
            case 7:
                display();
                break;
        }

    }
}