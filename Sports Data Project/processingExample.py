#The purpose of this file is to copy information from a formatted HTML table into a .CSV for easy importing into
#the database. From there, other files in the directory will use the tables to post statistics, awards, etc. on 
#other Web pages.

# #The first block of imported modules are responsible for the reading and writing.
import urllib.request as urllib2
from bs4 import BeautifulSoup
import os
from shutil import copy
import csv
import pandas
#The next couple imported modules are for importing the data to the database.
import mysql.connector
from sqlalchemy import create_engine
#The variables file contains credentials for accessing the database, the source file, and the destination for the data.
from mxbl_variables import DB_HOST
from mxbl_variables import DB_USER
from mxbl_variables import DB_PW
from mxbl_variables import DB_DOM
from mxbl_variables import connect_string as conn
from mxbl_variables import folder_link as dest
from mxbl_variables import test_file as rosters
from mxbl_variables import test_dest as mxbl_full
from mxbl_variables import test_format as mxbl_new

#OOTP Baseball has a directory where it will store the desired .txt file consistently.
#We want to copy it into our directory.
copy(rosters, mxbl_full)

engine = create_engine(conn)
#Put together MXBL Players table
with open(rosters) as f, open(mxbl_new, "w") as g:
    for line in f:
        #The source file contains commented lines of code. For simpler .CSV translating, we'll skip these lines
        #and only use the ones containing data.
        if not ('//' in line):
            g.write(line) 
        elif ('//id' in line):
            line = line[2:]
            g.write(line)

#The full table contains information more relevant for the simulation aspect of the game (player ratings) that aren't
#of relevance for our sake. So we'll cut off after the relevant columns of the table.
#We are also only interested in players at the Major League level. Any team with an ID higher than 30 is at a minor
#league level, and any player with a team_id of 0 is a free agent. We make these cutoffs for faster processing and 
#to keep strictly relevant entries.
pf = pandas.read_csv(mxbl_new, sep='\\s*,\\s*',index_col=False, engine='python')
pf = pf[pf.columns[0:23]]
majors = pf.loc[(pf['team_id'] > 0) & (pf['team_id'] < 31)]
majors.to_sql(name='players', con=engine, if_exists='replace')

#In addition to the players table, batting and pitching stats are exporting at the end of every simulated month.
b_file_link = r"MonthlyBatters.html"
p_file_link = r"MonthlyPitchers.html"

b_mxbl_url = dest + b_file_link
p_mxbl_url = dest + p_file_link

#The tables on these HTML pages are formatted more to our liking, so reading them and importing them to the database
#is more straightforward.
pd = pandas.read_html(b_mxbl_url)
dg = pd[1]
dg.to_sql(name='mxbl_batting_stats', con=engine, if_exists='replace')
pd = pandas.read_html(p_mxbl_url)
df = pd[1]
df.to_sql(name='mxbl_pitching_stats', con=engine, if_exists='replace')


db = engine.connect()
#The player awards table is used for monthly award winners. An sql file is exported directly from the game.
fd = open(r'C:\Users\Mitchell\Documents\Out of the Park Developments\OOTP Baseball 19\saved_games\Sync.lg\import_export\mysql\players_awards.mysql.sql', 'r')
sqlFile = fd.read()
fd.close()
sqlCommands = sqlFile.split(';')
for command in sqlCommands:
    db.execute(command)

#There are some discrepencies in how the game stores Team Name, player id, and player names are stored vs
#how they are stored in our database.
db.execute("UPDATE players a SET `Team Name` = (SELECT teamShort FROM mitchellsync.mxbl_teams b WHERE CONCAT(b.location, ' ', b.team) = a.`Team Name`)")
db.execute("ALTER TABLE players CHANGE `id` player_id BIGINT(20) NULL DEFAULT NULL")
db.execute("ALTER TABLE `mxbl_batting_stats` CHANGE `First Name` `First_Name` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `Last Name` `Last_Name` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;")
db.execute("ALTER TABLE `mxbl_pitching_stats` CHANGE `First Name` `First_Name` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `Last Name` `Last_Name` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;")

#The exported player id column in the stats tables has an unfortunate naming error. We change it to something more
#accurate.
db.execute("ALTER TABLE mxbl_pitching_stats CHANGE `Unnamed: 0` player_id INT(8) NULL DEFAULT NULL")
db.execute("UPDATE mxbl_pitching_stats a SET player_id = (SELECT player_id FROM players b WHERE a.First_Name = b.FirstName AND a.Last_Name = b.LastName AND a.TM = b.`Team Name`)")
db.execute("ALTER TABLE mxbl_batting_stats CHANGE `Unnamed: 0` player_id INT(8) NULL DEFAULT NULL")
db.execute("UPDATE mxbl_batting_stats a SET player_id = (SELECT player_id FROM players b WHERE a.First_Name = b.FirstName AND a.Last_Name = b.LastName AND a.TM = b.`Team Name`)")

db.close()
engine.dispose()

mydb = mysql.connector.connect (
	host=DB_HOST,
	user=DB_USER,
	passwd=DB_PW,
	database=DB_DOM    
)

mycursor = mydb.cursor(dictionary=True)
# Find players with NULL player_id
mycursor.execute("SELECT * FROM mxbl_batting_stats WHERE `index` NOT IN (SELECT `index` FROM mxbl_batting_stats WHERE player_id > 0)")
results = mycursor.fetchall()
for x in results:
    first = x['First_Name']
    last = x['Last_Name']
    p_index = x['index']
    oldie = x['TM']
    query = ("SELECT `Team Name` FROM players WHERE FirstName = '" + first + "' AND LastName = '" + last + "'")
    # Search dataframe for player
    search = ("FirstName == '" + first + "' and LastName == '" + last + "'")
    res = pf.query(search)
    meow = str(res['id']).split()
    # Get player's ID
    pid = meow[1]
    bork = str(res['team_id']).split()
    # Get the major/minor league team they are on
    affiliate = bork[1]
    if int(affiliate) < 31:
        tid = affiliate
    else:
        # Get affiliated major league team
        boom = 'SELECT team_id FROM team_affiliations WHERE affiliated_team_id = '
        boom = boom + str(affiliate)
        mycursor.execute(boom)
        mlb = mycursor.fetchall()
        for m in mlb:
        # Get the major league affiliate ID
            tid = m['team_id']
    # Snag the tricode for the major league team
    look = 'SELECT abbr FROM teams WHERE team_id = '
    look = look + str(tid)
    print(tid)
    mycursor.execute(look)
    brevs = mycursor.fetchall()
    for z in brevs:
        tm = z['abbr']
    # Update the table so there are no more NULL
    maybe = "UPDATE mxbl_batting_stats SET `TM` = '" + tm + "', `player_id` = " + str(pid) + " WHERE `index` = " + str(p_index)
    mycursor.execute(maybe)
    mydb.commit()