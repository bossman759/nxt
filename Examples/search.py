#!/usr/bin/python
# -*- coding: utf-8 -*-
#import need packages
import sqlite3 as lite

#create a connection with the database file from our data dumps
con = lite.connect('test.db')
#gets the search term
t = raw_input("Search: ")
#checks to see if the user typed HELP for assistance
if("HELP" in t):
    print "**HELP**"
    
    print "Search: Enter a search term to receive results."

    print "**HELP**"
    
else:
    print "**Type HELP for assistance.**"


with con:
    #create our cursor
    cur = con.cursor()               
        #SQL query for search through Def tabl
            
            #SQL query for search through Links table
    cur.execute("SELECT * FROM Links WHERE url LIKE ? OR Name LIKE ? LIMIT 12", ('%'+t+'%', '%'+t+'%'))
    rows = cur.fetchall()
        
    for row in rows:
            #printing second & third column(See tuples)
            print row[1]
            
            print row[2]

            
        
