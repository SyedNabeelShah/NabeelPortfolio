# NabeelPortfolio
# What
This is the first project at this scale I have created with a combination of different languages. It is a portfolio webiste consisting of my homepage with a picture and short summary of myself. It contains a projects page which currently only links to itself as it is my only big project. It also contains a Resume and contact page which is self explanatory. It also has a fully functioning blog feature where users can log in to post and view blogs, with a UI to seperate blogs accordingly to their date and time posted. I will explain further down in this manual how the blog runs as the code on its own is not sufficient.

# Who
I am the sole contributor and maintainer of this project. If anyone wants to contribute and improve the issues associated with the project, they are welcome to.

# How
If the project is ran with a server normally clicking the blog link will only download the file it will not function. To use the blog functionality I use MAMP (or XAMP for windows) and launch an Apache web server with PHP version 8.2.0. There is a database linked to the project that already has the valid login details for the email and password needed to add blogs. Once the web server is launched all previous test blogs will be able to be seen and their view adjusted. Blogs can only be posted with the valid email and password held in the database.
