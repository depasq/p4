# CSCI E-15 Project 4 - Chandra Peer Review App

## Live URL
http://p4.dwa15.jdepasquale.com/

## Description

This is a Laravel application designed to facilitate the logistics of running the Chandra Observatory's annual Peer Review, a meeting to determine which observing proposals to accept for the upcoming observing cycle.  

The application provides an interface for reviewers to sign-up or login, update their account info and areas of expertise, and specify their travel preferences for the meeting. In addition to the reviewer interface, the site implements roles and permissions via the [Entrust](https://github.com/Zizaco/entrust) package to allow for a unique experience for admin-level users to manage the reviewers database. Admins can edit reviewer accounts by updating their contact info and travel preferences. Additionally, admins are able to both create new user accounts (including new admin accounts) as well as delete existing users.   

## Demo

https://youtu.be/5cKNFUMKWYg

## Details for Teaching Team

This application uses [bootstrap](http://getbootstrap.com/css/) for the basic formatting with additional custom formatting contained in css/p4.css. The opening splash page of course uses Pure CSS to maintain the look of other parts of the site, but the application is built as a standalone.

To fully explore the capabilities of the application, please login as both jill@harvard (an admin account) and jamal@harvard (a regular reviewer account). The admin account is where the meat of the "CRUD" capabilities exist. Admins are able to create users, read and update their info, and delete them. Also of note is the use of the faker package to seed the database with users for testing.

Here's my attempt at drafting a simple schema for the RWS database.
![Schema](http://p4.dwa15.jdepasquale.com/img/rws.png)

## Outside Code
* Pure CSS: http://yui.yahooapis.com/pure/0.5.0/pure-min.css
* Pure CSS Side Menu: css/side-menu.css
* Bootstrap CSS: http://getbootstrap.com/css/
* [zizaco/entrust](https://packagist.org/packages/zizaco/entrust)
* [fzaninotto/faker](https://packagist.org/packages/fzaninotto/faker)
