import json
from urllib.request import urlopen

url = "https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=51.243276&lon=4.995369&appid=9a4d084e9931dbee2a54e3244d5e951a"
response = urlopen(url)
data_json = json.loads(response.read())
solcastJson = json.dumps(data_json, indent=4, ensure_ascii=False, sort_keys=True)
