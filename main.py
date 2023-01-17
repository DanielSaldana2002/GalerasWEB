import requests
import json

url = "http://localhost:3000/carta"

payload={}
headers = {}

response = requests.request("GET", url, headers=headers, data=payload)
carta = json.loads(response.text)
for i in range(3):
    print('id: ',carta[i]['id'],', nombre: ',carta[i]['nombre'],', clasificacion: ',carta[i]['clasificacion'])

