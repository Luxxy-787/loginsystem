##Responsive Login & Registration Form Using HTML & CSS & JS | Sliding Sign In & Sign Up Form with awesome sliding animation just by using HTML and CSS and a little bit of JavaScript. We'll have a nice blue background, also our sign-in & sign-up form will be responsive!





Updates

27 June - create sucessfully login system
28 June - $ShowError & $ShowAlert bug fixed
3  July - done decent design

13 aug bug fixed - not redirecting after user sign up  ///  

========

not able to fix $username bug on welcome page!


 ***To Reset the order***

set @autosno :=0;
update users_data set sno = @autosno := (@autosno+1);
alter table users_data AUTO_INCREMENT = 1;

***Suppose you deleted the 4 rows name 1,2,3,4 after user create new account the sql will that there this 4 row and it is going to create 5,6 and so on...
to avoid this***

alter table users_data auto_increment = 1;

