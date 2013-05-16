
README
by David Chao
MDD1305

Project Name: VG_Unstuck

Installation guide: 
1. Download the zip from github repository and extract the folder to your htdocs (if you use MAMP). Make note of the folder name (referred to as 'abovefoldername' below). 
2. Home page starts at http://localhost:8888/abovefoldername/public. (URL may differ depending on where your server is set up. This goes to the welcome page for now, which will not have any of my work. URL change will be coming later.)
3. CRUD pages start at http://localhost:8888/abovefoldername/public/game. 
4. Before trying any CRUD functions, the database will be need to be created. The name of the DB I use is mdd1305. After mdd1305 is created, run the entire command in the .sql file inside abovefoldername/assets to create the tables. (If you need to create the tables in another database and/or location, be sure to change the settings in abovefoldername/fuel/app/config/db.php or else it won't connect.)

Notes for 2.1:
API Proof of Concept is found in the abovefoldername/assets folder - file: api.html
Style Guides are also found in the same assets folder - .jpg files
Responsive design can be tested by resizing the window at the CRUD pages.
Not all styles from style guides may be implemented.

=======
MDD1305
=======

GitHub created for 1305 Mobile Device Deployment Online at Fullsail University
