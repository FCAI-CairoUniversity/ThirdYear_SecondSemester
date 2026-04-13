% Load the library data from the 'library_data.pl' file
:- consult('library_data.pl').

append_acc([], L, L).
append_acc([H|T], L2, [H|T2]) :-
    append_acc(T, L2, T2).
% check membership at list
my_member(X, [X|_]).
my_member(X, [_|T]) :-
    my_member(X, T).
% count elements manually
my_length([], 0).
my_length([_|T], N) :-
    my_length(T, N1),
    N is N1 + 1.
% Task 1: Get a list of all books borrowed by a specific student.
books_borrowed_by_student(Student, L) :-
    collect_books(Student, [], L), !.

collect_books(Student, Acc, Result) :-
    borrowed(Student, Book),
    \+ my_member(Book, Acc),
    append_acc(Acc, [Book], NewAcc),
    collect_books(Student, NewAcc, Result).
collect_books(_, Acc, Acc).

% Task 2: Count how many students borrowed a specific book.
borrowers_count(Book, N) :-
    collect_borrowers(Book, [], L),
    my_length(L, N), !.

collect_borrowers(Book, Acc, Result) :-
    borrowed(Student, Book),
    \+ my_member(Student, Acc),
    append_acc(Acc, [Student], NewAcc),
    collect_borrowers(Book, NewAcc, Result).
collect_borrowers(_, Acc, Acc).
% Task 3: Find  the  most  borrowed  book  in  the  library  (highest  number  of borrowed(_, Book) facts)
most_borrowed_book(Book) :-
    collect_all_books([], Books),
    find_max_book(Books, 0, none, Book), !.

collect_all_books(Acc, Result) :-
    borrowed(_, Book),
    \+ my_member(Book, Acc),
    append_acc(Acc, [Book], NewAcc),
    collect_all_books(NewAcc, Result).
collect_all_books(Acc, Acc).

find_max_book([], _, Book, Book).
find_max_book([H|T], MaxSoFar, _, Result) :-
    borrowers_count(H, C),
    C > MaxSoFar,
    find_max_book(T, C, H, Result).

find_max_book([H|T], MaxSoFar, Current, Result) :-
    borrowers_count(H, C),
    C =< MaxSoFar,
    find_max_book(T, MaxSoFar, Current, Result).
% Task 4: List all ratings for a specific book as a list of tuples (return a list in the form: [(Student1, Score1), (Student2, Score2), ...]) 
ratings_of_book(Book, L) :-
    collect_ratings(Book, [], L), !.

collect_ratings(Book, Acc, Result) :-
    rating(Student, Book, Score),
    \+ my_member((Student, Score), Acc),
    append_acc(Acc, [(Student, Score)], NewAcc),
    collect_ratings(Book, NewAcc, Result).
collect_ratings(_, Acc, Acc).
% Task 5: Find the top reviewer in the library. The top reviewer is the student who gave the highest single rating in the whole system.
top_reviewer(Student) :-
    collect_all_reviews([], Reviews),
    find_max_rating(Reviews, 0, none, Student), !.

collect_all_reviews(Acc, Result) :-
    rating(Student, _ , Rating),
    \+ my_member((Student, Rating), Acc),
    append_acc(Acc, [(Student, Rating)], NewAcc),
    collect_all_reviews(NewAcc, Result).
collect_all_reviews(Acc, Acc).

find_max_rating([], _, Student, Student).
find_max_rating([(Student,Rating)|T], MaxSoFar, _, Result) :-
    Rating > MaxSoFar,
    find_max_rating(T, Rating, Student, Result).

find_max_rating([(Student,Rating)|T], MaxSoFar, Current, Result) :-
    Rating =< MaxSoFar,
    find_max_rating(T, MaxSoFar, Current, Result).

% Task 6: Find  the  most  common  topic  in  books  borrowed  by a specific student. 
%         Hint: The steps are written below (conceptually):
%               1.  Get all books borrowed by the student 
%               2.  Collect all topics of these books 
%               3.  Merge them into one big list 
%               4.  Find the most frequent topic

% Get a list of all topics for each book provided.
find_topics_for_books(Books ,Topics):-
    topics_in_books(Books,[],Topics), !.

topics_in_books([H|T],Ltopics,Alltopics):-
    topics(H,L),
    append_acc(L, Ltopics, NewLtopics),
    topics_in_books(T,NewLtopics,Alltopics).
topics_in_books(_,Ltopics,Ltopics).

% counts occurrences of an element in a list
count(_, [], 0).

count(X, [X|T], Count):-
    count(X, T, NewCount),
    Count is NewCount + 1.

count(X, [H|T] , Count):-
    X \= H,
    count(X, T, Count).


% Creates a new list containing all the unique elements only.
unique([],[]).

unique([H|T], UniqueList):-
    my_member(H, T), 
    unique(T, UniqueList).


unique([H|T], [H|Rest]):-
    \+ my_member(H, T),
    unique(T, Rest).

% Gets the most frequent Topic from the list of topics
most_frequent_topic(List, ResultTopic):-
    unique(List, UniqueList),
    most_frequent_topic(List, UniqueList, 0, _, ResultTopic), !.

most_frequent_topic(_, [], _, ResultTopic, ResultTopic).

most_frequent_topic(List, [H|T], Mostfreq, CurrentTopic, ResultTopic):-
    count(H, List, Count),
    Count > Mostfreq,
    NewMostfreq is Count,
    most_frequent_topic(List, T, NewMostfreq, H , ResultTopic).

most_frequent_topic(List, [H|T], Mostfreq, CurrentTopic, ResultTopic):-
    count(H, List, Count),
    Count =< Mostfreq,
    most_frequent_topic(List, T, Mostfreq, CurrentTopic, ResultTopic).

% Find  the  most  common  topic  in  books  borrowed  by a specific student.
most_common_topic_for_student(Student, Topic):-
    books_borrowed_by_student(Student, Lbooks),
    find_topics_for_books(Lbooks ,Topics),
    most_frequent_topic(Topics, Topic).
