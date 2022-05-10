# Levelup-CRUD-using-php
This is a CRUD operation using php and Mysql database. In this when we add(CREATE) new user we need to submit add data in one form only in frontenf but in backend the data is storing in two different tables this is done using foreign key in Mysql.

What is CRUD?
If you are new to programming, seeing “CRUD” in the title may raise concerns considering that the Merriam-Webster dictionary defines crud as either “a deposit or incrustation of grease or a slang for a contemptible person.” As fun as it may be to expand on that definition, this is not what we will be expanding on for this article. In the computer programming world, CRUD is an acronym worth knowing. We will review what CRUD operations (aka CRUD functionalities) are and why it is an important fundamental to learn early on.

CRUD is an acronym that stands for Create, Read, Update and Delete.Think of CRUD as a simple concept that represents the four basic functions that models should be able to do and are considered necessary to implement a persistent storage application. In simpler terms, it represents the four basic operations you can do on any data. You can create something new, read or view the newly created data, edit or update the data and finally the option to delete it.


CRUD Functions
These four major functions are used to interact with database applications and is a reminder of what data manipulation functions are needed for an application to feel complete. When working with web services, CRUD corresponds to the to HTTP methods, which communications to a web server how you want to interact with a website.

In this breakdown, I will use my New Beginnings project as an example for the CRUD functions and the HTTP requests associated with them. This was my first (Ruby/HTML) application that was built for a local animal shelter where users can create an account, log in, browse all animals for adoption and schedule playdates or adopt them directly from the site.

Create
After logging into the New Beginnings site, browsing all the animals available for adoption, we’d click on Togo’s name. Once we’ve been directed to his show page, we can create a playdate with him at the shelter. After we complete the appointment form, those inputs are then correlated to the model table in the database. When we submit the data, a POST requested is sent to our API and our playdate with Togo will be stored in the database.

The route for this POST request — /appointments/new
Read
Nice! We’ve scheduled our playdate with Togo, but now we want to see that confirmation on our page right? After all, read is the main functionality for us to use the other operations. Now, our API should allow us to see the playdate confirmation on our page. To take a look at all of our appointments, we would use a GET request that allows us to view the scheduled appointment without making any changes to the data stored on our API. This HTTP method is used to only retrieve data and should have no other effects.

The route for this GET request — /appointments.
Update
Togo is really adorable, maybe we should see him sooner! For us to reschedule the appointment for an earlier time we can use the corresponding HTTP method for updating your playdate with PUT. This replaces all current data of the target resource (Togo) with the uploaded content (new appointment time/date). The ‘id’ in the route is how the resource is targeted (Togo) to ensure we only update the specified appointment, while leaving any others we may have scheduled untouched.

The route for this PUT request — /appointments/:id.
Delete
You know what? Togo has been so helpful with these CRUD functionalities, I think we should just bring him home. Since we can adopt Togo directly from the app, let’s go ahead and cancel the playdate we scheduled. To do this, we can use the HTTP method, DELETE, to remove the targeted appointment from our page. To reiterate, each playdate has a unique id and the id in the request below identifies the specific appointment you are removing from the database.

The route for the DELETE request — /appointments/:id
Conclusion
However simple these four actions may seem, they can be found everywhere because they add important functionality that are vital to modern day web development. As a developer, I encourage you to build your applications around this basic functionality. Remember to use CRUD as a guideline in the initial stages of development to help think through what a user should or should not be able to do within your app. So, get creative and show the world what you can build!
