import requests
import json
from datetime import datetime
import pytz
api_key = "74761ab81d590f5158485fd887b5e435"
lat = "51.243276"
lon = "4.995369"
exclude = "current,daily,minutely"
url = "https://api.openweathermap.org/data/2.5/onecall?lat=%s&lon=%s&exclude=%s&appid=%s&units=metric" % (lat, lon, exclude,api_key)
response = requests.get(url)
# data = json.loads(response.text)
data = response.json()
hourly = data["hourly"]
for entry in hourly:
    dt = datetime.fromtimestamp(entry["dt"], pytz.timezone('Europe/Brussels'))
    temp = entry["temp"]
    print(temp)
with open('data.json','w') as f:
    json.dump(data,f)

