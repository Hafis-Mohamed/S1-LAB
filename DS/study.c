#include<stdio.h>
#include<stdlib.h>

struct node{
    int data;
    struct node* next;
};

struct node* head=NULL;

void display(){
    struct node* temp=head;
    while(temp!=NULL){
        printf("%d-->",temp->data);
        temp=temp->next;
    }
    printf("NULL");
    printf("\n");
}

void insertAtBeg(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=head;
    head=new;
    display();
}

void insertAtEnd(int item){
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    new->next=NULL;
    if(head==NULL){
        head=new;
        display();
        return;
    }
    struct node* temp=head;
    while(temp->next!=NULL){
        temp=temp->next;
    }
    temp->next=new;
    display();
}

void insertAtPosition(int item,int pos){
    if(pos<0){
        printf("ivalid position");
    }
    if(pos==0){
        insertAtBeg(item);
    }
    struct node* new=(struct node*)malloc(sizeof(struct node));
    new->data=item;
    struct node* temp=head;
    for(int i=0;temp!=NULL && i<pos-1;i++){
        temp=temp->next;
    }
    if(temp==NULL){
        printf("postion unbounds");
        free(new);
        return;
    }
    new->next=temp->next;
    temp->next=new;
    display();
}

void deleteFromBeg(){
    if(head==NULL){
        printf("ll is empty");
        return;
    }
    head=head->next;
    display();
    return;
}

void deleteFromEnd(){
    if(head==NULL){
        printf("ll is empty");
    }
    struct node* temp=head;
    struct node* prev=temp;
    while(temp->next!=NULL){
        prev=temp;
        temp=temp->next;
    }
    prev->next=NULL;
    free(temp);
    display();
    return;
}

void deleteByValue(int item){
    if(head==NULL){
        printf("ll is empty");
    }
    if(head->data==item){
        head=head->next;
        return;
    }
    struct node* temp=head;
    struct node* prev=NULL;
    while(temp!=NULL){
        if(temp->data=item){
            prev->next=temp->next;
            free(temp);
            return;
        }
    prev=temp;
    temp=temp->next;
    }
    display();
    printf("item not found");
}

void search(int item){
    struct node* temp=head;
    int pos=0;
    while(temp){
        if(temp->data=item){
            printf("%d is present at position",item,pos);
        }
        temp=temp->next;
        pos++;
    }
    return;
}

void merge(){
    int n1,item1;
    struct node* head1=NULL;
    struct node* temp=head;
    printf("enter number of elements in ll2:");
    scanf("%d",&n1);
    printf("enter the elements of ll2:");
    for(int i=0;i<n1;i++){
        scanf("%d",&item1);
        struct node* new1=(struct node*)malloc(sizeof(struct node));
        new1->data=item1;
        new1->next=head1;
        head1=new1;
    }
    if(temp==NULL){
        head=head1;
        display();
        return;
    }
    while(temp->next!=NULL){
        temp=temp->next;
    }
    temp->next=head1;
    display();
}

int main(){
    int choice,item,pos;
    while(1){
        printf("1 for insertatbeg\n");
        printf("2 for insertatend\n");
        printf("3 for insertbyvalue\n");
        printf("4 for deletefrombeg\n");
        printf("5 for deletefromend\n");
        printf("6 for deletefromend\n");
        printf("7 for display\n");
        printf("8 for search\n");
        printf("9 for merge\n");
        scanf("%d",&choice);
    
        switch(choice){
            case 1:
                printf("enter element:");
                scanf("%d",&item);
                insertAtBeg(item);
                break;
            case 2:
                printf("element:");
                scanf("%d",&item);
                insertAtEnd(item);
                break;
            case 3:
                printf("enter element:");
                scanf("%d",&item);
                printf("enter position:");
                scanf("%d",&pos);
                insertAtPosition(item,pos);
                break;
            case 4:
                deleteFromBeg();
                break;
            case 5:
                deleteFromEnd();
                break;
            case 6:
                printf("enter the element to deleete:");
                scanf("%d",&item);
                deleteByValue(item);
                break;
            case 7:
                display();
                break;
            case 8:
                printf("enter element;");
                scanf("%d",&item);
                search(item);
                break;
            case 9:
                merge();
                break;
        }
    }
}
