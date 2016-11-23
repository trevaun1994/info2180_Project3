CREATE TABLE User(PersonID int, LastName varchar(255), FirstName varchar(255), Username varchar(255), Password varchar(255));
CREATE TABLE Message(id int, Recipient_ids int, user_id int, subject varchar(255), body text, date date);
CREATE TABLE Message_read(id int, message_id int, reader_id int, date date);