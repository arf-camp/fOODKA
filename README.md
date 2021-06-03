COMPLETE FOODKA PROJECT  USING (PHP/JAVASCRIPT/AJAX/JQUERY)
 
******MUST   READ FULL TEXT FILE*********** 





for running fOODKA project(on windows) we have to follow these following steps:


1.download and install localServer (xampp/wampp) (recommended c: drive)
2.go to xampp folder > htdocs > paste the (foodka) folder
3.start your xampp software,start button apache,mysql
4.type localhost on your browser,goto phpMyadmin
5.create new database 'food_ordering' import the food_ordering.sql file and save it.(food_ordering.sql file is on foodka/database folder)
6.go to your browser and paste:  http://127.0.0.1/foodka/      or    localhost/foodka/





*****for login as a customer(existing user) :


1.goto database : table name: user    (check what deatails you need)



*****for login as a admin :


1.goto database : table name: admin    (check what deatails you need)




*****for new registration account your given email will push notification system through SMTP method.So

for notification pushing you have to go to function.inc.php file(on foodka/) and find the function name send_email
and after some line you can see some comment ,

here you have to give your email and password 
(ex.  $mail->Username="tysonfarib@gmail.com"; $mail->Password="123"; $mail->SetFrom("tysonfarib@gmail.com"); )

also : on your gmail account ,you have to enable your IMAP access enable 



for enable IMAP  settings

go to setting>see all settings> Forwarding and POP/IMAP > IMAP access : enable IMAP and click on  save changes.

(Imap setting will be visible if you are not in gmail 2 step security process,if its on make it disable) 




project ERROR: you might be find some small bugs like front end designing error or reloading page error. Solution: just press cntrl+f5.

 

Code Understanding help:(important files!)

1.every details is calling by function . writing  in clean code(Core php).you can read the function.inc.php file (on foodka/ folder) 
for better understanding.

2.for page reloading ,given right error mssg with right functionality and success mssg pop up functionality 
we have used jquery/Ajax. you can read the `custom.js` file (on foodka/assets/js/) also. 


ABOUT PROJECT FEATURES:

GO TO THE `README FILES`  FOLDER AND READ THE .DOCX

**Also password encryption decryption(hash format) system I am writing in comment section on respective pageS
( incase we need this feature )





