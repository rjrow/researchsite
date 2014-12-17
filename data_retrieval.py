import pymysql
import pandas as pd
import numpy as np
import json
import pandas.io.sql as psql
import re
from collections import defaultdict
from itertools import chain

user     = "job_growthmaster"
password = "jobgrowthpass"
dbname   = "job_growth2"
host     = "job-growth.cotzely14ram.us-west-2.rds.amazonaws.com"
port     =  3306

bucketlimits = [1,11,21,31,41,50]



conn = pymysql.connect(host = host, port = port, user = user, passwd = password, db = dbname)
cur = conn.cursor()

frame = psql.frame_query('select * from state_rankings_t where industry_name <=> supersector_name and year > 1990;', con = conn)
states = psql.frame_query('select * from state_codes', con = conn)

states['state_names'] = states['state_names'].apply(lambda x: re.sub('\r','',x))

frame_v1 = pd.merge(states, frame, left_on = "state_names", right_on = "state_name")
frame_v2 = frame_v1[['supersector_name','state_codes','rank', 'job_growth', 'value','year','Month']]

frame_v2['fillKey'] = np.where(frame_v2['rank'] >= bucketlimits[0], '1-10','0')
frame_v2['fillKey'] = np.where((frame_v2['rank'] >= bucketlimits[1]) & (frame_v2['rank'] <= bucketlimits[2]), '11-20', frame_v2['fillKey'])
frame_v2['fillKey'] = np.where((frame_v2['rank'] >= bucketlimits[2]) & (frame_v2['rank'] <= bucketlimits[3]), '21-30', frame_v2['fillKey'])
frame_v2['fillKey'] = np.where((frame_v2['rank'] >= bucketlimits[3]) & (frame_v2['rank'] <= bucketlimits[4]), '31-40', frame_v2['fillKey'])
frame_v2['fillKey'] = np.where((frame_v2['rank'] >= bucketlimits[4]) & (frame_v2['rank'] <= bucketlimits[5]), '41-50', frame_v2['fillKey'])

frame_v3 = frame_v2[['supersector_name','state_codes','fillKey', 'rank', 'job_growth', 'value', 'year', 'Month']]

frame_v3.set_index(['supersector_name','state_codes'])

file_location_json = "C:\\Users\\rjrow.ASURITE\\git\\researchsite\\Avada\\data\\current_base_states_ts.json"

testdict = frame_v3.to_dict()

supersector_names = list(frame_v3['supersector_name'].unique())
years			  = list(frame_v3['year'].unique())
months			  = list(frame_v3['Month'].unique())

state_codes = testdict['state_codes']
fillKey		= testdict['fillKey']
ranks 	    = testdict['rank']
jobgrowth   = testdict['job_growth']
values 		= testdict['value']



outDictValues = {}
outDictYear   = {}
outDictMonth  = {}




for year in years:
	tempframe1 = frame_v3[frame_v3['year'] == year]
	for month in months:
		tempframe2 = tempframe1[tempframe1['Month'] == month]
		for sector in supersector_names:
			list = []
			dicts = {}
			sector = str(sector)
			tempframe3 = tempframe2[tempframe2['supersector_name'] == sector]
			tempdict  = tempframe3.to_dict()
			state_codes = tempdict['state_codes']

			for state in state_codes:
				state_name =  str(state_codes[state])
				fill       =  str(fillKey[state])
				rank       =  str(ranks[state])
				job_growth =  str(jobgrowth[state])
				jobs 	   =  str(values[state])
				dicts[state_name] =  {"fillKey" :fill, "rank"    :rank, "job_growth" : job_growth, "jobs" :jobs}

				outDictValues[sector] = dicts
			outDictMonth[month] = outDictValues
		outDictYear[year] = outDictMonth


# outDict = {}

# for sector in supersector_names:
# 	list = []
# 	dicts = {}
# 	sector = str(sector)
# 	tempframe = frame_v3[frame_v3['supersector_name'] == sector]
# 	tempdict  = tempframe.to_dict()
# 	state_codes = tempdict['state_codes']

# 	for state in state_codes:
# 		state_name =  state_codes[state]
# 		fill    =  str(fillKey[state])
# 		rank    =  str(ranks[state])
# 		job_growth = str(jobgrowth[state])
# 		jobs 	  = str(values[state])

# 		dicts[state_name] =  {"fillKey" :fill, "rank" :rank, "job_growth" :job_growth, "jobs" :jobs}

# 	outDict[sector] = dicts




json_object = json.dumps(outDictYear)

with open(file_location_json,'w') as outfile:
	outfile.write(json_object)





